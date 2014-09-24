<?php
/*
 * Project Name: notary
 * File Name: setup_timeline_pick
 * Created on: 08 Jan 14 - 10:45:16
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
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil diupdate!</div>
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
                            <span class="ico-plus-sign"></span>
                        </div>
                        <h1>Proses Timeline<small> Setup Timeline</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span8">                
                            <div class="block">
                                <div class="block">
                                    <div class="head blue">
                                        <div class="icon"><span class="ico-pen-2"></span></div>
                                        <h2>Data Pick Setup Timeline</h2>
                                        <ul class="buttons">
                                            <li><a href="#" onClick="source('table_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                        </ul>                              
                                    </div>                
                                    <div class="data-fluid">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No.</th>
                                                    <th width="20%">Akta</th>	
                                                    <th width="35%">Proses</th>
                                                    <th width="35%">Waktu Penyelesaian</th>
                                                    <th width="15%">Satuan</th>
                                                    <th width="25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php 
													$no = 1;
													$value = 0;
													$SATID = 0;
													foreach ($dataTable as $row) {
												?>
												<tr>
													<td>
														<?php
															echo $no++;
														?>
													</td>
													<td>
														<?php
															echo $row->AKTADESC;
														?>
													</td>
													<td>
														<?php
															echo $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'PROSESDESC');
														?>
													</td>
													<td>
														<?php
															if($row->WAKTUPROSTRAN == null){
																$value = $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'DEFWAKTUSTD');
																echo $value;
															} else {
																$value = $row->WAKTUPROSTRAN;
																echo $value;
															}
														?>
													</td>
													<td>
														<?php
															if($row->SATPROSES == null){
																$SATID = $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'SATWAKTUSTDID');
																echo $this->model_translate->dynamicTranslate('satuanwaktustd', 'satwaktustdid', $SATID, 'SATWAKTUDESC');
															} else {
																$SATID = $row->SATPROSES;
																echo $this->model_translate->dynamicTranslate('satuanwaktustd', 'satwaktustdid', $row->SATPROSES, 'SATWAKTUDESC');
															}
														?>
													</td>
													<td>
                                                        <a href="#bModal" role="button" class="button green tip" data-toggle="modal" onClick="modalToogler('<?echo $row->PROSESTRANID ?>','<? echo $value ?>','<? echo $SATID ?>','<? echo $row->TRANSAKSIPRAID ?>')" data-original-title="Edit">
															<div class="icon"><span class="ico-pencil"></span></div>
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
		
		<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button> 
					<h3 id="myModalLabel">Apakah anda yakin ingin memperbaharui data ini?</h3> 
			</div> 
			<form action="<?= base_url() ?>control/edit/setup_timeline" method="POST">
				<div class="modal-body">
				
					<table align="center">
						<tr>
							<td>Waktu Penyelesaian:</td>
							<td><input id="valueID" name="VALUE" type="text" style="width:300px;" class="validate[required]" placeholder="Masukan PIC"/></td>
						</tr>
						<tr>
							<td>Satuan:</td>
							<td>
								<select id="sat" name="SATUAN" style="width:300px;">
								<?php
									foreach ($satWaktu as $row){
									
								?>
									<option value="<?= $row->SATWAKTUSTDID; ?>"><?= $row->SATWAKTUDESC; ?></option>
								<?php 
									}
								?>
								</select>
							</td>
						</tr>
					</table>
					<input type="hidden" id="proses" name="PROSESTRANID" value="">
					<input type="hidden" id="transaksi" name="TRANSAKSIPRAID" value="">
				</div> 
			
				<div class="modal-footer"> 
					<a href=""> 
						<button class="btn btn-group" aria-hidden="true">Update</button> 
					</a> 
						<button class="btn red" data-dismiss="modal" aria-hidden="true">Cancel</button> 
				</div> 
			</form>
		</div>
    </body>
</html>
<script language="javascript">

    function modalToogler(dokId, value, satuan,transaksi)
    {
        document.getElementById('proses').value=dokId;
		document.getElementById('valueID').value=value;
		document.getElementById('transaksi').value=transaksi;
		
		var satuan_ = document.getElementById('sat');
		// get the options length
		var len = satuan_.options.length;
		
		for(i = 0; i < len; i++){
		  // check the current option's text if it's the same with the input box
			if (satuan_.options[i].value == satuan){
				satuan_.selectedIndex = i;
				break;
			}     
		}
    }
</script>
