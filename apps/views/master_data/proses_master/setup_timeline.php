<?php
/*
 * Project Name: notary
 * File Name: setup_timeline
 * Created on: 08 Jan 14 - 10:05:45
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
                        <a href="#" class="button" onClick="document.location='<?= base_url() ?>master_data/proses_master'">
                    <div class="icon">
                        <span class="ico-arrow-left"></span>
                    </div>
                    </a>
                        <h1>Proses Timeline<small> Setup Timeline</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="head dblue">
                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                    <h2>Setup Timeline Data</h2>
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                                        
                                </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="15%">NO</th>
                                                <th width="15%">NO. Customer</th>
                                                <th width="20%">Nama</th>
                                                <th width="30%">Pre-realisasi ID</th>
                                                <th width="20%" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php 
										$no = 1;
										foreach($dataTable as $row){
										
										?>
										<tr>
											<td>
												<?= $no++; ?>
											</td>
											
											<td>
												<?php 
													$customer = $this->model_core->get_where_result('customertrans', array('TRANSAKSIPRAID' => $row->TRANSAKSIPRAID));
																foreach ($customer as $row2) {
																	ECHO $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row2->CUSTOMERID, 'NOIDPERSONALCUST') . '<br> ';
																}
												?>
											</td>
											
											<td>
												<?php $customer = $this->model_core->get_where_result('customertrans', array('TRANSAKSIPRAID' => $row->TRANSAKSIPRAID));
																foreach ($customer as $row2) {
																	ECHO $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $row2->CUSTOMERID, 'NAMACUST') . '<br> ';
																}
												?>
												</td>
											<td>
												<?= $row->TRANSAKSIPRAID; ?>
											</td>
											<td>
												<a href="<?= base_url() ?>master_data/proses_master/setup_timeline/pick/<?=$row->TRANSAKSIPRAID;?>" class="button yellow tip" data-original-title="Pick">
													<div class="icon"><span class="ico-hand-up"></span></div>
												</a>
											</td>
										</tr>
										<?php
										}
										?>
                                        </tbody>
                                    </table>                    
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