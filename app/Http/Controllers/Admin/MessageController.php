<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messages;



class MessageController extends Controller
{
    
   
    public function messages()
    {
         $Item = Messages::get();
         return view('admin.message.index',compact('Item'));
    }
    
   
    public function delete_message(Request $request , $id)
    {
        
        $message = Messages::findOrFail($id);
        $message->delete();
        return redirect('admin_panel/messages')->with('error','deleted successfully');
    }

    

}
