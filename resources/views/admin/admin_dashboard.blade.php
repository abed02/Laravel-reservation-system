
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--favicon-->
	<link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png"/>
	<!--plugins-->
	<link href="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
	<!-- loader-->
	<link href="{{asset('backend/assets/css/pace.min.css')}}" rel="stylesheet"/>
	<script src="{{asset('backend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('backend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/dark-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('backend/assets/css/semi-dark.css')}}"/>
	<link rel="stylesheet" href="{{asset('backend/assets/css/header-colors.css')}}"/>
	<!--for Tostar -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
	<title>Admin Dashboard</title>
<!-- For data table -->
	<link href="{{asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!-- start sidebar -->
            @include('admin.body.sidebar')
        <!--End sidebar wrapper -->

		<!--start header -->
		@include('admin.body.header')
		<!--end header -->

		<!--start page wrapper -->
		<div class="page-wrapper">
                @yield('admin')

        </div>
		<!--end page wrapper -->

		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->

        <!--start footer  -->
            @include('admin.body.footer')
        <!--End  footer  -->
	</div>
	<!--end wrapper-->




	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/chartjs/js/chart.js')}}"></script>
	<script src="{{asset('backend/assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('backend/assets/js/app.js')}}"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="{{asset('backend/assets/js/code.js')}}"></script>
		<script src="{{asset('backend/assets/js/validate.min.js')}}"></script>

	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<!-- for tostar -->
		<script>
		@if(Session::has('message'))
		var type = "{{ Session::get('alert-type','info') }}"
		switch(type){
			case 'info':
			toastr.info(" {{ Session::get('message') }} ");
			break;

			case 'success':
			toastr.success(" {{ Session::get('message') }} ");
			break;

			case 'warning':
			toastr.warning(" {{ Session::get('message') }} ");
			break;

			case 'error':
			toastr.error(" {{ Session::get('message') }} ");
			break; 
		}
		@endif 
		</script>

<!-- for Data table  -->
	<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<!-- for Data table  -->
	{{-- Tiny  edit texr  --}}
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
   tinymce.init({
     selector: 'textarea#editor', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'powerpaste advcode table lists checklist',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script>


</body>

</html>