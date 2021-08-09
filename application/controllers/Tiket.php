<?php  
/**
 * 
 */
class Tiket extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelTiket');
		$this->load->model('modelSidebar');
		$this->load->library('pdf');
	}

	function index(){
		$data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/Tiket";

        $user= trim($this->session->userdata('user'));
		$data["jml_my_ticket"] = $this->modelSidebar->MyTicket($user);
        $user= trim($this->session->userdata('user'));
        $data['tabel'] = $this->modelTiket->getMyTiket($user);
		$this->load->view('template',$data);
	}

	function getDataTrackingById(){
		$id= $_REQUEST["id"];
		$data = $this->modelTiket->GetDataTracking($id);
		echo json_encode($data);
	}

	function submit_message(){
		$id= $_REQUEST["id"];
		$id_tracking =  trim($this->input->post('id_tracking'));
		$id_tiket = trim($this->input->post('id_tiket'));
		$tanggal = date("Y-m-d  H:i:s");
		$pesan = trim($this->input->post('pesan'));
		$user= trim($this->input->post('oleh'));

		// $tracking['id_tracking'] = $id_tiket;
		$tracking['id_tiket'] = $id_tiket;
		$tracking['tgltrack'] = $tanggal;
		$tracking['pesan'] = $pesan;
		$tracking['oleh'] = $user;


		$this->modelTiket->savetracking($tracking);

	}


	function printMyTiket(){
		$user= trim($this->session->userdata('user'));
		$pdf = new FPDF();
		//membuat halaman baru
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(190,7,'TIKET SAYA',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'NO',1,0,'C');
		$pdf->Cell(30,6,'ID TIKET',1,0,'C');
		$pdf->Cell(25,6,'PELAPOR',1,0,'C');
		$pdf->Cell(35,6,'NAMA KATEGORI',1,0,'C');
		$pdf->Cell(30,6,'SUBJEK',1,0,'C');
		$pdf->Cell(30,6,'SLA',1,0,'C');
		$pdf->Cell(30,6,'NAMA TEKNISI',1,1,'C');
		$pdf->SetFont('Arial','',10);
		$dataMyTiket = $this->modelTiket->getMyTiket($user);
		$no = 1;

		foreach ($dataMyTiket as $row) 
		{
		$pdf->Cell(10,6,$no,1,0,'C');
		$pdf->Cell(30,6,$row["id_tiket"],1,0,'C');
		$pdf->Cell(25,6,$row["pelapor"],1,0,'C');
		$pdf->Cell(35,6,$row["nama_kategori"],1,0,'C');
		$pdf->Cell(30,6,$row["subjek"],1,0,'C');
		$pdf->Cell(30,6,$row["prioritas"],1,0,'C');
		$pdf->Cell(30,6,$row["nama_teknisi"],1,1,'C');
		$no++;	
		}
		$pdf->Output('D','Tiket.pdf');

	}

}
?>