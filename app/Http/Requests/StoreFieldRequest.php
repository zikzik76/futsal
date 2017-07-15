<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_lapangan' => 'required|unique:fields',
            'nama_lapangan'=>'required',
            'harga_sewa'  => 'required|numeric',
            'gambar'      => 'image|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048'
        ];
    }
}
