<?php
/*
 * Project Name: notary
 * File Name: pasca_realisasi
 * Created on: 15 Jan 14 - 12:55:32
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

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Proses berhasil diupdate!</div>
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
                        <h1>Proses<small> Pasca-Realisasi</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="head">
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('tabs');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                
                                </div>  

                                <ul class="nav nav-tabs">
                                    <!-----------------------------------------------------------
                                    MONITORING
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 26));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>proses/pasca_realisasi" >Monitoring</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    EKSKALASI
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 27));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>proses/pasca_realisasi/ekskalasi" >Ekskalasi</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    APPROVAL
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 28));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>proses/pasca_realisasi/approval" >Approval</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    UPDATE PROSES
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 29));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li class="active"><a href="<?= base_url() ?>proses/pasca_realisasi/update_proses">Update Proses</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                                <div class="alert alert-block">                
                                    Cari Data Approval
                                </div>

                                <div class="head dblue">
                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                    <h2>Data Approval</h2>
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('table_sort_pagination');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                                        
                                </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="15%">Akta</th>
                                                <th width="20%">Status Akta</th>
                                                 <th width="20%">Proses</th>

                                                <th width="15%" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data as $cn) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $cn->AKTADESC; ?></td>
                                                    <td><?php echo $this->model_translate->dynamicTranslate('statusakta', 'STATUSAKTAID', $cn->STATUSAKTAID, 'STATUSAKTADESC'); ?></td>
                                                    <td><?php echo $cn->PROSESDESC; ?></td>
                                                    <td> <a href="#confirmModal" role="button"  class="button yellow tip"  data-toggle="modal" data-original-title="Update" onclick="modalToogler('<?Php echo site_url('proses/submit_update_proses/' . $cn->AKTATRANID . '/' . $this->uri->segment(4) . '/' . $cn->PROSESTRANID); ?>')">

                                                            <div class="icon"><span class="icon-ok icon-white"></span></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++;
                                            };
                                            ?>
                                        </tbody>
                                    </table>                    
                                </div> 
                            </div> 
                        </div>
<?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>


        <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabels">Defaults</h3>
            </div>
            <div class="modal-body" id="myModalBody">
                <p align="center">
                    <img src="<?= NOTARY_ASSETS ?>img/loaders/2d_1.gif"/> </p>
            </div>
        </div>

        <div id="confirmModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabels">Confirmation</h3>
            </div>
            <div class="modal-body" id="myModalBody">
                you sure you want to complete this process, and proceed to the next process ??
            </div>
            <div class="modal-footer" id="modalfooter">

            </div>
        </div>

    </body>
</html>



<script language="javascript">

    function modalToogler(url)
    {
        $('#modalfooter').html('<a href="#" data-dismiss="modal" class="btn" >Cancel</a><a href="' + url + '" class="btn success" >Confirm</a>');
    }

    function myModalBodyGenerator(tranId)
    {
        var data = {tranId: tranId};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/pascaExtend/updateProses/modalBody",
            data: data,
            success: function(msg) {
                $('#myModalBody').html(msg);
            }
        });

    }
    function myModalLabelGenerator(tranId)
    {
        var data = {tranId: tranId};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/pascaExtend/updateProses/modalHead",
            data: data,
            success: function(msg) {
                $('#myModalLabels').html(msg);
            }
        });
    }
</script>
