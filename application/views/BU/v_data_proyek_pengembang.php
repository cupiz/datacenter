<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Data Proyek Pengembang</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Beranda</a></li>
							<li>Data Proyek Pengembang</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

	
		<div class="row">
			
			<div class="col-md-12">

				<table class="basic-table">

					<tr>
						<th>Nama</th>
						<th>Kategori</th>
						<th>Deskripsi</th>
						<th>Lokasi</th>
						<th>Pencapaian</th>
						<th>Foto</th>
						<th>Kelola</th>
					</tr>

					<?php
						foreach ($tampilproyeksemua as $baris) {  ?>
					<tr>
						
						<td data-label="Column 1"><?php echo $baris->nama_proyek; ?> (<?php echo $baris->estimasi_selesai; ?>)</td>
						<td data-label="Column 2"><?php echo $baris->kategori_proyek; ?></td>
						<td data-label="Column 2"><?php $deskripsi_proyek=$baris->deskripsi_proyek; echo $deskripsi_proyek=character_limiter($deskripsi_proyek, 50); ?></td>
						<td data-label="Column 2"><?php echo $baris->lokasi_proyek; ?></td>
						<td data-label="Column 2"><?php echo $baris->target_proyek; ?></td>
						<td data-label="Column 2"><a href="<?php echo base_url();?>assets/images/<?php echo $baris->foto_plan_proyek; ?>" class="mfp-gallery"><i class="fa fa-eye"></i></a></td>
						<td data-label="Column 2"><a href="<?php echo base_url();?>beranda/proyek/<?php echo $baris->no_proyek; ?>" class="dewek"><i class="sl sl-icon-link"></i></a></td>
					</tr>
					<?php }?>
					
				</table>
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