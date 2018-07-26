<?php

namespace App\Http\Requests\Notification;

use App\Http\Requests\Request;

class StoreNotificationRequest extends Request
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
                   //'name' => 'required',
                 //  'description' => 'required',
                   //'price' => 'required',
                //  'image_name' => 'required',
                 // 'image_name.required'  => 'image is required',
               //   'status'  => 'required',
                //  'donation_list' => 'required_without_: purchase_list',
//                   'purchase_list' => 'required_without:donation_list',
//                  'donation_list' => 'required_without:purchase_list',
//                'purchase_list' 	=> 'required|exists:users,username,email'
                   //'purchase_list' => 'required',
                   //'donation_list' => 'required'
                   
             ];
        
    }
}
