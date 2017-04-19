<?php
	class Home extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			// Load Model
			$this->load->model("MData");

			if($this->session->userdata('logged_in') == FALSE)
			{
				redirect("Login");
			}
		}

		function index()
		{
			$this->load->view('v_home');
			//echo $upload_dir = base_url('assets/userPhoto/');
		}

		function logout()
		{
			$x = session_destroy();

			if($x == TRUE)
			{
				redirect("Login");
			}
		}
	}
?>