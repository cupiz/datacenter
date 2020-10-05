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
                                    <th>NO</th>
                                    <th>NAMA SISTEM</th>
                                    <th>ALAMAT</th>
                                    <th>DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php 
                                $i=1;
                                foreach ($tampil as $baris) { 
                                ?>
                                    <td><?php echo $i; ?></td>
                                    <td class="product-name"><?php echo $baris->nama_sistem; ?></td>
                                    <td>
                                    <a target="_blank" href="https://<?php echo $baris->alamat_sistem; ?>"><?php echo $baris->alamat_sistem; ?></a>
                                    </td>
                                    <td>
                                        <div class="chip chip-info">
                                            <div class="chip-body">
                                                <div class="chip-text"><a style="color:white" href="<?php echo base_url();?>Teknisi/detailsistem/<?php echo $baris->id_sistem; ?>">DETAIL</a></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                

                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    
                </section>
                <!-- Data list view end -->

                
                

            </div>
        </div>
    </div>
    <!-- END: Content-->