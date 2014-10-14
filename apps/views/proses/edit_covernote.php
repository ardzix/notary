<?php
/*
 * Project Name: notary
 * File Name: pasca_realisasi_detail_monitoring
 * Created on: 15 Jan 14 - 13:16:26
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
		
        <!-- jquery untuk handle table -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>

       <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>
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
                            <span class="ico-pencil"></span>
                        </div>
                        <h1>Detail<small> Covernote(Realisasi)</small></h1>
                    </div>
					<?php echo form_open_multipart('proses/update_covernote',array('name'=>'formInput'))?>
                    <div class="row-fluid">
                        <div class="span6">                

                            <div class="block">
                                <div class="head">                                
                                    <h2>Detail</h2>                                
                                </div>                                        
                                <div class="data-fluid">
									<div class="row-form">
                                        <div class="span5">ID Transaksi:</div>
                                        <div class="span7"><input type="text" value="<?php echo $transaksipra->TRANSAKSIPRAID;?>" name="id_transaksi" disabled/></div>
                                    </div>
                                    <?php 	
											$dat = $this->m_customertrans->getCustIdFromTransId($transaksipra->TRANSAKSIPRAID);
											$no=1;
											foreach($dat as $dt)
											{
																					//echo $dt->TRANSAKSIPRAID;
											$cs=$this->m_customer->getDataById($dt->CUSTOMERID);
																					
																				
																				//$cid=$this->m_transaksipra->getDataById($cn->TRANSAKSIPRAID)->CUSTOMERID;
																				//$cusid = $this->m_customer->getDataById($cid);
																				//echo $cusid->NAMACUST;?>
									<div class="row-form">
                                        <div class="span5"><?php echo 'ID DEBITUR '.$no;?></div>
                                        <div class="span7"><input type="text" value="<?php echo $dt->CUSTOMERID;?>" disabled/></div>
                                    </div>
									<div class="row-form">
                                        <div class="span5"><?php echo 'DEBITUR '.$no;?></div>
                                        <div class="span7"><input type="text" value="<?php echo $cs->NAMACUST;?>" disabled/></div>
                                    </div>
                                    <?php $no++;};?>
                                    <div class="row-form">
                                        <div class="span5">Bank</div>
                                        <div class="span7"><input type="text" value="<?php $bk=$this->m_bankrekening->getDataById($transaksipra->BANKREKID);
																							if($bk==null)
																							{
																								echo 'Tidak ada Bank';
																							}else
																							{
																								if($bk->BANKREKDESC==null)
																								{
																									echo 'Tidak ada Bank';
																								}
																								else
																								{
																																											
																									echo $bk->BANKREKDESC;
																								}
																			
																			
																						}				
																					?>" disabled/></div>
                                    </div>
									<div class="row-form">
                                        <div class="span5">Developer</div>
                                        <div class="span7"><input type="text" value="<?php $dev=$transaksipra->DEVELOPERID;
														
														if($dev==null)
																								{
																									echo 'Belum ada developer';
																								}
																								else
																								{
																									echo $this->m_developer->getDataById($dev)->DEVELOPERDESC;
																								}
																									?>" name="developer" disabled/></div>
                                    </div>
                                    <?php 
									
											if($bk==null)
											{
												
												echo form_hidden('bank');
												echo form_hidden('nama_bank','kosong');
																						
											}else
											{
												/*if($cn->BANKUTAMAID==null)
												{
													echo form_hidden('bank');
													echo form_hidden('nama_bank','kosong');
												}
												else
												{
													$bank=$this->m_bankutama->getDataById($cn->BANKUTAMAID);
													//echo $bank->BANKUTAMADESC;
													echo form_hidden('nama_bank',$bank->BANKUTAMADESC);
													echo form_hidden('bank',$cn->BANKUTAMAID);
												}*/
												echo form_hidden('nama_bank',$bk->BANKREKDESC);
												echo form_hidden('bank',$bk->BANKREKID);
											}
																	   
									?>
									<div id= "add_" style="display:block;" >
											<?php 	$ncn=$this->m_covernote->getDataCovFromTranId($transaksipra->TRANSAKSIPRAID);
														$count=0;
														$num=0;
														foreach($ncn as $nm){
															$num++;	
														}
														if ($num==1)
														{
															foreach($ncn as $n)
															{
																
														?>
																	<div class="row-form">
																		<div class="span5">No. Covernote:</div>
																		<div class="span6">
																			<input type="text" value="<?php echo $n->NOCOVERNOTE;?>" name="<?php echo 'ncnotea_'.$count;?>" />
																			<input type="hidden" value="<?php echo $n->COVERNOTEID;?>" name="<?php echo 'cnoteid_'.$count;?>" />
																		</div>
																		<div class="span1">
																			<a  class="button yellow tip jDialog_form_button" data-original-title="Add" id="add_form()" onclick="add_form()">
																				<div class="icon"><span class="icon-plus-sign "></span></div>
																			</a>
																		</div>
																	</div>
											<?php 				
																
															$count++;
															}
														}else
														{ 
															foreach($ncn as $n)
															{
																if ($count==0)
																{?>
																	<div class="row-form">
																		<div class="span5">No. Covernote:</div>
																		<div class="span6">
																			<input type="text" value="<?php echo $n->NOCOVERNOTE;?>" name="<?php echo 'ncnotea_'.$count;?>" />
																			<input type="hidden" value="<?php echo $n->COVERNOTEID;?>" name="<?php echo 'cnoteid_'.$count;?>" />
																		</div>
																		
														<?php	}else
																{?>
																		<div class="span1">
																			
																		</div>
																	</div>
																	<div class="row-form">
																		<div class="span5"></div>
																		<div class="span6">
																			<input type="text" value="<?php echo $n->NOCOVERNOTE;?>" name="<?php echo 'ncnotea_'.$count;?>" />
																			<input type="hidden" value="<?php echo $n->COVERNOTEID;?>" name="<?php echo 'cnoteid_'.$count;?>" />
																		</div>
																
														<?php	}
																
																
																$count++;
															}?>
																		<div class="span1">
																			<a  class="button yellow tip jDialog_form_button" data-original-title="Add" id="add_form()" onclick="add_form('')">
																				<div class="icon"><span class="icon-plus-sign "></span></div>
																			</a>
																		</div>
																	</div>
												<?php	}	
															?>
														
														
												
														
									</div>
											<?php //}else{
													//}?>
									
									
										<div class="row-form">
											<div id = "add_data" style="display:none;" class="form-inline" >
												<div class="span5"></div>
												
												
													&nbsp &nbsp  <input type="text" value="" name="ncnote_" class="span6" />
												
												
												
													<!--<a  href="#data" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="icon-remove"  data-original-title="Pick">
														<div class="icon"><span class="ico-plus-sign"></span></div> 
													</a>-->
																										&nbsp
													<button class="btn btn-mini btn-danger"  onclick="this.parentNode.parentNode.removeChild(this.parentNode);" ><i href="#data" class="icon-trash bigger-125 icon-white"></i></button>
												
											</div>
										</div>
                                   <?php echo form_hidden('tranid',$transaksipra->TRANSAKSIPRAID);?>
									
									<?php 
											echo form_hidden('jml',$count);
											echo form_hidden('counter');?>	
									<div class="row-form">
										<?php 	
												//set tanggal
												$tgl='kosong';
												$taranggal='';
												foreach($ncn as $cc)
												{
													
													$akadtgl=$cc->TGLAKAD;
													$selesaiTgl=$cc->TGLSELESAI;
													if($selesaiTgl!=null)
													{
													$taranggal=$selesaiTgl;
													}
													
												}
												$akadDate=date('m/d/Y',strtotime($akadtgl));
												if($taranggal!=null)
												{
												//echo $selesaiTgl;
													
													$selesaiDate=date('m/d/Y',strtotime($taranggal));
												}else
												{
													$selesaiDate='';
												}
												//end of set tanggal
												
												//set jangka waktu
													//set total hari
													$hari=0;
													$akt=$this->m_aktatran->getDataByTranID($transaksipra->TRANSAKSIPRAID);
													foreach($akt as $kt)
													{
														$pr=$this->m_proses->getDataByAktaID($kt->AKTAID);
														foreach ($pr as $p)
														{
															//$proses = $this->m_proses->getDataById($p->PROSESID);
															$jumlah_satuan=$p->DEFWAKTUSTD;
															//$satuan_waktu=$proses->SATWAKTUSTDID;
															$satuan_waktu=$this->m_satuanwaktustd->getDataById($p->SATWAKTUSTDID);
															$satuan= $satuan_waktu->KONVERSI;
															$total=$satuan*$jumlah_satuan;
															$hari=$hari+$total;
															
														}
														
													}
													
													//convert day to year, month and day
													$years = floor($hari / (365));
													
													$months = floor(($hari - $years * 365) / 30);
													$days = floor(($hari - $years * 365 - $months*30));
													//set tanggal jangka waktu
													
													$newtgl=$this->m_covernote->add_date($tgl,$days,$months,$years);
													//set penulisan tanggal
													$tanggalbaru=date("Y-m-d", strtotime($newtgl));
												
										?>
                                        <div class="span5">Tanggal Akad:</div>
                                        <div class="span7"><input type="text" value="<?php echo $akadDate;?>" id="dp1" name="tgl_akad" /></div>
										
                                    </div>
									
									<div class="row-form">
                                        <div class="span5">Target Waktu Penyelesaian</div>
                                        <div class="span7"><input type="text" value="<?php echo $selesaiDate;?>" name="tgl_selesai" id="dp2"/></div>
                                    </div>
									<div class="row-form">
                                    <div class="span5">Covernote</div>
                                    <div class="span7">                            
                                        <?php echo form_upload('covernote');?>                    
                                    </div>
									</div>
									<div class="row-form">
										<div class="span5"></div>
										<div class="span4">
										<button class="btn btn-primary" id='submit'>Save</button>
										<a href="<?php echo base_url();?>proses/realisasi/covernote" class="btn btn-warning">Close</a>
										</div>
										<div class="span3"></div>
									</div>
                                </div>
                            </div>
															

                        </div>
						
						<div class="span6">
                                
                                       
                                                
										
								<div class="data-fluid">
                                        <br>
										<br>
										<table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="30%">
														No
													</th>
                                                    <th width="40%">
														Akta
													</th>
                                                    
                                                                
                                                    <th width="30%" class="TAC">
														Actions
													</th>
                                                </tr>
                                            </thead>
                                            
											<tbody>
											<?php 	$no=1;
													$akta=$this->m_aktatran->getDataByTranID($transaksipra->TRANSAKSIPRAID);
													foreach ($akta as $at){
											?>
													<tr>
														
														<td>
															<?php echo $no;?>
														</td>
														<td>
															<?php 	$akt = $this->m_akta->getDataById($at->AKTAID);
																	echo $akt->AKTADESC;?>
														</td>
														
														
														<td>
                                                            <a href="#dModal" role="button" onClick="display_data('<?php echo $at->AKTAID; ?>','<?php echo $at->AKTATRANID; ?>','<?php echo $transaksipra->TRANSAKSIPRAID;?>')" class="button green tip" data-original-title="Edit" data-toggle="modal"><div class="icon">
															<span class="ico-pencil"></span></div></a>
														</td>
                                                     </tr>
											<?php 					$no++;
													}; ?>
                                            </tbody>
                                        </table>                    
                                </div> 
									
                        </div>  
							
                    </div>
					
					<!--
					<div class="row-form">
						<div class="span4"></div>
						<div class="span4"><button id='submit' class="btn btn-small btn-success">Submit</button> &nbsp <?php echo form_reset(array('name'=>'cancel','value'=>'Cancel','id'=>'close','class'=>'btn btn-small btn-success'));?></div>
						<div class="span4"></div>
					</div>
					-->
					<?php echo form_close();?>
					
                </div>
            </div>
        </div>


 <!-- Bootrstrap modal form -->

        <div id="dModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				
                
				<div id="data_c">
                    
					
					
                </div>
                
            
        </div>
		<!-- modal kedua-->
		<div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="row-fluid">
			<div class="block">	
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel" align="center">Setup Akta</h3>
                </div>
				

                <div class="row-form">
					
                    <?php echo form_open('tes');?>
					<table align="center">
						<tr>
							
							<td>
								Nomor Akta :
							</td>
							<td >
								<input type="text" value="" name="akta" />
							</td>
							
						</tr>
					</table>
					
                </div>
				<div class="row-form">
                    <div class="span1">No</div>
                    <div class="span4">Proses</div>
					<div class="span3">Satuan</div>
					<div class="span3">Waktu Proses</div>
					<div class="span1"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" aria-hidden="true">Save updates</button>
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
			</div>
        </div>
		<!-- end modal kedua-->
    </body>
	<script>
		function testCek(){
			alert("tested");
		}
	</script>
	<script>
		function modalToogler(dokId)
		{
			display_data(id);
		}
		function display_data(aktaid,aktatranid,tranpraid) { 
			xmlhttp4=GetXmlHttpObject4();
			if (xmlhttp4==null)
			{
				alert ("Your browser does not support AJAX!");
				return;
			} 
			var url="<?php echo base_url();?>proses/detail_edit_covernote";
			url=url+"/"+aktaid+"/"+aktatranid+"/"+tranpraid;
			xmlhttp4.onreadystatechange=function() 
			{
				if (xmlhttp4.readyState==4 || xmlhttp4.readyState=="complete") 
				{
					document.getElementById('data_c').innerHTML=xmlhttp4.responseText;
				}
			}
			xmlhttp4.open("POST",url,true);
			xmlhttp4.send(null);
			}
			
			function GetXmlHttpObject4() {
					var xmlhttp4=null;
					try {
					// Firefox, Opera 8.0+, Safari
					xmlhttp4=new XMLHttpRequest();
					}
					catch (e) {
					// Internet Explorer
						try {
							xmlhttp4=new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch (e) {
							xmlhttp4=new ActiveXObject("Microsoft.XMLHTTP");
						}
					}
					return xmlhttp4;
				}

	
	</script>
	<script type="text/javascript">
		var counter = 0;
		
			//Start a counter. Yes, at 0
		function add_form() {
			//counter=co-1;
			counter++;
	
			document.formInput.counter.value=counter;
			// I find it easier to start the incrementing of the counter here.
			var newFields = document.getElementById('add_data').cloneNode(true);
			newFields.id = '_data';
			newFields.style.display = 'block';
			newFields.style.padding = '5px 0 0 0';
			var newField = newFields.childNodes;
			for (var i=0;i<newField.length;i++) {
				var theName = newField[i].name
				if (theName){
					var newName = theName + counter;
				
					newField[i].name = newName;
				}
// This will change the 'name' field by adding an auto incrementing number at the end. This is important.
			}
			var insertHere = document.getElementById('add_data');
// Inside the getElementById brackets is the name of the div class you will use.
			insertHere.parentNode.insertBefore(newFields,insertHere);
			
		}
		
		
	</script>
	<script>
	/*if (top.location != location) {
    top.location.href = document.location.href ;
  }*/
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'dd-mm-yyyy'
			});
			$('#dp2').datepicker({format: 'dd-mm-yyyy'});
			
        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	</script>
</html>