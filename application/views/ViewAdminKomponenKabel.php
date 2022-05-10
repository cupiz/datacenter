    
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">KABEL</h2>
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
                                    <h4 class="card-title">Data KABEL</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <a class="badge badge-pill badge-lg badge-primary badge-glow" href="<?php echo base_url();?>Admin/tambahkabel">Tambah Data</a>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA KABEL</th>
                                                        <th>JENIS KABEL</th>
                                                        <th>KECEPATAN KABEL</th>
                                                        <th>KETERANGAN KABEL</th>
                                                        <th>SERVER</th>
                                                        <th>STATUS</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $a=1;
	                            					foreach ($tampilkabel as $baris) {  ?>
                                                    <tr>
                                    
                                    <td>
                                    <?php echo $a; ?>
                                    </td>
                                    <td class="product-name"><?php echo $baris->nama_kabel; ?></td>
                                    <td>
                                    <?php echo $baris->jns_kabel; ?> 
                                    </td>
                                    <td>
                                    <?php echo $baris->kec_kabel; ?> 
                                    </td>
                                    <td>
                                    <?php echo $baris->ket_kabel; ?> 
                                    </td>
                                    <td>
                                    <?php echo $baris->nama_server; ?>
                                    </td>
                                   
                                    
                                    <td>
                                        <?php if($baris->status_kabel == 'RUSAK'){
                                            echo '<div class="chip chip-danger">';
                                        }else if($baris->status_kabel == 'GANTI'){
                                            echo '<div class="chip chip-success">';
                                        }else{
                                            echo '<div class="chip chip-warning">';
                                        }
                                        ?>
                                        
                                            <div class="chip-body">
                                                <div class="chip-text">
                                                
                                                <?php echo $baris->status_kabel; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                                            <a class="badge badge-pill badge-info badge-glow" href="<?php echo base_url();?>Admin/ubahkabel/<?php echo $baris->id_kabel; ?>">Ubah</a>
                                                            <a class="badge badge-pill badge-danger badge-glow" href="<?php echo base_url();?>Admin/hapuskabel/<?php echo $baris->id_kabel; ?>">Hapus</a>
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

                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">History Kabel</h4>
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
