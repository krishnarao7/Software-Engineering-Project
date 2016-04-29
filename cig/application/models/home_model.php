<?php

Class home_model extends CI_Model {

public $myarr = array();

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

	
	public function GetSp(){

		//$q_str="s.SId as sid, sp.SPName as spname from service s, serviceprovider sp, gives g where s.SId=g.SId && sp.SPId= g.SPId order by s.SId";
		
		$this->db->select('s.SId as sid,sp.SPName as spname, sp.SPPhoto as spphoto');
		$this->db->from('service s');
		$this->db->join('gives g', 's.SId=g.SId', 'right');
        $this->db->join('serviceprovider sp', 'sp.SPId= g.SPId', 'left');
      //  $this->db->where(' && sp.SPId= g.SPId');
        $this->db->order_by('s.SId');
        

            $qu = $this->db->get();

		if ($qu->num_rows() > 0) {
      		/*
      		foreach ($qu->result() as $row)  //Iterate through results
			   {
			      echo $row->spname;
			   }
			   */
      		return $qu->result_array();
    
		} 
		else {
			return false;
		}
	}


	public function service_type($SId){

		$this->db->select('*')->from('service')->where('SId',$SId);
		return $this->db->get()->result_array();
	}

	public function service_providers($SId){

		$this->db->select('*')->from('gives');
		$this->db->join('serviceprovider','serviceprovider.SPId=gives.SPId');
		$this->db->where('gives.SId',$SId);

		return $this->db->get()->result_array();

	}

	public function getSPProfile($SPId){
		//print_r($SPId);
		$this->db->select('*')->from('serviceprovider')->where('SPId',$SPId);
		return $this->db->get()->result_array();

	}

	public function bookService($value)
	{
		//print_r($value);
		$this->db->insert('booking', $value);
		return ($this->db->affected_rows() != 1) ? false : true;

	}

	public function getUserId($value)
	{
		# code...
		print_r($value);
		
		
		$this->db->from('booking');
		$this->db->where('Email', $value); 
		$r = $this->db->get()->result_array();
		
		//$r = $this->db->get_where('customer', array('Email' => $this->value));

		
	}

}

?>