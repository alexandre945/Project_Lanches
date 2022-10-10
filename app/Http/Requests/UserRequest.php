<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'street'  => 'required',
            'nunber'  => 'required',
            'city'    => 'required',
            'district'=> 'required',
            'zipcode' => 'required'
        ];
    }
    public function  messages()
      {
        return[
          'street.required'  => 'o campo rua é obrigatório',
          'nunber.required'   =>  'o campo numéro é obrigatório',
          'city.required'    =>  'o campo cidade é obrigatório',
          'district.required'    => 'o campo bairro é obrigatório',
          'zipcode.required'    =>  'o campo cp é obrigatório'
        ];
      }
}
