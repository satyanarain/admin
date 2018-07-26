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
                'route' => 'blessings.store',
                'files'=>true,
                'enctype' => 'multipart/form-data',
               'id' => 'form1',
                'autocomplete'=>'off',
              
                ]) !!}

  {!! Form::close() !!}
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="display_none"></th>
                            
                            <th>@lang('Audio / Video')</th>
                            <th>@lang('blessings')</th>
                          {{  actionHeading('Action', $newaction='') }}
                        </tr>
                    </thead>
                      <tbody>
                         
                        @foreach($blessings as $value)
                        <tr class="nor_f">
                            <th class="display_none"></th>
                       
                            <td>{{ Html::image('images/notifications/thumbnail/'.$value->image_name,'alt',array('class'=>'test'))}}</td>
                            <td>{{ $value->description }}</td>
                            
                            {{ actionEdit('edit',$value->id,$value->status)}}
                         </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{ $blessings->links() }}
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
 var urldata=   '/blessings/' + view_detail + '/' +id;

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
    $("#"+id).removeClass('btn-danger');   
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