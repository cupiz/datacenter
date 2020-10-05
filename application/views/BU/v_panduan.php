<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Panduan</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Beranda</a></li>
						<li>Panduan</li>
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
				<h4 class="headline margin-bottom-30">Panduan Sistem Aplikasi</h4>
			
			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p><?php echo $baris->panduan_web; ?></p>

			</div>
			<?php } ?>
		</div>

	</div>
</div>
<!-- Container / End -->