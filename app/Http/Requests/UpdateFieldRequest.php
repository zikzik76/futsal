<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldRequest extends StoreFieldRequest
{
  public function rules()
  {
    $rules = parent::rules();
    $rules['id_lapangan'] = 'required|unique:fields,id_lapangan,'.$this->route('field');
    return $rules;

  }
}
