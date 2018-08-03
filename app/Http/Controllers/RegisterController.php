<?php
namespace App\Http\Controllers;

use Gate;
use Carbon;
use Datatables;
use Notifynder;
use DB;
use Excel;
use Schema;
use Response;
use App\Models\User;
use App\Models\Register;
use App\Models\Country;
use App\Models\Permission;
use App\Models\PermissionDetail;
use App\Http\Requests;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPZen\LaravelRbac\Traits\Rbac;
use Illuminate\Support\Facades\Input;
//use App\Http\Requests\User\UpdateUserRequest;
//use App\Http\Requests\User\StoreUserRequest;
//use App\Repositories\User\UserRepositoryContract;
//use App\Repositories\Role\RoleRepositoryContract;
//use App\Repositories\Setting\SettingRepositoryContract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use App\Traits\activityLog;
use Mail;
class RegisterController extends Controller
{
    use activityLog;
    protected $users;
    protected $roles;
    protected $departments;
   // protected $settings;
//    public function __construct(
//        UserRepositoryContract $users,
//        RoleRepositoryContract $roles
//       // SettingRepositoryContract $settings
//    ) {
//        $this->users = $users;
//        $this->roles = $roles;
//      //  $this->settings = $settings;
//      
//    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
   $registers = Register::paginate(10);
     //return view('donations.index',compact('donations'));
    return view('registers.index')->withRegisters($registers);
   
    }
    public function create()
    {
     $user = User::findOrFail(Auth::id());
     return view('registers.create')->withRoles($roles)->withCountries(Country::orderBy('country_name', 'asc')->pluck('country_name', 'id'));
    }


    public function changeProfileImage(Request $request){
        $data = $request->image; 
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $file_name = str_random(40).'.jpeg';
        $folder_path = public_path().'/images/Media/'.$file_name;
        file_put_contents($folder_path, $data);
        $user = User::find($request->id);
        $user->image_path = $file_name;
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Profile picture changed successfully!'
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
 
    /**
     * Store a newly created resource in storage.
     * @param User $user
     * @return Response
     */
    public function store(StoreUserRequest $userRequest)
    {
        $getInsertedId = $this->registers->create($userRequest);
        return redirect()->route('registers.index');         
    }
    public function statusUpdate($id)
    {
    $sql=DB::table('registers')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $user = User::findorFail($id);
       $user->status=1;
       $user->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $user = User::findorFail($id);
       $user->status=0;
       $user->save();
       echo 0;
       }
    }
    

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
   public function show($id)
   {
       $value = Register::where('registers.id', $id)->first();
        return view('registers.show')->withValue($value);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    $user=DB::table('registers')->select('*','registers.id as id')->leftjoin('permission_details','permission_details.user_id','registers.id')->where('registers.id',$id)->first();
    $permissions=DB::table('registers')->select('*','registers.id as id')->leftjoin('permission_details','permission_details.user_id','registers.id')->where('registers.id',$id)->first();
    return view('registers.edit',compact('permissions'))->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $requestData)
    {
      
            $permission = PermissionDetail::where('user_id',$id);
            $user_id=  Auth::id();
            $input = $requestData->all();
            $created_by=  Auth::id();
            //$input['user_id'] = $userid;
            $role_id = $requestData->role_id;
            $created_by = $created_by;
            $registers = implode(',', $requestData->registers);
            $changepasswords = implode(',', $requestData->changepasswords);
            $permissions = implode(',', $requestData->permissions);
            $donations = implode(',', $requestData->donations);
           
           PermissionDetail::where('user_id',$id)->update(['role_id' => $requestData->role_id,'created_by'=>$created_by,'registers'=>$registers,'changepasswords'=>$changepasswords,'permissions'=>$permissions,'donations'=>$donations]);     
           //  $permission->fill($input)->save();
      
       $user = User::findorFail($id);
        $input = $requestData->all();
        $date_of_birth = $requestData->date_of_birth;
        if ($date_of_birth != '') {
            $input['date_of_birth'] = date('Y-m-d', strtotime($date_of_birth));
        } else {
            $input['date_of_birth'] ='';
        }
         $companyname = "photo";
        if ($requestData->hasFile('image_path')) {
            if (!is_dir(public_path() . '/images/' . $companyname)) {
                mkdir(public_path() . '/images/' . $companyname, 0777, true);
            }
           // $settings = Settings::findOrFail(1);
            $file = $requestData->file('image_path');
            $destinationPath = public_path() . '/images/' . $companyname;
            $filename = str_random(8) . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $input['image_path'] = $filename;
        }
         $user->fill($input)->save();
         
           
        Session::flash('flash_message', "$user->name User Updated Successfully.");

        return redirect()->route('registers.index');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->users->destroy($id);
        
        return redirect()->route('users.index');
    }

    public function createdPassword($token){
        return view('users.activate', ['token' => $token]);
    }
 
    
    
}
