<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="AFC">
         <head>
        @if(Session::has('download.in.the.next.request'))
        <meta http-equiv="refresh" content="5;url={{ Session::get('download.in.the.next.request') }}">
        @endif
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <title>GNS</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{url('images/favicon-16x16.png')}}">
        <script src="{{ asset(elixir('js/jquery-2.2.3.min.js')) }}"></script>
        <link rel="stylesheet" href="{{ asset(elixir('css/bootstrap.min.css')) }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset(elixir('css/skins/_all-skins.min.css')) }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset(elixir('plugins/iCheck/flat/blue.css')) }}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ asset(elixir('plugins/morris/morris.css')) }}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ asset(elixir('plugins/jvectormap/jquery-jvectormap-1.2.2.css')) }}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset(elixir('plugins/datepicker/datepicker3.css')) }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset(elixir('plugins/daterangepicker/daterangepicker.css')) }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset(elixir('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')) }}">
        <script src="{{ URL::asset('plugins/chartjs/Chart.min.js') }}"></script>
        <link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.5.1/css/buttons.jqueryui.min.css">
<!--        <link rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css">-->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.css" />

        <link rel="stylesheet" href="{{URL::asset('plugins/datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/custom.css')}}">
        <script src="{{ asset('js/custom.js') }}"></script>
        <script>    
 window.Laravel = <?php
echo json_encode([
    'csrfToken' => csrf_token(),
]);
?>
        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
     <div id="map1">
     <div id="map">
     <div class="loading_bar">
	{{ HTML::image('images/bus_loader.gif', 'alt text', array('class' => 'css-class')) }}
     </div>
    
 </div>
 </div>

  
<div class="wrapper">
    <header class="main-header">   
            <!-- Logo -->
            <a href="index2.html" class="logo">
             
                <span class="logo-lg"><b>{{Html::image('images/logo.png','',array('class'=>'logo'))}}</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                  <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                        
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">

                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                      
                        <li class="dropdown user user-menu" >

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                @if(Auth::user()->image_path)
                                {{Html::image('/images/photo/'.Auth::user()->image_path,'',array('class'=>"user-image"))}}
                                @else
                                <img src="<?php echo \URL::to('') . '/img/user2-160x160.jpg' ?>" class="user-image">
                                @endif
                                <span class="hidden-xs">{{{ isset(Auth::user()->salutation) ? Auth::user()->salutation : '' }}} {{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}}!</span>
                                <b class="caret"></b>
                            </a>           
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('/users/'.Auth::user()->id) }}" class="glyphicon glyphicon-user">Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url('/changepasswords/create/') }}" class="glyphicon glyphicon-user">Change password</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}" class="glyphicon glyphicon-log-out">Sign out</a>
                                </li>

                            </ul>
                        </li>
                        
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
   <aside class="main-sidebar">
     <section class="sidebar">
           <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                       <a href="{{route('dashboard')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    
                    @php $pem=menuDisplayByUser($result, 'users','view'); @endphp
                    @if($pem=='true')
<!--                  <li @if($segments_var[0]=='users') class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-user"></i> <span>User Management</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul @if($segments_var[0]=='users' || $segments_var[0]=='changepasswords') class="treeview-menu active" style="display:block" @else class="treeview-menu" @endif>
                            <li @if($segments_var[0]=='users') class="active" @endif><a href="{{route('users.index')}}">
                                    <i class="fa fa-users"></i> @lang('menu.users.user') 
                                </a></li>
                          </ul>
                    </li>-->
                    @endif
                    <li @if($segments_var[0]=='donations') class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Manage Registered Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        @php
                       $array= array('registers')
                       @endphp
                        <ul @if(in_array($segments_var[0],$array)) class="treeview-menu active" style="display:block" @else class="treeview-menu" @endif>
                            @if(menuPermission('donations')==1)
                           <li @if($segments_var[0]=='donations') class="active" @endif><a href="{{route('registers.index')}}">
                                    <i class="fa fa-user"></i> @lang('menu.registers.title') </a>
                           </li>
                            @endif 
                         </ul>
                      
                    </li> 
                  <li @if($segments_var[0]=='donations') class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-gift"></i> <span>Manage Donation</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        @php
                       $array= array('depots','donations','orders')
                       @endphp
                        <ul @if(in_array($segments_var[0],$array)) class="treeview-menu active" style="display:block" @else class="treeview-menu" @endif>
                            @if(menuPermission('donations')==1)
                           <li @if($segments_var[0]=='donations') class="active" @endif><a href="{{route('donations.index')}}">
                                    <i class="fa fa-gift"></i> @lang('menu.donations.title') </a>
                           </li>
                            @endif 
                         </ul>
                      
                    </li>
                  <li @if($segments_var[0]=='orders') class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-gift"></i> <span>Manage Order</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        @php
                       $array= array('orders')
                       @endphp
                        <ul @if(in_array($segments_var[0],$array)) class="treeview-menu active" style="display:block" @else class="treeview-menu" @endif>
                            @if(menuPermission('orders')==1)
                           <li @if($segments_var[0]=='orders') class="active" @endif><a href="{{route('orders.index')}}">
                                    <i class="fa fa-gift"></i> @lang('menu.orders.title') </a>
                           </li>
                            @endif 
                         </ul>
                    </li>
                  <li @if($segments_var[0]=='blessings') class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-gift"></i> <span>Manage Blessings</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        @php
                       $array= array('blessings')
                       @endphp
                        <ul @if(in_array($segments_var[0],$array)) class="treeview-menu active" style="display:block" @else class="treeview-menu" @endif>
                            @if(menuPermission('blessings')==1)
                           <li @if($segments_var[0]=='blessings') class="active" @endif><a href="{{route('blessings.index')}}">
                                    <i class="fa fa-gift"></i> @lang('menu.blessings.title') </a>
                           </li>
                            @endif 
                         </ul>
                    </li>
                   
                 @php $pem=menuDisplayByUser($result, 'permissions','view'); @endphp
                    @if($pem=='true')
<!--                     <li  @if($segments_var[0]=='roles' || $segments_var[0]=='permissions' || $segments_var[0]=='settings') class="treeview active" @else class="treeview" @endif>
                        <a href="#">
                            <i class="fa fa-cog" aria-hidden="true"></i> <span>@lang('menu.settings.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul @if($segments_var[0]=='changepasswords' || $segments_var[0]=='permissions' || $segments_var[0]=='settings') class="treeview-menu active" style="display:block" @else class="treeview-menu" @endif>
                         <li @if($segments_var[0]=='roles') class="active" @endif><a href="{{route('permissions.index')}}"><i class="fa fa-key"></i>@lang('menu.settings.permissions')</a>
                            </li>
                              <li @if($segments_var[0]=='changepasswords') class="active" @endif><a href="{{route('changepasswords.create')}}">
                                    <i class="fa fa-key"></i> @lang('menu.users.changepassword') 
                                </a></li>  
                            
                            
                            
                            
                         </ul>
                    </li>-->
                    @endif
                   
                    </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Page Content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('header')
                </section>
                <section class="content">
                    
                    @if($errors->any())
                    <ul class="list-group" id='error_message_red'> 
                        @foreach($errors->all() as $error)
                        <li class="list-group-item alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @yield('content')
  <div class="modal fade" id="common_details" role="dialog">
  <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header-view" >
<!--                <button type="button" class="close" data-dismiss="modal"><font class="white">&times;</font></button>-->
                <h4 class="viewdetails_details"><span class="fa fa-plus"></span>&nbsp;Add New</h4>
            </div>
            <div class="modal-body-view">
                 <div class="alert-new-success" id="add_new_data" style="display:none;"></div>
                 <div class="list-group-item alert alert-danger" id="add_new_data_danger" style="display:none;"></div>
                 <table class="table table-responsive.view">
                    <tr>       
                        <td>Name</td>
                        <td class="table_normal">
                            <input name="name" id="name" class="form-control">
                            <input name="field_name" id="field_name" class="form-control" type="hidden">
                            <input name="table_name" id="table_name" class="form-control" type="hidden">
                            <input name="placeholder" id="placeholder" class="form-control" type="hidden">
                        </td>
                    </tr>
                   </table>  
                  <div class="modal-footer">
                     <div  class="btn btn-success pull-left" onclick="AddNew()">Add New</div><button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>

    </div>
</div>

</section>
</div>
 </section>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://opiant.in">Opiant Tech Solutions Pvt. Ltd.</a>.</strong> All rights
    reserved.
</footer>
</div>



<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{ asset(elixir('plugins/jQuery/jquery-2.2.3.min.js')) }}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset(elixir('js/bootstrap.min.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset(elixir('plugins/morris/morris.min.js')) }}"></script>
<!-- Sparkline -->
<script src="{{ asset(elixir('plugins/sparkline/jquery.sparkline.min.js')) }}"></script>
<!-- jvectormap -->
<script src="{{ asset(elixir('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')) }}"></script>
<script src="{{ asset(elixir('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset(elixir('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')) }}"></script>
<!-- Slimscroll -->
<script src="{{ asset(elixir('plugins/slimScroll/jquery.slimscroll.min.js')) }}"></script>
<!-- FastClick -->
<script src="{{ asset(elixir('plugins/fastclick/fastclick.js')) }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset(elixir('js/app.min.js')) }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset(elixir('js/pages/dashboard2.js')) }}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="{{ asset(elixir('js/demo.js')) }}"></script>
<script src="{{ asset(elixir('js/jQueryRotate.js')) }}"></script>

<script src="{{ asset(elixir('plugins/datatables/dataTables.bootstrap.min.js')) }}"></script>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">-->


 <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
<style type="text/css" class="init"></style>
<script type="text/javascript" src="jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>


<script type="text/javascript">
  
$('body').on('focus',".multiple_date", function(){
         $(this).datepicker({
              dateFormat: 'dd-mm-yy',
               startView: "year", 
                changeYear: true,
              yearRange: "-80Y:-0Y",
minDate: "-80Y",
maxDate: "-0Y"
          });
      }); 
  $('#map1').append('<div style="" id="map"><div class="loading_bar"></div></div>');
$(window).on('load', function(){
  setTimeout(removeLoader, 200); //wait for page load PLUS two seconds.
});
function removeLoader(){
    $( "#map" ).fadeOut(100, function() {
      // fadeOut complete. Remove the loading div
      $( "#map" ).remove(); //makes page more lightweight 
      $( "#map1" ).hide(); //makes page more lightweight 
  });  
}  
</script>
@stack('scripts')
</body>
</html>
