<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Server</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"> Ubah Server
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
                                <h4 class="card-title">Form Ubah Server</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Admin/prosesubahserver">
                                        <div class="form-body">
                                            <div class="row">
                                            <?php foreach ($ubahserver as $baris) { ?>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Nama Server</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" id="first-name" class="form-control" name="nama_server" placeholder="Masukkan Nama Server" required value="<?php echo $baris->nama_server; ?>">
                                                            <input type="text" hidden="true" id="first-name" class="form-control" name="id_server" placeholder="Hidden" required value="<?php echo $baris->id_server; ?>"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Rack</span>
                                                </div>
                                                <div class="col-md-8">
                                                
                                                    <select class="form-control" id="basicSelect" name="rakserver">
                                                    <?php
                                                            $id_rack = $baris->id_rack;
                                                            $sql ="SELECT * FROM tb_rack where id_rack='$id_rack'";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                            foreach ($query->result() as $row) {?>
                                                                <option value="<?php echo $row->id_rack;?>"><?php echo $row->nama_rack;?></option>
                                                            <?php }
                                                            }
                                                        ?>

                                                        <option value="" >-----</option>

                                                        <?php
                                                        foreach ($option as $options) {                          
                                                        ?>
                                                            <option value="<?php echo $options->id_rack; ?>">
                                                                    <?php echo $options->nama_rack; ?>
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