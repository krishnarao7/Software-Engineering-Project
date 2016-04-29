<?php

Class sp_model extends CI_Model {

	public function getService() {

		//$myquery="SELECT * FROM service";
		//$this->db->select('*');
		//$this->db->from('service');
		$qu = $this->db->get('service');

		if ($qu->num_rows() > 0) {
      		
      		return $qu->result();
    		
		} 
		else {
			return false;
		}
	}


	public function appendServices(){

		$SId = $this->input->post('SPServices');
		$SPId = $this->input->post('SPId');

		$data = array(
			'SId' => $SId,
			'SPId' => $SPId
		);

		$this->db->insert('gives',$data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else {
				return false;
			}
	}


	public function getMyServices($username){
		$this->db->select('SPId');
		$this->db->from('serviceprovider');
		$this->db->where('Email', $username);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {

		return $query->row_array();
		} else {
		return false;
		}
	}


	public function listMyServices($SPId){
		$this->db->select('g.GID as GId, s.SId as SId, S.Sname as Sname,s.SDesc as SDesc ');
		$this->db->from('service s');
		$this->db->join('gives g', 'g.SId = s.SId');
		$this->db->where('g.SPId', $SPId);
		$this->db->order_by('g.SId');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
      		return $query->result_array();
		} 
		else {
			return false;
		}
	}

	public function deleteMyServices($GId){
		 $this->db->where('GId', $GId);
  		 $this->db->delete('gives'); 

  		 return true;
	}

	public function editProfile($Email){
		//$this->db->select('*');
		$this->db->from('serviceprovider');
		$this->db->where('Email', $Email);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

      		return $query->result();

		} 
		else {
			
			return false;
		}
	}


	public function countService(){

		$this->db->select('count(*) as service_count');
		$this->db->from('service');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

      		return $query->result();

		} 
		else {
			
			return false;
		}

	}

	public function countSP(){

		$this->db->select('count(*) as sp_count');
		$this->db->from('serviceprovider');

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

      		return $query->result();

		} 
		else {
			
			return false;
		}

	}


	public function countCust(){

			$this->db->select('count(*) as c_count');
			$this->db->from('customer');

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

	      		return $query->result();

			} 
			else {
				
				return false;
			}

		}
	

	public function countOrders(){

			$this->db->select('count(*) as o_count');
			$this->db->from('booking');

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

	      		return $query->result();

			} 
			else {
				
				return false;
			}

		}
	}

?>