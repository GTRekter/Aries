<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

// Login
	public function login() {	
		$data['page'] = 'login';
		$this->load->view('pages/login',$data);
	}	
	function autenticate() {

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		$this->form_validation->set_message('required', 'Compila il campo %s.');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'Compila i campi obbligatori!');
			redirect('front/login');
		} else {
			
			$this->validate_credentials($this->input->post('email'), $this->input->post('password'));
		}
	}
	function validate_credentials($email, $password) {	
		$query = $this->frontmodel->validate($email, $password);
		if ($query) {
			$data = array(
				'username' => $email,
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('back');
			
		} else {
			$this->session->set_flashdata('message', 'Utente non trovato. Controlla le tue credenziali e prova di nuovo!');
			redirect('front/login');
		}
	}
// End Login

// PRESENTATIONS
	// Home
	public function index() {
		$data['page'] = 'index';
 
		$this->load->view('front/header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$this->load->view('front/nav', $data);
		
		// Products
		$data['categories_limited'] = $this->frontmodel->ra_PRD_Categories(4,false);
		$data['products'] = $this->frontmodel->ra_PRD_Products('');
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		
		$data['texts'] = $this->frontmodel->ra_GEN_Texts('');

		$this->load->view('front/home', $data);
		
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('front/footer',$data);
	}
	// products
	public function products() {
		$data['page'] = 'Menu';

		$this->load->view('front/header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$this->load->view('front/nav', $data);

		// Updating Article
		/*$this->frontmodel->i_product_view($this->uri->segment(3));*/
		$data['products'] = $this->frontmodel->ra_PRD_Products('');
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
				
		$this->load->view('front/products',$data);
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('front/footer',$data);
	}
	// product
	public function product() {
		$data['page'] = 'Prodotto';
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$data['product'] = $this->frontmodel->r_PRD_Product($this->uri->segment(3));

		$this->load->view('front/header', $data);		
		$this->load->view('front/nav', $data);

		$data['related_products'] = $this->frontmodel->ra_PRD_Product_byCategory($data['product']->idCategory,$this->uri->segment(3),3);
		
		$data['comments'] = $this->frontmodel->r_BLG_Comments_byProduct($this->uri->segment(3),5);
				
		$this->load->view('front/product',$data);
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('front/footer',$data);
	}
	
	// About
	public function about() {
		$data['page'] = 'Chi Siamo';

		$this->load->view('front/header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$this->load->view('front/nav', $data);
		
		$data['texts'] = $this->frontmodel->ra_GEN_Texts('');
		
		$this->load->view('front/about',$data);
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('front/footer',$data);
	
	}
	
	// blog
	public function blog() {
		$data['page'] = 'Blog';

		$this->load->view('front/header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$this->load->view('front/nav', $data);
		
		// Pagination
		$articles = $this->frontmodel->ra_BLG_Articles('');
		$this->load->library('pagination');
		$config['base_url'] = site_url('front/blog');
		$config['total_rows'] = count($articles);
		$config['per_page'] = 6;
		$config['use_page_numbers'] = TRUE;
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'AVANTI';
		$config['prev_link'] = 'INDIETRO';
		$this->pagination->initialize($config);

		// Page Number
		$page = $this->uri->segment(3);
		if ($page >= 1) 
		{
			$data['articles'] = $this->frontmodel->ra_BLG_Articles_limit($config['per_page'], ($page - 1) * $config['per_page']);
		} else {
			$data['articles'] = $this->frontmodel->ra_BLG_Articles_limit($config['per_page'], 0);
		}
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		
		$this->load->view('front/blog',$data);
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('front/footer',$data);
	}
	public function article() {
		$data['page'] = 'Articolo';

		// Updating Article
		$data['article'] = $this->frontmodel->r_BLG_Article($this->uri->segment(3));
		$data['comments'] = $this->frontmodel->r_BLG_Comments_byArticle($this->uri->segment(3),5);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		
		$this->load->view('front/header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$this->load->view('front/nav', $data);
		$this->frontmodel->i_BLG_Article_Views($this->uri->segment(3));	
				
		$this->load->view('front/article',$data);
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('front/footer',$data);
	}
	
	// Contact
	public function contact() {
		$data['page'] = 'Contatti';

		$this->load->view('front/header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$this->load->view('front/nav', $data);
		
		$this->load->view('front/contact');
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('front/footer',$data);
	
	}
	
	// Privacy
	public function privacy() {
		$data['page'] = 'Privacy';

		$this->load->view('header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$this->load->view('front/nav', $data);
		
		$data['text'] = $this->frontmodel->r_text('','Privacy Policy');
		$this->load->view('privacy',$data);
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('footer',$data);
	
	}
	
	//Cookie
	public function cookie() {
		$data['page'] = 'Cookie';

		$this->load->view('header', $data);
		
		$data['categories'] = $this->frontmodel->ra_PRD_Categories('',true);
		$data['photos'] = $this->frontmodel->ra_GEN_Photos('');
		$this->load->view('front/nav', $data);
		
		$data['text'] = $this->frontmodel->r_text('','Cookie Policy');
		$this->load->view('cookie',$data);
		
		$data['articles'] =  $this->frontmodel->ra_BLG_Articles(3);
		$data['flickr_photos'] = $this->frontmodel->ra_GEN_Photos(12);
		$this->load->view('footer',$data);
	
	}
// END PRESENTATIONS

// ACTIONS
	// Create Comment
	public function c_BLG_Comment() {
		//Form Validation
		$this->load->library('form_validation');
		// Rules
		$this->form_validation->set_rules('commentName', 'Nome', 'trim|required');
		$this->form_validation->set_rules('commentText', 'Commento', 'trim|required');
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
				'commentName' => strtolower($this->input->post('commentName')),
				'commentText' => strtolower($this->input->post('commentText')),
				'idArticle' => $this->input->post('idArticle'),
				'idProduct' => $this->input->post('idProduct'),
				'createdOn' => date("Y-m-d H:i:s")
			);
			
			// Saving Product to Database
			$this->frontmodel->c_BLG_Comment($data);
			$this->session->set_flashdata('message', 'Commento scritto con successo');
			redirect($this->input->post('currentURL'));
		}	
	}
	
	// Create Comment
	public function c_GEN_Costumers() {
		//Form Validation
		$this->load->library('form_validation');
		// Rules
		$this->form_validation->set_rules('emailNewsletter', 'Nome', 'trim|required');
		// Messages
		$this->form_validation->set_message('required', 'Riempi il campo %s');
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			// Validation Errors
			$this->session->set_flashdata('message', validation_errors());
			// Returning to Checkout Page
		} else {	
			// Prepairing the Data for the Product
			$costumers = $this->frontmodel->r_GEN_Costumers( strtolower($this->input->post('emailNewsletter')) );
			
			$nCostumer = count($costumers);
			
			if( $nCostumer < 1 ) {
				$data = array(
					'costumerEmail' => strtolower($this->input->post('emailNewsletter')),
				);
				
				// Saving Product to Database
				$this->frontmodel->c_GEN_Costumers($data);
				
				$data =  'Registrazione alla newsletter avvenuta con successo';
				
			} else {
				$data =  'Email già registrata alla newsletter';
			}
			header('Content-Type: application/x-json; charset=utf-8');
			echo json_encode($data);
		}	
	}
	
	// Contact Form
	public function send_contact_form() {
		//Form Validation
		$this->load->library('form_validation');
		
		// Rules
		$this->form_validation->set_rules('InputName', 'Nome', 'trim|required');
		$this->form_validation->set_rules('InputEmail', 'Email', 'trim|required');
		$this->form_validation->set_rules('InputMessage', 'Testo', 'trim|required');
		// Messages
		$this->form_validation->set_message('required', 'Riempi il campo %s');
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			// Validation Errors
			$this->session->set_flashdata('message', validation_errors());
			// Returning to Checkout Page
			redirect(site_url('front/contact'));
		} else {
			
			// Email Library
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			// Email to Clients
			$this->email->from($this->input->post('InputEmail'));
			$this->email->subject('Roberto baruffi | Richiesta informazioni dal sito');
			$this->email->to('roberto.baruffi@gmail.com');
			$this->email->message('Nome: '.$this->input->post('InputName').'Nome: '.$this->input->post('InputMessage'));
			
			$this->email->send();
			// End Email to Clients
			
			$this->session->set_flashdata('message', 'Email inviata con successo');
			redirect(site_url('front/contact'));
		}

	}
	
	public function i_productShare() {
		 $this->frontmodel->i_productShare($this->input->post('idProduct'),$this->input->post('socialName'));
	}
// END ACTIONS
}
