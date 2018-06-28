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
						Categorie <small>Lista categorie inseriti</small>
					 </h1>
					 <ol class="breadcrumb">
					     <li>
					     	<i class="fa fa-dashboard"></i> Dashboard
					     </li>
					     <li class="active">
					     	Categorie
					     </li>
					 </ol>
				</div>
		     </div>
		</div>	
         
        <div class="row">
			<div class="col-md-12">
				<div class="box box-blue">
					<div class="box-header">
						<h3 class="box-title">Lista Categorie</h3>
					</div>
					
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-hover">
						    	<thead>
						        	<tr>
							        	<td>Immagine</td>
						            	<td>Titolo</td>
						                <td>Creazione</td>
						                <td></td>
						            </tr>
						        </thead>
						        <?php if($categories) : ?>
						        	<?php foreach ($categories as $category) : ?>
								    	<tr>
								    		<td href="<?php echo site_url('back/category/' . $category->idCategory); ?>">
								    			<?php if ($photos) : ?>
									    			<? $categoryPhoto = array();
									    				foreach ($photos as $photo) {
										    				if ($category->idCategory == $photo->idCategory) {
										    					array_push($categoryPhoto, $photo->photoName);
										    				}
										    			}
									    			?>
									    			<?php if ($categoryPhoto) : ?>
									    				<img style="width: 70px; height: 50px"  src="<?php echo $resources_img ?>/category/<?php echo $categoryPhoto[0]; ?>" alt="" />
									    			<?php else : ?>
									    				<img style="width: 70px; height: 50px"  src="<?php echo $resources_img ?>/category/default.jpg" alt="" />
									    			<?php endif; ?>
								    			<?php endif; ?>
								    		</td>
								    		<td href="<?php echo site_url('back/category/' . $category->idCategory); ?>"><?php echo ucfirst($category->categoryName_it); ?></td>
								    		<td href="<?php echo site_url('back/category/' . $category->idCategory); ?>"><?php echo ucfirst($category->createdOn); ?></td>
								        	<td href="<?php echo site_url('back/d_PRD_Category/'.$category->idCategory); ?>">
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
