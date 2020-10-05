<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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
		$no_pengguna = $this->session->userdata('no_pengguna');
		if ($no_pengguna=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Halaman Pengguna - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampillaporan2'] = $this->Pbgdev_m->tampillaporan2($no_pengguna);
		$data['tampilusulan2'] = $this->Pbgdev_m->tampilusulan2($no_pengguna);
		$status_verifikasi = $this->Pbgdev_m->cekstatuspengguna($no_pengguna);
		$this->session->set_userdata('status_verifikasi',$status_verifikasi);

		$this->load->view('v_header_pengguna',$data);
		$this->load->view('v_home_pengguna');
		$this->load->view('v_footer_pengguna');
	}
	public function datausulan()
	{
		$no_pengguna = $this->session->userdata('no_pengguna');
		if ($no_pengguna=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Data Usulan - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilusulansemua'] = $this->Pbgdev_m->tampilusulansemua($no_pengguna);

		$this->load->view('v_header_pengguna',$data);
		$this->load->view('v_data_usulan_pengguna');
		$this->load->view('v_footer_pengguna');
	}
	public function datalaporan()
	{
		$no_pengguna = $this->session->userdata('no_pengguna');
		if ($no_pengguna=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Data Laporan - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampillaporansemua'] = $this->Pbgdev_m->tampillaporansemua($no_pengguna);

		$this->load->view('v_header_pengguna',$data);
		$this->load->view('v_data_laporan_pengguna');
		$this->load->view('v_footer_pengguna');
	}
	public function akun()
	{
		$no_pengguna = $this->session->userdata('no_pengguna');
		if ($no_pengguna=='') {
			redirect('beranda/index');
		}
		$this->load->model('Pbgdev_m');
		$data['title'] = 'Data Laporan - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilakun'] = $this->Pbgdev_m->tampilakun($no_pengguna);

		$this->load->view('v_header_pengguna',$data);
		$this->load->view('v_akun_pengguna');
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
