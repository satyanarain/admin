<?php

namespace App\Repositories\Notification;

use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Gate;
use Datatables;
use Carbon;
use Notifynder;
use PHPZen\LaravelRbac\Traits\Rbac;
use App\Models\Role;
use App\Models\NotificationLog;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationCreated;
use App\Traits\FormatDates;
use App\Traits\activityLog;
use Image;
class NotificationRepository implements NotificationRepositoryContract {
   use FormatDates;
   use activityLog;
    public function find($id) {
        return Notification::join('donation', 'users.user_type', '=', 'roles.id')->first(1);
    }

    public function getAllNotifications() {
        return Notification::all();
    }

    public function create($requestData) {
        $input = $requestData->all();
        $userid = Auth::id();
        $input['user_id'] = $userid;
 
        
            echo "<pre>";
          print_r($_POST);
          echo "</pre>";      
        
        
          echo "<pre>";
          print_r($_FILES);
          echo "</pre>";
       //exit(); 
          
         
          $image_storage_location = "blessings";
         
       // if ($requestData->hasFile('image_name')) {
            if (!is_dir(public_path() . '/images/' . $image_storage_location)) {
                mkdir(public_path() . '/images/' . $image_storage_location, 0777, true);
              
            }
           
            $file = $requestData->file('image_name');

            $destinationPath = public_path() . '/images/' . $image_storage_location;

             $filename = str_random(8) . '_' . $file->getClientOriginalName();
           
            $file->move($destinationPath, $filename);
        // }

        $input['image_name']=$filename;
        
        $donations = Notification::create($input);
       // Session::flash('flash_message', "Pass Type Created Successfully."); //Snippet in Master.blade.php
        return $donations;
     }
 public function update($id, $requestData) {
       // $this->createLog('App\Models\Notification','App\Models\NotificationLog',$id);
        $donations = Notification::findorFail($id);
        $input = $requestData->all();
        $userid = Auth::id();
        $input[user_id] = $userid;
        
         $image_storage_location = "blessings";
         // $image_storage_location_thumb = "donation/thumbnail";
      //  if ($requestData->hasFile('image_name')) {
            if (!is_dir(public_path() . '/images/' . $image_storage_location)) {
                mkdir(public_path() . '/images/' . $image_storage_location, 0777, true);
              //  mkdir(public_path() . '/images/' . $image_storage_location_thumb, 0777, true);
            }
           
            $file = $requestData->file('image_name');

            $destinationPath = public_path() . '/images/' . $image_storage_location;
           // $destinationPath_thumb = public_path() . '/images/' . $image_storage_location_thumb;
             $filename = str_random(8) . '_' . $file->getClientOriginalName();
             $file->move($destinationPath, $filename);
           $input['image_name']=$filename;
       //  }
       $donations->fill($input)->save();
        Session::flash('flash_message', "Pass Type Updated Successfully.");
        return $donations;
    }

}
