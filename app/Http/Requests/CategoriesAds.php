<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesAds extends FormRequest
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
                    'pic1' => 'required|image|mimes:jpg,png,jpeg',
                    'status' => 'required',
                    'title' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'category_id' => 'required',
                    'category_id.*' => 'required',
                    'pic1' => 'nullable|image|mimes:jpg,png,jpeg',
                    'status' => 'required',
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

          'pic.required' => 'هذا الحقل مطلوب',
          'pic.image' => 'هذا الحقل يجب أن يحتوي علي صور',
          'pic.mimes' => 'هذا الحقل يجب أن يحتوي علي صور بصيغه jpg,jpeg,png',

          'title.required' => 'هذا الحقل مطلوب',
          'title.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',

       ];
    }


}
