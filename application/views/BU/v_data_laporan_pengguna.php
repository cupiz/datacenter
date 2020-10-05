<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Data Laporan Pengguna</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Beranda</a></li>
							<li>Data Laporan Pengguna</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

	
		<div class="row">
			
			<div class="col-md-12">

				<table class="basic-table">

					<tr>
						<th>Tanggal</th>
						<th>Isi Laporan</th>
						<th>Penilaian</th>
						<th>Foto</th>
						<th>Kelola</th>
					</tr>

					<?php
						foreach ($tampillaporansemua as $baris) {  ?>
					<tr>
						
						<td data-label="Column 1"><?php
													$CI =& get_instance();
													echo $CI->tgl_indo($baris->tgl_laporan); ?></td>
						<td data-label="Column 2"><?php $isi_laporan=$baris->isi_laporan; echo $isi_laporan=character_limiter($isi_laporan, 50); ?></td>
						<td data-label="Column 2"><?php echo $baris->bintang_laporan; ?></td>
						<td data-label="Column 2"><a href="<?php echo base_url();?>assets/images/<?php echo $baris->foto_laporan; ?>" class="mfp-gallery"><i class="fa fa-eye"></i></a></td>
						<td data-label="Column 2"><a href="#" class="dewek"><i class="sl sl-icon-trash"></i></a>&nbsp;<a href="<?php echo base_url();?>beranda/proyek/<?php echo $baris->no_proyek; ?>" class="dewek"><i class="sl sl-icon-link"></i></a></td>
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