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
             @include('partials.message')
            <!-- /.box-header -->
            <div class="panel-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        
                        
                        <tr>
                            <th class="display_none"></th>
                            <th>@lang('user.headers.name')</th>
                            <th>@lang('Phone')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Country')</th>
                            <th>@lang('State')</th>
                            <th>@lang('City')</th>
                            <th>@lang('Country Code')</th>
                            <th>@lang('IP Address')</th>
                            <th>@lang('Created At')</th>
                             {{  actionHeading('Action', $newaction='') }}
                        </tr>
                    </thead>
                    <tbody>
           @foreach($registers as $value)
                        <tr class="nor_f">
                            <th class="display_none"></th>
                            <td>{{$value->name}}</td>
                            <td>+ {{$value->country_code}}-{{$value->phone}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->country}}</td>
                            <td>{{$value->state}}</td>
                            <td>{{$value->city}}</td>
                            <td>{{$value->country_code}}</td>
                            <td>{{$value->ip_address}}</td>
                            <td>{{$value->created_at}}</td>
                            <td><a  class="btn btn-small btn-primary" href="<?php echo route('registers.show', $value->id); ?>" ><span class="glyphicon glyphicon-search"></span>&nbsp;View</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  {{ $registers->links() }}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 function statusUpdate(id)
{
 $.ajax({
    type:'get',
    url:'/registers/statusupdate/'+id,
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