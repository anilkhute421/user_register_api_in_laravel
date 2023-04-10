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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    

    public static function signup_manually_user(){
        return [
            'first_name'    => 'required|max:20',
            'last_name'     => 'required|max:20',
            'email'         => 'required|email|unique:users,email',
            'date_of_birth'      => 'required',
            'phone_number'         => 'required|numeric|digits_between:10,12|unique:users,phone_number',
            'ip_address' => 'required',
            'device_type' => 'required',
            'User_type' => 'required',
            'browser'       => 'required'
        ];
    }


    


}
