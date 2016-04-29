<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_new_service_model extends CI_Model {

	// public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


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
	

	public function add_service($value='')
	{
		# code...
		//print_r($value);

		$this->db->insert('service', $value);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}

/* End of file add_new_service_model.php */
/* Location: ./application/models/add_new_service_model.php */