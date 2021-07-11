<!DOCTYPE html>
<html lang="en">
<head>
<title>Farmer's Market | Vendor-Dashboard</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/images/backend_images/logo1.png') }}">

<!-- Latest compiled and minified CSS -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/assets/materialize/css/materialize.min.css') }}" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="{{asset('/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('/assets/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('/assets/css/custom-styles.css') }}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 

</head>
<body>
        <div id="wrapper">
        @include('vendor.vendor_layouts.vendor_header');
        @include('vendor.vendor_layouts.vendor_sidebar');
        @yield('content');
        @include('vendor.vendor_layouts.vendor_footer');

	</div>
			
  <script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('/assets/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('/assets/scripts/klorofil-common.js') }}"></script>

<script src="{{asset('assets/js/jquery-1.10.2.js') }}"></script>
	
	<!-- Bootstrap Js -->
    <script src="{{asset('/assets/js/bootstrap.min.js') }}"></script>
	
	<script src="{{asset('/assets/materialize/js/materialize.min.js') }}"></script>
	
    <!-- Metis Menu Js -->
    <script src="{{asset('/assets/js/jquery.metisMenu.js') }}"></script>
    <!-- Morris Chart Js -->
    <script src="{{asset('/assets/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{asset('/assets/js/morris/morris.js') }}"></script>
	
	
	<script src="{{asset('/assets/js/easypiechart.js') }}"></script>
	<script src="{{asset('/assets/js/easypiechart-data.js') }}"></script>
	
	 <script src="{{asset('/assets/js/Lightweight-Chart/jquery.chart.js') }}"></script>
	
    <!-- Custom Js -->
    <script src="{{asset('/assets/js/custom-scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/mdb.js') }}"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
@include('sweetalert::alert')
</body>
</html>
