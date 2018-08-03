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
use App\Models\Blessing;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blessing\UpdateBlessingRequest;
use App\Http\Requests\Blessing\StoreBlessingRequest;
use App\Repositories\Blessing\BlessingRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Traits\activityLog;
class BlessingController extends Controller {
  use activityLog;
    protected $blessings;
    protected $users;

    public function __construct(
    BlessingRepositoryContract $blessings
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
       $blessings = Blessing::paginate(10);
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
       $value = Blessing::whereId($id)->first();
           
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
                                  <video width="320" height="240"poster="intro.jpg" autoplay controls loop>
                                  <source src="<?php echo $url.$value->image_name ?>" type="video/<?php echo $extension ?>" />
                                  </video>
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
     * @param Blessing $blessings
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
     * @param Blessing $blessings
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function store(StoreBlessingRequest $blessingsRequest) {
      $date=$this->mySqlDate($blessingsRequest->created_date);
      $sql=Blessing::where('created_date',$date)->count();
    if($sql==0)
    {
      $getInsertedId = $this->blessings->create($blessingsRequest);
      echo 1;
      exit();
    } else {
        
     $date= $this->mySqlDate($blessingsRequest->created_date);
     $confirm= $blessingsRequest->confirm;
     $description= $blessingsRequest->description;
     
       if($confirm!='')
       {
           
       if ($blessingsRequest->hasFile('image_name')) {
            if (!is_dir(public_path() . '/images/' . $image_storage_location)) {
                mkdir(public_path() . '/images/' . $image_storage_location, 0777, true);
              //  mkdir(public_path() . '/images/' . $image_storage_location_thumb, 0777, true);
            }
           
            $file = $blessingsRequest->file('image_name');

            $destinationPath = public_path() . '/images/' . $image_storage_location;
           // $destinationPath_thumb = public_path() . '/images/' . $image_storage_location_thumb;
             $filename = str_random(8) . '_' . $file->getClientOriginalName();
             $file->move($destinationPath, $filename);
          // $input['image_name']=$filename;
       }
       
       //$input['created_date']=$this->mySqlDate($blessingsRequest->created_date); 
         if($description!='')
         {
        DB::table('blessings')->where('created_date', $date)->update(array('description' => $description));
         } else {
           DB::table('blessings')->where('created_date', $date)->update(array('image_name'=>$filename));   
         }
        
         }
     } 
   }
/**
     * Store a newly created resource in storage.
     * @param Blessing 
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    
     public function statusUpdate($id)
    {
    $sql=DB::table('blessings')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $user = Blessing::findorFail($id);
       $user->status=1;
       $user->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $user = Blessing::findorFail($id);
       $user->status=0;
       $user->save();
       echo 0;
       }
    }
     public function destroyBlessing($id)
    {
    $sql=Blessing::where('id',$id)->first(); 
    if($sql->image_name!='')
    {
     unlink(public_path() . '/images/blessings/' . $sql->image_name);  
    }
     $blessings = Blessing::destroy($id);
     }
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
                $blessings = Blessing::findOrFail('id',$id);
                
                  return view('blessings.index')->withBlessings($blessings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @Author created by satya 19-07-2018 
     * @return Response
     */
    public function edit($id) {
        $blessings = Blessing::findOrFail($id);
        return view('blessings.edit',compact('blessings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function update($id, UpdateBlessingRequest $request) {
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
