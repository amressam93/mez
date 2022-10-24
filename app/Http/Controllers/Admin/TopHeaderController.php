<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TopHeader as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\TopHeader as Model;



class TopHeaderController extends Controller
{

    private $view = 'admin.top_header.';
    private $redirect = 'admin_panel/top_header';


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
        $Item->delete();
        return redirect()->back()->with('error','تم الحذف بنجاح');
    }


    private function gteInput($request,$modelClass) {

        $input = $request->only([
            'icon', 'title','sub_title'
        ]);

        return  $input;
    }




}
