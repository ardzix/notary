<?php
/*
 * Project Name: notary
 * File Name: set_up_approv
 * Created on: 08 Jan 14 - 11:19:39
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
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
                        <h1>Set-up<small> Approval/Escalation</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab1" data-toggle="tab">Notaris-SPV</a></li>
                                        <li><a href="#tab2" data-toggle="tab">SPV-PIC</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="alert alert-block">Tetapkan Akun Notaris yang akan ditetapkan memiliki hak meng-aprove eskalasi prolem</div>
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Akun Notaris</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="15%">Akun</th>
                                                            <th width="15%">nama</th>
                                                            <th width="20%">NIP</th>
                                                            <th width="30%">Otorisasi</th>
                                                            <th width="20%" class="TAC">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="#">RiyantiOK</a></td>
                                                            <td>Riyanti</td>
                                                            <td>1234567</td>
                                                            <td>Notaris</td>
                                                            <td>
                                                                <a href="<?= base_url() ?>master_data/set_up/user_defined_alert/pick" class="button yellow tip" data-original-title="Pick">
                                                                    <div class="icon"><span class="ico-hand-up"></span></div>
                                                                </a>
                                                                <a href="#" class="button purple tip" data-original-title="Detail">
                                                                    <div class="icon"><span class="icon-list"></span></div>
                                                                </a>
                                                            </td>
                                                        </tr>                          
                                                    </tbody>
                                                </table>                    
                                            </div>
                                            <div class="alert alert-block">Tetapkan Akun Supervisor yang berhak mengeskalasi problem ke notaris terpilih</div>
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Akun Supervisor</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="15%">Akun</th>
                                                            <th width="15%">nama</th>
                                                            <th width="20%">NIP</th>
                                                            <th width="30%">Otorisasi</th>
                                                            <th width="20%" class="TAC">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="#">BudiOK</a></td>
                                                            <td>Budi</td>
                                                            <td>1234567</td>
                                                            <td>Supervisi</td>
                                                            <td>
                                                                <a href="<?= base_url() ?>master_data/set_up/user_defined_alert/pick" class="button yellow tip" data-original-title="Pick">
                                                                    <div class="icon"><span class="ico-hand-up"></span></div>
                                                                </a>
                                                                <a href="#" class="button purple tip" data-original-title="Detail">
                                                                    <div class="icon"><span class="icon-list"></span></div>
                                                                </a>
                                                            </td>
                                                        </tr>                     
                                                    </tbody>
                                                </table>                    
                                            </div>
                                            <div id="tengah">
                                                <div class="btn-group">
                                                    <button class="btn" type="submit">Relasikan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <div class="alert alert-block">Tetapkan Akun Supervisor yang akan ditetapkan memiliki hak meng-aprove eskalasi prolem</div>
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Akun Notaris</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="15%">Akun</th>
                                                            <th width="15%">nama</th>
                                                            <th width="20%">NIP</th>
                                                            <th width="30%">Otorisasi</th>
                                                            <th width="20%" class="TAC">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="#">RiyantiOK</a></td>
                                                            <td>Riyanti</td>
                                                            <td>1234567</td>
                                                            <td>Notaris</td>
                                                            <td>
                                                                <a href="<?= base_url() ?>master_data/set_up/user_defined_alert/pick" class="button yellow tip" data-original-title="Pick">
                                                                    <div class="icon"><span class="ico-hand-up"></span></div>
                                                                </a>
                                                                <a href="#" class="button purple tip" data-original-title="Detail">
                                                                    <div class="icon"><span class="icon-list"></span></div>
                                                                </a>
                                                            </td>
                                                        </tr>                          
                                                    </tbody>
                                                </table>                    
                                            </div>
                                            <div class="alert alert-block">Tetapkan Akun Supervisor yang berhak mengeskalasi problem ke notaris terpilih</div>
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Akun Supervisor</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="15%">Akun</th>
                                                            <th width="15%">nama</th>
                                                            <th width="20%">NIP</th>
                                                            <th width="30%">Otorisasi</th>
                                                            <th width="20%" class="TAC">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="#">BudiOK</a></td>
                                                            <td>Budi</td>
                                                            <td>1234567</td>
                                                            <td>Supervisi</td>
                                                            <td>
                                                                <a href="<?= base_url() ?>master_data/set_up/user_defined_alert/pick" class="button yellow tip" data-original-title="Pick">
                                                                    <div class="icon"><span class="ico-hand-up"></span></div>
                                                                </a>
                                                                <a href="#" class="button purple tip" data-original-title="Detail">
                                                                    <div class="icon"><span class="icon-list"></span></div>
                                                                </a>
                                                            </td>
                                                        </tr>                     
                                                    </tbody>
                                                </table>                    
                                            </div>
                                            <div id="tengah">
                                                <div class="btn-group">
                                                    <button class="btn" type="submit">Relasikan</button>
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
        </div>
    </div>
</body>
</html>