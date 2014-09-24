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
                        <h1><small> Pasca-Realisasi</small></h1>
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
                                    <li class="active"><a href="<?= base_url() ?>proses/pasca_realisasi" >Monitoring</a></li>
                                    <?php
                                    $employee = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $this->session->userdata('EMPLOYEEID')));

                                    $jabatan = $this->model_core->get_where_array('jabatan', array('JABATANID' => $employee['JABATANID']));
                                    
                                    if ($jabatan['GRUP'] == 3) {
                                        echo '<li><a href="' . base_url() . 'proses/pasca_realisasi/ekskalasi">Ekskalasi</a></li>';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                    <?php
                                    $employee = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $this->session->userdata('EMPLOYEEID')));

                                    $jabatan = $this->model_core->get_where_array('jabatan', array('JABATANID' => $employee['JABATANID']));
                                    
                                    if ($jabatan['GRUP'] == 2 || $jabatan['GRUP'] == 1) {
                                        echo '<li><a href="' . base_url() . 'proses/pasca_realisasi/approval">Approval</a></li>';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                    <li><a href="<?= base_url() ?>proses/pasca_realisasi/update_proses">Update Proses</a></li>
                                </ul>
                                                                 
                                <div class="alert alert-block">                
                                    Cari Data Monitoring
                                </div>
								
                                <div class="head dblue">
                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                    <h2>Data Monitoring</h2>
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('table_sort_pagination'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                                        
                               </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
												<th width="15%">TransaksipraID</th>
												<th width="25%">No. Covernote</th>
                                                
												<th width="25%">Nama</th>
                                                <th width="20%">Tgl. Akad</th>
                                                <th width="15%" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php 	$no=1;
													foreach($transaksipra as $cn) { 
														$ncn=$this->m_covernote->getDataCovFromTranId($cn->TRANSAKSIPRAID);
														if($ncn!=null){
																?>
											<tr>
												<td>
													<?php echo $cn->TRANSAKSIPRAID;?>
												</td>
												<td>
													<?php 	foreach($ncn as $n)
															{
																echo $n->NOCOVERNOTE;
																echo '<br>';
															}?>
												</td>
												
												<td>
													<?php 	
															$dat = $this->m_customertrans->getCustIdFromTransId($cn->TRANSAKSIPRAID);
															foreach($dat as $dt)
															{
																$cs=$this->m_customer->getDataById($dt->CUSTOMERID);
																echo $cs->NAMACUST;
																echo '<br/>';
															};
													?>
												</td>
												<td>
													<?php 	foreach($ncn as $cc)
															{
																$tgl=$cc->TGLAKAD; 
																
																
															};
															$newtgl =date("d-m-Y", strtotime($tgl)); 
															echo $newtgl;?>
												</td>
												<td>
													<?php 	
															/*$cID = $cn->COVERNOTEID;
															if ($cID == null){$cID='kosong';}*/
															$tID = $cn->TRANSAKSIPRAID;
															if ($tID == null) {$tID='kosong';}?>
													<a href="<?php echo base_url().'proses/detail_pasca_realisasi/'.$tID;?>" class="button purple tip" data-original-title="Detail">
														<div class="icon"><span class="icon-list icon-white"></span></div>
													</a>
													<a href="<?php echo base_url().'proses/view_edit_covernote/'.$tID;?>" class="button yellow tip jDialog_form_button" data-original-title="edit" >
														<div class="icon"><span class="icon-edit icon-white"></span></div>
													</a>
												</td>
                                            </tr>
											<?php $no++; }
											}; ?>
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
    </body>
</html>
