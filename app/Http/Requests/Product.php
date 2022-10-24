<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
                    'main_category_id' => 'required',
                    'sub_category_id' => 'required',
                    'brand' => 'required',
                    'price_before_discount' => 'required|numeric|min:0',
                    'discount' => 'required|numeric|min:0|max:100',
                    'short_description' => 'required',
                    'long_description' => 'required',
                    'title' => 'required',
                    'url' => 'required',
                    'pic' => 'required|image|mimes:jpg,png,jpeg',
                    'color_id' => 'required',
                    'size1' => 'required|numeric',
                    'quantity1' => 'required|numeric|min:1',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'main_category_id' => 'required',
                    'sub_category_id' => 'required',
                    'brand' => 'required',
                    'price_before_discount' => 'required|numeric|min:1',
                    'discount' => 'required|numeric|min:0|max:100',
                    'short_description' => 'required',
                    'long_description' => 'required',
                    'title' => 'required',
                    'url' => 'required',
                    'pic' => 'nullable|image|mimes:jpg,png,jpeg',
                    'color_id' => 'required',
                    'size1' => 'required|numeric',
                    'quantity1' => 'required|numeric|min:1',

                ];

            }
            default:break;
        }


    }



    public function messages()
    {
        // use trans instead on Lang
        return [

          'main_category_id.required' => 'هذا الحقل مطلوب',
          'sub_category_id.required' => 'هذا الحقل مطلوب',
          'color_id.required' => 'هذا الحقل مطلوب',

          'price_before_discount.required' => 'هذا الحقل مطلوب',
          'discount.required' => 'هذا الحقل مطلوب',
          'price_before_discount.numeric' => 'هذا الحقل يجب ان يحتوي علي ارقام فقط ',
          'discount.numeric' => 'هذا الحقل يجب ان يحتوي علي ارقام فقط ',
          'price_before_discount.min' => 'هذا الحقل يجب ان يحتوي علي قيمة اكبر من صفر  ',
          'discount.min' => 'هذا الحقل يجب ان يحتوي علي قيمة علي الاقل صفر  ',

          'size1.required' => 'هذا الحقل مطلوب',
          'size1.numeric' => 'هذا الحقل يجب ان يحتوي علي ارقام فقط ',
          'quantity1.required' => 'هذا الحقل مطلوب',
          'quantity1.min' => 'هذا الحقل يجب ان يحتوي علي قيمة اكبر من صفر  ',


          'short_description.required' => 'هذا الحقل مطلوب',
          'long_description.required' => 'هذا الحقل مطلوب',


          'pic.required' => 'هذا الحقل مطلوب',
          'pic.image' => 'هذا الحقل يجب أن يحتوي علي صور',
          'pic.mimes' => 'هذا الحقل يجب أن يحتوي علي صور بصيغه jpg,jpeg,png',

          'title.required' => 'هذا الحقل مطلوب',
          'title.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',

          'url.required' => 'هذا الحقل مطلوب',

          'brand.required' => 'هذا الحقل مطلوب',
          'brand.unique' => 'هذا الحقل لا يجب اي يحتوي علي قيم موجوده مسبقا',

       ];
    }



}
