@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('braidcrump')

  <!-- Main content -->
  <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
</div>

@include('dashboard.layouts.footer')
@include('_partial._messages')
