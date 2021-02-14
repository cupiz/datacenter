<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
    
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sistem Informasi Data Center LPTSI Unsoed">
    <meta name="keywords" content="data center, unsoed, lptsi">
    <meta name="author" content="LPTSI Unsoed">
    <title><?php echo $title; ?> Data Center LPTSI Unsoed</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/laporan.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/app-assets/js/laporan.js"></script>
    
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>

<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> <a href="javascript:window.print();"  style="color:white;">Print</a></button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="<?php echo base_url();?>">
                            <img style="height: 70px; width: auto;" src="<?php echo base_url();?>assets/app-assets/images/logo/logo.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            LPTSI Unsoed
                            </a>
                        </h2>
                        <div>Jl. Prof. dr. HR. Boenjamin 708 Purwokerto 53122</div>
                        <div>Telp. (0281) 635292 (Hunting)</div>
                        <div>Ext. 136</div>
                        <div>lptsi@unsoed.ac.id</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                    <?php
                                   foreach ($tampilakun as $akun) {                          
                                ?>
                        <div class="text-gray-light">Dicetak Oleh :</div>
                        <h2 class="to"><?php echo $akun->nama_user; ?></h2>

                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Laporan Log Aktivitas </h1>
                        <div class="date">Dicetak pada Tanggal : <?php date_default_timezone_set('Asia/Jakarta'); echo date("d/m/Y");?></div>
                    <?php }?>
                    </div>
                </div>
                <table cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">AKTIVITAS</th>
                            <th class="text-right">HALAMAN</th>
                            <th class="text-right">WAKTU</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                    $a = 0;
                                   foreach ($tampil as $baris) {                          
                                    
                                    $a++;
                                ?>
                        <tr>
                            <td class="no"><?php echo $a;?></td>
                            <td class="text-left"><h3>
                            <?php echo $baris->aktivitas; ?>
                            </td>
                            <td class="unit"><?php echo $baris->halaman; ?></td>
                            <td class="qty"><?php echo $baris->waktu; ?></td>
                            
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                    
                </table>
               
                
            </main>
            <footer>
            Lembaga Pengembangan dan Sistem Informasi Universitas Jenderal Soedirman Purwokerto
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

</body>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    
</footer>

<!-- END: Footer-->
