<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <link rel="stylesheet" href="{{url('/backend')}}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/AdminLTE.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('/backend')}}/css/style.css">
  <link rel="stylesheet" href="{{url('')}}/css/backend.css">
  {{-- //datatable
  <link rel="stylesheet" href="{{url('/backend')}}/DataTables-1.10.18/css/datatables.min.css">
  <link rel="stylesheet" href="{{url('/backend')}}/DataTables-1.10.18/css/dataTables.bootstrap.min.css"> --}}

  <script type="text/javascript">
    var base_url=function()
    {
      return '{{ url('/backend') }}'
    }
    var akey=function(){
      return  'DdHNiy0mgZKgSG89CfBfGIG0WFIScWlj8LgXtWW8Di0';
    }
  </script>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('admin.index')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TT</b>H</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Shop</b>Puma</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{url('/backend')}}/avatar/{{ Auth()->user()->image }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{url('/backend')}}/avatar/{{ Auth()->user()->image }}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
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
