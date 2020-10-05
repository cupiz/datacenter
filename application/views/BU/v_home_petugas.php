<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Hi, <?php echo $this->session->userdata('nama_petugas'); ?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Petugas</a></li>
							<li>Beranda</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		

		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4>5</h4> <span>Total Proyek</span></div>
					<div class="dashboard-stat-icon"><i class="fa fa-bullhorn"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>245</h4> <span>Total Pengembang</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Folder-WithDocument"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>34</h4> <span>Total Pengguna</span></div>
					<div class="dashboard-stat-icon"><i class="im  im-icon-Folder-Love"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>12</h4> <span>Total Laporan</span></div>
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
						foreach ($tampillaporansm as $baris) {  ?>
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
					<!-- Reply to review popup -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Tanggapan Usulan</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea cols="40" rows="3"></textarea>
							<button class="button">Kirim</button>
						</div>
					</div>
					<ul>

		

						<?php
						foreach ($tampilusulansm as $baris) {  ?>
						<li>
							<div class="comments listing-reviews">
								<ul>
									<li>
										<div class="avatar"><img src="<?php echo base_url();?>assets/images/<?php echo $baris->foto_usulan; ?>" alt="" /> </div>
										<div class="comment-content"><div class="arrow-comment"></div>
											<div class="comment-by"><?php echo $baris->judul_usulan; ?></a></div> <span class="date"><?php echo $baris->kategori_proyek; ?></span>
												
											
											<p><?php echo $baris->deskripsi_usulan; ?></p>
											<a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-action-undo"></i> Beri Tanggapan</a>
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