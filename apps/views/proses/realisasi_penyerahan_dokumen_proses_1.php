<?php
/*
 * Project Name: notary
 * File Name: realisasi_penyerahan_dokumen_proses
 * Created on: 29 Jan 14 - 10:54:37
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>

    </head>

    <body>
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update_asli') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Status keaslian dokumen berhasil diupdate!</div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update_dokumen') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Dokumen terupload berhasil diupdate!</div>
                    </div>
                    <?php
                }
                ?>
                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">
                    <div class="page-header">
                        <a onclick="history.go(-1);" href="#" class="button" />
                        <div class="icon">
                            <span class="ico-arrow-left"></span>
                        </div>
                        </a>
                        <h1>Back<small> Kembali ke Halaman Sebelumnya</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">

                            <div class="block">
                                <div class="head">
                                    <h2>Validasi Proses Pra-Realisasi</h2>
                                </div>
                                <div class="data-fluid">
                                    <div class="row-form">
                                        <div class="span4">ID Pra-Realisasi:</div>
                                        <div class="span8"><input type="text" name="test" value="<?= $this->uri->segment(7) ?>" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        
                                        <div class="span4">Nama Customer:</div>
                                        <div class="span8"><input type="text" name="test" value="<?$customer = $this->model_core->get_where_result('customertrans', array('TRANSAKSIPRAID' => $this->uri->segment(7)));
                                                                    foreach ($customer as $row2) {
                                                                        ECHO $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row2->CUSTOMERID, 'NAMACUST') . ', ';
                                                                    }?>" disabled/></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span10">
                            <?php
                            if ($dataTableDokumen == NULL) {
                                ?>
                                <div class="btn-group">
                                    <a href="#gModal" role="button" data-toggle="modal"><button class="btn">Add</button></a>
                                </div><br>
                                <span class="label label-info"><i>*) Jika tidak ada data, berarti anda belum mengupload data sama sekali. Silahkan klik tombol +(add) untuk menambah data dokumen</i></span>
                                <?php
                            } else {
                                ?>

                                <div class="block">
                                    <div class="head green">
                                        <div class="icon"><span class="ico-brush"></span></div>
                                        <h2>Update Dokumen Proses:</h2>
                                        <ul class="buttons">
                                            <li><a href="#gModal" role="button" data-toggle="modal"><div class="icon"><span class="ico-plus-sign"></span></div></a></li>
                                        </ul>
                                    </div>
                                    <div class="data-fluid">
                                        <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover">
                                            <thead>
                                                <tr class="">
                                                    <th width="5%">No.</th>
                                                    <th width="15%">Jenis Dokumen</th>
                                                    <th width="20%">Status Keaslian</th>
                                                    <th width="20%">Status Validasi</th>
                                                    <th width="20%">Scanned Document</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1
                                                ?>
                                                <?php foreach ($dataTableDokumen as $row) :
                                                    ?>
                                                    <tr class="">
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $this->model_translate->dynamicTranslate('tipedokumen', 'TIPEDOKUMENID', $row->TIPEDOKUMENID, 'TIPEDOKDESC') ?></td>
                                                        <?php if ($row->asli == 0) { ?>
                                                            <td><span class="label label-important">Bukan Asli</span></td>
                                                        <?php } ?>
                                                        <?php if ($row->asli == 1) { ?>
                                                            <td><span class="label label-success">Asli</span></td>
                                                        <?php } ?>
                                                        <?php if ($row->IDSTATUSDOC == 1) { ?>
                                                            <td><span class="label label-warning">In Progress</span></td>
                                                        <?php } ?>
                                                        <?php if ($row->IDSTATUSDOC == 2) { ?>
                                                            <td><span class="label label-success">Valid</span></td>
                                                        <?php } ?>
                                                        <?php if ($row->IDSTATUSDOC == 3) { ?>
                                                            <td><span class="label label-important">Not Valid</span></td>
                                                        <?php } ?>
                                                        <?php
                                                        // Example 1
                                                        $gambar = $row->SCANNEDDOKFILE;
                                                        $pieces = explode(";", $gambar);
                                                        ?>
                                                        <td><a href="<?= base_url() ?>assets/docs/<?= $pieces[0]; ?>"><?= $pieces[0]; ?></a></td>

                                                        <td>
                                                            <a href="#fModal" role="button" data-toggle="modal" onClick="modalToogler('<?= $row->DOKUMENID ?>')" class="button yellow tip" data-original-title="Update Status Dokumen">
                                                                <div class="icon"><span class="icon-pencil icon-white"></span></div>
                                                            </a>
                                                            <a href="#sModal" role="button" data-toggle="modal" onClick="modalToogler2('<?= $row->DOKUMENID ?>')" class="button yellow tip" data-original-title="Update Scanned Dokumen">
                                                                <div class="icon"><span class="icon-upload icon-white"></span></div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->load->view('slice/tambal'); ?>
                </div>
            </div>
        </div>
        <!-- Bootrstrap modal form -->
        <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form action="<?= base_url() ?>control/edit/status_dokumen_asli" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Pilih Status Validasi</h3>
                </div>
                <div class="row-form">
                    <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(7) ?>">
                    <input type="hidden" name="TIPEDOKUMENID" value="<?= $this->uri->segment(6) ?>">
                    <input type="hidden" id="dokumen" name="DOKUMENID" value="">
                    <div class="span6">Status Validasi Dokumen:</div>
                    <div class="span10">
                        <select class="select" name="IDSTATUSDOC">
                            <option value="0">choose a option...</option>
                            <?php foreach ($dataStatusDokumen as $row):
                                ?>
                                <option value="<?= $row->IDSTATUSDOC ?>"><?= $row->STATUS ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="span6">Status Keaslian Dokumen:</div>
                    <div class="span10">
                        <select class="select" name="asli">
                            <option value="#">choose a option...</option>
                            <option value="0">Bukan asli</option>
                            <option value="1">Asli</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" aria-hidden="true">Save updates</button>
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
        <div id="gModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form action="<?= base_url() ?>control/add/status_dokumen_asli" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Pilih Status Validasi</h3>
                </div>
                <div class="row-form">
                    <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(7) ?>">
                    <input type="hidden" name="TIPEDOKUMENID" value="<?= $this->uri->segment(6) ?>">
                    
                    <div class="span6">Status Dokumen:</div>
                    <div class="span10">
                        <select class="select" name="IDSTATUSDOC">
                            <option value="0">choose a option...</option>
                            <?php foreach ($dataStatusDokumen as $row):
                                ?>
                                <option value="<?= $row->IDSTATUSDOC ?>"><?= $row->STATUS ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="span6">Status Keaslian:</div>
                    <div class="span10">
                        <select class="select" name="asli">
                            <option value="#">choose a option...</option>
                            <option value="0">Bukan asli</option>
                            <option value="1">Asli</option>
                        </select>
                    </div>
                    <div class="span2">Upload Scanned:</div>
                    <div class="span5">
                        <input type="file" name="dokumen"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" aria-hidden="true">Save updates</button>
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
        <!-- Bootrstrap modal form -->
        <div id="sModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabels">Upload Fix Document</h3>
            </div>
            <form method="POST" action="<?= base_url() ?>control/edit/upload_dokumen" enctype="multipart/form-data">
                <div class="row-fluid">
                    <div class="block-fluid">
                        <div class="row-form">
                            <div class="span12">
                                <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(7) ?>">
                                <input type="hidden" name="TIPEDOKUMENID" value="<?= $this->uri->segment(6) ?>">
                                <input type="hidden" id="dokumen2" name="DOKUMENID" value="">
                                <div class="span2">Upload Scanned:</div>
                                <div class="span5">
                                    <input type="file" name="dokumen"/>
                                </div>                  
                            </div>
                        </div>
                    </div>
                </div>                   
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save updates</button> 
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
                </div>
            </form>
        </div>
    </body>
</html>
<script language="javascript">

    function modalToogler(dokId)
    {
        document.getElementById('dokumen').value = dokId;
    }
    function modalToogler2(dokId2)
    {
        document.getElementById('dokumen2').value = dokId2;
    }
</script>