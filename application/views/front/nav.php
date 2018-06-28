<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!-- Loader  -->
<div id="loader">
  <div class="loader-item"> <img src="<?php echo $resources_img.'/logo_intro.png' ?>" alt="">
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  </div>
</div>
<!-- End Loader -->

<!-- Document Wrapper  -->
<div id="wrapper">

	<?php if($page == "index") : ?>
		<!-- Zooming Slider  -->
		<section id="home-header" class="zooming-slider dark fullheight">
			<div class="bg-transparent fullheight">
		  	<!-- Slider content -->
		  		<div class="slider-content">
		    	<!-- Text Rotater -->
		    	<ul id="fade">
		      		<li><h1>Come in & Taste</h1></li>
		      		<li><h1>most delicious food</h1></li>
		      		<li><h1>most delicious desserts</h1></li>
		    	</ul>
		    	<!-- End Text Rotater -->
		    	<i class="icon-home-ico"></i>
		    	<p class="text-uppercase">We Create Sweet Memories</p>
		    	<!--<a href="about.html" class="btn btn-gold white">DISCOVER MORE</a> </div>-->
		  	<!-- End Slider content  -->
			</div>
		</section>
		<!-- End Zooming Slider -->
	<? else : ?>
		<!-- banner -->
		<section class="banner dark" >
		    <div id="contact-parallax">
		        <div class="bcg <?php switch($page) {
		        		case "Chi Siamo": echo "background1"; break;
		        		case "Blog": echo "background2"; break;
		        		case "Contatti": echo "background3"; break;
		        		case "Menu": echo "background4"; break;
		        		case "Prodotto": echo "background5"; break;
		        	} ?>
		        
		        " data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#contact-parallax">
		      	    <div class="bg-transparent">
		                <div class="banner-content">
		                    <div class="container" >
		            		    <div class="slider-content"> 
		            		    	<i class="icon-home-ico"></i>
		              				<h1><?php echo ($page == "Prodotto" ? $product->productTitle : $page); ?></h1>
		              				<p>
		              				<?php switch($page) {
		              					case "Chi Siamo": echo "Dove tutto è iniziato"; break;
		              					case "Blog": echo "Le ultime news da Bagalà"; break;
		              					case "Contatti": echo "Rimaniamo in contatto"; break;
		              					case "Menu": echo "Il tuo gusto è il nostro obiettivo"; break;
		              					case "Prodotto": echo "Corri a provarlo"; break;
		              				} ?>
		              				</p>
		              				<ol class="breadcrumb">
					                	<li><a href="<?php echo site_url('front/index') ?>">Home</a></li>
					                	<li><?php echo $page; ?></li>
					              	</ol>
		            			</div>
		          			</div>
		        		</div>
		        		<!-- End Banner content -->
		      		</div>
		      		<!-- End bg trnsparent -->
		    	</div>
		  	</div>
		 	 <!-- Service parallax -->
		</section>
		<!-- End Banner -->
	<?php endif; ?>
    
  
  	<!-- Header  -->
  	<header id="header" class="header-transparent">
    	<div class="container">
      		<div class="row">
        		<div id="main-menu-trigger">
        			<i class="fa fa-bars"></i>
        		</div>
        		
       			<!-- Logo  -->
       			<div id="logo"> 
       				<a href="<?php echo site_url('front/index'); ?>" class="light-logo">
       					<img src="<?php echo $resources_img.'/logo_bagalà.png'; ?>" alt="Logo">
       				</a> 
       				<a href="<?php echo site_url('front/index'); ?>" class="dark-logo">
       					<img src="<?php echo $resources_img.'/logo_bagalà.png'; ?>" alt="Logo">
       				</a> 
       			</div>
       			<!--End #logo  -->
        			
        		<!-- Primary Navigation  -->
        		<nav id="main-menu" class="dark">
        			<ul>
        				<li>
        					<a href="<?php echo site_url('front/index'); ?>">
          						<div>Home</div>
         					</a>
          				</li>
          				<li>
          					<a href="<?php echo site_url('front/about'); ?>">
          						<div>Chi Siamo</div>
          					</a>
          				</li>
        				<li class="mega-menu">
        					<a href="#">
          						<div>Menu</div>
          					</a>
          					<div class="mega-menu-content  col-1 clearfix">
            					<ul>
              						<li class="mega-menu-title">
                						<div id="menu_carousel">
                							<?php foreach ($categories as $category) : ?>
                  							<div class="item"> 
                  								<a href="<?php echo site_url('front/products'); ?>"> 
                  									<img class="img-responsive" src="<?php echo $resources_img.'/category/'.$category->photoName; ?>"  alt="starter">
                    								<h2><?php echo $category->categoryName_it; ?></h2>
                    							</a> 
                    						</div>
                    						<?php endforeach; ?>
                 						</div>
              						</li>
            					</ul>
          					</div>
        				</li>
        				<li>
        					<a href="<?php echo site_url('front/blog'); ?>">
          						<div>Blog</div>
          					</a>
        				</li>
        				<li>
        					<a href="<?php echo site_url('front/contact'); ?>">
          						<div>Contatti</div>
          					</a> 
          				</li>
        			</ul>
        		</nav>
        		<!-- #main-menu end -->
        	</div>
        </div>
  	</header>
  	<!-- End Header Transparent -->
