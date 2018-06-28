<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<!DOCTYPE html>
<html lang="it">
	<head>
	<!-- Meta Tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Pasticceria da forno, gelati e granite prodotti in modo artigianale, caffetteria e Tavola Fredda con Sala interna.">
		<meta name="description" content="Pasticceria, Gelateria, Granite, Artigianale, Caffetteria, Tavola Fredda, Milano, Lombardia, Delicatezze ">
		<meta name="author" content="Web Evolution">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
	<!-- Facebook Meta Tags -->
		<?php if ($page == 'index' || $page == 'Blog' || $page == 'Contatti' || $page == 'Prodotti' ) : ?>
			<meta property="og:title" content="Bagalà | Pasticceria & Gelateria Artigianale">
			<meta property="og:site_name" content="Bagalà | Pasticceria & Gelateria Artigianale">
			<meta property="og:type" content="website">
			<meta property="og:locale" content="it_IT">
			<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
			<meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
			<meta property="og:image" content="<?php echo $resources_img.'/facebookImage.jpg'; ?>">
		<? endif; ?>
	
		<?php if ($page == 'Articolo') : ?>
			<meta property="og:title" content="<?php echo $article->articleTitle; ?>">
			<meta property="og:site_name" content="Bagalà | Pasticceria & Gelateria Artigianale">
			<meta property="og:type" content="article">
			<meta property="og:locale" content="it_IT">
			<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
			<meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
			
			<?php foreach ($photos as $photo) {
			  	if($photo->idArticle == $article->idArticle) : ?>
					<meta property="og:image" content="<?php echo $resources_img.'/article/'.$photo->photoName; ?>">
				<?php break; endif;
			} ?>
			<meta property="og:image:type" content="image/jpg">
			<meta property="article:published_time" content="<?php echo $article->createdOn; ?>">
			<meta property="article:author" content="Bagalà | Pasticceria & Gelateria Artigianale">
			<meta property="article:section" content="Bagalà | Pasticceria & Gelateria Artigianale | Blog">
			<meta property="article:tag" content="<?php echo $article->articleTag; ?>">
		<? endif; ?>
		<?php if ($page == 'Prodotto') : ?>
			<meta property="og:title" content="<?php echo $product->productTitle; ?>">
			<meta property="og:site_name" content="Bagalà | Pasticceria & Gelateria Artigianale">
			<meta property="og:type" content="article">
			<meta property="og:locale" content="it_IT">
			<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
			<meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
			
			<?php foreach ($photos as $photo) {
			  	if($photo->idProduct == $product->idProduct) : ?>
					<meta property="og:image" content="<?php echo $resources_img.'/product/'.$photo->photoName; ?>">
				<?php break; endif;
			} ?>
			<meta property="og:image:type" content="image/jpg">
			<meta property="article:published_time" content="<?php echo $product->createdOn; ?>">
			<meta property="article:author" content="Bagalà | Pasticceria & Gelateria Artigianale">
			<meta property="article:section" content="Bagalà | Pasticceria & Gelateria Artigianale | Prodotti">
			<meta property="article:tag" content="<?php echo str_replace(' ', ',', $product->productTitle); ?>">
		<? endif; ?>
		
		<title>Bagalà | Pasticceria & Gelateria Artigianale</title>
	<!-- Favicon Icons -->
		<link rel="shortcut icon" href="<?php echo $resources_img; ?>/favicon/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $resources_img; ?>/favicon/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $resources_img; ?>/favicon/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $resources_img; ?>/favicon/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $resources_img; ?>/favicon/apple-touch-icon-144x144.png">
		
	<!-- Bootstrap CSS  -->
		<link href="<?php echo $resources_css; ?>/bootstrap.min.css" rel="stylesheet">
	<!-- Plugins -->
	<!-- Owl Carousal -->
		<link rel="stylesheet" href="<?php echo $resources_css; ?>/plugins/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo $resources_css; ?>/plugins/owl.theme.css">
	<!-- Animate -->
		<link rel="stylesheet" href="<?php echo $resources_css; ?>/plugins/animate.css">
	<!-- Date Picker -->
		<link rel="stylesheet" href="<?php echo $resources_css; ?>/plugins/jquery.datetimepicker.css">
	<!-- Pretty Photo -->
		<link rel="stylesheet" href="<?php echo $resources_css; ?>/plugins/prettyPhoto.css">
	<!-- Font Awsomeme icons -->
		<link rel="stylesheet" href="<?php echo $resources_css; ?>/plugins/font-awesome.min.css">
		
	<!-- General Stylesheet -->
		<!-- <link href="fonts/fonts.css" rel="stylesheet"> -->
		<link href="<?php echo $resources_css; ?>/frontend.css" rel="stylesheet">
		<link href="<?php echo $resources_css; ?>/frontend-responsive.css" rel="stylesheet">
		
	<!--[if lt IE 9]>
	      <script src="<?php echo $resources_js; ?>/html5shiv.js"></script>
	      <script src="<?php echo $resources_js; ?>/respond.min.js"></script>
	<![endif]-->
	</head>
	<body>