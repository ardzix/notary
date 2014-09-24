<?php
/*
 * Project Name: notary
 * File Name: pasca_realisasi_pick_eskalasi
 * Created on: 15 Jan 14 - 14:22:31
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <!-- jquery untuk handle table -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>

        <!-- jquery validation engine -->
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
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Proses<small> Pra-Realisasi</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="head">
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('tabs'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                
                                </div>  
                                <div class="data-fluid tabbable">  
                                    <div class="span12">
                                        <div class="alert alert-block">                
                                            Cari Data Realisasi
                                        </div>
                                        <div class="head dblue">
                                            <div class="icon"><span class="ico-layout-9"></span></div>
                                            <h2>Data Realisasi</h2>
                                            <ul class="buttons">
                                                <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                            </ul>                                                        
                                        </div>                
                                        <div class="data-fluid">
                                            <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="20%">No. Covernote</th>
                                                        <th width="20%">Nama</th>
                                                        <th width="20%">Tgl. Akad</th>
                                                        <th width="20%">Status</th>
                                                        <th width="20%" class="TAC">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href="#">1234567</a></td>
                                                        <td>Asep</td>
                                                        <td>1-1-2014</td>
                                                        <td><span class="label label-warning">In Progress</span></td>
                                                        <td>
                                                            <a href="<?= base_url() ?>proses/pasca_realisasi/detail_monitoring" class="button purple tip" data-original-title="Detail">
                                                                <div class="icon"><span class="icon-list"></span></div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>                    
                                        </div> 
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>
    </body>
</html>