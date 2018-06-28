<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!-- Content -->
<div id="content">
  	<!-- Menu Grid -->
  	<div class="menu_grid our-menu text-center padding-b-70">
    	<!-- Menu Bar -->
    	<div class="menu-bar dark">
      		<!-- menu Filter -->
      		<ul id="menu-fillter" class="clearfix">
      		<?php foreach ($categories as $category) : ?>
		        <li>
		        	<a href="#" data-filter=".<?php echo str_replace(' ', '', $category->idCategory); ?>">
		        		<?php echo $category->categoryName_it; ?>
		        	</a>
		        </li>
		    <?php endforeach; ?>
		    	<li><a href="#" data-filter="">Mostra Tutti</a></li>
      		</ul>
      		<!-- #menu-filter end -->
    	</div>
    	<!-- End menu bar -->
    	
    	<!-- Menu Items -->
    	<div class="container mt60">
      	<!-- Menu Items Masonary Content -->
      		<div id="menu-items" class="masonry-content menu-type dark clearfix" >
      			<?php foreach ($products as $product) : ?>
        		<!-- Menu Item -->
        		<article class="menu-item col-md-4 col-sm-6 col-xs-12 <?php echo str_replace(' ', '', $product->idCategory); ?>">
          		<!-- Overlay Content -->
          			<div class="overlay_content overlay-menu">
            		<!-- Overlay Item -->
            		<?php foreach ($photos as $photo) {
            		  	if($photo->idProduct == $product->idProduct) : ?>
            				<div class="overlay_item" style="background-image: url(<?php echo $resources_img.'/product/'.$photo->photoName; ?>);">
            			<?php break; endif; 
            		 } ?>
            			<?php echo ($product->isCeliac == 1 ? '<span class="label">Per Ciliaci</span>' : ''); ?>
            			<?php echo ($product->isVegan == 1 ? '<span class="label green">Vegano</span>' : ''); ?>
            			<?php echo ($product->isIntegral == 1 ? '<span class="label green">Integrale</span>' : ''); ?>
              			<!-- Overlay -->
              			<div class="overlay">
                			<!-- Icons -->
                			<div class="icons">
                  			<h3><?php echo $product->productTitle; ?></h3>
                  			<h3> €<?php echo $product->productPrice; ?></h3>
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
                  			<a class="btn btn-gold" href="<?php echo site_url('front/product/' . $product->idProduct) ?>"><i class="fa fa-link"></i></a> 
                  		</div>
                  		<!-- End Buttons -->
                  		<a class="close-overlay hidden">x</a> </div>
                		<!-- End Icons -->
              		</div>
              		<!-- End Overlay -->
            	</div>
           		<!-- End Overlay Item -->
          	</div>
          	<!-- End Overlay Content -->
        </article>
        <!-- End Menu Item -->
        <?php endforeach; ?>
      </div>
      	<!-- End Menu Content -->
    	</div>
    	<!-- #menu end -->
    </div>
  	<!-- End Menu Grid -->
</div>
<!-- end of #content -->