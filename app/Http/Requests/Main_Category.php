<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Main_Category extends FormRequest
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
                    'title' => 'required|unique:main_category',
                    'url' => 'required',
                    'pic' => 'required|image|mimes:jpg,png,jpeg',

                    ];}
            case 'PATCH':
            {
                return [
                    'title' => 'required|unique:main_category,title,'.$this->get('id'),
                    'url' => 'required',
                    'pic' => 'nullable|image|mimes:jpg,png,jpeg',
                ];

            }
            default:break;
        }


    }


    public function messages()
    {
        // use trans instead on Lang
        return [

          'pic.required' => 'هذا الحقل مطلوب',
          'pic.image' => 'هذا الحقل يجب أن يحتوي علي صور',
          'pic.mimes' => 'هذا الحقل يجب أن يحتوي علي صور بصيغه jpg,jpeg,png',
           'url.required' => 'هذا الحقل مطلوب',
          'title.required' => 'هذا الحقل مطلوب',
          'title.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',

       ];
    }


}
