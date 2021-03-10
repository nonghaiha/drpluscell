
  @include('backend.layout.header')
  <!-- Left side column. contains the logo and sidebar -->
  
  @include('backend.layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content-header content-title">
      <h1 id="title">@yield('title')</h1>
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="box">
          {{-- <div class="box-header with-border">

          </div> --}}
          <div class="box-body">
            @if (Session::has('success'))
              <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            @if (Session::has('error'))
              <p class="alert alert-danger">{{Session::get('error')}}</p>
            @endif
            @yield('content')
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Main Footer -->

  @include('backend.layout.footer')

