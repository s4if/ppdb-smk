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
    <small>Lihat Dokumen</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="<?=base_url().'admin/beranda';?>">Beranda</a>
    </li>
    <li>
        <a href="<?=base_url().'admin/lihat/';?>">Data Peserta</a>
    </li>
    <li>
        <a href="<?=base_url().'admin/registrant/'.$id;?>">Profil</a>
    </li>
    <li class="active">
        Lihat Dokumen
    </li>
</ol>
<div class="container-fluid">
    <div class="row">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Status Dokumen</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>File Yang Persyaratan</th>
                                    <th>Tipe Dokumen</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                                <tr>
                                    <td id="judul_foto">Foto Resmi</td> 
                                    <td>Gambar</td>
                                    <td><?=($status_upload['foto'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_akte">Akte Kelahiran</td>  
                                    <td>Gambar</td>
                                    <td><?=($status_upload['akte'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_sksekolah">Surat Keterangan dari Sekolah</td>  
                                    <td>Gambar</td>
                                    <td><?=($status_upload['sksekolah'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_sksehat">Surat Keterangan Sehat</td>  
                                    <td>Gambar</td>
                                    <td><?=($status_upload['sksehat'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_skbn">Surat Keterangan Bebas Narkoba</td>  
                                    <td>Gambar</td>
                                    <td><?=($status_upload['skbn'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_ijazah">Ijazah</td>  
                                    <td>PDF</td>
                                    <td><?=($status_upload['ijazah'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Tidak Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_skhun">SKHUN</td>  
                                    <td>PDF</td>
                                    <td><?=($status_upload['skhun'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Tidak Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_jamkes">Jaminan Kesehatan</td>  
                                    <td>Gambar</td>
                                    <td><?=($status_upload['jamkes'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Tidak Wajib</td>
                                </tr>
                                <tr>
                                    <td id="judul_sktm">KPS/KKS/KIP/KIS/SKTM</td>  
                                    <td>Gambar</td>
                                    <td><?=($status_upload['sktm'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                                    :'<button class="btn btn-warning">Belum Diupload &nbsp;
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                                    <td>Tidak Wajib</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="<?=base_url().'admin/download_dokumen/'.$id?>" class="btn btn-lg btn-success">Download Semua File &nbsp;<span class="glyphicon glyphicon glyphicon-floppy-save" aria-hidden="true"></span> </a>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $lst_dokumen = [
            'foto' => 'Foto',
            'akte' => 'Akte Kelahiran',
            'sksekolah' => 'Surat Keterangan Sekolah',
            'sksehat' => 'Surat Keterangan Sehat',
            'skbn' => 'Surat Keterangan Bebas Narkoba',
            'ijazah' => 'Ijazah',
            'skhun' => 'SKHUN',
            'jamkes' => 'Jaminan Kesehatan',
            'sktm' => 'KPS/KKS/KIP/KIS/SKTM'
        ];
    $datetime = new DateTime('now');
    foreach ($lst_dokumen as $dokumen => $str_dokumen) :
        if ($status_upload[$dokumen]) :
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title"><?=$lst_dokumen[$dokumen]?></h2>
                </div>
                <div class="panel-body">
                    <?php if ($dokumen == 'ijazah' || $dokumen == 'skhun') :?>
                        <embed src="<?=base_url().'pendaftar/getDocument/'.$id.'/'.$dokumen.'/'.hash('md2', $datetime->format('Y-m-d H:i:s'));?>" 
                        type="application/pdf" width="100%" height="600px"></embed>
                    <?php else : ?>
                        <img src="<?=base_url().'pendaftar/getDocument/'.$id.'/'.$dokumen.'/'.hash('md2', $datetime->format('Y-m-d H:i:s'));?>" 
                        alt='image' class='img-responsive img-thumbnail' >
                    <?php endif; ?>
                </div>
                <div class="panel-footer">&nbsp;
                </div>
            </div>
        </div>
    </div>
    <?php
        endif;
    endforeach;
    ?>
</div>