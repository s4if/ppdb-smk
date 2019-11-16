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
    <small>Upload Dokumen</small>
</h1>
<ol class="breadcrumb">
    <li>
        <a href="<?=base_url().$id.'/beranda';?>">Beranda</a>
    </li>
    <li class="active">
        Upload Dokumen
    </li>
</ol>
<div class="container-fluid">
    <div class="row">
        Silahkan upload semua dokumen yang dibutuhkan:

    </div>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>File Yang Persyaratan</th>
                <th>Tipe Dokumen</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
                    <!-- Kalau sudah finalisasi, nani btn upload dan hapus dilindungi if else\
                    pada modal view, gambar di load pakai javascript -->
            <tr>
                <td id="judul_foto">Foto Resmi</td> 
                <td>Gambar</td>
                <td><?=($status_upload['foto'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('foto')">Upload</a>
                    <?php endif;
                    if($status_upload['foto']) :?>
                        <a class="btn btn-info" onclick="modal_view('foto')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('foto')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_akte">Akte Kelahiran</td>  
                <td>Gambar</td>
                <td><?=($status_upload['akte'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('akte')">Upload</a>
                    <?php endif;
                    if($status_upload['akte']) :?>
                        <a class="btn btn-info" onclick="modal_view('akte')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('akte')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_sksekolah">Surat Keterangan dari Sekolah</td>  
                <td>Gambar</td>
                <td><?=($status_upload['sksekolah'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('sksekolah')">Upload</a>
                    <?php endif;
                    if($status_upload['sksekolah']) :?>
                        <a class="btn btn-info" onclick="modal_view('sksekolah')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('sksekolah')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_sksehat">Surat Keterangan Sehat</td>  
                <td>Gambar</td>
                <td><?=($status_upload['sksehat'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('sksehat')">Upload</a>
                    <?php endif;
                    if($status_upload['sksehat']) :?>
                        <a class="btn btn-info" onclick="modal_view('sksehat')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('sksehat')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_skbn">Surat Keterangan Bebas Narkoba</td>  
                <td>Gambar</td>
                <td><?=($status_upload['skbn'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('skbn')">Upload</a>
                    <?php endif;
                    if($status_upload['skbn']) :?>
                        <a class="btn btn-info" onclick="modal_view('skbn')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('skbn')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_ijazah">Ijazah</td>  
                <td>PDF</td>
                <td><?=($status_upload['ijazah'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Tidak Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('ijazah')">Upload</a>
                    <?php endif;
                    if($status_upload['ijazah']) :?>
                        <a class="btn btn-info" onclick="modal_view('ijazah')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('ijazah')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_skhun">SKHUN</td>  
                <td>PDF</td>
                <td><?=($status_upload['skhun'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Tidak Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('skhun')">Upload</a>
                    <?php endif;
                    if($status_upload['skhun']) :?>
                        <a class="btn btn-info" onclick="modal_view('skhun')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('skhun')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_jamkes">Jaminan Kesehatan</td>  
                <td>Gambar</td>
                <td><?=($status_upload['jamkes'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Tidak Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('jamkes')">Upload</a>
                    <?php endif;
                    if($status_upload['jamkes']) :?>
                        <a class="btn btn-info" onclick="modal_view('jamkes')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('jamkes')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
            <tr>
                <td id="judul_sktm">KPS/KKS/KIP/KIS/SKTM</td>  
                <td>Gambar</td>
                <td><?=($status_upload['sktm'])?'<button class="btn btn-success">Sudah Diupload &nbsp;
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>'
                :'<button class="btn btn-warning">Belum Diupload &nbsp;
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </button>';?></td>
                <td>Tidak Wajib</td>
                <td>
                    <?php if (!$registrant->getFinalized()) :?>
                        <a class="btn btn-primary" onclick="modal_upload('sktm')">Upload</a>
                    <?php endif;
                    if($status_upload['sktm']) :?>
                        <a class="btn btn-info" onclick="modal_view('sktm')">Lihat</a>
                        <?php if (!$registrant->getFinalized()) :?>
                            <a class="btn btn-danger" onclick="modal_delete('sktm')">Hapus</a>
                        <?php endif;
                    endif;?>
                </td>
            </tr>
        </table>
    </div>
    <div class="row">
    </div>
</div>
<!--
Jadinya pakai 1 Modal yang dipanggil diedit hrefnya pakai javascript!
Cekingnya pakai readfile?
-->

<div class="modal fade" id="modal_upload" tabindex="-1" role="dialog" aria-labelledby="modal_upload" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="upload_title">Pilih File</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="" enctype="multipart/form-data" id="upload_form">
                    <div class="form-group">
                        <label>Silahkan upload file bertipe <u id="upload_type"></u> disini</label>
                        <input type="file" id="upload_file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Nanti</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_view" tabindex="-1" role="dialog" aria-labelledby="modal_view" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="view_title"></h4>
            </div>
            <div class="modal-body">
                <div id="view_content"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function modal_upload(tipe) {
    switch(tipe) {
        case "foto":
            $("#upload_type").text('Gambar');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_foto/<?=$registrant->getId()?>/dokumen");
            $("#upload_title").text('Upload Foto Resmi');
            break;
        case "akte":
            $("#upload_type").text('Gambar');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_gambar/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload Akte Kelahiran');
            break;
        case "sksekolah":
            $("#upload_type").text('Gambar');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_gambar/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload Surat Keterangan Sekolah');
            break;
        case "sksehat":
            $("#upload_type").text('Gambar');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_gambar/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload Surat Keterangan Sehat');
            break;
        case "skbn":
            $("#upload_type").text('Gambar');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_gambar/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload Surat Bebas Narkoba');
            break;
        case "ijazah":
            $("#upload_type").text('PDF');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_pdf/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload Ijazah');
            break;
        case "skhun":
            $("#upload_type").text('PDF');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_pdf/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload SKHUN');
            break;
        case "jamkes":
            $("#upload_type").text('Gambar');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_gambar/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload Jaminan Kesehatan');
            break;
        case "sktm":
            $("#upload_type").text('Gambar');
            $("#upload_form").attr('action', "<?=base_url();?>pendaftar/upload_dokumen_gambar/<?=$registrant->getId()?>/"+tipe);
            $("#upload_title").text('Upload Surat Keteranga Tidak Mampu dsb...');
            break;
        
        default:
            $("#upload_type").text('none');
            $("#upload_form").attr('action', "<?=base_url();?><?=$registrant->getId()?>/beranda");
            $("#upload_title").text('Salah');
            break;
    }    
    $('#modal_upload').modal('show');
}
function modal_view(tipe) {
    title = $('#judul_'+tipe).text();
    $('#view_title').text(title);
    //if (!(tipe == 'ijazah' && tipe == 'skhun')) {
        $('#view_content').empty();
        img_link = "<?=base_url()."pendaftar/getDocument/".$registrant->getId()."/"?>"+tipe+"/"+Math.random().toString(36).substring(7);
        str_child = "<img src='"+img_link+"' alt='image' class='img-responsive img-thumbnail' >"
        $('#view_content').append(str_child);
    //}
    $('#modal_view').modal('show');
}
</script>