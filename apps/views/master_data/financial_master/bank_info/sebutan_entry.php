<?php
/*
 * Project Name: notary
 * File Name: financial_master_bak_info
 * Created on: 08 Jan 14 - 16:23:01
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
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
                            <span class="ico-dollar"></span>
                        </div>
                        <h1>Bank Master<small> Bank Info</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="<?= base_url() ?>master_data/financial_master/bank_info/sebutan_entry">Sebutan Bank: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/sebutan_edit">Sebutan Bank: Edit</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/bank_entry">Bank: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/bank_edit">Bank: Edit</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/rekening_entry">Rekening: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/rekening_edit">Rekening: Edit</a></li>
                                    </ul>
                                    <div class="span6">
                                        <div class="block">
                                            <div class="head">                                
                                                <h2>Sebutan Bank</h2>                                
                                            </div>
                                            <form id="validate" method="post" action="<?= base_url() ?>control/add/sebutan_entry">
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4">Sebutan Bank:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" name="BANKUTAMADESC" placeholder="Masukan Nama Bank Utama"/></div>
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