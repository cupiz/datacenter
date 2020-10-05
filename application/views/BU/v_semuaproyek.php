<!-- Map
================================================== -->
<div id="map-container" class="fullwidth-home-map">

    <div id="map" data-map-zoom="9">
        <!-- map goes here -->
    </div>

	<div class="main-search-inner">

		<div class="container">
			<form method="post" action="<?php echo base_url();?>beranda/cari">
			<div class="row">
				<div class="col-md-12">
					
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

    <!-- Scroll Enabling Button -->
	<a href="#" id="scrollEnabling" title="Enable or disable scrolling on map">Lokasi Proyek</a>
</div>

<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">

			<!-- Sorting - Filtering Section -->
			<div class="row margin-bottom-25 margin-top-40">

				<div class="col-md-6">
					<!-- Layout Switcher -->
					<div class="layout-switcher">
						<a href="#" class="grid active"><i class="fa fa-th"></i></a>
						
					</div>
				</div>

				<div class="col-md-6">
					<div class="fullwidth-filters">
						
						

						<!-- Panel Dropdown-->
						<div class="panel-dropdown float-right">
							<a href="#">Jarak Sekitar Anda</a>
							<div class="panel-dropdown-content">
								<input class="distance-radius" id="radiusnya" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination">
								<input name="lat" type="hidden" id="lat" value="">
								<input name="lng" type="hidden" id="lng" value="">
								<div class="panel-buttons">
									<button class="panel-cancel">Batal</button>
									<button class="panel-apply" id="terapkanradius">Terapkan</button>
								</div>
							</div>
						</div>
						<!-- Panel Dropdown / End -->

						<!-- Sort by -->
						<div class="sort-by">
							<div class="sort-by-select">
								<select data-placeholder="Default order" id="datafilter" class="chosen-select-no-single" name="datafilter">
									<option value="terbaru">Terbaru</option>	
									<option value="terselesaikan">Terselesaikan</option>
								</select>
							</div>
						</div>
						<!-- Sort by / End -->

					</div>
				</div>

			</div>
			<!-- Sorting - Filtering Section / End -->

			<div id="dataproyek">
			<div class="row">

				<?php
				if ($tampilproyek == NULL) {
					
				}else{
				foreach ($tampilproyek as $baris) {  ?>
				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout">
						<a href="<?php echo base_url();?>beranda/proyek/<?php echo $baris->no_proyek; ?>" class="listing-item">
							
							<!-- Image -->
							<div class="listing-item-image">
								<img src="<?php echo base_url();?>assets/images/<?php echo $baris->foto_plan_proyek; ?>" alt="">
								<span class="tag">Fasilitas <?php echo $baris->kategori_proyek; ?></span>
							</div>
							
							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
								<h3><?php echo $baris->nama_proyek; ?></h3>
								<span><?php echo $baris->lokasi_proyek; ?>, Purbalingga</span>
									<div class="star-rating" data-rating="5.0">
										<div class="rating-counter">(23 reviews)</div>
									</div>
								</div>

								<span class="like-icon"></span>

								<div class="listing-item-details"><?php echo $baris->nama_pengembang; ?></div>
							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
				<?php }}?>

			</div>
			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-20 margin-bottom-40">
						
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	</div>
</div>