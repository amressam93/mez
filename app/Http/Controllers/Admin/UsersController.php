<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Users as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Invoice_Details;
use App\Models\Users as Model;

class UsersController extends Controller
{
     
    private $view = 'admin.users.';
    private $redirect = 'admin_panel/users';


    public function inovice_details($user_id,$invoice_id)
    {
        $invoice = Invoice::findOrfail($invoice_id);
        $Item = Invoice_Details::where('user_id',$user_id)->where('invoice_id',$invoice_id)->get();
        return view('admin.users.invoice_details',compact('Item','invoice'));
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Item = Model::get(['name', 'email','mobile','id']);
        return view($this->view . 'index',compact('Item'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(modelRequest $request)
    {
        /*
        Model::create($this->gteInput($request,null));
        return redirect($this->redirect)->with('success','Creaed successfully');
        */
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
        /*
        $Item = Model::findOrFail($id);
        $Item->delete();
        return redirect($this->redirect)->with('error','The deletion was successful');
        */
    }

    private function gteInput($request,$modelClass) {

        $input = $request->only([ 
            'name', 'email','mobile','gender','gov_id','city_id'        
        ]);
        
        if(isset($modelClass) ) {

            if($request->password != null) {
                $input['password'] =  bcrypt($request->password);
            } else {
                $input['password'] =  $modelClass->password;
            }

       } else {
            $input['password'] =  bcrypt($request->password);
       }
        
        return  $input;
    }
    
    
   


}
