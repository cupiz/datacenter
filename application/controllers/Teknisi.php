<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends CI_Controller {

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
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Beranda Teknisi - ';
		$data['tampilserver'] = $this->DatacenterModel->tampiljmlserver();
		$data['tampilvps'] = $this->DatacenterModel->tampiljmlvps();
		$data['tampilsistem'] = $this->DatacenterModel->tampiljmlsistem();
		$data['jmlram'] = $this->DatacenterModel->tampiljmlram();
		$data['jmlstorage'] = $this->DatacenterModel->tampiljmlstorage();
		$data['jmlkabel'] = $this->DatacenterModel->tampiljmlkabel();
		$data['jmlprosesor'] = $this->DatacenterModel->tampiljmlprosesor();

		$id_user = $this->session->userdata('id_user');
		$data['history'] = $this->DatacenterModel->tampilhistoryuser($id_user);

		$leveluser = $this->session->userdata('level_user');

		if ($leveluser == '2'){
			$this->load->view('ViewHeadTeknisi',$judul);
			$this->load->view('ViewTeknisi',$data);
			$this->load->view('ViewFooterTeknisi');
		}else if($leveluser == '1'){
			redirect('Admin');
		}else if($leveluser == NULL ){
			redirect('');
		}

        

    } 
    
    public function logout(){
        $this->session->unset_userdata('id_user',$id_user);
        $this->session->unset_userdata('nama_user',$nama_user);
        $this->session->unset_userdata('username',$username);
        $this->session->unset_userdata('level_user',$level_user);
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function prosesor()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Prosesor - ';
		$data['tampil'] = $this->DatacenterModel->tampilteknisiprosesor();
		$data['tampil2'] = $this->DatacenterModel->tampilhistoryprosesor();


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiProsesor',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailprosesor($id_prosesor)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Prosesor - ';

		$data['tampil'] = $this->DatacenterModel->tampilprosesordetail($id_prosesor);


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiProsesorUbah',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function prosesubahprosesor($id_prosesor)
	{
        $this->load->model('DatacenterModel');
		$status = $this->input->post('statusprosesor');
		$id_prosesor = $this->input->post('idprosesor');
		$nama_prosesor = $this->input->post('namaprosesor');
		$nama_server = $this->input->post('namaserver');
		$id_user = $this->session->userdata('id_user');

		$data = array($status,$id_prosesor,$nama_prosesor,$nama_server,$id_user);
		$this->DatacenterModel->ubahprosesordetail($data);
		
		
		redirect('Teknisi/prosesor');

	}
	
	public function ram()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'RAM - ';
		$data['tampil'] = $this->DatacenterModel->tampilteknisiram();
		$data['tampil2'] = $this->DatacenterModel->tampilhistoryram();

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiRam',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailram($id_ram)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail RAM - ';

		$data['tampil'] = $this->DatacenterModel->tampilramdetail($id_ram);


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiRamUbah',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function prosesubahram($id_ram)
	{
        $this->load->model('DatacenterModel');
		$status = $this->input->post('statusram');
		$id_ram = $this->input->post('idram');
		$nama_ram = $this->input->post('namaram');
		$nama_server = $this->input->post('namaserver');
		$id_user = $this->session->userdata('id_user');

		$data = array($status,$id_ram,$nama_ram,$nama_server,$id_user);
		$this->DatacenterModel->ubahramdetail($data);
		
		
		redirect('Teknisi/ram');

	}
	
	public function storage()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Storage - ';
		$data['tampil'] = $this->DatacenterModel->tampilteknisistorage();
		$data['tampil2'] = $this->DatacenterModel->tampilhistorystorage();


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiStorage',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailstorage($id_storage)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Storage - ';

		$data['tampil'] = $this->DatacenterModel->tampilstoragedetail($id_storage);


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiStorageUbah',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function prosesubahstorage($id_storage)
	{
        $this->load->model('DatacenterModel');
		$status = $this->input->post('statusstorage');
		$id_storage = $this->input->post('idstorage');
		$nama_storage = $this->input->post('namastorage');
		$nama_server = $this->input->post('namaserver');
		$id_user = $this->session->userdata('id_user');

		$data = array($status,$id_storage,$nama_storage,$nama_server,$id_user);
		$this->DatacenterModel->ubahstoragedetail($data);
		
		
		redirect('Teknisi/storage');

	}
	
	public function kabel()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Kabel - ';
		$data['tampil'] = $this->DatacenterModel->tampilteknisikabel();
		$data['tampil2'] = $this->DatacenterModel->tampilhistorykabel();

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiKabel',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailkabel($id_kabel)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Kabel - ';

		$data['tampil'] = $this->DatacenterModel->tampilkabeldetail($id_kabel);


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiKabelUbah',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function prosesubahkabel($id_kabel)
	{
        $this->load->model('DatacenterModel');
		$status = $this->input->post('statuskabel');
		$id_kabel = $this->input->post('idkabel');
		$nama_kabel = $this->input->post('namakabel');
		$nama_server = $this->input->post('namaserver');
		$id_user = $this->session->userdata('id_user');

		$data = array($status,$id_kabel,$nama_kabel,$nama_server,$id_user);
		$this->DatacenterModel->ubahkabeldetail($data);
		
		
		redirect('Teknisi/kabel');

	}

	
	public function ruangan()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ruangan - ';

		$data['tampil'] = $this->DatacenterModel->tampilsemuaruangan();

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiRuangan',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailruangan($id_ruangan)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Ruangan - ';

		$data['tampil'] = $this->DatacenterModel->tampildetailruangan($id_ruangan);
		$data['tampil1'] = $this->DatacenterModel->jmlruanganlemari($id_ruangan);
		$data['tampil2'] = $this->DatacenterModel->jmlruanganrack($id_ruangan);
		$data['tampil3'] = $this->DatacenterModel->jmlruanganserver($id_ruangan);


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiRuanganDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function lemari()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Lemari - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemualemari();
		
		
        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiLemari',$data);
		$this->load->view('ViewFooterTeknisi');

    }

	public function detaillemari($id_lemari)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Lemari - ';

		$data['tampil'] = $this->DatacenterModel->tampildetaillemari($id_lemari);
		$data['tampil1'] = $this->DatacenterModel->tampillemariruangan($id_lemari);
		$data['tampil2'] = $this->DatacenterModel->jmllemarirack($id_lemari);
		$data['tampil3'] = $this->DatacenterModel->jmllemariserver($id_lemari);


        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiLemariDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function rak()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Rak - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuarack();

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiRak',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailrack($id_rack)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Rack - ';

		$data['tampil'] = $this->DatacenterModel->tampildetailrack($id_rack);
		$data['tampil1'] = $this->DatacenterModel->tampilrackruangan($id_rack);
		$data['tampil2'] = $this->DatacenterModel->tampilracklemari($id_rack);
		

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiRakDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function server()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Server - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuaserver();

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiServer',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailserver($id_server)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Server - ';

		$data['tampil'] = $this->DatacenterModel->tampildetailserver($id_server);
		$data['tampilprosesor'] = $this->DatacenterModel->tampilspekserverprosesor($id_server);
		$data['tampilstorage'] = $this->DatacenterModel->tampilspekserverstorage($id_server);
		$data['tampilstoragetotal'] = $this->DatacenterModel->tampiljmlserverstorage($id_server);
		$data['tampilram'] = $this->DatacenterModel->tampilspekserverram($id_server);
		$data['tampilramtotal'] = $this->DatacenterModel->tampiljmlserverram($id_server);
		$data['tampilkabel'] = $this->DatacenterModel->tampilspekserverkabel($id_server);
		$data['tampilstorageterpakai'] = $this->DatacenterModel->tampilstorageserverterpakai($id_server);
		
		
		

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiServerDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function vps()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'VPS - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuavps();

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiVps',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailvps($id_vps)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail VPS - ';
		$data['tampil'] = $this->DatacenterModel->tampildetailvps($id_vps);
		$data['tampilnama'] = $this->DatacenterModel->tampilsemuavpsdetail($id_vps);
		$data['tampilprosesor'] = $this->DatacenterModel->tampilvpsprosesor($id_vps);

		

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiVpsDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function sistem()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Sistem - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuasistem();

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiSistem',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function laporan()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Laporan - ';

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiLaporan');
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function ubahdataakun()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Data Akun - ';

		$id_user = $this->session->userdata('id_user');
		$data['tampilakun'] = $this->DatacenterModel->tampilakunteknisi($id_user);

        $this->load->view('ViewHeadTeknisi',$judul);
		$this->load->view('ViewTeknisiUbahData',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function prosesubahuser()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_user = $this->input->post('nama_user');
			$email =$this->input->post('email');
			$photo = "logounsoedlp3m.png";
			$id_user = $this->input->post('id_user');
			

			$data = array($username,$password,$nama_user,$email,$photo,$id_user);
			$this->DatacenterModel->ubahakunteknisi($data);
			$this->session->set_userdata('nama_user',$nama_user);
				
			redirect('Teknisi/ubahdataakun');
		
    }
	
	


     // END
}

?>