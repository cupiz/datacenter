<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Ubah Data Akun</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <a class="mr-2 my-25" href="#">
                                            <img src="<?php echo base_url();?>assets//images/<?php echo $this->session->userdata('photo'); ?>" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
                                        </a>
                                        <div class="media-body mt-50">
                                            <h4 class="media-heading"><?php echo $this->session->userdata('nama_user'); ?></h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                            <?php
	                            					foreach ($tampilakun as $baris) {  ?>
                                            
                                                <a class="btn btn-primary d-none d-sm-block mr-75"><input type="file" id="img" name="img" accept="image/*" style="position: absolute;
                                                    top: 0;
                                                    right: 0;
                                                    min-width: 100%;
                                                    min-height: 100%;
                                                    font-size: 100px;
                                                    text-align: right;
                                                    filter: alpha(opacity=0);
                                                    opacity: 0;
                                                    outline: none;   
                                                    cursor: inherit;
                                                    display: block;"><i style="color: white;">Ubah</i></a>
                                                <a href="#" class="btn btn-primary d-block d-sm-none mr-75"><i class="feather icon-edit-1"></i></a>
                                                <a href="#" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form method="post" action="<?php echo base_url();?>Teknisi/prosesubahuser">
                                    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $baris->username; ?>" required data-validation-required-message="Username harus di isi">
                                                        <input type="hidden" class="form-control" name="id_user" placeholder="ERROR" value="<?php echo $baris->id_user; ?>">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama_user" placeholder="Nama" value="<?php echo $baris->nama_user; ?>" required data-validation-required-message="Nama harus di isi">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>E-mail</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $baris->email; ?>" required data-validation-required-message="Email harus di isi">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                                        <span>*Kosongkan jika tidak diubah</span>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>
                                            
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Simpan</button>
                                                <button type="reset" class="btn btn-outline-warning">Batal</button>
                                            </div>
                                        </div>

                                      
                                    </form>
                                    <!-- users edit account form ends -->
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