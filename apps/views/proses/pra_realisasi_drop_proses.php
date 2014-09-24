<?php

/*
 * Project Name: notary
 * File Name: pra_realisasi_drop
 * Created on: 13 Jan 14 - 8:47:33
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Data akta Pra Realisasi berhasil diupdate!</div>
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
                                    <h2>Drop Akta Pra-Realisasi</h2>                                
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
                                    <h2>Drop Akta:</h2>
                                    <ul class="buttons">
                                        <li><a onclick="source('table_hover_check'); return false;" href="#"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>
                                </div>
                                <div class="data-fluid">
                                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover">
                                        <thead>
                                            <tr class="">
                                                <th width="10%">No.</th>
                                                <th width="40%">Jenis Akta</th>
<!--                                                    <th width="10%">Check</th>-->
                                                <th width="20%">Aksi</th>
                                                <th width="20%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1
                                            ?>
                                            <?php foreach ($dataTableAkta as $row) :
                                                ?>
                                                <tr class="">
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $this->model_translate->dynamicTranslate('akta', 'AKTAID', $row->AKTAID, 'AKTADESC') ?></td>
    <!--                                                    <td><input type="checkbox" value="1" style="opacity: 0;"></td>-->
                                                    <td>
                                                        <a href="#fModal" role="button" data-toggle="modal" onClick="modalToogler('<?= $row->AKTATRANID ?>')" class="button yellow tip" data-original-title="Update Status Akta">
                                                            <div class="icon"><span class="icon-pencil icon-white"></span></div>
                                                        </a>
                                                    </td>
                                                    <?php if ($row->STATUSAKTAID == 1) { ?>
                                                        <td><span class="label label-warning">In Progress</span></td>
                                                    <?php } ?>
                                                    <?php if ($row->STATUSAKTAID == 2) { ?>
                                                        <td><span class="label label-success">Done</span></td>
                                                    <?php } ?>
                                                    <?php if ($row->STATUSAKTAID == 3) { ?>
                                                        <td><span class="label label-important">Drop</span></td>
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
            <form action="<?= base_url() ?>control/edit/status_akta" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Pilih Status Validasi</h3>
                </div>
                <div class="row-form">
                    <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(5) ?>">
                    <input type="hidden" id="status" name="AKTATRANID" value="">
                    <div class="span6">Status Akta:</div>
                    <div class="span10">
                        <select class="select" name="STATUSAKTAID">
                            <option value="0">choose a option...</option>
                            <?php foreach ($statusAkta as $row):
                                ?>
                                <option value="<?= $row->STATUSAKTAID ?>"><?= $row->STATUSAKTADESC ?></option>
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

    function modalToogler(statId)
    {
        document.getElementById('status').value=statId;
    }
</script>