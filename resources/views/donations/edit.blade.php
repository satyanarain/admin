@extends('layouts.master')
@section('header')
<h1>{{headingBold()}}</h1>
{{BreadCrumb()}}
@stop
@section('content')
@include('partials.form_header')

               {!! Form::model($donations, [
        'method' => 'PATCH',
        'route' => ['donations.update', $donations->id],
        'files'=>true,
        'id'=>'frmTest',
         'class'=>'form-horizontal',
         'onSubmit'=>'return validateForm()',
        'enctype' => 'multipart/form-data'
        ]) !!}
               @include('donations.form', ['submitButtonText' => Lang::get('user.headers.update_submit')])

                {!! Form::close() !!}
             </div>
            <!-- /.box-body -->
        </div>
        </div>
        </div>
        <!-- /.box -->

    <!-- /.col -->


@stop
