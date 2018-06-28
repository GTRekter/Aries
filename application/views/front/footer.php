<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>
		<div class="newsletter_box text-center"> 
			<form id="newsletterRegistration" method="" action="">
				<span class="h3"> Newsletter</span> <input type="text" name="emailNewsletter" value="" /><button type="submit">Registrati</button>
			</form>
		</div>
		<!-- Footer -->
		<footer id="footer" class="padding-50 dark">
		  	<div class="container">
		    	<div class="row">
		      <!-- Our location !-->
		      		<div class="col-md-3 col-sm-6 col-xs-12 our_location">
				        <h3>Dove Trovarci</h3>
				        <p>Pasticceria:</p>
				        <span>Piazza Armando Diaz 1, 20123 Milano. Italia</span>
				        <p class="mt30">Per prenotazioni: <span>02 8902112</span></p>
				        <p>E-mail: <span>i.porta@hotmail.it</span></p>
				        <ul class="social mt30">
					          <li><a href="https://www.facebook.com/Pasticceria-Bagal%C3%A0-1654999718050266/timeline" data-toggle="tooltip" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
					          <li><a href="https://www.tripadvisor.it/Restaurant_Review-g187849-d8571313-Reviews-Bagala-Milan_Lombardy.html" data-toggle="tooltip" title="Trip Advisor" target="_blank"><i class="fa fa-tripadvisor"></i></a></li>
					          <li><a href="http://www.yelp.it/biz/bagal%C3%A0-milano" data-toggle="tooltip" title="Yelp" target="_blank"><i class="fa fa-yelp"></i></a></li>
					          <li><a href="https://plus.google.com/103229272622400023443/about" data-toggle="tooltip" title="Google+"><i class="fa fa-google-plus"></i></a></li>
				        </ul>
		      		</div>
		      <!-- End our location -->
		      <!-- Latest Post !-->
		      		<div class="col-md-3 col-sm-6 col-xs-12 latest_post ">
		        		<h3>Ultimi Post</h3>
		        		<?php if ($articles) : ?>
		        		    <?php foreach ($articles as $article) : ?>
		        			  <!-- News Item -->
		        			  <div class="media">
		        			  		<div class="media-left"> 
		        			  			<a href="<?php echo site_url('front/article/'.$article->idArticle); ?>" > 
				        		  	  	<?php foreach ($photos as $photo) {
				        		  	  	    if($photo->idArticle == $article->idArticle) : ?>
				        		  	  	   	    <img class="media-object" rel="prettyPhoto" src="<?php echo $resources_img.'/article/'.$photo->photoName; ?>" alt="post thumb"> 
				        		  	  	    <?php break; endif;
				        		  	  	} ?>
				        		  	  	</a>
				        		  	</div>
				        		  	<div class="media-body">
				        		  		<h4 class="media-heading">
				        		  	  		<a href="<?php echo site_url('front/article/'.$article->idArticle); ?>"><?php echo substr($article->articleTitle, 0, 12) . '...'; ?></a>
				        		  	  	</h4>
				        		  	  	<?php echo substr($article->articleText, 0, 51) . '...'; ?>
				        		  	 </div>
				        	    </div>
				        	 <?php endforeach; ?>
				       	<?php endif; ?>
		        	</div>
		        <!-- End latest Post -->
		      
		      	<!-- Opening time !-->
			      	<div class="col-md-3 col-sm-6 col-xs-12 opening_time">
			        	<h3>Orari di Apertura</h3>
			        	<ul>
			          		<li>
			            		<p>Lunedì <time datetime="00:01">1 pm - 10 pm</time></p>
			          		</li>
			          		<li>
			            		<p>Martedì<time datetime="00:01">1 pm - 10 pm</time></p>
			          		</li>
			          		<li>
			            		<p>Mercoledì <time datetime="00:01">1 pm - 12pm</time></p>
			          		</li>
			          		<li>
			            	    <p>Giovedì <time datetime="00:01">1 pm - 10 pm</time></p>
			          		</li>
			                <li>
			            	    <p>Venerdì <time datetime="00:01">1 pm - 23pm</time></p>
			                </li>
			                <li>
			              	    <p>Sabato <span class="label label-default">Closed</span></p>
			                </li>
			                <li>
			                    <p>Domenica<time datetime="00:01">1 pm - 10 pm</time></p>
			                </li>
			            </ul>
			        </div>
		        <!-- End opening time -->
		        
		        <!-- Flickr !-->
		           <div class="col-md-3 col-sm-6 col-xs-12 flickr">
		                <h3>Immagini Flickr</h3>
		                <!--ul id="flickrbox" class="thumbs"></ul-->
		                
		                <ul id="flickrbox" class="thumbs">
		                <?php foreach ($flickr_photos as $key => $flickr_photo) : ?>
		                	<li>
		                    	<?php 
		                    	if ($flickr_photo->idArticle != null) {
		                    		echo '<a data-rel="prettyPhoto" href="'.$resources_img.'/article/'.$flickr_photo->photoName.'"><img src="'.$resources_img.'/article/'.$flickr_photo->photoName.'" alt="Pasticceria Bagalà" /></a>';
		                    		
		                    	} else if ($flickr_photo->idProduct != null) {
		                    		echo '<a data-rel="prettyPhoto" href="'.$resources_img.'/product/'.$flickr_photo->photoName.'"><img src="'.$resources_img.'/product/'.$flickr_photo->photoName.'" alt="Pasticceria Bagalà" /></a>';
		                    	} else if ($flickr_photo->idCategory != null) {
		                    		echo '<a data-rel="prettyPhoto" href="'.$resources_img.'/category/'.$flickr_photo->photoName.'"><img src="'.$resources_img.'/category/'.$flickr_photo->photoName.'" alt="Pasticceria Bagalà" /></a>';
		                    	}
		                    	?>
		                    </li>
		                <?php endforeach; ?>
		                </ul>
		            </div>
		        <!-- End flickr -->
		        </div>
		    </div>
	    <!-- End container -->
		<!-- Footer logo !-->
	    	<div class="footer_logo text-center"> 
	    		<!--<img  src="img/footer_logo.png"  alt="logo">-->
	      		<p> 2015 ALL RIGHT RESERVED. <br>DESIGNED BY <a target="_blank" href="http://webevolution.eu">WEBEVOLUTION</a></p>
	    	</div>
	    <!-- End Footer logo !-->
	  	</footer>
	  	<!-- End footer -->
	  	<!--  scroll to top of the page-->
	  		<a href="#" id="scroll_up" ><i class="fa fa-angle-up"></i></a> </div>
		<!-- End wrapper -->
		<!-- Core JS Libraries -->
			<script src="<?php echo $resources_js; ?>/jquery.min.js" type="text/javascript"></script>
			<script src="<?php echo $resources_js; ?>/plugins/plugins.js"></script>
		<!-- JS Plugins -->
			<script src="http://maps.googleapis.com/maps/api/js"></script>
			<script src="<?php echo $resources_js; ?>/plugins/modernizr.js"></script>
		<!-- JS Custom Codes -->
			<script src="<?php echo $resources_js; ?>/frontend.js" ></script>
		<!-- For This Page Only Zooming slider -->
			<script src="<?php echo $resources_js; ?>/mbBgGallery_init.js"></script>
			
			<script type="text/javascript">				
				$('#newsletterRegistration').on("submit",function(e) {
					e.preventDefault();

					var email = $('input[name="emailNewsletter"]').val();
					var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;		

					if ( pattern.test(email) ) {			
						$.ajax({
					  		type: 'post',
					  	    url: '<?php echo base_url(); ?>/index.php/front/c_GEN_Costumers',
					  	    data: $('#newsletterRegistration').serialize(),
					  	    dataType: 'json',
					  	        
					  	    success: function (result) {	
					  	    	alert(result);
					  	    }, 
					  	    error: function (result) {
					  	    	alert('Errore 501:' + result);
					  	    	console.log(result);
					  	    }
					  	});
					} else {
						alert('Indirizzo Email non valido');
					}
				})
			</script>
	</body>
</html>