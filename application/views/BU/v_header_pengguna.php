<!DOCTYPE html>

<head>

<!-- Basic Page Needs
================================================== -->
<title><?php echo $title; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/colors/main.css" id="colors">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">
<?php
	foreach ($konfigurasiweb as $baris) {  ?>
<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="<?php echo base_url();?>pengguna"><img src="<?php echo base_url();?>assets/images/<?php echo $baris->logo_web; ?>" alt=""></a>
					<a href="<?php echo base_url();?>pengguna" class="dashboard-logo"><img src="<?php echo base_url();?>assets/images/logopbgdev2.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="<?php echo base_url();?>" class="<?php if($this->uri->segment('1')=="" and $this->uri->segment('2')==""){echo 'current';}?>">Beranda</a></li>
						<li><a href="<?php echo base_url();?>beranda/tentang" class="<?php if($this->uri->segment('1')=="beranda" and $this->uri->segment('2')=="tentang"){echo 'current';}?>">Tentang</a></li>
						
						<li><a href="#" class="<?php if($this->uri->segment('1')=="beranda" and $this->uri->segment('2')=="kategori"){echo 'current';}?>">Kategori</a>
							<ul>

								<?php
								     foreach ($tampilkategori as $baris) {  ?>
								     <li><a href="<?php echo base_url();?>beranda/kategori/<?php echo $baris->no_kategori_proyek; ?>"><?php echo $baris->kategori_proyek; ?></a></li>
								   
								<?php }?>
								<li><a href="<?php echo base_url();?>beranda/semuaproyek">Semua Kategori</a></li>

							</ul>
						</li>

						<li><a href="<?php echo base_url();?>beranda/panduan" class="<?php if($this->uri->segment('1')=="beranda" and $this->uri->segment('2')=="panduan"){echo 'current';}?>">Panduan</a></li>
						<li><a href="<?php echo base_url();?>beranda/kontak" class="<?php if($this->uri->segment('1')=="beranda" and $this->uri->segment('2')=="kontak"){echo 'current';}?>">Kontak</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					<a href="<?php echo base_url();?>pengguna/keluar" class="sign-in"><i class="sl sl-icon-logout"></i> Keluar</a>
					<a href="<?php echo base_url();?>beranda/tambahusulan" class="button border with-icon">Kirim Usulan <i class="sl sl-icon-plus"></i></a>
				</div>
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<?php }?>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Menu Pengguna</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Utama">
				<li class="<?php if($this->uri->segment('1')=="pengguna" and $this->uri->segment('2')==""){echo 'active';}?>"><a href="<?php echo base_url();?>pengguna"><i class="sl sl-icon-settings"></i> Beranda</a></li>
				<li class="<?php if($this->uri->segment('1')=="pengguna" and $this->uri->segment('2')=="datalaporan"){echo 'active';}?>"><a href="<?php echo base_url();?>pengguna/datalaporan"><i class="fa fa-bullhorn "></i> Data Laporan</a></li>
				<li class="<?php if($this->uri->segment('1')=="pengguna" and $this->uri->segment('2')=="datausulan"){echo 'active';}?>"><a href="<?php echo base_url();?>pengguna/datausulan"><i class="im im-icon-Folder-WithDocument"></i> Data Usulan</a></li>
				
			</ul>
			

			<ul data-submenu-title="Akun">
				<li class="<?php if($this->uri->segment('1')=="pengguna" and $this->uri->segment('2')=="akun"){echo 'active';}?>"><a href="<?php echo base_url();?>pengguna/akun"><i class="sl sl-icon-user"></i> Akunku</a></li>
				<li><a href="<?php echo base_url();?>pengguna/keluar"><i class="sl sl-icon-power"></i> Keluar</a></li>
			</ul>
			
		</div>
	</div>
	<!-- Navigation / End -->