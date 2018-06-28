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
  	<section class="blog_single text-left padding-100">
    	<div class="container">
      		<div class="row">
        	<!-- Blog main content -->
        		<div class="blog-main-content">
          			<!-- Blog row -->
          			<div class="blog_row">
            		<!-- Blog img -->
            			<figure class="blog-img col-md-12"> 
            				<?php foreach ($photos as $photo) {
            				  	  if($photo->idArticle == $article->idArticle) : ?>
            				  	  	  <img class="img-responsive" src="<?php echo ($resources_img.'/article/'.$photo->photoName); ?>" alt="" style="width: 100%;" />
            				  	  	  <?php $mainPhoto = $photo->photoName; ?>
            				   	  <?php break; endif;
            				  } ?>
            			</figure>
            		<!-- End Blog img -->
            		<!-- Blog content -->
            			<div class="blog-content col-md-12">
              				<h2><?php echo $article->articleTitle; ?></h2>
              			<!-- Category -->
              				<div class="category"> 
              					<i class="fa fa-picture-o"></i> 
              					<span>
              					<?php switch($article->articleType) {
              						case '1': echo 'EVENTO'; break;
              						case '2': echo 'NEWS'; break;
              					}  ?> 
              					</span> 
              				</div>
              			<!--End Category -->
             			<!-- Links -->
              				<div class="links">
				                <ul>
				                  	<li><i class="fa fa-calendar"></i> Scritto il <?php echo date("d F Y", strtotime($article->createdOn)); ?></li>
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
			              	
			              		<?php 
				              		$middle = strrpos(substr($article->articleText, 0, floor(strlen($article->articleText) / 2)), ' ') + 1;
				              		
				              		$firstParagraph = substr($article->articleText, 0, $middle);  
				              		$secondParagraph = substr($article->articleText, $middle);  
			              		?>
			                	<p><?php echo $firstParagraph; ?></p>
			                	
				                <div class="row blog-image">
				                <?php 
				                $photoArticle = array();
				                foreach ($photos as $photo) {
				                  	 if($photo->idArticle == $article->idArticle) {
				                  	  	 array_push($photoArticle, $photo->photoName);
				                  	 }
				                }
				                ?>
				                 <?php if( count($photoArticle) > 1) : ?>
				                 	<?php foreach ($photoArticle as $photo) : ?>
				                 	<div class="col-md-3 col-sm-6">
				                 	    <!--<img class="img-responsive" src="<?php echo ($resources_img.'/article/'.$photo->photoName); ?>" alt="" style="min-height: 738px;" />-->
				                 	  	<div style="background-image: url(<?php echo ($resources_img.'/article/'.$photo); ?>); background-size: cover; background-position: center; height: 160px; border-radius: 10px;"></div>
				                 	  </div>	
				                 	<?php endforeach; ?>
				                 <?php endif; ?>
				                </div>
                 				<p><?php echo $secondParagraph; ?></p>
              				</div>
            			</div>
            		<!-- End Blog content -->
            		<!-- Post Meta -->
            			<div class="post-meta">
              				<p>tagged by</p>
			              	<ul class="labels">
			              		<?php $tags = explode(",", $article->articleTag); 
			              		foreach ($tags as $tag) {
			              			echo '<li><a href="#"><span class="label label-tagged">'.$tag.'</span> </a></li> ';
			              		} ?>
			              	</ul>
			              	<!-- Social share -->
			              	<div class="social-share pull-right">
			              		<ul>
			              	    	<li><a href="http://www.facebook.com/share.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&title=<?php echo urlencode($article->articleTitle); ?>" target="_blank"><i class="fa fa-facebook"></i> Share</a></li>
			             	     	<li><a href="http://twitter.com/intent/tweet?status=<?php echo urlencode($article->articleTitle); ?>+<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" target="_blank"><i class="fa fa-twitter"></i> Tweet</a></li>
			             	     	<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $resources_img.'/article/'.$mainPhoto; ?>&url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&is_video=false&description=<?php echo urlencode(substr($article->articleText, 0, 100).'...'); ?>" target="_blank"><i class="fa fa-pinterest"></i> Pin</a></li>
			                	</ul>
			              	</div>
              				<!-- Social share -->
            			</div>
            		<!-- End Post Meta -->
            		<!-- Pagination 
            		<ul class="pagination-gold">
              			<li class="next">
              				<a href="blog_single_lightbox.html"> NEXT Post <i class="fa fa-angle-double-right"></i></a>
              			</li>
              			<li class="previous">
              				<a href="blog_single_soundclouds.html"> <i class="fa fa-angle-double-left"></i> PREVIOUS POST</a>
              			</li>
            		</ul-->
         		</div>
          			<!-- End Blog row -->
          		
	          		<!-- Comments -->
	          		<div class="comment-blog">
	            		<h3>Commenti [<?php echo (isset($comments) ? count($comments) : '0'); ?>]</h3>
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
		                    			<input type="hidden" name="idArticle" value="<?php echo $article->idArticle; ?>" />
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
        	<!--End Blog main content -->
      		</div>
    	</div>
  	</section>
  	<!-- End blog list -->
</div>
<!-- end of #content -->
