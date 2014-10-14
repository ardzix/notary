<?php
/*
 * Project Name: notary
 * File Name: realisasi_proses_covernote
 * Created on: 13 Jan 14 - 9:02:42
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
                        <h1>Proses<small> Realisasi</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">                

                            <div class="block">
                                <div class="head">                                
                                    <h2>Proses Covernote</h2>                                
                                </div>                                        
                                <div class="data-fluid">

                                    <div class="row-form">
                                        <div class="span4">No. Pra-Realisasi:</div>
                                        <div class="span8"><input type="text" name="test" value="987987987" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">No. Covernote:</div>
                                        <div class="span8"><input type="text" name="test" value="1111" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Tgl. Akad:</div>
                                        <div class="span8"><input type="text" name="test" value="1-januari-2014" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Nama Pemilik Sertifikat:</div>
                                        <div class="span8"><input type="text" name="test" value="Asep" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">No. Sertifikat:</div>
                                        <div class="span8"><input type="text" name="test" value="SHM 225/Bojong"/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Developer:</div>
                                        <div class="span8"><input type="text" name="test" value="SHM 225/Bojong"/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Kab/Kota/Notaris:</div>
                                        <div class="span8"><input type="text" name="test" value="987987987"/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Bank:</div>
                                        <div class="span8"><input type="text" name="test" value="987987987"/></div>
                                    </div>

                                    <div class="toolbar bottom tar">
                                    <div class="btn-group">
                                        <button type="submit" class="btn">Proses</button>
                                    </div>
                                </div>
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