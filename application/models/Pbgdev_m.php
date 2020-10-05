<?php
	class Pbgdev_m extends CI_Model{


		//------- HOME ---------------//

		public function tampilkonfigurasi(){
		 	return $this->db->query("Select * from konfigurasi_web")->result();
		}
		public function tampilkategori(){
		 	return $this->db->query("Select * from kategori_proyek")->result();
		}
		public function tampilproyekall(){
		 	return $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek
		 							order by proyek.no_proyek DESC
		 							")->result();
		}
		public function tampilproyekhome($limit){
		 	return $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek
		 							order by proyek.no_proyek DESC LIMIT $limit
		 							")->result();
		}
		public function tampilproyek($limit, $start){

			//$this->db->limit($limit, $start);
			$query = $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							order by proyek.no_proyek DESC LIMIT $limit OFFSET $start");
 
	        if ($query->num_rows() > 0) 
	        {
	            foreach ($query->result() as $row) 
	            {
	                $data[] = $row;
	            }
	             
	            return $data;
	        }
	 
	        return false;

		}
		public function tampilproyektotal(){
			$data = $this->db->query("Select count(no_proyek) as total_proyek from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							order by proyek.no_proyek DESC");
		    foreach($data->result() as $row)
		    {
		     return $row->total_proyek;
		    }
		}
		public function tampilproyekfiter2(){
		 	return $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							order by proyek.no_proyek DESC LIMIT 15")->result();
		}
		public function tampilproyekfiter1(){
		 	return $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek
		 							where status_proyek = '2' 
		 							order by proyek.no_proyek DESC LIMIT 15")->result();
		}
		public function tampilproyekradius($radiusnya,$lat,$lng){
		 	return $this->db->query("Select *,
    ( 6371 * acos( cos( radians($lat) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( `lat` ) ) ) ) AS distance from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							HAVING distance <= $radiusnya
									ORDER BY distance ASC")->result();
		}
		
		public function tampilproyek2($nama_proyek,$lokasi_proyek,$kategori_proyek){
		 	return $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							where nama_proyek LIKE '%$nama_proyek%' 
		 							and proyek.no_kategori_proyek LIKE '%$kategori_proyek%' 
		 							and lokasi_proyek LIKE '%$lokasi_proyek%'
		 							order by proyek.no_proyek DESC
		 							LIMIT 10")->result();
		}
		public function tampilproyekkategori($limit, $start, $no_kategori_proyek){
			$query = $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							where proyek.no_kategori_proyek='$no_kategori_proyek'
		 							order by proyek.no_proyek DESC LIMIT $limit OFFSET $start");
 
	        if ($query->num_rows() > 0) 
	        {
	            foreach ($query->result() as $row) 
	            {
	                $data[] = $row;
	            }
	             
	            return $data;
	        }
	 
	        //return $data;

		}
		public function tampilproyekkategoritotal($no_kategori_proyek){
			$data = $this->db->query("Select count(no_proyek) as total_proyek from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							where proyek.no_kategori_proyek='$no_kategori_proyek'
		 							order by proyek.no_proyek DESC");
		    foreach($data->result() as $row)
		    {
		     return $row->total_proyek;
		    }
		}
		public function tampillokasi(){
		 	return $this->db->query("Select COUNT(*) as jml_lokasi, lokasi_proyek FROM proyek 
		 							GROUP BY lokasi_proyek ORDER BY jml_lokasi DESC LIMIT 4")->result();
		}
		public function tampilnamaweb(){  
			$data = $this->db->query("Select nama_web from konfigurasi_web");
		    foreach($data->result() as $row)
		    {
		     return $row->nama_web;
		    }
		 }
		 public function tampilnamaproyek($no_proyek){  
			$data = $this->db->query("Select nama_proyek from proyek where no_proyek='$no_proyek'");
		    foreach($data->result() as $row)
		    {
		     return $row->nama_proyek;
		    }
		 }
		 public function tampilproyeksatu($no_proyek){
		 	return $this->db->query("Select * from proyek 
		 							join pengembang on pengembang.no_pengembang=proyek.no_pengembang
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek 
		 							where no_proyek='$no_proyek'")->result();
		 }
		 public function tampillaporansatu($no_proyek){
		 	return $this->db->query("Select * from laporan JOIN pengguna on pengguna.no_pengguna=laporan.no_pengguna
		 							where no_proyek='$no_proyek' order by no_laporan DESC LIMIT 10")->result();
		 }
		 public function tampillaporanterbaru(){
		 	return $this->db->query("Select * from laporan JOIN pengguna on pengguna.no_pengguna=laporan.no_pengguna
		 							order by no_laporan DESC LIMIT 7")->result();
		 }
		 public function tampilfotoproyek($no_proyek){
		 	return $this->db->query("Select * from foto_proyek 
		 							where no_proyek='$no_proyek' LIMIT 6")->result();
		 }

		 public function simpantambahusulan($data){
			$this->db->query("insert into usulan values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");
		 }
		 public function simpantambahlaporan($data){
			$this->db->query("insert into laporan values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')");
		 }

		 public function cekemailada($email_pengguna){  
			$data = $this->db->query("Select email_pengguna from pengguna where email_pengguna='$email_pengguna'");
		    foreach($data->result() as $row)
		    {
		     return $row->email_pengguna;
		    }
		 }
		 public function ceknikada($nik_pengguna){  
			$data = $this->db->query("Select no_pengguna from pengguna where no_pengguna='$nik_pengguna'");
		    foreach($data->result() as $row)
		    {
		     return $row->no_pengguna;
		    }
		 }
		 public function simpanpendaftar($data){
			$this->db->query("insert into pengguna values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')");
		}
		public function cekemail($verify){  
			$data = $this->db->query("Select email_pengguna from pengguna where status_pengguna='$verify'");
		    foreach($data->result() as $row)
		    {
		     return $row->email_pengguna;
		    }
		 }
		 public function verify($verify){  

		  $sql = "update pengguna set status_pengguna='EMAIL SUKSES' WHERE status_pengguna=?";
		  $this->db->query($sql, array($verify));
		  return $this->db->affected_rows(); 
		 }
		 public function verifikasiakun($no_pengguna,$file){  
		 	$this->db->query("update pengguna set status_pengguna='TERVERIFIKASI', foto_verif_pengguna='$file' WHERE no_pengguna='$no_pengguna'");
		 }

		 //---AKUN--//

		 public function ceklogin($email, $password){

		   $data = $this->db->query("Select email_pengguna from pengguna where email_pengguna='$email' and
		   							password_pengguna='$password' and (status_pengguna='TERVERIFIKASI' OR status_pengguna='EMAIL SUKSES')");
		   
		   foreach($data->result() as $row)
		   {
		    return $row->email_pengguna;
		   }

		 }

		 public function ceknomorpengguna($email){
		   $data = $this->db->query("Select no_pengguna from pengguna where email_pengguna='$email'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_pengguna;
		   }
		 }
		 public function ceknamapengguna($no_pengguna){
		   $data = $this->db->query("Select nama_pengguna from pengguna where no_pengguna='$no_pengguna'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_pengguna;
		   }
		 }
		 public function cekstatuspengguna($no_pengguna){
		   $data = $this->db->query("Select status_pengguna from pengguna where no_pengguna='$no_pengguna'");
		   foreach($data->result() as $row)
		   {
		    return $row->status_pengguna;
		   }
		 }

		 public function tampillaporan2($no_pengguna){
		 	return $this->db->query("Select * from laporan JOIN pengguna on pengguna.no_pengguna=laporan.no_pengguna
		 							join proyek on proyek.no_proyek=laporan.no_proyek
		 							where laporan.no_pengguna='$no_pengguna' LIMIT 2")->result();
		 }
		 public function tampilusulan2($no_pengguna){
		 	return $this->db->query("Select * from usulan JOIN pengguna on pengguna.no_pengguna=usulan.no_pengguna
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=usulan.no_kategori_proyek
		 							where usulan.no_pengguna='$no_pengguna' LIMIT 2")->result();
		 }
		 public function tampilusulansemua($no_pengguna){
		 	return $this->db->query("Select * from usulan JOIN pengguna on pengguna.no_pengguna=usulan.no_pengguna
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=usulan.no_kategori_proyek
		 							where usulan.no_pengguna='$no_pengguna' LIMIT 10")->result();
		 }
		 public function tampillaporansemua($no_pengguna){
		 	return $this->db->query("Select * from laporan JOIN pengguna on pengguna.no_pengguna=laporan.no_pengguna
		 							join proyek on proyek.no_proyek=laporan.no_proyek
		 							where laporan.no_pengguna='$no_pengguna' LIMIT 10")->result();
		 }
		 public function tampilakun($no_pengguna){
		 	return $this->db->query("Select * from pengguna
		 							where no_pengguna='$no_pengguna'")->result();
		 }



		 //---PENGEMBANG---//

		 public function cekloginpengembang($kode_pengembang, $password){
		   $this->db->select('kode_pengembang, password_pengembang');
		   $this->db->from('pengembang');
		   $this->db->where('kode_pengembang', $kode_pengembang);
		   $this->db->where('password_pengembang', $password);
		 
		   $query = $this->db->get();
		 
		   return $query->num_rows();
		 }

		 public function ceknomorpengembang($kode_pengembang){
		   $data = $this->db->query("Select no_pengembang from pengembang where kode_pengembang='$kode_pengembang'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_pengembang;
		   }
		 }
		 public function ceknamapengembang($no_pengembang){
		   $data = $this->db->query("Select nama_pengembang from pengembang where no_pengembang='$no_pengembang'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_pengembang;
		   }
		 }
		 public function tampillaporan3($no_pengembang){
		 	return $this->db->query("Select * from laporan JOIN pengguna on pengguna.no_pengguna=laporan.no_pengguna
		 							join proyek on proyek.no_proyek=laporan.no_proyek
		 							where proyek.no_pengembang='$no_pengembang' LIMIT 5")->result();
		 }
		 public function tampilproyek3($no_pengembang){
		 	return $this->db->query("Select * from proyek join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek
		 							where no_pengembang='$no_pengembang' LIMIT 5")->result();
		 }
		 public function tampilproyeksemua($no_pengembang){
		 	return $this->db->query("Select * from proyek join kategori_proyek on kategori_proyek.no_kategori_proyek=proyek.no_kategori_proyek
		 							where no_pengembang='$no_pengembang' LIMIT 10")->result();
		 }
		 public function tampilproyeksemua2($no_pengembang){
		 	return $this->db->query("Select * from proyek where no_pengembang='$no_pengembang'")->result();
		 }
		 public function tampilakunpengembang($no_pengembang){
		 	return $this->db->query("Select * from pengembang
		 							where no_pengembang='$no_pengembang'")->result();
		 }






		 //---PETUGAS---//

		 public function cekloginpetugas($email_petugas, $password){
		   $this->db->select('email_petugas, password_petugas');
		   $this->db->from('petugas');
		   $this->db->where('email_petugas', $email_petugas);
		   $this->db->where('password_petugas', $password);
		 
		   $query = $this->db->get();
		 
		   return $query->num_rows();
		 }

		 public function ceknomorpetugas($email_petugas){
		   $data = $this->db->query("Select no_petugas from petugas where email_petugas='$email_petugas'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_petugas;
		   }
		 }
		 public function ceknamapetugas($no_petugas){
		   $data = $this->db->query("Select nama_petugas from petugas where no_petugas='$no_petugas'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_petugas;
		   }
		 }
		 public function tampillaporansm($jmllimit){
		 	return $this->db->query("Select * from laporan JOIN pengguna on pengguna.no_pengguna=laporan.no_pengguna
		 							join proyek on proyek.no_proyek=laporan.no_proyek
		 							order by no_laporan DESC LIMIT $jmllimit")->result();
		 }
		 public function tampilusulansm($jmllimit){
		 	return $this->db->query("Select * from usulan JOIN pengguna on pengguna.no_pengguna=usulan.no_pengguna
		 							join kategori_proyek on kategori_proyek.no_kategori_proyek=usulan.no_kategori_proyek
		 							order by no_usulan DESC LIMIT $jmllimit")->result();
		 }
		 





























		public function tampilconfig(){
		 	return $this->db->query("Select * from config")->result();
		}
		public function tampilinfo(){
		 	return $this->db->query("Select * from informasi order by no_informasi desc LIMIT 10")->result();
		}
		public function tampilriwayat(){
		 	return $this->db->query("Select * from pendaftar join jadwalscreen on jadwalscreen.email=pendaftar.email order by no desc LIMIT 10")->result();
		}
		
		
		 
		 public function cekwaktuakhir(){  
			$data = $this->db->query("Select jamwaktu from jadwalscreen order by jamwaktu DESC LIMIT 1");
		    foreach($data->result() as $row)
		    {
		     return $row->jamwaktu;
		    }
		 }
		 public function simpanjadwal($email,$stamp){
			$this->db->query("insert into jadwalscreen values('','$email','$stamp')");
		}
		public function tampiljadwal($email){
		 	return $this->db->query("Select * from jadwalscreen join pendaftar on pendaftar.email=jadwalscreen.email where pendaftar.email='$email'")->result();
		}
		public function tampiljadwal1($email){
		 	$query = $this->db->query("Select * from jadwalscreen join pendaftar on pendaftar.email=jadwalscreen.email where pendaftar.email='$email'");
		 	return $query->num_rows();
		}
		
		 public function tampilpendaftar(){
		 	return $this->db->query("Select * from  pendaftar join jadwalscreen on pendaftar.email=jadwalscreen.email")->result();
		}
		
		
		public function keputusanterima($no){
		 	$this->db->query("update pendaftar set status='1' where no='$no'");
		}
		public function keputusantolak($no){
		 	$this->db->query("update pendaftar set status='2' where no='$no'");
		}





		
		public function tampilagen($no_agen){
		 	return $this->db->query("Select * from agen where no_agen='$no_agen'")->result();
		}
		public function tampilslide(){
		 	return $this->db->query("Select * from slide")->result();
		}
		public function tampillayananlimit3(){
		 	return $this->db->query("Select * from produk_layanan LIMIT 3")->result();
		}
		public function tampillayanan(){
		 	return $this->db->query("Select * from produk_layanan")->result();
		}
		public function tampilkerjasamalimit6(){
		 	return $this->db->query("Select * from kerjasama LIMIT 6")->result();
		}
		public function tampilkerjasama(){
		 	return $this->db->query("Select * from kerjasama")->result();
		}
		public function tampiltestimonilimit4(){
		 	return $this->db->query("Select * from testimoni join agen on agen.no_agen=testimoni.no_agen LIMIT 4")->result();
		}
		public function tampiltestimoni(){
		 	return $this->db->query("Select * from testimoni join agen on agen.no_agen=testimoni.no_agen")->result();
		}
		public function tampilproduklimit4(){
		 	return $this->db->query("Select * from produk LIMIT 4")->result();
		}
		public function tampilproduklimit4desc(){
		 	return $this->db->query("Select * from produk order by no_produk desc LIMIT 4")->result();
		}
		public function tampilproduklimit12(){
		 	return $this->db->query("Select * from produk LIMIT 12")->result();
		}
		public function tampilprodukall(){
		 	return $this->db->query("Select * from produk LIMIT 12")->result();
		}
		public function tampilproduk1($no_produk){
		 	return $this->db->query("Select * from produk join kategori_produk on kategori_produk.no_kategori_produk = produk.no_kategori_produk where no_produk='$no_produk'")->result();
		}
		
		public function prosesdaftar($data){
			$this->db->query("insert into agen values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','','0')");
		}
		public function cekmasuk($username, $password)
		{
		   $this->db->select('kode_agen, kata_sandi');
		   $this->db->from('agen');
		   $this->db->where('kode_agen', $username);
		   $this->db->where('kata_sandi', $password);
		   $this->db->where('status_agen', '1');
		 
		   $query = $this->db->get();
		 
		   return $query->num_rows();
		}
		public function cekmasukpetugas($username, $password)
		{
		   $this->db->select('kode_petugas, kata_sandi');
		   $this->db->from('petugas');
		   $this->db->where('kode_petugas', $username);
		   $this->db->where('kata_sandi', $password);
		 
		   $query = $this->db->get();
		 
		   return $query->num_rows();
		}
		public function ceknamaagen($username)
		{
		   $data = $this->db->query("Select nama_agen from agen where kode_agen='$username'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_agen;
		   }
		}
		public function ceknoagen($username)
		{
		   $data = $this->db->query("Select no_agen from agen where kode_agen='$username'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_agen;
		   }
		}
		public function cekfotoagen($username)
		{
		   $data = $this->db->query("Select foto_agen from agen where kode_agen='$username'");
		   foreach($data->result() as $row)
		   {
		    return $row->foto_agen;
		   }
		}
		public function cekfotoagen2($no_agen)
		{
		   $data = $this->db->query("Select foto_agen from agen where no_agen='$no_agen'");
		   foreach($data->result() as $row)
		   {
		    return $row->foto_agen;
		   }
		}
		public function tampilfotopromo()
		{
		   $data = $this->db->query("Select promopic from config");
		   foreach($data->result() as $row)
		   {
		    return $row->promopic;
		   }
		}

		public function totalproduk_u()
		{
		   $data = $this->db->query("Select count(no_produk) as totalproduk from produk");
		   foreach($data->result() as $row)
		   {
		    return $row->totalproduk;
		   }
		}
		public function totalpemesanan()
		{
		   $data = $this->db->query("Select sum(jml_produk) as totalpemesanan from pemesanan WHERE MONTH(tgl_pemesanan) = MONTH(CURRENT_DATE()) and status_pemesanan='2'");
		   foreach($data->result() as $row)
		   {
		    return $row->totalpemesanan;
		   }
		}
		public function totalpemesanan2()
		{
		   $data = $this->db->query("Select count(no_pemesanan) as no_pemesanan from pemesanan WHERE MONTH(tgl_pemesanan) = MONTH(CURRENT_DATE()) and status_pemesanan='2'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_pemesanan;
		   }
		}
		public function totalpemesanan_u($no_agen)
		{
		   $data = $this->db->query("Select count(no_pemesanan) as totalpemesanan from pemesanan WHERE MONTH(tgl_pemesanan) = MONTH(CURRENT_DATE()) and no_agen='$no_agen'");
		   foreach($data->result() as $row)
		   {
		    return $row->totalpemesanan;
		   }
		}
		public function totalpemesanan2_u($no_agen)
		{
		   $data = $this->db->query("Select count(no_pemesanan) as totalpemesanan from pemesanan WHERE YEAR(tgl_pemesanan) = YEAR(CURRENT_DATE()) and no_agen='$no_agen'");
		   foreach($data->result() as $row)
		   {
		    return $row->totalpemesanan;
		   }
		}
		public function totalagen()
		{
		   $data = $this->db->query("Select count(no_agen) as totalagen from agen");
		   foreach($data->result() as $row)
		   {
		    return $row->totalagen;
		   }
		}
		public function tampilpemesanan_u($no_agen){
		 	return $this->db->query("Select * from pemesanan where no_agen='$no_agen' order by tgl_pemesanan DESC")->result();
		}
		public function tampilprodukpesanan1($no_pemesanan){
		 	return $this->db->query("Select * from pemesanan join pemesanan_detail on pemesanan_detail.no_pemesanan=pemesanan.no_pemesanan join produk on produk.no_produk=pemesanan_detail.no_produk where pemesanan.no_pemesanan='$no_pemesanan'")->result();
		}
		public function tampilpesanan1($no_pemesanan){
		 	return $this->db->query("Select * from pemesanan where no_pemesanan='$no_pemesanan'")->result();
		}
		
		public function tampilpemesananselesai_u($no_agen){
		 	return $this->db->query("Select * from pemesanan where no_agen='$no_agen' and status_pemesanan='2' order by tgl_pemesanan DESC")->result();
		}

		public function tampilproduklimit($limit){
		 	return $this->db->query("Select * from produk order by no_produk desc LIMIT $limit")->result();
		}
		public function editprofil($no_agen, $data){
			$this->db->where("no_agen",$no_agen);
			$this->db->update("agen",$data);
		}


		public function cekpasslama($no_agen,$passlama2)
		{
		   $this->db->select('no_agen');
		   $this->db->from('agen');
		   $this->db->where('no_agen', $no_agen);
		   $this->db->where('kata_sandi', $passlama2);
		 
		   $query = $this->db->get();
		 
		   return $query->num_rows();
		}
		public function editpass($no_agen,$passbaru2){
		 	$this->db->query("update agen set kata_sandi='$passbaru2' where no_agen='$no_agen'");
		}

		//--pemesanan
		public function ceknamaproduk($z)
		{
		   $data = $this->db->query("Select nama_produk from produk where no_produk='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_produk;
		   }
		}
		public function cekhargaproduk($z)
		{
		   $data = $this->db->query("Select harga from produk where no_produk='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->harga;
		   }
		}
		public function cekjmlproduk($no_agen)
		{
		   $data = $this->db->query("Select sum(jml) as jml_produk from pemesanan_temp where no_agen='$no_agen'");
		   foreach($data->result() as $row)
		   {
		    return $row->jml_produk;
		   }
		}
		public function simpanproduktemp($data){
			$this->db->query("insert into pemesanan_temp values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')");
		}


		public function tampilproduktemp($no_agen){
		 	return $this->db->query("Select * from pemesanan_temp where no_agen='$no_agen'")->result();
		}

		public function hapusproduktemp($z,$no_agen){
		 	$this->db->query("delete from pemesanan_temp where no_produk='$z' and no_agen='$no_agen'");
		}

		public function simpanpemesanan($data){
			$no_agen = $data[1];
			$tgl = $data[0];
			
			$this->db->query("insert into pemesanan values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','0')");

			$data2 = $this->db->query("Select max(no_pemesanan) as no_pemesanan from pemesanan where no_agen='$no_agen' order by no_pemesanan DESC");
		   	foreach($data2->result() as $row2)
		   	{
		    	$no_pemesanan_akhir = $row2->no_pemesanan;
		   	}
		   	
			$data = $this->db->query("select * from pemesanan_temp where no_agen='$no_agen'");
			   foreach($data->result() as $row)
			   {
			   		$no_produk = $row->no_produk;
			   		$jumlah = $row->jml;
			    	$this->db->query("insert into pemesanan_detail values('$tgl','$no_pemesanan_akhir','$no_produk','$jumlah')");
			   }
			  
			$this->db->query("delete from pemesanan_temp where no_agen='$no_agen'");

			redirect('keagenan');
			
		}
		
		public function ceknoakses($username)
		{
		   $data = $this->db->query("Select akses from petugas where kode_petugas='$username'");
		   foreach($data->result() as $row)
		   {
		    return $row->akses;
		   }
		}
		public function pemesananterbaru(){
		 	return $this->db->query("Select * from pemesanan join agen on agen.no_agen=pemesanan.no_agen order by tgl_pemesanan DESC LIMIT 10")->result();
		}
		public function pemesananterbaru1(){
		 	return $this->db->query("Select * from pemesanan join agen on agen.no_agen=pemesanan.no_agen order by tgl_pemesanan DESC LIMIT 100")->result();
		}
		public function pemesananselesai(){
		 	return $this->db->query("Select * from pemesanan join agen on agen.no_agen=pemesanan.no_agen where status_pemesanan='2' order by tgl_pemesanan DESC LIMIT 100")->result();
		}
		public function pemesanangagal(){
		 	return $this->db->query("Select * from pemesanan join agen on agen.no_agen=pemesanan.no_agen where status_pemesanan='3' order by tgl_pemesanan DESC LIMIT 100")->result();
		}
		public function proses($no_pemesanan){
		 	$this->db->query("update pemesanan set status_pemesanan='1' where no_pemesanan='$no_pemesanan'");
		}
		public function prosesselesai($no_pemesanan){
		 	$this->db->query("update pemesanan set status_pemesanan='2' where no_pemesanan='$no_pemesanan'");
		}
		public function batal($no_pemesanan){
		 	$this->db->query("update pemesanan set status_pemesanan='3' where no_pemesanan='$no_pemesanan'");
		}
		public function totalpendapatanbulan()
		{
		   $data = $this->db->query("Select sum(total_harga) as total_harga from pemesanan WHERE MONTH(tgl_pemesanan) = MONTH(CURRENT_DATE()) and status_pemesanan='2'");
		   foreach($data->result() as $row)
		   {
		    return $row->total_harga;
		   }
		}


		public function tampilproduk(){
		 	return $this->db->query("Select * from produk join kategori_produk on kategori_produk.no_kategori_produk=produk.no_kategori_produk LIMIT 100")->result();
		}
		public function tampilproduksatu($no_produk){
		 	return $this->db->query("Select * from produk join kategori_produk on kategori_produk.no_kategori_produk=produk.no_kategori_produk where no_produk='$no_produk'")->result();
		}
	
		public function simpanproduk($data){
			$this->db->query("insert into produk values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')");
		}
		public function simpanubahproduk($no_produk, $data){
			$this->db->where("no_produk",$no_produk);
			$this->db->update("produk",$data);
		}
		public function hapusproduk($no_produk){
			$this->db->delete("produk",array("no_produk"=> $no_produk));
		}

		public function tampilkategorisatu($no_kategori_produk){
		 	return $this->db->query("Select * from kategori_produk where no_kategori_produk='$no_kategori_produk'")->result();
		}
	
		public function simpankategori($data){
			$this->db->query("insert into kategori_produk values('','$data[0]')");
		}
		public function simpanubahkategori($no_kategori_produk, $data){
			$this->db->where("no_kategori_produk",$no_kategori_produk);
			$this->db->update("kategori_produk",$data);
		}
		public function hapuskategori($no_kategori_produk){
			$this->db->delete("kategori_produk",array("no_kategori_produk"=> $no_kategori_produk));
		}


		//--------------
		public function tampilagenall(){
		 	return $this->db->query("Select * from agen LIMIT 100")->result();
		}
		public function hapusagen($no_agen){
			$this->db->delete("agen",array("no_agen"=> $no_agen));
		}


		//-----------------
		public function tampilpetugas(){
		 	return $this->db->query("Select * from petugas LIMIT 100")->result();
		}
		public function tampilpetugassatu($no_petugas){
		 	return $this->db->query("Select * from petugas where no_petugas='$no_petugas'")->result();
		}

		public function simpanpetugas($data){
			$this->db->query("insert into petugas values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','0')");
		}
		public function simpanubahpetugas($no_petugas, $data){
			$this->db->where("no_petugas",$no_petugas);
			$this->db->update("petugas",$data);
		}
		public function hapuspetugas($no_petugas){
			$this->db->delete("petugas",array("no_petugas"=> $no_petugas));
		}
		public function cekpetugas($kode_petugas)
		{
		   $data = $this->db->query("Select kode_petugas from petugas where kode_petugas='$kode_petugas'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_petugas;
		   }
		}



		public function tampilkerjasamaall(){
		 	return $this->db->query("Select * from kerjasama LIMIT 100")->result();
		}
		public function tampilkerjasamasatu($no_kerjasama){
		 	return $this->db->query("Select * from kerjasama where no_kerjasama='$no_kerjasama'")->result();
		}

		public function simpankerjasama($data){
			$this->db->query("insert into kerjasama values('','$data[0]','$data[1]','$data[2]')");
		}
		public function simpanubahkerjasama($no_kerjasama, $data){
			$this->db->where("no_kerjasama",$no_kerjasama);
			$this->db->update("kerjasama",$data);
		}
		public function hapuskerjasama($no_kerjasama){
			$this->db->delete("kerjasama",array("no_kerjasama"=> $no_kerjasama));
		}


		//--------------
		public function tampiltestimoniall(){
		 	return $this->db->query("Select * from testimoni join agen on agen.no_agen=testimoni.no_agen LIMIT 100")->result();
		}
		public function hapustestimoni($no_testimoni){
			$this->db->delete("testimoni",array("no_testimoni"=> $no_testimoni));
		}


		//---------------
		public function tampillayananall(){
		 	return $this->db->query("Select * from produk_layanan LIMIT 100")->result();
		}
		public function tampillayanansatu($no_produk_layanan){
		 	return $this->db->query("Select * from produk_layanan where no_produk_layanan='$no_produk_layanan'")->result();
		}

		public function simpanlayanan($data){
			$this->db->query("insert into produk_layanan values('','$data[0]','$data[1]','$data[2]')");
		}
		public function simpanubahlayanan($no_produk_layanan, $data){
			$this->db->where("no_produk_layanan",$no_produk_layanan);
			$this->db->update("produk_layanan",$data);
		}
		public function hapuslayanan($no_produk_layanan){
			$this->db->delete("produk_layanan",array("no_produk_layanan"=> $no_produk_layanan));
		}



		//-----------------
		public function tampilslideall(){
		 	return $this->db->query("Select * from slide LIMIT 100")->result();
		}
		public function tampilslidesatu($no_slide){
		 	return $this->db->query("Select * from slide where no_slide='$no_slide'")->result();
		}

		public function simpanslide($data){
			$this->db->query("insert into slide values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");
		}
		public function simpanubahslide($no_slide, $data){
			$this->db->where("no_slide",$no_slide);
			$this->db->update("slide",$data);
		}
		public function hapusslide($no_slide){
			$this->db->delete("slide",array("no_slide"=> $no_slide));

		}



		//-----------------
	
		public function tampiltentangsatu(){
		 	return $this->db->query("Select * from tentang")->result();
		}

		public function simpanubahtentang($no_tentang, $data){
			$this->db->where("no_tentang",$no_tentang);
			$this->db->update("tentang",$data);
		}

		//-----------------
	
		public function tampilconfigsatu(){
		 	return $this->db->query("Select * from config")->result();
		}

		public function simpanubahconfig($no_config, $data){
			$this->db->where("no_config",$no_config);
			$this->db->update("config",$data);
		}





































		
		public function tampilnull(){
		 	return $this->db->query("Select * from petugas where nama_petugas='ZONK'")->result();
		}
	

		public function cekmasukdokter($kode, $pin)
		{
		   $this->db->select('kode_dokter, pin');
		   $this->db->from('dokter');
		   $this->db->where('kode_dokter', $kode);
		   $this->db->where('pin', $pin);
		 
		   $query = $this->db->get();
		 
		   return $query->num_rows();
		}

		//OBAT
		//-----------
		public function tampilobat(){
		 	return $this->db->query("Select * from obat LIMIT 7")->result();
		}
		public function tampilobatall(){
		 	return $this->db->query("Select nama_obat, kode_obat from obat")->result();
		}
		public function tampilobatallz(){
		 	return $this->db->query("Select * from obat")->result();
		}
		public function tampilobat1($kode_obat){
		 	return $this->db->query("Select * from obat where kode_obat='$kode_obat'")->result();
		}
		public function getdataobat($kode_obat){
		 	return $this->db->query("Select harga_beli_obat from obat where kode_obat='$kode_obat'")->result();
		}
		public function hapusobat($kode_obat){
			$this->db->delete("obat",array("kode_obat"=> $kode_obat));
		}
		public function editobat($kode_obat, $data){
			$this->db->where("kode_obat",$kode_obat);
			$this->db->update("obat",$data);
		}
		public function tambahobat($data){
			$this->db->query("insert into obat values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')");
		}
		public function tampilobatseringdipakai(){

		 	return $this->db->query("select apotik_detail.kode_obat, obat.nama_obat, obat.tanggal_kadaluarsa, obat.harga_jual_obat, count(apotik_detail.kode_obat) AS jumlah FROM apotik_detail join obat on apotik_detail.kode_obat=obat.kode_obat WHERE apotik_detail.tanggal_reg > DATE_SUB( now( ) , INTERVAL 2 MONTH ) GROUP BY apotik_detail.kode_obat ORDER BY jumlah DESC LIMIT 3")->result();
		}

		public function tampilobatkadaluarsa(){

		 	return $this->db->query("select * FROM `obat` WHERE (`tanggal_kadaluarsa` BETWEEN CURDATE() AND DATE_ADD(NOW(), INTERVAL 1 MONTH)) OR tanggal_kadaluarsa < CURDATE()")->result();
		}public function tampilobatstokabis(){

		 	return $this->db->query("select * FROM `obat` WHERE stok < 20")->result();
		}
		public function cekkodeobat($z)
		{
		   $data = $this->db->query("Select kode_obat from obat where kode_obat='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_obat;
		   }
		}
		
		//Suppliyer
		//-----------
		public function tampilsuppliyer(){
		 	return $this->db->query("Select * from suppliyer LIMIT 7")->result();
		}
		public function tampilsuppliyerall(){
		 	return $this->db->query("Select nama_suppliyer, kode_suppliyer from suppliyer")->result();
		}
		public function tampilsuppliyer1($kode_suppliyer){
		 	return $this->db->query("Select * from suppliyer where kode_suppliyer='$kode_suppliyer'")->result();
		}
		public function hapussuppliyer($kode_suppliyer){
			$this->db->delete("suppliyer",array("kode_suppliyer"=> $kode_suppliyer));
		}
		public function editsuppliyer($kode_suppliyer, $data){
			$this->db->where("kode_suppliyer",$kode_suppliyer);
			$this->db->update("suppliyer",$data);
		}
		public function tambahsuppliyer($data){
			$this->db->query("insert into suppliyer values('$data[0]','$data[1]','$data[2]','$data[3]')");
		}
		public function cekkodesuppliyer($z)
		{
		   $data = $this->db->query("Select kode_suppliyer from suppliyer where kode_suppliyer='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_suppliyer;
		   }
		}

		//Pemasokan
		//-----------
		public function tampilpemasokan(){
		 	return $this->db->query("Select * from pemasokan LIMIT 7")->result();
		}
		public function tampilpemasokanall(){
		 	return $this->db->query("Select pemasokan.tanggal_masuk, suppliyer.nama_suppliyer, pemasokan.tanggal_reg from pemasokan join obat on obat.kode_obat=pemasokan.kode_obat join suppliyer on suppliyer.kode_suppliyer=pemasokan.kode_suppliyer join petugas on petugas.kode_petugas=pemasokan.kode_petugas")->result();
		}
		public function tampilpemasokan1($tanggal_reg){
		 	return $this->db->query("Select * from pemasokan join obat on obat.kode_obat=pemasokan.kode_obat join suppliyer on suppliyer.kode_suppliyer=pemasokan.kode_suppliyer join petugas on petugas.kode_petugas=pemasokan.kode_petugas where tanggal_reg='$tanggal_reg'")->result();
		}
		public function hapuspemasokan($tanggal_reg){
			$this->db->delete("pemasokan",array("tanggal_reg"=> $tanggal_reg));
		}
		public function editpemasokan($tanggal_reg, $data){
			$this->db->where("tanggal_reg",$tanggal_reg);
			$this->db->update("pemasokan",$data);
		}
		public function tambahpemasokan($data,$kode_obat,$jumlah_obat_masuk){
			$this->db->query("insert into pemasokan values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')");

			$data = $this->db->query("Select stok from obat where kode_obat='$kode_obat'");
			foreach($data->result() as $k){
				$stoksekarang = $k->stok;
			}
			   
			   $stokupdate = $stoksekarang + $jumlah_obat_masuk;

			$this->db->query("update obat set stok='$stokupdate' where kode_obat='$kode_obat'");
		}
		public function tampilpetugasallapt(){
		 	return $this->db->query("Select nama_petugas, kode_petugas from petugas where MID(kode_petugas,1,2)='AP'")->result();
		}




		//Ruangan
		//-----------
		
		public function tampilruanganall(){
		 	return $this->db->query("Select nama_ruangan, kode_ruangan from ruangan")->result();
		}
		public function tampilruangan1($kode_ruangan){
		 	return $this->db->query("Select * from ruangan where kode_ruangan='$kode_ruangan'")->result();
		}
		public function hapusruangan($kode_ruangan){
			$this->db->delete("ruangan",array("kode_ruangan"=> $kode_ruangan));
		}
		public function editruangan($kode_ruangan, $data){
			$this->db->where("kode_ruangan",$kode_ruangan);
			$this->db->update("ruangan",$data);
		}
		public function tambahruangan($data){
			$this->db->query("insert into ruangan values('$data[0]','$data[1]','$data[2]')");
		}
		public function cekkoderuangan($z)
		{
		   $data = $this->db->query("Select kode_ruangan from ruangan where kode_ruangan='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_ruangan;
		   }
		}
		public function cekkoderuangan2($no_pemeriksaan_ri)
		{
		   $data = $this->db->query("Select kode_ruangan from rawat_inap where no_pemeriksaan_rawat_inap='$no_pemeriksaan_ri'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_ruangan;
		   }
		}
		public function cektindakantemp($no_pemeriksaan_ri)
		{
		   $data = $this->db->query("select * from rawat_inap_pemeriksaan_tindakan where no_pemeriksaan_rawat_inap='$no_pemeriksaan_ri'");
		   return $data->num_rows();
		}


		//Kebutuhan/Fasilitas
		//-----------
		public function tampilkebutuhan(){
		 	return $this->db->query("Select * from kebutuhan_lain LIMIT 7")->result();
		}
		
		public function tampilkebutuhan1($kode_kebutuhan){
		 	return $this->db->query("Select * from kebutuhan_lain where kode_kebutuhan='$kode_kebutuhan'")->result();
		}
		public function hapuskebutuhan($kode_kebutuhan){
			$this->db->delete("kebutuhan_lain",array("kode_kebutuhan"=> $kode_kebutuhan));
		}
		public function editkebutuhan($kode_kebutuhan, $data){
			$this->db->where("kode_kebutuhan",$kode_kebutuhan);
			$this->db->update("kebutuhan_lain",$data);
		}
		public function tambahkebutuhan($data){
			$this->db->query("insert into kebutuhan_lain values('$data[0]','$data[1]','$data[2]')");
		}
		public function cekkodekebutuhan($z)
		{
		   $data = $this->db->query("Select kode_kebutuhan from kebutuhan_lain where kode_kebutuhan='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_kebutuhan;
		   }
		}


		
		public function tampilpetugasall(){
		 	return $this->db->query("Select nama_petugas, kode_petugas from petugas")->result();
		}
		public function tampilpetugas1($kode_petugas){
		 	return $this->db->query("Select * from petugas where kode_petugas='$kode_petugas'")->result();
		}
		
		public function editpetugas($kode_petugas, $data){
			$this->db->where("kode_petugas",$kode_petugas);
			$this->db->update("petugas",$data);
		}
		public function tambahpetugas($data){
			$this->db->query("insert into petugas values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]')");
		}
		
		public function ceknopetugastrakhir($kode_jabatan){
		 	  $data = $this->db->query("Select MAX(RIGHT(kode_petugas,3)) AS idmax from petugas where LEFT(kode_petugas,2)='$kode_jabatan'");
			   $rg = ""; //kode awal
				if($data->num_rows()>0){ //jika data ada
				            foreach($data->result() as $k){
				                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
				                $rg = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "001";
				}
				    $kar = $kode_jabatan; //karakter depan kodenya
				    //gabungkan string dengan kode yang telah dibuat tadi
				return $kar.$rg;

		}


		//Pasien
		//-----------

		public function tampilpasien(){
		 	return $this->db->query("select * from pasien join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id order by no_rm desc LIMIT 7")->result();
		}
		public function tampilpasienhariini($tanggal_hari_ini){
		 	return $this->db->query("Select pendaftaran_pasien.no_registrasi, pendaftaran_pasien.tanggal_reg, pasien.no_rm, pasien.nama_pasien, pasien.nama_ibu_kandung, provinces.provinsi, regencies.kabupaten, districts.kecamatan, villages.kelurahan, dokter.nama_dokter, poliklinik.nama_poliklinik from pendaftaran_pasien join pasien on pendaftaran_pasien.no_rm = pasien.no_rm join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id join dokter on pendaftaran_pasien.kode_dokter=dokter.kode_dokter join poliklinik on poliklinik.kode_poliklinik=pendaftaran_pasien.kode_poliklinik where tanggal_reg='$tanggal_hari_ini' order by pendaftaran_pasien.no_registrasi")->result();
		}
		public function tampilpasienhariini2($tanggal_awal, $tanggal_akhir){
		 	return $this->db->query("Select pendaftaran_pasien.no_registrasi, pendaftaran_pasien.tanggal_reg, pasien.no_rm, pasien.nama_pasien, pasien.nama_ibu_kandung, provinces.provinsi, regencies.kabupaten, districts.kecamatan, villages.kelurahan, dokter.nama_dokter, poliklinik.nama_poliklinik from pendaftaran_pasien join pasien on pendaftaran_pasien.no_rm = pasien.no_rm join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id join dokter on pendaftaran_pasien.kode_dokter=dokter.kode_dokter join poliklinik on poliklinik.kode_poliklinik=pendaftaran_pasien.kode_poliklinik where tanggal_reg BETWEEN '$tanggal_awal' AND '$tanggal_akhir' order by pendaftaran_pasien.no_registrasi")->result();
		}
		public function tampilpasienretensi(){
		 	$data= $this->db->query("select max(tanggal_reg) as tanggal_terakhir, pasien.no_rm, pasien.no_ktp, pasien.nama_pasien, pasien.nama_ibu_kandung from pendaftaran_pasien join pasien on pasien.no_rm=pendaftaran_pasien.no_rm group by pendaftaran_pasien.no_rm");
		 	$results = array();
		 	foreach($data->result() as $row)
		   	{
		    	date_default_timezone_set('Asia/Jakarta');
				$tanggal_hari_ini = date('Y-m-d');
				$date = strtotime($tanggal_hari_ini . ' -5 year');

				if ($row->tanggal_terakhir < date('Y-m-d', $date)) {
					$results[] = array(
						'tanggal_terakhir' => $row->tanggal_terakhir,
		                'no_rm' => $row->no_rm,
		                'no_ktp' => $row->no_ktp,
		                'nama_pasien' => $row->nama_pasien,
		                'nama_ibu_kandung' => $row->nama_ibu_kandung
    				);
					
				}

		   	} 	
		   return $results;
		}
		public function tampilpasienriretensi(){
		 	$data= $this->db->query("select max(tanggal_masuk) as tanggal_terakhir, pasien.no_rm, pasien.no_ktp, pasien.nama_pasien, pasien.nama_ibu_kandung from rawat_inap join pasien on pasien.no_rm=rawat_inap.no_rm group by rawat_inap.no_rm");
		 	$results = array();
		 	foreach($data->result() as $row)
		   	{
		    	date_default_timezone_set('Asia/Jakarta');
				$tanggal_hari_ini = date('Y-m-d');
				$date = strtotime($tanggal_hari_ini . ' -5 year');

				if ($row->tanggal_terakhir < date('Y-m-d', $date)) {
					$results[] = array(
						'tanggal_terakhir' => $row->tanggal_terakhir,
		                'no_rm' => $row->no_rm,
		                'no_ktp' => $row->no_ktp,
		                'nama_pasien' => $row->nama_pasien,
		                'nama_ibu_kandung' => $row->nama_ibu_kandung
    				);
					
				}

		   	} 	
		   return $results;
		}
		public function hapuspasienretensi(){
		 	$data= $this->db->query("select max(tanggal_reg) as tanggal_terakhir, pasien.no_rm, pasien.no_ktp, pasien.nama_pasien, pasien.nama_ibu_kandung from pendaftaran_pasien join pasien on pasien.no_rm=pendaftaran_pasien.no_rm group by pendaftaran_pasien.no_rm");
		 	$results = array();
		 	$this->load->model('sismas_m');
		 	foreach($data->result() as $row)
		   	{
		    	date_default_timezone_set('Asia/Jakarta');
				$tanggal_hari_ini = date('Y-m-d');
				$date = strtotime($tanggal_hari_ini . ' -5 year');

				if ($row->tanggal_terakhir < date('Y-m-d', $date)) {
					
					$this->sismas_m->hapuspasien($row->no_rm);

					//HAPUS APOTIK dan DETAIL APOTIK
					$tanggal_reg_apotik = $this->db->query("select tanggal_reg from apotik where no_rm='$row->no_rm'");
					if ($tanggal_reg_apotik->result() != 0) {
						foreach($tanggal_reg_apotik->result() as $k){
							$this->db->query("delete from apotik_detail where tanggal_reg='$k->tanggal_reg'");
						}
					}
					$this->db->query("delete from apotik where no_rm='$row->no_rm'");



					//HAPUS PEMERIKSAAN PASIEN dan DETAIL PEMERIKSAAN PASIEN
					$pemeriksaan_pasien = $this->db->query("select no_pemeriksaan_pasien from pemeriksaan_pasien where no_rm='$row->no_rm'");
					if ($pemeriksaan_pasien->result() != 0) {
						foreach($pemeriksaan_pasien->result() as $k){
							$this->db->query("delete from pemeriksaan_pasien_detail where no_pemeriksaan_pasien='$k->no_pemeriksaan_pasien'");
						}
					}
					$this->db->query("delete from pemeriksaan_pasien where no_rm='$row->no_rm'");



					//HAPUS TINDAKAN PASIEN dan DETAIL TINDAKAN PASIEN
					$tindakan_pasien = $this->db->query("select no_tindakan_pasien from tindakan_pasien where no_rm='$row->no_rm'");
					if ($tindakan_pasien->result() != 0) {
						foreach($tindakan_pasien->result() as $k){
							$this->db->query("delete from tindakan_pasien_detail where no_tindakan_pasien='$k->no_tindakan_pasien'");
						}
					}
					$this->db->query("delete from tindakan_pasien where no_rm='$row->no_rm'");




					//HAPUS RAWAT INAP dan RI PEM, RI PEM DIAG, RI PEM KEB, RI TIN
					$rawat_inap = $this->db->query("select no_pemeriksaan_rawat_inap from rawat_inap where no_rm='$row->no_rm'");
					if ($rawat_inap->result() != 0) {
						foreach($rawat_inap->result() as $k){
							$this->db->query("delete from rawat_inap_pemeriksaan where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
							$this->db->query("delete from rawat_inap_pemeriksaan_diagnosa where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
							$this->db->query("delete from rawat_inap_pemeriksaan_kebutuhan where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
							$this->db->query("delete from rawat_inap_pemeriksaan_tindakan where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
						}
					}
					$this->db->query("delete from rawat_inap where no_rm='$row->no_rm'");

					//PENDAFTARAN
					$this->db->query("delete from pendaftaran_pasien where no_rm='$row->no_rm'");

					//TRANSAKSI
					$this->db->query("delete from transaksi where no_rm='$row->no_rm'");

					//Pemeriksaan TUlis
					$this->db->query("delete from pemeriksaan_tulis where no_rm='$row->no_rm'");

				}

		   	} 	
		   return $results;
		}

		public function hapuspasienriretensi(){
		 	$data= $this->db->query("select max(tanggal_masuk) as tanggal_terakhir, pasien.no_rm, pasien.no_ktp, pasien.nama_pasien, pasien.nama_ibu_kandung from rawat_inap join pasien on pasien.no_rm=rawat_inap.no_rm group by rawat_inap.no_rm");
		 	$results = array();
		 	$this->load->model('sismas_m');
		 	foreach($data->result() as $row)
		   	{
		    	date_default_timezone_set('Asia/Jakarta');
				$tanggal_hari_ini = date('Y-m-d');
				$date = strtotime($tanggal_hari_ini . ' -5 year');

				if ($row->tanggal_terakhir < date('Y-m-d', $date)) {
					
					$this->sismas_m->hapuspasien($row->no_rm);

					//HAPUS APOTIK dan DETAIL APOTIK
					$tanggal_reg_apotik = $this->db->query("select tanggal_reg from apotik where no_rm='$row->no_rm'");
					if ($tanggal_reg_apotik->result() != 0) {
						foreach($tanggal_reg_apotik->result() as $k){
							$this->db->query("delete from apotik_detail where tanggal_reg='$k->tanggal_reg'");
						}
					}
					$this->db->query("delete from apotik where no_rm='$row->no_rm'");



					//HAPUS PEMERIKSAAN PASIEN dan DETAIL PEMERIKSAAN PASIEN
					$pemeriksaan_pasien = $this->db->query("select no_pemeriksaan_pasien from pemeriksaan_pasien where no_rm='$row->no_rm'");
					if ($pemeriksaan_pasien->result() != 0) {
						foreach($pemeriksaan_pasien->result() as $k){
							$this->db->query("delete from pemeriksaan_pasien_detail where no_pemeriksaan_pasien='$k->no_pemeriksaan_pasien'");
						}
					}
					$this->db->query("delete from pemeriksaan_pasien where no_rm='$row->no_rm'");



					//HAPUS TINDAKAN PASIEN dan DETAIL TINDAKAN PASIEN
					$tindakan_pasien = $this->db->query("select no_tindakan_pasien from tindakan_pasien where no_rm='$row->no_rm'");
					if ($tindakan_pasien->result() != 0) {
						foreach($tindakan_pasien->result() as $k){
							$this->db->query("delete from tindakan_pasien_detail where no_tindakan_pasien='$k->no_tindakan_pasien'");
						}
					}
					$this->db->query("delete from tindakan_pasien where no_rm='$row->no_rm'");




					//HAPUS RAWAT INAP dan RI PEM, RI PEM DIAG, RI PEM KEB, RI TIN
					$rawat_inap = $this->db->query("select no_pemeriksaan_rawat_inap from rawat_inap where no_rm='$row->no_rm'");
					if ($rawat_inap->result() != 0) {
						foreach($rawat_inap->result() as $k){
							$this->db->query("delete from rawat_inap_pemeriksaan where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
							$this->db->query("delete from rawat_inap_pemeriksaan_diagnosa where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
							$this->db->query("delete from rawat_inap_pemeriksaan_kebutuhan where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
							$this->db->query("delete from rawat_inap_pemeriksaan_tindakan where no_pemeriksaan_rawat_inap='$k->no_pemeriksaan_rawat_inap'");
						}
					}
					$this->db->query("delete from rawat_inap where no_rm='$row->no_rm'");

					//PENDAFTARAN
					$this->db->query("delete from pendaftaran_pasien where no_rm='$row->no_rm'");

					//TRANSAKSI
					$this->db->query("delete from transaksi where no_rm='$row->no_rm'");
					//Pemeriksaan tulis
					$this->db->query("delete from pemeriksaan_tulis where no_rm='$row->no_rm'");

				}

		   	} 	
		   return $results;
		}
		
		public function tampilpasien1($no_rm){
		 	return $this->db->query("Select * from pasien where no_rm='$no_rm'")->result();
		}
		public function hapuspasien($no_rm){
			$this->db->delete("pasien",array("no_rm"=> $no_rm));
		}
		public function editpasien($no_rm, $data){
			$this->db->where("no_rm",$no_rm);
			$this->db->update("pasien",$data);
		}

		public function tampilpasienall(){
		 	return $this->db->query("Select no_rm,nama_pasien,tanggal_lahir from pasien")->result();
		}
		public function pasien($no_rm){
		 	return $this->db->query("Select * from pasien where no_rm='$no_rm'")->result();
		}

		public function caripasien($no_rm){
		 	$query= $this->db->query("select * from pasien where no_rm='$no_rm'");
			return $query->num_rows();
		}
		public function caripasien2($q_no_ktp){

		 	return $this->db->query("select no_rm, no_ktp, nama_pasien, provinsi, kabupaten, kecamatan, kelurahan, nama_ibu_kandung from pasien join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where no_ktp LIKE '%$q_no_ktp%'")->result();
		
		}
		public function caripasien3($q_nama_pasien,$q_nama_ibu_kandung){
			
		 	return $this->db->query("select no_rm, no_ktp, nama_pasien, provinsi, kabupaten, kecamatan, kelurahan, nama_ibu_kandung from pasien join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where nama_pasien LIKE '%$q_nama_pasien%' and nama_ibu_kandung LIKE '%$q_nama_ibu_kandung%'")->result();
		
		}
		public function caripasien4($q_nama_pasien,$q_kelurahan){
			
		 	return $this->db->query("select no_rm, no_ktp, nama_pasien, provinsi, kabupaten, kecamatan, kelurahan, nama_ibu_kandung from pasien join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where nama_pasien LIKE '%$q_nama_pasien%' and id_kel LIKE '%$q_kelurahan%'")->result();
		
		}
		public function cekpasienterakhir(){
			$this->load->model('sismas_m');
		 	   $data = $this->db->query("Select no_rm from pasien order by no_rm");
			   $rg = ""; 
				if($data->num_rows()>0){ 
				            foreach($data->result() as $k){
				            	$no_rm = sprintf("%06s", (int)$k->no_rm + 1);
				                $ceknorm = $this->sismas_m->caripasien($no_rm);
				                if ($ceknorm == 0) {
				                	$rg = $no_rm;
				                	break;
				                }
				               
				               
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "000001";
				}
				    
				    //gabungkan string dengan kode yang telah dibuat tadi
				
				return $rg;

		}
		public function simpanpasienbaru($data){
			$this->db->query("insert into pasien values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]')");
		}
		





		//Dokter
		//-----------
		public function tampildokter(){
		 	return $this->db->query("Select * from dokter LIMIT 7")->result();
		}
		public function tampildokterall(){
		 	return $this->db->query("Select kode_dokter,nama_dokter from dokter where kode_dokter!='DU01'")->result();
		}
		public function tampildokter1($kode_dokter){
		 	return $this->db->query("Select * from dokter where kode_dokter='$kode_dokter'")->result();
		}
		public function hapusdokter($kode_dokter){
			$this->db->delete("dokter",array("kode_dokter"=> $kode_dokter));
		}
		public function editdokter($kode_dokter, $data){
			$this->db->where("kode_dokter",$kode_dokter);
			$this->db->update("dokter",$data);
		}
		public function tambahdokter($data){
			$this->db->query("insert into dokter values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')");
		}
		public function ceknamadokter($kode_dokter)
		{
		   $data = $this->db->query("Select nama_dokter from dokter where kode_dokter='$kode_dokter'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_dokter;
		   }
		}
		public function ceknamadokter2($z)
		{
		   $data = $this->db->query("Select nama_dokter from dokter join rawat_inap on rawat_inap.kode_dokter=dokter.kode_dokter where no_pemeriksaan_rawat_inap='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_dokter;
		   }
		}
		public function cekkodedokter($z)
		{
		   $data = $this->db->query("Select kode_dokter from dokter where kode_dokter='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_dokter;
		   }
		}

		//Poli
		//-----------
		public function tampilpoli(){
		 	return $this->db->query("Select * from poliklinik LIMIT 7")->result();
		}
		public function tampilpoliall(){
		 	return $this->db->query("Select kode_poliklinik,nama_poliklinik from poliklinik where kode_poliklinik!='PRI' order by kode_poliklinik desc")->result();
		}
		public function tampilpoliklinik1($kode_poliklinik){
		 	return $this->db->query("Select * from poliklinik where kode_poliklinik='$kode_poliklinik'")->result();
		}
		public function hapuspoliklinik($kode_poliklinik){
			$this->db->delete("poliklinik",array("kode_poliklinik"=> $kode_poliklinik));
		}
		public function editpoliklinik($kode_poliklinik, $data){
			$this->db->where("kode_poliklinik",$kode_poliklinik);
			$this->db->update("poliklinik",$data);
		}
		public function tambahpoliklinik($data){
			$this->db->query("insert into poliklinik values('$data[0]','$data[1]')");
		}
		public function cekkodepoliklinik($z)
		{
		   $data = $this->db->query("Select kode_poliklinik from poliklinik where kode_poliklinik='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_poliklinik;
		   }
		}


		//DIagnosa
		//-----------
		public function tampildiagnosa(){
		 	return $this->db->query("Select * from diagnosa LIMIT 7")->result();
		}
		public function tampildiagnosaall(){
		 	return $this->db->query("Select kode_diagnosa,nama_diagnosa from diagnosa")->result();
		}
		public function tampildiagnosaallz(){
		 	return $this->db->query("Select * from diagnosa")->result();
		}
		public function tampildiagnosa1($kode_diagnosa){
		 	return $this->db->query("Select * from diagnosa where kode_diagnosa='$kode_diagnosa'")->result();
		}
		public function hapusdiagnosa($kode_diagnosa){
			$this->db->delete("diagnosa",array("kode_diagnosa"=> $kode_diagnosa));
		}
		public function editdiagnosa($kode_diagnosa, $data){
			$this->db->where("kode_diagnosa",$kode_diagnosa);
			$this->db->update("diagnosa",$data);
		}
		public function tambahdiagnosa($data){
			$this->db->query("insert into diagnosa values('$data[0]','$data[1]')");
		}
		public function cekkodediagnosa($z)
		{
		   $data = $this->db->query("Select kode_diagnosa from diagnosa where kode_diagnosa='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_diagnosa;
		   }
		}


		//Tindakan
		//-----------
		public function tampiltindakanz(){
		 	return $this->db->query("Select * from tindakan LIMIT 7")->result();
		}
		public function tampiltindakanall(){
		 	return $this->db->query("Select kode_tindakan,nama_tindakan from tindakan")->result();
		}
		public function tampiltindakanallz(){
		 	return $this->db->query("Select * from tindakan")->result();
		}
		public function tampiltindakan1($kode_tindakan){
		 	return $this->db->query("Select * from tindakan where kode_tindakan='$kode_tindakan'")->result();
		}
		public function hapustindakan($kode_tindakan){
			$this->db->delete("tindakan",array("kode_tindakan"=> $kode_tindakan));
		}
		public function edittindakan($kode_tindakan, $data){
			$this->db->where("kode_tindakan",$kode_tindakan);
			$this->db->update("tindakan",$data);
		}
		public function tambahtindakan($data){
			$this->db->query("insert into tindakan values('$data[0]','$data[1]','$data[2]')");
		}
		public function cekkodetindakan($z)
		{
		   $data = $this->db->query("Select kode_tindakan from tindakan where kode_tindakan='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_tindakan;
		   }
		}


		//RAWAT INAP
		//-----------
		public function cekupdateterakhir($tanggal_hari_ini2,$no_pemeriksaan_ri)
		{
	
		 
		   return $this->db->query("select * FROM rawat_inap join rawat_inap_pemeriksaan on rawat_inap.`no_pemeriksaan_rawat_inap`=rawat_inap_pemeriksaan.`no_pemeriksaan_rawat_inap` where rawat_inap.tanggal_keluar='0000-00-00' and rawat_inap_pemeriksaan.tanggal_pemeriksaan='$tanggal_hari_ini2' and rawat_inap.no_pemeriksaan_rawat_inap='$no_pemeriksaan_ri'")->result();
		}
		public function updatepemeriksaan($tanggal_hari_ini2,$no_pemeriksaan_ri)
		{
			$data = $this->db->query("Select kode_ruangan from rawat_inap where no_pemeriksaan_rawat_inap='$no_pemeriksaan_ri'");
		   	foreach($data->result() as $row)
		   	{
		    	$kode_ruangan = $row->kode_ruangan;
		   	}

		   	$this->db->query("insert into rawat_inap_pemeriksaan values('$no_pemeriksaan_ri','$tanggal_hari_ini2','$kode_ruangan')");
		}
		public function cekrgterakhirrawatinap($no_rm, $tanggal_hari_ini){
			$data = $this->db->query("Select MAX(RIGHT(no_registrasi,5)) AS idmax from rawat_inap where tanggal_keluar='0000-00-00' group by tanggal_masuk");
		   	foreach($data->result() as $row)
		   	{
		   		$yoo = sprintf("%05s", (int)$row->idmax + 1);
		   		return $yoo;
		   	}
		    	

		}

		public function ceknormri($no_registrasi){
			$data = $this->db->query("Select no_rm from rawat_inap where no_registrasi='$no_registrasi' and tanggal_keluar='0000-00-00'");
		   	foreach($data->result() as $row)
		   	{
		    	return $row->no_rm;
		   	}

		}

		public function cekkode_dokterri($no_registrasi){
			$data = $this->db->query("Select kode_dokter from rawat_inap where no_registrasi='$no_registrasi' and tanggal_keluar='0000-00-00'");
		   	foreach($data->result() as $row)
		   	{
		    	return $row->kode_dokter;
		   	}

		}

		public function cekno_pemeriksaan_ri($no_registrasi){
			$data = $this->db->query("Select no_pemeriksaan_rawat_inap from rawat_inap where no_registrasi='$no_registrasi' and tanggal_keluar='0000-00-00'");
		   	foreach($data->result() as $row)
		   	{
		    	return $row->no_pemeriksaan_rawat_inap;
		   	}

		}

		public function cekriterakhir(){
			date_default_timezone_set('Asia/Jakarta');
			$tanggal_masuk = date('Y-m-d');

		 	   $data = $this->db->query("Select MAX(RIGHT(no_registrasi,5)) AS idmax from rawat_inap where tanggal_keluar='0000-00-00' and tanggal_masuk='$tanggal_masuk' group by tanggal_keluar");
			   $rg = ""; //kode awal
				if($data->num_rows()>0){ //jika data ada
				            foreach($data->result() as $k){
				                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
				                $rg = sprintf("%05s", $tmp); //kode ambil 4 karakter terakhir
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "00001";
				}
				    $kar = "RI"; //karakter depan kodenya
				    //gabungkan string dengan kode yang telah dibuat tadi
				    var_dump($kar.$rg);
				    exit();
				return $kar.$rg;

		}

		public function tampilruangan(){
			return $this->db->query("Select * from ruangan")->result();
		}
		public function tampilkebutuhanall(){
			return $this->db->query("Select * from kebutuhan_lain")->result();
		}

		public function caripemeriksaanri($no_pemeriksaan_rawat_inap){
		 	$query= $this->db->query("select * from rawat_inap where no_pemeriksaan_rawat_inap='$no_pemeriksaan_rawat_inap'");
			return $query->num_rows();
		}

		public function simpanrawatinapbaru($dataz){

			$this->load->model('sismas_m');
		 	   $data = $this->db->query("Select no_pemeriksaan_rawat_inap from rawat_inap order by no_pemeriksaan_rawat_inap");
			   $rg = ""; 
				if($data->num_rows()>0){ 
				            foreach($data->result() as $k){
				            	$no_pri = sprintf("%06s", (int)$k->no_pemeriksaan_rawat_inap + 1);
				                $ceknopri = $this->sismas_m->caripemeriksaanri($no_pri);
				                if ($ceknopri == 0) {
				                	$rg = $no_pri;
				                	break;
				                }
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "1";
				}

			
			$this->db->query("insert into rawat_inap values('$rg','$dataz[0]','$dataz[1]','$dataz[2]','$dataz[3]','$dataz[4]','0000-00-00','0')");

			return $rg;

		}
		public function hapuspendaftaranrawatjalan($no_rm){
			$this->db->query("delete from pendaftaran_pasien where no_rm='$no_rm' and status='1'" );
		}
		public function tampilpasienrawatinap(){
		 	return $this->db->query("select * from rawat_inap join pasien on rawat_inap.no_rm=pasien.no_rm join ruangan on ruangan.kode_ruangan=rawat_inap.kode_ruangan join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id LIMIT 7")->result();
		}
		public function tampilpasienrawatinapbelumkeluar(){
		 	return $this->db->query("select * from rawat_inap join pasien on rawat_inap.no_rm=pasien.no_rm join ruangan on ruangan.kode_ruangan=rawat_inap.kode_ruangan join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where rawat_inap.tanggal_keluar='0000-00-00' LIMIT 7")->result();
		}

		public function simpantindakanri($data){
			$this->db->query("insert into rawat_inap_pemeriksaan_tindakan values('$data[0]','$data[1]','$data[2]')");
		}
		public function simpandiagnosari($data){
			$this->db->query("insert into rawat_inap_pemeriksaan_diagnosa values('$data[0]','$data[1]','$data[2]')");
		}
		public function simpankebutuhanri($data){
			$this->db->query("insert into rawat_inap_pemeriksaan_kebutuhan values('$data[0]','$data[1]','$data[2]')");
		}
		public function tampildatapemeriksaanri($z){
		 	return $this->db->query("select ruangan.kode_ruangan, ruangan.nama_ruangan, rawat_inap_pemeriksaan.tanggal_pemeriksaan, ruangan.tarif from rawat_inap
		 		join rawat_inap_pemeriksaan on rawat_inap_pemeriksaan.no_pemeriksaan_rawat_inap=rawat_inap.no_pemeriksaan_rawat_inap 
                                join ruangan on ruangan.kode_ruangan=rawat_inap_pemeriksaan.kode_ruangan 
                                where rawat_inap.no_pemeriksaan_rawat_inap='$z'
		 		")->result();
		}

		public function tampildatapemeriksaanrit($z){
		 	return $this->db->query("select tindakan.kode_tindakan, ruangan.nama_ruangan, rawat_inap_pemeriksaan_tindakan.tanggal_pemeriksaan, tindakan.nama_tindakan, tindakan.tarif from rawat_inap join pasien on rawat_inap.no_rm=pasien.no_rm 
		 		join ruangan on ruangan.kode_ruangan=rawat_inap.kode_ruangan 
		 		join rawat_inap_pemeriksaan_tindakan on rawat_inap_pemeriksaan_tindakan.no_pemeriksaan_rawat_inap=rawat_inap.no_pemeriksaan_rawat_inap 
		 		join tindakan on tindakan.kode_tindakan=rawat_inap_pemeriksaan_tindakan.kode_tindakan where rawat_inap.no_pemeriksaan_rawat_inap='$z'")->result();
		}
		public function tampildatapemeriksaanrit2($z){
		 	return $this->db->query("select tindakan.kode_tindakan, ruangan.nama_ruangan, tindakan.nama_tindakan, tindakan.tarif
FROM rawat_inap
JOIN pasien ON rawat_inap.no_rm = pasien.no_rm
JOIN ruangan ON ruangan.kode_ruangan = rawat_inap.kode_ruangan
JOIN transaksi ON rawat_inap.no_pemeriksaan_rawat_inap = transaksi.no_pemeriksaan_rawat_inap
JOIN tindakan_pasien_detail ON tindakan_pasien_detail.no_tindakan_pasien = transaksi.no_tindakan_pasien
JOIN tindakan ON tindakan.kode_tindakan=tindakan_pasien_detail.kode_tindakan where rawat_inap.no_pemeriksaan_rawat_inap='$z'")->result();
		}
		public function tampildatapemeriksaanrit3($z,$tanggal_hari_ini){
		 	return $this->db->query("select tindakan.kode_tindakan, tindakan.nama_tindakan, tindakan.tarif
FROM transaksi
JOIN tindakan_pasien_detail ON tindakan_pasien_detail.no_tindakan_pasien = transaksi.no_tindakan_pasien
JOIN tindakan ON tindakan.kode_tindakan=tindakan_pasien_detail.kode_tindakan where transaksi.no_registrasi='$z' and tanggal_reg='$tanggal_hari_ini'")->result();
		}
		public function tampildatapemeriksaanrid($z){
		 	return $this->db->query("select diagnosa.kode_diagnosa, diagnosa.nama_diagnosa, rawat_inap_pemeriksaan_diagnosa.tanggal_pemeriksaan from rawat_inap
		 		join rawat_inap_pemeriksaan_diagnosa on rawat_inap_pemeriksaan_diagnosa.no_pemeriksaan_rawat_inap=rawat_inap.no_pemeriksaan_rawat_inap 
		 		join diagnosa on diagnosa.kode_diagnosa=rawat_inap_pemeriksaan_diagnosa.kode_diagnosa where rawat_inap.no_pemeriksaan_rawat_inap='$z'")->result();
		}
		public function tampildatapemeriksaanrik($z){
		 	return $this->db->query("select kebutuhan_lain.kode_kebutuhan, ruangan.nama_ruangan, rawat_inap_pemeriksaan_kebutuhan.tanggal_pemeriksaan, kebutuhan_lain.nama_kebutuhan, kebutuhan_lain.tarif from rawat_inap join pasien on rawat_inap.no_rm=pasien.no_rm 
		 		join ruangan on ruangan.kode_ruangan=rawat_inap.kode_ruangan 
		 		join rawat_inap_pemeriksaan_kebutuhan on rawat_inap_pemeriksaan_kebutuhan.no_pemeriksaan_rawat_inap=rawat_inap.no_pemeriksaan_rawat_inap 
		 		join kebutuhan_lain on kebutuhan_lain.kode_kebutuhan=rawat_inap_pemeriksaan_kebutuhan.kode_kebutuhan where rawat_inap.no_pemeriksaan_rawat_inap='$z'")->result();
		}

		public function hapuspemeriksaanri($z,$zx){
		 	$this->db->query("delete from rawat_inap_pemeriksaan where kode_ruangan='$z' and tanggal_pemeriksaan='$zx'");
		}

		public function hapuspemeriksaanrit($z,$zx){
		 	$this->db->query("delete from rawat_inap_pemeriksaan_tindakan where kode_tindakan='$z' and tanggal_pemeriksaan='$zx'");
		}
		public function hapuspemeriksaanrid($z,$zx){
		 	$this->db->query("delete from rawat_inap_pemeriksaan_diagnosa where kode_diagnosa='$z' and tanggal_pemeriksaan='$zx'");
		}

		public function hapuspemeriksaanrik($z,$zx){
		 	$this->db->query("delete from rawat_inap_pemeriksaan_kebutuhan where kode_kebutuhan='$z' and tanggal_pemeriksaan='$zx'");
		}



		//Pendaftaran
		//-----------
		public function cekrgterakhir($tanggal_hari_ini){
		 	   $data = $this->db->query("Select MAX(RIGHT(no_registrasi,5)) AS idmax from pendaftaran_pasien where tanggal_reg='$tanggal_hari_ini' group by tanggal_reg");
			   $rg = ""; //kode awal
				if($data->num_rows()>0){ //jika data ada
				            foreach($data->result() as $k){
				                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
				                $rg = sprintf("%05s", $tmp); //kode ambil 4 karakter terakhir
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "00001";
				}
				    $kar = "RG"; //karakter depan kodenya
				    //gabungkan string dengan kode yang telah dibuat tadi
				return $kar.$rg;

		}
		public function simpanpendaftaranbaru($data){
			$this->db->query("insert into pendaftaran_pasien values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]',0)");
		}
		public function cekpasienkartu($no_rm){
			return $this->db->query("select * from pasien join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where no_rm='$no_rm'")->result();
			
		}
		public function tampilprovinsi(){
		 	return $this->db->query("Select * from provinces")->result();
		}
		public function tampildatakab($z){
		 	return $this->db->query("Select id, kabupaten from regencies where province_id='$z'")->result();
		}
		public function tampildatakec($z){
		 	return $this->db->query("Select id, kecamatan from districts where regency_id='$z'")->result();
		}
		public function tampildatakel($z){
		 	return $this->db->query("Select id, kelurahan from villages where district_id='$z'")->result();
		}



		public function tampildatarekammedis(){
		 	return $this->db->query("
		 	select transaksi.tanggal_reg, dokter.nama_dokter, pasien.no_rm, pasien.nama_pasien, poliklinik.nama_poliklinik, transaksi.total_pembayaran, transaksi.no_registrasi, transaksi.kode_poliklinik, transaksi.no_pemeriksaan_rawat_inap from transaksi join pasien on pasien.no_rm=transaksi.no_rm
		 	join dokter on dokter.kode_dokter=transaksi.kode_dokter
		 	join poliklinik on poliklinik.kode_poliklinik=transaksi.kode_poliklinik LIMIT 10
			")->result();
		}

		public function tampilrekammedis($no_rm){
		 	return $this->db->query("
		 	select transaksi.tanggal_reg, dokter.nama_dokter, pasien.no_rm, pasien.nama_pasien, poliklinik.nama_poliklinik, transaksi.total_pembayaran, transaksi.no_registrasi, transaksi.kode_poliklinik, transaksi.no_pemeriksaan_rawat_inap from transaksi join pasien on pasien.no_rm=transaksi.no_rm
		 	join dokter on dokter.kode_dokter=transaksi.kode_dokter
		 	join poliklinik on poliklinik.kode_poliklinik=transaksi.kode_poliklinik
			WHERE transaksi.no_rm = '$no_rm'
			
			")->result();
		}

		public function tampilcarirekammedis($no_rm,$nama_pasien){
		 	return $this->db->query("
		 	select transaksi.tanggal_reg, dokter.nama_dokter, pasien.no_rm, pasien.nama_pasien, poliklinik.nama_poliklinik, transaksi.total_pembayaran, transaksi.no_registrasi, transaksi.kode_poliklinik, transaksi.no_pemeriksaan_rawat_inap from transaksi join pasien on pasien.no_rm=transaksi.no_rm
		 	join dokter on dokter.kode_dokter=transaksi.kode_dokter
		 	join poliklinik on poliklinik.kode_poliklinik=transaksi.kode_poliklinik
			WHERE transaksi.no_rm LIKE '%$no_rm%' and pasien.nama_pasien LIKE '%$nama_pasien%' LIMIT 10
			
			")->result();
		}


		//Pemeriksaan
		//-----------
		public function caripemeriksaantulisterakhir($no_pemeriksaan_tulis){
		 	$query= $this->db->query("select * from pemeriksaan_tulis where no_pemeriksaan_tulis='$no_pemeriksaan_tulis'");
			return $query->num_rows();
		}
		public function cekpemeriksaantulisterakhir(){
		 	   
			$this->load->model('sismas_m');
		 	   $data = $this->db->query("Select no_pemeriksaan_tulis from pemeriksaan_tulis order by no_pemeriksaan_tulis");
			   $rg = ""; 
				if($data->num_rows()>0){ 
				            foreach($data->result() as $k){
				            	$no_pt = sprintf("%06s", (int)$k->no_pemeriksaan_tulis + 1);
				                $ceknopt = $this->sismas_m->caripemeriksaantulisterakhir($no_pt);
				                if ($ceknopt == 0) {
				                	$rg = $no_pt;
				                	break;
				                }
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "1";
				}

				return $rg;

		}
		public function caripemeriksaanterakhir($no_pemeriksaan){
		 	$query= $this->db->query("select * from pemeriksaan where no_pemeriksaan='$no_pemeriksaan'");
			return $query->num_rows();
		}
		public function cekpemeriksaanterakhir(){
		 	   
			$this->load->model('sismas_m');
		 	   $data = $this->db->query("Select no_pemeriksaan from pemeriksaan order by no_pemeriksaan");
			   $rg = ""; 
				if($data->num_rows()>0){ 
				            foreach($data->result() as $k){
				            	$no_pt = sprintf("%06s", (int)$k->no_pemeriksaan + 1);
				                $ceknopt = $this->sismas_m->caripemeriksaanterakhir($no_pt);
				                if ($ceknopt == 0) {
				                	$rg = $no_pt;
				                	break;
				                }
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "1";
				}

				return $rg;

		}
		public function getdatadiagnosaz($z){
		 	return $this->db->query("Select kode_diagnosa, nama_diagnosa from diagnosa where kode_diagnosa='$z'")->result();
		}
		public function ceknamadiagnosa($z)
		{
		   $data = $this->db->query("select nama_diagnosa from diagnosa where kode_diagnosa='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_diagnosa;
		   }
		}
		public function simpandiagnosatemp($data){
			$this->db->query("insert into pemeriksaan_pasien_temp values('$data[0]','$data[1]','$data[2]')");
		}
		public function tampildiagnosatemp($kode_dokter){
		 	return $this->db->query("Select * from pemeriksaan_pasien_temp where kode_dokter='$kode_dokter'")->result();
		}
		public function hapusdiagnosatemp($z,$kode_dokter){
		 	$this->db->query("delete from pemeriksaan_pasien_temp where kode_diagnosa='$z' and kode_dokter='$kode_dokter'");
		}
		public function getdatatindakanz($z){
		 	return $this->db->query("Select kode_tindakan, nama_tindakan, tarif from tindakan where kode_tindakan='$z'")->result();
		}
		public function ceknamatindakan($z)
		{
		   $data = $this->db->query("select nama_tindakan from tindakan where kode_tindakan='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_tindakan;
		   }
		}
		public function cektariftindakan($z)
		{
		   $data = $this->db->query("select tarif from tindakan where kode_tindakan='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->tarif;
		   }
		}
		public function getdatakebutuhanz($z){
		 	return $this->db->query("Select kode_kebutuhan, nama_kebutuhan, tarif from kebutuhan_lain where kode_kebutuhan='$z'")->result();
		}
		
		public function simpantindakantemp($data){
			$this->db->query("insert into tindakan_pasien_temp values('$data[0]','$data[1]','$data[2]','$data[3]')");
		}

		public function tampiltindakantemp($kode_dokter){
		 	return $this->db->query("Select * from tindakan_pasien_temp where kode_dokter='$kode_dokter'")->result();
		}
		public function hapustindakantemp($z,$kode_dokter){
		 	$this->db->query("delete from tindakan_pasien_temp where kode_tindakan='$z' and kode_dokter='$kode_dokter'");
		}
		public function simpanpemeriksaanbaru($data){
			$this->db->query("insert into pemeriksaan values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')");
		}
		public function simpanpemeriksaantulisbaru($data){
			$this->db->query("insert into pemeriksaan_tulis values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')");
		}
		public function caripemeriksaanpasien($no_pemeriksaan_pasien){
		 	$query= $this->db->query("select * from pemeriksaan_pasien where no_pemeriksaan_pasien='$no_pemeriksaan_pasien'");
			return $query->num_rows();
		}
		public function simpanpemeriksaanpasien($dataz){

			$this->load->model('sismas_m');
		 	   $data = $this->db->query("Select no_pemeriksaan_pasien from pemeriksaan_pasien order by no_pemeriksaan_pasien");
			   $rg = ""; 
				if($data->num_rows()>0){ 
				            foreach($data->result() as $k){
				            	$no_pp = sprintf("%06s", (int)$k->no_pemeriksaan_pasien + 1);
				                $ceknopp = $this->sismas_m->caripemeriksaanpasien($no_pp);
				                if ($ceknopp == 0) {
				                	$rg = $no_pp;
				                	break;
				                }
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "1";
				}
				 
	
			$this->db->query("insert into pemeriksaan_pasien values('$rg','$dataz[0]','$dataz[1]')");

			return $rg;
		}
		
		public function cektotaltarifri($no_registrasi){
			$data = $this->db->query("Select SUM(tarif) AS total_tarif from tindakan join rawat_inap_pemeriksaan_tindakan on tindakan.kode_tindakan=rawat_inap_pemeriksaan_tindakan.kode_tindakan join rawat_inap on rawat_inap_pemeriksaan_tindakan.no_pemeriksaan_rawat_inap=rawat_inap.no_pemeriksaan_rawat_inap where no_registrasi='$no_registrasi' and tanggal_keluar='0000-00-00'");
		   	foreach($data->result() as $row)
		   	{
		    	return $row->total_tarif;
		   	}
		}
		public function simpanpemeriksaanpasiendetail($no_pemeriksaan_baru,$kode_dokter){
			$data = $this->db->query("select * from pemeriksaan_pasien_temp where kode_dokter='$kode_dokter'");
			   foreach($data->result() as $row)
			   {
			    	$this->db->query("insert into pemeriksaan_pasien_detail values('$no_pemeriksaan_baru','$row->kode_diagnosa')");
			   }
			$this->db->query("delete from pemeriksaan_pasien_temp where kode_dokter='$kode_dokter'");
			
		}
		public function simpanpemeriksaanpasiendetail2($no_pemeriksaan_baru,$no_pemeriksaan_rawat_inap){
			$data = $this->db->query("select * from rawat_inap_pemeriksaan_diagnosa where no_pemeriksaan_rawat_inap='$no_pemeriksaan_rawat_inap'");
			   foreach($data->result() as $row)
			   {
			    	$this->db->query("insert into pemeriksaan_pasien_detail values('$no_pemeriksaan_baru','$row->kode_diagnosa')");
			   }
			$this->db->query("delete from rawat_inap_pemeriksaan_diagnosa where no_pemeriksaan_rawat_inap='$no_pemeriksaan_rawat_inap'");
			
		}
		public function caritindakanpasien($no_tindakan_pasien){
		 	$query= $this->db->query("select * from tindakan_pasien where no_tindakan_pasien='$no_tindakan_pasien'");
			return $query->num_rows();
		}
		public function simpantindakanpasien($dataz){
			//DIANUIN
			$this->load->model('sismas_m');
		 	   $data = $this->db->query("Select no_tindakan_pasien from tindakan_pasien order by no_tindakan_pasien");
			   $rg = ""; 
				if($data->num_rows()>0){ 
				            foreach($data->result() as $k){
				            	$no_tp = sprintf("%06s", (int)$k->no_tindakan_pasien + 1);
				                $ceknotp = $this->sismas_m->caritindakanpasien($no_tp);
				                if ($ceknotp == 0) {
				                	$rg = $no_tp;
				                	break;
				                }
				            }
				}else{ //jika data kosong diset ke kode awal
				            $rg = "1";
				}
				 

			$this->db->query("insert into tindakan_pasien values('$rg','$dataz[0]','$dataz[1]','$dataz[2]')");

			return $rg;
		}
		
		public function simpantindakanpasiendetail($no_tindakan_baru,$kode_dokter){
			$data = $this->db->query("select * from tindakan_pasien_temp where kode_dokter='$kode_dokter'");
			   foreach($data->result() as $row)
			   {
			    	$this->db->query("insert into tindakan_pasien_detail values('$no_tindakan_baru','$row->kode_tindakan')");
			   }
			$this->db->query("delete from tindakan_pasien_temp where kode_dokter='$kode_dokter'");
			
		}
		public function simpantindakanpasiendetail2($no_tindakan_baru,$no_pemeriksaan_rawat_inap){
			$data = $this->db->query("select * from rawat_inap_pemeriksaan_tindakan where no_pemeriksaan_rawat_inap='$no_pemeriksaan_rawat_inap'");
			   foreach($data->result() as $row)
			   {
			    	$this->db->query("insert into tindakan_pasien_detail values('$no_tindakan_baru','$row->kode_tindakan')");
			   }
			$this->db->query("delete from rawat_inap_pemeriksaan_tindakan where no_pemeriksaan_rawat_inap='$no_pemeriksaan_rawat_inap'");
			
		}
		public function updatestatus($no_registrasi, $tanggal_hari_ini){
			$this->db->query("update pendaftaran_pasien set status='1' where no_registrasi='$no_registrasi' and tanggal_reg='$tanggal_hari_ini'");
		}
		public function updatestatus2($no_registrasi, $tanggal_hari_ini){
			$this->db->query("update pendaftaran_pasien set status='2' where no_registrasi='$no_registrasi' and tanggal_reg='$tanggal_hari_ini'");
		}
		public function updatestatusapt($no_registrasi, $tanggal_hari_ini){
			$this->db->query("update pendaftaran_pasien set status='3' where no_registrasi='$no_registrasi' and tanggal_reg='$tanggal_hari_ini'");
		}
		public function updatestatusbill($no_registrasi, $tanggal_hari_ini){
			$this->db->query("update pendaftaran_pasien set status='4' where no_registrasi='$no_registrasi' and tanggal_reg='$tanggal_hari_ini'");
		}
		public function updatestatusbill1($no_registrasi, $tanggal_hari_ini){
			$this->db->query("update pendaftaran_pasien set status='4' where no_registrasi='$no_registrasi' and tanggal_reg='$tanggal_hari_ini'");
		}
		public function cektotaltarif($kode_dokter)
		{
		   $data = $this->db->query("select SUM(tarif) as total_tarif from tindakan_pasien_temp where kode_dokter='$kode_dokter'");
		   foreach($data->result() as $row)
		   {
		    return $row->total_tarif;
		   }
		}
		public function cekrg($no_registrasi,$tanggal_hari_ini){
		 	$query= $this->db->query("select no_registrasi from pendaftaran_pasien where tanggal_reg='$tanggal_hari_ini' AND no_registrasi='$no_registrasi' group by tanggal_reg");
			return $query->num_rows();
		}
		public function cekrgx($no_registrasi,$tanggal_hari_ini){
		 	$query= $this->db->query("select no_registrasi from rawat_inap where no_registrasi='$no_registrasi'");
			return $query->num_rows();
		}
		public function antrianpasien($kode_dokter,$tanggal_hari_ini){
		 	return $this->db->query("Select pendaftaran_pasien.no_registrasi, pasien.no_rm, pasien.nama_pasien, pendaftaran_pasien.status from pendaftaran_pasien join pasien on pendaftaran_pasien.no_rm = pasien.no_rm where tanggal_reg='$tanggal_hari_ini' order by pendaftaran_pasien.no_registrasi")->result();
		}
		public function antrianpasien2($tanggal_hari_ini){
		 	return $this->db->query("Select pendaftaran_pasien.no_registrasi, pasien.no_rm, pasien.nama_pasien, pendaftaran_pasien.status from pendaftaran_pasien join pasien on pendaftaran_pasien.no_rm = pasien.no_rm where  tanggal_reg='$tanggal_hari_ini' and pendaftaran_pasien.status!='0' order by pendaftaran_pasien.no_registrasi")->result();
		}
		public function antrianpasienapotik($tanggal_hari_ini){
		 	return $this->db->query("Select pendaftaran_pasien.no_registrasi, pasien.no_rm, pasien.nama_pasien, pendaftaran_pasien.status from pendaftaran_pasien join pasien on pendaftaran_pasien.no_rm = pasien.no_rm where tanggal_reg='$tanggal_hari_ini' order by pendaftaran_pasien.no_registrasi desc")->result();
		}
		public function ceknamafile($no_rm,$tanggal_today)
		{
		   $data = $this->db->query("select namafile from pemeriksaan_tulis where no_rm='$no_rm' and tanggal_reg='$tanggal_today'");
		   foreach($data->result() as $row)
		   {
		    return $row->namafile;
		   }
		}
		public function ceknamafilenya($no_registrasi,$no_rm)
		{
		   $data = $this->db->query("select namafile from pemeriksaan_tulis where no_rm='$no_rm' and no_registrasi='$no_registrasi'");
		   foreach($data->result() as $row)
		   {
		    return $row->namafile;
		   }
		}
		public function deletenamafilenya($no_registrasi,$no_rm){
		 	return $this->db->query("delete from pemeriksaan_tulis where no_registrasi='$no_registrasi' and no_rm='$no_rm'");
		}

		public function ceknamafile2($no_registrasi,$tanggal_today)
		{
		   $data = $this->db->query("select max(namafile) as namafile from pemeriksaan_tulis where no_registrasi='$no_registrasi' and tanggal_reg='$tanggal_today'");
		   foreach($data->result() as $row)
		   {
		    return $row->namafile;
		   }
		}
		public function ceknamafile3($no_registrasi){
		 	return $this->db->query("select namafile, pemeriksaan_tulis.tanggal_reg from pemeriksaan_tulis join rawat_inap on rawat_inap.no_registrasi=pemeriksaan_tulis.no_registrasi where pemeriksaan_tulis.no_registrasi='$no_registrasi' and rawat_inap.tanggal_keluar='0000-00-00'")->result();
		}
		public function ceknamafile4($no_registrasi){
		 	return $this->db->query("select namafile, pemeriksaan_tulis.tanggal_reg from pemeriksaan_tulis join rawat_inap on rawat_inap.no_registrasi=pemeriksaan_tulis.no_registrasi where pemeriksaan_tulis.no_registrasi='$no_registrasi' and rawat_inap.tanggal_keluar='0000-00-00' order by namafile desc")->result();
		}
		public function cekkodedokterz($no_rm,$tanggal_today)
		{
		   $data = $this->db->query("select kode_dokter from pemeriksaan_tulis where no_rm='$no_rm' and tanggal_reg='$tanggal_today'");
		   foreach($data->result() as $row)
		   {
		    return $row->kode_dokter;
		   }
		}
		public function ceknopemeriksaanpasien($no_registrasi,$no_rm)
		{
		   $data = $this->db->query("select no_pemeriksaan_pasien from pemeriksaan_pasien where no_rm='$no_rm' order by no_pemeriksaan_pasien desc limit 1");
		   foreach($data->result() as $row)
		   {
		   	$this->db->query("delete from pemeriksaan_pasien where no_pemeriksaan_pasien='$row->no_pemeriksaan_pasien'");
		   	$this->db->query("delete from pemeriksaan_pasien_detail where no_pemeriksaan_pasien='$row->no_pemeriksaan_pasien'");
		   	$data = $this->db->query("select no_tindakan_pasien, no_pemeriksaan_pasien from pemeriksaan where no_pemeriksaan_pasien='$row->no_pemeriksaan_pasien'");
			   foreach($data->result() as $row)
			   {
			   	$this->db->query("delete from pemeriksaan where no_pemeriksaan_pasien='$row->no_pemeriksaan_pasien'");
			   	$this->db->query("delete from tindakan_pasien where no_tindakan_pasien='$row->no_tindakan_pasien'");
			   	$this->db->query("delete from tindakan_pasien_detail where no_tindakan_pasien='$row->no_tindakan_pasien'");
			   
			   }
		   	
		   
		   }

		   date_default_timezone_set('Asia/Jakarta');
			$tanggal_hari_ini = date('Y-m-d');
		   $this->db->query("update pendaftaran_pasien set status='1' where no_registrasi='$no_registrasi' and tanggal_reg='$tanggal_hari_ini'");
		   $this->db->query("delete from pemeriksaan_pasien_temp");
		   $this->db->query("delete from tindakan_pasien_temp");
		}




		//Transaksi APOTIK
		//----------------
		public function getdatapasien($z,$tanggal_hari_ini){
		 	return $this->db->query("Select pendaftaran_pasien.no_rm, nama_pasien from pendaftaran_pasien join pasien on pendaftaran_pasien.no_rm=pasien.no_rm where no_registrasi='$z' AND tanggal_reg='$tanggal_hari_ini' group by tanggal_reg")->result();
		}
		public function getdatapasienx($z,$tanggal_hari_ini){
		 	return $this->db->query("Select rawat_inap.no_rm, nama_pasien from rawat_inap join pasien on rawat_inap.no_rm=pasien.no_rm where no_registrasi='$z' and tanggal_keluar='0000-00-00'")->result();
		}
		public function getdataobatz($z){
		 	return $this->db->query("Select kode_obat, nama_obat, stok from obat where kode_obat='$z'")->result();
		}
		public function ceknamaobat($z)
		{
		   $data = $this->db->query("select nama_obat from obat where kode_obat='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_obat;
		   }
		}
		public function cekhargaobat($z)
		{
		   $data = $this->db->query("select harga_jual_obat from obat where kode_obat='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->harga_jual_obat;
		   }
		}
		public function simpanapotiktemp($data){
			$this->db->query("insert into apotik_temp values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')");
		}
		public function tampilapotiktemp(){
		 	return $this->db->query("Select * from apotik_temp")->result();
		}
		public function hapusapotiktemp($z){
		 	$this->db->delete("apotik_temp",array("kode_obat"=> $z));
		}
		public function cekjumlahobat(){
		 	$query= $this->db->query("select kode_obat from apotik_temp");
			return $query->num_rows();
		}
		public function cektotalharga()
		{
		   $data = $this->db->query("select SUM(subtotal) as total_harga from apotik_temp");
		   foreach($data->result() as $row)
		   {
		    return $row->total_harga;
		   }
		}
		public function simpanapt($data){
			$this->db->query("insert into apotik values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')");
		}
		public function simpanaptdetail($tanggal_hari_ini,$no_registrasi){
			$data = $this->db->query("select * from apotik_temp");
			   foreach($data->result() as $row)
			   {
			    	$this->db->query("insert into apotik_detail values('$tanggal_hari_ini','$no_registrasi','$row->kode_obat','$row->harga_jual_obat','$row->jumlah')");
			    	$this->db->query("update obat set stok=stok-$row->jumlah where kode_obat='$row->kode_obat'");
			   }
			$this->db->truncate('apotik_temp');

			if (substr($no_registrasi,0,2) != 'RI') {
				$this->db->query("insert into transaksi_temp values('$no_registrasi')");
			}
			
			
		}


		//Transaksi Billing
		//----------------

		public function ceknoregtrakhir()
		{
		   $data = $this->db->query("select no_registrasi from transaksi_temp LIMIT 1");
		   foreach($data->result() as $row)
		   {
		    return $row->no_registrasi;
		   }
		}
		public function cekstatuspemeriksaan($z)
		{
		   $data = $this->db->query("select pemeriksaan.no_registrasi from pemeriksaan join rawat_inap on rawat_inap.no_registrasi=pemeriksaan.no_registrasi where rawat_inap.no_registrasi='$z' and tanggal_keluar='0000-00-00'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_registrasi;
		   }
		}
		public function ceknoregri($z)
		{
		   $data = $this->db->query("select no_registrasi from rawat_inap where no_pemeriksaan_rawat_inap='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_registrasi;
		   }
		}
		public function ceknoregri22($z)
		{
		   $data = $this->db->query("select no_registrasi from rawat_inap where no_rm='$z' and tanggal_keluar='0000-00-00'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_registrasi;
		   }
		}
		public function tampilnamapasien($z)
		{
		   $data = $this->db->query("select pasien.nama_pasien from pasien join rawat_inap on rawat_inap.no_rm=pasien.no_rm where rawat_inap.no_pemeriksaan_rawat_inap='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_pasien;
		   }
		}
		public function tampilnamapasien2($z,$tanggal_hari_ini)
		{
		   $data = $this->db->query("select pasien.nama_pasien from pasien join pendaftaran_pasien on pendaftaran_pasien.no_rm=pasien.no_rm where pendaftaran_pasien.no_registrasi='$z' and tanggal_reg='$tanggal_hari_ini'");
		   foreach($data->result() as $row)
		   {
		    return $row->nama_pasien;
		   }
		}
		public function tampilapotik($z,$tanggal_hari_ini){
		 	return $this->db->query("Select obat.kode_obat, obat.nama_obat, obat.harga_jual_obat, apotik_detail.jumlah_obat_keluar from apotik join apotik_detail on apotik.tanggal_reg=apotik_detail.tanggal_reg AND apotik.no_registrasi=apotik_detail.no_registrasi join obat on apotik_detail.kode_obat=obat.kode_obat where apotik.no_registrasi='$z' AND apotik.tanggal_reg LIKE '%$tanggal_hari_ini%'")->result();
		}
		public function tampilapotik2($z){
		 	return $this->db->query("select obat.kode_obat, obat.nama_obat, sum(jumlah_obat_keluar) as jumlah_obat_keluar, obat.harga_jual_obat from apotik join apotik_detail on apotik.tanggal_reg=apotik_detail.tanggal_reg AND apotik.no_registrasi=apotik_detail.no_registrasi join obat on apotik_detail.kode_obat=obat.kode_obat join rawat_inap on rawat_inap.no_registrasi=apotik.no_registrasi where rawat_inap.no_pemeriksaan_rawat_inap='$z' AND rawat_inap.tanggal_keluar='0000-00-00' group by obat.kode_obat, apotik_detail.tanggal_reg")->result();
		}
		public function tampilapotik3($z,$no_pemeriksaan_rawat_inap){
		 	return $this->db->query("select obat.kode_obat, obat.nama_obat, sum(jumlah_obat_keluar) as jumlah_obat_keluar, obat.harga_jual_obat from apotik join apotik_detail on apotik.tanggal_reg=apotik_detail.tanggal_reg AND apotik.no_registrasi=apotik_detail.no_registrasi join obat on apotik_detail.kode_obat=obat.kode_obat join rawat_inap on rawat_inap.no_registrasi=apotik.no_registrasi where apotik.no_registrasi='$z' and rawat_inap.no_pemeriksaan_rawat_inap='$no_pemeriksaan_rawat_inap' group by obat.kode_obat, apotik_detail.tanggal_reg")->result();
		}

		public function tampiltindakan($z){
			$data = $this->db->query("Select tindakan_pasien.total_tarif as tarif from pemeriksaan join tindakan_pasien on pemeriksaan.no_tindakan_pasien=tindakan_pasien.no_tindakan_pasien where pemeriksaan.no_registrasi='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->tarif;
		   }
		}
		public function tampiltindakanbayar($z){
			$data = $this->db->query("Select tindakan_pasien.total_tarif as tarif from pemeriksaan join tindakan_pasien on pemeriksaan.no_tindakan_pasien=tindakan_pasien.no_tindakan_pasien join rawat_inap on rawat_inap.no_registrasi=pemeriksaan.no_registrasi where rawat_inap.no_pemeriksaan_rawat_inap='$z' and tanggal_keluar='0000-00-00'");
		   foreach($data->result() as $row)
		   {
		    return $row->tarif;
		   }
		}
		public function tampiltarifdokter($z){
			$data = $this->db->query("Select dokter.tarif as tarif from pemeriksaan join dokter on pemeriksaan.kode_dokter=dokter.kode_dokter where pemeriksaan.no_registrasi='$z'");
		   foreach($data->result() as $row)
		   {
		    return $row->tarif;
		   }
		}
		public function tampiltarifdokterbayar($z){
			$data = $this->db->query("Select dokter.tarif as tarif from pemeriksaan join dokter on pemeriksaan.kode_dokter=dokter.kode_dokter join rawat_inap on rawat_inap.no_registrasi=pemeriksaan.no_registrasi where rawat_inap.no_pemeriksaan_rawat_inap='$z' and tanggal_keluar='0000-00-00'");
		   foreach($data->result() as $row)
		   {
		    return $row->tarif;
		   }
		}
		public function tampiladministrasi($z){
			$data = $this->db->query("Select * from config");
		   foreach($data->result() as $row)
		   {
		    return $row->biaya_administrasi;
		   }
		}
		public function getdatapasien2($z,$tanggal_hari_ini){
		 	return $this->db->query("Select pasien.no_rm, pasien.nama_pasien, pemeriksaan.kode_dokter, dokter.nama_dokter, pemeriksaan.no_pemeriksaan_pasien, pemeriksaan.no_tindakan_pasien, pendaftaran_pasien.kode_poliklinik, poliklinik.nama_poliklinik from pendaftaran_pasien join pasien on pendaftaran_pasien.no_rm=pasien.no_rm
		 		join pemeriksaan on pemeriksaan.no_registrasi=pendaftaran_pasien.no_registrasi
		 		join dokter on pemeriksaan.kode_dokter=dokter.kode_dokter
		 		join poliklinik on poliklinik.kode_poliklinik=pendaftaran_pasien.kode_poliklinik
		 		where pendaftaran_pasien.no_registrasi='$z' AND pendaftaran_pasien.tanggal_reg='$tanggal_hari_ini' group by tanggal_reg")->result();
		}
		public function getdatapasienri2($z){
		 	return $this->db->query("Select pasien.no_rm, pasien.nama_pasien, pemeriksaan.kode_dokter, dokter.nama_dokter, pemeriksaan.no_pemeriksaan_pasien, pemeriksaan.no_tindakan_pasien, ruangan.nama_ruangan, ruangan.tarif, rawat_inap.no_pemeriksaan_rawat_inap from rawat_inap join pasien on rawat_inap.no_rm=pasien.no_rm
		 		join pemeriksaan on pemeriksaan.no_registrasi=rawat_inap.no_registrasi
		 		join dokter on pemeriksaan.kode_dokter=dokter.kode_dokter
		 		join ruangan on ruangan.kode_ruangan=rawat_inap.kode_ruangan
		 		where rawat_inap.no_registrasi='$z' AND rawat_inap.tanggal_keluar='0000-00-00' group by tanggal_keluar")->result();
		}
		public function tampildiagnosapasien($no_rm){
		 	return $this->db->query("Select diagnosa.nama_diagnosa from pemeriksaan_pasien join pemeriksaan_pasien_detail on pemeriksaan_pasien.no_pemeriksaan_pasien=pemeriksaan_pasien_detail.no_pemeriksaan_pasien join diagnosa on pemeriksaan_pasien_detail.kode_diagnosa=diagnosa.kode_diagnosa where pemeriksaan_pasien.no_rm='$no_rm'")->result();
		}
		public function tampiltindakanpasien($no_rm){
		 	return $this->db->query("Select tindakan.nama_tindakan, tindakan.tarif from tindakan_pasien join tindakan_pasien_detail on tindakan_pasien.no_tindakan_pasien=tindakan_pasien_detail.no_tindakan_pasien join tindakan on tindakan_pasien_detail.kode_tindakan=tindakan.kode_tindakan where tindakan_pasien.no_rm='$no_rm'")->result();
		}
		public function simpanbill($data){
			$this->db->query("insert into transaksi values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')");
			$this->db->query("delete from transaksi_temp where no_registrasi='$data[1]'");
			$this->db->query("delete from pemeriksaan where no_registrasi='$data[1]'");
		}
		public function pasienkeluar($no_pemeriksaan_rawat_inap){
			date_default_timezone_set('Asia/Jakarta');
			$tanggal_hari_ini = date('Y-m-d');
			$this->db->query("update rawat_inap set tanggal_keluar='$tanggal_hari_ini' where no_pemeriksaan_rawat_inap='$no_pemeriksaan_rawat_inap'");
		}


		//Config
		//----------------

		public function tampiltabel()
		{
		   return $this->db->query("show tables")->result();
		}
		public function tampilconfig2()
		{
		   return $this->db->query("Select tekslogo, logo, alamat, no_telp from config")->result();
		}
		public function tampilconfigpenjamin()
		{
		   
		   $data = $this->db->query("Select penjamin from config");
		   foreach($data->result() as $row)
		   {
		    return $row->penjamin;
		   }
		}
		public function tampilconfigpekerjaan()
		{
		   
		   $data = $this->db->query("Select pekerjaan from config");
		   foreach($data->result() as $row)
		   {
		    return $row->pekerjaan;
		   }
		}

		public function gantilogo($fotoupload){
		 	$this->db->query("update config set logo='$fotoupload' where no=0");
		}



		//LAPORAN
		//----------------------------
		public function tampilpasienlaporan($tanggal_awal,$tanggal_akhir,$jenis_kunjungan){
		 	return $this->db->query("Select * from pendaftaran_pasien join pasien on pasien.no_rm=pendaftaran_pasien.no_rm join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where tanggal_reg BETWEEN '$tanggal_awal' AND '$tanggal_akhir' and jenis_kunjungan='$jenis_kunjungan'")->result();
		}
		public function tampilpasienlaporan1($tanggal_awal,$tanggal_akhir){
		 	return $this->db->query("Select * from pendaftaran_pasien join pasien on pasien.no_rm=pendaftaran_pasien.no_rm join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where tanggal_reg BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->result();
		}
		public function tampilpasienlaporanpenjamin($tanggal_awal,$tanggal_akhir,$penjamin){
		 	return $this->db->query("Select * from pendaftaran_pasien join pasien on pasien.no_rm=pendaftaran_pasien.no_rm join provinces on pasien.id_prov = provinces.id join regencies on pasien.id_kab = regencies.id join districts on pasien.id_kec = districts.id join villages on pasien.id_kel = villages.id where tanggal_reg BETWEEN '$tanggal_awal' AND '$tanggal_akhir' and penjamin LIKE '%$penjamin%'")->result();
		}
		public function tampilpenyakitlaporan($tanggal_awal,$tanggal_akhir){
		 	return $this->db->query("select transaksi.no_pemeriksaan_pasien, diagnosa.kode_diagnosa, diagnosa.nama_diagnosa, count(transaksi.no_pemeriksaan_pasien) AS jumlah FROM transaksi join pemeriksaan_pasien_detail on pemeriksaan_pasien_detail.no_pemeriksaan_pasien=transaksi.no_pemeriksaan_pasien join diagnosa on pemeriksaan_pasien_detail.kode_diagnosa=diagnosa.kode_diagnosa WHERE transaksi.tanggal_reg BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY diagnosa.kode_diagnosa ORDER BY jumlah DESC LIMIT 10")->result();
		}
		public function tampilpendapatanlaporan($tanggal_awal,$tanggal_akhir){
		 	return $this->db->query("select tanggal_reg, sum(total_harga_obat) as tho FROM apotik WHERE tanggal_reg BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY CAST(tanggal_reg AS DATE)")->result();
		}
		public function tampilpendapatanlaporanrj($tanggal_awal,$tanggal_akhir){
		 	return $this->db->query("select * from transaksi join pasien on pasien.no_rm=transaksi.no_rm where kode_poliklinik!='PRI' order by tanggal_reg")->result();
		}
		public function tampilpendapatanlaporanri($tanggal_awal,$tanggal_akhir){
		 	return $this->db->query("select * from transaksi join pasien on pasien.no_rm=transaksi.no_rm where kode_poliklinik='PRI' order by tanggal_reg")->result();
		}




		//SETTING
		//----------------------------------
		public function simpansetting($data){
			$this->db->where("no","0");
			$this->db->update("config",$data);
		}
		public function simpansetting2($data){
			$this->db->query("update config set tekslogo='$data' where no=0");
		}
		public function ubahlogo($data){
			$this->db->where("no","0");
			$this->db->update("config",$data);
		}
		public function getdatapin($kode_petugas,$z){
			$z2 = md5($z);
		 	return $this->db->query("select kode_petugas from petugas where kode_petugas='$kode_petugas' AND pin='$z2'")->result();
		}
		public function getdatapin2($kode_dokter,$z){
			$z2 = md5($z);
		 	return $this->db->query("select kode_dokter from dokter where kode_dokter='$kode_dokter' AND pin='$z2'")->result();
		}
		public function updatepenjamin($penjamin){
		 	$this->db->query("update config set penjamin='$penjamin' where no=0");
		}
		public function updatepekerjaan($pekerjaan){
		 	$this->db->query("update config set pekerjaan='$pekerjaan' where no=0");
		}
		public function simpanpin($data,$kode_petugas){
			$this->db->where("kode_petugas",$kode_petugas);
			$this->db->update("petugas",$data);
		}
		public function simpanpin2($data,$kode_dokter){
			$this->db->where("kode_dokter",$kode_dokter);
			$this->db->update("dokter",$data);
		}










		public function laporanditerima(){
		 	return $this->db->query("Select * from laporan join member on laporan.no_member=member.no_member join kategori on laporan.no_kategori=kategori.no_kategori where laporan.status='2' order by laporan.no_laporan DESC LIMIT 6")->result();
		}

		public function laporanditolak(){
		 	return $this->db->query("Select * from laporan join member on laporan.no_member=member.no_member join kategori on laporan.no_kategori=kategori.no_kategori where laporan.status='3' order by laporan.no_laporan DESC LIMIT 6")->result();
		}

		public function stat_lap(){
		 	$query= $this->db->query('select * from laporan');
			return $query->num_rows();
		}

		public function stat_dt(){
		 	$query= $this->db->query("select * from laporan where status='2'");
			return $query->num_rows();
		}



		public function laporan($no_laporan){
		 	return $this->db->query("Select * from laporan join member on laporan.no_member=member.no_member join kategori on laporan.no_kategori=kategori.no_kategori where laporan.no_laporan='$no_laporan'")->result();
		}
		public function cekjudul($no_laporan)
		{
		   $data = $this->db->query("Select judul from laporan where no_laporan='$no_laporan'");
		   foreach($data->result() as $row)
		   {
		    return $row->judul;
		   }
		}
		public function cekview($no_laporan)
		{
		   $data = $this->db->query("select view from laporan where no_laporan='$no_laporan'");
		   foreach($data->result() as $row)
		   {
		    return $row->view;
		   }
		}
		public function updateview($no_laporan, $view2){
			$this->db->query("update laporan set view='$view2' where no_laporan='$no_laporan'");
		}

		public function cari($cari){
		 	return $this->db->query("Select * from laporan join member on laporan.no_member=member.no_member join kategori on laporan.no_kategori=kategori.no_kategori WHERE laporan.no_laporan='$cari' order by laporan.no_laporan DESC LIMIT 6")->result();
		}
		public function cari2($cari){
		 	return $this->db->query("Select * from laporan join member on laporan.no_member=member.no_member join kategori on laporan.no_kategori=kategori.no_kategori WHERE laporan.judul LIKE '%$cari%' order by laporan.no_laporan DESC LIMIT 6")->result();
		}
		public function pointmember(){
		 	return $this->db->query("Select * from member order by point desc LIMIT 4")->result();
		}
		public function kirimlaporan($data){
			$this->db->query("insert into laporan values('','". mysql_real_escape_string($data[0]) ."','". mysql_real_escape_string($data[1])."','$data[2]','1','$data[3]','1','$data[4]')");
		}
		public function ceknomorlaporan($no_member)
		{
		   $data = $this->db->query("select laporan.no_laporan FROM laporan JOIN member ON laporan.no_member=member.no_member WHERE member.no_member='$no_member' ORDER BY laporan.no_laporan DESC LIMIT 1");
		   foreach($data->result() as $row)
		   {
		    return $row->no_laporan;
		   }
		}
		public function keterangan($no_laporan)
		{
		   $data = $this->db->query("select keterangan FROM keterangan where no_laporan='$no_laporan' ORDER BY no_keterangan DESC LIMIT 1");
		   foreach($data->result() as $row)
		   {
		    return $row->keterangan;
		   }
		}
		public function lapor($no_member2){
		 	$query= $this->db->query("select * from laporan join member on laporan.no_member=member.no_member where laporan.no_member='$no_member2'");
			return $query->num_rows();
		}
		public function daftarlaporan($no_member){
		 	return $this->db->query("Select * from laporan join member on laporan.no_member=member.no_member join kategori on laporan.no_kategori=kategori.no_kategori where laporan.no_member='$no_member' order by laporan.no_laporan DESC LIMIT 6")->result();
		}

		public function hapuslaporan($no_laporan){
			$this->db->delete("laporan",array("no_laporan"=> $no_laporan));
		}
		public function hapusmember($no_member){
			$this->db->delete("member",array("no_member"=> $no_member));
		}
	
		public function cekpoint($no_member)
		{
		   $data = $this->db->query("select point from member where no_member='$no_member'");
		   foreach($data->result() as $row)
		   {
		    return $row->point;
		   }
		}
		public function updatepoint($no_member, $point2){
			$this->db->query("update member set point='$point2' where no_member='$no_member'");
		}
		
		public function carimember($cari){
		 	return $this->db->query("Select * from member where nama LIKE '%$cari%' order by no_member DESC LIMIT 6")->result();
		}
		
	
		public function member($no_member){
		 	return $this->db->query("Select * from member where no_member='$no_member'")->result();
		}
		public function tampilmember(){
		 	return $this->db->query("Select * from member order by no_member DESC LIMIT 6")->result();
		}
		

		
		public function ceknomor($email)
		{
		   $data = $this->db->query("Select no_member from member where email='$email'");
		   foreach($data->result() as $row)
		   {
		    return $row->no_member;
		   }
		}
		
		public function daftar($data){
			$this->db->query("insert into member values('','$data[0]','$data[1]','$data[2]','$data[3]','','noimage.png','','','',0,'$data[4]')");
		}
		public function simpanketerangan($data){
			$this->db->query("insert into keterangan values('','$data[0]','$data[1]')");
		}
		public function updateditolak($no_laporan){
			$this->db->query("update laporan set status='3' where no_laporan='$no_laporan'");
		}
		public function updatediterima($no_laporan){
			$this->db->query("update laporan set status='2' where no_laporan='$no_laporan'");
		}
		
		
	}
?>