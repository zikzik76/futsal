<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetTimeRequest extends StoreSetTimeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

          $rules = parent::rules();
          $rules['time_group'] = 'required|unique:set_times,time_group,'.$this->route('set_time');
          return $rules;

    }
}
