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
		$data['tampiluser'] = $this->DatacenterModel->tampiljmluser();
		$data['tampilserver'] = $this->DatacenterModel->tampiljmlserver();
		$data['tampilvps'] = $this->DatacenterModel->tampiljmlvps();
		$data['tampilsistem'] = $this->DatacenterModel->tampiljmlsistem();
		$data['jmlram'] = $this->DatacenterModel->tampiljmlram();
		$data['jmlstorage'] = $this->DatacenterModel->tampiljmlstorage();
		$data['jmlkabel'] = $this->DatacenterModel->tampiljmlkabel();
		$data['jmlprosesor'] = $this->DatacenterModel->tampiljmlprosesor();


		$leveluser = $this->session->userdata('level_user');

		if ($leveluser == '1'){
			$this->load->view('ViewHeadAdmin',$judul);
			$this->load->view('ViewHomeAdmin',$data);
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

	public function ubahdataakun()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Data Akun - ';

		$id_user = $this->session->userdata('id_user');
		$data['tampilakun'] = $this->DatacenterModel->tampilakunadmin($id_user);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahData',$data);
		$this->load->view('ViewFooterAdmin');

	}

	public function prosesubahadminuser()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama_user = $this->input->post('nama_user');
			$email =$this->input->post('email');
			$photo = "logounsoedlp3m.png";
			$id_user = $this->input->post('id_user');
			

			$t=time();
			$file_name = str_replace('.','',$t);
			$config['upload_path']          = FCPATH.'/assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 1024; // 1MB
			$config['max_width']            = 1080;
			$config['max_height']           = 1080;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('avatar')) {
				$data['error'] = $this->upload->display_errors();
				$photo ='';
			} else {
				$uploaded_data = $this->upload->data();

				$photo = $uploaded_data['file_name'];
			}

			
			$data = array($username,$password,$nama_user,$email,$photo,$id_user);
			$this->DatacenterModel->ubahuseradmin1($data);
			$this->session->set_userdata('nama_user',$nama_user);
				
			redirect('Admin/ubahdataakun');
		
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
            $password = md5($this->input->post('password'));
            $nama_user = $this->input->post('nama_user');
			$email =$this->input->post('email');

			//$photo = "logounsoedlp3m.png";

			$level_user = $this->input->post('level_user');

			$t=time();
			$file_name = str_replace('.','',$t);
			$config['upload_path']          = FCPATH.'/assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 1024; // 1MB
			$config['max_width']            = 1080;
			$config['max_height']           = 1080;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('avatar')) {
				$data['error'] = $this->upload->display_errors();
				var_dump($data['error']);
			} else {
				$uploaded_data = $this->upload->data();

				$photo = $uploaded_data['file_name'];
			}

			

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
			

			$t=time();
			$file_name = str_replace('.','',$t);
			$config['upload_path']          = FCPATH.'/assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 1024; // 1MB
			$config['max_width']            = 9080;
			$config['max_height']           = 9080;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('avatar')) {
				$data['error'] = $this->upload->display_errors();
				$photo ='';
			} else {
				$uploaded_data = $this->upload->data();

				$photo = $uploaded_data['file_name'];
			}

			
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
			$server = $this->input->post('serverram');
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

	// Komponen kabel

	public function kabel()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Komponen Kabel - ';

		$data['tampilkabel'] = $this->DatacenterModel->tampilkabel();
		$data['tampil2'] = $this->DatacenterModel->tampilhistorykabel();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminKomponenKabel',$data);
		$this->load->view('ViewFooterAdmin');

    } 
    public function hapuskabel($id_kabel)
	{
        $this->load->model('DatacenterModel');

        $data['tampilkabel'] = $this->DatacenterModel->hapuskabel($id_kabel);

        redirect("Admin/kabel");
    } 

    public function tambahkabel()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Kabel - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuaserver();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahKabel',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahkabel()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_kabel');
			$jeniskabel = $this->input->post('jeniskabel');
			$kecepatankabel = $this->input->post('kecepatankabel');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverkabel');

			$data = array($server,$nama,$jeniskabel,$kecepatankabel,$keterangan);
			$this->DatacenterModel->tambahkabel($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/kabel');
		
    }
    
    public function ubahkabel($id_kabel)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Kabel - ';
		$data['option'] = $this->DatacenterModel->tampilsemuaserver();
        $data['ubahkabel'] = $this->DatacenterModel->ubahkabel($id_kabel);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminKabelUbah',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahkabel()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_kabel');
			$jeniskabel = $this->input->post('jeniskabel');
			$kecepatankabel = $this->input->post('kecepatankabel');
            $keterangan = $this->input->post('keterangan');
			$server = $this->input->post('serverkabel');
			$id_kabel = $this->input->post('id_kabel');
			

			$data = array($server,$nama,$jeniskabel,$kecepatankabel,$keterangan,$id_kabel);
			$this->DatacenterModel->ubahkabel1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/kabel');
		
	}

	public function ruangan()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Ruangan - ';

		$data['tampilruangan'] = $this->DatacenterModel->tampilsemuaruangan();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTampilRuangan',$data);
		$this->load->view('ViewFooterAdmin');

    }

	public function hapusruangan($id_ruangan)
	{
        $this->load->model('DatacenterModel');

        $data['tampilruangan'] = $this->DatacenterModel->hapusruangan($id_ruangan);

        redirect("Admin/ruangan");
    } 

	public function tambahruangan()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Ruangan - ';
		
        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahRuangan');
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahruangan()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_ruangan');

			$data = array($nama);
			$this->DatacenterModel->tambahruangan($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/ruangan');
		
    }

	public function ubahruangan($id_ruangan)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Ruangan - ';
        $data['ubahruangan'] = $this->DatacenterModel->ubahruangan($id_ruangan);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahRuangan',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahruangan()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_ruangan');
			$id_ruangan = $this->input->post('id_ruangan');
			

			$data = array($nama,$id_ruangan);
			$this->DatacenterModel->ubahruangan1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/ruangan');
		
	}

	public function lemari()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Lemari - ';

		$data['tampillemari'] = $this->DatacenterModel->tampiladminlemari();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTampilLemari',$data);
		$this->load->view('ViewFooterAdmin');

    }

	public function hapuslemari($id_lemari)
	{
        $this->load->model('DatacenterModel');

        $data['tampillemari'] = $this->DatacenterModel->hapuslemari($id_lemari);

        redirect("Admin/lemari");
    } 
	
	public function tambahlemari()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Lemari - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuaruangan();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahLemari',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahlemari()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_lemari');
			$slotrack = $this->input->post('slotrack');
			$ruangan = $this->input->post('ruanganlemari');

			$data = array($ruangan,$nama,$slotrack);
			$this->DatacenterModel->tambahlemari($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/lemari');
		
    }

	public function ubahlemari($id_lemari)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Lemari - ';
		$data['option'] = $this->DatacenterModel->tampilsemuaruangan();
        $data['ubahlemari'] = $this->DatacenterModel->ubahlemari($id_lemari);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahLemari',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahlemari()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_lemari');
			$slotrack = $this->input->post('slotrack');
			
			$ruangan = $this->input->post('ruanganlemari');
			$id_lemari = $this->input->post('id_lemari');
			

			$data = array($ruangan,$nama,$slotrack,$id_lemari);
			$this->DatacenterModel->ubahlemari1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/lemari');
		
	}


	public function rak()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Rak - ';

		$data['tampilrak'] = $this->DatacenterModel->tampiladminrak();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTampilRak',$data);
		$this->load->view('ViewFooterAdmin');

    }

	public function hapusrak($id_rak)
	{
        $this->load->model('DatacenterModel');

        $data['tampilrak'] = $this->DatacenterModel->hapusrak($id_rak);

        redirect("Admin/rak");
    } 

	public function tambahrak()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Rack - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemualemari();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahRak',$data);
		$this->load->view('ViewFooterAdmin');

    }

	public function ubahrak($id_rack)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Rack - ';
		$data['option'] = $this->DatacenterModel->tampilsemualemari();
        $data['ubahrak'] = $this->DatacenterModel->ubahrak($id_rack);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahRak',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahrak()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_rack');
			
			$lemari = $this->input->post('lemarirak');
			$id_rack = $this->input->post('id_rack');
			

			$data = array($lemari,$nama,$id_rack);
			$this->DatacenterModel->ubahrak1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/rak');
		
	}

    public function prosestambahrak()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_rack');
			
			$lemari = $this->input->post('lemarirack');

			$data = array($lemari,$nama);
			$this->DatacenterModel->tambahrak($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/rak');
		
    }


	public function server()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Server - ';

		$data['tampilserver'] = $this->DatacenterModel->tampiladminserver();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTampilServer',$data);
		$this->load->view('ViewFooterAdmin');

    }

	public function hapusserver($id_server)
	{
        $this->load->model('DatacenterModel');

        $data['tampilserver'] = $this->DatacenterModel->hapusserver($id_server);

        redirect("Admin/server");
    } 

	public function ubahserver($id_server)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Server - ';
		$data['option'] = $this->DatacenterModel->tampilsemuarack();
        $data['ubahserver'] = $this->DatacenterModel->ubahserver($id_server);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahServer',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahserver()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_server');
			
			$rack = $this->input->post('rakserver');
			$id_server = $this->input->post('id_server');
			

			$data = array($rack,$nama,$id_server);
			$this->DatacenterModel->ubahserver1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/server');
		
	}

	public function tambahserver()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Server - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuarack();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahServer',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahserver()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_server');
			
			$server = $this->input->post('rackserver');

			$data = array($server,$nama);
			$this->DatacenterModel->tambahserver($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/server');
		
    }

	public function vps()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data VPS - ';

		$data['tampilvps'] = $this->DatacenterModel->tampiladminvps();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTampilVps',$data);
		$this->load->view('ViewFooterAdmin');

    }

	
	public function hapusvps($id_vps)
	{
        $this->load->model('DatacenterModel');

        $data['tampilvps'] = $this->DatacenterModel->hapusvps($id_vps);

        redirect("Admin/vps");
    } 

	public function tambahvps()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah VPS - ';
		$data['tampilprosesor'] = $this->DatacenterModel->tampilprosesor();
		$data['tampilram'] = $this->DatacenterModel->tampilram();
		$data['tampilserver'] = $this->DatacenterModel->tampilsemuaserver();
		$data['tampiluser'] = $this->DatacenterModel->tampiluser();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahVps',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahvps()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$server = $this->input->post('vpsserver');
			$nama = $this->input->post('nama_vps');
			$prosesor = $this->input->post('vpsprosesor');
			$hdd = $this->input->post('ukuranhardisk');
			$ram = $this->input->post('vpsram');
			$os = $this->input->post('os');
			$user = $this->input->post('vpsuser');

			
			$data = array($server,$nama,$prosesor,$hdd,$ram,$os,$user);
			$this->DatacenterModel->tambahvps($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/vps');
		
    }

	public function ubahvps($id_vps)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah VPS - ';
		$data['option'] = $this->DatacenterModel->tampilsemuaserver();
		$data['option2'] = $this->DatacenterModel->tampilsemuaprosesor();
		$data['option3'] = $this->DatacenterModel->tampilsemuaram();
		$data['option4'] = $this->DatacenterModel->tampiluser();
        $data['ubahvps'] = $this->DatacenterModel->ubahvps($id_vps);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahVps',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahvps()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$server = $this->input->post('vpsserver');
			$nama = $this->input->post('nama_vps');
			$prosesor = $this->input->post('vpsprosesor');
			$hdd = $this->input->post('ukuranhardisk');
			$ram = $this->input->post('vpsram');
			$os = $this->input->post('os');
			$user = $this->input->post('vpsuser');
			$id_vps = $this->input->post('id_vps');

			
			$data = array($server,$nama,$prosesor,$hdd,$ram,$os,$user,$id_vps);
			$this->DatacenterModel->ubahvps1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/vps');
		
	}



	public function sistem()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Sistem - ';

		$data['tampilsistem'] = $this->DatacenterModel->tampiladminsistem();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTampilSistem',$data);
		$this->load->view('ViewFooterAdmin');

    }

	public function hapussistem($id_sistem)
	{
        $this->load->model('DatacenterModel');

        $data['tampilsistem'] = $this->DatacenterModel->hapussistem($id_sistem);

        redirect("Admin/sistem");
    } 

	public function tambahsistem()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Tambah Sistem - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuavps2();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTambahSistem',$data);
		$this->load->view('ViewFooterAdmin');

    }


    public function prosestambahsistem()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_sistem');
			$alamat_sistem = $this->input->post('alamat_sistem');
			$deskripsi = $this->input->post('deskripsi');
			$tahun = $this->input->post('tahun');
			$vps = $this->input->post('sistemvps');

			$data = array($vps,$nama,$alamat_sistem,$deskripsi,$tahun);
			$this->DatacenterModel->tambahsistem($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/sistem');
		
    }

	public function ubahsistem($id_sistem)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Ubah Sistem - ';
		$data['option'] = $this->DatacenterModel->tampilsemuavps();
        $data['ubahsistem'] = $this->DatacenterModel->ubahsistem($id_sistem);

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahSistem',$data);
		$this->load->view('ViewFooterAdmin');

    }
    
    public function prosesubahsistem()
	{
		    
		    $this->load->model('DatacenterModel');
		
			$nama = $this->input->post('nama_sistem');
			$alamat = $this->input->post('alamat');
			$deskripsi = $this->input->post('deskripsi');
			$tahun = $this->input->post('tahun');
			$vps = $this->input->post('sistemvps');
			$id_sistem = $this->input->post('id_sistem');
			

			$data = array($vps,$nama,$alamat,$deskripsi,$tahun,$id_sistem);
			$this->DatacenterModel->ubahsistem1($data);
			
			$this->session->set_flashdata('daftarberhasil','yes');		
			redirect('Admin/sistem');
		
	}


	public function log()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Data Log - ';

		$data['tampillog'] = $this->DatacenterModel->tampiladminlog();

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminTampilLog',$data);
		$this->load->view('ViewFooterAdmin');

    }

	public function hapuslog($id_log)
	{
        $this->load->model('DatacenterModel');

        $data['tampillog'] = $this->DatacenterModel->hapuslog($id_log);

        redirect("Admin/log");
    } 
	

	//END
}