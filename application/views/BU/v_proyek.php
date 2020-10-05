<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
	<?php
		foreach ($tampilproyeksatu as $baris) {  ?>
		<a href="<?php echo base_url();?>assets/images/<?php echo $baris->foto_plan_proyek; ?>" data-background-image="<?php echo base_url();?>assets/images/<?php echo $baris->foto_plan_proyek; ?>" class="item mfp-gallery" title="Foto Proyek Purbalingga"></a>
	<?php }?>
	<?php
	foreach ($tampilfotoproyek as $baris) {  ?>
	<a href="<?php echo base_url();?>assets/images/<?php echo $baris->foto_proyek; ?>" data-background-image="<?php echo base_url();?>assets/images/<?php echo $baris->foto_proyek; ?>" class="item mfp-gallery" title="Foto Proyek Purbalingga"></a>
	<?php }?>

</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<?php
		foreach ($tampilproyeksatu as $baris) {  
			$no_proyek = $baris->no_proyek;
			?>
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2><?php echo $baris->nama_proyek; ?><span class="listing-tag">Fasilitas <?php echo $baris->kategori_proyek; ?></span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							<?php echo $baris->lokasi_proyek; ?>, Purbalingga
						</a>
					</span>
					<div class="star-rating" data-rating="5">
						<div class="rating-counter"><a href="#listing-reviews">(31 laporan)</a></div>
					</div>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Tentang Proyek</a></li>
					<li><a href="#targett">Target</a></li>
					<li><a href="#listing-location">Lokasi</a></li>
					<li><a href="#listing-reviews">Laporan / Ulasan</a></li>
					<li><a href="#add-review">Tambah Laporan</a></li>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p>
					<?php echo $baris->deskripsi_proyek; ?>
				</p>

				
				<div id="targett" class="listing-section">

				<!-- Amenities -->
				<h3 class="listing-desc-headline" id="listing-desc-headline">Target Pencapaian Proyek</h3>
				<ul class="listing-features checkboxes margin-top-0">
					<?php
						$pencapaians = $baris->target_proyek;
						$pencapaian = explode(",", $pencapaians);


						$i = 0;
					
						foreach ($pencapaian as &$value) {
						    $value = $value;
						    echo '
						    	<li>' . $pencapaian[$i] . '</li>
						    ';
						    $i = $i + 1;
						}
						
					?>

				</ul>

				</div>
			</div>


		

		
			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Lokasi Proyek</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="<?php echo $baris->lat; ?>" data-longitude="<?php echo $baris->lng; ?>" data-map-icon="im <?php echo $baris->ikon_kategori; ?>"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>

			<?php }?>
				
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Laporan <span>(12)</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul>
						<?php
						foreach ($tampillaporansatu as $baris) {  ?>
						<li>
							<div class="avatar"><img src="<?php echo base_url();?>assets/images/<?php echo $baris->foto_pengguna; ?>" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by"><?php echo $baris->nama_pengguna; ?>
									<span class="date">

									<?php
									$CI =& get_instance();
									echo $CI->tgl_indo($baris->tgl_laporan); ?>
										
									</span>
									<div class="star-rating" data-rating="<?php echo $baris->bintang_laporan; ?>"></div>
								</div>
								<p><?php echo $baris->isi_laporan; ?></p>
								
								<div class="review-images mfp-gallery-container">
									<a href="<?php echo base_url();?>assets/images/<?php echo $baris->foto_laporan; ?>" class="mfp-gallery"><img src="<?php echo base_url();?>assets/images/<?php echo $baris->foto_laporan; ?>" alt=""></a>
								</div>
								
							</div>
						</li>
						<?php }?>
					
					 </ul>
				</section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						<div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>


			
			<!-- Add Review Box -->
			<?php echo form_open_multipart('beranda/simpantambahlaporan');?>

			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Buat Ulasan (Laporan)</h3>
				
				<span class="leave-rating-title">Beri penilaian mengenai proyek dalam bintang</span>
				
				<!-- Rating / Upload Button -->
				<div class="row">
					<div class="col-md-6">
						<!-- Leave Rating -->
						<div class="clearfix"></div>
						<div class="leave-rating margin-bottom-30">
							<input type="radio" name="rating" id="rating-1" value="1" required/>
							<label for="rating-1" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-2" value="2"/>
							<label for="rating-2" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-3" value="3"/>
							<label for="rating-3" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-4" value="4"/>
							<label for="rating-4" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-5" value="5"/>
							<label for="rating-5" class="fa fa-star"></label>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="col-md-6">
						<!-- Uplaod Photos -->
						<div class="add-review-photos margin-bottom-30">
							<div class="photoUpload">
							    <span><i class="sl sl-icon-arrow-up-circle"></i> Unggah Foto</span>
							    <input type="file" class="upload" name="gambar" />
							</div>
						</div>
					</div>
				</div>
				
				<?php
				$no_pengguna = $this->session->userdata('no_pengguna');
				if ($no_pengguna=='') {
					echo'
						<div class="notification notice closeable">
							<p><span><b>Mohon Maaf.</b></span> <br>Anda dapat memberikan atau mengirimkan ulasan / laporan setelah anda terdaftar dan masuk sebagai pengguna. <br>Silahkan daftar terlebih dahulu, pilih menu "Masuk" dan pilih tab "Daftar".</p>
							<a class="close"></a>
						</div>
						<br>
					';
				}else{ ?>
				<!-- Review Comment -->
				
					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Nama:</label>
								<input type="text" value="<?php echo $this->session->userdata('nama_pengguna'); ?>" name="nama_pengguna" readonly="" />
								<input type="hidden" value="<?php echo $this->session->userdata('no_pengguna'); ?>" name="no_pengguna" readonly="" />
								<input type="hidden" value="<?php echo $no_proyek; ?>" name="no_proyek" readonly="" />
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="text" value="<?php echo $this->session->userdata('email_pengguna'); ?>" name="email_pengguna" readonly=""/>
							</div>
						</div>

						<div>
							<label>Isi Laporan:</label>
							<textarea cols="40" rows="3" name="isi_laporan" required></textarea>
						</div>

					</fieldset>

					<button class="button" type="submit">Kirim Laporan</button>
					<div class="clearfix"></div>
				<?php } ?>

			</div>
			</form>
			<!-- Add Review Box / End -->
			

		</div>
		

		<?php
		foreach ($tampilproyeksatu as $baris) {  ?>
		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">
		
			<?php
				if ($baris->status_proyek=="1") {
					echo'
					<!-- Verified Badge -->
					<div class="verified-badge with-tip" data-tip-content="Proyek ini dalam proses pembangunan, masyarakat dapat bersama mengawasi.">
						<i class="sl sl-icon-check"></i> Proses Pembangunan
					</div>
					';
				}elseif ($baris->status_proyek=="2") {
					echo'
					<!-- Verified Badge -->
					<div class="verified-badge with-tip" data-tip-content="Proyek ini sudah selesai, silahkan beri ulasan atau laporan." style="background-color: #ff6501;border-color: #ff6501;">
						<i class="sl sl-icon-check"></i> Proyek Pembangunan Selesai
					</div>
					';
				}
			?>		
			

			<!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
				<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					</ul>
				<span><?php echo $baris->view; ?> telah melihat proyek ini</span>

					<!-- Share Buttons -->
					
					<div class="clearfix"></div>
			</div>

			<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Pengembang proyek</span> <a href="pages-user-profile.html"><?php echo $baris->nama_pengembang; ?></a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="<?php echo base_url();?>assets/images/<?php echo $baris->logo_pengembang; ?>" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i> <?php echo $baris->notelp_pengembang; ?></li>
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
					<li><a href="<?php echo $baris->web_pengembang; ?>"><i class="fa fa-globe"></i> <?php echo $baris->web_pengembang; ?></a></li>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<li><a href="<?php echo $baris->fb_pengembang; ?>" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				</ul>

				
			</div>
			<!-- Contact / End-->
			
		<?php } ?>

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Terbaru</div>
				<h3><i class="sl sl-icon-clock"></i> Laporan Masyarakat</h3>
				<ul>
					<?php
						foreach ($tampillaporanterbaru as $baris) {  ?>
							<li><?php echo $baris->nama_pengguna; ?> <span><a href="<?php echo base_url();?>beranda/proyek/<?php echo $baris->no_proyek; ?>"><i class="fa fa-share-square-o " style="color: #f91942"></i></a></span></li>
					<?php }?>
					
				</ul>
			</div>
			<!-- Opening Hours / End -->


			


			

		</div>
		<!-- Sidebar / End -->

	</div>
</div>