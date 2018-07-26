@extends('layouts.master')
@section('header')
<h1>{{headingBold()}}</h1>
{{BreadCrumb()}}
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
            <div class="box-header">
               <h3 class="box-title">{{headingMain()}}</h3>
         {{-- createButton('create','Add') --}}
            </div>
          
          {!! Form::open([
                'route' => 'orders.store',
                'files'=>true,
                'enctype' => 'multipart/form-data',
               'id' => 'form1',
                'autocomplete'=>'off']) !!}
 {!! Form::close() !!}
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="display_none"></th>
                            <th>@lang('Order Number')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Ceated')</th>
                            <th>@lang('Total Price')</th>
                            <th>@lang('Payment Status')</th>
                               {{  actionHeading('Action', $newaction='') }}
                        </tr>
                    </thead>
                      <tbody>
                         
                        @foreach($orders as $value)
                        <tr class="nor_f">
                            <th class="display_none"></th>
                            <td>{{$value->order_number}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{dateView($value->created_at)}}</td>
                            <td>{{$value->total_price}}</td>
                             <td> <div 
                 <?php
                 
                $status= $value->status;
                $id= $value->id;
                 
                 
                 if($status==1)
                 { ?>
                 class="btn btn-small btn-success" 
               <?php }else{ ?>
                    class="btn btn-small btn-danger" 
              <?php } ?>
                 id="<?php echo $id; ?>" onclick="statusUpdate_new(<?php echo $id; ?>)">
                   <?php if($status==1)
                 { ?>
                    <span id="<?php echo "ai".$id; ?>"><i class="fa fa-check-circle"></i>&nbsp;Complete</span>
               <?php }else{ ?>
                     <span id="<?php echo "ai".$id; ?>"><i class="fa fa-times-circle"></i>&nbsp;Pending</span>
              <?php } ?></div></td>
                            {{ actionEdit('edit',$value->id,$value->status)}}
                         </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{ $orders->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
</div>
<div class="modal fade" id="view_detail" role="dialog">
    erwerewre
    
 </div>
<script>
 function viewDetails(id,view_detail)
{
//alert("rtrtr");
 var urldata=   '/orders/' + view_detail + '/' +id;

$.ajax({
		type: "GET",
		url: urldata,
		cache: false,
		success: function(data){
                 // alert(data);
                 $("#" + view_detail).modal('show');
                  $("#"+view_detail).html(data);
		}
	});
  
   }
   
</script>
<script>
    


function statusUpdate_new(id)
{
 //  alert("rere")
 $.ajax({
    type:'get',
    url:'/orders/statusupdate/'+id,
   success:function(data)
    {
   
    if(data==1)
    {
    $("#"+id).removeClass('btn-danger');   
    $("#"+id).addClass('btn-success');  
    $("#ai"+id).html('Complete');    
    }else{
    $("#"+id).removeClass('btn-success');   
    $("#"+id).addClass('btn-danger');    
    $("#ai"+id).html('Pending');    
    }
    
    }
});
}

</script>
<!-- /.row -->

@include('partials.table_script')

@stop