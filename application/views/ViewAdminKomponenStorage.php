    
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Storage</h2>
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
                                    <h4 class="card-title">Data Storage</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a class="badge badge-pill badge-lg badge-primary badge-glow" href="<?php echo base_url();?>Admin/tambahstorage">Tambah Data</a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>NAMA</th>
                                                        <th>UKURAN STORAGE</th>
                                                        <th>SERVER</th>
                                                        <th>TIPE STORAGE</th>
                                                        <th>STATUS</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
	                            					foreach ($tampilstorage as $baris) {  ?>
                                                    <tr>
                                    
                                    <td class="product-name"><?php echo $baris->nama_storage; ?></td>
                                    <td>
                                    <?php echo $baris->ukuran_storage; ?>
                                    </td>
                                    <td>
                                    <?php echo $baris->nama_server; ?>
                                    </td>
                                    <td>
                                    <?php echo $baris->tipe_storage; ?>
                                    </td>
                                    
                                    <td>
                                        <?php if($baris->status_storage == 'RUSAK'){
                                            echo '<div class="chip chip-danger">';
                                        }else if($baris->status_storage == 'GANTI'){
                                            echo '<div class="chip chip-success">';
                                        }else{
                                            echo '<div class="chip chip-warning">';
                                        }
                                        ?>
                                        
                                            <div class="chip-body">
                                                <div class="chip-text">
                                                
                                                <?php echo $baris->status_storage; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                                            <a class="badge badge-pill badge-info badge-glow" href="<?php echo base_url();?>Admin/ubahstorage/<?php echo $baris->id_storage; ?>">Ubah</a>
                                                            <a class="badge badge-pill badge-danger badge-glow" href="<?php echo base_url();?>Admin/hapusstorage/<?php echo $baris->id_storage; ?>">Hapus</a>
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

                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">History Prosesor</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                       
                                        <div class="table-responsive">
                                            <table class="table zero-configuration"style="table-layout: auto;">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Aktivitas</th>
                                                        <th>Tanggal dan Waktu</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $i = 1;
                                                    foreach ($tampil2 as $baris) {                          
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $baris->nama_user; ?></td>
                                                        <td><?php echo $baris->aktivitas; ?></td>
                                                        <td><?php echo $baris->waktu; ?></td>
                                                        
                                                    </tr>
                                                    <?php 
                                                    $i++;
                                                    } 
                                                    ?>
                                                    
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
