<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Top_Offer extends FormRequest
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
                    'category_id' => 'required',
                    'category_id.*' => 'required',
                    'title' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'category_id' => 'required',
                    'category_id.*' => 'required',
                    'title' => 'required',
                ];

            }
            default:break;
        }


    }


    public function messages()
    {
        // use trans instead on Lang
        return [


          'title.required' => 'هذا الحقل مطلوب',
          'description.required' => 'هذا الحقل مطلوب',

       ];
    }


}
