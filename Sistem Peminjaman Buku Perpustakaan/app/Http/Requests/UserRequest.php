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
        if($this->method() == 'PATCH') {
          $email_rules    = ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->get('id').',id'];
          $hp_rules       = ['required', 'numeric', 'digits_between:10,15', 'unique:users,no_telp,'.$this->get('id').',id'];
          $username       = ['required','unique:users,username,'.$this->get('id')];
          $password       = ['sometimes', 'nullable', 'string', 'min:8'];
        }
        else {
          $email_rules    = ['required', 'string', 'email', 'max:255', 'unique:users'];
          $hp_rules       = ['required', 'numeric', 'digits_between:10,15', 'unique:users,no_telp'];
          $username       = ['required','unique:users,username'];
          $password       = ['required', 'string', 'min:8'];
        }
        return [
          'name' => ['required', 'string', 'max:255'],
          'tempat_lahir' => ['required', 'max:100', 'string'],
          'tanggal_lahir' => ['required', 'date'],
          'no_telp' => $hp_rules,
          'alamat' => ['required', 'max:255'],
          'email' => $email_rules,
          'status' => ['required'],
          'username' => $username,
          'password' => $password
        ];
    }
}
