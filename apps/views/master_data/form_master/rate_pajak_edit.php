<?php

/*
 * Project Name: notary
 * File Name: rate_pajak_edit
 * Created on: 20 Jan 14 - 11:23:41
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

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-plus-sign"></span>
                        </div>
                        <h1>Form Master<small> Rate Pajak</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <li  class="active"><a href="<?= base_url() ?>master_data/form_master/gender">Gender</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/pekerjaan">Pekerjaan</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/jabatan">Jabatan</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/identitas_personal">Identitas Personal</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/title">Title</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_display">Status Display</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_bayar">Status Bayar</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_proses">Status Proses</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_pajak">Status Pajak</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_user">Status User</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/status_dokumen">Status Dokumen</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_customer">Tipe Customer</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_pembayaran">Tipe Pembayaran</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_dokumen">Tipe Dokumen</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/tipe_wilayah">Tipe Wilayah</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/otoritas">Otoritas</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/rate_pajak">Rate Pajak</a></li>
                                        <li><a href="<?= base_url() ?>master_data/form_master/satuan_waktu_standard">Satuan Waktu Standard</a></li>

                                    </ul>

                                    <div class="span6">
                                        <div class="block">
                                            <div class="head">                                
                                                <h2>Edit Rate Pajak</h2>                                
                                            </div>
                                            <form id="validate" method="post" action="<?= base_url() ?>control/edit/edit_rate_pajak">
                                                <input type="hidden" value="<?= $ratepajak['RATEPJKID'] ?>" NAME="RATEPJKID">
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4">Awal:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" NAME="TGGLAWALBERLAKU" value="<?= date('d-m-Y', strtotime($ratepajak['TGGLAWALBERLAKU'])) ?>"/></div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Akhir:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" NAME="TGGLAKHIRBERLAKU" value="<?= date('d-m-Y', strtotime($ratepajak['TGGLAKHIRBERLAKU'])) ?>"/></div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Nilai:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" NAME="NILRATEPJK" value="<?= $ratepajak['NILRATEPJK'] ?>"/></div>
                                                    </div>
                                                    <div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit" onClick="$('#validate').validationEngine('hide');">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
</body>
</html>