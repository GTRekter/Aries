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
        				Creazione <small>Newsletter</small>
        			 </h1>
        			 <ol class="breadcrumb">
        			     <li>
        			     	<i class="fa fa-dashboard"></i> Dashboard
        			     </li>
        			     <li class="active">
        			     	<i class="fa fa-dashboard"></i> Newsletter
        			     </li>
        			 </ol>
        		</div>
             </div>
        </div>
         
		<div class="row">
			<form class="newNewsletter" method="" action="">
				<div class="col-md-12">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Newsletter</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Oggetto *</label>
							    <input class="form-control" name="newsletterObject" required="true">
							</div>
							<div class="form-group">
								<label>Testo *</label>
								<textarea class="form-control" name="newsletterText" required="true" rows="5"></textarea>
							</div>
							<p>Se desideri utilizzare un software esterno per la creazione di Newsletter complesse, puoi esportare la lista degli utenti registrati al sito, selezionando la tabella <b>Clienti</b> da questo link: <a href="<?php echo site_url(); ?>/back/csv"> <b>Esportazione CSV</b> </a></p>
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary">Invia Newsletter</button>
						</div>
					</div>
				</div>
				
			</form>	

		</div>

		
		<script>
			var idValues = new Array();
			
			$('form.newNewsletter').on('submit', function (e) {
				e.preventDefault();
				
//				$.ajax({
//			    	type: 'post',
//			        url: '<?php echo base_url(); ?>/index.php/back/c_PRD_Product',
//			        data: $('form.newProduct').serialize(),
//			        dataType: 'json',
//			            
//			        success: function (result) {
//			        	$("form.newImage input[name='idProduct']").val( result );
//			        	
//			        	$("form.newProduct button[type='submit']").prop('disabled', true);
//			        	$("form.newImage button[type='submit']").prop('disabled', false);
//			        	
//			        	alert('Articolo inserito con successo');
//			        }, 
//			        error: function (result) {
//			        	alert('Errore 501:' + result);
//			        	console.log(result);
//			        }
//			    });
			});
		</script>
	</div>
</div>
