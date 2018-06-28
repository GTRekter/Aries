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
						Clienti <small>Lista clienti inseriti</small>
					 </h1>
					 <ol class="breadcrumb">
					     <li>
					     	<i class="fa fa-dashboard"></i> Dashboard
					     </li>
					     <li class="active">
					     	Clienti
					     </li>
					 </ol>
				</div>
		     </div>
		</div>	
         
        <div class="row">
			<div class="col-md-12">
				<div class="box box-blue">
					<div class="box-header">
						<h3 class="box-title">Lista Clienti</h3>
					</div>
					
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-hover">
						    	<thead>
						        	<tr>
							        	<td>Email</td>
						            	<td>Data di registrazione</td>
						                <td></td>
						            </tr>
						        </thead>
						        <?php if($costumers) : ?>
						        	<?php foreach ($costumers as $costumer) : ?>
								    	<tr>
								    		<td><?php echo ucfirst($costumer->costumerEmail); ?></td>
								        	<td><?php echo $costumer->createdOn; ?></td>
								        	<td href="<?php echo site_url('back/d_GEN_Costumer/'.$costumer->idCostumer); ?>">
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
		
	</div>
</div>
