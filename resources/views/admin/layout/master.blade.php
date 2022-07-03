<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="keywords" name="keywords">
    <meta content="description" name="description">

     <!-- Meta -->
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css">
</head>

<body class="app">   	
	@include('admin.partials.header')

	<!-- content -->
	@yield('content')

	@include('admin.partials.footer')
</body>

 

<!-- JavaScript Libraries -->
 <!-- Javascript -->          
 <script src="/assets/plugins/popper.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    
    
    <!-- Page Specific JS -->
    <script src="/assets/js/app.js"></script> 
@yield('scripts')

</html>
