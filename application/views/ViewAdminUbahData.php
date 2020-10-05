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
                                            <img src="<?php echo base_url();?>assets/app-assets/images/portrait/small/avatar-s-18.jpg" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
                                        </a>
                                        <div class="media-body mt-50">
                                            <h4 class="media-heading">Angelo Sashington</h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <a class="btn btn-primary d-none d-sm-block mr-75"><input type="file" accept="image/*" style="position: absolute;
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
                                                <a href="#" class="btn btn-outline-danger d-none d-sm-block">Hapus</a>
                                                <a href="#" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" placeholder="Username" value="adoptionism744" required data-validation-required-message="username harus di isi">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" placeholder="Name" value="Angelo Sashington" required data-validation-required-message="Nama harus di isi">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>E-mail</label>
                                                        <input type="email" class="form-control" placeholder="Email" value="angelo@sashington.com" required data-validation-required-message="Email harus di isi">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" placeholder="Password" value="asa" required data-validation-required-message="Password harus di isi">
                                                    </div>
                                                </div>
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