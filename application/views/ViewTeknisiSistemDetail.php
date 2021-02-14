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
                                <li class="breadcrumb-item active">Sistem
                                </li>
                                <?php
                                   foreach ($tampil as $baris) {                          
                                ?>
                                <li class="breadcrumb-item active"><?php echo $baris->nama_sistem; ?>
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
                                <h4 class="card-title">Detail <?php echo $baris->nama_sistem; ?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                
                                    <div class="card-text">
                                        <dl class="row">
                                            <dt class="col-sm-3">Nama Sistem</dt>
                                            <dd class="col-sm-9"><?php echo $baris->nama_sistem; ?></dd>
                                        </dl>
                                        
                                        <dl class="row">
                                            <dt class="col-sm-3">Alamat Sistem</dt>
                                            <dd class="col-sm-9">
                                            <a href="https://<?php echo $baris->alamat_sistem; ?>"><?php echo $baris->alamat_sistem; ?> </a>
                                            
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">VPS</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $baris->nama_vps; ?>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Deskripsi</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $baris->deskripsi; ?>
                                            
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Tahun</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $baris->tahun; ?>
                                            <?php } ?>
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