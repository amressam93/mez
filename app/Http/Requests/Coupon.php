<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Coupon extends FormRequest
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
                    'title' => 'required|unique:coupon',
                    'value' => 'required|numeric|min:1|max:100'

                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|unique:coupon,title,' . $this->get('id'),
                    'value' => 'required|numeric|min:1|max:100'
                ];

            }
            default:break;
        }


    }




}
