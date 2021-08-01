<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('level_user')){
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title']='beranda';
		$data['iconcari']='';
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		$query="SELECT * from mobils order by id_mobil desc limit 5";
		$data['slideberanda']=$this->db->query($query)->result_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("home/beranda",$data);
	}

	public function daftarmobil()
	{
		$data['title']='daftar mobil';
		$data['valuecari']='';
		$data['iconcari']='<li class="triggernavbarcari"><a href="#" class="grey-text triggernavbarcari"><i style="font-size:30px" class="material-icons blue-text">search</i></a></li>';
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		$query="SELECT * from mobils order by id_mobil desc";
		$data['daftarmobil']=$this->db->query($query)->result_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("home/daftarmobil",$data);
	}

	public function detailmobil($idmobil)
	{
		$data['title']='detail mobil';
		// $data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array();
		$data['detailmobil']=$this->db->get_where('mobils',['id_mobil'=>$idmobil])->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("home/detailmobil",$data);
	}

	public function carinamamobil()
	{
		date_default_timezone_set('Asia/Jakarta');
		$namamobil=htmlspecialchars($this->input->post('carimobil',true));
		$data['valuecari']=$namamobil;
		$data['title']='daftar mobil';
		$data['iconcari']='<li class="triggernavbarcari"><a href="#" class="grey-text triggernavbarcari"><i style="font-size:30px" class="material-icons blue-text">search</i></a></li>';
		if($namamobil==true){
			$query="SELECT * from mobils where nama_mobil like '%$namamobil%' order by id_mobil desc";
		}else{
			$query="SELECT * from mobils order by id_mobil desc";
		}
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		$data['daftarmobil']=$this->db->query($query)->result_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("home/daftarmobil",$data);
	}

	public function carikodebooking()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		date_default_timezone_set('Asia/Jakarta');
		$iduser=$this->session->userdata('id_user');
		$kodebooking=htmlspecialchars($this->input->post('carikodebooking',true));
		$data['valuecari']=$kodebooking;
		$data['title']='daftar pesanan';
		$data['iconcari']='<li class="triggernavbarcari"><a href="#" class="grey-text triggernavbarcari"><i style="font-size:30px" class="material-icons blue-text">search</i></a></li>';
		if($kodebooking==true){
			$querycari="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where kode_booking='$kodebooking' and id_user_booking='$iduser' group by id_booking order by id_booking desc";
			$qcountcari="SELECT count(*) as qcountcari from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where kode_booking='$kodebooking' and id_user_booking='$iduser' group by id_booking order by id_booking desc";
		}else{
			$querycari="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where id_user_booking='$iduser' group by id_booking order by id_booking desc";
			$qcountcari="SELECT count(*) as qcountcari from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where id_user_booking='$iduser' group by id_booking order by id_booking desc";
		}
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		$data['daftarpesananuser']=$this->db->query($querycari)->result_array();
		$data['qcountcari']=$this->db->query($qcountcari)->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("home/daftarpesanan",$data);
	}

	public function bookingmobil($idmobil)
	{
		// $times=date('Y-m-d H:i');
		// $this->db->set('datetime', $times);
		// $this->db->where('id_time', 1);
		// $this->db->update('datetime');
		$data['title']='booking mobil';
		// $data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array();
		$data['detailmobil']=$this->db->get_where('mobils',['id_mobil'=>$idmobil])->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("home/bookingmobil",$data);	
	}

	public function cekbooking()
	{
		// if($this->session->userdata('level_user')!='user'){
		// 	redirect('users');
		// }
		date_default_timezone_set('Asia/Jakarta');
		$idmobil=htmlspecialchars($this->input->post('idmobil',true));
		$tanggalambil=htmlspecialchars($this->input->post('tanggalambil',true));
		$tanggalkembali=htmlspecialchars($this->input->post('tanggalkembali',true));
		$jamambilmobil=htmlspecialchars($this->input->post('jamambilmobil',true));

		$ta=$tanggalambil.' '.$jamambilmobil;
		$tk=$tanggalkembali.' '.$jamambilmobil;
		// $alamatuser=htmlspecialchars(strtolower($this->input->post('alamatuser',true)));
		// $teleponuser=htmlspecialchars($this->input->post('teleponuser',true));

		$cekmobil=$this->db->get_where('mobils',['id_mobil'=>$idmobil])->row_array();

		// $query="SELECT * from bookings where id_mobil_booking=$idmobil and (status_booking='dipesan' or status_booking='dibayar' or status_booking='diambil') and tanggalambil_booking<='$tanggalkembali' and tanggalkembali_booking>='$tanggalambil'";
		// $cekstatusmobil=$this->db->query($query)->result_array();
		// if($cekstatusmobil==true){
		// 	echo "mobil sudah d booking";
		// 	return false;
		// }else{
		// 	echo "sedang ngangur";
		// 	return false;
		// }

		$start_date = new DateTime($tanggalambil);
		$end_date = new DateTime($tanggalkembali);
		$interval = $start_date->diff($end_date);
		$selisih=intval($interval->days);
		$totalbooking=$selisih*$cekmobil['tarif_mobil'];

		$date = new DateTime($ta);
        $timestamp = $date->getTimestamp();
        $waktusekarang=time();
        if($waktusekarang>$timestamp){
          echo json_encode([['datajson'=>'Harus diatas tanggal sekarang!'],['totalbooking'=>$totalbooking]]);
			return false;
        }

		// if($tanggalambil <= date('Y-m-d')){
		// 	// echo "Harus diatas tanggal sekarang!";
		// 	echo json_encode([['datajson'=>'Harus diatas tanggal sekarang!'],['totalbooking'=>$totalbooking]]);
		// 	return false;
		// }


		if($tanggalambil==$tanggalkembali){
			// echo "Tanggal ambil dan tanggal kembali tidak boleh sama!";
			echo json_encode([['datajson'=>'Tanggal ambil dan tanggal kembali tidak boleh sama!'],['totalbooking'=>$totalbooking]]);
			return false;
		}

		if($tanggalambil>=$tanggalkembali){
			// echo "Tanggal ambil harus lebih kecil dari tanggal kembali!";
			echo json_encode([['datajson'=>'Tanggal ambil harus lebih kecil dari tanggal kembali!'],['totalbooking'=>$totalbooking]]);
			return false;
		}else{
			$query="SELECT * from bookings where id_mobil_booking=$idmobil and (status_booking='dipesan' or status_booking='dibayar' or status_booking='diambil') and tanggalambil_booking<='$tk' and tanggalkembali_booking>='$ta'";
			$cekstatusmobil=$this->db->query($query)->result_array();
			if($cekstatusmobil==true){
				// echo "Mobil sedang dibooking pada tanggal tsb!";
				echo json_encode([['datajson'=>'Mobil sedang dibooking pada jam tsb!'],['totalbooking'=>$totalbooking]]);
				return false;
			}else{
				echo json_encode([['datajson'=>'ok'],['totalbooking'=>$totalbooking]]);
				// echo $totalbooking;
				return false;
			}
		}
	}

	public function booking()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		$iduser=$this->session->userdata('id_user');
		$idmobil=htmlspecialchars($this->input->post('idmobil',true));
		$totalbooking=htmlspecialchars($this->input->post('totalbooking',true));
		$alamatbooking=htmlspecialchars($this->input->post('alamatbooking',true));
		$tlpbooking=htmlspecialchars($this->input->post('tlpbooking',true));
		$tanggalambil=htmlspecialchars($this->input->post('tanggalambil',true));
		$tanggalkembali=htmlspecialchars($this->input->post('tanggalkembali',true));
		$jamambilmobil=htmlspecialchars($this->input->post('jamambilmobil',true));

		$querymax = "SELECT max(kode_booking) as maxkode FROM bookings";
		$datahasil = $this->db->query($querymax)->row_array();
		$kodebooking= $datahasil['maxkode'];
		$noUrut = (int) substr($kodebooking, 6, 9);
		$noUrut++;
		$rntl = "RENTAL";
		$newKodeBooking = $rntl . sprintf("%04s", $noUrut);

		$cekmobil=$this->db->get_where('mobils',['id_mobil'=>$idmobil])->row_array();
		$start_date = new DateTime($tanggalambil);
		$end_date = new DateTime($tanggalkembali);
		$interval = $start_date->diff($end_date);
		$selisih=intval($interval->days);
		$totalbooking=$selisih*$cekmobil['tarif_mobil'];
		$timebooking=time();

		// var_dump($_FILES);die;
		if($_FILES['ktpbooking']['name']){
			if($_FILES['ktpbooking']['size']==''||$_FILES['ktpbooking']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran ktp terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/bookingmobil/'.$idmobil);
				return false;
			}else{
				$config['upload_path']          = './assets/img/ktpuser/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('ktpbooking')){
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('users/bookingmobil/'.$idmobil);
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran ktp terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/bookingmobil/'.$idmobil);
						return false;
	            	}
	            }
	            // insert to produks
				$data = array(
				        'id_booking' => null,
				        'kode_booking' => $newKodeBooking,
				        'id_user_booking' => $iduser,
				        'id_mobil_booking' => $idmobil,
				        'tanggalambil_booking' => $tanggalambil.' '.$jamambilmobil,
				        'tanggalkembali_booking' => $tanggalkembali.' '.$jamambilmobil,
				        'jamambil_booking' => $jamambilmobil,
				        'totalhari_booking' => $selisih,
				        'totalharga_booking' => $totalbooking,
				        'denda_booking' => 0,
				        'notlp_booking' => $tlpbooking,
				        'alamat_booking' => $alamatbooking,
				        'ktp_booking' => $foto,
				        'tanggalpemesanan_booking' => $timebooking,
				        'fotopembayaran_booking' => '',
				        'statuspembayaran_booking' => 'belumbayar',
				        'status_booking' => 'dipesan',
				        'notif_booking' => 'belumdilihat'
						);
				$this->db->insert('bookings', $data);
				$idbooking = $this->db->insert_id();
				// notifikasi berhasil
				$this->session->set_flashdata('newnotiftambah',$idbooking);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Mobil berhasil <b>ditambahkan</b>!</span></li>');
				redirect('users/daftarpesanan');
				return false;
	        }
		}else{
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ktp tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/bookingmobil/'.$idmobil);
			return false;
		}
	}

	public function daftarpesanan()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		date_default_timezone_set('Asia/Jakarta');
		$iduser=$this->session->userdata('id_user');
		$data['valuecari']='';
		$querydaftarpesanan="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where id_user_booking=$iduser group by id_booking order by id_booking desc";
		$data['daftarpesananuser']=$this->db->query($querydaftarpesanan)->result_array();
		$data['title']='daftar pesanan';
		$data['iconcari']='<li class="triggernavbarcari"><a href="#" class="grey-text triggernavbarcari"><i style="font-size:30px" class="material-icons blue-text">search</i></a></li>';
		$qcountcari="SELECT count(*) as qcountcari from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where id_user_booking='$iduser' group by id_booking order by id_booking desc";
		$data['qcountcari']=$this->db->query($qcountcari)->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("home/daftarpesanan",$data);
	}

	public function detailpesananuser($idbooking)
	{
		date_default_timezone_set('Asia/Jakarta');
		$iduser=$this->session->userdata('id_user');
		$data['title']='detail pesanan user';
		$querydetailpesananuser="SELECT * from bookings left join users on bookings.id_user_booking=users.id_user left join mobils on bookings.id_mobil_booking=mobils.id_mobil where id_booking=$idbooking and id_user_booking=$iduser";
		$data['detailpesananuser']=$this->db->query($querydetailpesananuser)->row_array();
		// var_dump($data['detailpesananadmin']['id_booking']);die;
		// $this->db->set('notif_booking', 'sudahdilihat');
		// $this->db->where('id_booking', $idbooking);
		// $this->db->update('bookings');

		$this->load->view("templates/header",$data);
		$this->load->view("home/detailpesananuser",$data);
	}

	public function uploadbuktibayar()
	{
		$idbooking=htmlspecialchars($this->input->post('bookingid',true));
		$fotopertama=$this->db->get_where('bookings',['id_booking'=>$idbooking])->row_array();
		// var_dump($fotopertama['fotopembayaran_booking']);die;

		if($_FILES['fotobuktibayar']['name']){
			if($_FILES['fotobuktibayar']['size']==''||$_FILES['fotobuktibayar']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/detailpesananuser/'.$idbooking);
				return false;
			}else{
				$config['upload_path']          = './assets/img/buktibayar/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotobuktibayar')){
	            	if($fotopertama['fotopembayaran_booking']==''){}else{
	            		unlink(FCPATH . '/assets/img/buktibayar/' .$fotopertama['fotopembayaran_booking']);
					}
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('users/detailpesananuser/'.$idbooking);
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/detailpesananuser/'.$idbooking);
						return false;
	            	}
	            }
	            // insert to produks
				$this->db->set('fotopembayaran_booking', $foto);
				$this->db->set('statuspembayaran_booking', 'sudahbayar');
				$this->db->set('status_booking', 'dibayar');
				$this->db->where('id_booking', $idbooking);
				$this->db->update('bookings');
				// $idproduk = $this->db->insert_id();
				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Bukti pembayaran berhasil <b>diupload</b>!</span></li>');
				redirect('users/detailpesananuser/'.$idbooking);
				return false;
	        }
		}else{
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Foto tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/detailpesananuser/'.$idbooking);
			return false;
		}
	}

	public function cancelpesanan($idbooking)
	{
		$this->db->set('status_booking', 'dicancel');
		$this->db->where('id_booking', $idbooking);
		$this->db->update('bookings');
		redirect('users/detailpesananuser/'.$idbooking);
	}

	public function editprofil()
	{
		$data['title']='profile';
		$data['iconcari']='';
		$querybelumdilihat="SELECT count(*) as belumdilihat from bookings where notif_booking='belumdilihat'";
		$data['belumdilihat']=$this->db->query($querybelumdilihat)->row_array();
		$iduser=$this->session->userdata('id_user');
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$iduser])->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("home/editprofil",$data);
	}

	public function updateakun()
	{
		$userid=$this->session->userdata('id_user');
		$namaakun=htmlspecialchars(strtolower($this->input->post('namaakun',true)));
		$tlpakun=htmlspecialchars($this->input->post('tlpakun',true));
		$lahirakun=htmlspecialchars($this->input->post('lahirakun',true));
		$kelaminakun=htmlspecialchars($this->input->post('kelaminakun',true));
		$emailakun=htmlspecialchars(strtolower($this->input->post('emailakun',true)));
		$alamatakun=htmlspecialchars(strtolower($this->input->post('alamatakun',true)));
		$fotouserlama=$this->db->get_where('users',['id_user'=>$userid])->row_array();

		// $querymax = "SELECT max(id_pelanggan) as maxkode FROM users";
		// $datahasil = $this->db->query($querymax)->row_array();
		// $kodebooking= $datahasil['maxkode'];
		// $noUrut = (int) substr($kodebooking, 4, 9);
		// $noUrut++;
		// $rgb = "USER";
		// $newKodeBooking = $rgb . sprintf("%04s", $noUrut);

		// var_dump($newKodeBooking);die;

		$namanull=trim($namaakun);
	    if(empty($namanull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Nama</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $namabaru = preg_replace('/\s+/', ' ', $namanull);
	    }
	    $tlpnull=trim($tlpakun);
	    if(empty($tlpnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>No.telepon</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $tlpbaru = preg_replace('/\s+/', ' ', $tlpnull);
	    }
	    $lahirnull=trim($lahirakun);
	    if(empty($lahirnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Tanggal lahir</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $lahirbaru = preg_replace('/\s+/', ' ', $lahirnull);
	    }
	    $kelaminnull=trim($kelaminakun);
	    if(empty($kelaminnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Jenis kelamin</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $kelaminbaru = preg_replace('/\s+/', ' ', $kelaminnull);
	    }
	    $alamatnull=trim($alamatakun);
	    if(empty($alamatnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Alamat</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $alamatbaru = preg_replace('/\s+/', ' ', $alamatnull);
	    }

	    if($_FILES['fotoakun']['name']){
			if($_FILES['fotoakun']['size']==''||$_FILES['fotoakun']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/editprofil');
				return false;
			}else{
				$config['upload_path']          = './assets/img/users/';
	            $config['allowed_types']        = 'gif|jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotoakun')){
	            	if($fotouserlama['foto_user'] != '0.default.png'){
	            		unlink(FCPATH . '/assets/img/users/' .$fotouserlama['foto_user']);
	            	}
	            	$foto=$this->upload->data('file_name');
					$this->db->set('foto_user', $foto);
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,GIF,PNG</b>!</span></li>');
						redirect('users/editprofil');
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/editprofil');
						return false;
	            	}
	            }
			}
		}else{
			$foto=$fotouserlama['foto_user'];
		}

		// $this->db->set('id_pelanggan', $newKodeBooking);
		$this->db->set('foto_user', $foto);
		$this->db->set('nama_user', $namabaru);
		$this->db->set('alamat_user', $alamatbaru);
		$this->db->set('nomertelepon_user', $tlpbaru);
		$this->db->set('jeniskelamin_user', $kelaminbaru);
		$this->db->set('tanggallahir_user', $lahirbaru);
		// $this->db->set('email_user', $emailbaru);
		$this->db->where('id_user', $userid);
		$this->db->update('users');

		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Informasi akun berhasil <b>diedit</b>!</span></li>');
		redirect('users/editprofil');
		return false;
	}

	public function setpassword()
	{
		$data['title']='setpassword';
		$this->load->view("templates/header",$data);
		$this->load->view("home/setpassword",$data);
	}

	public function simpansetpassword()
	{
		$data['title']='setpassword';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array();
		$userid=$this->session->userdata('id_user');
		$passwordlama=htmlspecialchars($this->input->post('passwordlama',true));
		$matchpassword=$this->db->get_where('users',['id_user'=>$userid])->row_array();
		// var_dump($matchpassword);die;

		$this->form_validation->set_rules('passwordlama','passwordlama','trim|required',
			[
				'required'=>'Password harus diisi'
			]);
		$this->form_validation->set_rules('passwordbaru','Password','trim|required|min_length[5]|matches[passwordconfirm]',[
				'required'=>'Password harus diisi',
				'min_length'=>'Panjang password min 5 karakter',
				'matches'=>'Confirm password tidak sama'
			]);
		$this->form_validation->set_rules('passwordconfirm','confirmpassword','trim|required|matches[passwordbaru]',
			[
				'required'=>'Password harus diisi',
				'matches'=>'Confirm password tidak sama'
			]);

		if ($this->form_validation->run() == FALSE){
			// $this->load->view('users/setpassword',$data);
			$this->load->view("templates/header",$data);
			$this->load->view("home/setpassword",$data);
		}else{
			if($matchpassword['password_user']!=$passwordlama){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Gagal</b> passwod lama salah!</span></li>');
				redirect('users/setpassword');
				// $this->load->view("templates/header",$data);
				// $this->load->view("home/setpassword",$data);
				return false;
			}else{
				$this->db->set('password_user', htmlspecialchars($this->input->post('passwordbaru',true)));
				$this->db->where('id_user', $userid);
				$this->db->update('users');
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b> passwod berhasil diubah!</span></li>');
				redirect('users/setpassword');
				// $this->load->view("templates/header",$data);
				// $this->load->view("home/setpassword",$data);
				return false;
			}
		}
	}

	public function about()
	{
		$data['title']='about';
		$this->load->view("templates/header",$data);
		$this->load->view("home/about",$data);
	}

}