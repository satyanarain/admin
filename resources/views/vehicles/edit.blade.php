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
                @if(Entrust::hasRole('administrator'))
                <a href="{{ route('vehicles.create')}}"><button class="btn btn-primary pull-right"><i class="fa fa-plus"></i>   @lang('common.titles.add')</button></a>
            @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               {!! Form::model($vehicles, [
        'method' => 'PATCH',
        'route' => ['vehicles.update', $vehicles->id],
        'files'=>true,
        'enctype' => 'multipart/form-data'
        ]) !!}
               @include('vehicles.form', ['submitButtonText' => Lang::get('user.headers.update_submit')])

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>

@stop
