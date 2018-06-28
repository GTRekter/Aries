<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!-- Document Content  -->
<div id="content">

	<!-- welcome block  -->
  	<section  class="padding-100 welcome-block">
    	<div class="container">
      		<div class="row">
        	<!-- Left Img Intro -->
        		<div class="col-md-4"> 
        			<img class="img-responsive" src="<?php echo $resources_img.'/home_1.jpg'; ?>" alt=""> 
        		</div>
        	<!-- End Left Img Intro -->
        	<!-- Intro Text Center -->
        		<div class="col-md-4 text-center">
        		<!-- Head Title -->
          			<div class="head_title">
              			<i class="icon-intro"></i>
              			<h1><?php foreach ($texts as $text) {
              						echo($text->idText == 8 ? $text->textDescription_it : '');
              					} ?></h1>
              			<span class="welcome">Benvenuti in Bagalà</span>
          			</div>
          		<!-- End# Head Title -->
          			<p><?php foreach ($texts as $text) {
          						echo($text->idText == 9 ? $text->textDescription_it : '');
          					} ?></p>
          			<a href="<?php echo site_url('front/about'); ?>" class="btn btn-gold">Leggi di più</a> 
          		</div>
        	<!-- End intro center -->
        	<!-- Right Img Intro -->
        		<div class="col-md-4"> 
        			<img class="img-responsive" src="<?php echo $resources_img.'/home_2.jpg'; ?>" alt=""> 
        		</div>
        	<!-- End Right Img Intro -->
      		</div>
    	</div>
	</section>
  	<!-- End welcome block -->
  	
  	<!-- Discover -->
    <section id="slide-2" class="discover dark text-center">
    	<!-- Parallax Bg -->
    	<div class="bcg background14" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-2">
      		<!-- Bg Transparent -->
      		<div class="bg-transparent padding-100" >
        		<div class="container">
          			<h1>Prelibatezze da leccarsi i baffi</h1>
          			<p class="text-uppercase">Prodotti rigorosamente freschi di giornata</p>
          		</div>
      		</div>
      		<!-- End Bg transparent -->
   		</div>
    	<!-- End Parallax Bg -->
	</section>
    <!-- End Discover -->
  
    <!-- Menu Today  -->
    <div class="menu_today dark padding-100">
    	<div class="container">
      		<div class="row">
      		
        	<!-- Menu Item -->
        		<div class="menu-item col-md-4 col-sm-4 col-xs-12">
          			<figure> 
          				<img class="img-responsive" src="<?php echo $resources_img.'/home_5.jpg'; ?>" alt="RELAXING AMBIENCE" />
            			<figcaption class="text-center">
              				<div class="fig_container">
                				<h3>QUALITA</h3>
                				<p>La migliore sfoglia a tua disposizione</p>
              				</div>
            			</figcaption>
          			</figure>
        		</div>
        	<!-- End Menu Item -->
        	
        	<!-- Menu Item -->
        		<div class="menu-item col-md-4 col-sm-4 col-xs-12">
          			<figure> 
          				<img class="img-responsive" src="<?php echo $resources_img.'/home_6.jpg'; ?>" alt="RELAXING AMBIENCE" />
            			<figcaption class="text-center">
              				<div class="fig_container">
                				<h3>DOMENICA</h3>
                				<p>Aperti 7 giorni su 7 </p>
              				</div>
            			</figcaption>
          			</figure>
        		</div>
       		<!-- End Menu Item -->
       		
        	<!-- Menu Item -->
	        	<div class="menu-item col-md-4 col-sm-4 col-xs-12">
	          		<figure> 
	          			<img class="img-responsive" src="<?php echo $resources_img.'/home_7.jpg'; ?>" alt="RELAXING AMBIENCE" />
	            		<figcaption class="text-center">
	              			<div class="fig_container">
	                			<h3>CILIACI</h3>
	                			<p>Offriamo dolci per tutte le diete</p>
	              			</div>
	            		</figcaption>
	          		</figure>
	        	</div>
        	<!-- End Menu Item -->
      		</div>
  	  </div>
  </div>
  <!-- End menu today -->
  
  <!-- Reservation  -->
  <section id="intro-3" class="reservation dark text-center">
      <!-- Bg Parallax -->
  	  <div class="bcg background15" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#intro-3">
      	  <!-- Bg Transparent -->
          <div class="bg-transparent padding-100">
        	  <div class="container">
          	  	  <div class="row"> 
           			  <!-- Head Title -->
          		  	  <div class="head_title">
              		      <i class="icon-intro"></i>
                	  	  <h1>Prenotazioni</h1>
              		      <span class="welcome">Prenota il tuo dolce su misura</span>
          			  </div>
          			  <!-- End# Head Title -->
            		  <!-- Reservation form -->
               		  <form class="reserv_form" action="reser-process.php" method="post">
              			  <!-- Form group -->
              		  	  <div class="form-group">
                			  <div class="row">
                  				  <div class="col-md-3 col-sm-6 col-sx-12 animated" data-animation="fadeInLeft" data-animation-delay="200">
                    				  <input name="name" class="form-control" type="text" placeholder="Nome *" required>
                  				  </div>
                  				  <div class="col-md-3 col-sm-6 col-sx-12 animated" data-animation="fadeInLeft" data-animation-delay="400">
                    				  <input name="email" class="form-control" type="text" placeholder="Email" >
                  				  </div>
                  				  <div class="col-md-3 col-sm-6 col-sx-12 animated" data-animation="fadeInLeft" data-animation-delay="600">
			                      <!-- Selct wrap -->
			                          <div class="select_wrap">
			                              <select class="form-control" name="occasion">
			                              	  <option value="one">Occasione *</option>
			                        		  <option value="birthday">Compleanno</option>
			                        		  <option value="wedding">Matrimonio</option>
			                        		  <option value="baptism">Battesimo</option>
			                        		  <option value="communion">Comunione</option>
			                        		  <option value="other">Altro</option>
			                      		  </select>
			                    	  </div>
                    		      <!-- End select wrap -->
                  			      </div>
                  				    <div class="col-md-3 col-sm-6 col-sx-12 animated" data-animation="fadeInLeft" data-animation-delay="800">
					                   <!-- Selct wrap -->
					                   <div class="select_wrap">
					                      	<select class="form-control" name="food">
					                        	<option value="one">Preferenze di cibo *</option>
						                        <option value="vegan">Vegano</option>
						                        <option value="ciliac">Ciliaco</option>
						                        <option value="nopreference">Nessuna Preferenza</option>
						                    </select>
					                    </div>
					                   <!-- End select wrap -->
                  				    </div>
                				</div>
              			  </div>
              			  <!-- End form group -->
              				
			              <!-- form group -->
			              <div class="form-group">
			                  <div class="row">
			                      <div class="col-md-3 col-sm-6 col-sx-12 animated" data-animation="fadeInLeft" data-animation-delay="1000">
			                          <input name="branch" class="form-control" type="text" placeholder="Nominativo *" required>
			                      </div>
			                      <div class="col-md-3 col-sm-6 col-sx-12 animated" data-animation="fadeInLeft" data-animation-delay="1200">
			                          <input name="personnum" class="form-control" type="text" placeholder="Numbero di Persone*" >
			                      </div>
			                      <div class="col-md-3 col-sm-6 col-sx-12 animated" data-animation="fadeInLeft" data-animation-delay="1400">
			                          <input name="phone" class="form-control" type="tel" placeholder="Numero di Telefono*">
			                      </div>
			                      <div class="col-md-3 col-sm-6 col-sx-12 datepicker animated" data-animation="fadeInLeft" data-animation-delay="1600">
			                          <input name="date" class="form-control" id="datetimepicker" placeholder="Data" type="text" >
			                          <i class="fa fa-calendar"></i>    
			                      </div>
			                  </div>
			              </div>
			              <!-- End form group -->
              
              		      <!-- Form group -->
              			  <div class="form-group animated" data-animation="fadeInLeft" data-animation-delay="1800">
                	          <textarea name="comment" placeholder="Messaggio"></textarea>
              			  </div>
              		      <!-- End form group -->
              
              			  <a href="#" class="btn btn-gold white animated" id="reser-submit" data-animation="fadeInUp" data-animation-delay="2000">Prenota il tuo dolce</a> 
              		   </form>
            	      <!-- End reservation form -->
            	      <div class="done">
            	          <strong>Grazie!</strong> Abbiamo ricevuto la tua prenotazione. 
             	      </div>
            	      <!-- End reservation form -->
                  </div>
              </div>
          </div>
          <!-- End bg transparent -->
      </div>
      <!-- End Bg Parallax -->
  </section>
  <!-- End Reservation -->
  
  <!-- Our menu -->
  <section class="padding-100 our_menu">
  	  <div class="container">
          <div class="row">
              <!-- Head Title -->
              <div class="head_title">
          		  <i class="icon-intro"></i>
          		  <h1>IL NOSTRO MENU</h1>
          		  <span class="welcome">Scegli & Prova</span>
      		  </div>
      		  <!-- End# Head Title -->
      
      		  <?php if (isset($products) && isset($products) ) : ?>
        	  <!-- Menu Tabs -->
        	  <div class="menu_tabs">
          	  	  <div class="row">
            	  <!-- Our menu tab container  -->
            		  <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 our-menu-tab-container">
              		  <!-- Tab menu -->
              		  	  <div class="col-md-2 col-sm-3 col-xs-12 tab-menu">
                		  	  <div class="list-group"> 
                		  	  	<?php $isFirst = true; 
                		  	  		foreach ($categories_limited as $category) : ?>
                		  	  		<a href="#" class="list-group-item <?php echo($isFirst == true ? 'active' : ''); ?> text-center">
                		  	  			<?php 
                		  	  				echo strtoupper($category->categoryName_it); 
                		  	  				$isFirst = false; 
                		  	  			?>
                		  	  		</a> 
                		  	  	<?php endforeach; ?>
                		  	  </div>
              			  </div>
              		  <!-- Tab menu -->
              		  
              		  <!-- Our Menu Tabs -->
	              		  <div class="col-md-10 col-sm-9 col-xs-12 our-menu-tabs">
	              		  
	              		  	  <?php 
	              		  	  $isFirst = true; 
	              		  	  foreach ($categories_limited as $category) : ?>
	                		  <!-- Tab content  -->
	                		  <div class="tab-content <?php echo($isFirst == true ? 'active' : ''); ?>">
	                  			  <!-- Our Menu Slider -->
	                  			  <div class="our-menu-slider">
	                  			  <?php foreach ($products as $product) : ?>
	                  			      <?php if ($product->idCategory == $category->idCategory) : ?>
	                    			  <!-- Item -->
	                    			  <?php foreach ($photos as $photo) {
	                    			     if($photo->idProduct == $product->idProduct) : ?>
	                    			  	<div class="item" style="background-image: url(<?php echo $resources_img.'/product/'.$photo->photoName; ?>);"> 
	                    			  	<?php break; endif;
	                    			  } ?>
	                    			  	<!--
	                    			  	  <?php foreach ($photos as $photo) {
	                    			  	  	  if($photo->idProduct == $product->idProduct) : ?>
	                    			  	  	  	  <img class="lazyOwl" src="<?php echo $resources_img.'/product/'.$photo->photoName; ?>" alt="Food menu" style="width: 870px;">
	                    			  	   	  <?php break; endif;
	                    			  	  } ?>
	                    			  	  -->
	                      			  	  <!-- Item Description -->
	                      				  <div class="item_desc">
	                        				  <h3><?php echo $product->productTitle; ?><span class="price pull-right">€ <?php echo $product->productPrice; ?></span></h3>
	                        			  	  <!-- Rating -->
	                        				  <fieldset class="rating">
	                          				  	  <?php for ($i = 0; $i < $product->productStars; $i++) : ?>
	                          				  	  		<span class="active"><i class="fa fa-star"></i></span>
	                          				  	  	<?php endfor; ?>
	                          				  	  	<?php for ($i = 0; $i < (5-$product->productStars); $i++) : ?>
	                          				  	  	<span><i class="fa fa-star"></i></span>
	                          				  	  <?php endfor; ?>
	                        				  </fieldset>
	                        				  <!-- End rating -->
	                        				  <p><?php echo ucwords($product->productShortDescription); ?></p>
	                        				  <div class="form-group buttons"> 
	                        				  	  <!--a class="btn btn-gold" href="#"><i class="fa fa-shopping-cart"></i></a--> 
	                        				  	  <a class="btn btn-gold" href="<?php echo site_url('front/product/' . $product->idProduct); ?>"><i class="fa fa-link"></i></a> 
	                        				  </div>
	                      				  </div>
	                      				  <!-- End item description -->
	                    			  </div>
	                    			  <!-- End item -->
	                    			  <?php endif; ?>
	                    	      <?php endforeach; ?>
	                    	 	  </div>
	                  			  <!-- End our menu slider -->
	                  			  <a href="<?php echo site_url('products'); ?>" class="view_all btn btn-gold ">Scopri di più</a> 
	                  			  <?php $isFirst = false;  ?>
	                  		  </div>
	                		  <!-- End Tab content -->
	                		  <?php endforeach; ?>
	                		  
	              		  </div>
              		  <!-- End Our Menu Tabs -->
            	  	  </div>
            	  <!-- End Our menu tab container -->
          		  </div>
        	  </div>
        	  <!-- End Menu Tabs  -->
        	  <?php else : ?>
        	  <div class="padding-100">
        	      <div class="container text-center">
        	           <h1>LISTINO IN FASE DI ALLESTIMENTO</h1>
        	           <p class="text-uppercase">Visita la nostra pagina <a href="#" style="color: #c59d5f;">Facebook</a> e rimani aggiornato sulle nostre novità</p>
        	       </div>
        	  </div>
        	  <?php endif; ?>
      	  </div>
      </div>
  </section>
  <!-- End our menu -->
 
  
  <!-- Video -->
  <section id="slide-04" class="video dark text-center" >
      <!-- BG Parallax -->
      <div class="bcg background16" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-04">
      	  <!-- Bg transparent -->
      	  <div class="bg-transparent padding-100">
        	  <!-- Left bg -->
        	  <div class="left_bg"> 
        	  	  <img  src="<?php echo $resources_img; ?>/home_8.png" alt=""> 
        	  </div>
        	  <!-- End left bg -->
        	  <!-- Right bg -->
        	  <!--div class="right_bg"> 
        	  	  <img  src="<?php echo $resources_img; ?>/home_9.png" alt=""> 
        	  </div-->
        	  <!-- End right bg -->
       		  <!-- Left bg2 -->
        	  <!--div class="right_bg2"> 
        	  	  <img  src="<?php echo $resources_img; ?>/home_10.png" alt=""> 
        	  </div-->
        	  <!-- End right bg2 -->
        	  <div class="container">
          	  	  <div class="row">
            	  <!-- Text video center -->
            	  <div class="col-lg-8 col-lg-offset-4 col-md-12 text-center">
              	  	  <h1 class="">Quel tocco in più</h1>
              		  <b>Pasticceria a 360°</b>
              		  <p class="italic mt40">Proponiamo pasticceria, gelato e granite artigianali per catering, albergatori, ristoratori, aziende, organizzatori di eventi: compleanni, comunioni, cerimonie, matrimoni, rinfreschi, banchetti, brunch e buffet, party, feste ed eventi pubblici o privati ... garantendo sempre un prodotto artigianale di grande qualità.</p>
            	  </div>
            	  <!-- End Text video center -->
          	  </div>
          </div>
          </div>
          <!-- End bg transpernt -->
      </div>
      <!-- End bg parallax -->
  </section>
  <!-- End video -->
  
  <!-- Latest News -->
  <section class="latest_news">
      <div class="container">
          <div class="row">
          <!-- Head Title -->
              <div class="head_title">
              	  <i class="icon-intro"></i>
                  <h1>Latest News</h1>
              	  <span class="welcome">Stay up to Date</span>
          	  </div>
          <!-- End# Head Title -->
       
          <!-- News Content -->
	          <div class="news-content dark">
	          <?php if ($articles) : ?>
	              <?php foreach ($articles as $article) : ?>
	          	  <!-- News Item -->
	          	  <div class="news-item col-md-4 col-sm-4 col-xs-12">
	            	  <figure> 
	            	  	  <?php foreach ($photos as $photo) {
	            	  	      if($photo->idArticle == $article->idArticle) : ?>
	            	  	      	<div class="item" style="background-image: url(<?php echo ($resources_img.'/article/'.$photo->photoName); ?>);"></div>
	            	  	      <?php break; endif;
	            	  	  } ?>
	            	  	  <!--
	            	  	  <?php foreach ($photos as $photo) {
	            	  	  	  if($photo->idArticle == $article->idArticle) : ?>
	            	  	    	  <img class="img-responsive" src="<?php echo ($resources_img.'/article/'.$photo->photoName); ?>" alt="" height="738px" />
	            	  	      <?php break; endif;
	            	  	  } ?>
	            	  	  -->
	              	  	  <figcaption class="text-center">
	                	  	  <div class="fig_container"> <i class="fa fa-picture-o"></i>
		                  		  <h3><a href="blog_single_image.html"><?php echo $article->articleTitle; ?></a></h3>
		                  		  <p>Event</p>
		                  		  <div class="fig_content"> 
		                  		  	  <a href="<?php echo site_url('front/article/' . $article->idArticle); ?>">
		                  		  	  	<?php echo substr($article->articleText, 0, 72) . '...'; ?></a>
		                  		  </div>
		                	  </div>
	                	      <span class="btn btn-gold primary-bg white"><?php echo date("d F Y", strtotime($article->createdOn)); ?></span> 
	                	  </figcaption>
	            	  </figure>
	          	  </div>
	          	  <!-- End News Item -->
	          	  <?php endforeach; ?>
	          <?php endif; ?>
	          </div>
          <!-- End News Content -->
      	  </div>
      </div>
  </section>
  <!-- End latest News-->
</div>
<!-- End content !-->
