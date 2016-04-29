<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_new_service extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('add_new_service_model');
		


	}

	public function index()
	{
		//load view for adding new service
		
		$data['types']=$this->add_new_service_model->getService();
		$this->load->view('a_template/header');
		$this->load->view('add_new_service_view',$data);
		$this->load->view('a_template/footer');
	}

	public function a()
	{
		# code...
		$this->load->view('sp_template/header');
	}

	public function add_service()
	{
		# code...
		
		$data	 	= array('Sname' => $this->input->post('Sname') ,'SDesc'=>$this->input->post('SDesc') );
		$result 	= $this->add_new_service_model->add_service($data);

		if ($result=TRUE) {
			$this->index();
			

		} else {
			$this->index();
		
		}

		

	}

	public function dashboard(){
		$this->load->model('sp_model');
		$results['service_count'] = $this->sp_model->countService();
		$results['sp_count'] = $this->sp_model->countSP();
		$results['c_count'] = $this->sp_model->countCust();
		$results['o_count'] = $this->sp_model->countOrders();
		
	
		$this->load->model('add_new_service_model');
		$results['maincontent']='add_new_service_view';
		$this->load->view('a_template/maintemplate',$results);
	}

}

/* End of file add_new_service.php */
/* Location: ./application/controllers/add_new_service.php */