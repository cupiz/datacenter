<!-- Banner
================================================== -->
<div class="main-search-container dark-overlay">
	<div class="main-search-inner">

		<div class="container">
			<form method="post" action="<?php echo base_url();?>beranda/cari">
			<div class="row">
				<div class="col-md-12">
					<h2>Temukan proyek pembangunan</h2>
					<h4>Cari pembangunan dalam proses inovasi</h4>

					<div class="main-search-input">
						
							<div class="main-search-input-item">
								<input type="text" name="nama_proyek" placeholder="Cari proyek pembangunan..." value=""/>
							</div>

							<div class="main-search-input-item location">
								<input type="text" name="lokasi_proyek" placeholder="Lokasi" value=""/>
								<a href="#"><i class="fa fa-dot-circle-o"></i></a>
							</div>

							<div class="main-search-input-item">
								<select data-placeholder="All Categories" class="chosen-select" name="kategori_proyek">
									<option value="">Semua Kategori</option>	
									<?php
									     foreach ($tampilkategori as $baris) {  ?>

									     <option value="<?php echo $baris->no_kategori_proyek; ?>">Fasilitas <?php echo $baris->kategori_proyek; ?></option>	

									<?php }?>

								</select>
							</div>

							<button class="button" onclick="window.location.href='listings-half-screen-map-list.html'">Temukan</button>
						
					</div>
				</div>
			</div>
			</form>
		</div>

	</div>
	
	<!-- Video -->
	<div class="video-container">
		<video poster="<?php echo base_url();?>assets/images/main-search-video-poster.jpg" loop autoplay muted>
			<source src="<?php echo base_url();?>assets/images/main-search-video.mp4" type="video/mp4">
		</video>
	</div>

</div>



<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-75">
				Kategori Pembangunan Fasilitas
			</h3>
		</div>

	</div>
</div>


<!-- Category Boxes -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="categories-boxes-container margin-top-5 margin-bottom-30">
				
				<?php
					foreach ($tampilkategori as $baris) {  ?>

					<!-- Box -->
					<a href="<?php echo base_url();?>beranda/kategori/<?php echo $baris->no_kategori_proyek; ?>" class="category-small-box">
						<i class="im <?php echo $baris->ikon_kategori; ?>"></i>
						<h4><?php echo $baris->kategori_proyek; ?></h4>
					</a>

					

				<?php }?>
				

	

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->


<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					Pembanguan Terbaru
					<span>Lihat proses pembangunan Kab. Purbalingga</span>
				</h3>
			</div>
		</div>
	</div>

	<!-- Carousel / Start -->
	<div class="simple-fw-slick-carousel dots-nav">

		<?php
			foreach ($tampilproyek as $baris) {  ?>

			<!-- Listing Item -->
			<div class="fw-carousel-item">
				<a href="<?php echo base_url();?>beranda/proyek/<?php echo $baris->no_proyek; ?>" class="listing-item-container compact">
					<div class="listing-item">
						<img src="<?php echo base_url();?>assets/images/<?php echo $baris->foto_plan_proyek; ?>" alt="">
						<div class="listing-item-details">
							<ul>
								<li><?php echo $baris->nama_pengembang; ?></li>
							</ul>
						</div>
						<div class="listing-item-content">
							
							<h3><?php echo $baris->nama_proyek; ?></h3>
							<span class="tag"><?php echo $baris->lokasi_proyek; ?></span>
							
						</div>
						
						<span class="go-icon"></span>
					</div>
				</a>
			</div>
			<!-- Listing Item / End -->		

		<?php }?>

		


	</div>
	<!-- Carousel / End -->


</section>
<!-- Fullwidth Section / End -->


<!-- Container -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-35 margin-top-70">Wilayah Pembangunan <span>Daerah dalam proses pembangunan</span></h3>
		</div>
		<?php
			$i = 1;
			foreach ($tampillokasi as $baris) {  ?>

			<?php
			if ($i==1) {
				echo '
					<div class="col-md-4">
		

						<!-- Image Box -->
						<a href="#" class="img-box" data-background-image="' . base_url() . 'assets/images/popular-location-01.jpg">
							<div class="img-box-content visible">
								<h4>' . $baris->lokasi_proyek . '</h4>
								<span>' . $baris->jml_lokasi . ' Proyek</span>
							</div>
						</a>

					</div>	
				';
			}elseif ($i==2) {
				echo '
					<div class="col-md-8">
		

						<!-- Image Box -->
						<a href="#" class="img-box" data-background-image="' . base_url() . 'assets/images/popular-location-02.jpg">
							<div class="img-box-content visible">
								<h4>' . $baris->lokasi_proyek . '</h4>
								<span>' . $baris->jml_lokasi . ' Proyek</span>
							</div>
						</a>

					</div>	
				';
			}elseif ($i==3) {
				echo '
					<div class="col-md-8">
		

						<!-- Image Box -->
						<a href="#" class="img-box" data-background-image="' . base_url() . 'assets/images/popular-location-03.jpg">
							<div class="img-box-content visible">
								<h4>' . $baris->lokasi_proyek . '</h4>
								<span>' . $baris->jml_lokasi . ' Proyek</span>
							</div>
						</a>

					</div>	
				';
			}elseif ($i==4) {
				echo '
					<div class="col-md-4">
		

						<!-- Image Box -->
						<a href="#" class="img-box" data-background-image="' . base_url() . 'assets/images/popular-location-04.jpg">
							<div class="img-box-content visible">
								<h4>' . $baris->lokasi_proyek . '</h4>
								<span>' . $baris->jml_lokasi . ' Proyek</span>
							</div>
						</a>

					</div>	
				';
			}?>

		
		<?php $i = $i + 1;}?>
	</div>
</div>
<!-- Container / End -->


<!-- Flip banner -->
<a href="<?php echo base_url();?>beranda/semuaproyek" class="flip-banner parallax margin-top-65" data-background="<?php echo base_url();?>assets/images/slider-bg-02.jpg" data-color="#f91942" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
	<div class="flip-banner-content">
		<h2 class="flip-visible">Lihat daftar pembangunan sekitar anda</h2>
		<h2 class="flip-hidden">Lihat Semua Proyek <i class="sl sl-icon-arrow-right"></i></h2>
	</div>
</a>
<!-- Flip banner / End -->