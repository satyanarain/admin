<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return auth()->user()->can('user-create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
            return [
                 'name' => 'required',
                // 'user_name' => 'required|user_name|unique:users,user_name',
                 'email' => 'required',
                 'country' => 'required',
                 'mobile' => 'required'
             ];
        
    }
}
