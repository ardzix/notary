<?php
/*
 * Project Name: notary
 * File Name: alert
 * Created on: 16 Jan 14 - 8:58:08
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Setup Default Alert berhasil diupdate!</div>
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
                        <h1>Set-up<small> Setup Default</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">                
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                         <!-----------------------------------------------------------
                                        PROSES TIME
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 52));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>master_data/set_up/set_default/proses">proses</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Alert TIME
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 53));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>master_data/set_up/set_default/alert">Alert</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>


                                    <div class="head blue">
                                        <div class="icon"><span class="ico-pen-2"></span></div>
                                        <h2>Setup Default Alert</h2>
                                        <ul class="buttons">
                                            <li><a href="#" onClick="source('table_default'); return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                        </ul>                              
                                    </div>                
                                    <div class="data-fluid">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                                            <thead>
                                                <tr>
                                                    <th width="5%" rowspan="2">No.</th>
                                                    <th width="20%" rowspan="2">Proses</th>
                                                    <th width="35%" colspan="2" class="tengah">Batas Waktu Notifikasi</th>
                                                    <th width="20%" rowspan="2" class="tengah">Satuan</th>
                                                    <th width="20%" rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th class="tengah">SPV</th>
                                                    <th class="tengah">PIC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php 
											   $inc = 1;
											   foreach ($dataTable as $row) { ?>                                            
													<tr>
														<td><?php echo $inc ?></td>
														<td><?php
															if ($row[0] == 0)
																echo '->&nbsp;&nbsp;';
															elseif ($row[0] == 1)
																echo '&nbsp;&nbsp;&nbsp;&nbsp;->&nbsp;&nbsp;';
															elseif ($row[0] == 2)
																echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;->&nbsp;&nbsp;';
															elseif ($row[0] == 3)
																echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;->&nbsp;&nbsp;';
															elseif ($row[0] == 4)
																echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;->&nbsp;&nbsp;';
															else
																echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;->&nbsp;&nbsp;';
															?><?php echo $row[1][2] ?>
														</td>
														<td class="tengah"><?php echo $row[1][3] ?></td>
														<td class="tengah"><?php echo $row[1][4] ?></td>
														<?php 
															if($row[1][1] != null){
															?>
															<td class="tengah"><?php echo $this->model_translate->dynamicTranslate('satuanwaktustd', 'SATWAKTUSTDID', $row[1][1], 'SATWAKTUDESC'); ?></td>
															<?php	
															} else {
															
														?>
															<td class="tengah"> </td>
															
														<?php } ?>
														
														
														<td>
															<a href="#bModal" role="button" class="button green tip" data-toggle="modal" onClick="modalToogler('<?echo $row[1][0] ?>','<? echo $row[1][3] ?>','<? echo $row[1][4] ?>','<? echo $row[1][1] ?>')" data-original-title="Edit">
																<div class="icon"><span class="ico-pencil"></span></div>
															</a>
														</td>
													</tr> 
												<?php $inc++; } ?>
                                            </tbody>
                                        </table>
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
    <div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
            <h3 id="myModalLabel">Apakah anda yakin ingin memperbaharui data ini?</h3> 
    </div> 
	<form action="<?= base_url() ?>control/edit/default_alert" method="POST">
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
					<input type="hidden" id="proses" name="PROSESID" value="">
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

    function modalToogler(dokId, svp, pic, satuan){
        document.getElementById('proses').value=dokId;
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