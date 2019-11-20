<?php

/* 
 * The MIT License
 *
 * Copyright 2015 s4if.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

?>

<h1 class="page-header">
    Pendaftar
    <small>Surat Pernyataan</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="<?=base_url().$id.'/beranda';?>">Beranda</a>
    </li>
    <li class="active">
        Surat Pernyataan
    </li>
</ol>
<div class="container-fluid">
    <div class="row">
        <p>
            Pada langkah ini, Anda akan membuat surat pernyataan mengenai Jumlah Uang Infaq pendidikan, IDP, dll. <br />
            Pastikan yang mengisi formulir ini adalah <strong>Orang Tua</strong> atau Anda <strong>Telah berdiskusi</strong> dengan orang tua Anda. <br/>
            Berikut isi pernyataannya:
        </p>
    </div>
    <?php $program = $registrant->getProgram();?>
    <div class="row">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h5>Isi Pernyataan</h5>
            </div>
            <div class="panel-body">
                <p>Dengan ini menyatakan bahwa:</p>
                <ol>
                    <li class="pernyataan">
                        Jika anak saya diterima sebagai siswa SMKIT Ihsanul Fikri Mungkid, saya menyerahkan anak saya dan siap bekerja sama 
                        dalam hal pembinaan diri selama berstatus sebagai siswa SMKIT Ihsanul Fikri Mungkid, bersedia menerima segala konsekuensi
                        akibat peraturan yang berlaku di dalamnya, dan tidak menuntut apapun yang menjadi keputusan sekolah.
                    </li>
                    <li class="pernyataan">
                        Jika anak saya diterima sebagai siswa SMKIT Ihsanul Fikri Mungkid, saya akan melunasi  
                        pembiayaan sesuai dengan kesanggupan saya:
                    </li>
                    <table class="table-bordered table-responsive">
                        <tr>
                            <th>Jenis Pembiayaan</th>
                            <th>Nominal Pembiayaan</th>
                        </tr>
                        <tr>
                            <td>a. Infaq Pendidikan</td>
                            <td><strong>[[Sesuai Pilihan]]</strong></td>
                        </tr>
                        <tr>
                            <td>b. Iuran Dana Pendidikan (IDP) bulanan</td>
                            <td><strong>[[Sesuai Pilihan]]</strong></td>
                        </tr>
                        <tr>
                            <td>c. Wakaf Tanah</td>
                            <td><strong>[[Sesuai Pilihan]]</strong></td>
                        </tr>
                        <tr>
                            <td>d. Seragam</td>
                            <td>Rp. 1.800.000,-</td>
                        </tr>
                        <tr>
                            <td>e. Kesiswaan</td>
                            <td>Rp. 1.650.000,-</td>
                        </tr>
                        <tr>
                            <td>f. Biaya Kesehatan</td>
                            <td>Rp. 150.000,-</td>
                        </tr>
                        <tr>
                            <td>g. Biaya Buku</td>
                            <td>Rp. 750.000,-</td>
                        </tr>
                        <tr>
                            <td>h. Biaya Praktek</td>
                            <td>Rp. 500.000,-</td>
                        </tr>
                    </table>
                    
                    <li class="pernyataan">
                        Bersedia mengikuti program Qurban minimal 1 kali selama menjadi siswa SMKIT Ihsanul 
                        Fikri Mungkid pada Hari Raya Idul Adha tahun 2020/2021/2022 (Tahun dapat dipilih).
                    </li>
                    <li class="pernyataan">
                        Apabila setelah pendaftaran ulang ternyata anak saya mengundurkan diri, maka saya 
                        tidak akan menuntut segala yang telah saya bayarkan sebelumnya. Seluruh pembiayaan 
                        yang saya bayarkan tidak akan saya tarik kembali dan dijadikan sebagai Infaq.
                    </li>
                </ol>
            </div>
            <div class="panel-footer">
                &nbsp;
            </div>
        </div>
    </div>
    <div class="row">
        <p>
            Jika Anda telah membaca pernyataan dan setuju, silakan isi form dibawah ini untuk menentukan jumlah kesediaan membayar.
        </p>
    </div>
    <div class="row">
        <form class="form-horizontal" role="form" method="post" action="<?=base_url().'pendaftar/isi_pernyataan/'.$id;?>">
            <div class="form-group">
                <label class="col-sm-3 control-label">Infaq Pendidikan :</label>
                <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_icost" value="4000000" 
                                <?php if(!empty($registrant->getInitialCost())):?>
                                    <?php if($registrant->getInitialCost() == '4000000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 4.000.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_icost" value="5000000" 
                                <?php if(!empty($registrant->getInitialCost())):?>
                                    <?php if($registrant->getInitialCost() == '5000000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 5.000.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_icost" value="6000000" 
                                <?php if(!empty($registrant->getInitialCost())):?>
                                    <?php if($registrant->getInitialCost() == '6000000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 6.000.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_icost" value="-999" 
                                <?php if(!empty($registrant->getInitialCost())):?>
                                    <?php if(!($registrant->getInitialCost() == '4000000'||
                                            $registrant->getInitialCost() == '5000000'||
                                            $registrant->getInitialCost() == '6000000')):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Lebih dari 6 Juta Rupiah
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <input type="number" onkeyup="rupiah('icost')" pattern="^([0-9]{1,9}$)" name="other_icost" title="Maksimal 9 digit angka!"
                           class="form-control" placeholder="Masukkan Jumlah Melebihi *NOMINAL TERSEDIA* Tanpa Titik" value="<?=$registrant->getInitialCost();?>">
                </div>
            </div>
            <div class="form-group">
                <p class="help-block col-sm-offset-4 col-sm-4" id="icost_help"></p>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Iuran Dana Pendidikan (IDP) :</label>
                <div class="col-sm-4">
                    <?php if ($registrant->getProgram()=='Kelas Reguler') : ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_scost" value="900000" 
                                <?php if(!empty($registrant->getSubscriptionCost())):?>
                                    <?php if($registrant->getSubscriptionCost() == '900000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 900.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_scost" value="1000000" 
                                <?php if(!empty($registrant->getSubscriptionCost())):?>
                                    <?php if($registrant->getSubscriptionCost() == '1000000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 1.000.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_scost" value="1100000" 
                                <?php if(!empty($registrant->getSubscriptionCost())):?>
                                    <?php if($registrant->getSubscriptionCost() == '1100000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 1.100.000,-
                        </label>
                    </div>
                    <?php else : ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_scost" value="1200000" 
                                <?php if(!empty($registrant->getSubscriptionCost())):?>
                                    <?php if($registrant->getSubscriptionCost() == '1200000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 1.200.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_scost" value="1300000" 
                                <?php if(!empty($registrant->getSubscriptionCost())):?>
                                    <?php if($registrant->getSubscriptionCost() == '1300000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 1.300.000,-
                        </label>
                    </div>
                    <?php endif; ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_scost" value="-999" 
                                <?php if(!empty($registrant->getSubscriptionCost())):?>
                                    <?php if(!($registrant->getSubscriptionCost() == '900000'||
                                            $registrant->getSubscriptionCost() == '1000000' ||
                                            $registrant->getSubscriptionCost() == '1100000' ||
                                            $registrant->getSubscriptionCost() == '1200000' ||
                                            $registrant->getSubscriptionCost() == '1300000')):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Lebih dari <?=($registrant->getProgram()=='Kelas Reguler')?'1,1':'1,3'?> Juta Rupiah
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <input type="number" onkeyup="rupiah('scost')" name="other_scost" pattern="^([0-9]{1,8}$)" title="Maksimal 8 digit angka!"
                           class="form-control" placeholder="Masukkan Jumlah Melebihi *NOMINAL TERSEDIA* Tanpa Titik" value="<?=$registrant->getSubscriptionCost();?>">
                </div>
            </div>
            <div class="form-group">
                <p class="help-block col-sm-offset-4 col-sm-4" id="scost_help"></p>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Wakaf Tanah :</label>
                <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_lcost" value="400000" 
                                <?php if(!empty($registrant->getLandDonation())):?>
                                    <?php if($registrant->getLandDonation() == '400000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 400.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_lcost" value="500000" 
                                <?php if(!empty($registrant->getLandDonation())):?>
                                    <?php if($registrant->getLandDonation() == '500000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 500.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_lcost" value="600000" 
                                <?php if(!empty($registrant->getLandDonation())):?>
                                    <?php if($registrant->getLandDonation() == '600000'):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Rp. 600.000,-
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="raw_lcost" value="-999" 
                                <?php if(!empty($registrant->getLandDonation())):?>
                                    <?php if(!($registrant->getLandDonation() == '400000'||
                                            $registrant->getLandDonation() == '500000' ||
                                            $registrant->getLandDonation() == '600000')):?>
                                    checked
                                    <?php endif;?>
                                <?php endif;?>>
                            Lebih dari 600 ribu Rupiah
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <input type="number" name="other_lcost" pattern="^([0-9]{1,9}$)" title="Maksimal 8 digit angka!"
                           class="form-control" onkeyup="rupiah('lcost')" placeholder="Masukkan Jumlah Melebihi *NOMINAL TERSEDIA* Tanpa Titik" value="<?=$registrant->getLandDonation();?>">
                    <input type="number" name="boarding_kit" hidden="true" value="1">
                </div>
            </div>
            <div class="form-group">
                <p class="help-block col-sm-offset-4 col-sm-4" id="lcost_help"></p>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Yang Dicantumkan :</label>
                <div class="col-sm-4">
                    <select class="form-control" name="main_parent">
                        <option value="father" 
                                <?php if(!empty($registrant->getMainParent())):?>
                                    <?php if($registrant->getMainParent() == 'father'):?>
                                    selected="true" 
                                    <?php endif;?>
                                <?php endif;?>>
                            Nama Ayah
                        </option>
                        <option value="mother" 
                                <?php if(!empty($registrant->getMainParent())):?>
                                    <?php if($registrant->getMainParent() == 'mother'):?>
                                    selected="true" 
                                    <?php endif;?>
                                <?php endif;?>>
                            Nama Ibu
                        </option>
                        <option value="guardian" 
                                <?php if(!empty($registrant->getMainParent())):?>
                                    <?php if($registrant->getMainParent() == 'guardian'):?>
                                    selected="true" 
                                    <?php endif;?>
                                <?php endif;?>>
                            Nama Wali
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <label class="text-center">
                        Bersedia mengikuti program Qurban minimal 1 kali selama menjadi siswa SMKIT 
                        Ihsanul Fikri Mungkid pada Hari Raya Idul Adha tahun 2020/2021/2022.
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="checkbox">
                    <label>
                        <input type="checkbox" name="q1" value="2020" <?php
                            if (strpos($registrant->getQurban(), '2020') !== false) {
                                echo "checked";
                            }
                        ?> > 2020
                    </label>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="checkbox">
                    <label>
                        <input type="checkbox" name="q2" value="2021" <?php
                            if (strpos($registrant->getQurban(), '2021') !== false) {
                                echo "checked";
                            }
                        ?> > 2021
                    </label>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="checkbox">
                    <label>
                        <input type="checkbox" name="q3" value="2022" <?php
                            if (strpos($registrant->getQurban(), '2022') !== false) {
                                echo "checked";
                            }
                        ?> > 2022
                    </label>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-4">
                    <button type="submit" class="btn btn-sm btn-primary">OK</button>
                    <a class="btn btn-sm btn-warning" href="<?=base_url().$id;?>/beranda">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
function rupiah(key) {
    var angka = $('input[name=other_'+key+']').val();
    if (isNaN(angka)) {
        $('#'+key+'_help').html('error');
    } else {
        str_angka = 'Tersimpan sebagai: '+format_rupiah(angka);
        $('#'+key+'_help').html(str_angka);
    }
}
</script>