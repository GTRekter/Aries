<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {
	// Login Check
	function __construct() {
		parent::__construct();
		$query = $this->is_logged_in();
		
		if ($query == false) {
			$this->session->set_flashdata('message','Per accedere al Pannello Admin devi prima eseguire il login!');
			redirect('front/login');
		}

		$this->load->model('backmodel');
	}
	function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if (!isset($is_logged_in) || $is_logged_in != true) {
			return false;
		} else {
			return true;
		}
	}
	function logout() {
		$data = array('username', 'is_logged_in');
		$this->session->unset_userdata($data);
		
		$this->session->set_flashdata('message','Ciao, a presto!');
		redirect('front/login');
	}
	// End Login Check
	
	// PRESENTATION
	public function index() {
		$data['page'] = 'index';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['products'] = $this->backmodel->ra_PRD_Products('');
		$data['articles'] = $this->backmodel->ra_BLG_Articles('');
		$data['photos'] = $this->backmodel->ra_GEN_Photos('');
		
		$this->load->view('home',$data);
		$this->load->view('footer',$data);
	}
	
	public function products() {
		$data['page'] = 'products';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->ra_GEN_Photos('');
		$data['products'] = $this->backmodel->ra_PRD_Products('');
		
		$this->load->view('pages/products',$data);
		$this->load->view('footer',$data);
	}
	public function product() {
		$data['page'] = 'product';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->r_GEN_Photos_byProduct($this->uri->segment(3));
		$data['product'] = $this->backmodel->r_PRD_Product($this->uri->segment(3));
		$data['categories'] = $this->backmodel->ra_PRD_Categories('');
		
		$this->load->view('pages/product',$data);
		$this->load->view('footer',$data);
	}	
	public function n_product() {
		$data['page'] = 'n_product';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['categories'] = $this->backmodel->ra_PRD_Categories('');
		
		$this->load->view('pages/n_product',$data);
		$this->load->view('footer',$data);
	}
	public function articles() {
		$data['page'] = 'articles';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->ra_GEN_Photos('');
		$data['articles'] = $this->backmodel->ra_BLG_Articles('');
		
		$this->load->view('pages/articles',$data);
		$this->load->view('footer',$data);
	}
	public function article() {
		$data['page'] = 'article';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->r_GEN_photos_byArticle($this->uri->segment(3));
		$data['article'] = $this->backmodel->r_BLG_Article($this->uri->segment(3));
		
		$this->load->view('pages/article',$data);
		$this->load->view('footer',$data);
	}	
	public function n_article() {
		$data['page'] = 'n_product';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/n_article',$data);
		$this->load->view('footer',$data);
	}
	public function categories() {
		$data['page'] = 'categories';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->ra_GEN_Photos('');
		$data['categories'] = $this->backmodel->ra_PRD_Categories('');
		
		$this->load->view('pages/categories',$data);
		$this->load->view('footer',$data);
	}
	public function category() {
		$data['page'] = 'category';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->r_GEN_photos_byArticle($this->uri->segment(3));
		$data['category'] = $this->backmodel->r_PRD_category($this->uri->segment(3));
		
		$this->load->view('pages/category',$data);
		$this->load->view('footer',$data);
	}
	public function n_category() {
		$data['page'] = 'n_category';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/n_category',$data);
		$this->load->view('footer',$data);
	}
	public function text() {
		$data['page'] = 'text';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['text'] = $this->backmodel->r_GEN_Text($this->uri->segment(3));
		
		$this->load->view('pages/text',$data);
		$this->load->view('footer',$data);
	}
	public function texts() {
		$data['page'] = 'texts';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['texts'] = $this->backmodel->ra_GEN_Texts('');
		
		$this->load->view('pages/texts',$data);
		$this->load->view('footer',$data);
	}
	public function costumers() {
		$data['page'] = 'costumers';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['costumers'] = $this->backmodel->ra_GEN_Costumers('');
		
		$this->load->view('pages/costumers',$data);
		$this->load->view('footer');
	}
	public function n_newsletter() {
		$data['page'] = 'n_newsletter';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/n_newsletter');
		$this->load->view('footer');
	}
	public function csv() {
		$data['page'] = 'csv';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/csv',$data);
		$this->load->view('footer',$data);
	}
	public function xml() {
		$data['page'] = 'xml';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/xml',$data);
		$this->load->view('footer',$data);
	}
	
	// ACTIONS	
	public function c_PRD_Product() {
		//Form Validation
		$this->load->library('form_validation');
		
		// Rules
		$this->form_validation->set_rules('productTitle', 'Nome', 'trim|required');
		$this->form_validation->set_rules('productDescription', 'Descrizione', 'trim|required');
		$this->form_validation->set_rules('productShortDescription', 'Descrizione Breve', 'trim|required');
		$this->form_validation->set_rules('productPrice', 'Prezzo', 'trim|required');
		// Messages
		$this->form_validation->set_message('required', 'Riempi il campo %s');
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			// Validation Errors
			$this->session->set_flashdata('message', validation_errors());
			// Returning to Checkout Page
			redirect($this->input->post('currentURL'));
		} else {	
			// Prepairing the Data for the Product
			$data = array(
				'productTitle' => strtolower($this->input->post('productTitle')),
				'productDescription' => strtolower($this->input->post('productDescription')),
				'productShortDescription' => strtolower($this->input->post('productShortDescription')),
				'productPrice' => $this->input->post('productPrice'),
				'productStatus' => $this->input->post('productStatus'),
				'isCeliac' => $this->input->post('isCeliac'),
				'isVegan' => $this->input->post('isVegan'),
				'isIntegral' => $this->input->post('isIntegral'),
				'idCategory' => $this->input->post('idCategory'),
				'createdOn' => date("Y-m-d")
			);
			
			// Saving Product to Database
			$idProduct = $this->backmodel->c_PRD_Product($data);
			header('Content-Type: application/x-json; charset=utf-8');
			echo json_encode($idProduct);
		}	
	}
	public function r_PRD_Products() {
		$idProduct = $this->input->post('idProduct');
		$data = $this->backmodel->r_PRD_Products($idProduct);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}
	public function u_PRD_Product() {
		// Prepairing the Data for the Product
		$data = array(
			'productTitle' => strtolower($this->input->post('productTitle')),
			'productDescription' => strtolower($this->input->post('productDescription')),
			'productShortDescription' => strtolower($this->input->post('productShortDescription')),
			'productPrice' => $this->input->post('productPrice'),
			'productStatus' => $this->input->post('productStatus'),
			'isCeliac' => $this->input->post('isCeliac'),
			'isVegan' => $this->input->post('isVegan'),
			'isIntegral' => $this->input->post('isIntegral'),
		);	
		// Updating Product
		$this->backmodel->u_PRD_Product($this->input->post('idProduct'), $data);
	}
	public function d_PRD_Product() {
		$this->backmodel->d_PRD_Product($this->uri->segment(3)); 

		$photos = $this->backmodel->ra_GEN_Photos('');
		foreach ($photos as $photo) {
			if($photo->idProduct == $this->uri->segment(3)) {
				$img = $this->backmodel->r_GEN_Photo($photo->idPhoto);
				unlink('./resources/img/product/'.$img->photoName);
				$this->backmodel->d_GEN_Photo($photo->idPhoto);
			}
		}
 
		$this->session->set_flashdata('message', 'Prodotto cancellato con successo');
		redirect(site_url('back/products'));
	}
	
	public function c_BLG_Article() {
		//Form Validation
		$this->load->library('form_validation');
		// Rules
		$this->form_validation->set_rules('articleTitle', 'Nome', 'trim|required');
		$this->form_validation->set_rules('articleSubtitle', 'Descrizione', 'trim|required');
		$this->form_validation->set_rules('articleText', 'Prezzo', 'trim|required');
		// Messages
		$this->form_validation->set_message('required', 'Riempi il campo %s');
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			// Validation Errors
			$this->session->set_flashdata('message', validation_errors());
			// Returning to Checkout Page
			redirect($this->input->post('currentURL'));
		} else {	
			// Prepairing the Data for the Product
			$data = array(
				'articleTitle' => strtolower($this->input->post('articleTitle')),
				'articleSubtitle' => strtolower($this->input->post('articleSubtitle')),
				'articleText' => $this->input->post('articleText'),
				'articleType' => $this->input->post('articleType'),
				'articleTag' => $this->input->post('articleTag'),
				'articleStatus' => $this->input->post('articleStatus'),
				'createdOn' => date("Y-m-d")
			);
			
			// Saving Product to Database
			$idArticle = $this->backmodel->c_BLG_Article($data);
			header('Content-Type: application/x-json; charset=utf-8');
			echo json_encode($idArticle);
		}	
	}
	public function r_BLG_Articles() {
		$idArticle = $this->input->post('idArticle');
		$data = $this->backmodel->r_BLG_Articles($idArticle);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}
	public function u_BLG_Article() {
		// Prepairing the Data for the Product
		$data = array(
			'articleTitle' => strtolower($this->input->post('articleTitle')),
			'articleSubtitle' => strtolower($this->input->post('articleSubtitle')),
			'articleText' => $this->input->post('articleText'),
			'articleType' => $this->input->post('articleType'),
			'articleTag' => $this->input->post('articleTag'),
			'articleStatus' => $this->input->post('articleStatus'),
		);
			
		// Updating Product
		$this->backmodel->u_BLG_ARTICLE($this->input->post('idArticle'), $data);
	}
	public function d_BLG_Article() {
		$this->backmodel->d_BLG_Article($this->uri->segment(3)); 

		$photos = $this->backmodel->ra_GEN_Photos('');
		foreach ($photos as $photo) {
			if($photo->idArticle == $this->uri->segment(3)) {
				$img = $this->backmodel->r_GEN_Photo($photo->idPhoto);
				unlink('./resources/img/article/'.$img->photoName);
				$this->backmodel->d_GEN_Photo($photo->idPhoto);
			}
		}
 
		$this->session->set_flashdata('message', 'Articolo cancellato con successo');
		redirect(site_url('back/articles'));
	}
	
	public function c_PRD_Category() {
		$data = array(
			'categoryName_it' => $this->input->post('categoryName_it'),
			'createdOn' => date("Y-m-d")
		);	
		$returnedID = $this->backmodel->c_PRD_Category($data);
		
		// Upload Path
		$config = array(
		    'upload_path' => './resources/img/category/',
		    'allowed_types' => 'jpg|png',
		);
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')) {
			$this->session->set_flashdata('message', 'Seleziona almeno un file da caricare. I file devono essere in formato jpg.');
			redirect($this->input->post('currentURL'));
		} else {	
			$data = array();
			$file = $this->upload->data();
			$record = array(
				'photoName' => $file['file_name'],
				'createdOn' => date("Y-m-d"),
				'idCategory' => $returnedID
			);
			// Saving Product to Database
			$this->backmodel->c_GEN_Photo($record);
		}
	}
	public function r_PRD_Category() {
		$idCategory = $this->input->post('idCategory');
		$data = $this->backmodel->r_PRD_Category($idCategory);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}
	public function u_PRD_Category() {
		$data = array(
			'categoryName_it' => $this->input->post('categoryName_it'),
			'createdOn' => date("Y-m-d")
		);	
		$this->backmodel->u_PRD_Category($this->input->post('idCategory'), $data);
		
		// Upload Path
		$config = array(
		    'upload_path' => './resources/img/category/',
		    'allowed_types' => 'jpg|png',
		);
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')) {
			$this->session->set_flashdata('message', 'Seleziona almeno un file da caricare. I file devono essere in formato jpg.');
			redirect($this->input->post('currentURL'));
		} else {	
			$data = array();
			$file = $this->upload->data();
			$record = array(
				'photoName' => $file['file_name'],
				'createdOn' => date("Y-m-d"),
				'idCategory' => $this->input->post('idCategory')
			);
			// Saving Product to Database
			$this->backmodel->c_GEN_Photo($record);
		}
	}
	public function d_PRD_Category() {
		$this->backmodel->d_PRD_Category($this->uri->segment(3));
		$products = $this->backmodel->ra_PRD_Products('');	
		if($products) {
			foreach($products as $product) {
				if($product->idCategory == $this->uri->segment(3)) {
					$this->backmodel->d_PRD_Product($product->idProduct);
					
					$photos = $this->backmodel->ra_GEN_Photos('');
					foreach ($photos as $photo) {
						if($photo->idPhoto == $product->idPhoto) {
							unlink('./resources/img/product/'.$photo->photoName);
							$this->backmodel->d_PRD_Photo($photo->idPhoto);
						}
						
					}
					
				}
			}
		}
		$this->session->set_flashdata('message', 'Categoria cancellata con successo');
		redirect(site_url('back/categories'));
	}	
	
	public function c_GEN_Photo_Product() { 
		if( $this->input->post('filesNumber') > 1 ) {
			 $config = array(
			     'upload_path' => './resources/img/product/',
			     'allowed_types' => 'jpg|png',
			     'multi' => 'ignore'
			 );
			 $this->load->library('upload', $config);
		 	
		 	if ( ! $this->upload->do_upload('files')) {
		 		$this->session->set_flashdata('message', 'Seleziona almeno un file da caricare. I file devono essere in formato jpg.');
		 		redirect($this->input->post('currentURL'));
		 	} else {	
		 		$data = array();
		 		$files = $this->upload->data();
		 		foreach ($files as $file) {
		 			$record = array(
		 				'photoName' => $file['file_name'],
		 				'createdOn' => date("Y-m-d"),
		 				'idProduct' => $this->input->post('idProduct')
		 			);
		 			array_push($data, $record);
		 			// Saving Product to Database
		 			$this->backmodel->c_GEN_Photo($record);
		 		}
		 	}
		 } else { 
			// Upload Path
		 	$config = array(
		 	    'upload_path' => './resources/img/product/',
		 	    'allowed_types' => 'jpg|png',
		 	);
		 	$this->load->library('upload', $config);
		 	
		 	if ( ! $this->upload->do_upload('files')) {
		 		$this->session->set_flashdata('message', 'Seleziona almeno un file da caricare. I file devono essere in formato jpg.');
		 		redirect($this->input->post('currentURL'));
		 	} else {	
		 		$data = array();
		 		$file = $this->upload->data();
	
		 		$record = array(
		 			'photoName' => $file['file_name'],
		 			'createdOn' => date("Y-m-d"),
		 			'idProduct' => $this->input->post('idProduct')
		 		);
		 		// Saving Product to Database
		 		$this->backmodel->c_GEN_Photo($record);
		 	}
		}
	}
	public function c_GEN_Photo_Article() { 
    	if( $this->input->post('filesNumber') > 1 ) {
    		 $config = array(
    		     'upload_path' => './resources/img/article/',
    		     'allowed_types' => 'jpg|png',
    		     'multi' => 'ignore'
    		 );
    		 $this->load->library('upload', $config);
    	 	
    	 	if ( ! $this->upload->do_upload('files')) {
    	 		$this->session->set_flashdata('message', 'Seleziona almeno un file da caricare. I file devono essere in formato jpg.');
    	 		redirect($this->input->post('currentURL'));
    	 	} else {	
    	 		$data = array();
    	 		$files = $this->upload->data();
    	 		foreach ($files as $file) {
    	 			$record = array(
    	 				'photoName' => $file['file_name'],
    	 				'createdOn' => date("Y-m-d"),
    	 				'idArticle' => $this->input->post('idArticle')
    	 			);
    	 			array_push($data, $record);
    	 			// Saving Product to Database
    	 			$this->backmodel->c_GEN_Photo($record);
    	 		}
    	 	}
    	 } else {
    	 	// Upload Path
    	 	$config = array(
    	 	    'upload_path' => './resources/img/article/',
    	 	    'allowed_types' => 'jpg|png',
    	 	);
    	 	$this->load->library('upload', $config);
    	 	
    	 	if ( ! $this->upload->do_upload('files')) {
    	 		$this->session->set_flashdata('message', 'Seleziona almeno un file da caricare. I file devono essere in formato jpg.');
    	 		redirect($this->input->post('currentURL'));
    	 	} else {	
    	 		$data = array();
    	 		$file = $this->upload->data();
    
    	 		$record = array(
    	 			'photoName' => $file['file_name'],
    	 			'createdOn' => date("Y-m-d"),
    	 			'idArticle' => $this->input->post('idArticle')
    	 		);
    	 		// Saving Product to Database
    	 		$this->backmodel->c_GEN_Photo($record);
    	 	}
    	 }
	}
	
	public function r_GEN_Photos_byProduct() {
		$idProduct = $this->input->post('idProduct');
		$data = $this->backmodel->r_GEN_Photos_byProduct($idProduct);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}	
	public function r_GEN_Photos_byArticle() {
		$idArticle = $this->input->post('idArticle');
		$data = $this->backmodel->r_GEN_Photos_byArticle($idArticle);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}	
	public function d_GEN_Photo_byProduct() {
		$photos = $this->input->post('idPhoto');
		
		foreach ($photos as $photo) {
			$data[] = $photo;
			$img = $this->backmodel->r_GEN_Photo($photo);
			unlink('./resources/img/product/'.$img->photoName);
			$this->backmodel->d_GEN_Photo($photo);
		}

		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}
	public function d_GEN_Photo_byArticle() {
		$photos = $this->input->post('idPhoto');
		
		foreach ($photos as $photo) {
			$data[] = $photo;
			$img = $this->backmodel->r_GEN_Photo($photo);
			unlink('./resources/img/article/'.$img->photoName);
			$this->backmodel->d_GEN_Photo($photo);
		}

		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}
	
	public function u_GEN_Text() {
		// Prepairing the Data for the Text
		$data = array(
			'textTitle_it' => strtolower($this->input->post('textTitle_it')),
			'textDescription_it' => $this->input->post('textDescription_it'),
		);	
		// Updating Text
		$this->backmodel->u_GEN_Text($this->input->post('idText'), $data);
	}
	
	//SEND NEWSLETTER
	public function sendNewsletter() {
		$costumers = $this->backmodel->ra_GEN_Costumers('');
		
		foreach ($costumers as $costumer) {
			// Email Library
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			// Email to Clients
			$this->email->from($this->input->post('InputEmail'));
			$this->email->subject('Pasticceria Bagalà | '.$this->input->post('newsletterObject'));
			$this->email->to('email@dominio.it');
			$this->email->message($this->input->post('newsletterText'));
			
			$this->email->send();
			// End Email to Clients
		}
    }
	//EXPORT
	public function exportCSV() {
		$tableName = $this->input->post('tableName');
		
	    $this->load->dbutil();
	    $this->load->helper('download');
	    $report = $this->backmodel->export($tableName);
	    $csvFile = $this->dbutil->csv_from_result($report);;

	    $data = $csvFile;
	    $name = ucfirst($tableName).'_file.csv';
	    force_download($name, $data); 
    }
	public function exportXML() {
		$tableName = $this->input->post('tableName');
		
	    $this->load->dbutil();
	    $this->load->helper('download');
	    $report = $this->backmodel->export($tableName);
	    $xmlFile = $this->dbutil->xml_from_result($report);;

	    $data = $xmlFile;
	    $name = ucfirst($tableName).'_file.xml';
	    force_download($name, $data); 
    }
}
