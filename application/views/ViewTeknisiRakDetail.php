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
                                <li class="breadcrumb-item active">Rack
                                </li>
                                <?php
                                   foreach ($tampil as $baris) {                          
                                ?>
                                <li class="breadcrumb-item active"><?php echo $baris->nama_rack; ?>
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
                                <h4 class="card-title">Detail <?php echo $baris->nama_rack; ?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                   
                                    <div class="card-text">
                                        <dl class="row">
                                            <dt class="col-sm-3">Nama</dt>
                                            <dd class="col-sm-9"><?php echo $baris->nama_rack; ?></dd>
                                        </dl>
                                        <?php } ?>
                                        <dl class="row">
                                            <dt class="col-sm-3">Ruangan</dt>
                                            <dd class="col-sm-9">
                                            <?php
                                            foreach ($tampil1 as $baris1) {                          
                                                echo $baris1->nama_ruangan;
                                            }
                                            ?>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Lemari</dt>
                                            <dd class="col-sm-9">
                                            <?php
                                            foreach ($tampil2 as $baris2) {                          
                                                echo $baris2->nama_lemari;
                                            }
                                            ?>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Server</dt>
                                            <dd class="col-sm-9">
                                            <?php
                                            foreach ($tampil as $baris) {                          
                                                echo $baris->nama_server;
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