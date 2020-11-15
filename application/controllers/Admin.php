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

        $this->load->view('ViewHeadAdmin',$judul);
		$this->load->view('ViewAdminUbahData');
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

}