<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider as Model;
use App\Models\Slider;
use App\Models\Slider_Categories;

class SliderController extends Controller
{

    private $view = 'admin.slider.';
    private $redirect = 'admin_panel/slider';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Item = Model::get();
        return view($this->view . 'index',compact('Item'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'pic1' => 'required|image|mimes:jpg,png,jpeg',
            'category_id' => 'required',
            'category_id.*' => 'required'
        ],
        [

            'pic1.image' => 'هذا الحقل يجب ان يحتوي علي صور  ',
            'pic1.mimes' => 'هذا الحقل يجب ان يحتوي علي صور بصيغه jpg,png,jpeg  ',
            'pic2.image' => 'هذا الحقل يجب ان يحتوي علي صور  ',
            'pic3.mimes' => 'هذا الحقل يجب ان يحتوي علي صور بصيغه jpg,png,jpeg  ',
        ]);

        $Item = Model::create($this->gteInput($request,null));

        if($request->category_id != null) {
            foreach ($request->category_id as $value) {
                Slider_Categories::create([
                    'slider_id' => $Item->id,
                    'category_id' => $value
                ]);
            }
        }

        return redirect($this->redirect)->with('success','تمت الاضافه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Item = Model::findOrFail($id);
        return view($this->view . 'edit', [ 'Item' => $Item ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pic1' => 'nullable|image|mimes:jpg,png,jpeg',
            'category_id' => 'required',
            'category_id.*' => 'required'
        ],
        [

            'pic1.image' => 'هذا الحقل يجب ان يحتوي علي صور  ',
            'pic1.mimes' => 'هذا الحقل يجب ان يحتوي علي صور بصيغه jpg,png,jpeg  ',
            'pic2.image' => 'هذا الحقل يجب ان يحتوي علي صور  ',
            'pic3.mimes' => 'هذا الحقل يجب ان يحتوي علي صور بصيغه jpg,png,jpeg  ',
        ]);

        $Item = Model::findOrFail($id);
        $Item->update($this->gteInput($request,$Item));

        Slider_Categories::where('slider_id',$Item->id)->delete();

        if($request->category_id != null) {
            foreach ($request->category_id as $value) {
                Slider_Categories::create([
                    'slider_id' => $Item->id,
                    'category_id' => $value
                ]);
            }
        }


        return redirect()->back()->with('info',' تم التحديث بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Item = Model::findOrFail($id);
        Slider_Categories::where('slider_id',$id)->delete();
        $Item->delete();
        return redirect($this->redirect)->with('error','تم الحذف بنجاح');
    }


    private function gteInput($request,$modelClass) {

        $input = $request->only([ 'url','button_name' ]);

        if(isset($modelClass)) {

            $input['pic1'] = upload()->UploadImage('pic1',Upload_Path(),$modelClass,'mezeta_desktop_slider_'.$modelClass->id,870,432);
            //$input['pic2'] = upload()->UploadImage('pic2',Upload_Path(),$modelClass,'mezeta_mobile_slider_'.$modelClass->id,null,null);

        } else {

            $num = Slider::max('id');
            $counter = $num + 1;

            $input['pic1'] = upload()->UploadImage('pic1',Upload_Path(),$modelClass,'mezeta_desktop_slider_'.$counter,870,432);
            //$input['pic2'] = upload()->UploadImage('pic2',Upload_Path(),$modelClass,'mezeta_mobile_slider_'.$counter,null,null);

        }



        return  $input;
    }




}
