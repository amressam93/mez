<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Cities extends FormRequest
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
                    'governorate_id' => 'required',
                    'name' => 'required',
                    'shipping_value' => 'required|min:0|numeric'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'governorate_id' => 'required',
                    'name' => 'required',   
                    'shipping_value' => 'required|min:0|numeric'       
                ];
                
            }
            default:break;
        }
      
       
    }
    
    
    public function messages()
    {
        // use trans instead on Lang 
        return [
          
          'governorate_id.required' => 'هذا الحقل مطلوب',

          'shipping_value.required' => 'هذا الحقل مطلوب',
          'shipping_value.numeric' => 'هذا الحقل يجب ان يحتوي علي ارقام',
          'shipping_value.min' => 'هذا الحقل يجب ان يحتوي علي الاقل صفر',
    
          'name.required' => 'هذا الحقل مطلوب',
          'name.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',
       
       ];
    }


}
