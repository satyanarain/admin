<!DOCTYPE html>
<html lang="en">
    <head>
        @if(Session::has('download.in.the.next.request'))
        <meta http-equiv="refresh" content="5;url={{ Session::get('download.in.the.next.request') }}">
        @endif
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>AFC</title>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" >
        <link href="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" >
        <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" >
        <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" >
        <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" >
       <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/Chart.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/chartjs/Chart.min.js') }}"></script>
<!--        <script src="/js/notify.min.js"></script>-->
<!--        <script src="/js/jquery.multiselect.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.0/jspdf.plugin.autotable.js"></script>
         <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
         
         
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        <header class="main-header">    
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo \URL::to('') . '/img/user3-128x128.jpg' ?>" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo \URL::to('') . '/img/user4-128x128.jpg' ?>" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <img src="<?php echo \URL::to('') . '/img/user2-160x160.jpg' ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo \URL::to('') . '/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
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
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo \URL::to('') . '/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                       <a href="{{route('dashboard')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            
                        </a>
                        
                    </li>

                    <li  class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Profiles</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{route('users.index')}}">
                                    <i class="fa fa-circle-o"></i> @lang('User') 
                                </a></li>
                            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>@lang('menu.settings.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{route('roles.index')}}">
                                    <i class="fa fa-circle-o"></i>@lang('menu.settings.roles')</a>
                            </li>
                            <li><a href="{{route('permissions.index')}}"><i class="fa fa-circle-o"></i>@lang('menu.settings.permissions')</a>
                            </li>
                            <li><a href="{{route('settings.index')}}"><i class="fa fa-circle-o"></i>@lang('menu.settings.overall')</a></li>
                        </ul>
                    </li>
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
                    <ul class="list-group"> 
                        @foreach($errors->all() as $error)
                        <li class="list-group-item alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @yield('content')
                </section>
            </div>
            @if(Session::has('flash_message_warning'))
            <div class="notification-warning navbar-fixed-bottom ">
                <div class="notification-icon ion-close-circled"></div>
                <div class="notification-text">
                    <span>{{ Session::get('flash_message_warning') }} </span>
                </div>
            </div>
            @endif
            @if(Session::has('flash_message'))
            <div class="notification-success navbar-fixed-bottom ">
                <div class="notification-icon ion-checkmark-round"></div>
                <div class="notification-text">
                    <span>{{ Session::get('flash_message') }} </span>
                </div>
            </div>
            @endif        
  </section>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://opiant.in">Opiant Tech Solutions Pvt. Ltd.</a>.</strong> All rights
    reserved.
</footer>
</div>
<script src="{{ asset(elixir('plugins/jQuery/jquery-2.2.3.min.js')) }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset(elixir('js/bootstrap.min.js')) }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset(elixir('plugins/morris/morris.min.js')) }}"></script>
<!-- Sparkline -->
<script src="{{ asset(elixir('plugins/sparkline/jquery.sparkline.min.js')) }}"></script>
<!-- jvectormap -->
<script src="{{ asset(elixir('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')) }}"></script>
<script src="{{ asset(elixir('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')) }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset(elixir('plugins/jQuery/jquery-2.2.3.min.js')) }}plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset(elixir('plugins/daterangepicker/daterangepicker.js')) }}"></script>
<!-- datepicker -->
<script src="{{ asset(elixir('plugins/datepicker/bootstrap-datepicker.js')) }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset(elixir('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')) }}"></script>
<!-- Slimscroll -->
<script src="{{ asset(elixir('plugins/slimScroll/jquery.slimscroll.min.js')) }}"></script>
<!-- FastClick -->
<script src="{{ asset(elixir('plugins/fastclick/fastclick.js')) }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset(elixir('js/app.min.js')) }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset(elixir('js/pages/dashboard2.js')) }}"></script>
<script src="{{ asset(elixir('plugins/datatables/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(elixir('plugins/datatables/dataTables.bootstrap.min.js')) }}"></script>
<script src="{{ asset(elixir('js/demo.js')) }}"></script>
@stack('scripts')
</body>
</html>





