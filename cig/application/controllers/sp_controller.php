<?php
Class sp_controller extends CI_Controller {

	public function __construct() {
	parent::__construct();

	// Load form helper library
	$this->load->helper('form');

	// Load database
	$this->load->model('sp_model');

	//SET SEESION VARIABLE HERE.

	}

	public function index() {
		
		$results['service_count'] = $this->sp_model->countService();
		$results['sp_count'] = $this->sp_model->countSP();
		$results['c_count'] = $this->sp_model->countCust();
		$results['o_count'] = $this->sp_model->countOrders();
		
	
		
		$results['maincontent']='sp_home';
		$this->load->view('sp_template/maintemplate',$results);
		//$this->load->view('services',$results);
	}

	public function viewServices()
	{
		$username = $this->session->userdata['Cemail'];

		$results['types'] = $this->sp_model->getService();

		$results['SPId'] = $this->sp_model->getMyServices($username);
		//echo $results['records'][0];
			$SPId = $results['SPId']['SPId'];
		$results['listServices'] = $this->sp_model->listMyServices($SPId);
		
		$results['maincontent']='services';
		$this->load->view('sp_template/maintemplate',$results);
	}

	public function AddServices(){
		/*
		$this->form_validation->set_rules('SPServices', 'SId', 'required');
		$this->form_validation->set_rules('SPId', 'SPId', 'required');

		if ($this->form_validation->run() == FALSE) {
			$results['types'] = $this->sp_model->getService();
		$this->load->view('services',$results);
		} 
		else {
		*/
			$result = $this->sp_model->appendServices();
			if ($result == TRUE) {

				$this->viewServices();

			}
		//}	
	}

	public function removeService(){
		$GId=$this->uri->segment(3);
		
		$result = $this->sp_model->deleteMyServices($GId);
		$this->index();
	}


	public function spProfile(){
		 $username = $this->session->userdata['Cemail'];

		$results['spprofile'] = $this->sp_model->editProfile($username);
		
		
		 $results['maincontent']='manageProfile';
		 $this->load->view('sp_template/maintemplate',$results);
	}

}
?>