    
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">User</h2>
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
                                    <h4 class="card-title">Data User</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a class="badge badge-pill badge-lg badge-primary badge-glow" href="<?php echo base_url();?>Admin/tambahuser">Tambah Data</a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Terakhir Login</th>
                                                        <th>Foto</th>
                                                        <th>Level</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
	                            					foreach ($tampiluser as $baris) {  ?>
                                                    <tr>
                                                        <td><?php echo $baris->id_user; ?></td>
                                                        <td><?php echo $baris->nama_user; ?></td>
                                                        <td><?php echo $baris->username; ?></td>
                                                        <td><?php echo $baris->email; ?></td>
                                                        <td><?php echo $baris->last_login; ?></td>
                                                        <td>
                                                            <a class="badge badge-pill badge-warning badge-glow" href="<?php echo base_url();?>assets/images/<?php echo $baris->photo; ?>" target="_blank">Lihat</a>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($baris->level_user == '2'){
                                                                    echo "Teknisi";
                                                                }else{
                                                                    echo "Admin";
                                                                }
                                                            ?>     

                                                        </td>
                                                        <td>
                                                            <a class="badge badge-pill badge-info badge-glow" href="<?php echo base_url();?>Admin/ubahuser/<?php echo $baris->id_user; ?>">Ubah</a>
                                                            <a class="badge badge-pill badge-danger badge-glow" href="<?php echo base_url();?>Admin/hapususer/<?php echo $baris->id_user; ?>">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
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
