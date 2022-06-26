<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Rack</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"> Ubah Rack
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
                                <h4 class="card-title">Form Ubah Rack</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Admin/prosesubahrak">
                                        <div class="form-body">
                                            <div class="row">
                                            <?php foreach ($ubahrak as $baris) { ?>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Nama Rack</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="nama_rack" placeholder="Masukkan Nama Rack" required value="<?php echo $baris->nama_rack; ?>">
                                                            <input type="text" hidden="true" id="first-name" class="form-control" name="id_rack" placeholder="Hidden" required value="<?php echo $baris->id_rack; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Lemari</span>
                                                </div>
                                                <div class="col-md-8">
                                                
                                                    <select class="form-control" id="basicSelect" name="lemarirak">
                                                    <?php
                                                            $id_lemari = $baris->id_lemari;
                                                            $sql ="SELECT * FROM tb_lemari where id_lemari='$id_lemari'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_lemari;?>"><?php echo $row->nama_lemari;?></option>
                                                            <?php }
                                                            }
                                                        ?>

                                                        <option value="" >-----</option>

                                                        <?php
                                                        foreach ($option as $options) {                          
                                                        ?>
                                                            <option value="<?php echo $options->id_lemari; ?>">
                                                                    <?php echo $options->nama_lemari; ?>
                                                            </option>
                                                        ]<?php } ?>   
                                                    </select>

                                                
                                                </div>
                                                </div>
                                                </div>
                                                
                                                <br>
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