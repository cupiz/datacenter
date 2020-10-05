<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Tambah usulan</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Beranda</a></li>
						<li>Tambah Usulan</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
	<div class="row">

		<!-- Content
		================================================== -->
		<div class="col-lg-12 col-md-12 padding-right-30">

			


			<?php
			$no_pengguna = $this->session->userdata('no_pengguna');
			if ($no_pengguna=='') {
				echo'
					<div class="notification notice closeable">
						<p><span><b>Mohon Maaf.</b></span> <br>Anda dapat memberikan atau mengirimkan usulan setelah anda terdaftar dan masuk sebagai pengguna. <br>Silahkan daftar terlebih dahulu, pilih menu "Masuk" dan pilih tab "Daftar".</p>
						<a class="close"></a>
					</div>
					<br>
				';
			}else{ ?>

						<?php 
							$yow = $this->session->flashdata('simpan');
							if ($yow=='yes') {
								echo'
								<div class="notification success closeable">
									<p><span>Berhasil Dikirimmkan!</span> Usulan anda telah dikirimkan, silahkan pantau pada halaman panel pengguna untuk melihat respon.</p>
									<a class="close"></a>
								</div>
								';
							}
							?>
				<h3 class="margin-top-0 margin-bottom-30">Formulir Usulan Pengembangan Daerah Purbalingga</h3>
				<?php echo form_open_multipart('beranda/simpantambahusulan');?>
				<div class="row with-forms">

					<div class="col-md-8">
						<label>Judul Usulan</label>
						<input type="text" value="" name="judul_usulan">

					</div>

					<div class="col-md-4">
						<label>Kategori</label>
						<select class="chosen-select-no-single" name="no_kategori_proyek">
							
							<?php
							    foreach ($tampilkategori as $baris) {  ?>
							     	<option value="<?php echo $baris->no_kategori_proyek; ?>">Fasilitas <?php echo $baris->kategori_proyek; ?></option>
							<?php }?>
										
										
						</select>
					</div>

					<div class="col-md-12">
						<!-- Description -->
							<div class="form">
								<h5>Isi Usulan</h5>
								<textarea class="WYSIWYG" name="deskripsi_usulan" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
							</div>
					</div>

					<div class="col-md-8">
						<div class="input-with-icon medium-icons">
							<label>Alamat Lengkap Lokasi (Penerapan)</label>
							<input type="text" value="" name="lokasi_usulan">
							<i class="im im-icon-Barricade-2"></i>
						</div>
					</div>

					<div class="col-md-4">
						<label>Unggah Foto/Dokumen Pendukung</label>
							<div class="add-review-photos" style="float: left;top: 0px;">
								<div class="photoUpload">
								    <span><i class="sl sl-icon-arrow-up-circle"></i> Unggah Berkas</span>
								    <input type="file" class="upload" name="gambar" />
								</div>
							</div>
					</div>

				</div>


			
				<button class="button booking-confirmation-btn margin-top-40 margin-bottom-65" type="submit">Kirim Usulan
				</button>
			<?php } ?>


			
		</div>


		

	</div>
</div>
<!-- Container / End -->
