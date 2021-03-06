@extends('layouts.master')
@section('header')
<h1>{{headingBold()}}</h1>
{{BreadCrumb()}}
@stop
@section('content')
@include('partials.form_header')



                {!! Form::open([
                'route' => 'orders.store',
                'files'=>true,
                'enctype' => 'multipart/form-data',
                'class'=>'form-horizontal',
                'autocomplete'=>'off',
                'id'=>'frmTest',
                'onSubmit'=>"return validateForm()"
                ]) !!}
                @include('orders.form', ['submitButtonText' => Lang::get('user.headers.create_submit')])

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        </div>
        <!-- /.box -->

    <!-- /.col -->


@stop