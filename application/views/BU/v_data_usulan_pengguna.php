<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Data Usulan Pengguna</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Beranda</a></li>
							<li>Data Usulan Pengguna</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

	
		<div class="row">
			
			<div class="col-md-12">

				<table class="basic-table">

					<tr>
						<th>Judul</th>
						<th>Kategori</th>
						<th>Deskripsi</th>
						<th>Lokasi</th>
						<th>Foto</th>
						<th>Kelola</th>
					</tr>

					<?php
						foreach ($tampilusulansemua as $baris) {  ?>
					<tr>
						
						<td data-label="Column 1"><?php echo $baris->judul_usulan; ?></td>
						<td data-label="Column 2"><?php echo $baris->kategori_proyek; ?></td>
						<td data-label="Column 2"><?php $deskripsi_usulan=$baris->deskripsi_usulan; echo $deskripsi_usulan=character_limiter($deskripsi_usulan, 50); ?></td>
						<td data-label="Column 2"><?php $lokasi_usulan=$baris->lokasi_usulan; echo $lokasi_usulan=character_limiter($lokasi_usulan, 50); ?></td>
						<td data-label="Column 2"><a href="<?php echo base_url();?>assets/images/<?php echo $baris->foto_usulan; ?>" class="mfp-gallery"><i class="fa fa-eye"></i></a></td>
						<td data-label="Column 2"><a href="#" class="dewek"><i class="sl sl-icon-trash"></i></a>&nbsp;<a href="#" class="dewek"><i class="sl sl-icon-link"></i></a></td>
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