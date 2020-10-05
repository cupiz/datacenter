			<div class="row" id="dataproyek">

				<?php
				foreach ($tampilproyekradius as $baris) {  ?>
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
				<?php }?>

			</div>