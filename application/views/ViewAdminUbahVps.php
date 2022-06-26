<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">VPS</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"> Ubah VPS
                                </li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="content-body">
            
            
            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title">Form Ubah VPS</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Admin/prosesubahvps">
                                        <div class="form-body">
                                            <div class="row">
                                            <?php foreach ($ubahvps as $baris) { ?>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Nama VPS</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <input type="text" id="first-name" class="form-control" name="nama_vps" placeholder="Masukkan Nama" required value="<?php echo $baris->nama_vps; ?>">
                                                            <input type="text" hidden="true" id="first-name" class="form-control" name="id_vps" placeholder="Masukkan Nama" required value="<?php echo $baris->id_vps; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Prosesor</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="vpsprosesor">
                                                            <?php
                                                            $id_prosesor = $baris->id_prosesor;
                                                            $sql ="SELECT * FROM tb_prosesor where id_prosesor='$id_prosesor'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_prosesor;?>"><?php echo $row->nama_prosesor;?> (<?php echo $row->jml_core;?> Core)</option>
                                                            <?php }
                                                            }
                                                            ?>

                                                            <option value="" >-----</option>

                                                            <?php
                                                            foreach ($option2 as $options2) {                          
                                                            ?>
                                                                <option value="<?php echo $options2->id_prosesor; ?>">
                                                                        <?php echo $options2->nama_prosesor; ?> (<?php echo $options2->jml_core;?> Core)
                                                                </option>
                                                            ]<?php } ?>    
                                                            </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Ukuran Harddisk</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="ukuranhardisk" placeholder="Masukkan ukuran harddisk dalam satuan GB ((hanya angka))" required value="<?php echo $baris->ukuran_harddiskvps; ?>">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>RAM</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="vpsram">
                                                            <?php
                                                            $id_ram = $baris->id_ram;
                                                            $sql ="SELECT * FROM tb_ram where id_ram='$id_ram'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_ram;?>"><?php echo $row->nama_ram;?> (<?php echo $row->ukuran_ram; ?> GB)</option>
                                                            <?php }
                                                            }
                                                            ?>

                                                            <option value="" >-----</option>

                                                            <?php
                                                            foreach ($option3 as $options3) {                          
                                                            ?>
                                                                <option value="<?php echo $options3->id_ram; ?>">
                                                                        <?php echo $options3->nama_ram; ?> (<?php echo $options3->ukuran_ram; ?> GB)
                                                                </option>
                                                            ]<?php } ?>    
                                                            </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Operation Sistem</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="os" placeholder="Masukkan OS (contoh ubuntu 8)" required value="<?php echo $baris->os_vps; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Server</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="vpsserver">
                                                            <?php
                                                            $id_server = $baris->id_server;
                                                            $sql ="SELECT * FROM tb_server where id_server='$id_server'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_server;?>"><?php echo $row->nama_server;?></option>
                                                            <?php }
                                                            }
                                                            ?>

                                                            <option value="" >-----</option>

                                                            <?php
                                                            foreach ($option as $options) {                          
                                                            ?>
                                                                <option value="<?php echo $options->id_server; ?>">
                                                                        <?php echo $options->nama_server; ?>
                                                                </option>
                                                            ]<?php } ?>    
                                                            </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Penanggung Jawab</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="vpsuser">
                                                            <?php
                                                            $id_user = $baris->id_user;
                                                            $sql ="SELECT * FROM tb_user where id_user='$id_user'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_user;?>"><?php echo $row->nama_user;?></option>
                                                            <?php }
                                                            }
                                                            ?>

                                                            <option value="" >-----</option>

                                                            <?php
                                                            foreach ($option4 as $options4) {                          
                                                            ?>
                                                                <option value="<?php echo $options4->id_user; ?>">
                                                                        <?php echo $options4->nama_user; ?>
                                                                </option>
                                                            ]<?php } ?>    
                                                            </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-8 offset-md-4">
                                                    
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">SIMPAN</button>
                                                <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="javascript:window.history.go(-1);" style="color:white;">CANCEL</a></button>
                                            
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>