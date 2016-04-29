<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "Email =" . "'" . $data['Email'] . "'";
$this->db->select('*');
$this->db->from('customer');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('customer', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}
//service provider register
public function sp_registration_insert($data) {

// Query to check whether username already exist or not
$condition = "Email =" . "'" . $data['Email'] . "'";
$this->db->select('*');
$this->db->from('serviceprovider');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('serviceprovider', $data);
if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}
// Read data using username and password
public function login($data) {

$condition = "Email =" . "'" . $data['Cemail'] . "' AND " . "Password =" . "'" . $data['Cpassword'] . "'";
$this->db->select('*');
$this->db->from('customer');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}


 function validate($data)
	 
	{
                $code= $data['Cemail'];

                $pass= $data['Cpassword'];
		      
				$query= $this->db->query('select role_id
									from (
									    select Email,Password,role_id from customer
									    union all
									    select Email,Password,role_id from serviceprovider   
									) a
									where Email="'.$code.'" and Password="'.$pass.'"');
	return $query;
           
					

    }
	
// Read data from database to show data in admin page
public function read_user_information($Cemail) {

$condition = "Email =" . "'" . $Cemail . "'";
$this->db->select('*');
$this->db->from('customer');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>