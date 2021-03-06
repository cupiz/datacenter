<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Komponen</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Prosesor
                                </li>
                                <?php
                                   foreach ($tampil as $baris) {                          
                                ?>
                                <li class="breadcrumb-item active"><?php echo $baris->nama_prosesor; ?>
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
                                <h4 class="card-title">Detail <?php echo $baris->nama_prosesor; ?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                   
                                    <div class="card-text">
                                        <dl class="row">
                                            <dt class="col-sm-3">Nama</dt>
                                            <dd class="col-sm-9"><?php echo $baris->nama_prosesor; ?></dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Jumlah Core</dt>
                                            <dd class="col-sm-9"><?php echo $baris->jml_core; ?>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Server</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $baris->nama_server; ?>
                                                       
                                            
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Rak</dt>
                                            <dd class="col-sm-9"><?php echo $baris->nama_rack; ?></dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Lemari</dt>
                                            <dd class="col-sm-9"><?php echo $baris->nama_lemari; ?></dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-sm-3">Keterangan</dt>
                                            <dd class="col-sm-9">
                                             <?php 
                                                if($baris->ket_prosesor==''){
                                                    echo 'Tidak ada keterangan';
                                                }else{
                                                    echo $baris->ket_prosesor;
                                                }
                                            ?>
                                            </dd>
                                        </dl>
                                        <form method="post" action="<?php echo base_url();?>Teknisi/prosesubahprosesor">
                                        <dl class="row">
                                            <dt class="col-sm-3">Status</dt>
                                            <input type="text" hidden="true" name="idprosesor" value="<?php echo $baris->id_prosesor; ?>">
                                            <input type="text" hidden="true" name="namaserver" value="<?php echo $baris->nama_server; ?>">
                                            <input type="text" hidden="true" name="namaprosesor" value="<?php echo $baris->nama_prosesor; ?>">
                                            <dd class="col-sm-9">
                                                        <?php
                                                            $options = array("GANTI", "RUSAK", "PERBAIKI");
                                                            $status = $baris->status_prosesor;
                                                        ?>
                                                            <select class="custom-select form-control" id="statusselect" name="statusprosesor">
                                                            
                                                                <?php foreach ($options as $option): ?>
                                                                    <option value="<?php echo $option; ?>"<?php if ($status == $option): ?> selected="selected"<?php endif; ?>>
                                                                        <?php echo $option; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            
                                                            </select>
                                            </dd>
                                        </dl>
                                        <br>
                                        
                                        
                                        <div class="dropdown show">
                                            
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">SIMPAN</button>
                                            <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="javascript:window.history.go(-1);" style="color:white;">CANCEL</a></button>
                                            
                                            
                                        </div>
                                        </form>

                                        <?php } ?>
                                        
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