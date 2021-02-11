<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$judul['title'] = 'Halaman Admin - ';

		$leveluser = $this->session->userdata('level_user');

		if ($leveluser == '1'){
			$this->load->view('ViewHeadAdmin',$judul);
			$this->load->view('ViewHomeAdmin');
			$this->load->view('ViewFooterAdmin');
		}else if($leveluser == '2'){
			redirect('Teknisi');
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

	public function ubahdata()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Data Akun - ';

		$id_user = $this->session->userdata('id_user');
		$data['tampilakun'] = $this->DatacenterModel->tampilakunadmin($id_user);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahData',$data);
		$this->load->view('ViewFooterAdmin');

    }

    public function user()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data User - ';

        $data['tampiluser'] = $this->DatacenterModel->tampiluser();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUser',$data);
		$this->load->view('ViewFooterAdmin');

    } 
    public function hapususer($id_user)
	{
        $this->load->model('DatacenterModel');

        $data['tampiluser'] = $this->DatacenterModel->hapususer($id_user);

        redirect("Admin/user");
    } 

    public function tambahuser()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah User - ';

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahUser');
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahuser()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_user = $this->input->post('nama_user');
			$email =$this->input->post('email');
			$photo = "logounsoedlp3m.png";
			$level_user = $this->input->post('level_user');
			

			$data = array($username,$password,$nama_user,$email,$photo,$level_user);
			$this->DatacenterModel->tambahuser($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/user');
		
    }
    
    public function ubahuser($id_user)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah User - ';
        $data['ubahuser'] = $this->DatacenterModel->ubahuser($id_user);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahUser',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahuser()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_user = $this->input->post('nama_user');
			$email =$this->input->post('email');
			$photo = "logounsoedlp3m.png";
			$level_user = $this->input->post('level_user');
			$id_user = $this->input->post('id_user');
			

			$data = array($username,$password,$nama_user,$email,$photo,$level_user,$id_user);
			$this->DatacenterModel->ubahuser1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/user');
		
	}
	
	// Komponen Master
	public function prosesor()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Komponen Prosesor - ';

		$data['tampilkomponenprosesor'] = $this->DatacenterModel->tampilprosesor();
		$data['tampil2'] = $this->DatacenterModel->tampilhistoryprosesor();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminKomponenProsesor',$data);
		$this->load->view('ViewFooterAdmin');

    } 
    public function hapusprosesor($id_prosesor)
	{
        $this->load->model('DatacenterModel');

        $data['tampilprosesor'] = $this->DatacenterModel->hapusprosesor($id_prosesor);

        redirect("Admin/prosesor");
    } 

    public function tambahprosesor()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Prosesor - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuaserver();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahProsesor',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahprosesor()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_prosesor');
            $jmlcore = $this->input->post('jmlcore');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverprosesor');

			$data = array($server,$nama,$jmlcore,$keterangan);
			$this->DatacenterModel->tambahprosesor($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/prosesor');
		
    }
    
    public function ubahprosesor($id_prosesor)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Prosesor - ';
		$data['option'] = $this->DatacenterModel->tampilsemuaserver();
        $data['ubahprosesor'] = $this->DatacenterModel->ubahprosesor($id_prosesor);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminProsesorUbah',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahprosesor()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_prosesor');
            $jmlcore = $this->input->post('jmlcore');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverprosesor');
			$id_prosesor = $this->input->post('id_prosesor');
			

			$data = array($server,$nama,$jmlcore,$keterangan,$id_prosesor);
			$this->DatacenterModel->ubahprosesor1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/prosesor');
		
	}
	
	// Komponen RAM
	public function ram()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Komponen RAM - ';

		$data['tampilram'] = $this->DatacenterModel->tampilram();
		$data['tampil2'] = $this->DatacenterModel->tampilhistoryram();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminKomponenRam',$data);
		$this->load->view('ViewFooterAdmin');

    } 
    public function hapusram($id_ram)
	{
        $this->load->model('DatacenterModel');

        $data['tampilram'] = $this->DatacenterModel->hapusram($id_ram);

        redirect("Admin/ram");
    } 

    public function tambahram()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah RAM - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuaserver();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahRam',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahram()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_ram');
            $ukuranram = $this->input->post('ukuranram');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverram');

			$data = array($server,$nama,$ukuranram,$keterangan);
			$this->DatacenterModel->tambahram($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/ram');
		
    }
    
    public function ubahram($id_ram)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah RAM - ';
		$data['option'] = $this->DatacenterModel->tampilsemuaserver();
        $data['ubahram'] = $this->DatacenterModel->ubahram($id_ram);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminRamUbah',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahram()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_ram');
            $ukuranram = $this->input->post('ukuranram');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverprosesor');
			$id_ram = $this->input->post('id_ram');
			

			$data = array($server,$nama,$ukuranram,$keterangan,$id_ram);
			$this->DatacenterModel->ubahram1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/ram');
		
	}

	// Komponen storage

	public function storage()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Komponen Storage - ';

		$data['tampilstorage'] = $this->DatacenterModel->tampilstorage();
		$data['tampil2'] = $this->DatacenterModel->tampilhistorystorage();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminKomponenStorage',$data);
		$this->load->view('ViewFooterAdmin');

    } 
    public function hapusstorage($id_storage)
	{
        $this->load->model('DatacenterModel');

        $data['tampilstorage'] = $this->DatacenterModel->hapusstorage($id_storage);

        redirect("Admin/storage");
    } 

    public function tambahstorage()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Storage - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuaserver();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahStorage',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahstorage()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_storage');
			$ukuranstorage = $this->input->post('ukuranstorage');
			$tipestorage = $this->input->post('tipestorage');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverstorage');

			$data = array($server,$nama,$ukuranstorage,$tipestorage,$keterangan);
			$this->DatacenterModel->tambahstorage($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/storage');
		
    }
    
    public function ubahstorage($id_storage)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Storage - ';
		$data['option'] = $this->DatacenterModel->tampilsemuaserver();
        $data['ubahstorage'] = $this->DatacenterModel->ubahstorage($id_storage);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminStorageUbah',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahstorage()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_storage');
			$ukuranstorage = $this->input->post('ukuranstorage');
			$tipestorage = $this->input->post('tipestorage');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverstorage');
			$id_storage = $this->input->post('id_storage');
			

			$data = array($server,$nama,$ukuranstorage,$tipestorage,$keterangan,$id_storage);
			$this->DatacenterModel->ubahstorage1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/storage');
		
	}

}