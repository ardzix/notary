<?php
/*
 * Project Name: notary
 * File Name: pra_realisasi_pick_customer
 * Created on: 10 Jan 14 - 8:42:26
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>
        <script type='text/javascript'>
            function showDiv() {
                document.getElementById('upload_doc').style.visibility = "visible";
            }
        </script>
    </head>

    <body>    
<!--        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div> -->
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">
                    <form name="praRealisasi">
                        <div class="page-header">
                            <a href="#" class="button" onClick="document.location='<?= base_url() ?>proses/pra_realisasi'">
                                <div class="icon">
                                    <span class="ico-arrow-left"></span>
                                </div>
                            </a>
                            <h1>Proses<small> Pra-Realisasi</small></h1>
                        </div>
                        <div class="row-fluid">

                            <div class="span6"> 
                                <div class="block">
                                    <div class="head">                                
                                        <h2>Add Proses Pra-Realisasi</h2>
                                    </div>                                        
                                    <div class="data-fluid">

                                        <div class="row-form">
                                            <div class="span4">ID Pra-Realisasi:</div>
                                            <div class="span8"><input type="text" name="test" value="<?php echo $praRealisasiId; ?>" disabled/></div>
                                        </div>
                                        <div class="row-form">
                                            <div class="span12">
                                                <span class="top title">Proses:</span>
                                                <?php
                                                foreach ($proses as $row):
                                                    ?>
                                                    <div class="checker"><span class="checked"><input type="checkbox" value="<?= $row->PROSESID; ?>"style="opacity: 0;"></span></div>><?= $row->PROSESDESC; ?><br>

                                                    <?php
                                                endforeach;
                                                ?>                                                                      

                                            </div>
                                        </div>
                                        <div class="toolbar bottom tar">
                                            <div class="btn-group">
                                                <button class="btn" type="submit">Lanjut</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <?= $this->load->view('slice/tambal'); ?>

                </div>
            </div>
        </div>
    </body>
</html>