<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Top_Offer as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Top_Offer as Model;
use App\Models\Top_Offer_Categories;

class TopOffserController extends Controller
{

    private $view = 'admin.top_offer.';
    private $redirect = 'admin_panel/top_offer';


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
                Top_Offer_Categories::create([
                    'top_offer_id' => $Item->id,
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

        Top_Offer_Categories::where('top_offer_id',$Item->id)->delete();

        if($request->category_id != null) {
            foreach ($request->category_id as $value) {
                Top_Offer_Categories::create([
                    'top_offer_id' => $Item->id,
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
        Top_Offer_Categories::where('top_offer_id',$id)->delete();
        $Item->delete();
        return redirect($this->redirect)->with('error','تم الحذف بنجاح');
    }


    private function gteInput($request,$modelClass) {

        $input = $request->only(['title','link','color']);

        return  $input;
    }




}
