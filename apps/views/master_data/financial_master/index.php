<?php

/*
 * Project Name: notary
 * File Name: financial_master
 * Created on: 07 Jan 14 - 9:37:58
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head>
        <?= $this->load->view('slice/header-content'); ?>
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
                            <span class="ico-arrow-right"></span>
                        </div>
                        <h1>Bank Master <small>Silahkan pilih menu yang ingin anda akses</small></h1>
                    </div>
                    <!-- menu widget start here -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widgets">
                                <div class="widget blue icon">
                                    <div class="left">
                                        <div class="icon">
                                            <span class="ico-dollar"></span>
                                        </div>
                                    </div>
                                    <div class="bottom">
                                        <a href="<?= base_url(); ?>master_data/financial_master/bank_info/sebutan_entry">Bank Info</a>
                                    </div>
                                </div>                      
                            </div>
                        </div>
                         <?= $this->load->view('slice/tambal'); ?>
                    </div>
                </div>
                <!-- content ends here -->
            </div>
        </div>
        <div class="dialog" id="source" style="display: none;" title="Source"></div>
    </body>
</html>