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
                <h4 class="viewdetails_details"><span class="fa fa-gift"></span>&nbsp;Blessing</h4>
            </div>
            <div class="modal-body-view">
                 <table class="table table-responsive.view">
                    <tr>       
                        <td><b>Name</b></td>
                        <td class="table_normal"><?php  echo $value->description ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Audio / Video</b></td>
                            <?php  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/images/blessings/"; ?>
                        
                        <td class="table_normal">
                            <?php 
                           
                              if ($value->image_name!= '') {
                                  $array = explode('.', $value->image_name);

                                  $extension = end($array);
                                  $extension_lower = strtolower($extension);
                                  $video = array('WEBM', 'MPG', 'MP2', 'MPEG', 'MPE', 'MPV', 'MP4', 'M4P', 'M4V');
                                  $video_lower = array_map('strtolower', $video);
                                  $audio = array('MP3', 'M4A', 'MP2', 'AAC', 'OGA');
                                  $audio_lover = array_map('strtolower', $audio);
                                  if (in_array($extension_lower, $audio_lover)) {
                                      ?>

                               <audio controls>
<!--                                        <source src="horse.ogg" type="audio/ogg">-->
                                        <source src="<?php echo $url.$value->image_name ?>">
                                     </audio> 
                               <?php } else{ ?>
                               <video width="320" height="240" controls src="<?php echo $url.$value->image_name ?>"></video> 
<!--                              <video id="video" src="http://upload.wikimedia.org/wikipedia/commons/7/79/Big_Buck_Bunny_small.ogv" ></video>-->
                                 <?php }}else{ 
                                    echo "N/A";
                                  ?>
                              
                              <?php } ?>
                         </td>
                    </tr>
                    
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
