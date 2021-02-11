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
                                    <li class="breadcrumb-item active">Kabel
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>JENIS</th>
                                    <th>SERVER</th>
                                    <th>KETERANGAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                       foreach ($tampil as $baris) {                          
                                ?>
                                <tr>
                                    <td class="product-name"><?php echo $baris->nama_kabel; ?></td>
                                    <td>
                                    <?php echo $baris->jns_kabel; ?>
                                    </td>
                                    <td>
                                    <?php echo $baris->nama_server; ?>
                                    </td>
                                    <td>
                                    <?php echo $baris->ket_kabel; ?>
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
                                        <div class="chip chip-info">
                                            <div class="chip-body">
                                                <div class="chip-text"><a style="color:white" href="<?php echo base_url();?>Teknisi/detailkabel/<?php echo $baris->id_kabel; ?>">DETAIL</a></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    
                </section>
                <!-- Data list view end -->

                
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