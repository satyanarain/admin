<?php

namespace App\Http\Controllers;

use Gate;
use Carbon;
use Notifynder;
use DB;
use Schema;
use Response;
use DataTables;
use App\Models\User;
use App\Models\Notification;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Notification\UpdateNotificationRequest;
use App\Http\Requests\Notification\StoreNotificationRequest;
use App\Repositories\Notification\NotificationRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller {

    protected $blessings;
    protected $users;

    public function __construct(
    NotificationRepositoryContract $blessings
    ) {
        $this->blessings = $blessings;
        $this->users = $users;
    }
 
    /**
     * Display a listing of the resource.
     ** @Author created by satya 19-07-2018 
     * @return Response
     */
 public function index(Request $request) {
     
         $blessings = Notification::paginate(10);
     return view('blessings.index',compact('blessings'));
 }
 


 /**
     * Display a listing of the resource.
     ** @Author created by satya 19-07-2018 
     * @return Response
     */    
  public function create() {
       
         return view('blessings.create');
    }
    
    public function viewDetail($id) {
       $value = Notification::whereId($id)->first();
           
        ?>
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-view" >
<!--                <button type="button" class="close" data-dismiss="modal"><font class="white">&times;</font></button>-->
                <h4 class="viewdetails_details"><span class="fa fa-gift"></span>&nbsp;Notification</h4>
            </div>
            <div class="modal-body-view">
                 <table class="table table-responsive.view">
                    <tr>       
                        <td><b>Name</b></td>
                        <td class="table_normal"><?php  echo $value->name ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Image</b></td>
                            <?php  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/images/donation/thumbnail/"; ?>
                        
                        <td class="table_normal"><img src="<?php echo $url.$value->image_name;?>" >
                            </span></td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td class="table_normal"><?php echo $value->description; ?></td>
                    </tr>
                    <tr>
                        <td><b>Price</b></td>
                        <td class="table_normal"><?php echo $value->price; ?></td>
                    </tr>
                    <td><b>Type</b></td>
                     <td>
                         
                                <?php if($value->donation_list!=''){ ?>
                                <span style="background-color:#398439; color:#fff; padding:2px 10px 2px 15px;"> Notification</span> &nbsp;&nbsp;&nbsp;
                                <?php } ?>
                               
                                <?php if($value->purchase_list!='') { ?>
                                <span style="background-color:#f39c12; color:#fff; padding:2px 10px 2px 15px;">
                                    Purchase
                                </span>  
                                <?php } ?>
                            </td>
                  </table>  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>
    <?php   
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    /**
     * Store a newly created resource in storage.
     * @param Notification $blessings
     * @return Response
     * @Author created by satya 19-07-2018  
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    /**
     * Store a newly created resource in storage.
     * @param Notification $blessings
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function store(StoreNotificationRequest $blessingsRequest) {
        $getInsertedId = $this->blessings->create($blessingsRequest);
        return redirect()->route('blessings.index');
    }
/**
     * Store a newly created resource in storage.
     * @param Notification 
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    
     public function statusUpdate($id)
    {
    $sql=DB::table('blessings')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $user = Notification::findorFail($id);
       $user->status=1;
       $user->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $user = Notification::findorFail($id);
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
    public function show($id) {
                $blessings = Notification::findOrFail('id',$id);
                
                  return view('blessings.index')->withNotifications($blessings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @Author created by satya 19-07-2018 
     * @return Response
     */
    public function edit($id) {
        $blessings = Notification::findOrFail($id);
        return view('blessings.edit',compact('blessings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function update($id, UpdateNotificationRequest $request) {
        $this->blessings->update($id, $request);
        return redirect()->route('blessings.index');
    }
    public function getDuty($id) {
        if($id!='')
        {
        $sql = DB::table('duties')->select('*')->where('route_id', '=', $id)->get();
        if(count($sql)>0)
        {
?>
         <label class="required">Duty</label>
        <select class="form-control" name="duty_id">
        <?php
        foreach ($sql as $value) {
        ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->duty_number; ?></option>

        <?php } ?>
               </select> 

        <?php
    }
    }
    }
}
