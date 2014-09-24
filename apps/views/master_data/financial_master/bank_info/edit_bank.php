<?php
/*
 * Project Name: notary
 * File Name: financial_master_edit_bank_bank_info
 * Created on: 09 Jan 14 - 8:15:10
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
                        <h1>EDIT<small> Bank</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">
                            <div class="block">
                                <div class="head">                                
                                    <h2>Bank</h2>                                
                                </div>                                        
                                <div class="data-fluid"> 
                                    <form id="validate" method="post" action="<?= base_url() ?>control/edit/edit_bank_rekenning">
                                        <input type="hidden" value="<?= $bankrekening['BANKREKID'] ?>" NAME="BANKREKID">
                                        <div class="row-form">
                                            <div class="span4">Sebutan Bank:</div>
                                            <div class="span8">
                                                <select name="BANKUTAMAID" >
                                                                <option value="0">choose a option...</option>
                                                                <?php foreach ($bankutama as $row):
                                                                    ?>
                                                                    <option value="<?= $row->BANKUTAMAID ?>"><?= $row->BANKUTAMADESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>
                                                            </select>
                                            </div>
                                        </div>
                                        <div class="row-form">
                                            <div class="span4">Nama Bank:</div>
                                            <div class="span8"><input class="validate[required]" type="text" value="<?= $bankrekening['BANKREKDESC'] ?>" name="BANKREKDESC" placeholder="Masukan Nama Bank"/></div>
                                        </div>
                                        <div class="row-form">
                                            <div class="span4">Alamat Bank:</div>
                                            <div class="span8"><input class="validate[required]" type="text" value="<?= $bankrekening['ALAMATBANKREK'] ?>" name="ALAMATBANKREK" placeholder="Masukan Alamat Bank"/></div>
                                        </div>
                                        <div class="toolbar bottom tar">
                                            <div class="btn-group">
                                                <button class="btn" type="submit" onClick="$('#validate').validationEngine('hide');">Update</button>
                                            </div>
                                        </div>
                                    </form>
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
    </body>
</html>
