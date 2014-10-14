<?php
/*
 * Project Name: notary
 * File Name: rekening_edit
 * Created on: 16 Jan 14 - 8:21:50
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
    </head>

    <body>    
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil diupdate!</div>
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
                            <span class="ico-dollar"></span>
                        </div>
                        <h1>Bank Master<small> Bank Info</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/sebutan_entry">Sebutan Bank: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/sebutan_edit">Sebutan Bank: Edit</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/bank_entry">Bank: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/bank_edit">Bank: Edit</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/rekening_entry">Rekening: Entry</a></li>
                                        <li class="active"><a href="<?= base_url() ?>master_data/financial_master/bank_info/rekening_edit">Rekening: Edit</a></li>
                                    </ul>
                                    <div class="span10">
                                        <div class="head dblue">
                                            <div class="icon"><span class="ico-layout-9"></span></div>
                                            <h2>Rekening Edit</h2>
                                            <ul class="buttons">
                                                <li><a href="#" onClick="source('table_sort_pagination');
                                                        return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                            </ul>                                                        
                                        </div>                
                                        <div class="data-fluid">
                                            <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">No</th>
                                                        <th width="20%">No. Rekening</th>
                                                        <th width="20%">Nama Pemilik Rekening</th>
                                                        <th width="30%">Bank</th>
                                                        <th width="20%" class="TAC">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($daftarrekening as $row):
                                                        ?>
                                                        <tr>
                                                            <td><input type="checkbox" name="order[]" value="528"/></td>
                                                            <td><?= $row->NOREKENING ?></td>
                                                            <td><?= $row->NMREKENING ?></td>
                                                            <td><?= $this->model_translate->dynamicTranslate('bankrekening', 'BANKREKID', $row->BANKREKID, 'BANKREKDESC') ?></td>
                                                            <td>
                                                                <a href="<?= base_url() ?>master_data/financial_master/bank_info/rekening_edit/edit_rekening/<?= $row->REKENINGID ?>" class="button green tip" data-original-title="Edit">
                                                                    <div class="icon"><span class="ico-pencil"></span></div>
                                                                </a>
                                                                <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onclick="hapus('<?= $row->REKENINGID ?>')"> 
                                                                    <div class="icon"><span class="ico-remove"></span></div> 
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
                        </div>
                    </div>
                </div>
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <?= $this->load->view('slice/tambal'); ?>
            </div>
        </div>
    </div>
</div>
<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
        <h3 id="myModalLabel">Apakah anda yakin ingin menghapus data ini?</h3> 
    </div> 
    <div class="modal-body"><p>Peringatan! Data yang telah terhapus tidak akan bisa dikembalikan lagi.</p></div> 
    <div class="modal-footer"> 
        <a id="rekeningid" href=""> 
            <button class="btn btn-warning" aria-hidden="true">Delete</button> 
        </a> 
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> 
    </div> 
</div>
<script>
    function hapus(rekeningid) {
        document.getElementById('rekeningid').href="<?= base_url() ?>control/delete/delete_daftar_rekening/" + rekeningid;
    }
</script>
</body>
</html>