<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJadwalRequest extends StoreJadwalRequest
{
  public function rules()
  {
    $rules = parent::rules();
    $rules['tanggal'] = 'required|unique:jadwals,tanggal,'.$this->route('jadwal');
    return $rules;

  }
}
