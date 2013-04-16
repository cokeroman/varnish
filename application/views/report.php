    <script src="/js/hc/highcharts.js" type="text/javascript"></script>
    <script src="/js/hc/highcharts-more.js" type="text/javascript"></script>
    <script>
    
    function init() {
    setInterval(function(){
        $('#load').load('/report/info/<?php echo $cache; ?>/load/ext').fadeIn("slow");
        $('#memory').load('/report/info/<?php echo $cache; ?>/memory/ext').fadeIn("slow");
        $('#cpu').load('/report/info/<?php echo $cache; ?>/cpu/ext').fadeIn("slow");
        $('#http_status').load('/report/info/<?php echo $cache; ?>/http_status/ext').fadeIn("slow");
        $('#top_status').load('/report/table/top_status/<?php echo $cache; ?>').fadeIn("slow");
        $('#top_urls').load('/report/table/top_urls/<?php echo $cache; ?>').fadeIn("slow");
        $('#top_urls_back').load('/report/table/top_urls_back/<?php echo $cache; ?>').fadeIn("slow");
        }, 5000);
        
        $('#content-request').load('/report/graph/request/<?php echo $cache; ?>').fadeIn("slow");
        $('#content-hit').load('/report/graph/hits/<?php echo $cache; ?>').fadeIn("slow");
    }
    
 
</script>
<script>$(document).ready(init);</script> 

<div class="main">

    <div class="container">
    	
      <div class="row">
      
      	<div class="span12">
      		
      		<div class="widget big-stats-container stacked">
      			
      			<div class="widget-content">
      				
		      		<div id="big_stats" class="cf">
						<div id="load" class="stat"><img src="/img/loading_100x100.gif"></div> <!-- .stat -->						
						<div id="memory" class="stat"><img src="/img/loading_100x100.gif"></div> <!-- .stat -->						
						<div id="cpu" class="stat"><img src="/img/loading_100x100.gif"></div> <!-- .stat -->						
						<div id="http_status" class="stat"><img src="/img/loading_100x100.gif"></div> <!-- .stat -->
					</div>
				
				</div> <!-- /widget-content -->
				
			</div> <!-- /widget -->
      		
      	</div> <!-- /span12 -->	
      	
  	  </div> <!-- /row -->
      
      	<div class="row">
      	
                        <div class="span4">
      		
                            <div id="top_status" class="widget stacked widget-table">
                                <img src="/img/loading_100x100.gif">
                            </div>		      			
                        </div> <!-- /span4 -->
  			
  			
  			
  			<div  class="span4">
  				
  				<div id="top_urls" class="widget stacked widget-table">
				   <img align="center" src="/img/loading_100x100.gif">				
				</div>
  				
  			</div> <!-- /span4 -->
  			
  			
  			
  			<div class="span4">
  				
  				<div id="top_urls_back" class="widget stacked widget-table">
				   <img src="/img/loading_100x100.gif">
				</div>
  				
  			</div> <!-- /span4 -->
      	
		</div> <!-- /row -->
                
                
      <div class="row">
      	
      	<div class="span6">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Request/s</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div id="content-request" class="chart-holder"></div>
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
			
      		
      		
      		
	    </div> <!-- /span6 -->
      	
      	
      	<div class="span6">
      		
      		<div class="widget stacked">
						
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Hits/s</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div id="content-hit" class="chart-holder"></div>
					
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
								
	      </div> <!-- /span6 -->
      	
      </div> <!-- /row -->
                
      
      
    </div> <!-- /container -->
    
</div> <!-- /main -->
    

    

