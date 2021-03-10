<?php
$menus=config('menu');
?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/backend')}}/avatar/{{ Auth()->user()->image }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        @foreach ($menus as $me)
        <?php $class=!empty($me['items']) ? 'treeview' :''  ?>

      <li class="{{ $class }}"><a href="{{route( $me['route'] )}}">
        <i class="{{ $me['icon'] }}"></i> <span>{{ $me['name'] }}</span>
         @if (!empty($me['items']))
         <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
         @endif

      </a>
        @if (!empty($me['items']))
          <ul class="treeview-menu">
            @foreach ($me['items'] as $item)

              <li><a href="{{route( $item['route'] )}}">{{ $item['name'] }}</a></li>
            @endforeach
          
          </ul>
        @endif

      </li>
       @endforeach


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>