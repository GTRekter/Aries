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
        				Creazione <small>Categoria</small>
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
			<form class="newCategory" method="" action="">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Categoria</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Titolo *</label>
							    <input class="form-control" name="categoryName_it" required="true">
							</div>
							<div class="form-group">
								<label for="cover">Immagine categoria *</label>
							    <input type="file" name="file">
							    <p class="help-block">Formato richiesto JPEG</p>
							</div>
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary">Inserisci</button>
						</div>
					</div>
				</div>
			</form>				
		</div>

		
		<script>
			$('form.newCategory').on('submit', function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/c_PRD_Category',
			        data: formData,
			        cache: false,
			        contentType: false,
			        processData: false,
			            
			        success: function (result) {
			        	$("form.newCategory button[type='submit']").prop('disabled', true);
			        	alert("Categoria inserita con successo");
			        	console.log(result);
			        },
			        error: function (result) {
			        	alert("Error 726: "+ result);
			        	console.log(result);
			        }
			    });
			});
		</script>
		
	</div>
</div>
