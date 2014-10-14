<?php
/*
 * Project Name: notary
 * File Name: entry
 * Created on: 16 Jan 14 - 3:44:32
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
                                                <h2>Entry Data Customer</h2>                              
                                            </div>                                               
                                            <form id="validate" method="POST" action="<?= base_url() ?>control/add/customer">
                                                <div class="data-fluid">

                                                    <div class="row-form">

                                                        <div class="span2">Tipe Customer:</div>
                                                        <div class="span3">                            
                                                            <select name="TIPECUSTID" class="validate[required]" style="width: 100%;">
                                                                <option value=""></option>
                                                                <?php
                                                                foreach ($tipecustomer as $row):
                                                                    ?>
                                                                    <option value="<?= $row->TIPECUSTID ?>"><?= $row->TIPECUSTDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                                                 
                                                            </select>                            
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Tipe ID:</div>
                                                        <div class="span3">                            
                                                            <select name="IDENTITASPERSONALID" style="width: 100%;">
                                                                <option value=""></option>
                                                                <?PHP foreach ($identitaspersonal as $row):
                                                                    ?>
                                                                    <option value="<?= $row->IDENTITASPERSONALID ?>"><?= $row->IDENTITASPERSONALDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                    
                                                            </select> 
                                                        </div>
                                                        <div class="span2">No. ID:</div>
                                                        <div class="span3">
                                                            <input type="text" NAME="NOIDPERSONALCUST"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Nama:</div>
                                                        <div class="span3">
                                                            <input type="text"  name="NAMACUST" class="validate[required]"/>
                                                            <span class="bottom">Wajib diisi</span>
                                                        </div>
                                                        <div class="span2">Gender:</div>
                                                        <div class="span3">                            
                                                            <select name="GENDER" style="width: 100%;">
                                                                <option value=""></option>
                                                                <?PHP foreach ($gender as $row):
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
                                                            <input type="text" name="TANGGALLAHIRCUST"/>
                                                            <span class="bottom">contoh: 22-02-2012 </span>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span2">Pekerjaan:</div>
                                                        <div class="span3">                            
                                                            <select name="PEKERJAANID" style="width: 100%;">
                                                                <option value=""></option>
                                                                <?PHP foreach ($pekerjaan as $row):
                                                                    ?>
                                                                    <option value="<?= $row->PEKERJAANID ?>"><?= $row->PEKERJAANDESC ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>

                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="row-form">
                                                                                                            <div class="span2"><strong>Alamat</strong></div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2">Nama Perusahaan:</div>
                                                                                                            <div class="span5">
                                                                                                                <input type="text"/>
                                                                                                                <span class="bottom">Untuk tipe customer perusahaan wajib diisi</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2">Gedung:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                            <div class="span2">Lantai:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2">Jalan:</div>
                                                                                                            <div class="span10">
                                                                                                                <input type="text" class="validate[required]"/>
                                                                                                                <span class="bottom">Wajib diisi</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2">Kelurahan:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                            <div class="span2">RT/RW:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2">Kecamatan:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                            <div class="span2">Kode POS:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2">Kab/Kota:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text" class="validate[required]"/>
                                                                                                                <span class="bottom">Wajib diisi</span>
                                                                                                            </div>
                                                                                                            <div class="span2">No. TLP:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2">Provinsi:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text" class="validate[required]"/>
                                                                                                                <span class="bottom">Wajib diisi</span>
                                                                                                            </div>
                                                                                                            <div class="span2">No. Fax:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2"></div>
                                                                                                            <div class="span3">
                                                                                                            </div>
                                                                                                            <div class="span2">No. HP:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row-form">
                                                                                                            <div class="span2"></div>
                                                                                                            <div class="span3">
                                                                                                            </div>
                                                                                                            <div class="span2">Email:</div>
                                                                                                            <div class="span3">
                                                                                                                <input type="text"/>
                                                                                                            </div>
                                                                                                        </div>      -->

                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                                            <button class="btn" type="submit">Simpan</button>
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