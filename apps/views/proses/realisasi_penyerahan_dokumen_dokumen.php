<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-plus-sign"></span>
                        </div>
                        <h1>Proses<small> Realisasi</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">

                            <div class="block">
                                <div class="head">
                                    <h2>Penyerahan Dokumen</h2>
                                </div>
                                <div class="data-fluid">
                                    <div class="row-form">
                                        <div class="span4">ID Pra-Realisasi:</div>
                                        <div class="span8"><input type="text" name="test" value="<?= $this->uri->segment(6) ?>" disabled/></div>
                                    </div>
                                   <div class="row-form">
                                        
                                        <div class="span4">Nama Customer:</div>
                                        <div class="span8"><input type="text" name="test" value="<?$customer = $this->model_core->get_where_result('customertrans', array('TRANSAKSIPRAID' => $this->uri->segment(6)));
                                                                    foreach ($customer as $row2) {
                                                                        ECHO $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row2->CUSTOMERID, 'NAMACUST') . ', ';
                                                                    }?>" disabled/></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="block">
                                <div class="head green">
                                    <div class="icon"><span class="ico-brush"></span></div>
                                    <h2>Update Dokumen Proses:</h2>
                                    <ul class="buttons">
                                        <li><a onclick="source('table_hover_check'); return false;" href="#"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>
                                </div>
                                <div class="data-fluid">
                                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover">
                                        <thead>
                                            <tr class="">
                                                <th width="5%">No.</th>
                                                <th width="15%">Jenis Dokumen</th>
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
                                                    <td>
                                                        <a href="<?= base_url() ?>proses/realisasi/penyerahanDokumen/dokumen/proses/<?= $row->TIPEDOKUMENID ?>/<?= $this->uri->segment(6) ?>" class="button yellow tip" data-original-title="lihat status dokumen">
                                                            <div class="icon"><span class="icon-hand-up icon-white"></span></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                    <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(6) ?>">
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
