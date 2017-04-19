<?php
	class DataPegawai extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			// Load Model
			$this->load->model('MData');
		}

		function index()
		{
			$data['pegawai'] = $this->MData->rPegawai();
			$this->load->view('pegawai/v_dataPegawai',$data);
		}

		function delPeg($x)
		{
			$this->MData->dPegawai($x);
		}

		function upPeg($x)
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
					//$this->MData->cPegawai(basename($_FILES['userfile']['name']));
					redirect('Home');
				}else
				{
					echo "Sorry, there was an error uploading your file.";
				}
			}

			$this->MData->uPegawai($x);
		}

		function excelExport()
		{
			$this->load->library("PHPExcel");
 		
	 		$file = new PHPExcel ();
	        $file->getProperties ()->setCreator ( "Garsa" );
			$file->getProperties ()->setLastModifiedBy ( "Nurul Huda" );
			$file->getProperties ()->setTitle ( "Data Pegawai" );
			$file->getProperties ()->setSubject ( "Pegawai" );
			$file->getProperties ()->setDescription ( "Data Semua Pegawai" );
			$file->getProperties ()->setKeywords ( "Data Pegawai" );
			$file->getProperties ()->setCategory ( "Pegawai" );
		/*end - BLOCK PROPERTIES FILE EXCEL*/

		/*start - BLOCK SETUP SHEET*/
			$file->createSheet ( NULL,0);
			$file->setActiveSheetIndex ( 0 );
			$sheet = $file->getActiveSheet ( 0 );
			//memberikan title pada sheet
			$sheet->setTitle ( "Data Pegawai" );
		/*end - BLOCK SETUP SHEET*/

		/*start - BLOCK HEADER*/
			$sheet	->setCellValue ( "A1", "NIP" )
				->setCellValue ( "B1", "Nama" )
				->setCellValue ( "C1", "Tempat Lahir" )
				->setCellValue ( "D1", "Alamat" )
				->setCellValue ( "E1", "Tgl. Lahir" )
				->setCellValue ( "F1", "L/P" )
				->setCellValue ( "G1", "Gol" )
				->setCellValue ( "H1", "Eselon" )
				->setCellValue ( "I1", "Jabatan" )
				->setCellValue ( "J1", "Tempat Tugas" )
				->setCellValue ( "K1", "Agaman" )
				->setCellValue ( "L1", "Unit Kerja" )
				->setCellValue ( "M1", "No. HP" )
				->setCellValue ( "N1", "NPWP" );
		/*end - BLOCK HEADER*/

		/* start - BLOCK MEMASUKAN DATABASE*/
			//ganti dengan database anda
			$link = mysqli_connect("localhost", "root", "", "db_pegawai"); 
			$result=mysqli_query($link,"SELECT * FROM tbl_pegawai");
			$nomor=1;
			while($row=mysqli_fetch_array($result)){
				$nomor++;
				$sheet	->setCellValue ( "A".$nomor, $row["nip"] )
					->setCellValue ( "B".$nomor, $row["nama"] )
					->setCellValue ( "C".$nomor, $row["tempatLahir"] )
					->setCellValue ( "D".$nomor, $row["alamat"] )
					->setCellValue ( "E".$nomor, $row["tglLahir"] )
					->setCellValue ( "F".$nomor, $row["gender"] )
					->setCellValue ( "G".$nomor, $row["golongan"] )
					->setCellValue ( "H".$nomor, $row["eselon"] )
					->setCellValue ( "I".$nomor, $row["jabatan"] )
					->setCellValue ( "J".$nomor, $row["tmpTugas"] )
					->setCellValue ( "K".$nomor, $row["agama"] )
					->setCellValue ( "L".$nomor, $row["unitKerja"] )
					->setCellValue ( "M".$nomor, $row["noHP"] )
					->setCellValue ( "N".$nomor, $row["NPWP"] );
			}
		/* end - BLOCK MEMASUKAN DATABASE*/

		/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
			header ( 'Content-Type: application/vnd.ms-excel' );
			//namanya adalah keluarga.xls
			header ( 'Content-Disposition: attachment;filename="pegawai.xls"' ); 
			header ( 'Cache-Control: max-age=0' );
			$writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
			$writer->save ( 'php://output' );
		}

		// public function cetakpdf(){
	 //    	//load model
		// 	//execute
		// 	$this->MData->cetakpdf();
		// }
	}
?>