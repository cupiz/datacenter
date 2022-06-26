<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-analytics">
                <div class="row">
                    
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-1">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">
                                <?php
                                foreach ($tampiluser as $user1) {                          
                                    echo $user1->jmluser;
                                }
                                ?>                                
                                </h2>
                                <p class="mb-0">User</p>
                            </div>
                            <div class="card-content">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-1">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-dot-circle-o text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">
                                    <?php
                                    foreach ($tampilsistem as $sistem) {                          
                                        echo $sistem->jmlsistem;
                                    }
                                    ?>    

                                </h2>
                                <p class="mb-0">Sistem</p>
                            </div>
                            <div class="card-content">
                                <div id="orders-received-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-1">
                                <div class="avatar bg-rgba-info p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-cpu text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">
                                <?php
                                $sum = 0;
                                foreach ($jmlram as $baris):
                                    $sum += $baris->ram;
                                endforeach;
                                foreach ($jmlstorage as $baris):
                                    $sum += $baris->storage;
                                endforeach;
                                foreach ($jmlprosesor as $baris):
                                    $sum += $baris->prosesor;
                                endforeach;
                                foreach ($jmlkabel as $baris):
                                    $sum += $baris->kabel;
                                endforeach;
                                echo $sum;
                                ?>    

                                </h2>
                                <p class="mb-0">Komponen</p>
                            </div>
                            <div class="card-content">
                                <div id="orders-received-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-1">
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-server text-success font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25">
                                <?php
                                foreach ($tampilvps as $vps) {                          
                                    echo $vps->jmlvps;
                                }
                                ?>    

                                </h2>
                                <p class="mb-0">VPS</p>
                            </div>
                            <div class="card-content">
                                <div id="orders-received-chart"></div>
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