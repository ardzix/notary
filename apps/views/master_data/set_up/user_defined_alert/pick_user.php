<?php
/*
 * Project Name: notary
 * File Name: set_up_user_defined_alert_pick
 * Created on: 08 Jan 14 - 11:46:59
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
                                                    <th width="10%" rowspan="2">No.</th>
													<th width="15%" rowspan="2">Akta</th>
                                                    <th width="20%" rowspan="2">Proses</th>
                                                    <th width="20%" colspan="2" class="tengah">Batas Waktu Notifikasi</th>
                                                    <th width="15%" rowspan="2" class="tengah">Satuan</th>
                                                    <th width="15%" rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th class="tengah">SPV</th>
                                                    <th class="tengah">PIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											
												<?php
													$no=1;
													$spv=0;
													$pic=0;
													$satuan=0;
													$akta=-1;
													foreach($dataTable as $row){
												?>
                                                <tr>
                                                    <td><?=$no++;?></td>
													
													<td>
														<?php 
															if($akta != $row->AKTAID){
																echo $row->AKTADESC;
																
															}
														?>
													</td>
                                                    <td><?php echo $row->PROSESDESC;?></td>
													
													<!-- kolom SPV -->
													<?php 
														if($row->SPVALERTPROSTRAN != null){
														$spv = $row->SPVALERTPROSTRAN;
													?>
														<td class="tengah"><?=$row->SPVALERTPROSTRAN;?></td>
													<?php	
														} else { 												
														$spv = $row->DEFSPVALERT;
													?>
														<td class="tengah"><?=$spv;?></td>
													<?php } ?>
													
													
													<!-- kolom PIC -->
													<?php 
														if($row->PICALERTPROSTRAN != null){
														$pic = $row->PICALERTPROSTRAN;
													?>
														<td class="tengah"><?=$row->PICALERTPROSTRAN;?></td>
													<?php	
														} else { 												
														$pic = $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'DEFPICALERT');
													?>
														<td class="tengah"><?=$pic;?></td>
													<?php } ?>
                                                    
                                                    
													<!-- kolom SATUAN -->
													<?php 
														if($row->SATALERT != null){
															$satuan = $row->SATALERT;										
														} else { 												
															$satuan = $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'DEFSATALERT');
														} 
													?>
													<td><?php echo $this->model_translate->dynamicTranslate('satuanwaktustd', 'SATWAKTUSTDID', $satuan, 'SATWAKTUDESC'); ?></td>
													
                                                    <td>
                                                        <a href="#bModal" role="button" class="button green tip" data-toggle="modal" onClick="modalToogler('<?= $row->PROSESTRANID;?>','<?=$row->TRANSAKSIPRAID;?>','<?=$spv;?>','<?=$pic;?>','<?=$satuan;?>')" data-original-title="Edit">
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
			<form action="<?= base_url() ?>control/edit/setup_userdefined_alert" method="POST">
				<div class="modal-body">
					
						<table align="center">
							<tr>
								<td>SVP:</td>
								<td><input id="svp" name="DEFSVPALERT" style="width:300px;" type="text" class="validate[required]" placeholder="Masukan SVP"/></td>
							</tr>
							<tr>
								<td>PIC:</td>
								<td><input id="pic" name="DEFPICALERT" type="text" style="width:300px;" class="validate[required]" placeholder="Masukan PIC"/></td>
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
							
							<input type="hidden" id="prosestran" name="PROSESTRANID" value="">
							<input type="hidden" id="transaksipra" name="TRANSAKSIPRAID" value="">
						</table>
				</div> 
				<div class="modal-footer"> 
					<a href=""> 
						<button class="btn btn-group" aria-hidden="true">Update</button> 
					</a> 
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button> 
				</div> 
			</form>
		</div>
    </body>
</html>

<script language="javascript">

    function modalToogler(prosestran, transaksipra, svp, pic, satuan){
		
        document.getElementById('prosestran').value=prosestran;
		document.getElementById('transaksipra').value=transaksipra;
		document.getElementById('svp').value=svp;
		document.getElementById('pic').value=pic;
		
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