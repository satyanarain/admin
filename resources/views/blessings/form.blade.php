<div class="form-group ">
     {!! Form::label('description', Lang::get('Text'), ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7 col-sm-12 required">
          {!! Form::textarea('description', null, ['class' => 'col-md-6 form-control','rows'=>"3"]) !!}
          
    </div>
</div> 

 
<div class="form-group">
    {!! Form::label('image_name', Lang::get('Audio / Video'), ['class' => 'col-md-3 control-label']) !!}
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
