<?php

//session_start(); //we need to start session in order to access it through CI

Class user_authentication extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
//$this->load->library('form_validation');

// Load session library


// Load database
$this->load->model('login_database');
}

// Show login page
public function index() {
$this->load->view('login_form');
}

// Show registration page
public function user_registration_show() {
$this->load->view('registration_form');
}

// Validate and store registration data in database
public function new_customer_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('Cname', 'CName', 'required');
$this->form_validation->set_rules('Cemail', 'Email', 'required');
$this->form_validation->set_rules('Cpassword', 'Password', 'required');
$this->form_validation->set_rules('Caddress', 'CAddress', 'required');
$this->form_validation->set_rules('Cphone', 'CPhone', 'required');


if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'Cname' => $this->input->post('Cname'),
'Cphone' => $this->input->post('Cphone'),
'Caddress' => $this->input->post('Caddress'),
'Email' => $this->input->post('Cemail'),
'Password' => $this->input->post('Cpassword'),
'role_id' => $this->input->post('Croll')
);
$result = $this->login_database->registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login_form', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

 function valiadate_credentials()
	 {
		//$_SESSION['username']=$this->input->post('username');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('Cemail','Email','required');
		$this->form_validation->set_rules('Cpassword','Password','required');
		$this->form_validation->run();

		if($this->form_validation->run($this) == FALSE)
		{	
			$this->load->view('login_form');
		}
		else
		{
			$this->load->model('login_database');
			$query = $this->login_database->validate();

				 if ($query->num_rows() > 0)
				 			 {
					       $data=array(
							'Cemail'=>$this->input->post('Cemail'),
						   'is_logged_in'=>true					       
					       );
					       $this->session->set_userdata($data);
					       			 $role= $query->row()->role_id;

									        if($role==1){
									        	redirect('home_controller/index');
									        }
									     
									        else{
									        	redirect('sp_controller/');
									        }
							}
						 else
							{
								 redirect("login_form");
							}	
	    }
	
	}


// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('Cemail', 'Email', 'required');
$this->form_validation->set_rules('Cpassword', 'Password', 'required');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in'])){

		$results['maincontent']='shome';
		$this->load->view('template/maintemplate',$results);

}else{
$this->load->view('login_form');
}
} else {
$data = array(
'Cemail' => $this->input->post('Cemail'),
'Cpassword' => $this->input->post('Cpassword')
);
$result = $this->login_database->validate($data);

if ($result->num_rows() > 0)
				 			 {
					       $data=array(
							'Cemail'=>$this->input->post('Cemail'),
						   'is_logged_in'=>true					       
					       );

					       $this->session->set_userdata($data);
					       			 $role= $result->row()->role_id;

									        if($role==1){
									        	redirect('home_controller');
									        }
									     
									        else{
									        	redirect('sp_controller');
									        }
							}
						 else
							{
								 redirect("login_form");
							}	
if ($result == TRUE) {

$Cemail = $this->input->post('Cemail');
$result = $this->login_database->read_user_information($Cemail);
if ($result != false) {
$session_data = array(
'username' => $result[0]->CName,
'email' => $result[0]->Email,
);
// Add user data in session
	$this->session->set_userdata('logged_in', $session_data);
	$this->load->model('home_model');
	$results['types'] = $this->home_model->getService();
	$results['providers'] = $this->home_model->getSP();

	$results['maincontent']='shome';
	$this->load->view('template/maintemplate',$results);
}
} else {
$data = array(
'error_message' => 'Invalid Username or Password'
);

$this->load->view('login_form', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$data = array(
'Cemail' => '',
'is_logged_in'=>false
);
#$this->session->unset_userdata('logged_in', $data);
$this->session->sess_destroy();
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}

public function about(){
	$results['maincontent']='about';
	$this->load->view('template/maintemplate',$results);
}

function do_upload(){
		//$config['upload_path'] = base_url().'uploads';
		
	//	$config['file_name'] = $data['SPEmail'];
		$config['upload_path'] = './uploads/';

		$config['allowed_types'] = 'gif|jpg|png';

		$config['max_size'] = '100';

		$config['max_width'] = '1024';

		$config['max_height'] = '768';


		$this->load->library('upload',$config);

	//	$this->upload->initialize($config);


		if (! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_view', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('registration_form', $data);
		
		}
	}
	
	public function new_sp_registration() {

// Check validation for user input in SignUp form
$this->form_validation->set_rules('SPName', 'SPName', 'required');
$this->form_validation->set_rules('SPEmail', 'Email', 'required');
$this->form_validation->set_rules('SPPassword', 'Password', 'required');
$this->form_validation->set_rules('SPAddress', 'SPAddress', 'required');
$this->form_validation->set_rules('SPPhone', 'SPPhone', 'required');


if ($this->form_validation->run() == FALSE) {
$this->load->view('registration_form');
} else {
$data = array(
'SPName' => $this->input->post('SPName'),
'SPPhone' => $this->input->post('SPPhone'),
'SPAddress' => $this->input->post('SPAddress'),
'Email' => $this->input->post('SPEmail'),
'Password' => $this->input->post('SPPassword'),
'SPPhoto' => $this->do_upload()
);


$result = $this->login_database->sp_registration_insert($data);
if ($result == TRUE) {
$data['message_display'] = 'Registration Successfully !';
$this->load->view('login_form', $data);
} else {
$data['message_display'] = 'Username already exist!';
$this->load->view('registration_form', $data);
}
}
}

}

?>