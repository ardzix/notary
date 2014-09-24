<?php
/*
 * Project Name: notary
 * File Name: entry_detail
 * Created on: 20 Jan 14 - 12:49:57
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
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Basic data customer berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?> 
                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Customer <small> Master Data</small></h1>
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
                                    <ul class="nav nav-tabs">
                                        <!-----------------------------------------------------------
                                        Data
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 33));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>master_data/common_master/customer">Data</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Entry
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 34));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>master_data/common_master/customer/entry">Entry</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="span12">                

                                        <div class="block">
                                            <div class="head">
                                                <h2>Entry Detail Data Customer</h2>                              
                                            </div>                                               
                                            <form id="validate" method="POST" action="<?= base_url() ?>control/add/customer_detail">
                                                <input type="hidden" name="CUSTOMERID" VALUE="<?= $this->uri->segment(5) ?>"
                                                       <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span2">Nama Perusahaan:</div>
                                                        <div class="span5">
                                                            <input type="text" NAME="NAMAPERUSAHAAN"/>
                                                            <span class="bottom">Untuk tipe customer perusahaan wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Gedung:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="GEDUNGCUST"/>
                                                        </div>
                                                        <div class="span2">Lantai:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="LANTAICUST"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Jalan:</div>
                                                        <div class="span10">
                                                            <input type="text" class="validate[required]" NAME="JALANCUST"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Kelurahan/Desa:</div>
                                                        <div class="span3">
                                                            <input type="text" name="KELURAHANCUST"/>
                                                        </div>
                                                        <div class="span2">RT:</div>
                                                        <div class="span3">
                                                            <input type="text" name="RTCUST"/>
                                                        </div>

                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2"></div>
                                                        <div class="span3">

                                                        </div>
                                                        <div class="span2">RW:</div>
                                                        <div class="span3">
                                                            <input type="text" name="RWCUST"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Kecamatan:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="KECAMATANCUST"/>
                                                        </div>
                                                        <div class="span2">Kode POS:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="KODEPOSCUST"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Kab/Kota:</div>
                                                        <div class="span3">
                                                            <input type="text" class="validate[required]" NAME="DATI2CUST"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">No. TLP:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="NOTELPCUST"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Provinsi:</div>
                                                        <div class="span3">
                                                            <input type="text" class="validate[required]" NAME="DATI1CUST"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">No. Fax:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="NOFAXCUST"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Negara:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="NEGARACUST"/>
                                                        </div>
                                                        <div class="span2">No. HP:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="NOHPCUST"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2"></div>
                                                        <div class="span3">
                                                        </div>
                                                        <div class="span2">Email:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="EMAIL"/>
                                                        </div>
                                                    </div>      

                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                                            <button class="btn" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                            </form>
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
    </div>
</body>
</html>