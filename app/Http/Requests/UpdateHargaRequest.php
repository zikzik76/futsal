<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHargaRequest extends StoreHargaRequest
{

    public function rules()
    {
      $rules = parent::rules();
      $rules['time_group'] = 'required|unique:set_times,time_group,'.$this->route('set_time');
      return $rules;

    }
}
