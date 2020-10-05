<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Hi, <?php echo $this->session->userdata('nama_pengembang'); ?></h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Pengembang</a></li>
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
					<div class="dashboard-stat-content"><h4>245</h4> <span>Total Laporan</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Folder-WithDocument"></i></div>
				</div>
			</div>

			
			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>34</h4> <span>Foto Proyek</span></div>
					<div class="dashboard-stat-icon"><i class="im  im-icon-Folder-Love"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>12</h4> <span>Peringkat Pengembang</span></div>
					<div class="dashboard-stat-icon"><i class="sl sl-icon-star"></i></div>
				</div>
			</div>
		</div>


		<div class="row">
			
			
			
			<!-- Listings -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-0">
					<h4>Proyek Terbaru</h4>
					<ul>
						
						<?php
						foreach ($tampilproyek3 as $baris) {  ?>
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong><?php echo $baris->nama_proyek; ?></strong>
							<ul>
								<li class="unpaid">Fasilitas <?php echo $baris->kategori_proyek; ?></li>
								<li>Estimasi Selesai: <?php
												$CI =& get_instance();
												echo $CI->tgl_indo($baris->estimasi_selesai); ?></li>
							</ul>
							<div class="buttons-to-right">
								<a href="dashboard-invoice.html" class="button gray">Tambah Foto</a>
							</div>
						</li>
						
						<?php }?>

					</ul>
				</div>
			</div>

			<!-- Listings -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Laporan Terbaru Proyek Anda</h4>
					<ul>
						<?php
						foreach ($tampillaporan3 as $baris) {  ?>
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

											<a href="<?php echo base_url();?>beranda/proyek/<?php echo $baris->no_proyek; ?>" class="rate-review"><i class="sl sl-icon-link"></i> LIHAT HALAMAN PROYEK</a>
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