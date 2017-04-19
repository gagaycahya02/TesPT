<?php 
	class Login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			// Load model
			$this->load->model("MData");

			if($this->session->userdata('logged_in') == TRUE)
			{
				redirect("Home");
			}
		}

		function index()
		{
			$this->load->view('v_login');
		}

		function subLoginClick()
		{
			if($this->input->post('subLogin'))
			{
				$this->MData->checkUserData();
			}else
			{	
				redirect($this);
			}
		}
	}

?>