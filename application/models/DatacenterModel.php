<?php
	class DatacenterModel extends CI_Model{

        //---AKUN--//

		 

          public function ceklogin($username, $password){

            $data = $this->db->query("Select username from tb_user where username='$username' and password=md5('$password')");
                
        
            
            foreach($data->result() as $row)
            {
             return $row->username;
            }
 
          }

          public function lastlogin($id_user){
            date_default_timezone_set('Asia/Jakarta');
            $now = date('Y-m-d H:i:s');
            $data = $this->db->query("Update tb_user set last_login = '$now' where id_user='$id_user' ");
            
 
          }


          public function cekiduser($username){  
          $data = $this->db->query("Select id_user from tb_user where username='$username'");
            foreach($data->result() as $row)
              {
              return $row->id_user;
              }
            }

            public function ceknamauser($id_user){  
            $data = $this->db->query("Select nama_user from tb_user where id_user='$id_user'");
              foreach($data->result() as $row)
                {
                return $row->nama_user;
                }
              }
          
          public function cekleveluser($id_user){  
            $data = $this->db->query("Select level_user from tb_user where id_user='$id_user'");
              foreach($data->result() as $row)
                  {
                  return $row->level_user;
                  }
              }
          
          public function cekphotouser($id_user){  
            $data = $this->db->query("Select photo from tb_user where id_user='$id_user'");
              foreach($data->result() as $row)
                  {
                  return $row->photo;
                  }
              }

          public function tampiljmlserver(){
              return $this->db->query("Select count(id_server) as jmlserver from tb_server")->result();
              }

          public function tampiljmluser(){
              return $this->db->query("Select count(id_user) as jmluser from tb_user")->result();
              }
          
          public function tampiljmlsistem(){
              return $this->db->query("Select count(id_sistem) as jmlsistem from tb_sistem")->result();
              }

          public function tampiljmlram(){
              return $this->db->query("Select count(id_ram) as ram from tb_ram")->result();
              }
          public function tampiljmlprosesor(){
              return $this->db->query("Select count(id_prosesor) as prosesor from tb_prosesor")->result();
              }
          public function tampiljmlstorage(){
              return $this->db->query("Select count(id_prosesor) as storage from tb_prosesor")->result();
              }
          public function tampiljmlkabel(){
              return $this->db->query("Select count(id_kabel) as kabel from tb_kabel")->result();
              }    
          
          public function tampiljmlvps(){
              return $this->db->query("Select count(id_vps) as jmlvps from tb_vps")->result();
              }


          //---AKUN ADMIN--//
            public function tampilakunadmin($id_user){
              return $this->db->query("Select * from tb_user where id_user = '$id_user'")->result();
              }
            public function tampiluser(){
            return $this->db->query("Select * from tb_user")->result();
            }

            public function ubahuser($id_user){
                return $this->db->query("Select * from tb_user where id_user = '$id_user'")->result();
                }

            public function hapususer($id_user){
            $this->db->query("delete from tb_user where id_user='$id_user'");
            }

            public function tambahuser($data){
                $this->db->query("insert into tb_user values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','0')");
            }

            public function ubahuser1($data){
              if ($data[4]=='') {
                  if ($data[1]=='') {
                    $this->db->query("update tb_user set username='$data[0]', nama_user='$data[2]',email='$data[3]', level_user = '$data[5]' where id_user = '$data[6]' ");
                  }else{
                    $this->db->query("update tb_user set username='$data[0]', password=md5('$data[1]'), nama_user='$data[2]',email='$data[3]', level_user = '$data[5]' where id_user = '$data[6]' ");
                  }
                 
              }else{
                if ($data[1]=='') {
                  $this->db->query("update tb_user set username='$data[0]', nama_user='$data[2]',email='$data[3]',photo='$data[4]', level_user = '$data[5]' where id_user = '$data[6]' ");
                }else{
                  $this->db->query("update tb_user set username='$data[0]', password=md5('$data[1]'), nama_user='$data[2]',email='$data[3]',photo='$data[4]', level_user = '$data[5]' where id_user = '$data[6]' ");
                }
                
              }
            }

            public function ubahuseradmin1($data){
              if ($data[4]=='') {
                  if ($data[1]=='') {
                    $this->db->query("update tb_user set username='$data[0]', nama_user='$data[2]',email='$data[3]' where id_user = '$data[5]' ");
                  }else{
                    $this->db->query("update tb_user set username='$data[0]', password=md5('$data[1]'), nama_user='$data[2]',email='$data[3]' where id_user = '$data[5]' ");
                  }
                 
              }else{
                if ($data[1]=='') {
                  $this->db->query("update tb_user set username='$data[0]', nama_user='$data[2]',email='$data[3]',photo='$data[4]' where id_user = '$data[5]' ");
                }else{
                  $this->db->query("update tb_user set username='$data[0]', password=md5('$data[1]'), nama_user='$data[2]',email='$data[3]',photo='$data[4]' where id_user = '$data[5]' ");
                }
                
              }
            }
            
            public function ubahuserteknisi1($data){
              if ($data[4]=='') {
                  if ($data[1]=='') {
                    $this->db->query("update tb_user set username='$data[0]', nama_user='$data[2]',email='$data[3]' where id_user = '$data[5]' ");
                  }else{
                    $this->db->query("update tb_user set username='$data[0]', password=md5('$data[1]'), nama_user='$data[2]',email='$data[3]' where id_user = '$data[5]' ");
                  }
                 
              }else{
                if ($data[1]=='') {
                  $this->db->query("update tb_user set username='$data[0]', nama_user='$data[2]',email='$data[3]',photo='$data[4]' where id_user = '$data[5]' ");
                }else{
                  $this->db->query("update tb_user set username='$data[0]', password=md5('$data[1]'), nama_user='$data[2]',email='$data[3]',photo='$data[4]' where id_user = '$data[5]' ");
                }
                
              }
            }

            public function tampilhistoryuser($id_user){
              return $this->db->query("Select * from tb_log join tb_user on tb_log.id_user = tb_user.id_user where tb_user.id_user='$id_user' order by waktu desc")->result();
            }

            public function tampilkomponen(){
                return $this->db->query("Select * from tb_komponen")->result();
                }

            public function tampilsemuaprosesor(){
              return $this->db->query("Select * from tb_prosesor")->result();
              }
            public function tampilprosesor(){
              return $this->db->query("Select * from tb_prosesor join tb_server on tb_prosesor.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
              }

            public function hapusprosesor($id_prosesor){
            $this->db->query("delete from tb_prosesor where id_prosesor='$id_prosesor'");
            }
  
            public function tambahprosesor($data){
                $this->db->query("insert into tb_prosesor values('','$data[0]','$data[1]','$data[2]','$data[3]','GANTI')");
            }
            public function ubahprosesor($id_prosesor){
              return $this->db->query("Select * from tb_prosesor where id_prosesor = '$id_prosesor'")->result();
              }
            public function ubahprosesor1($data){
                $this->db->query("update tb_prosesor set id_server ='$data[0]', nama_prosesor='$data[1]',jml_core='$data[2]',ket_prosesor='$data[3]' where id_prosesor = '$data[4]' ");
            }

            public function tampilsemuaram(){
              return $this->db->query("Select * from tb_ram")->result();
              }

            public function tampilram(){
              return $this->db->query("Select * from tb_ram join tb_server on tb_ram.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
              }

            public function hapusram($id_ram){
            $this->db->query("delete from tb_ram where id_ram='$id_ram'");
            }
  
            public function tambahram($data){
                $this->db->query("insert into tb_ram values('','$data[0]','$data[1]','$data[2]','$data[3]','GANTI')");
            }
            public function ubahram($id_ram){
              return $this->db->query("Select * from tb_ram where id_ram = '$id_ram'")->result();
              }
            public function ubahram1($data){
                $this->db->query("update tb_ram set id_server ='$data[0]', nama_ram='$data[1]',ukuran_ram='$data[2]',ket_ram='$data[3]' where id_ram = '$data[4]' ");
            }

            

            // storage
            public function tampilstorage(){
              return $this->db->query("Select * from tb_storage join tb_server on tb_storage.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
              }

            public function hapusstorage($id_storage){
            $this->db->query("delete from tb_storage where id_storage='$id_storage'");
            }
  
            public function tambahstorage($data){
                $this->db->query("insert into tb_storage values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','GANTI')");
            }
            public function ubahstorage($id_storage){
              return $this->db->query("Select * from tb_storage where id_storage = '$id_storage'")->result();
              }
            public function ubahstorage1($data){
                $this->db->query("update tb_storage set id_server ='$data[0]', nama_storage='$data[1]',ukuran_storage='$data[2]',tipe_storage='$data[3]',ket_storage='$data[4]' where id_storage = '$data[5]' ");
            }

            // kabel
            public function tampilkabel(){
              return $this->db->query("Select * from tb_kabel join tb_server on tb_kabel.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
              }

            public function hapuskabel($id_kabel){
            $this->db->query("delete from tb_kabel where id_kabel='$id_kabel'");
            }
  
            public function tambahkabel($data){
                $this->db->query("insert into tb_kabel values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','GANTI')");
            }
            public function ubahkabel($id_kabel){
              return $this->db->query("Select * from tb_kabel where id_kabel = '$id_kabel'")->result();
              }
            public function ubahkabel1($data){
                $this->db->query("update tb_kabel set id_server ='$data[0]', nama_kabel='$data[1]',jns_kabel='$data[2]',kec_kabel='$data[3]',ket_kabel='$data[4]' where id_kabel = '$data[5]' ");
            }

            public function tampiladminlemari(){
              return $this->db->query("Select * from tb_lemari 
                                      join tb_ruangan on tb_lemari.id_ruangan = tb_ruangan.id_ruangan
                                      ")->result();
            }
            
            public function tambahlemari($data){
              $this->db->query("insert into tb_lemari values('','$data[0]','$data[1]','$data[2]')");
            }

            public function ubahlemari($id_lemari){
              return $this->db->query("Select * from tb_lemari where id_lemari = '$id_lemari'")->result();
              }
            public function ubahlemari1($data){
                $this->db->query("update tb_lemari set id_ruangan='$data[0]',nama_lemari='$data[1]',slotrack='$data[2]' where id_lemari = '$data[3]' ");
            }

            public function tampiladminrak(){
              return $this->db->query("Select * from tb_rack 
                                      join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari
                                      join tb_ruangan on tb_lemari.id_ruangan = tb_ruangan.id_ruangan                        
                                      ")->result();
            }
            
            public function tambahrak($data){
              $this->db->query("insert into tb_rack values('','$data[0]','$data[1]')");
            }

            public function ubahrak($id_rack){
              return $this->db->query("Select * from tb_rack where id_rack = '$id_rack'")->result();
              }
            public function ubahrak1($data){
                $this->db->query("update tb_rack set id_lemari='$data[0]',nama_rack='$data[1]' where id_rack = '$data[2]' ");
            }

            //ruangan
            public function tambahruangan($data){
              $this->db->query("insert into tb_ruangan values('','$data[0]')");
            }

            public function ubahruangan($id_ruangan){
              return $this->db->query("Select * from tb_ruangan where id_ruangan = '$id_ruangan'")->result();
              }
            public function ubahruangan1($data){
                $this->db->query("update tb_ruangan set nama_ruangan='$data[0]' where id_ruangan = '$data[1]' ");
            }

            public function tampiladminserver(){
              return $this->db->query("Select * from tb_server 
                                      join tb_rack on tb_server.id_rack = tb_rack.id_rack
                                                              
                                      ")->result();
            }

            public function tambahserver($data){
              $this->db->query("insert into tb_server values('','$data[0]','$data[1]')");
            }

            public function ubahserver($id_server){
              return $this->db->query("Select * from tb_server where id_server = '$id_server'")->result();
              }
            public function ubahserver1($data){
                $this->db->query("update tb_server set id_rack='$data[0]',nama_server='$data[1]' where id_server = '$data[2]' ");
            }

            public function tampiladminvps(){
              return $this->db->query("Select * from tb_vps 
                                      join tb_server on tb_vps.id_server = tb_server.id_server
                                      join tb_user on tb_vps.id_user = tb_user.id_user
                                      ")->result();
            }

            //left outer join tb_prosesor on tb_vps.prosesor_vps = tb_prosesor.id_prosesor                  
            
            public function tambahvps($data){
              $this->db->query("insert into tb_vps values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");
            }

            public function ubahvps($id_vps){
              return $this->db->query("Select * from tb_vps where id_vps = '$id_vps'")->result();
              }
            public function ubahvps1($data){
                $this->db->query("update tb_vps set id_server ='$data[0]', nama_vps='$data[1]',prosesor_vps='$data[2]',ukuran_harddiskvps='$data[3]',ukuran_ramvps='$data[4]',os_vps='$data[5]',id_user='$data[6]' where id_vps = '$data[7]' ");
            }

            public function tampiladminsistem(){
              return $this->db->query("Select * from tb_sistem 
                                      join tb_vps on tb_sistem.id_vps = tb_vps.id_vps
                                      ")->result();
            }

            public function tambahsistem($data){
              $this->db->query("insert into tb_sistem values('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')");
            }
            
            public function ubahsistem($id_sistem){
              return $this->db->query("Select * from tb_sistem where id_sistem = '$id_sistem'")->result();
              }
            public function ubahsistem1($data){
                $this->db->query("update tb_sistem set id_vps ='$data[0]', nama_sistem='$data[1]',alamat_sistem='$data[2]',deskripsi='$data[3]',tahun='$data[4]' where id_sistem = '$data[5]' ");
            }

            public function tampiladminlog(){
              return $this->db->query("Select * from tb_log 
                                      join tb_user on tb_log.id_user = tb_user.id_user
                                      ")->result();
            }

            public function hapuslog($id_log){
              $this->db->query("delete from tb_log where id_log='$id_log'");
              }
                
            //---AKUN TEKNISI--//    
            public function tampilakunteknisi($id_user){
              return $this->db->query("Select * from tb_user where id_user = '$id_user'")->result();
              }

            public function ubahakunteknisi($data){
              $this->db->query("update tb_user set username='$data[0]', password=md5('$data[1]'), nama_user='$data[2]',email='$data[3]',photo='$data[4]' where id_user = '$data[5]' ");
            }    
            
            public function tampilteknisiprosesor(){
              return $this->db->query("Select * from tb_prosesor join tb_server on tb_prosesor.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
            }

            public function tampilhistoryprosesor(){
              return $this->db->query("Select * from tb_log join tb_user on tb_log.id_user = tb_user.id_user where halaman='Prosesor' order by waktu desc")->result();
            }

            public function tampilprosesordetail($id_prosesor){
              return $this->db->query("Select * from tb_prosesor join tb_server on tb_prosesor.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari where id_prosesor = '$id_prosesor'")->result();
            }

            public function ubahprosesordetail($data){
              $this->db->query("update tb_prosesor set status_prosesor='$data[0]' where id_prosesor = '$data[1]' ");
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','Prosesor','$data[2] di Server $data[3] di ubah status menjadi $data[0]','$now') ");
            } 
            public function pindahprosesordetail($data){
              $this->db->query("update tb_prosesor set id_server='$data[0]' where id_prosesor = '$data[1]' ");
              $namaserver = $this->db->query("select nama_server from tb_server where id_server = '$data[0]' ");
              $row = $namaserver->row();
              $server = $row->nama_server;
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','Prosesor','$data[2] di pindah dari Server $data[3] ke Server $server','$now') ");
            } 

            public function tampilteknisiram(){
              return $this->db->query("Select * from tb_ram join tb_server on tb_ram.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
            }

            public function tampilhistoryram(){
              return $this->db->query("Select * from tb_log join tb_user on tb_log.id_user = tb_user.id_user where halaman='RAM' order by waktu desc")->result();
            }

            public function tampilramdetail($id_ram){
              return $this->db->query("Select * from tb_ram join tb_server on tb_ram.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari where id_ram = '$id_ram'")->result();
            }

            public function ubahramdetail($data){
              $this->db->query("update tb_ram set status_ram='$data[0]' where id_ram = '$data[1]' ");
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','RAM','$data[2] di Server $data[3] di ubah status menjadi $data[0]','$now') ");
            } 

            public function pindahramdetail($data){
              $this->db->query("update tb_ram set id_server='$data[0]' where id_ram = '$data[1]' ");
              $namaserver = $this->db->query("select nama_server from tb_server where id_server = '$data[0]' ");
              $row = $namaserver->row();
              $server = $row->nama_server;
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','RAM','$data[2] di pindah dari Server $data[3] ke Server $server','$now') ");
            }



            public function tampilteknisistorage(){
              return $this->db->query("Select * from tb_storage join tb_server on tb_storage.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
            }

            public function tampilhistorystorage(){
              return $this->db->query("Select * from tb_log join tb_user on tb_log.id_user = tb_user.id_user where halaman='Storage' order by waktu desc")->result();
            }

            public function tampilstoragedetail($id_storage){
              return $this->db->query("Select * from tb_storage join tb_server on tb_storage.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari where id_storage = '$id_storage'")->result();
            }

            public function ubahstoragedetail($data){
              $this->db->query("update tb_storage set status_storage='$data[0]' where id_storage = '$data[1]' ");
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','Storage','$data[2] di Server $data[3] di ubah status menjadi $data[0]','$now') ");
            } 

            public function pindahstoragedetail($data){
              $this->db->query("update tb_storage set id_server='$data[0]' where id_storage = '$data[1]' ");
              $namaserver = $this->db->query("select nama_server from tb_server where id_server = '$data[0]' ");
              $row = $namaserver->row();
              $server = $row->nama_server;
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','Storage','$data[2] di pindah dari Server $data[3] ke Server $server','$now') ");
            }

            public function tampilteknisikabel(){
              return $this->db->query("Select * from tb_kabel join tb_server on tb_kabel.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari")->result();
            }

            public function tampilhistorykabel(){
              return $this->db->query("Select * from tb_log join tb_user on tb_log.id_user = tb_user.id_user where halaman='Kabel' order by waktu desc")->result();
            }

            public function tampilkabeldetail($id_kabel){
              return $this->db->query("Select * from tb_kabel join tb_server on tb_kabel.id_server = tb_server.id_server join tb_rack on tb_server.id_rack = tb_rack.id_rack join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari where id_kabel = '$id_kabel'")->result();
            }

            public function ubahkabeldetail($data){
              $this->db->query("update tb_kabel set status_kabel='$data[0]' where id_kabel = '$data[1]' ");
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','Kabel','$data[2] di Server $data[3] di ubah status menjadi $data[0]','$now') ");
            } 

            public function pindahkabeldetail($data){
              $this->db->query("update tb_kabel set id_server='$data[0]' where id_kabel = '$data[1]' ");
              $namaserver = $this->db->query("select nama_server from tb_server where id_server = '$data[0]' ");
              $row = $namaserver->row();
              $server = $row->nama_server;
              date_default_timezone_set('Asia/Jakarta');
              $now = date('Y-m-d H:i:s');
              $this->db->query("insert into tb_log values ('','$data[4]','Kabel','$data[2] di pindah dari Server $data[3] ke Server $server','$now') ");
            }

            public function tampilsemuaruangan(){
              return $this->db->query("Select * from tb_ruangan")->result();
            }

            public function hapusruangan($id_ruangan){
              $this->db->query("delete from tb_ruangan where id_ruangan='$id_ruangan'");
              }

            public function tampildetailruangan($id_ruangan){
              return $this->db->query("Select * from tb_ruangan where tb_ruangan.id_ruangan='$id_ruangan'")->result();
            }

            public function jmlruanganlemari($id_ruangan){
              return $this->db->query("Select count(id_lemari) as jml from tb_ruangan
                                      join tb_lemari on tb_ruangan.id_ruangan = tb_lemari.id_ruangan 
                                      where tb_ruangan.id_ruangan='$id_ruangan'")->result();
            }

            public function jmlruanganrack($id_ruangan){
              return $this->db->query("Select count(id_rack) as jml from tb_ruangan
                                      join tb_lemari on tb_ruangan.id_ruangan = tb_lemari.id_ruangan 
                                      join tb_rack on tb_lemari.id_lemari = tb_rack.id_lemari
                                      where tb_ruangan.id_ruangan='$id_ruangan'")->result();
            }

            public function jmlruanganserver($id_ruangan){
              return $this->db->query("Select count(id_server) as jml from tb_ruangan
                                      join tb_lemari on tb_ruangan.id_ruangan = tb_lemari.id_ruangan 
                                      join tb_rack on tb_lemari.id_lemari = tb_rack.id_lemari
                                      join tb_server on tb_rack.id_rack = tb_server.id_rack
                                      where tb_ruangan.id_ruangan='$id_ruangan'")->result();
            }

            // Lemari
            public function tampilsemualemari(){
              return $this->db->query("Select * from tb_lemari")->result();
            }

            public function hapuslemari($id_lemari){
              $this->db->query("delete from tb_lemari where id_lemari='$id_lemari'");
              }

            public function tampildetaillemari($id_lemari){
              return $this->db->query("Select * from tb_lemari where tb_lemari.id_lemari='$id_lemari'")->result();
            }

            public function tampillemariruangan($id_lemari){
              return $this->db->query("Select * from tb_lemari 
                                      join tb_ruangan on tb_lemari.id_ruangan = tb_ruangan.id_ruangan
                                      where tb_lemari.id_lemari='$id_lemari'")->result();
            }

            public function jmllemarirack($id_lemari){
              return $this->db->query("Select count(id_rack) as jml from tb_lemari
                                      join tb_rack on tb_lemari.id_lemari = tb_rack.id_lemari
                                      where tb_lemari.id_lemari='$id_lemari'")->result();
            }

            public function jmllemariserver($id_lemari){
              return $this->db->query("Select count(id_server) as jml from tb_lemari
                                      join tb_rack on tb_lemari.id_lemari = tb_rack.id_lemari
                                      join tb_server on tb_rack.id_rack = tb_server.id_rack
                                      where tb_lemari.id_lemari='$id_lemari'")->result();
            }

            // Rak
            public function tampilsemuarack(){
              return $this->db->query("Select * from tb_rack")->result();
            }

            public function hapusrak($id_rak){
              $this->db->query("delete from tb_rack where id_rack='$id_rak'");
              }

            public function tampildetailrack($id_rack){
              return $this->db->query("Select * from tb_rack left join tb_server on tb_rack.id_rack = tb_server.id_rack where tb_rack.id_rack='$id_rack'")->result();
            }

            public function tampilrackruangan($id_rack){
              return $this->db->query("Select * from tb_rack 
                                      join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari
                                      join tb_ruangan on tb_lemari.id_ruangan = tb_ruangan.id_ruangan
                                      where tb_rack.id_rack='$id_rack'")->result();
            }

            public function tampilracklemari($id_rack){
              return $this->db->query("Select * from tb_rack 
                                      join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari
                                      where tb_rack.id_rack='$id_rack'")->result();
            }
            
            // SERVER

            public function tampilsemuaserver(){
              return $this->db->query("Select * from tb_server")->result();
            }

            public function hapusserver($id_server){
              $this->db->query("delete from tb_server where id_server='$id_server'");
              }

            public function tampildetailserver($id_server){
              return $this->db->query("Select * from tb_server 
                                    join tb_rack on tb_rack.id_rack = tb_server.id_rack 
                                    join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari
                                    join tb_ruangan on tb_lemari.id_ruangan = tb_ruangan.id_ruangan
                                    where tb_server.id_server='$id_server'")->result();
            }

            public function tampilspekserverprosesor($id_server){
              return $this->db->query("Select * from tb_server 
              join tb_prosesor on tb_prosesor.id_server = tb_server.id_server
              where tb_server.id_server='$id_server'
              and tb_prosesor.status_prosesor <> 'RUSAK'")->result();
            }

            public function tampilspekserverstorage($id_server){
              return $this->db->query("Select * from tb_server 
              join tb_storage on tb_storage.id_server = tb_server.id_server
              where tb_server.id_server='$id_server'
              and tb_storage.status_storage <> 'RUSAK'")->result();
            }

            public function tampiljmlserverstorage($id_server){
              return $this->db->query("Select SUM(tb_storage.ukuran_storage) as ukuran from tb_server 
              join tb_storage on tb_storage.id_server = tb_server.id_server
              where tb_server.id_server='$id_server'
              and tb_storage.status_storage <> 'RUSAK'")->result();
            }

            public function tampilspekserverram($id_server){
              return $this->db->query("Select * from tb_server 
              join tb_ram on tb_ram.id_server = tb_server.id_server
              where tb_server.id_server='$id_server'
              and tb_ram.status_ram <> 'RUSAK'")->result();
            }

            public function tampiljmlserverram($id_server){
              return $this->db->query("Select SUM(tb_ram.ukuran_ram) as ukuran from tb_server 
              join tb_ram on tb_ram.id_server = tb_server.id_server
              where tb_server.id_server='$id_server'
              and tb_ram.status_ram <> 'RUSAK'")->result();
            }

            public function tampilspekserverkabel($id_server){
              return $this->db->query("Select * from tb_server 
              join tb_kabel on tb_kabel.id_server = tb_server.id_server
              where tb_server.id_server='$id_server'
              and tb_kabel.status_kabel <> 'RUSAK'")->result();
            }

            public function tampilstorageserverterpakai($id_server){
              return $this->db->query("Select SUM(ukuran_harddiskvps) as terpakai from tb_server 
                                    join tb_vps on tb_vps.id_server = tb_server.id_server 
                                    where tb_server.id_server='$id_server'")->result();
            }

            //DETAIL SISTEM


            public function tampildetailsistem($id_sistem){
              return $this->db->query("Select * from tb_sistem 
                                    join tb_vps on tb_sistem.id_vps = tb_vps.id_vps 
                                    where tb_sistem.id_sistem='$id_sistem'")->result();
            }

            //Select * from tb_server join tb_ram on tb_ram.id_server = tb_server.id_server join tb_storage on tb_storage.id_server = tb_server.id_server join tb_kabel on tb_kabel.id_server = tb_server.id_server join tb_prosesor on tb_prosesor.id_server = tb_server.id_server where tb_server.id_server='2' and tb_prosesor.status_prosesor <> 'RUSAK'
              
            
            // VPS

            public function tampilsemuavps(){
              return $this->db->query("Select * from tb_vps join tb_user on tb_user.id_user = tb_vps.id_user")->result();
            }

            public function tampilsemuavps2(){
              return $this->db->query("Select * from tb_vps")->result();
            }

            public function hapusvps($id_vps){
              $this->db->query("delete from tb_vps where id_vps='$id_vps'");
              }

            public function tampilsemuavpsdetail($id_vps){
              return $this->db->query("Select * from tb_vps join tb_user on tb_user.id_user = tb_vps.id_user where tb_vps.id_vps='$id_vps'")->result();
            }
            public function tampildetailvps($id_vps){
              return $this->db->query("Select * from tb_vps
                                      join tb_server on tb_server.id_server = tb_vps.id_server
                                      join tb_rack on tb_rack.id_rack = tb_server.id_rack 
                                      join tb_lemari on tb_rack.id_lemari = tb_lemari.id_lemari
                                      where tb_vps.id_vps='$id_vps'")->result();
            }

            public function tampilvpsprosesor($id_vps){
              return $this->db->query("Select * from tb_vps 
              join tb_server on tb_server.id_server = tb_vps.id_server
              join tb_prosesor on tb_server.id_server = tb_prosesor.id_server
              where tb_vps.id_vps='$id_vps'
              and tb_prosesor.status_prosesor <> 'RUSAK'")->result();
            }

            // Sistem
            
            public function tampilsemuasistem(){
              return $this->db->query("Select * from tb_sistem")->result();
            }

            public function hapussistem($id_sistem){
              $this->db->query("delete from tb_sistem where id_sistem='$id_sistem'");
              }

            public function tampildetailsistem1($id_sistem){
              return $this->db->query("Select * from tb_penghubung join tb_vps on tb_vps.id_vps = tb_penghubung.id_vps
                                      join tb_sistem on tb_sistem.id_sistem = tb_penghubung.id_sistem 
                                      where tb_penghubung.id_sistem = '$id_sistem'")->result();
            }

            
            


            // Laporan

            public function cetaklog($data){
              return $this->db->query("Select * from tb_log 
              where month(waktu)='$data[0]' and year(waktu)='$data[1]'
              and 
              id_user = '$data[2]' ")->result();
            }

            

            public function cetakkomponen1($data){
              return $this->db->query("Select * from tb_prosesor 
              join tb_server on tb_prosesor.id_server = tb_server.id_server 
              where tb_prosesor.status_prosesor='$data[0]'")->result();
            }
            public function cetakkomponen2($data){
              return $this->db->query("Select * from tb_ram 
              join tb_server on tb_ram.id_server = tb_server.id_server 
              where tb_ram.status_ram='$data[0]'")->result();
            }
            public function cetakkomponen3($data){
              return $this->db->query("Select * from tb_storage
              join tb_server on tb_storage.id_server = tb_server.id_server  
              where tb_storage.status_storage='$data[0]'")->result();
            }
            public function cetakkomponen4($data){
              return $this->db->query("Select * from tb_kabel
              join tb_server on tb_kabel.id_server = tb_server.id_server  
              where tb_kabel.status_kabel='$data[0]'")->result();
            }

                // END
    }

?>