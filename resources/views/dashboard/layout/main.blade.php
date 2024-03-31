<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Online Auction Platform</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset ('dashboard/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{asset ('dashboard/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{asset ('dashboard/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset ('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{asset ('dashboard/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset ('js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset ('dashboard/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset ('dashboard/images/favicon.png') }}" />

   <!-- Bootstrap css -->
   <link rel="stylesheet" href="{{asset('dashboard/css/vertical-layout-light/bootstrap.css')}}">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-MKiKpsBpP1Nap0EE0v43L/yDSDC3zPPcHFfTqUGv4kTPv96XbEu5Lc3spkWw/aWF0DHbpKVvzP/vUy2VX3GHCKQ==" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/regular.min.css" integrity="sha512-TzeemgHmrSO404wTLeBd76DmPp5TjWY/f2SyZC6/3LsutDYMVYfOx2uh894kr0j9UM6x39LFHKTeLn99iz378A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
 
   <!-- Toastr link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>
<body>
    <div class="container-scroller">
        @include('dashboard.layout.header')
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.layout.side-bar')

            <!-- content section  -->
            @yield('main.content')
            
        </div>
    </div>


      <!-- plugins:js -->
  <script src="{{asset ('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset ('dashboard/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset ('dashboard/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset ('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset ('dashboard/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset ('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{asset ('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset ('dashboard/js/template.js')}}"></script>
  <script src="{{asset ('dashboard/js/settings.js')}}"></script>
  <script src="{{asset ('dashboard/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset ('dashboard/js/dashboard.js')}}"></script>
  <script src="{{asset ('dashboard/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
</body>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      var closeButtons = document.querySelectorAll('.alert button[data-bs-dismiss="alert"]');
      closeButtons.forEach(function (button) {
          button.addEventListener('click', function () {
              button.closest('.alert').remove();
          });
      });
  });
</script>

</html>