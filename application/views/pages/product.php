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
        				Modifica <small>Articolo</small>
        			 </h1>
        			 <ol class="breadcrumb">
        			     <li class="active">
        			     	<i class="fa fa-dashboard"></i> Dashboard
        			     </li>
        			 </ol>
        		</div>
             </div>
        </div>
         
		<div class="row">
			<form class="modifyProduct" method="" action="">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Articolo</h3>
						</div>
						<div class="box-body">
							<input type="hidden" name="idProduct" value="<?php echo $product->idProduct; ?>" />
							<div class="form-group">
								<label>Titolo *</label>
							    <input class="form-control" name="productTitle" required="true" value="<?php echo ucwords($product->productTitle); ?>">
							</div>
							<div class="form-group">
								<label>Descrizione Breve *</label>
								<textarea class="form-control" name="productShortDescription" required="true" rows="5"><?php echo ucwords($product->productShortDescription); ?></textarea>
							</div>
							<div class="form-group">
								<label>Descrizione *</label>
								<textarea class="form-control" name="productDescription" required="true" rows="5"><?php echo ucwords($product->productDescription); ?></textarea>
							</div>
							<div class="form-group">
								<label>Categoria</label>
							   <select class="form-control" name="idCategory" required="true" <?php echo (isset($categories) ? '' : 'disabled'); ?>>
							   <?php if ($categories) : ?>
								   <?php foreach ($categories as $category) : ?>
								   		<option value="<?php echo $category->idCategory; ?>" <?php echo ($category->idCategory == $product->idProduct ? 'selected' : ''); ?>><?php echo $category->categoryName_it; ?></option>
								   <?php endforeach; ?> 
							   <?php endif; ?>
							   </select>
							</div>
							<label>Prezzo *</label>
							<div class="form-group input-group">
							    <span class="input-group-addon">€</span>
							    <input type="text" class="form-control" name="productPrice" required="true" value="<?php echo $product->productPrice; ?>">
							</div>
							<div class="form-group">
								<label>Per ciliaci &nbsp;</label>
							    <label class="radio-inline">
							    	<input type="radio" checked="" name="isCeliac" value="1">Si
							    </label>
							    <label class="radio-inline">
							    	<input type="radio" name="isCeliac" value="0">No
							    </label>
							</div>
							<div class="form-group">
								<label>Vegano &nbsp;</label>
							    <label class="radio-inline">
							    	<input type="radio" checked="" name="isVegan" value="1">Si
							    </label>
							    <label class="radio-inline">
							    	<input type="radio" name="isVegan" value="0">No
							    </label>
							</div>
							<div class="form-group">
								<label>Integrale &nbsp;</label>
							    <label class="radio-inline">
							    	<input type="radio" checked="" name="isIntegral" value="1">Si
							    </label>
							    <label class="radio-inline">
							    	<input type="radio" name="isIntegral" value="0">No
							    </label>
							</div>
							<div class="form-group">
								<label>Visibilità &nbsp;</label>
							    <label class="radio-inline">
							    	<input type="radio" checked="" name="productStatus" value="1" <?php echo ($product->productStatus == 1? 'checked' : ''); ?>>Visibile
							    </label>
							    <label class="radio-inline">
							    	<input type="radio" name="productStatus" value="0" <?php echo ($product->productStatus == 0? 'checked' : ''); ?>>Non Visibile
							    </label>
							</div>
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary">Salva</button>
						</div>
					</div>
				</div>
			</form>	
		
			<form class="newImage" enctype="multipart/form-data" method="post" action="<?php echo base_url('/index.php/back/c_PRD_Photos'); ?>">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Gallery</h3>
						</div>
						<div class="box-body">
							<input type="hidden" name="idProduct" value="<?php echo $product->idProduct; ?>" />
							<div class="form-group">
						   		<label for="cover">Immagine Gallery *</label>
						    	<input type="file" name="files[]" value="" multiple />
						    	<p class="help-block">Formato richiesto JPEG</p>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Salva</button>
						</div>
					</div>
				</div>
			</form>
			
			<form class="removeImage" method="" action="">
				<div class="col-md-12">
	            	<div class="box box-blue">
	                	<div class="box-header">
	                  		<h3 class="box-title">Gallery</h3>
	                	</div>
                
	                  	<div class="box-body">
	                  		<div class="row" id="gallery">
	                  			<?php if($photos) : ?>
			                  		<?php foreach ($photos as $photo) : ?>
			                  			<?php if($photo->idProduct == $product->idProduct) : ?>
			                  			<div id="<?php echo $photo->idPhoto ?>" class="col-xs-6 col-lg-3"> 
			                  				<img style="width: 100%; height: 150px;" src="<?php echo $resources_img.'/product/'.$photo->photoName; ?>" alt="" />
			                  				
			                  				<input type="checkbox" name="idPhoto[]" value="<?php echo $photo->idPhoto ?>" />
			                  				Cancella
			                  				
			                  			</div>
			                  			<?php endif; ?>
			                  		<?php endforeach; ?>
		                  		<?php endif; ?>
	                  		</div>
	                  	</div>
                  	
	                  	<div class="box-footer">
	                  		<button type="submit" class="btn btn-primary">Cancella</button>
	                  	</div>
	              	</div>
				</div>
			</form>
			
		</div>

		
		<script>
			var idValues = new Array();
			
			$('form.modifyProduct').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/u_PRD_Product',
			        data: $('form.modifyProduct').serialize(),
			            
			        success: function (result) {
			        	$("form.newProduct button[type='submit']").prop('disabled', true);
			        	
			        	alert("Modifica effettuata con successo");
			        },
			        error: function (result) {
			        	alert("Error 726: "+ result);
			        }
			    });
			});
			
			$('form.newImage').on('submit', function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				
				var nFile = $('form.newImage input[type=file]').get(0).files.length;
				formData.append("filesNumber", nFile);
				
				var id = $("form.newImage input[name='idProduct']").val();
				formData.append("idProduct", id);

				$.ajax({
					type:'POST',
		            url: '<?php echo base_url(); ?>/index.php/back/c_GEN_Photo_Product',
		            data: formData,
		            cache: false,
		            contentType: false,
		            processData: false,
		            success:function(data){
		                loadImages();
		                alert('Immagini caricate con successo');
		            },
		            error: function (result) {
		            	alert("Error 076: "+ result);
		            }
			    });
			});
			
			$('form.removeImage').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/d_GEN_Photo_byProduct',
			        data: $('form.removeImage').serialize(),
			        dataType: 'json',
			            
			        success: function (result) {
						$.each(result, function(id) {
							var child = document.getElementById(result[id]);
							var parent = document.getElementById("gallery");
							
							// Delete child
							parent.removeChild(child);
							
						});
			        },
			        error: function (result) {
			        	alert("Error 686: "+ result);
			        }
			    });
			});
			
			function loadImages() {
				var id = $("form.newImage input[name='idProduct']").val();
				
				$.ajax({
					type: 'post',
				    url: '<?php echo base_url(); ?>/index.php?/back/r_GEN_Photos_byProduct',
				    data: {idProduct: id},
				    dataType: 'json',
					
				    success: function(result) {
				    	$("#gallery").empty();
				    	$.each(result, function(id) {
				    	     	$("#gallery").append('<div id="' + result[id].idPhoto + '" class="col-xs-6 col-lg-3"> <img style="width: 100%; height: 150px;" src="<?php echo $resources_img ?>/product/' + result[id].photoName + '"> <input type="checkbox" name="idPhoto[]" value=' + result[id].idPhoto + ' /> Cancella </div>');
				    	 });
				    	 console.log(result);
				    },
				    error: function(error) {
				    	alert('ERROR');
				    	console.log(error);
				    }
				});
			}
		</script>
		
	</div>
</div>
