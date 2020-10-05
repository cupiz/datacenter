<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Halaman Petugas - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();

		$this->load->view('v_header',$data);
		$this->load->view('v_masuk_petugas');
		$this->load->view('v_footer_pengguna');
	}
	public function ceklogin()
	{
		
		$email_petugas = $this->input->post('email_petugas');
		$password = $this->input->post('password');

			$this->load->model('Pbgdev_m');

			$data = $this->Pbgdev_m->cekloginpetugas($email_petugas, $password);

			
			if($data==0){
				$this->session->set_flashdata('gagallogin','yes');
				redirect('petugas/index');
			}else{
				$no_petugas= $this->Pbgdev_m->ceknomorpetugas($email_petugas);
				$nama_petugas = $this->Pbgdev_m->ceknamapetugas($no_petugas);
				$this->session->set_userdata('no_petugas',$no_petugas);
				$this->session->set_userdata('nama_petugas',$nama_petugas);
				$this->session->set_flashdata('login','yes');
				redirect('petugas/beranda');
			}
	}


	public function beranda()
	{
		$no_petugas = $this->session->userdata('no_petugas');
		if ($no_petugas=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Beranda - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampillaporansm'] = $this->Pbgdev_m->tampillaporansm(5);
		$data['tampilusulansm'] = $this->Pbgdev_m->tampilusulansm(5);

		$this->load->view('v_header_petugas',$data);
		$this->load->view('v_home_petugas');
		$this->load->view('v_footer_pengguna');
	}


	public function dataproyek()
	{
		$no_pengembang = $this->session->userdata('no_pengembang');
		if ($no_pengembang=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Data Proyek - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilproyeksemua'] = $this->Pbgdev_m->tampilproyeksemua($no_pengembang);

		$this->load->view('v_header_pengembang',$data);
		$this->load->view('v_data_proyek_pengembang');
		$this->load->view('v_footer_pengguna');
	}
	
	public function akun()
	{
		$no_pengembang = $this->session->userdata('no_pengembang');
		if ($no_pengembang=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Akun Pengembang - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilakunpengembang'] = $this->Pbgdev_m->tampilakunpengembang($no_pengembang);

		$this->load->view('v_header_pengembang',$data);
		$this->load->view('v_akun_pengembang');
		$this->load->view('v_footer_pengguna');
	}

	public function tambahfoto()
	{
		$no_pengembang = $this->session->userdata('no_pengembang');
		if ($no_pengembang=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Data Laporan - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilakunpengembang'] = $this->Pbgdev_m->tampilakunpengembang($no_pengembang);
		$data['tampilproyeksemua2'] = $this->Pbgdev_m->tampilproyeksemua2($no_pengembang);


		$this->load->view('v_header_pengembang',$data);
		$this->load->view('v_tambahfotoproyek');
		$this->load->view('v_footer_pengguna');
	}





	public function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	
	public function keluar()
	{
		$this->session->sess_destroy();
	    redirect('beranda');  
	}

}
