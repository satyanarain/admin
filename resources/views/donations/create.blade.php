@extends('layouts.master')
@section('header')
<h1>{{headingBold()}}</h1>
{{BreadCrumb()}}
@stop
@section('content')
@include('partials.form_header')

                {!! Form::open([
                'route' => 'donations.store',
                'files'=>true,
                'enctype' => 'multipart/form-data',
                'class'=>'form-horizontal',
                'autocomplete'=>'off',
                'id'=>'frmTest',
                'onSubmit'=>"return validateForm()"
                ]) !!}
                @include('donations.form', ['submitButtonText' => Lang::get('user.headers.create_submit')])

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        </div>
        <!-- /.box -->

    <!-- /.col -->
<script>
 function validateForm(){
     
     //$("#")
  
      var ext = $('#image_name').val().split('.').pop().toLowerCase();
     if(ext!='')
     {
      if($.inArray(ext, ['webm', 'mpg', 'mp2', 'mpeg', 'mpe', 'mpv', 'mp4', 'm4p', 'm4v','mp3', 'm4a', 'mp2', 'aac', 'oga']) == -1) {
       $("#output").hide();
       alert('invalid extension!');
       return false;

       }
     }
</script>
@stop