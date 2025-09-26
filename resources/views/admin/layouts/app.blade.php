<!doctype html>
<html lang="en" >
   <head>
      <meta charset="utf-8" />
      <title>SHALEEN OVERSEAS</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="SHALEEN OVERSEAS" name="description" />
      <meta content="ASK Innovations" name="ASK Innovations" />
      <!-- App favicon -->
      {{-- <!-- <link rel="shortcut icon" href="{{ asset('backend/images/logo.png') }}"> --> --}}
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('backend/images/logo/logoshaleen.png') }}">

      <!-- Responsive Table css -->
      <link href="{{ asset('backend/libs/admin-resources/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
         

      <!-- Preloader css -->
      <link rel="stylesheet" href="{{ asset('backend/css/preloader.min.css') }}" type="text/css" />

      <!-- Bootstrap Css -->
      <link href="{{ asset('backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
      
      <!-- DataTables -->
      <!-- Responsive datatable examples -->
   
   <link href="{{ asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

      

      <!-- Icons Css -->
      <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

      <!-- App Css-->
      <link href="{{ asset('backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


   </head>
   <body>
      <!-- <body data-layout="horizontal"> -->
      <!-- Begin page -->
      <div id="layout-wrapper">
         {{-- Navbar start --}}
         @include('admin.layouts.navbar')
         {{-- Navbar start --}}
         {{-- Sidebar start --}}
         @include('admin.layouts.sidebar')
         {{-- Sidebar end --}}
         <div class="main-content">
            {{-- Content start --}}
            @yield('content')
            {{-- Content end --}}
            {{-- Footer start --}}
            @include('admin.layouts.footer')
            {{-- Footer end --}}
         </div>
      </div>
      <!-- END layout-wrapper -->
      <!-- JAVASCRIPT -->
      <script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('backend/libs/metismenu/metisMenu.min.js') }}"></script>
      <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
      <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
      <script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>

      <!-- pace js -->
      <script src="{{ asset('backend/libs/pace-js/pace.min.js') }}"></script>

      <!-- Required datatable js -->
        <script src="{{ asset('backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    
       <!-- button -->
        <!-- Buttons examples -->
      <script src="{{ asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('backend/libs/jszip/jszip.min.js') }}"></script>
      <script src="{{ asset('backend/libs/pdfmake/build/pdfmake.min.js') }}"></script>
      <script src="{{ asset('backend/libs/pdfmake/build/vfs_fonts.js') }}"></script>
      <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('backend/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

      <!-- Responsive Table js -->
      <script src="{{ asset('backend/libs/admin-resources/rwd-table/rwd-table.min.js') }}"></script>
      

      <!-- Responsive examples -->
       <!-- Responsive examples -->
<script src="{{ asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

      <!-- Init js -->
      <script src="{{ asset('backend/js/pages/table-responsive.init.js') }}"></script>
      <script src="{{ asset('backend/js/pages/datatables.init.js') }}"></script>    
      <script src="{{ asset('backend/js/app.js') }}"></script>

   </body>
</html>