<?php

/*
 * Project Name: notary
 * File Name: satuan_waktu_standard_edit
 * Created on: 20 Jan 14 - 11:25:24
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
                        <h1>Proses Master<small> Kantor Proses</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">  
                                    <div class="span6">
                                        <div class="block">
                                            <div class="head">                                
                                                <h2>Edit Kantor Proses </h2>                                
                                            </div>
                                            <form  id="validate" method="post" action="<?= base_url() ?>control/edit/kantor_proses">
                                                <input type="hidden" value="<?= $kantorproses['KANTORPROSESID'] ?>" NAME="KANTORPROSESID">
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4">Kantor Proses:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" NAME="KANTORPROSES" value="<?= $kantorproses['KANTORPROSES'] ?>"/></div>
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