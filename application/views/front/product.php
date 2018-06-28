<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!-- End header -->
<div id="content">
  	<!-- Single menu -->
  	<section class="single-menu text-left padding-100">
    	<div class="container">
      		<div class="row">
        	<!-- Menu thumb slider -->
        		<div class="menu-thumb-slide col-md-6">
          			<div id="single-img" class="owl-carousel">
          			<?php foreach ($photos as $photo) {
          			  	  if($photo->idProduct == $product->idProduct) : ?>
          			  	  	  <!--div class="item"><img src="<?php echo ($resources_img.'/product/'.$photo->photoName); ?>" alt=""></div-->
          			  	  	  <div class="item" style="background-image: url(<?php echo ($resources_img.'/product/'.$photo->photoName); ?>);"></div>
          			  	  	  <?php $mainPhoto = $photo->photoName; ?>
          			   	  <?php endif;
          			 } ?>
			        </div>
	          		<div id="thumb-img" class="owl-carousel">
			        <?php foreach ($photos as $photo) {
			        	if($photo->idProduct == $product->idProduct) : ?>
			        	  	<!--div class="item"><img src="<?php echo ($resources_img.'/product/'.$photo->photoName); ?>" alt=""></div-->
			        	  	<div class="item" style="background-image: url(<?php echo ($resources_img.'/product/'.$photo->photoName); ?>);"></div>
			        	<?php endif;
			        } ?>
	          		</div>
	        	</div>
        	<!--End Menu thumb slider -->
	       	<!-- Menu Desc -->
	        	<div class="menu-desc col-md-6">
	          		<h2><?php echo $product->productTitle; ?><span class="pull-right"><?php echo $product->productPrice; ?> €</span></h2>
	          		<!-- Rating -->
	          		<fieldset class="rating">
	            		<?php for ($i = 0; $i < $product->productStars; $i++) : ?>
	            			<span class="active"><i class="fa fa-star"></i></span>
	            		<?php endfor; ?>
	            		<?php for ($i = 0; $i < (5-$product->productStars); $i++) : ?>
	            			<span><i class="fa fa-star"></i></span>
	            		<?php endfor; ?>
	          		</fieldset>
	          		<!-- End Rating -->
	          
	          		<!-- Tagged -->
	          		<div class="tagged"> 
	          			<?php echo ($product->isCeliac == 1 ? '<span class="label label-default">Per Ciliaci</span>' : ''); ?>
	          			<?php echo ($product->isVegan == 1 ? '<span class="label instock">Vegano</span>' : ''); ?>
	          			<?php echo ($product->isIntegral == 1 ? '<span class="label red">Integrale</span>' : ''); ?>
	          		</div>
	          		<!-- Ends Tagged -->
	          
	          		<!-- Description content -->
	          		<div class="desc-content">
	            		<p><?php echo ucfirst($product->productShortDescription); ?></p>
	            		<!-- Meta description -->
	            		<div class="meta-desc"> 
	            			<!--a class="shop btn btn-gold" href="#" data-toggle="tooltip" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></a-->
	              			<ul class="social pull-right">
	                			<li><a href="http://www.facebook.com/share.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&title=<?php echo urlencode($product->productTitle); ?>" target="_blank" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
	                			<li><a href="http://twitter.com/intent/tweet?status=<?php echo urlencode($product->productTitle); ?>+<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" target="_blank" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
	                			<li><a href="https://plus.google.com/share?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>
	                			<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $resources_img.'/product/'.$mainPhoto; ?>&url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&is_video=false&description=<?php echo urlencode(substr($product->productShortDescription, 0, 100).'...'); ?>" target="_blank" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
	              			</ul>
	            		</div>
	            		<!--End Meta description -->
	          		</div>
	          		<!--End Description content -->
	        	</div>
	        <!--End Menu Desc -->
	        	<div role="tabpanel" class="reviews-tabs padding-t-100">
	          		<!-- Menu tabs -->
	          		<ul class="nav nav-tabs" role="tablist">
	            		<li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">DESCRIZIONE</a></li>
	            		<li role="presentation" class="active"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">RECENSIONI</a></li>
	          		</ul>
	          		<!-- Tab panes -->
	          		<div class="tab-content">
	            		<div role="tabpanel" class="tab-pane active" id="review">
	              		<!-- Comments -->
	              			<div class="comment-blog">
	                			<h3>RECENSIONI   [<?php echo (isset($comments) ? count($comments) : '0'); ?>]</h3>
	                			<div id="comments">
	                  				<div id="comments-list-wrapper" class="comments">
	                    				<?php if ($comments) : ?>
	                    				<ol id="comments-list">
	                    				<?php foreach ($comments as $comment) : ?>
	                    					<li id="comment-1" class="comment-x byuser">
	                    						<div class="the-comment">
	                    							<div class="comment-author vcard"> 
	                    								<img src="<?php echo $resources_img.'/user.png'; ?>" class="avatar" alt=""> 
	                    								<span class="fn n"><a href="#"><?php echo $comment->commentName; ?></a></span> 
	                    							</div>
	                    							<div class="comment-meta"> 
	                    								<span> <?php echo date("M d, Y H:i:s", strtotime($comment->createdOn)); ?></span> 
	                    							</div>
	                    							<div class="comment-content">
	                    								<p><?php echo $comment->commentText; ?></p>
	                    							</div>
	                    						</div>
	                    					</li>
	                    				<?php endforeach; ?>
	                    				</ol>
	                    				<?php endif; ?>
	                  				</div>
	                  				<div id="respond">
	                  					<h3 id="reply-title">Aggiungi un commento
	                  						<!--small> 
	                  							<a rel="nofollow" id="cancel-comment-reply-link" href="#" class="cancelled">Cancel reply</a>
	                  						</small--> 
	                  					</h3>
	                  					<!-- Contact form -->
	                  					<div class="contact-form">
	                  							<form method="post" action="<?php echo site_url('front/c_BLG_Comment'); ?>">
	                  						<!-- Form Group -->
	                  							<input type="hidden" name="currentURL" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
	                  							<input type="hidden" name="idProduct" value="<?php echo $product->idProduct; ?>" />
	                  							<div class="form-group">
	                  				  				<div class="row">
	                  				    				<div class="col-md-6 col-sm-6 col-sx-12">
	                  				      					<!-- Element -->
	                  				      					<div class="element">
	                  				        					<input type="text" name="commentName" class="form-control text" placeholder="Nome *" required/>
	                  				      					</div>
	                  				     			 		<!-- End Element -->
	                  				    				</div>
	                  				    				<div class="col-md-6 col-sm-6 col-sx-12">
	                  				      					<!-- Element -->
	                  				      					<div class="element">
	                  				       						<input type="text" name="email" class="form-control text" placeholder="E-mail *" required/>
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
	                  				        					<textarea name="commentText" class="text textarea" placeholder="Commento *" required></textarea>
	                  				      					</div>
	                  				      					<!-- End Element -->
	                  				    				</div>
	                  				    				<!-- End form Group -->
	                  				  				</div>
	                  							</div>
	                  						<!-- Element -->
	                  							<div class="element text-center">
	                  				  				<button type="submit" id="submit-form" value="Send" class="btn btn-black btn-gold">Invia</button>
	                  				  				<div class="loading"></div>
	                  							</div>
	                  						<!-- End Element -->             		
	                  							</form>
	                  					</div>
	                  					<!-- End contact form -->
	                  				</div>
	                		</div>
	              		</div>
	              		<!-- End# Comments -->
	            	</div>
	            	
		            	<!-- Description tab-->
		            	<div role="tabpanel" class="tab-pane" id="description">
		              		<div class="row">
		              			<?php if( strlen($product->productDescription) > 300 ) : ?>
			              			<?php 
			              				$middle = strrpos(substr($product->productDescription, 0, floor(strlen($product->productDescription) / 2)), ' ') + 1;
			              					
			              				$firstParagraph = substr($product->productDescription, 0, $middle);  
			              				$secondParagraph = substr($product->productDescription, $middle);  
			              			?>
			                		<div class="col-md-6">
			                  			<p><?php echo ucfirst($firstParagraph); ?></p>
			                		</div>
			                		<div class="col-md-6">
			                  			<p><?php echo ucfirst($secondParagraph); ?></p>
			                		</div>
			                	<?php else : ?>
			                		<div class="col-md-12">
			                			<p><?php echo ucfirst($product->productDescription); ?></p>
			                		</div>
			                	<?php endif; ?>
		              		</div>
		            	</div>
		            	<!-- End Description tab-->
	          		</div>
	          		<!-- End Tab panes -->
	        	</div>
	        <!-- tab panel -->
     	 	</div>
    	</div>
  	</section>
  	<!-- End single menu -->
  	
  	<!-- Interest  -->
  	<?php if ($related_products) : ?>
  	<section class="interest-in padding-100 text-center">
    	<div class="container">
      		<div class="row">
        		<i class="icon-intro icon-large"></i>
        		<h1>ARTICOLI CORRELATI</h1>
        		
        		<!-- Menu type -->
        		<div class="menu-type dark">
          			<!-- Item -->
          			<?php foreach ($related_products as $related_product) : ?>
					<div class="col-md-4 col-sm-4 col-xs-12 item">
		                <!-- Overlay Content -->
		                <div class="overlay_content overlay-menu">
		                    <!-- Overlay Item -->
		                    <?php foreach ($photos as $photo) {
		                    	if($photo->idProduct == $related_product->idProduct) : ?>
		                    <div class="overlay_item" style="background-image: url(<?php echo ($resources_img.'/product/'.$photo->photoName); ?>)"> 
		                    	<?php break; endif;
		                    } ?>
		                    	<?php echo ($product->isCeliac == 1 ? '<span class="label">Per Ciliaci</span>' : ''); ?>
		                    	<?php echo ($product->isVegan == 1 ? '<span class="label">Vegano</span>' : ''); ?>
		                    	<?php echo ($product->isIntegral == 1 ? '<span class="label">Integrale</span>' : ''); ?>
		                    	
		                    	<!--
			                    <?php foreach ($photos as $photo) {
			                    	if($photo->idProduct == $related_product->idProduct) : ?>
			                    		<img src="<?php echo ($resources_img.'/product/'.$photo->photoName); ?>" alt="">
			                    	<?php break; endif;
			                    } ?>
			                    -->
		                 	   <!-- Overlay -->
		                  	   <div class="overlay">
		                    	  <!-- Icons -->
		                    	  <div class="icons">
		                      	  	  <h3><? echo $related_product->productTitle; ?></h3>
		                      	  	  <h3>€<? echo $related_product->productPrice; ?></h3>
		                      	  	  
					                  <!-- Rating -->
					                  <fieldset class="rating">
					                  	  <?php for ($i = 0; $i < $product->productStars; $i++) : ?>
					                      	  <span class="active"><i class="fa fa-star"></i></span>
					                      <?php endfor; ?>
					                      <?php for ($i = 0; $i < (5-$product->productStars); $i++) : ?>
					                      	  	<span><i class="fa fa-star"></i></span>
					                      <?php endfor; ?>
					                  </fieldset>
		                      		  <!-- End Rating -->
			                      	  <!-- Buttons -->
			                      	  <div class="button"> 
			                      	  	  <!--a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a--> 
			                      		  <a class="btn btn-gold" href="<?php echo site_url('front/product/'.$related_product->idProduct); ?>"><i class="fa fa-link"></i></a> 
			                      	  </div>
			                      	  <!-- End Buttons -->
			                      	  <a class="close-overlay hidden">x</a> 
			                      </div>
			                   <!-- End Icons -->
			                   </div>
		                  	   <!-- End Overlay -->
		                	</div>
		                	<!-- End Overlay Item -->
		           		</div>
		           		<!-- End Overlay Content -->
		           	</div>
           			<?php endforeach; ?>
          		<!-- End item -->
        		</div>
        		<!--End Menu type -->
        	
      		</div>
    	</div>
  	</section>
  	<?php endif; ?>
  <!-- End Interest -->
</div>
<!-- End #content -->