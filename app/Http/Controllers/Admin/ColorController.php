<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color as Model;
use App\Models\Product_Colors;

class ColorController extends Controller
{
     
    private $view = 'admin.color.';
    private $redirect = 'admin_panel/color';
    
    public function un_active($id) {

        $Item = Model::findOrFail($id);
        
        $Item->update([ 'status' => 0 ]);

        return redirect($this->redirect)->with('error','تم  الغاء تفعيل اللون بنجاح');

    } 

    public function active($id) {

        $Item = Model::findOrFail($id);
        
        $Item->update([ 'status' => 1 ]);

        return redirect($this->redirect)->with('success','تم  تفعيل اللون بنجاح');
        
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Item = Model::get(['title','id' ,'status']);
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
            'title' => 'required|unique:colors',
            'value' => 'required',
        ],
        [
            'title.required' => 'هذا الحقل مطلوب',
            'title.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',
            'value.required' => 'هذا الحقل مطلوب',
        ]);

        Model::create($this->gteInput($request,null));
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
            'title' => 'required|unique:colors,title,' . $request->id,
            'value' => 'required',
        ],
        [
            'title.required' => 'هذا الحقل مطلوب',
            'title.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',
            'value.required' => 'هذا الحقل مطلوب',
        ]);

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
        $Item = Model::findOrFail($id);
        Product_Colors::where('color_id',$id)->delete();
        $Item->delete();
        return redirect($this->redirect)->with('error','تم الحذف بنجاح');
    }
    
    
    private function gteInput($request,$modelClass) {

        $input = $request->only(['title','value']);        
        
        return  $input;
    }
    
    


}
