<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
				<ul class="mainnav">
				
					<li class="active">
						<a href="/">
							<i class="icon-home"></i>
							<span>General</span>
						</a>	    				
					</li>
					 <li class="active">
						<a href="/invalidation">
							<i class="icon-external-link"></i>
							<span>Invalidation</span>
						</a>	    				
					</li>
					<li class="dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-th"></i>
							<span>Caches</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
                                                    <?php
                                                        foreach ($hosts as $host) {
                                                            	echo "<li><a href='/report/status/$host' target='_blank'>$host</a></li>";
                                                        }
                                                    ?>
						</ul> 				
					</li>
                                        

					
	
				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
