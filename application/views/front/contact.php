<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<div id="content">
    <!-- Our Contact -->
        <section class="contact text-center padding-100">
      		<div class="container">
      			<div class="row"> 
        			<!-- Head Title -->
          			  <div class="head_title">
			              	<i class="icon-intro"></i>
			              	<h1>Contattaci</h1>
			              	<span class="welcome">Rimaniamo in contatto</span>
			          </div>
          			<!-- End# Head Title -->
        			<!-- Contact form -->
			          <div class="contact-form">
			          	  <form method="post" action="process.php" class="form">
				              <!-- Form Group -->
				              <div class="form-group">
				                  <div class="row">
				                      <div class="col-md-4 col-sm-4 col-sx-12">
				                      <!-- Element -->
				                          <div class="element">
				                              <input type="text" name="name" class="form-control text" placeholder="Nome *" />
				                          </div>
				                      <!-- End Element -->
				                      </div>
				                      <div class="col-md-4 col-sm-4 col-sx-12">
				                      <!-- Element -->
				                          <div class="element">
				                              <input type="text" name="website" class="form-control text" placeholder="Cognome" />
				                          </div>
				                      <!-- End Element -->
				                      </div>
                					  <div class="col-md-4 col-sm-4 col-sx-12">
                  					  <!-- Element -->
						                  <div class="element">
						                      <input type="text" name="email" class="form-control text" placeholder="E-mail *" />
						                  </div>
					                  <!-- End Element -->
                					  </div>
              					  </div>
            				  </div>
            			      <!-- End form group -->
				              <div class="row">
				                  <div class="col-md-12">
				                  <!-- Form Group -->
				                  	   <div class="form-group">
				                 	   <!-- Element -->
				                  	  	   <div class="element">
				                    	       <div>
							                       <!-- Element -->
							                       <div class="element">
							                           <textarea name="comment" class="text textarea" placeholder="Messaggio *" ></textarea>
							                       </div>
							                       <!-- End Element -->
							                   </div>
				                  		   </div>
				                  	   <!-- End Element -->
				               		   </div>
				                  <!-- End form Group -->
				              	  </div>
				              </div>
				              <!-- Element -->
				              <div class="element">
				             	  <button type="submit" id="submit" value="Send" class="btn btn-black">Invia</button>
				              	  <div class="loading"></div>
				              </div>
            				  <!-- End Element -->
          				  </form>
          				  <div class="done">
      						  <strong>Grazie per aver compilato il form!</strong> Ti contatteremo al più presto. 
  						  </div>
        			  </div>
        			<!-- End contact form -->
      			</div>
    		</div>
  		</section>
  <!-- End contact -->
  
  <!-- Address content
  ============================================= -->
  <section class="address-content dark">
      <!--  BG parallax -->
      <div id="address-content">
          <div class="bcg" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#address-content" style="background-image:url('img/banner/certification.jpg');">
               <!-- BG transparent -->
               <div class="bg-transparent padding-100">
                   <div class="container">
                       <div class="row">
                           <!-- Adress -->
                           <div class="col-md-4 adress">
	                           <div class="col-md-3 icon "> <i class="fa fa-road"></i> </div>
	                			<!-- Content Item -->
	                			<div class="col-md-9 content-item">
	                  				<h3>Indirizzo</h3>
	                  				<p> Piazza Armando Diaz 1, 20123 Milano. <br class="hidden-lg">Italia.</p>
	                			</div>
	                			<!-- End content Item -->
	              			</div>
	              			<!--End Adress -->
			                <!-- Phone -->
			               <div class="col-md-4 Phone">
			              		<div class="col-md-3 icon"> <i class="fa fa-phone"></i> </div>
			              		<!-- Content Item -->
			              	    <div class="col-md-9 content-item">
			              	      	<h3>Telefono</h3>
			              	      	<p>Pasticceria:<span>(+39) 02 8902112</span></p>
			              	      	<p>Laboratorio:<span>(+39) ## #######</span></p>
			              	    </div>
			              	    <!-- End content Item -->
			              	</div>
			              	<!--End Phone -->
			                <!-- Email -->
			               <div class="col-md-4 email">
			              		<div class="col-md-3 icon"> <i class="fa fa-envelope"></i> </div>
			              		<!-- Content Item -->
			              		<div class="col-md-9 content-item">
			              				<h3>E-MAIL</h3>
			              				<p><a href="mailto:i.porta@hotmail.it">i.porta@hotmail.it</a></p>
			              		</div>
			              		<!-- End content Item -->
			              	</div>
			              	<!--End Email -->
            			</div>
          			</div>
        		</div>
      		</div>
      		<!-- End BG transparent -->
    	</div>
    <!-- End BG parallax -->
  </section>
  <!-- End address content -->
  
  <!-- Map  -->
  <div class="map">
  	  <div id="map"></div>
  </div>
  <!-- End map -->
</div>
<!-- end of #content -->