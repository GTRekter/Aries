<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backmodel extends CI_Model {

	// PRD FUNCTIONS
	public function c_PRD_Product($data) {
		$this->db->insert('PRD_Products', $data);
		
		$insertedID = $this->db->insert_id();
		return $insertedID;
	}
	public function u_PRD_Product($id, $data) {
		$this->db->where('idProduct', $id);
		$this->db->update('PRD_Products', $data); 
	}
	public function ra_PRD_Products($limit) {
		$this->db->select('*');
		$this->db->from('PRD_Products');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->order_by('createdOn', 'desc');	
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}	
	}
	public function r_PRD_Product($id) {
		$this->db->select('*');
		$this->db->from('PRD_Products');
		$this->db->where('idProduct',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function d_PRD_Product($id) {
	   $this->db->where('idProduct', $id);
	   $this->db->delete('PRD_Products'); 
	}
	
	// PRD_Categories
	public function c_PRD_Category($data) {
		$this->db->insert('PRD_Categories', $data);
		
		$insertedID = $this->db->insert_id();
		return $insertedID;
	}
	public function ra_PRD_Categories($limit) {
		$this->db->select('*');
		$this->db->from('PRD_Categories');
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
	public function r_PRD_Category($id) {
		$this->db->select('*');
		$this->db->from('PRD_Categories');
		$this->db->where('idCategory',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function u_PRD_Category($id, $data) {
		$this->db->where('idCategory', $id);
		$this->db->update('PRD_Categories', $data); 
	}
	public function d_PRD_Category($id) {
	   $this->db->where('idCategory', $id);
	   $this->db->delete('PRD_Categories'); 
	}
	
	// BLG FUNCTIONS
	public function c_BLG_Article($data) {
		$this->db->insert('BLG_Articles', $data);
		
		$insertedID = $this->db->insert_id();
		return $insertedID;
	}
	public function u_BLG_Article($id, $data) {
		$this->db->where('idArticle', $id);
		$this->db->update('BLG_Articles', $data); 
	}
	public function ra_BLG_Articles($limit) {
		$this->db->select('*');
		$this->db->from('BLG_Articles');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->order_by('createdOn', 'desc');	
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}	
	}
	public function r_BLG_Article($id) {
		$this->db->select('*');
		$this->db->from('BLG_Articles');
		$this->db->where('idArticle',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function d_BLG_Article($id) {
	   $this->db->where('idArticle', $id);
	   $this->db->delete('BLG_Articles'); 
	}	
	public function c_GEN_Photo($data) {
		$this->db->insert('GEN_Photos', $data);
	}
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
	public function r_GEN_Photo($id) {
		$this->db->select('*');
		$this->db->from('GEN_Photos');
		$this->db->where('idPhoto',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function r_GEN_Photos_byProduct($id) {
		$this->db->select('*');
		$this->db->from('GEN_Photos');
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
	public function r_GEN_Photos_byArticle($id) {
		$this->db->select('*');
		$this->db->from('GEN_Photos');
		$this->db->where('idArticle',$id);
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	public function r_GEN_Photos_byCategory($id) {
		$this->db->select('*');
		$this->db->from('GEN_Photos');
		$this->db->where('idCategory',$id);
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	public function d_GEN_Photo($id) {
	   $this->db->where('idPhoto', $id);
	   $this->db->delete('GEN_Photos'); 
	}
	
	public function u_GEN_Text($id, $data) {
		$this->db->where('idText', $id);
		$this->db->update('GEN_Texts', $data); 
	}
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
	public function r_GEN_Text($id) {
		$this->db->select('*');
		$this->db->from('GEN_Texts');
		$this->db->where('idText',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function ra_GEN_Costumers($limit) {
		$this->db->select('*');
		$this->db->from('GEN_Costumers');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->order_by('createdOn', 'desc');	
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}	
	}
	public function d_GEN_Costumer($id) {
	   $this->db->where('idCostumer', $id);
	   $this->db->delete('GEN_Costumers'); 
	}
	

	// EXPORT FILE
	public function export($tableName){
		$this->db->select('*');
		$this->db->from($tableName);
		
		$q = $this->db->get();
		return $q;
	}  
}
