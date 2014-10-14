<?php
/*
 * Project Name: notary
 * File Name: pra_realisasi_validasi_pick_customer
 * Created on: 13 Jan 14 - 8:31:34
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
                if (isset($_GET['message']) && $_GET['message'] == 'update') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data validasi dokumen berhasil diupdate!</div>
                    </div>
                    <?php
                }
                ?>
                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-plus-sign"></span>
                        </div>
                        <h1>Proses<small> Pra-Realisasi</small></h1>
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
                                        <div class="span8"><input type="text" name="test" value="<?= $this->uri->segment(5) ?>" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        
                                        <div class="span4">Nama Customer:</div>
                                        <div class="span8"><input type="text" name="test" value="<?$customer = $this->model_core->get_where_result('customertrans', array('TRANSAKSIPRAID' => $this->uri->segment(5)));
                                                                    foreach ($customer as $row2) {
                                                                        ECHO $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row2->CUSTOMERID, 'NAMACUST') . ', ';
                                                                    }?>" disabled/></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span7">
                            <div class="block">
                                <div class="head green">
                                    <div class="icon"><span class="ico-brush"></span></div>
                                    <h2>Validasi Dokumen:</h2>
                                    <ul class="buttons">
                                        <li><a onclick="source('table_hover_check'); return false;" href="#"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>
                                </div>
                                <div class="data-fluid">
                                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover">
                                        <thead>
                                            <tr class="">
                                                <th width="10%">No.</th>
                                                <th width="20%">Jenis Dokumen</th>
<!--                                                    <th width="10%">Check</th>-->
                                                <th width="25%">Aksi</th>
                                                <th width="35%">Status Validasi</th>
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
    <!--                                                    <td><input type="checkbox" value="1" style="opacity: 0;"></td>-->
                                                    <td>
                                                        <a href="#fModal" role="button" data-toggle="modal" onClick="modalToogler('<?= $row->DOKUMENID ?>')" class="button yellow tip" data-original-title="Update Status Dokumen">
                                                            <div class="icon"><span class="icon-pencil icon-white"></span></div>
                                                        </a>
                                                    </td>
                                                    <?php if ($row->IDSTATUSDOC == 1) { ?>
                                                        <td><span class="label label-warning">In Progress</span></td>
                                                    <?php } ?>
                                                    <?php if ($row->IDSTATUSDOC == 2) { ?>
                                                        <td><span class="label label-success">Valid</span></td>
                                                    <?php } ?>
                                                    <?php if ($row->IDSTATUSDOC == 3) { ?>
                                                        <td><span class="label label-important">Not Valid</span></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit">simpan</button>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button class="btn">print</button>
                                                        </div>-->
                        </div>

                    </div>
                    <?= $this->load->view('slice/tambal'); ?>
                </div>
            </div>
        </div>
        <!-- Bootrstrap modal form -->
        <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form action="<?= base_url() ?>control/edit/status_dokumen" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Pilih Status Validasi</h3>
                </div>
                <div class="row-form">
                    <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(5) ?>">
                    <input type="hidden" id="dokumen" name="DOKUMENID" value="">
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
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" aria-hidden="true">Save updates</button>
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
    </body>
</html>
<script language="javascript">

    function modalToogler(dokId)
    {
        document.getElementById('dokumen').value=dokId;
    }
</script>
