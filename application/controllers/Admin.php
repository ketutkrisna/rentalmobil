<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('level_user')){
			redirect('auth');
		}
		if($this->session->userdata('level_user')!='admin'){
			redirect('auth');
		}
	}

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['title']='daftar pesanan';
		$data['iconcari']='<li class="triggernavbarcari"><a href="#" class="grey-text triggernavbarcari"><i style="font-size:30px" class="material-icons blue-text">search</i></a></li>';
		$querydaftarpesanan="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil group by id_booking order by id_booking desc";
		$data['daftarpesananadmin']=$this->db->query($querydaftarpesanan)->result_array();
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		// count all
		$data['valuecari']='';
		$qdipesanbelum="SELECT count(*) as qdipesanbelum from bookings where status_booking='dipesan' and notif_booking='belumdilihat' group by id_booking";
		$qdipesan="SELECT count(*) as qdipesan from bookings where status_booking='dipesan' and notif_booking='sudahdilihat' group by id_booking";
		$qdibayarbelum="SELECT count(*) as qdibayarbelum from bookings where status_booking='dibayar' and notif_booking='belumdilihat' group by id_booking";
		$qdibayar="SELECT count(*) as qdibayar from bookings where status_booking='dibayar' and notif_booking='sudahdilihat' group by id_booking";
		$qdiambil="SELECT count(*) as qdiambil from bookings where status_booking='diambil' and notif_booking='sudahdilihat' group by id_booking";
		$qdikembalikan="SELECT count(*) as qdikembalikan from bookings where status_booking='dikembalikan' and notif_booking='sudahdilihat' group by id_booking";
		$qselesai="SELECT count(*) as qselesai from bookings where status_booking='selesai' and notif_booking='sudahdilihat' group by id_booking";
		$qditolak="SELECT count(*) as qditolak from bookings where status_booking='ditolak' and notif_booking='sudahdilihat' group by id_booking";
		$qdicancel="SELECT count(*) as qdicancel from bookings where status_booking='dicancel' group by id_booking";
		$data['qdipesanbelum']=$this->db->query($qdipesanbelum)->row_array();
		$data['qdipesan']=$this->db->query($qdipesan)->row_array();
		$data['qdibayarbelum']=$this->db->query($qdibayarbelum)->row_array();
		$data['qdibayar']=$this->db->query($qdibayar)->row_array();
		$data['qdiambil']=$this->db->query($qdiambil)->row_array();
		$data['qdikembalikan']=$this->db->query($qdikembalikan)->row_array();
		$data['qselesai']=$this->db->query($qselesai)->row_array();
		$data['qditolak']=$this->db->query($qditolak)->row_array();
		$data['qdicancel']=$this->db->query($qdicancel)->row_array();
		// tuutp count
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("admin/daftarpesananadmin",$data);
	}

	public function detailpesananadmin($idbooking)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['title']='detail pesanan admin';
		$querydetailpesananadmin="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where id_booking=$idbooking";
		$data['detailpesananadmin']=$this->db->query($querydetailpesananadmin)->row_array();
		// var_dump($data['detailpesananadmin']['id_booking']);die;
		$this->db->set('notif_booking', 'sudahdilihat');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');

		$this->load->view("templates/header",$data);
		$this->load->view("admin/detailpesananadmin",$data);
	}

	public function methodsorting()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['title']='daftar pesanan';
		$data['iconcari']='<li class="triggernavbarcari"><a href="#" class="grey-text triggernavbarcari"><i style="font-size:30px" class="material-icons blue-text">search</i></a></li>';
		$sortingdata=htmlspecialchars($this->input->post('sortingdata',true));

		$data['method']=$sortingdata;
		if($sortingdata=='terbaru'){
			$query="SELECT * from bookings join users on bookings.id_user_booking=users.id_user join mobils on bookings.id_mobil_booking=mobils.id_mobil group by id_booking order by id_booking desc";	
		}else if($sortingdata=='terbanyak'){
			$query="SELECT * from bookings join users on bookings.id_user_booking=users.id_user join mobils on bookings.id_mobil_booking=mobils.id_mobil group by id_booking order by totalhari_booking desc";	
		}else{
			$query="SELECT * from bookings join users on bookings.id_user_booking=users.id_user join mobils on bookings.id_mobil_booking=mobils.id_mobil group by id_booking order by id_booking desc";	
		}
		// count all
		$data['valuecari']='';
		$qdipesanbelum="SELECT count(*) as qdipesanbelum from bookings where status_booking='dipesan' and notif_booking='belumdilihat' group by id_booking";
		$qdipesan="SELECT count(*) as qdipesan from bookings where status_booking='dipesan' and notif_booking='sudahdilihat' group by id_booking";
		$qdibayarbelum="SELECT count(*) as qdibayarbelum from bookings where status_booking='dibayar' and notif_booking='belumdilihat' group by id_booking";
		$qdibayar="SELECT count(*) as qdibayar from bookings where status_booking='dibayar' and notif_booking='sudahdilihat' group by id_booking";
		$qdiambil="SELECT count(*) as qdiambil from bookings where status_booking='diambil' and notif_booking='sudahdilihat' group by id_booking";
		$qdikembalikan="SELECT count(*) as qdikembalikan from bookings where status_booking='dikembalikan' and notif_booking='sudahdilihat' group by id_booking";
		$qselesai="SELECT count(*) as qselesai from bookings where status_booking='selesai' and notif_booking='sudahdilihat' group by id_booking";
		$qditolak="SELECT count(*) as qditolak from bookings where status_booking='ditolak' and notif_booking='sudahdilihat' group by id_booking";
		$qdicancel="SELECT count(*) as qdicancel from bookings where status_booking='dicancel' group by id_booking";
		$data['qdipesanbelum']=$this->db->query($qdipesanbelum)->row_array();
		$data['qdipesan']=$this->db->query($qdipesan)->row_array();
		$data['qdibayarbelum']=$this->db->query($qdibayarbelum)->row_array();
		$data['qdibayar']=$this->db->query($qdibayar)->row_array();
		$data['qdiambil']=$this->db->query($qdiambil)->row_array();
		$data['qdikembalikan']=$this->db->query($qdikembalikan)->row_array();
		$data['qselesai']=$this->db->query($qselesai)->row_array();
		$data['qditolak']=$this->db->query($qditolak)->row_array();
		$data['qdicancel']=$this->db->query($qdicancel)->row_array();
		// tuutp count
		$data['daftarpesananadmin']=$this->db->query($query)->result_array();
		// counter menu notifikasi
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		// counter keseluruhan
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("admin/daftarpesananadmin",$data);
	}

	public function carikodebooking()
	{
		date_default_timezone_set('Asia/Jakarta');
		$kodebooking=htmlspecialchars($this->input->post('carikodebooking',true));
		$data['valuecari']=$kodebooking;
		$data['title']='daftar pesanan';
		$data['iconcari']='<li class="triggernavbarcari"><a href="#" class="grey-text triggernavbarcari"><i style="font-size:30px" class="material-icons blue-text">search</i></a></li>';
		if($kodebooking==true){
			$querycari="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where kode_booking='$kodebooking' group by id_booking order by id_booking desc";
			$qdipesanbelum="SELECT count(*) as qdipesanbelum from bookings where status_booking='dipesan' and kode_booking='$kodebooking' and notif_booking='belumdilihat' group by id_booking";
			$qdipesan="SELECT count(*) as qdipesan from bookings where status_booking='dipesan' and kode_booking='$kodebooking' and notif_booking='sudahdilihat' group by id_booking";
			$qdibayarbelum="SELECT count(*) as qdibayarbelum from bookings where status_booking='dibayar' and kode_booking='$kodebooking' and notif_booking='belumdilihat' group by id_booking";
			$qdibayar="SELECT count(*) as qdibayar from bookings where status_booking='dibayar' and kode_booking='$kodebooking' and notif_booking='sudahdilihat' group by id_booking";
			$qdiambil="SELECT count(*) as qdiambil from bookings where status_booking='diambil' and kode_booking='$kodebooking' and notif_booking='sudahdilihat' group by id_booking";
			$qdikembalikan="SELECT count(*) as qdikembalikan from bookings where status_booking='dikembalikan' and kode_booking='$kodebooking' and notif_booking='sudahdilihat' group by id_booking";
			$qselesai="SELECT count(*) as qselesai from bookings where status_booking='selesai' and kode_booking='$kodebooking' and notif_booking='sudahdilihat' group by id_booking";
			$qditolak="SELECT count(*) as qditolak from bookings where status_booking='ditolak' and kode_booking='$kodebooking' and notif_booking='sudahdilihat' group by id_booking";
			$qdicancel="SELECT count(*) as qdicancel from bookings where status_booking='dicancel' and kode_booking='$kodebooking' group by id_booking";
		}else{
			$querycari="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil group by id_booking order by id_booking desc";
			$qdipesanbelum="SELECT count(*) as qdipesanbelum from bookings where status_booking='dipesan' and notif_booking='belumdilihat' group by id_booking";
			$qdipesan="SELECT count(*) as qdipesan from bookings where status_booking='dipesan' and notif_booking='sudahdilihat' group by id_booking";
			$qdibayarbelum="SELECT count(*) as qdibayarbelum from bookings where status_booking='dibayar' and notif_booking='belumdilihat' group by id_booking";
			$qdibayar="SELECT count(*) as qdibayar from bookings where status_booking='dibayar' and notif_booking='sudahdilihat' group by id_booking";
			$qdiambil="SELECT count(*) as qdiambil from bookings where status_booking='diambil' and notif_booking='sudahdilihat' group by id_booking";
			$qdikembalikan="SELECT count(*) as qdikembalikan from bookings where status_booking='dikembalikan' and notif_booking='sudahdilihat' group by id_booking";
			$qselesai="SELECT count(*) as qselesai from bookings where status_booking='selesai' and notif_booking='sudahdilihat' group by id_booking";
			$qditolak="SELECT count(*) as qditolak from bookings where status_booking='ditolak' and notif_booking='sudahdilihat' group by id_booking";
			$qdicancel="SELECT count(*) as qdicancel from bookings where status_booking='dicancel' group by id_booking";
		}
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		$data['daftarpesananadmin']=$this->db->query($querycari)->result_array();
		$data['qdipesanbelum']=$this->db->query($qdipesanbelum)->row_array();
		$data['qdipesan']=$this->db->query($qdipesan)->row_array();
		$data['qdibayarbelum']=$this->db->query($qdibayarbelum)->row_array();
		$data['qdibayar']=$this->db->query($qdibayar)->row_array();
		$data['qdiambil']=$this->db->query($qdiambil)->row_array();
		$data['qdikembalikan']=$this->db->query($qdikembalikan)->row_array();
		$data['qselesai']=$this->db->query($qselesai)->row_array();
		$data['qditolak']=$this->db->query($qditolak)->row_array();
		$data['qdicancel']=$this->db->query($qdicancel)->row_array();
		// var_dump(count($data['qdicancel']));die;

		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("admin/daftarpesananadmin",$data);
	}

	public function tolakbuktibayar($idbooking)
	{
		$this->db->set('statuspembayaran_booking', 'bayarditolak');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Bukti bayar telah anda <b>tolak</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function terimabuktibayar($idbooking)
	{
		$this->db->set('statuspembayaran_booking', 'bayarditerima');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Bukti bayar telah anda <b>terima</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function prosesngilang($idbooking)
	{
		$this->db->set('status_booking', 'selesai');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function prosespengambilan($idbooking)
	{
		$this->db->set('status_booking', 'diambil');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function prosesdikembalikan($idbooking)
	{
		$this->db->set('status_booking', 'dikembalikan');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function prosesdikembalikandenda()
	{
		$idbooking=htmlspecialchars($this->input->post('idbooking',true));
		$jumlahdenda=htmlspecialchars($this->input->post('jumlahdenda',true));
		$this->db->set('denda_booking', $jumlahdenda);
		$this->db->set('status_booking', 'dikembalikan');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function prosesselesai($idbooking)
	{
		$this->db->set('status_booking', 'selesai');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function prosestolak($idbooking)
	{
		$this->db->set('status_booking', 'ditolak');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idbooking);
		return false;
	}

	public function tambahmobil()
	{
		$namamobil=htmlspecialchars($this->input->post('namamobil',true));
		$jenismobil=htmlspecialchars($this->input->post('jenismobil',true));
		$warnamobil=htmlspecialchars($this->input->post('warnamobil',true));
		$nopolmobil=htmlspecialchars($this->input->post('nopolmobil',true));
		$tarifmobil=htmlspecialchars($this->input->post('tarifmobil',true));
		$dendamobil=htmlspecialchars($this->input->post('dendamobil',true));
		$deskripsimobil=htmlspecialchars($this->input->post('deskripsimobil',true));

		$querymax = "SELECT max(kode_mobil) as maxkode FROM mobils";
		$datahasil = $this->db->query($querymax)->row_array();
		$kodebooking= $datahasil['maxkode'];
		$noUrut = (int) substr($kodebooking, 3, 9);
		$noUrut++;
		$mbl = "MBL";
		$newKodeBooking = $mbl . sprintf("%04s", $noUrut);

		if($_FILES['fotomobil']['name']){
			if($_FILES['fotomobil']['size']==''||$_FILES['fotomobil']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/daftarmobil');
				return false;
			}else{
				$config['upload_path']          = './assets/img/mobil/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotomobil')){
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('users/daftarmobil');
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/daftarmobil');
						return false;
	            	}
	            }
	            // insert to produks
				$data = array(
				        'id_mobil' => null,
				        'kode_mobil' => $newKodeBooking,
				        'foto_mobil' => $foto,
				        'nama_mobil' => $namamobil,
				        'jenis_mobil' => $jenismobil,
				        'warna_mobil' => $warnamobil,
				        'nopol_mobil' => $nopolmobil,
				        'tarif_mobil' => $tarifmobil,
				        'denda_mobil' => $dendamobil,
				        'deskripsi_mobil' => $deskripsimobil
						);
				$this->db->insert('mobils', $data);
				$idproduk = $this->db->insert_id();
				// notifikasi berhasil
				$this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Mobil berhasil <b>ditambahkan</b>!</span></li>');
				redirect('users/daftarmobil');
				return false;
	        }
		}else{
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Foto tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/daftarmobil');
			return false;
		}
	}

	public function editmobil()
	{
		$idmobil=htmlspecialchars($this->input->post('idmobil',true));
		$namamobil=htmlspecialchars($this->input->post('namamobil',true));
		$jenismobil=htmlspecialchars($this->input->post('jenismobil',true));
		$warnamobil=htmlspecialchars($this->input->post('warnamobil',true));
		$nopolmobil=htmlspecialchars($this->input->post('nopolmobil',true));
		$tarifmobil=htmlspecialchars($this->input->post('tarifmobil',true));
		$dendamobil=htmlspecialchars($this->input->post('dendamobil',true));
		$deskripsimobil=htmlspecialchars($this->input->post('deskripsimobil',true));

		$fotopertama=$this->db->get_where('mobils',['id_mobil'=>$idmobil])->row_array();

		if($_FILES['fotomobil']['name']){
			if($_FILES['fotomobil']['size']==''||$_FILES['fotomobil']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/detailmobil/'.$idmobil);
				return false;
			}else{
				$config['upload_path']          = './assets/img/mobil/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotomobil')){
	            	unlink(FCPATH . '/assets/img/mobil/' .$fotopertama['foto_mobil']);
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('users/detailmobil/'.$idmobil);
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/detailmobil/'.$idmobil);
						return false;
	            	}
	            }
	            // update to mobils
				$this->db->set('foto_mobil', $foto);
				$this->db->set('nama_mobil', $namamobil);
				$this->db->set('jenis_mobil', $jenismobil);
				$this->db->set('warna_mobil', $warnamobil);
				$this->db->set('nopol_mobil', $nopolmobil);
				$this->db->set('tarif_mobil', $tarifmobil);
				$this->db->set('denda_mobil', $dendamobil);
				$this->db->set('deskripsi_mobil', $deskripsimobil);
				$this->db->where('id_mobil', $idmobil);
				$this->db->update('mobils');
				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Mobil berhasil <b>diupdate</b>!</span></li>');
				redirect('users/detailmobil/'.$idmobil);
				return false;
	        }
		}else{
			$foto=$fotopertama['foto_mobil'];
			// update to mobils
			$this->db->set('foto_mobil', $foto);
			$this->db->set('nama_mobil', $namamobil);
			$this->db->set('jenis_mobil', $jenismobil);
			$this->db->set('warna_mobil', $warnamobil);
			$this->db->set('nopol_mobil', $nopolmobil);
			$this->db->set('tarif_mobil', $tarifmobil);
			$this->db->set('denda_mobil', $dendamobil);
			$this->db->set('deskripsi_mobil', $deskripsimobil);
			$this->db->where('id_mobil', $idmobil);
			$this->db->update('mobils');
			// notifikasi berhasil
			// $this->session->set_flashdata('newnotiftambah',$idproduk);
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Mobil berhasil <b>diupdate</b>!</span></li>');
			redirect('users/detailmobil/'.$idmobil);
			return false;
		}
	}

	public function hapusmobil($idmobil)
	{
		$query="SELECT count(*) as jumlahbooking from bookings join mobils on bookings.id_mobil_booking=mobils.id_mobil where id_mobil_booking=$idmobil group by id_mobil_booking";
		$datacek=$this->db->query($query)->row_array();
		$fotopertama=$this->db->get_where('mobils',['id_mobil'=>$idmobil])->row_array();
		if($datacek<=0){
			unlink(FCPATH . '/assets/img/mobil/' .$fotopertama['foto_mobil']);
			$this->db->where('id_mobil', $idmobil);
			$this->db->delete('mobils');
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Succes mobil telah dihapus!</span></li>');
			redirect('users/daftarmobil');
			return false;
		}else{
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Mobil pernah dibooking,tidak dapat dihapus!</span></li>');
			redirect('users/detailmobil/'.$idmobil);
			return false;
		}
	}


}