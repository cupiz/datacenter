    
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
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Beranda</a>
                                    </li>
                                    <li class="breadcrumb-item active">Master Data
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Sistem</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a class="badge badge-pill badge-lg badge-primary badge-glow" href="<?php echo base_url();?>Admin/tambahsistem">Tambah Data</a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA SISTEM</th>
                                                        <th>ALAMAT</th>
                                                        <th>DESKRIPSI</th>
                                                        <th>TAHUN</th>
                                                        <th>VPS</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $a=1;
	                            					foreach ($tampilsistem as $baris) {  ?>
                                                    <tr>
                                    
                                    <td>
                                    <?php echo $a; ?>
                                    </td>                
                                    <td class="product-name"><?php echo $baris->nama_sistem; ?></td>
                                    <td><a href="https://<?php echo $baris->alamat_sistem; ?>"><?php echo $baris->alamat_sistem; ?></a></td>
                                    <td><?php echo $baris->deskripsi; ?></td>
                                    <td><?php echo $baris->tahun; ?></td>
                                    <td><?php echo $baris->nama_vps; ?></td>
                                    <td>
                                                            <a class="badge badge-pill badge-info badge-glow" href="<?php echo base_url();?>Admin/ubahsistem/<?php echo $baris->id_sistem; ?>">Ubah</a>
                                                            <a class="badge badge-pill badge-danger badge-glow" href="<?php echo base_url();?>Admin/hapussistem/<?php echo $baris->id_sistem; ?>">Hapus</a>
                                    </td>
                                </tr>
                                                    <?php $a++; } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->

                

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
