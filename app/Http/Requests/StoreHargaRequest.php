<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreHargaRequest extends FormRequest
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
          'time_group'     => 'required|numeric',
          'status_pelanggan'     => 'required',
          'id_lapangan' => 'required|numeric',
          'harga_sewa'     => 'required|numeric'
        ];
    }
}
