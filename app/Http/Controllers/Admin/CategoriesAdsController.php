<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesAds as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Ads_Categories;
use App\Models\CategoriesAds as Model;


class CategoriesAdsController extends Controller
{


    private $view = 'admin.categories_ads.';
    private $redirect = 'admin_panel/categories_ads';





    public function update_order(Request $request) {

        $Item = Model::where('id',$request->id)->first();

        if($Item != null && $request->order >= 0) {

            $Item->update(['order' => $request->order]);

            return response()->json([
                'data' => $request->order,
            ]);
        } else {
            abort('404');
        }
    }


    public function index()
    {
        $Item = Model::get(['title','id','status','order']);
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
                Ads_Categories::create([
                    'ads_id' => $Item->id,
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

        Ads_Categories::where('ads_id',$Item->id)->delete();

        if($request->category_id != null) {
            foreach ($request->category_id as $value) {
                Ads_Categories::create([
                    'ads_id' => $Item->id,
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
        $Item = Model::findOrFail($id);
        Ads_Categories::where('ads_id',$id)->delete();
        $Item->delete();
        return redirect($this->redirect)->with('error','تم الحذف بنجاح');
    }


    private function gteInput($request,$modelClass) {

        $input = $request->only([
            'title' , 'url1' , 'status',
        ]);

        $path = public_path('ads');

        $input['pic1'] =  upload()->UploadImage('pic1',$path,$modelClass,null,null,null);
        //$input['pic2'] =  upload()->UploadImage('pic2',$path,$modelClass,null,null,null);

        $counter = Model::max('id') + 1;

        if(! isset($modelClass)) {
            $input['order'] = $counter;
        } else {
            $input['order'] = $modelClass->order;
        }

        return  $input;
    }


}
