<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Coupon as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Coupon as Model;

class CouponController extends Controller
{
     
    private $view = 'admin.coupon.';
    private $redirect = 'admin_panel/coupon';
    

    public function coupon_accept($id) {

        $coupon = Model::findOrFail($id);
        $coupon->update([ 'status' => '1' ]);

        return redirect()->back()->with('success','تم تفعيل الكوبون بنجاح');
    }

    

    public function coupon_refused($id) {

        $coupon = Model::findOrFail($id);
        $coupon->update(['status' => '0']);
        return redirect()->back()->with('error','تم الغاء هذا الكوبون بنجاح');


    }
    
    
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
        $Item = Model::findOrFail($id);
        $Item->update(['status' => '0']);
        return redirect($this->redirect)->with('error','تم الغاء هذا الكوبون بنجاح');
        
    }
    
    
    private function gteInput($request,$modelClass) {

        $input = $request->only(['title','value']);        
        
        if(! isset($modelClass)) {
            $input['status'] = 1;
        }
        
        return  $input;
    }
    
    


}
