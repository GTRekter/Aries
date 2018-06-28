<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontmodel extends CI_Model {

	// Validate login
	function validate($email, $password) {
		$this->db->where('userEmail', $email);
		$this->db->where('userPassword', sha1($password));
		
		$q = $this->db->get('USR_Access');
		
		if ($q->num_rows() == 1) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			
			return $data;
		}
	}
	
	// R Product 
	function ra_PRD_Products($limit) {
		$this->db->select('*');
		$this->db->from('PRD_Products');
		$this->db->order_by('createdOn', 'desc');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->where('productStatus', 1);
		

		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			return $data;
		}
	}
	function ra_PRD_Product_byCategory($idCategory,$idCurrent, $limit) {
		$this->db->select('*');
		$this->db->from('PRD_Products');
		$this->db->order_by('createdOn', 'desc');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->where('idCategory', $idCategory);
		$this->db->where('idProduct<>', $idCurrent);
		$this->db->where('productStatus', 1);
		
	
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			return $data;
		}
	}
	function r_PRD_Product($id) {
		$this->db->select('*');
		$this->db->from('PRD_Products');
		$this->db->where('idProduct', $id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	
	// Category
	public function ra_PRD_Categories($limit,$withPhoto) {
		$this->db->select('*');
		$this->db->from('PRD_Categories');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		if ($withPhoto == true) {
			$this->db->join('GEN_Photos','GEN_Photos.idCategory = PRD_Categories.idCategory','inner');
		}
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	public function r_PRD_Category($id) {
		$this->db->select('*');
		$this->db->from('PRD_Categories');
		$this->db->where('idCategory',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	
	// Photo
	public function ra_GEN_Photos($limit) {
		$this->db->select('*');
		$this->db->from('GEN_Photos');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->order_by('photoName', 'desc');	
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	public function r_photo($id) {
		$this->db->select('*');
		$this->db->from('photo');
		$this->db->where('idPhoto',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function r_photo_byProduct($id) {
		$this->db->select('*');
		$this->db->from('photo');
		$this->db->where('idProduct',$id);
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}

	// R Article
	public function r_BLG_Article($id) {
		$this->db->select('*');
		$this->db->from('BLG_Articles');
		$this->db->where('idArticle',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	function ra_BLG_Articles($limit) {
		$this->db->select('*');
		$this->db->from('BLG_Articles');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		
		$q = $this->db->get();
		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $result[] = $row;
			}
			
			return $result;
		}
	}
	function ra_BLG_Articles_limit($limit, $offset) {
		$this->db->select('*');
		$this->db->from('BLG_Articles');
		$this->db->limit($limit, $offset);
		
		$q = $this->db->get();
		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $result[] = $row;
			}
			
			return $result;
		}
	}
	function i_BLG_Article_Views($id) {
		$this->db->where('idArticle', $id);
		$this->db->set('articleViews', 'articleViews+1', FALSE);
		$this->db->update('BLG_Articles');
	}
	
	// R Comments
	public function c_BLG_Comment($data) {
		$this->db->insert('BLG_Comments', $data);
	}
	function r_BLG_Comments_byArticle($id,$limit) {
		$this->db->select('*');
		$this->db->from('BLG_Comments');
		$this->db->where('idArticle', $id);
		
		$this->db->order_by('createdOn', 'desc');
		
		if ($limit != '') {
			$this->db->limit($limit);
		}
		
		$q = $this->db->get();
		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $result[] = $row;
			}
			return $result;
		}
	}
	function r_BLG_Comments_byProduct($id,$limit) {
		$this->db->select('*');
		$this->db->from('BLG_Comments');
		$this->db->where('idProduct', $id);
		
		$this->db->order_by('createdOn', 'desc');
		
		if ($limit != '') {
			$this->db->limit($limit);
		}
		
		$q = $this->db->get();
		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $result[] = $row;
			}
			return $result;
		}
	}
	
	// R Texts 
	public function ra_GEN_Texts($limit) {
		$this->db->select('*');
		$this->db->from('GEN_Texts');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	
	// GEN_Costumers 
	public function c_GEN_Costumers($data) {
		$this->db->insert('GEN_Costumers', $data);
	}
	function r_GEN_Costumers($email) {
		$this->db->select('*');
		$this->db->from('GEN_Costumers');
		$this->db->where('costumerEmail',$email);
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
		
}
