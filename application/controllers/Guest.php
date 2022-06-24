<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

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
		$judul['title'] = 'Beranda Guest - ';
		$data['tampilserver'] = $this->DatacenterModel->tampiljmlserver();
		$data['tampilvps'] = $this->DatacenterModel->tampiljmlvps();
		$data['tampilsistem'] = $this->DatacenterModel->tampiljmlsistem();
		$data['jmlram'] = $this->DatacenterModel->tampiljmlram();
		$data['jmlstorage'] = $this->DatacenterModel->tampiljmlstorage();
		$data['jmlkabel'] = $this->DatacenterModel->tampiljmlkabel();
		$data['jmlprosesor'] = $this->DatacenterModel->tampiljmlprosesor();

		$id_user = $this->session->userdata('id_user');

		$leveluser = $this->session->userdata('level_user');

		if ($leveluser == '3'){
			$this->load->view('ViewHeadGuest',$judul);
			$this->load->view('ViewGuest',$data);
			$this->load->view('ViewFooterGuest');
		}else if($leveluser == '1'){
			redirect('Admin');
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
	
	public function server()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Server - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuaserver();

        $this->load->view('ViewHeadGuest',$judul);
		$this->load->view('ViewGuestServer',$data);
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
		
		
		

        $this->load->view('ViewHeadGuest',$judul);
		$this->load->view('ViewGuestServerDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailsistem($id_sistem)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail Sistem - ';

		$data['tampil'] = $this->DatacenterModel->tampildetailsistem($id_sistem);
	
	
		
		
		

        $this->load->view('ViewHeadGuest',$judul);
		$this->load->view('ViewGuestSistemDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function vps()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'VPS - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuavps();

        $this->load->view('ViewHeadGuest',$judul);
		$this->load->view('ViewGuestVps',$data);
		$this->load->view('ViewFooterTeknisi');

	}

	public function detailvps($id_vps)
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Detail VPS - ';
		$data['tampil'] = $this->DatacenterModel->tampildetailvps($id_vps);
		$data['tampilnama'] = $this->DatacenterModel->tampilsemuavpsdetail($id_vps);
		$data['tampilprosesor'] = $this->DatacenterModel->tampilvpsprosesor($id_vps);

		

        $this->load->view('ViewHeadGuest',$judul);
		$this->load->view('ViewGuestVpsDetail',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	public function sistem()
	{
        $this->load->model('DatacenterModel');
		$judul['title'] = 'Sistem - ';
		$data['tampil'] = $this->DatacenterModel->tampilsemuasistem();

        $this->load->view('ViewHeadGuest',$judul);
		$this->load->view('ViewGuestSistem',$data);
		$this->load->view('ViewFooterTeknisi');

	}
	
	
	
	


     // END
}

?>