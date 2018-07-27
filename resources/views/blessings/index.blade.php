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
          
          {!! Form::open([
                'route' => 'blessings.store',
                'files'=>true,
                'enctype' => 'multipart/form-data',
               'id' => 'form1',
                'autocomplete'=>'off',
              
                ]) !!}

  {!! Form::close() !!}
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="display_none"></th>
                            
                            <th>@lang('Audio / Video')</th>
                            <th>@lang('blessings')</th>
                          {{  actionHeading('Action', $newaction='') }}
                        </tr>
                    </thead>
                      <tbody>
                         
                        @foreach($blessings as $value)
                        
                        
                        
                        <tr class="nor_f">
                            <th class="display_none"></th>

                            <td>
                              <?php 
                              //  $value->image_name;
                              
                              
                              if ($value->image_name!= '') {
                                  $array = explode('.', $value->image_name);

                                  $extension = end($array);
                                  $extension_lower = strtolower($extension);
                                  $video = array('WEBM', 'MPG', 'MP2', 'MPEG', 'MPE', 'MPV', 'MP4', 'M4P', 'M4V');
                                  $video_lower = array_map('strtolower', $video);
                                  $audio = array('MP3', 'M4A', 'MP2', 'AAC', 'OGA');
                                  $audio_lover = array_map('strtolower', $audio);
                                  if (in_array($extension_lower, $audio_lover)) {
                                      ?>
                                {{Html::image('images/audio.png','audio',array('style'=>'width:50px; height:50px;'))}}
<!--                                <audio controls>
                                        <source src="horse.ogg" type="audio/ogg">
                                        <source src="{{asset('images/blessings/'.$value->image_name)}}" type="audio/mpeg">
                                        
                                    </audio> -->
                               <?php } else{ ?>
 {{Html::image('images/video.png','video',array('style'=>'width:50px; height:50px;'))}}
<!--                                   <video width="320" height="240" controls>
                                     <source src="http://upload.wikimedia.org/wikipedia/commons/7/79/Big_Buck_Bunny_small.ogv" type="video/mp4">
                                     <source src="movie.ogg" type="video/ogg">
                                   </video> -->
                                 <?php }}else{ 
                                    echo "N/A";
                                  ?>
                              
                              <?php } ?>
                            </td>
                            <td>
                                <?php if(strlen($value->description)>100)
                                {
                                echo substr($value->description,0,100).".." ;
                                }else {
                                      echo substr($value->description,0,100);
                                }
                                ?>
                            </td>

                            {{ actionEdit('edit',$value->id,$value->status)}}
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                {{ $blessings->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
</div>
<div class="modal fade" id="view_detail" role="dialog">
    erwerewre
    
 </div>
<script>
    $(function() {
  var canvas = document.getElementById('canvas');
  var ctx = canvas.getContext('2d');
  var video = document.getElementById('video');

  video.addEventListener('play', function() {
    var $this = this; //cache
    (function loop() {
      if (!$this.paused && !$this.ended) {
        ctx.drawImage($this, 0, 0);
        setTimeout(loop, 1000 / 30); // drawing at 30fps
      }
    })();
  }, 0);
});
    
    
 function viewDetails(id,view_detail)
{
//alert(id)
 var urldata=   '/blessings/' + view_detail + '/' +id;

$.ajax({
		type: "GET",
		url: urldata,
		cache: false,
		success: function(data){
                 // alert(data);
                 $("#" + view_detail).modal('show');
                  $("#"+view_detail).html(data);
		}
	});
  
   }
   
</script>
<script>
    
    
    
function searchRecord(id)
{
   // alert("eww");
    document.getElementById("form1").submit();
}

function statusUpdate(id)
{
 $.ajax({
    type:'get',
    url:'/crew_details/statusupdate/'+id,
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