<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Tentang</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Beranda</a></li>
						<li>Tentang</li>
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
		
		<!-- Contact Details -->
		<div class="col-md-12">
			<?php
			foreach ($konfigurasiweb as $baris) {  ?>
				<h4 class="headline margin-bottom-30"><?php echo $baris->nama_web; ?></h4>
			
			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p><?php echo $baris->tentang_web; ?></p>

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span><?php echo $baris->notelp_instansi; ?></span></li>
					<li><i class="im im-icon-Facebook"></i> <strong>Fax:</strong> <span><?php echo $baris->fb_instansi; ?></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#"><span class="__cf_email__" data-cfemail="9ff0f9f9f6fcfadffae7fef2eff3fab1fcf0f2"><?php echo $baris->email_instansi; ?></span></a></span></li>
				</ul>
			</div>
			<?php } ?>
		</div>

	</div>
</div>
<!-- Container / End -->