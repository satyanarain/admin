@extends('layouts.master')
@section('header')
<h1>{{headingBold()}}</h1>
{{BreadCrumb()}}
@stop
@section('content')
@include('partials.form_header')

                {!! Form::open([
                'route' => 'blessings.store',
                'files'=>true,
                'enctype' => 'multipart/form-data',
                'class'=>'form-horizontal',
                'autocomplete'=>'off',
                'id'=>'frmTest',
                'onSubmit'=>"return validateForm()"
                ]) !!}
                @include('blessings.form', ['submitButtonText' => Lang::get('user.headers.create_submit')])

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        </div>
        <!-- /.box -->

    <!-- /.col -->
<script>
$(document).ready(function(){
$(document).on('click', '#save', function(){
    
    //alert("erwrr")
    
 description= $("#description").val();
   image_name= $("#image_name").val();
   created_date= $("#created_date").val();
   
   
    if(description=='' && image_name=='')
      {
      alert("Please fill text or upload audio/video.")    
      return false;  
      } 
    else if(description!='' && image_name!='')
      {
      alert("Please fill only text or upload audio/video.") 
      $("#description").val('');
       $("#image_name").val('');
      return false;  
      } 
       else if(created_date=='')
      {
          alert("Please fill date") 
               return false; 
      }else
      {
      
       var urldata=   '/blessings/store/';
       var formData= new FormData($(this).parents('form')[0]);
       var formData_confirm= new FormData($(this).parents('form')[0]);
      formData_confirm.append('confirm','confirm');
    
        $.ajax({
		type: "POST",
		url: urldata,
		//data: datastring,
		//cache: false,
		success: function(data){
                   // alert(data)
                      if(data==1)
                      {
                         window.location = "/blessings/";
                       }else
                      {
                      /***************************************/    
                          
                      var r = confirm("Blessing of this date is already exits Do you want to replace!");
                     if (r == true) {
                         
                 $.ajax({
		 type: "POST",
		 url: urldata,
	          success: function(data){
                        window.location = "/blessings/";
                    } ,
                    
            data: formData_confirm,
            cache: false,
            contentType: false,
            processData: false
                    
                }) ;   
                         
                         
                     } else {
                        // alert("cancel")
                         }  
                     
                   /************************************/  

                       }   
                           
                     
                  },
              
            
            data: formData,
            cache: false,
            contentType: false,
            processData: false
	});
       }
       
  });
  });
    
    
    
</script>

@stop