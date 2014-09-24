<?php
/*
 * Project Name: notary
 * File Name: entry
 * Created on: 15 Jan 14 - 16:47:25
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header start here -->
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
                        <h1>Employee <small> Master Data</small></h1>
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
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 35));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>master_data/common_master/employee/index">Data</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Entry
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 36));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>master_data/common_master/employee/entry">Entry</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="span12">                

                                        <div class="block">
                                            <div class="head">
                                                <div id="nyekrol"></div>
                                                <h2>Entry Data Employee</h2>                              
                                            </div>                                               
                                            <form id="validate" method="POST" action="<?= base_url() ?>control/add/employee">
                                                <div class="data-fluid">

                                                    <div class="row-form">
                                                        <div class="span2">NIP:</div>
                                                        <div class="span3">
                                                            <input type="text" class="validate[required]" name="NIP"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Tipe ID:</div>
                                                        <div class="span3">
                                                            <select name="IDENTITASPERSONALID">
                                                                <option value="">choose a option...</option>
                                                                <?php
                                                                foreach ($identitaspersonal as $row):
                                                                    ?>
                                                                    <option value="<?= $row->IDENTITASPERSONALID ?>"><?= $row->IDENTITASPERSONALDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                                           
                                                            </select>
                                                        </div>
                                                        <div class="span2">No. ID:</div>
                                                        <div class="span3">
                                                            <input type="text" name="NOIDENTITASPERSONAL"/>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Nama:</div>
                                                        <div class="span3">
                                                            <input type="text"  class="validate[required]" name="NAMALENGKAP"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">Gender:</div>
                                                        <div class="span3">
                                                            <select name="GENDER">
                                                                <option value="">choose a option...</option>
                                                                <?php
                                                                foreach ($gender as $row):
                                                                    ?>
                                                                    <option value="<?= $row->GENDER ?>"><?= $row->GENDERDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>          
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Tanggal Lahir:</div>
                                                        <div class="span3">
                                                            <input type="text" name="TANGGALLAHIR"/>
                                                            <span class="bottom">contoh: 22-02-2012 </span>
                                                        </div>
                                                        <div class="span2">PJ Proses:</div>
                                                        <div class="span3">
                                                            <input type="radio" name="pjproses" value="1"/> Ya <br>
                                                            <input type="radio" name="pjproses" value="0"/> Tidak
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Jabatan:</div>
                                                        <div class="span3">
                                                            <select name="JABATANID" class="validate[required]">
                                                                <option value="">choose a option...</option>
                                                                <?php
                                                                foreach ($jabatan as $row):
                                                                    ?>
                                                                    <option value="<?= $row->JABATANID ?>"><?= $row->JABATANDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>          
                                                            </select>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">Titel:</div>
                                                        <div class="span3">
                                                            <select name="TITLEID">
                                                                <option value="">choose a option...</option>
                                                                <?php
                                                                foreach ($titel as $row):
                                                                    ?>
                                                                    <option value="<?= $row->TITLEID ?>"><?= $row->TITLEDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>          

                                                            </select>
                                                        </div>
                                                    </div>
                                                   

                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                                            <button class="btn" type="submit">Simpan</button>
                                                            <button class="btn btn-info" type="reset">Reset</button>
                                                        </div>
                                                    </div>

                                                </div>                
                                            </form>
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