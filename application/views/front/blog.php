<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!-- Content -->
<div id="content">
	<!-- Blog list -->
  	<section class="blog_list text-left padding-100">
    	<div class="container">
	      	<div class="row">
	      	
	        	<!-- Blog main content -->
	        	<div class="blog-main-content">
	        	<?php if ($articles) : ?>
	        		<?php foreach ($articles as $article) : ?>
	          		<!-- Blog row -->
	          		<div class="blog_row">
	            		<!-- Blog img -->
	            		<figure class="blog-img col-md-6 col-sm-6 col-xs-12"> 
	            		<?php foreach ($photos as $photo) {
	            		  	  if($photo->idArticle == $article->idArticle) : ?>
	            			<a href="<?php echo site_url('front/article/' . $article->idArticle); ?>" style="background-image: url(<?php echo ($resources_img.'/article/'.$photo->photoName); ?>);">
	            		<?php break; endif;
	            		} ?>
	            			
	            			<!--<?php foreach ($photos as $photo) {
	            			  	  if($photo->idArticle == $article->idArticle) : ?>
	            			  	  	  <img class="img-responsive" src="<?php echo ($resources_img.'/article/'.$photo->photoName); ?>" alt="" />
	            			   	  <?php break; endif;
	            			  } ?>-->
	            			</a>
	              			<figcaption class="text-center"> 
	              				<span class="btn btn-gold primary-bg white"><?php echo date("d F Y", strtotime($article->createdOn)); ?></span> 
	              			</figcaption>
	            		</figure>
	            		<!-- Blog content -->
	            		<div class="blog-content col-md-6 col-sm-6 col-xs-12">
	              			<h2><a href="<?php echo site_url('front/article/' . $article->idArticle); ?>"><?php echo $article->articleTitle; ?></a></h2>
	              			<!-- Category -->
	              			<div class="category"> <i class="fa fa-picture-o"></i> 
	              			<?php switch($article->articleType) {
	              				case '1': echo 'EVENTO'; break;
	              				case '2': echo 'NEWS'; break;
	              			}  ?> 
	              			</div>
	              			<!--End Category -->
	              			<!-- Links -->
	              			<div class="links">
	                			<ul>
	                  				<li> <a href="#"><i class="fa fa-user"></i> Pasticceria Bagalà</a></li>
	                  				<li>
	                  					<i class="fa fa-tags"></i> 
	                  					<?php $tags = explode(",", $article->articleTag); 
	                  					foreach ($tags as $tag) {
	                  						if(end($tags) !== $tag){
	                  						    echo '<a href="#">'.$tag.'</a><span>,</span> ';
	                  						} else {
	                  							echo '<a href="#">'.$tag.'</a> ';
	                  						}
	                  					} ?>
	                  				</li>
	                  				<li><a href="#"><i class="fa fa-heart"></i> <?php echo $article->articleViews; ?></a></li>
	                			</ul>
	              			</div>
	              			<!-- End links -->
	              			<div class="text-content">
	               	 			<p><?php echo substr($article->articleText, 0, 445) . '...'; ?></p>
	                			<a href="<?php echo site_url('front/article/' . $article->idArticle); ?>" class="btn btn-gold" data-toggle="tooltip" data-placement="right" title="Leggi di più"><i class="fa fa-arrow-right"></i></a> 
	                		</div>
	            		</div>
	            		<!-- End Blog content -->
	            		<!-- Divider -->
	            		<div class="blog-divider"> <span></span> <i class="icon-home-ico"></i> <span></span> </div>
	            		<!-- End# Divider -->
	          		</div>
	          		<!-- End Blog row -->
	          		<?php endforeach; ?>
	          	<?php else : ?>
	          		<div class="padding-100">
	          		    <div class="container text-center">
	          		         <h1>BLOG IN FASE DI ALLESTIMENTO</h1>
	          		         <p class="text-uppercase">Visita la nostra pagina <a href="#" style="color: #c59d5f;">Facebook</a> e rimani aggiornato sulle nostre novità</p>
	          		     </div>
	          		</div>
	          	<?php endif; ?>
	        	</div>
	        	<!-- End Blog main content -->
	        	
		        <!-- Pagination -->
		        <div class="clearfix"></div>
		        <div class="col-md-12">
		          	<ul class="majesty_pagination">
		          		<?php echo $this->pagination->create_links(); ?>
		          	</ul>
		        </div>
		        <!-- End Pagination -->
		    </div>
	    </div>
  	</section>
  	<!-- End blog list -->
</div>
<!-- end of #content -->
