<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h1>
						Articoli <small>Lista articoli inseriti</small>
					 </h1>
					 <ol class="breadcrumb">
					     <li>
					     	<i class="fa fa-dashboard"></i> Dashboard
					     </li>
					     <li class="active">
					     	Articoli
					     </li>
					 </ol>
				</div>
		     </div>
		</div>	
         
        <div class="row">
			<div class="col-md-12">
				<div class="box box-blue">
					<div class="box-header">
						<h3 class="box-title">Lista Articoli</h3>
					</div>
					
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-hover">
						    	<thead>
						        	<tr>
							        	<td>Immagine</td>
						            	<td>Titolo</td>
						            	<td>Sottotitolo</td>
						            	<td>Tipologia</td>
						                <td>Creazione</td>
						                <td>Status HP</td>
						                <td></td>
						            </tr>
						        </thead>
						        <?php if($articles) : ?>
						        	<?php foreach ($articles as $article) : ?>
								    	<tr>
								    		<td href="<?php echo site_url('back/article/' . $article->idArticle); ?>">
								    			<?php if ($photos) : ?>
									    			<? $articlesPhoto = array();
									    				foreach ($photos as $photo) {
										    				if ($article->idArticle == $photo->idArticle) {
										    					array_push($articlesPhoto, $photo->photoName);
										    				}
										    			}
									    			?>
									    			<?php if ($articlesPhoto) : ?>
									    				<img style="width: 70px; height: 50px"  src="<?php echo $resources_img ?>/article/<?php echo $articlesPhoto[0]; ?>" alt="" />
									    			<?php else : ?>
									    				<img style="width: 70px; height: 50px"  src="<?php echo $resources_img ?>/article/default.jpg" alt="" />
									    			<?php endif; ?>
								    			<?php endif; ?>
								    		</td>
								    		<td href="<?php echo site_url('back/article/' . $article->idArticle); ?>"><?php echo ucfirst($article->articleTitle); ?></td>
								    		<td href="<?php echo site_url('back/article/' . $article->idArticle); ?>"><?php echo ucfirst(substr($article->articleSubtitle, 0, 15) . '...' ); ?></td>
								    		<td href="<?php echo site_url('back/article/' . $article->idArticle); ?>">
								    			<?php echo ($article->articleType == 1 ? 'Evento' : 'News'); ?>
								    		</td>
								    		<td href="<?php echo site_url('back/article/' . $article->idArticle); ?>"><?php echo ucfirst($article->createdOn); ?></td>
								        	<td href="<?php echo site_url('back/article/' . $article->idArticle); ?>"><?php echo ($article->articleStatus == 0 ? 'Disattivo' : 'Attivo'); ?></td>
								        	<td href="<?php echo site_url('back/d_BLG_Article/'.$article->idArticle); ?>">
								        		<i class="flaticon-delete96"></i>
								        	</td>
								    	</tr>
								    	
						    		<?php endforeach; ?>
						    	<?php endif; ?>
						    </table>
					    </div>
				    </div>
				</div>	
					
				</div>
			</div>	
		</div>
		
		<script type="text/javascript">
		$(document).ready(function(){
		    $('table tr td').click(function(){
		        window.location = $(this).attr('href');
		        return false;
		    });
		});
		</script>
		
	</div>
</div>
