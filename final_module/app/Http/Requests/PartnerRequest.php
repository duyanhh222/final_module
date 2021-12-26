<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'name' => 'required|min:1|max:50',
            'phone' => 'required|numeric',
            'time_open' => 'required',
            'time_close' => 'required',
            'service' => 'required|numeric',
            'explain' => 'required',
            'address' => 'required|min:1',

        ];
    }
    public function messages()
    {
        $message = [
            'name.required' => 'Vui lòng nhập tên nhà hàng',
            'name.min' => 'Tên nhà hàng quá ngắn',
            'name.max' => 'Tên nhà hàng quá dài',
            'phone.required' => 'Vui lòng nhập số điện thoại nhà hàng',
            'phone.numeric' => 'Số điện thoại không đúng định dạng',
            'time_open.required' => 'Vui lòng nhập giờ mở cửa nhà hàng',
            'time_close.required' => 'Vui lòng nhập giờ mở cửa nhà hàng',
            'service.required' => 'Vui lòng nhập giá dịch vụ nhà hàng',
            'service.numeric' => 'Giá dịch vụ không đúng định dạng',
            'explain.required' => 'Vui lòng nhập giải thích giá dịch vụ nhà hàng',
            'address.required' => 'Vui lòng nhập địa chỉ nhà hàng',
            'address.min' => 'Địa chỉ nhà hàng quá ngắn',

        ];
        return $message;
    }
}
