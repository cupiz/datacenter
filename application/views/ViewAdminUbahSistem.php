<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Sistem</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"> Ubah Sistem
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
                                <h4 class="card-title">Form Ubah Sistem</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Admin/prosesubahsistem">
                                        <div class="form-body">
                                            <div class="row">
                                            <?php foreach ($ubahsistem as $baris) { ?>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Nama Sistem</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="nama_sistem" placeholder="Masukkan Nama Sistem" required value="<?php echo $baris->nama_sistem; ?>">
                                                            <input type="text" hidden="true" id="first-name" class="form-control" name="id_sistem" placeholder="Masukkan Nama" required value="<?php echo $baris->id_sistem; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Alamat Sistem</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="alamat" placeholder="Masukkan alamat sistem" required value="<?php echo $baris->alamat_sistem; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Deskripsi</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <textarea id="" class="form-control" name="deskripsi" rows="7" placeholder="Masukkan deskripsi" required><?php echo $baris->deskripsi; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Tahun Sistem Dibuat</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="tahun" placeholder="Masukkan tahun" required value="<?php echo $baris->tahun; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>VPS</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                        <select class="form-control" id="basicSelect" name="sistemvps">
                                                        <?php
                                                            $id_vps = $baris->id_vps;
                                                            $sql ="SELECT * FROM tb_vps where id_vps='$id_vps'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_vps;?>"><?php echo $row->nama_vps;?></option>
                                                            <?php }
                                                            }
                                                        ?>

                                                        <option value="" >-----</option>

                                                        <?php
                                                        foreach ($option as $options) {                          
                                                        ?>
                                                            <option value="<?php echo $options->id_vps; ?>">
                                                                    <?php echo $options->nama_vps; ?>
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