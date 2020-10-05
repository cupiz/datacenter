<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Hi, <?php echo $this->session->userdata('nama_pengguna'); ?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Pengguna</a></li>
							<li>Beranda</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		
		<?php 

			if ($this->session->userdata('status_verifikasi')=="EMAIL SUKSES") {
			 ?>
				<div class="row">
					<div class="col-md-12">
						<div class="dashboard-stat color-4" style="background-color: #2c92dd">
							<div class="dashboard-stat-content"><h3 style="color: #fff">AKUN BELUM TERVERIFIKASI</h3> <span>Anda dapat menggunakan semua layanan website ini setelah akun terverifikasi.
								</span></div>
							<div class="dashboard-stat-icon" style="opacity: 1"><a style="float: right;background-color: #fff;color: #2c92dd;border-color: #fff;" href="<?php echo base_url();?>pengguna/verifikasiakun" class="button medium border"><i class="sl sl-icon-check"></i> Verifikasi Sekarang</a></div>
						</div>
					</div>
				</div>
		<?php	}
		?>

						<?php 
				              $yow = $this->session->flashdata('suksesverif');
				              if ($yow=='yes') {
				                echo'
				                <div class="row">
									<div class="col-md-12">
				                	<div class="notification success closeable">
										<p><span><b>Selamat, akun anda telah TERVERIFIKASI</b></span><br>Silahkan anda telah dapat menggunakan layanan dalam website ini.</p>
										<a class="close"></a>
									</div>
									</div>
								</div>
				                    ';
				              }
				            ?>    
		
		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4>3</h4> <span>Total Laporan</span></div>
					<div class="dashboard-stat-icon"><i class="fa fa-bullhorn"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>20</h4> <span>Usulan Terkirimkan</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Folder-WithDocument"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>1</h4> <span>Usulan Direspon</span></div>
					<div class="dashboard-stat-icon"><i class="im  im-icon-Folder-Love"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>50</h4> <span>Peringkat Pengguna</span></div>
					<div class="dashboard-stat-icon"><i class="sl sl-icon-star"></i></div>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Laporan Terbaru Anda</h4>
					<ul>
						<?php
						foreach ($tampillaporan2 as $baris) {  ?>
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="<?php echo base_url();?>assets/images/<?php echo $baris->foto_pengguna; ?>" alt="" /> </div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by">Laporan Anda <div class="comment-by-listing own-comment">di <a href="#"><?php echo $baris->nama_proyek; ?></a></div> <span class="date">
												<?php
												$CI =& get_instance();
												echo $CI->tgl_indo($baris->tgl_laporan); ?></span>
												
											</div>
											<p><?php echo $baris->isi_laporan; ?></p>

											<a href="#" class="rate-review"><i class="sl sl-icon-trash"></i> Hapus</a>
											<div style="float: right;" class="star-rating" data-rating="4.5"></div>

										</div>

									</li>
								</ul>
							</div>
						</li>

						<?php }?>

					</ul>
				</div>
			</div>
			
			<!-- Listings -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Usulan Terbaru Anda</h4>
					<ul>

		

						<?php
						foreach ($tampilusulan2 as $baris) {  ?>
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="<?php echo base_url();?>assets/images/<?php echo $baris->foto_usulan; ?>" alt="" /> </div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by"><?php echo $baris->judul_usulan; ?></a></div> <span class="date"><?php echo $baris->kategori_proyek; ?></span>
												
											
											<p><?php $deskripsi_usulan=$baris->deskripsi_usulan; echo $deskripsi_usulan=character_limiter($deskripsi_usulan, 200); ?></p>
											<a href="#" class="rate-review"><i class="sl sl-icon-trash"></i> Hapus</a>
											<div style="float: right;" class="star-rating" data-rating="4.5"></div>
										</div>

									</li>
								</ul>
							</div>
						</li>

						<?php }?>
					</ul>
				</div>
			</div>


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