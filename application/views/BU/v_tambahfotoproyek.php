<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Tambah Foto Proyek</h2>
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
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Tambah Foto Progress Proyek</h4>
					<div class="dashboard-list-box-static">
						
						<div class="row with-forms">


							<div class="col-md-8">
								<label>Nama Proyek</label>
								<select class="chosen-select-no-single" >
									<option label="blank">Pilih Proyek</option>	
									<?php
									    foreach ($tampilproyeksemua2 as $baris) {  ?>
									     	<option><?php echo $baris->nama_proyek; ?>-<?php echo $baris->no_proyek; ?></option>
									<?php }?>
												
												
								</select>
							</div>

					

							<div class="col-md-4">
								<label>Unggah Foto/Dokumen Pendukung</label>
									<div class="add-review-photos" style="float: left;top: 0px;">
										<div class="photoUpload">
										    <span><i class="sl sl-icon-arrow-up-circle"></i> Unggah Berkas</span>
										    <input type="file" class="upload" />
										</div>
									</div>
							</div>

							<div class="col-md-12">
								<button class="button margin-top-15">Tambah Foto</button>
							</div>
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