<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!-- End header -->
<div id="content">
	<!-- Intro -->
  	<section id="intro01" class="padding-100 intro2_01">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-6"> <img class="img-responsive" src="<?php echo $resources_img; ?>/about_1.jpg" alt=""> </div>
        		<div class="col-md-5 text-center intro_message mt40"> 
          			<!-- Head Title -->
          			<div class="head_title">
          				<i class="icon-intro"></i>
              			<h1><?php foreach ($texts as $text) {
              					echo($text->idText == 1 ? $text->textDescription_it : '');
              				} ?></h1>
              			<span class="welcome">Benvenuto in Bagalà</span>
          			</div>
          			<!-- End# Head Title -->
          			<p><?php foreach ($texts as $text) {
          					echo($text->idText == 2 ? $text->textDescription_it : '');
          				} ?></p>
        		</div>
        		<!-- End intro center -->
      		</div>
    	</div>
  	</section>
  	<!-- End intro -->
  	<!-- Chef Message -->
  	<section id="slide2-01" class="chef-message dark text-center" >
    	<div class="bcg" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide2-01" style="background-image:url('<?php echo $resources_img; ?>/about_3.jpg');">
      		<div class="bg-transparent padding-100">
        		<div class="container">
          			<div class="row">
            			<div class="col-md-7">
              				<h1 ><?php foreach ($texts as $text) {
              						echo($text->idText == 3 ? $text->textDescription_it : '');
              					} ?></h1>
              				<p><?php foreach ($texts as $text) {
              					echo($text->idText == 4 ? $text->textDescription_it : '');
              				} ?></p>
              				<h2 class="signature">Pasticceria Bagalà</h2>
            			</div>
            			<img src="<?php echo $resources_img; ?>/about_2.png" alt=""> 
            		</div>
        		</div>
      		</div>
      		<!-- en of bg transparent -->
    	</div>
  	</section>
  <!-- End chef message -->
  
  <!-- Our Team -->
  <section class="our_team text-center padding-100">
      <div class="container">
      	  <div class="row"> 
       	  <!-- Head Title -->
      		  <div class="head_title">
               	  <i class="icon-intro"></i>
            	  <h1>I nostri Chef</h1>
            	  <span class="welcome ">I più cordiali Chef professionisti</span>
          	  </div>
          <!-- End# Head Title -->
        	  <div id="our_team_carousel" class="owl-carousel owl-theme">
          		  <div class="item">
            		  <div class="overlay_content clearfix">
              			  <div class="overlay_item">
              			  	  <img src="<?php echo $resources_img.'/chef/chef_1.jpg' ?>" alt="">
                			  <div class="overlay">
                  				  <div class="icons"> 
                  				  	  <a href="https://www.facebook.com/domenico.giurgola" target="_blank"><i class="fa fa-facebook"></i></a> 
                  				  	  <a href="https://plus.google.com/111726979582805791636" target="_blank"><i class="fa fa-google-plus"></i></a> 
                  				  	  <a class="close-overlay hidden">x</a> 
                  				  </div>
                			  </div>
	                		  <div class="desc">
	                  			  <h2><a href="#">Mimmo Giurgola</a></h2>
	                  			  <p>Pasticciere</p>
	                		  </div>
	              		  </div>
	            	  </div>
	          	  </div>
	          <!-- End item -->
	          	  <div class="item">
	          		  <div class="overlay_content clearfix">
	          			  <div class="overlay_item">
	          			  	  <img src="<?php echo $resources_img.'/chef/chef_2.jpg' ?>" alt="">
	            			  <div class="overlay">
	              				  <div class="icons"> 
	              				  	  <a href="https://www.facebook.com/silvia.ferrarini.18" target="_blank"><i class="fa fa-facebook"></i></a> 
	              				  	  <a href="#"><i class="fa fa-twitter"></i></a> 
	              				  	  <a href="#"><i class="fa fa-linkedin"></i></a> 
	              				  	  <a href="#"><i class="fa fa-google-plus"></i></a> 
	              				  	  <a class="close-overlay hidden">x</a> 
	              				  </div>
	            			  </div>
	                		  <div class="desc">
	                  			  <h2><a href="team_single.html">Silvia Ferrarini</a></h2>
	                  			  <p>Pasticciera</p>
	                		  </div>
	              		  </div>
	            	  </div>
	          	  </div>
	          <!-- End item -->
	              <div class="item">
	          		  <div class="overlay_content clearfix">
	          			  <div class="overlay_item">
	          			  	  <img src="<?php echo $resources_img.'/chef/chef_3.jpg'; ?>" alt="">
	            			  <div class="overlay">
	              				  <div class="icons"> 
	              				  	  <a href="#"><i class="fa fa-facebook"></i></a> 
	              				  	  <a href="#"><i class="fa fa-twitter"></i></a> 
	              				  	  <a href="#"><i class="fa fa-linkedin"></i></a> 
	              				  	  <a href="#"><i class="fa fa-google-plus"></i></a> 
	              				  	  <a class="close-overlay hidden">x</a> 
	              				  </div>
	            			  </div>
	                		  <div class="desc">
	                  			  <h2><a href="#">Simona </a></h2>
	                  			  <p>Camerriera</p>
	                		  </div>
	              		  </div>
	            	  </div>
	          	  </div>
	          <!-- End item -->
        	  </div>
          <!-- End our team slide -->
      	  </div>
      </div>
  </section>
  <!-- End our team -->
  
  <!-- Extra -->
  <section class="extra_touch black-bg dark padding-100 text-center">
      <div class="container">
      	  <div class="row">
        	  <h2><?php foreach ($texts as $text) {
        	  			echo($text->idText == 7 ? $text->textDescription_it : '');
        	  		} ?></h2>
        	  <a href="<?php echo site_url('front/index'); ?>" class="btn btn-gold white">Prenota il tuo tavolo</a> 
       	  </div>
      </div>
  </section>
  <!-- End extra touch -->
  
  <!-- Our Mission  -->
  <section class="our_mession padding-100 text-center">
      <div class="container">
      	  <div class="row"> 
        	  <!-- Head Title -->
        		  <div class="head_title">
        	  		  <i class="icon-intro"></i>
            		  <h1><?php foreach ($texts as $text) {
            		  		echo($text->idText == 5 ? $text->textDescription_it : '');
            		  	} ?></h1>
            		  <span class="welcome ">Qualità ed attenzione ai dettagli</span>
        		  </div>
        	  <!-- End # Head Title -->
        		  <div class="clearfix"></div>
        		  <div class="mission-wrapper">
          			  <div class="col-md-5 mission-slide">
            		  <div id="mission-slider" class="owl-carousel mission-slider">
              			  <div class="item"><img src="<?php echo $resources_img.'/slide/about_1.jpg'; ?>" alt=""></div>
              			  <div class="item"><img src="<?php echo $resources_img.'/slide/about_2.jpg'; ?>" alt=""></div>
              			  <div class="item"><img src="<?php echo $resources_img.'/slide/about_3.jpg'; ?>" alt=""></div>
            		  </div>
          		  </div>
          	  <!-- End mission slider -->
          		  <div class="col-md-7 text-left darkgray mission-content">
            		  <p><?php foreach ($texts as $text) {
            		  		echo($text->idText == 6 ? $text->textDescription_it : '');
            		  	} ?></p>
          		  </div>
          	  <!-- End mission content -->
        	  </div>
      	  </div>
      	  <!--ends mission-wrapper -->
      </div>
  </section>
  <!-- End  Our Mission  -->
</div>
<!-- End #content -->
