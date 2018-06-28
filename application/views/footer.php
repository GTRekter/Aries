<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

</div>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $resources_js; ?>/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <?php if ($page == 'index') : ?>
	    <script src="<?php echo $resources_js; ?>/plugins/morris/raphael.min.js"></script>
	    <script src="<?php echo $resources_js; ?>/plugins/morris/morris.min.js"></script>
	    <!--<script src="<?php echo $resources_js; ?>/plugins/morris/morris-data.js"></script>-->
	<?php endif; ?>
	
	<!-- FUNZIONA PER GRAFICI --> 
	<?php if($page == 'index') : ?>     
		<script type="text/javascript">
		$(document).ready(function() {
			  /* Morris.js Charts */
			  Morris.Area({
			    element: 'morris-area-chart',
			    resize: true,
			    data: [
			    	<?php for ($i = 1; $i <= 12; $i++) : ?>
			    		<?
			    		$productMontly = 0;
			    		$articleMontly = 0;	
			    		$year = date("Y");	
			    		    		
			    		foreach ($products as $product) {
			    			if ( (date("Y",strtotime($product->createdOn)) == $year) && (date("m",strtotime($product->createdOn)) == $i) ) {
			    				$productMontly += 1; 
			    			}
			    		}
			    		foreach ($articles as $article) {
			    			if ( (date("Y",strtotime($article->createdOn)) == $year) && (date("m",strtotime($article->createdOn)) == $i) ) {
			    				$articleMontly += 1; 
			    			}
			    		}
			    		?>
			    		{date: '<?php echo $year ?>-<?php echo $i ?>', prd: <?php echo $productMontly ?>, art: <?php echo $articleMontly ?>},
					<?php endfor; ?>
			    ],
			    xkey: 'date',
			    ykeys: ['prd','art'],
			    labels: ['Prodotti', 'Articoli'],
			    lineColors: ['#3c8dbc','#FF0000'],
			    hideHover: 'auto'
			  }); 
			  
			  // Donut Chart
			  Morris.Donut({
			      element: 'morris-donut-chart',
			      data: [{
			          label: "Prodotti",
			          value: <?php echo count($products); ?>
			      }, {
			          label: "Articoli",
			          value: <?php echo count($articles); ?>
			      }],
			      resize: true
			  });
			  
		 });
		</script>
	<? endif; ?>
	
	<?php 
		$flashdata = $this->session->flashdata('message');
		if (!empty($flashdata)) : ?>
			<script>
				alert('<?php echo trim(json_encode($flashdata),'"'); ?>');
			</script>
	<?php endif; ?>
</body>

</html>