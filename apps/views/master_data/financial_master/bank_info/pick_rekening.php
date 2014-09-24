<?php

/*
 * Project Name: notary
 * File Name: financial_master_pick_rekening_bank_info
 * Created on: 09 Jan 14 - 8:31:21
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
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
                        <h1>Rekening<small> Bank</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">
                            <div class="block">
                                <div class="head">                                
                                    <h2>Pick</h2>                                
                                </div>                                        
                                <div class="data-fluid">
                                    <form id="validate" method="post" action="<?= base_url() ?>control/add/daftar_rekening">
                                    <div class="row-form">
                                        <div class="span4"></div>
                                        <div class="span8"><input type="hidden" name="BANKREKID" value="<?= $bankrekening['BANKREKID']?>" readonly/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Nama Bank:</div>
                                        <div class="span8"><input type="text" name="" value="<?= $this->model_translate->dynamicTranslate('bankrekening', 'BANKREKID', $bankrekening['BANKREKID'], 'BANKREKDESC') ?>" readonly/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Nama Rekening:</div>
                                        <div class="span8"><input class="validate[required]" type="text" name="NOREKENING" placeholder="Masukan Nama Pemilik Rekening"/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Alamat:</div>
                                        <div class="span8"><input class="validate[required]" type="text" name="NMREKENING" placeholder="Masukan Alamat Pemilik Rekening"/></div>
                                    </div>
                                    <div class="toolbar bottom tar">
                                        <div class="btn-group">
                                            <button class="btn" type="submit" onClick="$('#validate').validationEngine('hide');">simpan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <?= $this->load->view('slice/tambal'); ?>
                </div>
            </div>
        </div>
    </body>
</html>
