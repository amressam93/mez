<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Users extends FormRequest
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
                
            }
            case 'PUT':
            case 'PATCH':
            {
                return [

                    'mobile' => 'required|numeric|unique:admin|unique:users,mobile,' . $this->get('id'),
                    'email' => 'required|email|unique:admin|unique:users,email,' . $this->get('id'),
                    'name' => 'required',
                    'gender' => 'required',
                    'gov_id' => 'required',
                    'city_id' => 'required',
                ];
                
            }
            default:break;
        }
      
       
    }
    
    
    


}
