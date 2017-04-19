<?php
	class MData extends CI_Model
	{
		public function __construct(){
		    parent::__construct();
		}

		function checkUserData()
		{
			$sql = "SELECT * FROM tbl_user WHERE userName = '".$this->input->post('euname')."' 
					AND password = '".$this->input->post('upass')."'";
			// Execute query
			$query = $this->db->query($sql);
			// To Array
			$arr = $query->row_array();

			// Get Num Rows
			$nm  = $query->num_rows();

			// Check num of row if equal 1
			if($nm == 1)
			{
				// Insert to array
				$data = array(
					'noUser' => $arr['noUser'] ,
					'username' => $arr['userName'],
					'hakAkses' => $arr['hakAkses'],
					'logged_in' => TRUE
				);

				$this->session->set_userdata($data);

				redirect("Home");
			}else
			{
				$this->session->set_flashdata('message','* Username or password incorrect');
				redirect("Login");
			}
		}

		// Pegawai
		function cPegawai($x)
		{
			$query = $this->db->query("INSERT INTO tbl_pegawai VALUES(
										'".$this->input->post('nip')."',
										'".$this->input->post('nama')."',
										'".$this->input->post('tmpLahir')."',
										'".$this->input->post('alamat')."',
										'".$this->input->post('tglLahir')."',
										'".$this->input->post('jenisKelamin')."',
										'".$this->input->post('golongan')."',
										'".$this->input->post('eselon')."',
										'".$this->input->post('jabatan')."',
										'".$this->input->post('tmpTugas')."',
										'".$this->input->post('agama')."',
										'".$this->input->post('unitKerja')."',
										'".$this->input->post('noHp')."',
										'".$this->input->post('NPWP')."',
										'".$x."')
									");
		}

		function rPegawai()
		{
			$query = $this->db->query("SELECT * FROM tbl_pegawai")->result();
			return $query;
		}

		function uPegawai($x)
		{
			$query = $this->db->query("UPDATE tbl_pegawai SET 
											nama = '".$this->input->post('nama')."',
											tempatLahir = '".$this->input->post('tmpLahir')."',
											alamat = '".$this->input->post('alamat')."',
											tglLahir = '".$this->input->post('tglLahir')."',
											gender = '".$this->input->post('jenisKelamin')."',
											golongan = '".$this->input->post('golongan')."',
											eselon = '".$this->input->post('eselon')."',
											jabatan = '".$this->input->post('jabatan')."',
											tmpTugas = '".$this->input->post('tmpTugas')."',
											agama = '".$this->input->post('agama')."',
											unitKerja = '".$this->input->post('unitKerja')."',
											noHp = '".$this->input->post('noHp')."',
											NPWP = '".$this->input->post('NPWP')."',
											NPWP = '".$this->input->post('NPWP')."'
										WHERE nip = '".$x."'");
		}

		function dPegawai($x)
		{	
			$query = $this->db->query("DELETE FROM tbl_pegawai WHERE nip = '".$x."'");
		}

		// public function cetakpdf(){
	 //      $judul = 'Laporan Pegawai';
	 //      $kolom = array('nip'=>'NIP',
	 //                      'nama' => 'Nama',
	 //                      'tempatLahir' => 'Tempat Lahir'
	 //                );
	 //      //query
	 //      $query = $this->db->query("select nip,nama,tempatLahir from tbl_pegawai
	 //               ");         
	 //      $data = $query->result_array();
	 //      $this->generatePdf($kolom, $data,$judul);
	 //  }

	 //  private function generatepdf($header,$data,$judul){
	 //    //load library tcpdf
	 //    $this->load->library('tcpdf/CustomHeader');
	 //    // create new PDF document
	 //    $pdf = new CustomHeader(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	        
	 //    // set document information
	 //    $pdf->SetCreator(PDF_CREATOR);
	 //    $pdf->SetAuthor('Febrian Reza');
	 //    $pdf->SetTitle('LATIHAN PDF');
	 //    $pdf->SetSubject('TCPDF Tutorial');
	 //    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	        
	 //    // set default header data
	 //    // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', 
	 //    //    PDF_HEADER_STRING);
	 //    $pdf->SetPrintHeader(false);
		// $pdf->SetPrintFooter(false);

	 //    // set header and footer fonts
	 //    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	 //    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	     
	 //    // set default monospaced font
	 //    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	      
	 //    // set margins
	 //    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	 //    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	 //    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	        
	 //    // set auto page breaks
	 //    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	        
	 //    // set image scale factor
	 //    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	        
	 //    // set some language-dependent strings (optional)
	 //    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	 //         require_once(dirname(__FILE__).'/lang/eng.php');
	 //         $pdf->setLanguageArray($l);
	 //    }
	 //    // set font
	 //    $pdf->SetFont('helvetica', '', 12);
	 //    // add a page
	 //    $pdf->AddPage("L","F4");
	 //    //judul
	 //    $pdf->Cell(0,20, $judul, 0, 1, 'C', 0, '',0,FALSE);
	 //    // print colored table
	 //    $pdf->ColoredTable($header, $data);        
	 //    // close and output PDF document
	 //    $pdf->Output('Lap.pdf', 'I');
	 //  }


	}
?>