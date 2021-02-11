<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Storage</h2>
                        <div class="breadcrumb-wrapper col-12">Storage
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"> Ubah Storage
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
                                <h4 class="card-title">Form Ubah Storage</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Admin/prosesubahstorage">
                                        <div class="form-body">
                                            <div class="row">
                                            <?php foreach ($ubahstorage as $baris) { ?>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Nama</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="nama_storage" placeholder="Masukkan Nama" required value="<?php echo $baris->nama_storage; ?>">
                                                            <input type="text" hidden="true" id="first-name" class="form-control" name="id_storage" placeholder="Masukkan Nama" required value="<?php echo $baris->id_storage; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Ukuran Storage</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="ukuranstorage" placeholder="Masukkan jumlah Storage" required value="<?php echo $baris->ukuran_storage; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Tipe Storage</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="tipestorage" placeholder="Masukkan tipe Storage" required value="<?php echo $baris->tipe_storage; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Keterangan</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <textarea id="" class="form-control" name="keterangan" rows="7" placeholder="Masukkan keterangan" required><?php echo $baris->ket_storage; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Server</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="serverstorage">
                                                            <option value="" selected="selected">PILIH</option>
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
                                                
                                                
                                                
                                                <div class="col-md-8 offset-md-4">
                                                    
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">SIMPAN</button>
                                                <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="javascript:window.history.go(-1);" style="color:white;">CANCEL</a></button>
                                            
                                                </div>
                                             <?php } ?>
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