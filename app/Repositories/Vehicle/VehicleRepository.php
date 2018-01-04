<?php

namespace App\Repositories\Vehicle;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Gate;
use Notifynder;
use PHPZen\LaravelRbac\Traits\Rbac;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VehicleCreated;
class VehicleRepository implements VehicleRepositoryContract {
  public function find($id) {
        return Vehicle::join('services', 'users.user_type', '=', 'roles.id')->first();
    }

    public function getAllVehicles() {
        return Vehicle::all();
    }

    public function create($requestData) {
        $input = $requestData->all();
          $vehicle = Vehicle::create($input);
        Session::flash('flash_message', "Vehicle Created Successfully."); //Snippet in Master.blade.php
        return $vehicle;
    }

    public function update($id, $requestData) {
       $vehicle = Vehicle::findorFail($id);
       $input = $requestData->all();
       $vehicle->fill($input)->save();
       Session::flash('flash_message', "Vehicle Updated Successfully.");
       return $vehicle;
    }


}
