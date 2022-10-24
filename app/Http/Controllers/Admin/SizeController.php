<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product_Sizes;
use App\Models\Size as Model;


class SizeController extends Controller
{
     
    private $view = 'admin.size.';
    private $redirect = 'admin_panel/size';
    
    public function un_active($id) {

        $Item = Model::findOrFail($id);
        
        $Item->update([ 'status' => 0 ]);

        return redirect($this->redirect)->with('error','تم  الغاء تفعيل المقاس بنجاح');

    } 

    public function active($id) {

        $Item = Model::findOrFail($id);
        
        $Item->update([ 'status' => 1 ]);

        return redirect($this->redirect)->with('success','تم  تفعيل المقاس بنجاح');
        
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Item = Model::get(['title' ,'main_category_id' , 'sub_category_id','id' ,'status']);
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
            'title' => 'required',
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
        ],
        [
            'title.required' => 'هذا الحقل مطلوب',
            'main_category_id.required' => 'هذا الحقل مطلوب',
            'sub_category_id.required' => 'هذا الحقل مطلوب',
        ]);

        Model::create([
            'title' => $request->title,
            'main_category_id' => $request->main_category_id,
            'sub_category_id' => $request->sub_category_id
        ]); 

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
        $Item = Model::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
        ],
        [
            'title.required' => 'هذا الحقل مطلوب',
            'main_category_id.required' => 'هذا الحقل مطلوب',
            'sub_category_id.required' => 'هذا الحقل مطلوب',
        ]);
 

        $Item->update([
            'title' => $request->title,
            'main_category_id' => $request->main_category_id,
            'sub_category_id' => $request->sub_category_id
        ]); 


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
        
        Product_Sizes::where('size_id',$Item->id)->delete();
        
        $Item->delete();

        return redirect($this->redirect)->with('error','تم الحذف بنجاح');
    }
    
    
   


}
