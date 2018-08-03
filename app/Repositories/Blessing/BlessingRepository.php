<?php

namespace App\Repositories\Blessing;

use App\Models\Blessing;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Gate;
use Datatables;
use Carbon;
use Notifynder;
use PHPZen\LaravelRbac\Traits\Rbac;
use App\Models\Role;
use App\Models\BlessingLog;
use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlessingCreated;
use App\Traits\FormatDates;
use App\Traits\activityLog;
use Image;
class BlessingRepository implements BlessingRepositoryContract {
   use FormatDates;
   use activityLog;
   
    public function find($id) {
        return Blessing::join('donation', 'users.user_type', '=', 'roles.id')->first(1);
    }

    public function getAllBlessings() {
        return Blessing::all();
    }

    public function create($requestData) {
        $input = $requestData->all();
        $userid = Auth::id();
        $input['user_id'] = $userid;

$image_storage_location = "blessings";
  if ($requestData->hasFile('image_name')) {
            if (!is_dir(public_path() . '/images/' . $image_storage_location)) {
                mkdir(public_path() . '/images/' . $image_storage_location, 0777, true);
              
            }
           
            $file = $requestData->file('image_name');
            $destinationPath = public_path() . '/images/' . $image_storage_location;
            $filename = str_random(8) . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
     }

     $input['created_date']=$this->mySqlDate($requestData->created_date);
     
     
        $input['image_name']=$filename;
        
        $donations = Blessing::create($input);
       // Session::flash('flash_message', "Pass Type Created Successfully."); //Snippet in Master.blade.php
        return $donations;
     }
 public function update($id, $requestData) {
       // $this->createLog('App\Models\Blessing','App\Models\BlessingLog',$id);
        $donations = Blessing::findorFail($id);
        $input = $requestData->all();
        $userid = Auth::id();
        $input[user_id] = $userid;
        
         $image_storage_location = "blessings";
         // $image_storage_location_thumb = "donation/thumbnail";
   if ($requestData->hasFile('image_name')) {
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
       }
         $input['created_date']=$this->mySqlDate($requestData->created_date);
       
       
       $donations->fill($input)->save();
        Session::flash('flash_message', "Pass Type Updated Successfully.");
        return $donations;
    }

}
