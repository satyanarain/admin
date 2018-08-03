<div class="form-group ">
     {!! Form::label('description', Lang::get('Text'), ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7 col-sm-12">
          {!! Form::textarea('description', null, ['class' => 'col-md-6 form-control','rows'=>"3",'id'=>'description']) !!}
          
    </div>
</div> 

 
<div class="form-group">
    {!! Form::label('image_name', Lang::get('Audio / Video'), ['class' => 'col-md-3 control-label']) !!}
     <div class="col-md-7 col-sm-12">
    {!! Form::file('image_name',['class' => 'col-md-6 form-control','onchange'=>'loadFile(event)','id'=>'image_name']) !!}
</div>
</div>
<div class="form-group" style="display:none;" id="output_display">
    {!! Form::label('image_name', Lang::get('&nbsp;'), ['class' => 'col-md-3 control-label']) !!}
     <div class="col-md-7 col-sm-12">
   <img id="output" width="100" height="100"/>
</div>
</div>
 @php 
 if($blessings->created_date!='')
 {
 $created_date = date('d-m-Y', strtotime($blessings->created_date));
 }
 @endphp
<div class="form-group">
    {!! Form::label('created_date', Lang::get('Date'), ['class' => 'col-md-3 control-label']) !!}
 <div class="col-md-7 col-sm-12 required">
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('created_date', $created_date, ['class' => 'multiple_date','readonly'=>'readonly','required'=>'required']) !!}
      </div>
      </div>
    <!-- /.input group -->
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

 
