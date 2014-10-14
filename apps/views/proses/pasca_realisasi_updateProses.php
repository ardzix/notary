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
                                        <li><a href="#" onClick="source('tabs'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
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
                                        <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                                        
                               </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
												<th width="15%">No. Covernote</th>
                                                <th width="20%">TransaksipraID</th>
												<th width="20%">Nama</th>
                                                <th width="20%">Tgl. Akad</th>
                                                <th width="15%" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $no=1;foreach($transcover as $cn) { ?>
											<tr>
												<td>
													<?php echo $no;?>
												</td>
												<td>
													<?php 
                                                        $cc=0;
                                                        $no_cov=$this->m_transaksipra->get_no_covernote_by_trans_id($cn->TRANSAKSIPRAID);
                                                        foreach($no_cov as $cov){
                                                            echo $cov->NOCOVERNOTE;
                                                            if((count($no_cov)-1)!=$cc){
                                                                echo ", ";
                                                            }
                                                            $cc++;
                                                        }
                                                    ?>
												</td>
												<td>
													<?php echo $cn->TRANSAKSIPRAID;?>
												</td>
												<td>
													<?php 	
															$dat = $this->m_customertrans->getCustIdFromTransId($cn->TRANSAKSIPRAID);
															foreach($dat as $dt)
															{
																$cs=$this->m_customer->getDataById($dt->CUSTOMERID);
																echo $cs->NAMACUST;
																echo ', ';
															};
													?>
												</td>
												<td>
													<?php 	echo $cn->TGLAKAD;?>
												</td>
												<td> <a href="<?Php echo site_url('proses/pasca_realisasi/update-proses-details/'.$cn->TRANSAKSIPRAID); ?>" role="button"  class="button purple tip"  data-original-title="Detail" onClick="modalToogler('<?php echo $cn->TRANSAKSIPRAID;?>')">
                                                                      
                                                                            <div class="icon"><span class="icon-list icon-white"></span></div>
                                                                    </a>
												</td>
                                            </tr>
											<?php $no++; }; ?>
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
    
    
    </body>
</html>



<script language="javascript">

    function modalToogler(tranId)
    {
        myModalLabelGenerator(tranId);
        myModalBodyGenerator(tranId);
    }
	
    function myModalBodyGenerator(tranId)
    {
        var data = {tranId:tranId};
        $.ajax({
            type: "POST",
            url : "<?= base_url() ?>proses/pascaExtend/updateProses/modalBody",
            data: data,
            success: function(msg){
                $('#myModalBody').html(msg);
            }
        });	
		
    }
    function myModalLabelGenerator(tranId)
    {
        var data = {tranId:tranId};
        $.ajax({
            type: "POST",
            url : "<?= base_url() ?>proses/pascaExtend/updateProses/modalHead",
            data: data,
            success: function(msg){
                $('#myModalLabels').html(msg);
            }
        });	
    }
</script>
