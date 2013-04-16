
    <div class="container">
<div class="row">
       <div class="span12">
          
      		
      		<div class="widget stacked">
                    
                                <div class="widget-header">
					<i class="icon-star"></i>
					<h3>Invalidation</h3>
				</div> <!-- /widget-header -->
                                
                                <div class="widget-content">
                                    <?php
                                        if (isset($uri)) {
                                            echo "<section id='tables'>";
                                            echo "<table class='table table-bordered table-striped table-highlight'>";
                                            echo "<thead>";
                                            echo "       <tr>";
                                            echo "            <th>Cache</th>";
                                            echo "            <th>URL</th>";
                                            echo "            <th>Status</th>";
                                            echo "        </tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            foreach ($status as $cache => $st){                                 
                                                echo "<tr>";
                                                echo "<td width='20%'>$cache</td>";
                                                echo "<td>$domain$uri</td>"; 
                                                echo "<td>$st</td>";
                                                echo "</tr>";                                             
                                            }
                                            echo "</tbody>";
                                            echo "</table>";
                                            echo "</section>";
                                        } else {
                                    ?>
                                    <form method="POST" action="/invalidation/url">
                                    URL: <input type="text" name="domain" size="100" maxlength="255" value="www.example.com"><input type="text" name="uri" size="100" maxlength="255" value="/url/de/invalidado"><br/>
                                    <br/>
                                    <input type="submit" name="invalidar" value="Invalidar">
                                    </form>
                                    <?php
                                        }
                                    ?>
                                </div>
										
			</div> <!-- /widget -->	
			
      		
	    </div> <!-- /span6 -->
            

      	
      </div> <!-- /row -->
      
      



    </div> <!-- /container -->
    
</div> <!-- /main -->
