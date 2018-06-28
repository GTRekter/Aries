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
        				Creazione <small>Prodotto</small>
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
			<form class="newProduct" method="" action="">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Prodotto</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Titolo *</label>
							    <input class="form-control" name="productTitle" required="true">
							</div>
							<div class="form-group">
								<label>Descrizione Breve *</label>
								<textarea class="form-control" name="productShortDescription" required="true" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label>Descrizione *</label>
								<textarea class="form-control" name="productDescription" required="true" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label>Categoria</label>
							   <select class="form-control" name="idCategory" required="true" <?php echo (isset($categories) ? '' : 'disabled'); ?>>
							   <?php if ($categories) : ?>
								   <?php foreach ($categories as $category) : ?>
								   		<option value="<?php echo $category->idCategory; ?>"><?php echo $category->categoryName_it; ?></option>
								   <?php endforeach; ?> 
							   <?php endif; ?>
							   </select>
							</div>
							<label>Prezzo *</label>
							<div class="form-group input-group">
							    <span class="input-group-addon">€</span>
							    <input type="text" class="form-control" name="productPrice" required="true">
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
							    	<input type="radio" checked="" name="productStatus" value="1">Visibile
							    </label>
							    <label class="radio-inline">
							    	<input type="radio" name="productStatus" value="0">Non Visibile
							    </label>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary" <?php echo (isset($categories) ? '' : 'disabled'); ?>>Inserisci</button>
						</div>
					</div>
				</div>
			</form>	
		
			<form class="newImage" enctype="multipart/form-data" method="post" action="">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Gallery</h3>
						</div>
						<div class="box-body">
							<input type="hidden" name="idProduct" value="" />
							<div class="form-group">
						   		<label for="cover">Immagine Gallery *</label>
						    	<input type="file" name="files[]" value="" multiple />
						    	<p class="help-block">Formato richiesto JPEG</p>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary" disabled="true">Salva</button>
						</div>
					</div>
				</div>
			</form>
			
			<div class="col-md-12">
            	<div class="box box-blue">
                	<div class="box-header">
                  		<h3 class="box-title">Gallery</h3>
                	</div>
                  	<div class="box-body">
                  		<div class="row" id="gallery"></div>
                  	</div>
              	</div>
			</div>
			
		</div>

		
		<script>
			var idValues = new Array();
			
			$('form.newProduct').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/c_PRD_Product',
			        data: $('form.newProduct').serialize(),
			        dataType: 'json',
			            
			        success: function (result) {
			        	$("form.newImage input[name='idProduct']").val( result );
			        	
			        	$("form.newProduct button[type='submit']").prop('disabled', true);
			        	$("form.newImage button[type='submit']").prop('disabled', false);
			        	
			        	alert('Articolo inserito con successo');
			        }, 
			        error: function (result) {
			        	alert('Errore 501:' + result);
			        	console.log(result);
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
		            error: function(data){
		                alert('Errore 406:' + result);
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
				    	$.each(result, function(id) {
				    	     	$("#gallery").append('<div class="col-xs-6 col-lg-4"> <img style="margin-top: 10px; width: 100%; height: 150px;" src="<?php echo $resources_img ?>/product/' + result[id].photoName + '" class="img-responsive"></div>');
				    	 });
				    },
				    error: function(error) {
				    	alert('Errore 631:' + result);
				    }
				});
			}
			
			// CONTROLLO PREZZo
			$("input[name='productPrice']").keyup(function(){
				if ( checkPrice($(this).val()) == true ) 
				{	
					$(this).parent().removeClass('has-error');
					$(this).parent().addClass('has-success');
					$('.newProduct button[type="submit"]').prop("disabled",false);
				} else {
					$(this).parent().removeClass('has-success');
					$(this).parent().addClass('has-error');
					$('.newProduct button[type="submit"]').prop("disabled",true);
				}
			});
			function checkPrice(price) {
				// var weight = $("input[name='productWeight']").val();
				var pattern = new RegExp('^[0-9]+([,.][0-9]{1,2})?$');
	
				if(!pattern.test(price))
			  	{
			    	price = "";
			    	return false;
			  	}else{
			    	return true;
			  	}
			}
		</script>
		
	</div>
</div>
