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
use App\Models\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Requests\Order\UpdateOrderRequest;
//use App\Http\Requests\Order\StoreOrderRequest;
//use App\Repositories\Order\OrderRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Traits\activityLog;

class OrderController extends Controller {
use activityLog;
   protected $orders;
   protected $users;

//    public function __construct(
//    OrderRepositoryContract $orders
//    ) {
//        $this->orders = $orders;
//        $this->users = $users;
//    }
 
    /**
     * Display a listing of the resource.
     ** @Author created by satya 19-07-2018 
     * @return Response
     */
 public function index(Request $request) {
     
        // $orders = Order::paginate(10);
         $orders= DB::table('orders')
        ->join('registers', 'registers.id', '=', 'orders.user_id')
        ->orderBy('orders.id', 'desc')
        ->select('orders.*','registers.*','orders.id as id','orders.created_at as created_at','orders.status as status')
        ->paginate(10);
         return view('orders.index',compact('orders'));
    
 }
 


 /**
     * Display a listing of the resource.
     ** @Author created by satya 19-07-2018 
     * @return Response
     */    
  public function create() {
       
         return view('orders.create');
    }
    
    public function viewDetail($id) {
       $value = DB::table('orders')
        ->join('registers', 'registers.id', '=', 'orders.user_id')
        ->orderBy('orders.id', 'desc')
        ->select('orders.*','registers.*','orders.id as id','orders.created_at as created_at','orders.status as status')
        ->first();
           
        ?>
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-view" >
<!--                <button type="button" class="close" data-dismiss="modal"><font class="white">&times;</font></button>-->
                <h4 class="viewdetails_details"><span class="fa fa-gift"></span>&nbsp;Order</h4>
            </div>
            <div class="modal-body-view">
                 <table class="table table-responsive.view">
                    <tr>       
                        <td><b>Order Number</b></td>
                        <td class="table_normal"><?php  echo $value->order_number ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Name</b></td>
                        <td class="table_normal"><?php echo $value->name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Price</b></td>
                        <td class="table_normal"><?php echo $value->total_price; ?></td>
                    </tr>
                    <tr>
                    <td><b>Created At</b></td>
                     <td class="table_normal"><?php echo dateView($value->created_at); ?>
                     </td>
                     </tr>
                      <tr>
                    <td><b>Status</b></td>
                     <td class="table_normal"><?php if($value->status==1)
                     {
                         echo "Complete";
                     } else {
                         echo "Pending";  
                     
                         
                     }
                     
                   ?>
                     </td>
                        <tr>
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
     * @param Order $orders
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
     * @param Order $orders
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function store(StoreOrderRequest $ordersRequest) {
        $getInsertedId = $this->orders->create($ordersRequest);
        return redirect()->route('orders.index');
    }
/**
     * Store a newly created resource in storage.
     * @param Order 
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    
     public function statusUpdate($id)
    {
    $sql=DB::table('orders')->where('id',$id)->first(); 
     if($sql->status==0)
       {
       $status=  $sql->status;
       $user = Order::findorFail($id);
       $user->status=1;
       $user->save();
       echo 1;
      }else
       {
       $status=  $sql->status;
       $user = Order::findorFail($id);
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
                $orders = Order::findOrFail('id',$id);
                
                  return view('orders.index')->withOrders($orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @Author created by satya 19-07-2018 
     * @return Response
     */
    public function edit($id) {
        $orders = Order::findOrFail($id);
        return view('orders.edit',compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     * * @Author created by satya 19-07-2018 
     */
    public function update($id, UpdateOrderRequest $request) {
        $this->orders->update($id, $request);
        return redirect()->route('orders.index');
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
