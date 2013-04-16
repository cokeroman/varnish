<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Varnish Console</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">        
    
    <link href="/css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    
    <link href="/css/base-admin-2.css" rel="stylesheet">
    <link href="/css/base-admin-2-responsive.css" rel="stylesheet">
    
    <link href="/css/pages/dashboard.css" rel="stylesheet">
    <link href="/css/pages/reports.css" rel="stylesheet">

    <link href="/css/custom.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <script src="/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/js/libs/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="/js/libs/bootstrap.min.js"></script>

    <script src="/js/plugins/flot/jquery.flot.js"></script>
    <script src="/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="/js/plugins/flot/jquery.flot.orderBars.js"></script>
    <script src="/js/plugins/flot/jquery.flot.resize.js"></script>

    <script src="/js/Application.js"></script>


    
    
    <!--
    <script src="/js/charts/area.js"></script>
    <script src="/js/charts/donut.js"></script>
    <script src="/js/charts/pie.js"></script>
    <script src="/js/charts/bar.js"></script>
    -->
        
    
  </head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
			<a class="brand" href="/">
				Varnish Console <sup>reload</sup>
			</a>		
			
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">

			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
                            <?php echo $_SERVER['PHP_AUTH_USER'];?>
							<b class="caret"></b>
						</a>
						<!--
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Logout</a></li>
						</ul>-->
						
					</li>
				</ul>
			
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    