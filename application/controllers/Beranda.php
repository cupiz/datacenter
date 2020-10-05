<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Beranda - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilproyek'] = $this->Pbgdev_m->tampilproyekhome(8);
		$data['tampillokasi'] = $this->Pbgdev_m->tampillokasi();

		$this->load->view('v_header',$data);
		$this->load->view('v_home');
		$this->load->view('v_footer');
	}
	public function tentang()
	{
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Tentang - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();

		$this->load->view('v_header',$data);
		$this->load->view('v_tentang');
		$this->load->view('v_footer');
	}
	public function panduan()
	{
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Panduan - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$this->load->view('v_header',$data);
		$this->load->view('v_panduan');
		$this->load->view('v_footer');
	}
	public function kontak()
	{
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Kontak - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$this->load->view('v_header',$data);
		$this->load->view('v_kontak');
		$this->load->view('v_footer');
	}
	public function notfound()
	{
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = '404 Not Found - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$this->load->view('v_header',$data);
		$this->load->view('v_404');
		$this->load->view('v_footer');
	}
	public function semuaproyek()
	{
		$this->load->library('pagination');
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Semua Proyek - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		//$data['tampilproyek'] = $this->Pbgdev_m->tampilproyek(8);
		$data['tampilproyekall'] = $this->Pbgdev_m->tampilproyekall();

        // init params
        $params = array();
        $limit_per_page = 2;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Pbgdev_m->tampilproyektotal();
 
        if ($total_records > 0) 
        {
            // get current page records
            $data["tampilproyek"] = $this->Pbgdev_m->tampilproyek($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'beranda/halamanproyek';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav class="pagination">
										<ul>';
            $config['full_tag_close'] = '</ul>
										</nav>';
             
            $config['next_link'] = '<i class="sl sl-icon-arrow-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = '<i class="sl sl-icon-arrow-left"></i>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="currlinks">';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
         
            $this->pagination->initialize($config);
             
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

		$this->load->view('v_header',$data);
		$this->load->view('v_semuaproyek');
		$this->load->view('v_footer');
	}
	public function halamanproyek()
	{
		$this->load->library('pagination');
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Semua Proyek - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		//$data['tampilproyek'] = $this->Pbgdev_m->tampilproyek(8);
		$data['tampilproyekall'] = $this->Pbgdev_m->tampilproyekall();

        $params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->Pbgdev_m->tampilproyektotal();

        if ($total_records > 0)
        {
            // get current page records
            $data["tampilproyek"] = $this->Pbgdev_m->tampilproyek($limit_per_page, $page*$limit_per_page);

                 
            $config['base_url'] = base_url() . 'beranda/halamanproyek';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav class="pagination">
										<ul>';
            $config['full_tag_close'] = '</ul>
										</nav>';
             
            $config['next_link'] = '<i class="sl sl-icon-arrow-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = '<i class="sl sl-icon-arrow-left"></i>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="currlinks">';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

		$this->load->view('v_header',$data);
		$this->load->view('v_semuaproyek');
		$this->load->view('v_footer');
	}
	public function kategori($no_kategori_proyek)
	{
		$this->load->library('pagination');
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Semua Proyek - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		//$data['tampilproyek'] = $this->Pbgdev_m->tampilproyekkategori($no_kategori_proyek);
		$data['tampilproyekall'] = $this->Pbgdev_m->tampilproyekall();

		// init params
        $params = array();
        $limit_per_page = 2;
        $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $total_records = $this->Pbgdev_m->tampilproyekkategoritotal($no_kategori_proyek);
 
        if ($total_records >= 0) 
        {
            // get current page records
            $data["tampilproyek"] = $this->Pbgdev_m->tampilproyekkategori($limit_per_page, $start_index, $no_kategori_proyek);
             
            $config['base_url'] = base_url() . 'beranda/halamankategori/'.$no_kategori_proyek;
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;
            
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav class="pagination">
										<ul>';
            $config['full_tag_close'] = '</ul>
										</nav>';
             
            $config['next_link'] = '<i class="sl sl-icon-arrow-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = '<i class="sl sl-icon-arrow-left"></i>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="currlinks">';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
         
            $this->pagination->initialize($config);
             
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

		$this->load->view('v_header',$data);
		$this->load->view('v_semuaproyek');
		$this->load->view('v_footer');
	}
	public function halamankategori($no_kategori_proyek)
	{
		$this->load->library('pagination');
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Semua Proyek - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		//$data['tampilproyek'] = $this->Pbgdev_m->tampilproyekkategori($no_kategori_proyek);
		$data['tampilproyekall'] = $this->Pbgdev_m->tampilproyekall();

		$params = array();
        $limit_per_page = 2;
        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
        $total_records = $this->Pbgdev_m->tampilproyekkategoritotal($no_kategori_proyek);

        if ($total_records > 0)
        {
            // get current page records
            $data["tampilproyek"] = $this->Pbgdev_m->tampilproyekkategori($limit_per_page, $page*$limit_per_page,$no_kategori_proyek);
     
            $config['base_url'] = base_url() . 'beranda/halamankategori/' . $no_kategori_proyek;
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;
             
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav class="pagination">
										<ul>';
            $config['full_tag_close'] = '</ul>
										</nav>';
             
            $config['next_link'] = '<i class="sl sl-icon-arrow-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = '<i class="sl sl-icon-arrow-left"></i>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="currlinks">';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
             
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

		$this->load->view('v_header',$data);
		$this->load->view('v_semuaproyek');
		$this->load->view('v_footer');
	}
	public function proyek($no_proyek)
	{
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$namaproyek = $this->Pbgdev_m->tampilnamaproyek($no_proyek);
		$data['title'] = $namaproyek. ' - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilproyeksatu'] = $this->Pbgdev_m->tampilproyeksatu($no_proyek);
		$data['tampillaporanterbaru'] = $this->Pbgdev_m->tampillaporanterbaru();
		$data['tampillaporansatu'] = $this->Pbgdev_m->tampillaporansatu($no_proyek);
		$data['tampilfotoproyek'] = $this->Pbgdev_m->tampilfotoproyek($no_proyek);

		$this->load->view('v_header',$data);
		$this->load->view('v_proyek');
		$this->load->view('v_footer');
	}

	public function tambahusulan()
	{
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Tambah Usulan - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$this->load->view('v_header',$data);
		$this->load->view('v_tambahusulan');
		$this->load->view('v_footer');
	}

	public function tgl_indo($tanggal)
	{
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

	

	public function ceklogin()
	{
		
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

			$this->load->model('Pbgdev_m');

			$data = $this->Pbgdev_m->ceklogin($email, $password);

			if($data==NULL){
				$this->session->set_flashdata('gagallogin','yes');
				redirect('beranda/index');
			}else{
				$no_pengguna = $this->Pbgdev_m->ceknomorpengguna($email);
				$nama_pengguna = $this->Pbgdev_m->ceknamapengguna($no_pengguna);
				$status_verifikasi = $this->Pbgdev_m->cekstatuspengguna($no_pengguna);
				$this->session->set_userdata('no_pengguna',$no_pengguna);
				$this->session->set_userdata('nama_pengguna',$nama_pengguna);
				$this->session->set_userdata('email_pengguna',$email);
				$this->session->set_userdata('status_verifikasi',$status_verifikasi);
				$this->session->set_flashdata('login','yes');
				redirect('pengguna');
			}
	}

	public function cari()
	{
		
		$nama_proyek = $this->input->post('nama_proyek');
		$lokasi_proyek = $this->input->post('lokasi_proyek');
		$kategori_proyek = $this->input->post('kategori_proyek');
		
		$this->load->model('Pbgdev_m');
		$this->load->library('botdetect/BotDetectCaptcha', array( 'captchaConfig' => 'ExampleCaptcha' ));
		$data['captchaHtml'] = $this->botdetectcaptcha->Html();
		$data['title'] = 'Semua Proyek - ' . $this->Pbgdev_m->tampilnamaweb();
		$data['konfigurasiweb'] = $this->Pbgdev_m->tampilkonfigurasi();
		$data['tampilkategori'] = $this->Pbgdev_m->tampilkategori();
		$data['tampilproyek'] = $this->Pbgdev_m->tampilproyek2($nama_proyek,$lokasi_proyek,$kategori_proyek);
		$data['tampilproyekall'] = $this->Pbgdev_m->tampilproyekall();

		$this->load->view('v_header',$data);
		$this->load->view('v_semuaproyek');
		$this->load->view('v_footer');
			
			
	}
	public function simpantambahusulan()
	{
		
		$judul_usulan = $this->input->post('judul_usulan');
		$no_kategori_proyek = $this->input->post('no_kategori_proyek');
		$deskripsi_usulan = $this->input->post('deskripsi_usulan');
		$lokasi_usulan = $this->input->post('lokasi_usulan');

					$this->load->helper('file');
					$config['upload_path']="./assets/images/";
					$config['allowed_types']="jpg|png|gif|jpeg|bmp";
					$this->load->library('upload',$config);
						if(!$this->upload->do_upload("gambar")){
							
						}
							$file = $this->upload->data();
							$fotoupload=$file['file_name'];
		
		$this->load->model('Pbgdev_m');
		$no_pengguna = $this->session->userdata('no_pengguna');

		$data = array($judul_usulan,$no_kategori_proyek,$lokasi_usulan,$fotoupload,$deskripsi_usulan,1,$no_pengguna);
		$this->Pbgdev_m->simpantambahusulan($data);
		
		$this->session->set_flashdata('simpan','yes');
		redirect('beranda/tambahusulan');
			
			
	}
	public function simpantambahlaporan()
	{
		
		$isi_laporan = $this->input->post('isi_laporan');
		$rating = $this->input->post('rating');
		$no_proyek = $this->input->post('no_proyek');
		$no_pengguna = $this->input->post('no_pengguna');
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_hari_ini = date('Y-m-d');

					$this->load->helper('file');
					$config['upload_path']="./assets/images/";
					$config['allowed_types']="jpg|png|gif|jpeg|bmp";
					$this->load->library('upload',$config);
						if(!$this->upload->do_upload("gambar")){
							
						}
							$file = $this->upload->data();
							$fotoupload=$file['file_name'];
		
		$this->load->model('Pbgdev_m');


		$data = array($tanggal_hari_ini,$isi_laporan,$fotoupload,$rating,$no_proyek,$no_pengguna);
		$this->Pbgdev_m->simpantambahlaporan($data);

		redirect('beranda/proyek/' . $no_proyek . '#listing-reviews');
			
			
	}

	

	
	public function prosesdaftar()
	{
		// load the BotDetect Captcha library and set its parameter
		  $this->load->library('botdetect/BotDetectCaptcha', array(
		    'captchaConfig' => 'ExampleCaptcha'
		  ));

		$code = $this->input->post('CaptchaCode');
		$isHuman = $this->botdetectcaptcha->Validate($code);

		if (!$isHuman) {
			$this->session->set_flashdata('salahcapcha','yes');
		    redirect('beranda');
		} else {
		    
		    $this->load->model('Pbgdev_m');
		
			$aktivasi = md5($this->input->post('email_pengguna'));
			$nik_pengguna = $this->input->post('nik_pengguna');
			$nama_pengguna = $this->input->post('nama_pengguna');
			$alamat_pengguna ="";
			$notelp_pengguna = $this->input->post('notelp_pengguna');
			$foto_pengguna = "";
			$email_pengguna = $this->input->post('email_pengguna');
			$password_pengguna=md5($this->input->post('password_pengguna'));
			$foto_verif_pengguna="";

			$cekemailada = $this->Pbgdev_m->cekemailada($email_pengguna);
			if ($cekemailada != "") {
				$this->session->set_flashdata('emailsudahada','yes');
		    	redirect('beranda');
		    	exit();
			}
			$ceknikada = $this->Pbgdev_m->ceknikada($nik_pengguna);
			if ($ceknikada != "") {
				$this->session->set_flashdata('emailsudahada','yes');
		    	redirect('beranda');
		    	exit();
			}

			$data = array($nik_pengguna,$nama_pengguna,$alamat_pengguna,$notelp_pengguna,$foto_pengguna,$email_pengguna,$password_pengguna,$foto_verif_pengguna,$aktivasi);
			$this->Pbgdev_m->simpanpendaftar($data);
			
			$this->kirimemail($email_pengguna,$nik_pengguna,$nama_pengguna,$aktivasi);
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('beranda');
		}
		

		
	}
	public function kirimemail($email_pengguna,$nik_pengguna,$nama_pengguna,$aktivasi)
    {
        // Konfigurasi email.
        
        $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'smtp.gmail.com',
               'smtp_user' => 'purbalinggadevinspek@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'kosong31',             // Password gmail Anda.
               'smtp_port' => 587,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'tls',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];

        $message= /*-----------email body starts-----------*/
		        "Terimakasih sudah mendaftar, " . $nama_pengguna . "! <br/>
		        <br/>
		        Akun anda berhasil dibuat.  <br/>
		        Berikut adalah detail akun anda. <br/>
		        ------------------------------------------------- <br/>
		        NIK (KTP): " . $nik_pengguna . " <br/>
		        Nama: " . $nama_pengguna . " <br/>
		        Email: " . $email_pengguna . " <br/>
		        ------------------------------------------------- <br/>
		                        <br/>
		        Silahkan klik link berikut untuk mengaktifkan akun anda: <br/>
		            
		        " . base_url() . "beranda/verify/". $aktivasi ."";
				/*-----------email body ends-----------*/		    
 
        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from('purbalinggadevinspek@gmail.com', 'Purbalingga Dev');    // Email dan nama pegirim.
        $this->email->to($email_pengguna);                       // Penerima email.
 
 
        // Subject email.
        $this->email->subject('Verifikasi Email Purbalingga Dev');
 
        // Isi email. Bisa dengan format html.
        $this->email->message($message);
 
        if ($this->email->send())
        {
            echo 'Sukses! email berhasil dikirim.';
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

    public function verify($verify){  
	  $this->load->model('Pbgdev_m');

	  $email = $this->Pbgdev_m->cekemail($verify);
	  $noRecords = $this->Pbgdev_m->verify($verify);  
	  if ($noRecords > 0){
	  	  $this->session->set_flashdata('emailverifikasi','yes');
	      redirect('beranda');
	  }else{
	   	  $this->session->set_flashdata('emailsudahada','yes');
	      redirect('beranda');
	  }
	  
	}
	

}
