<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Footer as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Footer as Model;
use App\Models\Footer_Categories;

class FooterController extends Controller
{

    private $view = 'admin.footer.';
    private $redirect = 'admin_panel/footer';


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
    public function store(modelRequest $request)
    {
        $Item = Model::create($this->gteInput($request,null));

        if($request->category_id != null) {
            foreach ($request->category_id as $value) {
                Footer_Categories::create([
                    'footer_id' => $Item->id,
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
    public function update(modelRequest $request, $id)
    {
        $Item = Model::findOrFail($id);
        $Item->update($this->gteInput($request,$Item));

        Footer_Categories::where('footer_id',$Item->id)->delete();

        if($request->category_id != null) {
            foreach ($request->category_id as $value) {
                Footer_Categories::create([
                    'footer_id' => $Item->id,
                    'category_id' => $value
                ]);
            }
        }

        return redirect()->back()->with('info','تم التحديث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Item = Model::where('id',$id)->firstOrFail();
        Footer_Categories::where('footer_id',$id)->delete();
        $Item->delete();
        return redirect()->back()->with('error','تم الحذف بنجاح');
    }


    private function gteInput($request,$modelClass) {

        $input = $request->only(['title']);


        if($modelClass) {
            $counter = $modelClass->id;
        } else {
            $counter = Model::max('id') + 1;
        }

        $custom_name = 'advatage_image'.$counter;

        $path = public_path('advatage_images');

        $input['icon'] =  upload()->UploadImage('icon',$path,$modelClass,$custom_name,'50','50');

        return  $input;
    }




}
