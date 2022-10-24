<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
         
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|unique:admin',
                    'mobile' => 'required|numeric|unique:admin',
                    'email' => 'required|email|unique:admin',
                    'password' => 'required|min:6',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|unique:admin,name,' . $this->get('id'),
                    'mobile' => 'required|numeric|unique:admin,mobile,' . $this->get('id'),
                    'email' => 'required|email|unique:admin,email,' . $this->get('id'),
                    'password' => 'nullable',
                ];
                
            }
            default:break;
        }
      
       
    }
    
    
    /*
    public function messages()
    {
        // use trans instead on Lang 
        return [
          'name.required' => 'هذا الحقل مطلوب',
          'password.required' => 'هذا الحقل مطلوب',
          'mobile.required' => 'هذا الحقل مطلوب',
          'email.required' => 'هذا الحقل مطلوب',
         
          
          'name.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',
          'password.min' => 'كلمه المرور لابد ان تحتوي علي الاقل ٦ ارقام',
          'mobile.digits' => 'هذا الحقل لابد ان يحتوي علي ١١ رقم',
          'email.email' => 'يجب ان يحتوي هذا الحقل علي بريد الكتروني',
          'email.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',
          'mobile.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',
       
       ];
    }
    */


}
