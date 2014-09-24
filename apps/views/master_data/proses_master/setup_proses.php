<?php
/*
 * Project Name: notary
 * File Name: setup_proses
 * File Directory: Expression filedir is undefined on line 5, column 22 in Templates/Scripting/EmptyPHP.php.
 * Created on: 08 Jan 14 - 9:44:21
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header"><a href="#" class="button" onClick="document.location = '<?= base_url() ?>master_data/proses_master'">
                            <div class="icon">
                                <span class="ico-arrow-left"></span>
                            </div>
                        </a>
                        <h1>Proses Master<small> Setup Proses</small></h1>
                    </div>
                    <div class="row-fluid">
                        <div class="block">
                            <div class="head">
                                <h2>Setup Proses</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('tabs');
                                            return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                
                            </div>  
                            <div class="data-fluid tabbable">                    
                                <ul class="nav nav-tabs">
                                    <!-----------------------------------------------------------
                                    DATA PROSES
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 46));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li class="active"><a href="<?= base_url() ?>master_data/proses_master/setup_proses">Data Proses</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    MASUKAN PROSES BARU
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 47));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/proses_master/setup_proses_new">Masukan Proses Baru</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="tab-content">
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 46));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 == 1) {
                                        ?>
                                        <H3>Anda tidak punya hak akses untuk tab Data Proses</H3>
                                        <H4>Silahkan pilih tab menu lain yang tersedia diatas</H4>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="block">
                                            <div class="head green">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Daftar Proses</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination');
                                                            return false;">
                                                            <div class="icon"><span class="ico-info"></span></div>
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <div class="data-fluid">
                                                <?php if ($dataTable != 0) { ?>
                                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <!--<th width="1">&nbsp;</th>-->
                                                                <th>Deskripsi Proses</th>
                                                                <th>Satuan Waktu Proses</th>
                                                                <th>Waktu Standard Proses</th>
                                                                <th>Satuan Waktu Alert</th>
                                                                <th>Waktu Standard Alert PIC</th>
                                                                <th>Waktu Standard Alert Supervisor</th>
                                                                <th>Definisi Biaya Proses</th>
                                                                <th>Definisi Biaya Drop</th>
                                                                <th>Kantor Proses</th>
                                                                <th width="100" class="TAC">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($dataTable as $row) { ?>                                            
                                                                <tr>
                                                                    <TD></TD>
                                                                    <td><?= $row->PROSESDESC; ?></td>
                                                                    <td><?php echo $this->model_translate->dynamicTranslate('satuanwaktustd', 'SATWAKTUSTDID', $row->SATWAKTUSTDID, 'SATWAKTUDESC'); ?></td>
                                                                    <td><?= $row->DEFWAKTUSTD ?></td>
                                                                    <td><?php echo $this->model_translate->dynamicTranslate('satuanwaktustd', 'SATWAKTUSTDID', $row->DEFSATALERT, 'SATWAKTUDESC'); ?></td>                                                              
                                                                    <td><?= $row->DEFPICALERT ?></td>
                                                                    <td><?= $row->DEFSPVALERT ?></td>
                                                                    <td><?= $row->DEFBIAYAPROSES ?></td>
                                                                    <td><?= $row->DEFBIAYADROP ?></td>
                                                                    <td><?php echo $this->model_translate->dynamicTranslate('kantorproses', 'KANTORPROSESID', $row->KANTORPROSESID, 'KANTORPROSES'); ?></td>
                                                                    <td><a href="<?= base_url() ?>master_data/proses_master/setup_proses/edit/<?= $row->PROSESID ?>" class="button green">
                                                                            <div class="icon"><span class="ico-pencil"></span></div>
                                                                        </a>
                                                                        <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onClick="modalToogler('<?= $row->PROSESID ?>')" >
                                                                            <div class="icon"><span class="ico-remove"></span></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>                                              
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <br/>&nbsp;
                        <br/>&nbsp;
                        <br/>&nbsp;
                        <br/>&nbsp;
                        <br/>&nbsp;
                        <br/>&nbsp;
                        <br/>&nbsp;
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootrstrap modal -->
        <div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Apakah anda yakin ingin menghapus data ini?</h3>
            </div>
            <div class="modal-body">
                <p>Peringatan! Data yang telah terhapus tidak akan bisa dikembalikan lagi.</p>
            </div>
            <div class="modal-footer">
                <a href="" id="delete">
                    <button class="btn btn-warning" aria-hidden="true">Delete</button>
                </a> 
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>            
            </div>
        </div>  
    </body>
</html>
<script language="javascript">

    function modalToogler(prosesId)
    {
        document.getElementById('delete').href = '<?= base_url() ?>control/delete/delete_proses/' + prosesId;

    }
</script>
