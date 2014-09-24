<?php

/*
 * Project Name: notary
 * File Name: status_user
 * Created on: 20 Jan 14 - 11:12:03
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/jquery.validationEngine.js'></script>
    </head>

    <body>    
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">
                <!-- get notifikasi-->
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data status user berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data status user berhasil diupdate!</div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'error') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data status user gagal disimpan/diupdate!</div>
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
                        <h1>Form Master<small> Status User</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <li><a href="<?= base_url() ?>master_data/form_master/gender">Gender</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/pekerjaan">Pekerjaan</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/jabatan">Jabatan</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/identitas_personal">Identitas Personal</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/title">Title</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_display">Status Display</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_bayar">Status Bayar</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_proses">Status Proses</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_pajak">Status Pajak</a></li>
                                        <li   class="active"><a href="<?= base_url() ?>master_data/form_master/status_user">Status User</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_dokumen">Status Dokumen</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_customer">Tipe Customer</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_pembayaran">Tipe Pembayaran</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_dokumen">Tipe Dokumen</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_wilayah">Tipe Wilayah</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/otoritas">Otoritas</a></li>
                                        <!--<li><a href="<?//= base_url() ?>master_data/form_master/menu">Menu</a></li>-->
                                        <li><a href="<?= base_url() ?>master_data/form_master/rate_pajak">Rate Pajak</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/satuan_waktu_standard">Satuan Waktu Standard</a></li>

                                    </ul>

                                    <div class="span6">
                                        <div class="block">
                                            <div class="head">                                
                                                <h2>Input Status User Baru</h2>                                
                                            </div>
                                            <form id="validate"  method="post" action="<?= base_url() ?>control/add/status_user">
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4">Status User:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" name="STATUSUSERDESC" placeholder="Masukan Status User Baru"/></div>
                                                    </div>
                                                    <div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit" onClick="$('#validate').validationEngine('hide');">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Status User</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" class="checkall"/></th>
                                                            <th width="50%">Status User</th>
                                                            <th width="50%" class="TAC">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($statususer as $row):
                                                            ?>
                                                            <tr>
                                                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                                                <td><?= $row->STATUSUSERDESC ?></td>
                                                                <td>
                                                                    <!--                                                                <button class="btn tip" data-original-title="Default tip">Default tip</button>-->

                                                                    <a href="<?= base_url() ?>master_data/form_master/status_user/edit/<?= $row->STATUSUSERID ?>" class="button green tip" data-original-title="Edit">
                                                                        <div class="icon"><span class="ico-pencil"></span></div>
                                                                    </a>
                                                                    <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onclick="hapus('<?= $row->STATUSUSERID ?>')"> 
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
        <a id="status_user" href="<?= $row->STATUSUSERID ?>"> 
            <button class="btn btn-warning" aria-hidden="true">Delete</button> 
        </a> 
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> 
    </div> 
</div>
<script>
    function hapus(status_user) {
        document.getElementById('status_user').href = '<?= base_url() ?>control/delete/delete_status_user/' + status_user;
    }
</script>
</body>
</html>
