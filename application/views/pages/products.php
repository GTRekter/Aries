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
						Prodotti <small>Lista prodotti inseriti</small>
					 </h1>
					 <ol class="breadcrumb">
					     <li>
					     	<i class="fa fa-dashboard"></i> Dashboard
					     </li>
					     <li class="active">
					     	Prodotti
					     </li>
					 </ol>
				</div>
		     </div>
		</div>	
         
        <div class="row">
			<div class="col-md-12">
				<div class="box box-blue">
					<div class="box-header">
						<h3 class="box-title">Lista Prodotti</h3>
					</div>
					
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-hover">
						    	<thead>
						        	<tr>
							        	<td>Immagine</td>
						            	<td>Titolo</td>
						            	<td>Descrizione</td>
						                <td>Prezzo</td>
						                <td>Creazione</td>
						                <td>Status HP</td>
						                <td></td>
						            </tr>
						        </thead>
						        <?php if($products) : ?>
						        	<?php foreach ($products as $product) : ?>
								    	<tr>
								    		<td href="<?php echo site_url('back/product/' . $product->idProduct); ?>">
								    			<?php if ($photos) : ?>
									    			<? $productsPhoto = array();
									    				foreach ($photos as $photo) {
										    				if ($product->idProduct == $photo->idProduct) {
										    					array_push($productsPhoto, $photo->photoName);
										    				}
										    			}
									    			?>
									    			<?php if ($productsPhoto) : ?>
									    				<img style="width: 70px; height: 50px"  src="<?php echo $resources_img ?>/product/<?php echo $productsPhoto[0]; ?>" alt="" />
									    			<?php else : ?>
									    				<img style="width: 70px; height: 50px"  src="<?php echo $resources_img ?>/product/default.jpg" alt="" />
									    			<?php endif; ?>
								    			<?php endif; ?>
								    		</td>
								    		<td href="<?php echo site_url('back/product/' . $product->idProduct); ?>"><?php echo ucfirst($product->productTitle); ?></td>
								    		<td href="<?php echo site_url('back/product/' . $product->idProduct); ?>"><?php echo ucfirst(substr($product->productDescription, 0, 15) . '...' ); ?></td>
								    		<td href="<?php echo site_url('back/product/' . $product->idProduct); ?>"><?php echo number_format((float)$product->productPrice, 2, '.', ''); ?> €</td>
								    		<td href="<?php echo site_url('back/product/' . $product->idProduct); ?>"><?php echo ucfirst($product->createdOn); ?></td>
								        	<td href="<?php echo site_url('back/product/' . $product->idProduct); ?>"><?php echo ($product->productStatus == 0 ? 'Disattivo' : 'Attivo'); ?></td>
								        	<td href="<?php echo site_url('back/d_PRD_Product/'.$product->idProduct); ?>">
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
