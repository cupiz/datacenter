<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembang extends CI_Controller {

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
		$data['title'] = 'Halaman Pengembang - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();

		$this->load->view('v_header',$data);
		$this->load->view('v_masuk_pengembang');
		$this->load->view('v_footer_pengguna');
	}
	public function ceklogin()
	{
		
		$kode_pengembang = $this->input->post('kode_pengembang');
		$password = $this->input->post('password');

			$this->load->model('Pbgdev_m');

			$data = $this->Pbgdev_m->cekloginpengembang($kode_pengembang, $password);

			
			if($data==0){
				$this->session->set_flashdata('gagallogin','yes');
				redirect('pengembang/index');
			}else{
				$no_pengembang = $this->Pbgdev_m->ceknomorpengembang($kode_pengembang);
				$nama_pengembang = $this->Pbgdev_m->ceknamapengembang($no_pengembang);
				$this->session->set_userdata('no_pengembang',$no_pengembang);
				$this->session->set_userdata('nama_pengembang',$nama_pengembang);
				$this->session->set_flashdata('login','yes');
				redirect('pengembang/beranda');
			}
	}


	public function beranda()
	{
		$no_pengembang = $this->session->userdata('no_pengembang');
		if ($no_pengembang=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Beranda - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampillaporan3'] = $this->Pbgdev_m->tampillaporan3($no_pengembang);
		$data['tampilproyek3'] = $this->Pbgdev_m->tampilproyek3($no_pengembang);

		$this->load->view('v_header_pengembang',$data);
		$this->load->view('v_home_pengembang');
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
