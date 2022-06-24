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
                                <li class="breadcrumb-item active"> Tambah VPS
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
                                <h4 class="card-title">Form Tambah VPS</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Admin/prosestambahvps">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Nama VPS</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="nama_vps" placeholder="Masukkan Nama VPS" required>
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
                                                            <option value="" selected="selected">PILIH</option>
                                                            <?php
                                                            foreach ($tampilprosesor as $baris) {                          
                                                            ?>
                                                                <option value="<?php echo $baris->id_prosesor; ?>">
                                                                        <?php echo $baris->nama_prosesor; ?> (<?php echo $baris->jml_core; ?> Core)
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
                                                            <input type="text" id="first-name" class="form-control" name="ukuranhardisk" placeholder="Masukkan ukuran harddisk dalam satuan GB ((hanya angka))" required>
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
                                                            <option value="" selected="selected">PILIH</option>
                                                            <?php
                                                            foreach ($tampilram as $baris) {                          
                                                            ?>
                                                                <option value="<?php echo $baris->id_ram; ?>">
                                                                        <?php echo $baris->nama_ram; ?> (<?php echo $baris->ukuran_ram; ?> GB)
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
                                                            <input type="text" id="first-name" class="form-control" name="os" placeholder="Masukkan OS (contoh ubuntu 8)" required>
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
                                                            <option value="" selected="selected">PILIH</option>
                                                            <?php
                                                            foreach ($tampilserver as $baris) {                          
                                                            ?>
                                                                <option value="<?php echo $baris->id_server; ?>">
                                                                        <?php echo $baris->nama_server; ?> 
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
                                                            <option value="" selected="selected">PILIH</option>
                                                            <?php
                                                            foreach ($tampiluser as $baris) {                          
                                                            ?>
                                                                <option value="<?php echo $baris->id_user; ?>">
                                                                        <?php echo $baris->nama_user; ?>
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