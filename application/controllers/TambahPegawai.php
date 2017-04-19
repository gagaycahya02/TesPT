<?php
	class TambahPegawai extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			// Load Model
			$this->load->model("MData");
			$this->load->helper(array('form', 'url'));
		}

		function index()
		{
			$this->load->view('pegawai/v_tambahPegawai',array('error' => ' ' ));
		}

		public function do_upload()
		{
			$upload_dir = './uploads/';
			$target_dir = $_FILES['userfile']['name'];
			$tmp_dir = $_FILES['userfile']['tmp_name'];
			$imgSize = $_FILES['userfile']['size'];
			$uploadOk = 1;

			$target_file = $upload_dir. basename($_FILES['userfile']['name']);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			$check = getimagesize($_FILES['userfile']['tmp_name']);

			if(file_exists($target_file))
			{
				echo "Sorry, file already exists";
				$uploadOk = 0;
			}

			// Check file size 
			if($_FILES['userfile']['size'] > 500000)
			{
				echo "Sorry, your file is too large";
				$uploadOk = 0;
			}

			// All certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
			{
				echo "Sorry, only JPG,PNG,JPEG, & GIF files are allowed";
				$uploadOk = 0;
			}
			if($check !== false)
			{
				echo "File is an image - ".$check['mime'].".";
				$uploadOk = 1;
			}else
			{
				echo "File is not an image";
				$uploadOk = 0;
			}

			if($uploadOk == 0)
			{
				echo "Sorry, your file was not uploaded.";
			}else
			{
				if(move_uploaded_file($_FILES['userfile']['tmp_name'],$target_file))
				{
					echo "The file ".basename($_FILES['userfile']['name'])." has been uploaded.";
					$this->MData->cPegawai(basename($_FILES['userfile']['name']));
					redirect('Home');
				}else
				{
					echo "Sorry, there was an error uploading your file.";
				}
			}
		}
	}
?>