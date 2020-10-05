<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Detail</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Server
                                </li>
                                <?php
                                   foreach ($tampil as $baris) {                          
                                ?>
                                <li class="breadcrumb-item active"><?php echo $baris->nama_server; ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="content-body">
            
            <section id="ditail">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail <?php echo $baris->nama_server; ?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                   
                                    <div class="card-text">
                                        <dl class="row">
                                            <dt class="col-sm-3">Nama Server</dt>
                                            <dd class="col-sm-9"><?php echo $baris->nama_server; ?></dd>
                                        </dl>
                                        
                                        <dl class="row">
                                            <dt class="col-sm-3">Ruangan</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $baris->nama_ruangan; ?>
                                            
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Lemari</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $baris->nama_lemari; ?>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Rack</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $baris->nama_rack; ?>
                                            <?php } ?>
                                            </dd>
                                        </dl>

                                        <br><br>
                                        <dl class="row">
                                            <dt class="col-sm-3">Komponen Detail</dt>
                                            
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Prosesor</dt>
                                            <dd class="col-sm-9">
                                            <?php
                                            foreach ($tampilprosesor as $prosesor) {                          
                                                echo $prosesor->nama_prosesor;
                                                echo ' ( '. $prosesor->jml_core .' Core )';
                                            }
                                            ?>
                                            </dd>
                                        </dl>  

                                        <dl class="row">
                                            <dt class="col-sm-3">Total Storage</dt>
                                            <dd class="col-sm-9">
                                            ( 
                                            <?php
                                            foreach ($tampilstorageterpakai as $pakai) {                          
                                                if($pakai->terpakai==NULL){
                                                    echo '0 GB';
                                                }else{
                                                echo $pakai->terpakai .' GB';
                                                }
                                            }
                                            ?>
                                            /
                                            <?php
                                            foreach ($tampilstoragetotal as $storagetotal) {                          
                                                if($storagetotal->ukuran==NULL){
                                                    echo 'Tidak ada komponen';
                                                }else{
                                                echo $storagetotal->ukuran .' GB';
                                                }
                                            }
                                            ?>
                                            )
                                            </dd>
                                            
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Komponen Storage</dt>
                                            <dd class="col-sm-9">
                                            <?php 
                                            if ($tampilstorage==NULL){
                                                echo 'Tidak ada komponen';
                                            }else{
                                                echo 'Nama Storage - Ukuran';    
                                            }
                                            ?>
                                            </dd>
                                            <?php
                                            foreach ($tampilstorage as $storage) { ?>
                                            <dd class="col-sm-3"></dd>
                                            <dd class="col-sm-9">
                                            <?php echo $storage->nama_storage.' -'; ?>
                                            <?php echo $storage->ukuran_storage .' GB'; ?>
                                            </dd>                          
                                                
                                            <?php
                                            }
                                            ?>
                                        </dl>

                                        <dl class="row">
                                            <dt class="col-sm-3">Total RAM</dt>
                                            <dd class="col-sm-9">
                                            <?php
                                            foreach ($tampilramtotal as $ramtotal) {                          
                                                if($ramtotal->ukuran==NULL){
                                                    echo 'Tidak ada komponen';
                                                }else{
                                                echo $ramtotal->ukuran .' GB';
                                                }
                                            }
                                            ?>
                                            </dd>
                                            
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Komponen RAM</dt>
                                            <dd class="col-sm-9">
                                            <?php 
                                            if ($tampilram==NULL){
                                                echo 'Tidak ada komponen';
                                            }else{
                                                echo 'Nama RAM - Ukuran';    
                                            }
                                            ?>
                                            </dd>
                                            <?php
                                            foreach ($tampilram as $ram) { ?>
                                            <dd class="col-sm-3"></dd>
                                            <dd class="col-sm-9">
                                            <?php echo $ram->nama_ram.' -'; ?>
                                            <?php echo $ram->ukuran_ram .' GB'; ?>
                                            </dd>                          
                                                
                                            <?php
                                            }
                                            ?>
                                        </dl>                                       
                                        <dl class="row">
                                            <dt class="col-sm-3">Kabel</dt>
                                            <dd class="col-sm-9">
                                            <?php
                                            foreach ($tampilkabel as $kabel) {                          
                                                echo $kabel->nama_kabel;
                                            }
                                            ?>
                                            </dd>
                                        </dl>
                                        
                                        <div class="dropdown show">
                                            
                                            <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="javascript:window.history.go(-1);" style="color:white;">KEMBALI</a></button>
                                            
                                            
                                            
                                        </div>
                                        </form>

                                        
                                        
                                    </div>
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