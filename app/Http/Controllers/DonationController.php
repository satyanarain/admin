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
use App\Models\Donation;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Donation\UpdateDonationRequest;
use App\Http\Requests\Donation\StoreDonationRequest;
use App\Repositories\Donation\DonationRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DonationController extends Controller {

    protected $donations;
    protected $users;

    public function __construct(
    DonationRepositoryContract $donations
    ) {
        $this->donations = $donations;
        $this->users = $users;
    }
 
    /**
     * Display a listing of the resource.
     ** @Author created by satya 19-07-2018 
     * @return Response
     */
 public function index(Request $request) {
     
         $donations = Donation::paginate(10);
     return view('donations.index',compact('donations'));
 }
 


 /**
     * Display a listing of the resource.
     ** @Author created by satya 19-07-2018 
     * @return Response
     */    
  public function create() {
       
         return view('donations.create');
    }
    
    public function viewDetail($id) {
       $value = Donation::whereId($id)->first();
           
        ?>
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-view" >
<!--                <button type="button" class="close" data-dismiss="modal"><font class="white">&times;</font></button>-->
                <h4 class="viewdetails_details"><span class="fa fa-gift"></span>&nbsp;Donation</h4>
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
                                <span style="background-color:#398439; color:#fff; padding:2px 10px 2px 15px;"> Donation</span> &nbsp;&nbsp;&nbsp;
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
     * @param Donation $donations
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
     * @param Donation $donations
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function store(StoreDonationRequest $donationsRequest) {
        $getInsertedId = $this->donations->create($donationsRequest);
        return redirect()->route('donations.index');
    }
/**
     * Store a newly created resource in storage.
     * @param Donation 
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    
     public function statusUpdate($id)
    {
    $sql=DB::table('donations')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $user = Donation::findorFail($id);
       $user->status=1;
       $user->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $user = Donation::findorFail($id);
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
                $donations = Donation::findOrFail('id',$id);
                
                  return view('donations.index')->withDonations($donations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @Author created by satya 19-07-2018 
     * @return Response
     */
    public function edit($id) {
        $donations = Donation::findOrFail($id);
        return view('donations.edit',compact('donations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function update($id, UpdateDonationRequest $request) {
        $this->donations->update($id, $request);
        return redirect()->route('donations.index');
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
