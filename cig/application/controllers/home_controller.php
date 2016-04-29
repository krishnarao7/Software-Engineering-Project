<?php

//session_start();

Class home_controller extends CI_Controller {
	public function __construct() {
	parent::__construct();

	// Load form helper library
	$this->load->helper('form');

	// Load database
}



	public function index() {
		$this->load->model('home_model');
		$results['types'] = $this->home_model->getService();
		$results['providers'] = $this->home_model->getSP();
		//$results['provide']= $results1;
		
		
		$results['maincontent']='shome';
		$this->load->view('template/maintemplate',$results);
		
		
	}


	public function service_type() {
		$SId=$this->uri->segment(3);
		$this->load->model('home_model');
		$results['types'] = $this->home_model->service_type($SId);
		$results['providers'] = $this->home_model->service_providers($SId);

		$results['maincontent']='service_type';
		$this->load->view('template/maintemplate',$results);
		
		
	}


	public function showProfile(){
		$SId=$this->uri->segment(3);
		$SPId=$this->uri->segment(4);

		$this->load->model('home_model');
		$results['types'] = $this->home_model->service_type($SId);
		$results['providers'] = $this->home_model->getSPProfile($SPId);
		
		
		//echo "<h1>sdbsb</h1>".$SPId;
	//	$id= array('sid'=>$SId,'spid'=>$SPId);
	//	$this->session->set_userdata($id);

		$results['maincontent']='spprofile';

		$this->load->view('template/maintemplate',$results);


	}


	public function bookService()
	{
		/*$SId=$this->uri->segment(3);
		$SPId=$this->uri->segment(4);
		*/
		$this->load->model('home_model');
		$date = $this->input->post('date');
		$time = $this->input->post('time');

		$timestamp = strtotime($date."".$time);
		//$datetime = date('Y-m-d H:i:s', $timestamp);
		//print_r($date.":".$time);
		//print_r($timestamp);
		//print_r($timestamp);

		
		//print_r($username);

		$email = $this->input->post('user');
		//$CId = $this->home_model->getUserId($email);//customer
		//print_r($CId);
		$data = array(
					'CId'=>$email,
					'SId'=>$this->uri->segment(3),
					'SPId'=>$this->uri->segment(4),
					'timestamp'=>$timestamp
					
					);

		
		
		$result = $this->home_model->bookService($data);
		if ($result==TRUE) {
			# code...
			echo "
			<script>
			alert('Booking is done');
			</script>

			";

			$this->showProfile();
		} else {
			# code...
		}
		

		
	}


}