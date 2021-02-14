<!-- BEGIN: Content-->
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Laporan</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    
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
                                <h4 class="card-title">Cetak Laporan Komponen</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Teknisi/laporankomponen">
                                        <div class="form-body">
                                            <div class="row">
                                            
                                                
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Pilih Status Komponen</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="status">
                                                            <option value="" >PILIH</option>
                                                            <option value="GANTI" >GANTI</option>
                                                            <option value="RUSAK" >RUSAK</option>
                                                            <option value="PERBAIKI" >PERBAIKI</option>
                                                            </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-8 offset-md-4">
                                                    
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">CETAK</button>
                                                <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="javascript:window.history.go(-1);" style="color:white;">KEMBALI</a></button>
                                            
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>

            <section id="basic-horizontal-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title">Cetak Log User</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-horizontal" method="post" action="<?php echo base_url();?>Teknisi/laporanlog">
                                        <div class="form-body">
                                            <div class="row">
                                            
                                                
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Pilih Bulan</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="bulan">
                                                            <option value="" >Bulan</option>
                                                            <option value="1" >Januari</option>
                                                            <option value="2" >Februari</option>
                                                            <option value="3" >Maret</option>
                                                            <option value="4" >April</option>
                                                            <option value="5" >Mei</option>
                                                            <option value="6" >Juni</option>
                                                            <option value="7" >Juli</option>
                                                            <option value="8" >Agustus</option>
                                                            <option value="9" >September</option>
                                                            <option value="10" >Oktober</option>
                                                            <option value="11" >November</option>
                                                            <option value="12" >Desember</option>
                                                            </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Pilih Tahun</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        
                                                            <select class="form-control" id="basicSelect" name="tahun">
                                                            <option value="">Tahun</option>
                                                            <option value="2021" >2020</option>
                                                            <option value="2021" >2021</option>
                                                            <option value="2022" >2022</option>
                                                            <option value="2023" >2023</option>
                                                            <option value="2024" >2024</option>
                                                            <option value="2025" >2025</option>
                                                            </select>

                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-8 offset-md-4">
                                                    
                                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">CETAK</button>
                                                <button type="button" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="javascript:window.history.go(-1);" style="color:white;">KEMBALI</a></button>
                                            
                                                </div>
                                            
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