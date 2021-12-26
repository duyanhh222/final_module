<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerEditRequest extends FormRequest
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
        return [

            'phone' => 'required|numeric',
            'time_open' => 'required',
            'time_close' => 'required',
            'service' => 'required|numeric',
            'explain' => 'required',


        ];
    }

    public function messages()
    {
        $message = [

            'phone.required' => 'Vui lòng nhập số điện thoại nhà hàng',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
            'time_open.required' => 'Vui lòng nhập giờ mở cửa nhà hàng',
            'time_close.required' => 'Vui lòng nhập giờ mở cửa nhà hàng',
            'service.required' => 'Vui lòng nhập giá dịch vụ nhà hàng',
            'service.numeric' => 'Giá dịch vụ không đúng định dạng',
            'explain.required' => 'Vui lòng nhập giải thích giá dịch vụ nhà hàng',


        ];
        return $message;
    }
}
