@extends('layouts.master')
@section('header')
@php  headingBold(); @endphp
@php  BreadCrumb(); @endphp
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              @php  headingMain() @endphp
                <a href="{{ route('permissions.create')}}"><button class="btn btn-primary pull-right"><i class="fa fa-plus"></i>   @lang('common.titles.add')</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open([
                'route' => 'permissions.store',
                ]) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    {!! Form::label('name', Lang::get('permission.headers.name'), ['class' => 'control-label']) !!}
                    {!! Form::text('name', null,['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', Lang::get('permission.headers.description'), ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit(Lang::get('common.titles.save'), ['class' => 'btn btn-success']) !!}

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</div>

@stop