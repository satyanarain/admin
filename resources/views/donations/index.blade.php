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
         {{ createButton('create','Add') }}
            </div>
          
          {!! Form::open([
                'route' => 'donations.store',
                'files'=>true,
                'enctype' => 'multipart/form-data',
               'id' => 'form1',
                'autocomplete'=>'off',
              
                ]) !!}
<!--  <div class="form-group">
   {!! Form::label('status', Lang::get('Status'), ['class' => 'col-md-3 control-label']) !!}
     <div class="col-md-7 col-sm-12 required">
      {!! Form::select('status',array('1'=>'Active','0'=>'Inactive'),null,['class'=>'form-control','onchange'=>'searchRecord(this.value)'])!!}
</div>
</div>-->
  {!! Form::close() !!}
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="display_none"></th>
                            <th>@lang('Name')</th>
                            <th align="center">@lang('Image')</th>
                            <th>@lang('Description')</th>
                            <th>@lang('Price (INR)')</th>
                            <th>@lang('Type')</th>
                            {{  actionHeading('Action', $newaction='') }}
                        </tr>
                    </thead>
                      <tbody>
                         
                        @foreach($donations as $value)
                        <tr class="nor_f">
                            <th class="display_none"></th>
                            <td>{{$value->name}}</td>
                            <td align="center">{{ Html::image('images/donation/thumbnail/'.$value->image_name,'alt',array('class'=>'test'))}}</td>
                            <td><?php echo substr($value->description,0,50)."...." ?></td>
                            <td>{{$value->price}}</td>
                            <td>
                                @if($value->donation_list!='')
                                <span class="btn btn-warning rounded_cornar"> 
                                    Donation</span>
                                @endif
                               
                                @if($value->purchase_list!='')
                                <span class="btn btn-default gray_btn rounded_cornar">
                                    Purchase
                                </span>  
                                @endif
                            </td>
                            
                           {{ actionEdit('edit',$value->id,$value->status)}}
                         </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{ $donations->links() }}
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
//alert(id)
 var urldata=   '/donations/' + view_detail + '/' +id;

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
    
    
    
function searchRecord(id)
{
   // alert("eww");
    document.getElementById("form1").submit();
}

function statusUpdate(id)
{
 $.ajax({
    type:'get',
    url:'/crew_details/statusupdate/'+id,
   success:function(data)
    {
   
    if(data==1)
    {
    $("#"+id).removeClass('btn-danger ');   
    $("#"+id).addClass('btn-success');  
    $("#ai"+id).html('Active');    
    }else{
    $("#"+id).removeClass('btn-success');   
    $("#"+id).addClass('btn-danger');    
    $("#ai"+id).html('Inactive');    
    }
    
    }
});
}





</script>
<!-- /.row -->

@include('partials.table_script')

@stop