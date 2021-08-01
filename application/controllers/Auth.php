<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('level_user')){
			redirect('users');
		}
		$this->form_validation->set_rules('email','Email','trim|required|valid_email',
			[
				'required'=>'Email harus diisi',
				'valid_email'=>'Email tidak valid'
			]);
		$this->form_validation->set_rules('password','Password','trim|required',['required'=>'Password harus diisi']);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('auth/login');
		}else{
			$this->_login();
		}
	}

	private function _login()
	{
		$email=htmlspecialchars(strtolower($this->input->post('email',true)));
		$password=htmlspecialchars($this->input->post('password',true));

		$users=$this->db->get_where('users',['email_user'=>$email,'password_user'=>$password])->row_array();
		if($users){
			$data=[
				'id_user'=>$users['id_user'],
				'level_user'=>$users['level_user']
			];
			$this->session->set_userdata($data);
			redirect('users');
		}else{
			$this->session->set_flashdata('pesan','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:10px;"><i class="material-icons right close" style="">close</i><span class="">Email/password salah!</span></li>');
			$this->load->view('auth/login');
			return false;
		}
	}

	public function daftarakun()
	{
		if($this->session->userdata('level_user')){
			redirect('users');
		}
		$this->load->view('auth/daftarakun');
	}

	public function daftar()
	{
		if($this->session->userdata('level_user')){
			redirect('users');
		}
		$this->form_validation->set_rules('namadaftar','Namadaftar','trim|required',
			['required'=>'Nama harus diisi']);
		$this->form_validation->set_rules('tgllahirdaftar','tanggal lahir','trim|required',
			['required'=>'Tanggal lahir harus diisi']);
		$this->form_validation->set_rules('jeniskelamindaftar','Jenis kelamin','trim|required',
			['required'=>'Jenis kelamin harus diisi']);
		$this->form_validation->set_rules('emaildaftar','Email','trim|required|valid_email|is_unique[users.email_user]',
			[
				'required'=>'Email harus diisi',
				'valid_email'=>'Email tidak valid',
				'is_unique'=>'Email sudah terdaftar'
			]);
		$this->form_validation->set_rules('pdaftar1','Password','trim|required|min_length[5]|matches[pdaftar2]',[
				'required'=>'Password harus diisi',
				'min_length'=>'Panjang password min 5 karakter',
				'matches'=>'Confirm password tidak sama'
			]);
		$this->form_validation->set_rules('pdaftar2','confirmpassword','trim|required|matches[pdaftar1]',
			[
				'required'=>'Password harus diisi',
				'matches'=>'Confirm password tidak sama'
			]);

		if ($this->form_validation->run() == FALSE){
			$this->load->view('auth/daftarakun');
		}else{
			$querymax = "SELECT max(id_pelanggan) as maxkode FROM users";
			$datahasil = $this->db->query($querymax)->row_array();
			$kodebooking= $datahasil['maxkode'];
			$noUrut = (int) substr($kodebooking, 4, 9);
			$noUrut++;
			$rgb = "USER";
			$newKodeBooking = $rgb . sprintf("%04s", $noUrut);
			// var_dump($newKodeBooking);die;
			$data = array(
			        'id_user' => null,
			        'id_pelanggan' => $newKodeBooking,
			        'foto_user' => '0.default.png',
			        'nama_user' => htmlspecialchars($this->input->post('namadaftar',true)),
			        'tanggallahir_user' => htmlspecialchars($this->input->post('tgllahirdaftar',true)),
			        'jeniskelamin_user' => htmlspecialchars($this->input->post('jeniskelamindaftar',true)),
			        'alamat_user' => '',
			        'nomertelepon_user' => '',
			        'email_user' => htmlspecialchars($this->input->post('emaildaftar',true)),
			        'password_user' => htmlspecialchars($this->input->post('pdaftar1',true)),
			        'level_user' => 'user',
			        'daftar_user' => time()
					);

			$this->db->insert('users', $data);
			$this->session->set_flashdata('pesan','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Akun berhasil dibuat <b>silahkan login</b>!</span></li>');
			redirect('auth');
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		// $this->session->unset_userdata('tipe_user');
		$this->session->unset_userdata('level_user');
		redirect('auth');
	}

}