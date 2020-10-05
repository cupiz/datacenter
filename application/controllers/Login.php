<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		//load model
				$this->load->helper('url');
                $this->load->helper('form');
	}

	public function index()
	{
        $this->load->model('DatacenterModel');

		$sess_id = $this->session->userdata('id_user');
		$leveluser = $this->session->userdata('level_user');

		if(!empty($sess_id))
		{
			if ($leveluser == '1'){
				redirect('Admin');
			}else if($leveluser == '2'){
				redirect('Teknisi');
			}
			
	 
		}else{
			$this->load->view('ViewHeadLogin');
			$this->load->view('ViewLogin');
			$this->load->view('ViewFooterLogin');     
		}    

        

    }

    public function ceklogin()
	{
		
        $username = $this->input->post('username');
		$password = $this->input->post('password');
        

            $this->load->model('DatacenterModel');

			$data = $this->DatacenterModel->ceklogin($username, $password);
            

			if($data == NULL){
				$this->session->set_flashdata('gagallogin','yes');
				redirect('Login/index');
			}else{
				$id_user = $this->DatacenterModel->cekiduser($username);
				$nama_user = $this->DatacenterModel->ceknamauser($id_user);
				$level_user = $this->DatacenterModel->cekleveluser($id_user);
				$this->session->set_userdata('id_user',$id_user);
				$this->session->set_userdata('nama_user',$nama_user);
				$this->session->set_userdata('username',$username);
				$this->session->set_userdata('level_user',$level_user);
				$this->session->set_flashdata('login','yes');
				$this->DatacenterModel->lastlogin($id_user);
                if ($level_user == '1'){
                redirect('Admin');
                }else if($level_user == '2'){
                redirect('Teknisi');
                }else{
				redirect('Login/index');	
				}
			}
	}

}