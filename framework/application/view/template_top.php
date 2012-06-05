<?php 
if (!isset($banner)) {
	$banner = true;
}
?><!DOCTYPE HTML>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<title>My Community :: Lichfield</title>
	<!-- Google APIs -->
	<script type="text/javascript" src="https://www.google.com/jsapi?key=AIzaSyC74oP0zrh5SvDWO0ycBeg8dmGsmOlQDdg"></script>
	<script type="text/javascript">
	google.load("jquery", "1.7.1");
	google.load("jqueryui", "1.8.11");
	google.load("chrome-frame", "1.0.2");
	//google.load("maps", "3", {
	//	other_params: "sensor=true"
	//});
	</script>
	
	<!-- TinyMCE -->
	<script type="text/javascript" src="/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
	
	<!-- <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC74oP0zrh5SvDWO0ycBeg8dmGsmOlQDdg&sensor=true">
    </script>-->
    
	<!-- Twitter Bootstrap -->
	<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-responsive.min.css" media="all" />
	
	
	<script type="text/javascript" src="/js/bootstrap.js"></script>
	<?php if ($banner) { ?>
	<!-- Banner -->
	<script type="text/javascript" src="/js/banner.js"></script>
	<script type="text/javascript" src="/js/easing.js"></script>
	<script type="text/javascript">
	var banner_data = "/banner";
	</script>
	<?php } ?>
	<!-- Mapping -->
	<!-- 
	<script src="http://openlayers.org/api/OpenLayers.js"></script>
	<script type="text/javascript" src="/js/click_location_map.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/click_map.css" media="all" />
	 -->
	
	<!-- jQuery -->
	<link rel="stylesheet" type="text/css" href="/css/jquery.autocomplete.css" media="all" />
	<script type="text/javascript" src="/js/jquery.autocomplete.min.js"></script>
	
	<script type="text/javascript" src="/js/jquery-ui-timepicker-addon.js"></script>
	
	
	<script type="text/javascript" src="/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>
	<link type="text/css" href="/jquery-ui/css/ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" />	
	
	<script type="text/javascript" src="/js/jquery_ui_loader.js"></script>
	
    <!-- Stylesheets -->
	<link rel="stylesheet" href="/css/main.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/css/detail.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/css/home.css" media="all" />
	
	<!-- JavaScript -->
	<script type="text/javascript" src="/js/details.js"></script>
	
	
</head>
<body>
	<div id="body" class="container">
		<header>
			<img src="/images/logo.png" alt="Logo" />
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li<?php if ($_SERVER["REQUEST_URI"] == "/") {echo " class='active'";} ?>><a href='/'>Home</a></li>
								<li><a href='/events'>Events</a></li>
								<li><a href='/groups'>Groups</a></li>
								<li><a href="/places">Places</a></li>
							</ul>
							<ul class="nav pull-right">
								<li class="twitter social-but"><a href="#"><span>Twitter</span></a></li>
								<li class="facebook social-but"><a href="#"><span>Facebook</span></a></li>
							</ul>
							<form class="navbar-search pull-right">
								<input type="text" class="search-query" placeholder="Search">
							</form>
						</div>
				    </div>
				</div>
			</div>
		</header>
		
		<div id="ajax_container">