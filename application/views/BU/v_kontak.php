<!-- Content
================================================== -->
<?php
			foreach ($konfigurasiweb as $baris) {  ?>
<!-- Map Container -->
<div class="contact-map margin-bottom-60">

	<!-- Google Maps -->
	<div id="singleListingMap-container">
		<div id="singleListingMap" data-latitude="-7.392832" data-longitude="109.369709" data-map-icon="im im-icon-Map2"></div>
		<a href="#" id="streetView">Street View</a>
	</div>
	<!-- Google Maps / End -->

	<!-- Office -->
	<div class="address-box-container">
		<div class="address-container" data-background-image="images/our-office.jpg">
			<div class="office-address">
				<h3>Kantor Kami</h3>
				<ul>
					<li style="padding: 0px 20px 0px 20px;"><?php echo $baris->alamat_instansi; ?> <br>(Inspektorat Purbalingga)</li>
					
					<li>Telp <?php echo $baris->notelp_instansi; ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container">

	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">Hubungi Kami</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p>Silahkan hubungi kami bila terdapat kritik, saran ataupun hal lain, kami akan dengan senang hati melayani anda.</p>

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Telp:</strong> <span><?php echo $baris->notelp_instansi; ?> </span></li>
					<li><i class="im im-icon-Facebook"></i> <strong>FB:</strong> <span><a href="<?php echo $baris->fb_instansi; ?>"><?php echo $baris->fb_instansi; ?></a></span></li>
					<li><i class="im im-icon-Twitter"></i> <strong>Web:</strong> <span><a href="<?php echo $baris->twitter_instansi; ?>"><?php echo $baris->twitter_instansi; ?></a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#"><span class="__cf_email__" data-cfemail="9ff0f9f9f6fcfadffae7fef2eff3fab1fcf0f2"><?php echo $baris->email_instansi; ?></span></a></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">Formulir Kontak</h4>

				<div id="contact-message"></div> 

					<form method="post" action="http://www.vasterad.com/themes/listeo/contact.php" name="contactform" id="contactform" autocomplete="on">

					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="name" type="text" id="name" placeholder="Nama Anda" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="subject" type="text" id="subject" placeholder="Judul" required="required" />
					</div>

					<div>
						<textarea name="comments" cols="40" rows="3" id="comments" placeholder="Isi Pesan" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" class="submit button" id="submit" value="Kirim Pesan" />

					</form>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->
<?php } ?>