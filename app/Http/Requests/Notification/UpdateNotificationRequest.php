<?php

namespace App\Http\Requests\Notification;

use App\Http\Requests\Request;

class UpdateNotificationRequest extends Request
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
                  // 'name' => 'required',
                   //'description' => 'required',
                  // 'price' => 'required',
                 //   'status'  => 'required',
                  // 'image_path' => 'required',
                   //'purchase_list' => 'required',
                   //donation_list' => 'required'
                   //'donation_list' => 'required_without_all: purchase_list, donation_list'
             ];
        
    }

}
