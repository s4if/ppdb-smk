<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Registrasi PPDB SMKIT Ihsanul Fikri</title>

<!-- Di server, jangan lupa untuk diganti menjadi CDN -->

<!-- Bootstrap Core CSS -->
<link href="<?=  FCPATH ?>assets/css/bootstrap.min.css"
	rel="stylesheet">

<!-- Custom CSS -->
<style>
body {
    padding-top: 10px;
}
.p-header {
    background-image: url("<?php echo FCPATH.'assets/images/headerkartu.jpg';?>");
    background-size:cover;
}
.txt-header {
    color:white;
    font-weight:bolder;
    text-align:center;
    text-shadow:
   -2px -2px 0 #000,  
    2px -2px 0 #000,
    -2px 2px 0 #000,
     2px 2px 0 #000;
}
img.foto-profil {
    resize: both;
    height: 4cm;
    width: 3cm;
}
</style>

<!-- JQuery JS -->
<script src="<?=  FCPATH ?>assets/js/jquery-2.1.4.min.js"></script>

</head>

<body>
    <div class="container">
    	<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading p-header">
                        <h1 class="txt-header">Kartu Ujian</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p style="text-align: center;">
                                    Registrasi PPDB SMKIT Ihsanul Fikri Mungkid TA:2020/2021 telah berhasil.<br />
                                    Data yang ter-input adalah sebagai berikut :
                                </p>
                                <table class="table table-responsive table-condensed table-borderless">
                                    <tr>
                                        <td rowspan="6">
                                            <img class="foto-profil" src="<?=FCPATH.'data/'.$registrant->getUploadDir().'/foto.png';?>" alt="Tempelkan Fto 3x4CM">
                                        </td>
                                        <td>Nama </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?php echo ucwords($registrant->getName());?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?php echo ($registrant->getGender()=='L')?'Laki-laki':'Perempuan';?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Pendaftaran </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?php
                                        echo $registrant->getRegId();?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Sekolah </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?php echo $registrant->getPreviousSchool();?></td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><?php echo $registrant->getProgram();?></td>
                                    </tr>
                                    <tr>
                                        <td>Gelombang </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td>2</td>
                                    </tr>
                                </table>
                                <p style="text-align: center; font-size: 0.85em;">
                                    Silahkan kartu ini dibawa saat tes seleksi sebagai kartu peserta dan bukti pendaftaran. <br>
                                    Ujian di laksanakan pada tanggal 24 Januari 2021 Jam 08.00<br >
                                    Di SMK IT Ihsanul Fikri. Jl Blabak - Mendut km 3 Tirto Paremono kec. Mungkid
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading p-header">
                        <h1 class="txt-header">Cek Poin Seleksi</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p style="text-align: center;">
                                    Silahkan kartu ini dimintakan tanda tangan kepada petugas 
                                    setelah melaksanakan tiap sesi!
                                </p>
                                <table class="table table-responsive table-bordered">
                                <tr>
                                    <th class="text-center">Sesi</th>
                                    <th class="text-center">Tanda Tangan</th>
                                </tr>
                                <tr>
                                    <td>Tes Potensi Akademik</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tes Tahsin Tahfidz</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Tes Wawancara</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Ukur Baju</td>
                                    <td>&nbsp;</td>
                                </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="font-size: 0.75em;">
                                Materi Ujian:
                                <ol type="a">
                                    <li>
                                       Tes potensi akademik 
                                    </li>
                                    <li>
                                        Tahsin & tahfidz (bacaan & hafalan Al Qur'an)
                                    </li>
                                    <li>
                                        Wawancara
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Bootstrap Core JS -->
<script src="<?=  FCPATH ?>assets/js/bootstrap.min.js"></script>
</body>
</html>