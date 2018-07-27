
<!--<div class="form-group ">
     {!! Form::label('name', Lang::get('Order'), ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7 col-sm-12 required">
          {!! Form::text('name', null, ['class' => 'col-md-6 form-control','required' => 'required']) !!}
    </div>
</div>

<div class="form-group ">
     {!! Form::label('description', Lang::get('Description'), ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7 col-sm-12 required">
          {!! Form::textarea('description', null, ['class' => 'col-md-6 form-control','required' => 'required','rows'=>"3"]) !!}
          
    </div>
</div> 
<div class="form-group ">
     {!! Form::label('price', Lang::get('Price (INR)'), ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7 col-sm-12 required">
          {!! Form::text('price', null, ['class' => 'col-md-6 form-control','required' => 'required','onkeypress'=>'return isNumberKey(event)']) !!}
    </div>
</div>

 @if($orders->image_name!='')
<div class="form-group">
@if($orders->image_name!='')
{!! Form::label('image_name', Lang::get('Existing Image'), ['class' => 'col-md-3 control-label']) !!}
  <div class="col-md-7 col-sm-12">
{{Html::image('images/donation/thumbnail/'.$orders->image_name, 'a picture', array('width' => '100','height'=>'100'))}}
</div>
@else
{!! Form::label('image_name', Lang::get('Existing Image'), ['class' => 'col-md-3 control-label']) !!}
  <div class="col-md-7 col-sm-12">
{{Html::image('images/photo/noimage.png', 'a picture', array('width' => '100','height'=>'100'))}}
</div>
@endif
</div>
@endif
 
<div class="form-group">
    {!! Form::label('image_name', Lang::get('Upload Image'), ['class' => 'col-md-3 control-label']) !!}
     <div class="col-md-7 col-sm-12 required">
    {!! Form::file('image_name',['class' => 'col-md-6 form-control','onchange'=>'loadFile(event)',]) !!}
</div>
</div>
<div class="form-group" style="display:none;" id="output_display">
    {!! Form::label('image_name', Lang::get('&nbsp;'), ['class' => 'col-md-3 control-label']) !!}
     <div class="col-md-7 col-sm-12 required">
   <img id="output" width="100" height="100"/>
</div>
</div>


<div class="form-group ">
     {!! Form::label('', Lang::get(''), ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7 col-sm-12 required">
     
    <?php if(count($orders)>0) { ?>    
<input type="checkbox" onclick='checkedValue()' id='donation' <?php if($orders->donation_list=='1'){ ?>checked="checked"<?php } ?>>&nbsp;Donations&nbsp;
    <?php } else { ?>
<input type="checkbox" onclick='checkedValue()' id='donation' <?php if($orders->donation_list=='1'){ ?>checked="checked"<?php } ?> checked="checked">&nbsp;Donations&nbsp;
    <?php } ?>

        <input type="checkbox" <?php if($orders->purchase_list=='1'){ ?>checked="checked" <?php } ?>  id='purchase' onclick='checkedValue_pur()'>&nbsp;Purchase&nbsp;
        <input  type='hidden' name="donation_list" id='donation_list' value="1">
        <input  type='hidden' name="purchase_list" id='purchase_list'>
    
    
    </div>
</div> 

<div class="form-group">
   {!! Form::label('status', Lang::get('Status'), ['class' => 'col-md-3 control-label']) !!}
     <div class="col-md-7 col-sm-12 required">
      {!! Form::select('status',array('1'=>'Active','0'=>'Inactive'),null,['class'=>'form-control'])!!}
</div>
</div>

<div class="form-group">
    <div class="col-md-3" style="margin-right: 15px;"></div>
    {{ Form::submit('Save', array('class' => 'btn btn-success pull-left')) }}
    <div class="col-md-9">
        <div class="col-md-7 col-sm-12">
        </div>
        <div class="col-md-9" style="padding-left: 0px;">
        </div>
    </div>
</div> 






<script>  
  function checkedValue()
  {
   if($("#donation").prop('checked') ==true)
   {
     $("#donation_list").val(1)  
   }else
   {
        $("#donation_list").val(0) 
   }
      
  }
  function checkedValue_pur()
  {
   if($("#purchase").prop('checked') ==true)
   {
     $("#purchase_list").val(1)  
   }else
   {
        $("#purchase_list").val(0) 
   }
      
  }
  
    


$('#image_name').change(function () {
  var ext = $('#image_name').val().split('.').pop().toLowerCase();
 if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    $("#output").hide();
    $("#output_display").hide();
    alert('Only JPG, JPEG, PNG &amp; GIF files are allowed.' );
    return false;
    
}

});
 var loadFile = function(event) {
     
       $("#output_display").show();
       $("#output").show();
       
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };  
 
     function validateForm(){
   

     var ext = $('#image_name').val().split('.').pop().toLowerCase();
     if(ext!='')
     {
      if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
       $("#output").hide();
       alert('invalid extension!');
       return false;

       }
     }
     
     

if($('#frmTest input:checked').length == 0)
{
 alert("Please check at least one donation or puchase")  
         return false;
}
       
     
     
 }  
</script>-->