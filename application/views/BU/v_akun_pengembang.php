<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Akun Pengembang</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Beranda</a></li>
							<li><a href="#">Akunku</a></li>
							
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
		<?php
			foreach ($tampilakunpengembang as $baris) {  ?>
			<!-- Profile -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Profil Detail</h4>
					<div class="dashboard-list-box-static">
						
						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="<?php echo base_url();?>assets/images/<?php echo $baris->logo_pengembang; ?>" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> Upload Photo</span>
								    <input type="file" class="upload" />
								</div>
							</div>
						</div>
	
						<!-- Details -->
						<div class="my-profile">

							<label>Nama Lengkap</label>
							<input value="<?php echo $baris->nama_pengembang; ?>" type="text">

							<label>NPWP Pengembang</label>
							<input value="<?php echo $baris->npwp_pengembang; ?>" type="text">

							<label>Telepon</label>
							<input value="<?php echo $baris->notelp_pengembang; ?>" type="text">

							<label>Web Pengembang</label>
							<input value="<?php echo $baris->web_pengembang; ?>" type="text">

							<label>Alamat</label>
							<textarea name="notes" id="notes" cols="30" rows="10"><?php echo $baris->alamat_pengembang; ?></textarea>

						
						</div>
	
						
					</div>
				</div>
			</div>

			<!-- Change Password -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Ubah Password</h4>
					<div class="dashboard-list-box-static">

						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">Password Sekarang</label>
							<input type="password">

							<label>Password Baru</label>
							<input type="password">

							<label>Konfirmasi Password Baru</label>
							<input type="password">

							<button class="button margin-top-15">Ubah Password</button>
						</div>

					</div>
				</div>
			</div>
		<?php }?>

			<?php
			foreach ($konfigurasiweb as $baris) {  ?>

			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2018 <?php echo $baris->nama_web; ?>. All Rights Reserved.</div>
			</div>

			<?php }?>

		</div>

	</div>
	<!-- Content / End -->