<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Lemari</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"> Ubah Lemari
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
                                <h4 class="card-title">Form Ubah Lemari</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Admin/prosesubahlemari">
                                        <div class="form-body">
                                            <div class="row">
                                            <?php foreach ($ubahlemari as $baris) { ?>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Nama Lemari</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="nama_lemari" placeholder="Masukkan Nama Lemari" required value="<?php echo $baris->nama_lemari; ?>">
                                                            <input type="text" hidden="true" id="first-name" class="form-control" name="id_lemari" placeholder="Hidden" required value="<?php echo $baris->id_lemari; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Jumlah Slot</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="slotrack" placeholder="Masukkan Slot Rak (Angka)" required value="<?php echo $baris->slotrack; ?>">
                                                        </div>
                                                </div>
                                                </div>

                                                <div class="col-12">
                                                <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Ruangan</span>
                                                </div>
                                                <div class="col-md-8">
                                                
                                                    <select class="form-control" id="basicSelect" name="ruanganlemari">
                                                    <?php
                                                            $id_ruangan = $baris->id_ruangan;
                                                            $sql ="SELECT * FROM tb_ruangan where id_ruangan='$id_ruangan'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_ruangan;?>"><?php echo $row->nama_ruangan;?></option>
                                                            <?php }
                                                            }
                                                        ?>

                                                        <option value="" >-----</option>

                                                        <?php
                                                        foreach ($option as $options) {                          
                                                        ?>
                                                            <option value="<?php echo $options->id_ruangan; ?>">
                                                                    <?php echo $options->nama_ruangan; ?>
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