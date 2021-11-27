<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>AdminLTE 3 | Dashboard</title>

	  <!-- Google Font: Source Sans Pro -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/plugins/fontawesome-free/css/all.min.css') }}">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Tempusdominus Bootstrap 4 -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
	  <!-- iCheck -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	  <!-- JQVMap -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/plugins/jqvmap/jqvmap.min.css') }}">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/css/adminlte.min.css') }}">
	  <!-- overlayScrollbars -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/plugins/daterangepicker/daterangepicker.css') }}">
	  <!-- summernote -->
	  <link rel="stylesheet" href="{{ asset('newtemplate/plugins/summernote/summernote-bs4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">

      	  @include('view.head-nav')
      	  @include('view.sidebar')

  		<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
		  @yield('content')
		</div>

		  @include('view.footer')

		  <!-- Control Sidebar -->
		  <aside class="control-sidebar control-sidebar-dark">
		    <!-- Control sidebar content goes here -->
		  </aside>
		  <!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->



		<!-- jQuery -->
		<script src="{{ asset('newtemplate/plugins/jquery/jquery.min.js') }}"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="{{ asset('newtemplate/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button)
		</script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('newtemplate/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- ChartJS -->
		<script src="{{ asset('newtemplate/plugins/chart.js/Chart.min.js') }}"></script>
		<!-- Sparkline -->
		<script src="{{ asset('newtemplate/plugins/sparklines/sparkline.js') }}"></script>
		<!-- JQVMap -->
		<script src="{{ asset('newtemplate/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
		<script src="{{ asset('newtemplate/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
		<!-- jQuery Knob Chart -->
		<script src="{{ asset('newtemplate/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
		<!-- daterangepicker -->
		<script src="{{ asset('newtemplate/plugins/moment/moment.min.js') }}"></script>
		<script src="{{ asset('newtemplate/plugins/daterangepicker/daterangepicker.js') }}"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="{{ asset('newtemplate/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
		<!-- Summernote -->
		<script src="{{ asset('newtemplate/plugins/summernote/summernote-bs4.min.js') }}"></script>
		<!-- overlayScrollbars -->
		<script src="{{ asset('newtemplate/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('newtemplate/js/adminlte.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('newtemplate/js/demo.js') }}"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="{{ asset('newtemplate/js/pages/dashboard.js') }}"></script>

</body>
</html>