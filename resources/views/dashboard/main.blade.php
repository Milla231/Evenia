<!DOCTYPE html>
<html lang="en">
  @include('dashboard.header')
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('dashboard.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('dashboard.navbar')
        <!-- partial -->
        @yield('content')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('storage/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('storage/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('storage/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('storage/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('storage/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('storage/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('storage/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('storage/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('storage/assets/js/misc.js')}}"></script>
    <script src="{{asset('storage/assets/js/settings.js')}}"></script>
    <script src="{{asset('storage/assets/js/todolist.js')}}"></script>
    <!-- Bootstrap JS (et Popper.js pour les modals) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('storage/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>