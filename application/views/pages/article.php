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
			<form class="modifyArticle" method="" action="">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Articolo</h3>
						</div>
						<div class="box-body">
							<input type="hidden" name="idArticle" value="<?php echo $article->idArticle; ?>" />
							<div class="form-group">
								<label>Titolo *</label>
							    <input class="form-control" name="articleTitle" required="true" value="<?php echo ucwords($article->articleTitle); ?>">
							</div>
							<div class="form-group">
								<label>Sotto-Titolo *</label>
							    <input class="form-control" name="articleSubtitle" required="true" value="<?php echo ucwords($article->articleSubtitle); ?>">
							</div>
							<div class="form-group">
								<label>Testo *</label>
								<textarea class="form-control" name="articleText" required="true" rows="5"><?php echo ucwords($article->articleText); ?></textarea>
							</div>
							<div class="form-group">
								<label>Tipologia *</label>
								<select class="form-control" name="articleType" required="true">
									<option value="1" <?php echo($article->articleType == 1 ? 'selected' : ''); ?>>Evento</option>
									<option value="2" <?php echo($article->articleType == 2 ? 'selected' : ''); ?>>News</option>
								</select>
							</div>
							<div class="form-group">
								<label>Tag *</label>
								<input class="form-control" name="articleTag" required="true" value="<?php echo ucwords($article->articleTag); ?>">
								<p class="help-block">Separa i campi con la virgola e senza spazi (ex. Tag,Tag,..)</p>
							</div>
							<div class="form-group">
								<label>Visibilità &nbsp;</label>
							    <label class="radio-inline">
							    	<input type="radio" checked="" name="articleStatus" value="1" <?php echo ($article->articleStatus == 1? 'checked' : ''); ?>>Visibile
							    </label>
							    <label class="radio-inline">
							    	<input type="radio" name="articleStatus" value="0" <?php echo ($article->articleStatus == 0? 'checked' : ''); ?>>Non Visibile
							    </label>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary">Inserisci</button>
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
							<input type="hidden" name="idArticle" value="<?php echo $article->idArticle; ?>" />
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
			                  			<?php if($photo->idArticle == $article->idArticle) : ?>
			                  			<div id="<?php echo $photo->idPhoto ?>" class="col-xs-6 col-lg-3"> 
			                  				<img style="width: 100%; height: 150px;" src="<?php echo $resources_img.'/article/'.$photo->photoName; ?>" alt="" />
			                  				
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
			
			$('form.modifyArticle').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/u_BLG_Article',
			        data: $('form.modifyArticle').serialize(),
			            
			        success: function (result) {
			        	$("form.modifyArticle button[type='submit']").prop('disabled', true);
			        	
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
				
				var id = $("form.newImage input[name='idArticle']").val();
				formData.append("idProduct", id);

				$.ajax({
					type:'POST',
		            url: '<?php echo base_url(); ?>/index.php/back/c_GEN_Photo_Article',
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
			        url: '<?php echo base_url(); ?>/index.php/back/d_GEN_Photo_byArticle',
			        data: $('form.removeImage').serialize(),
			        dataType: 'json',
			            
			        success: function (result) {
						$.each(result, function(id) {
							var child = document.getElementById(result[id]);
							var parent = document.getElementById("gallery");

							// Delete child
							parent.removeChild(child);
							alert('Immagini rimosse con successo'); 
						});
						console.log(result);
			        },
			        error: function (result) {
			        	alert("Error 686: "+ result);
			        }
			    });
			});
			
			function loadImages() {
				var id = $("form.newImage input[name='idArticle']").val();
				
				$.ajax({
					type: 'post',
				    url: '<?php echo base_url(); ?>/index.php?/back/r_GEN_Photos_byArticle',
				    data: {idArticle: id},
				    dataType: 'json',
					
				    success: function(result) {
				    	$("#gallery").empty();
				    	
				    	$.each(result, function(id) {
				    	     	$("#gallery").append('<div id="' + result[id].idPhoto + '" class="col-xs-6 col-lg-3"> <img style="width: 100%; height: 150px;" src="<?php echo $resources_img ?>/article/' + result[id].photoName + '"> <input type="checkbox" name="idPhoto[]" value=' + result[id].idPhoto + ' /> Cancella </div>');
				    	 });
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
