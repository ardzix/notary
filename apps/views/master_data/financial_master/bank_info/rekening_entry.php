<?php
/*
 * Project Name: notary
 * File Name: rekening_entry
 * Created on: 16 Jan 14 - 8:21:41
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src="<?= NOTARY_ASSETS ?>js/plugins/select/select2.min.js"></script>
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
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/sebutan_entry">Sebutan Bank: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/sebutan_edit">Sebutan Bank: Edit</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/bank_entry">Bank: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/bank_edit">Bank: Edit</a></li>
                                        <li class="active"><a href="<?= base_url() ?>master_data/financial_master/bank_info/rekening_entry">Rekening: Entry</a></li>
                                        <li><a href="<?= base_url() ?>master_data/financial_master/bank_info/rekening_edit">Rekening: Edit</a></li>
                                    </ul>

                                    <div class="span6">
                                        <div class="block">
                                            <div class="head">                                
                                                <h2>Bank</h2>                                
                                            </div>                                        
                                            <div class="data-fluid">
                                                <form id="validate" method="post" action="<?= base_url() ?>control/add/daftar_rekening">
                                                    <div class="row-form">
                                                        <div class="span4">Sebutan Bank:</div>
                                                        <div class="span8">
                                                            <select name="BANKREKID" class="select">
                                                                <option value="0">choose a option...</option>
                                                                <?php foreach ($bankrekening as $row):
                                                                    ?>
                                                                    <option value="<?= $row->BANKREKID ?>"><?= $row->BANKREKDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">No Rekening:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" name="NOREKENING" placeholder="Masukan No Rekening Bank"/></div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Nama Pemilik Rekening:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" name="NMREKENING" placeholder="Masukan Nama Pemilik Rekening"/></div>
                                                    </div>
                                                    <div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit" onClick="$('#validate').validationEngine('hide');">Submit</button>
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
    </body>
</html>