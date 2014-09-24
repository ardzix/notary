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
                        <h1>Detail<small> Monitoring (Pasca Realisasi)</small></h1>
                    </div>
                    <div class="row-fluid">
						<div class="span6">                
							<div class="block">
                                <div class="head">                                
                                    <h2>Detail</h2>                                
                                </div>                                        
                                <div class="data-fluid">

                                    <div class="row-form">
                                        <div class="span4">No. Pra-Realisasi:</div>
                                        <div class="span8"><input type="text" value="<?php echo $transaksipra->TRANSAKSIPRAID;?>" name="id_transaksi" disabled/></div>
                                    </div>
                                    
									<?php 	$no=0;
											$countCov=1;
											$ncn=$this->m_covernote->getDataCovFromTranId($transaksipra->TRANSAKSIPRAID);
											foreach($ncn as $itung)
											{
												$no++;
											}
											if ($no==1){
												foreach($ncn as $cov1){
											?>
									
										<div class="row-form">
                                        <div class="span4">No. Covernote:</div>
                                        <div class="span8"><input type="text" value="<?php 	echo $cov1->NOCOVERNOTE;
																									
																							 ?>" disabled/></div>
										</div>
											<?php 		}
													}else
													{
														foreach($ncn as $cov2)
														{
															
															if($countCov==1)
															{
																
											?>	
															<div class="row-form">
																<div class="span4"><?php echo 'No.Covernote'.$countCov.' :';?></div>
																<div class="span8"><input type="text" value="<?php 	echo $cov2->NOCOVERNOTE;
																									
																							 ?>" disabled/>
																</div>
															</div>
												<?php 		}else
															{?>
																<div class="row-form">
																	<div class="span4"><?php echo 'No.Covernote'.$countCov.' :';?></div>
																	<div class="span8"><input type="text" value="<?php 	echo $cov2->NOCOVERNOTE;
																									
																							 ?>" disabled/>
																	</div>
																</div>
												<?php 		}
														$countCov++;
														}
													}?>
													
                                    <div class="row-form">
										<?php 	$tempTanggal=0;
											//	$tempNamaPemilikSertifikat=0;
												//$tempNoSertifikat=0;
												$tempTipeWilayah=0;
											foreach($ncn as $tglcov)
											{
												$tempTanggal=$tglcov->TGLAKAD;
												//$tempNamaPemilikSertifikat=$tglcov->NMPEMILIKSERTF;
												//$tempNoSertifikat=$tglcov->NOSERTIFIKAT;
												$tempTipeWilayah=$tglcov->TIPEWILAYAHID;
											}
											?>
                                        <div class="span4">Tgl Akad:</div>
                                        <div class="span8"><input type="text" value="<?php  $tempTanggal;
																							$newtgl =date("d-m-Y", strtotime($tempTanggal)); 
																							echo $newtgl;
																					?>" disabled/></div>
                                    </div>
                                    
									
								</div>
							</div>
						</div>
						<div class="span5">                

                            <div class="block">
                                                                      
                                <div class="data-fluid">
									<br />
										<br />
                                    <div class="row-form">
									
                                        <div class="span4">Developer:</div>
                                        <div class="span8"><input type="text" value="<?php if ($transaksipra->DEVELOPERID==null)
																								{
																									echo 'kosong';
																								}else
																								{
																									 $dev=$this->m_developer->getDataById($transaksipra->DEVELOPERID);
																									 echo $dev->DEVELOPERDESC; 
																								}	
																					?>" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Kota/Kab/Notaris:</div>
                                        <div class="span8"><input type="text" value="<?php 	if ($tempTipeWilayah==null)
																								{
																									echo 'kosong';
																								}else
																								{
																									
																									$wil=$tempTipeWilayah;
																									
																									
																										echo $this->m_tipewilayah->getDataById($wil)->TIPEWILAYAHDESC;
																									
																									
																									
																								}
																							 ?>" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Bank:</div>
                                        <div class="span8"><input type="text" value="<?php $bk=$this->m_bankrekening->getDataById($transaksipra->BANKREKID);
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
                                        <div class="span4">Tgl Masuk Proses:</div>
                                        <div class="span8"><input type="text" value="<?php  
																								$tgl_akad=0;
																								if ($transaksipra==null)
																								{
																									echo 'kosong';
																								}else
																								{
																									$covbytranpra=$this->m_covernote->getDataCovFromTranId($transaksipra->TRANSAKSIPRAID);
																									foreach ($covbytranpra as $cbt)
																									{
																										$temptglAkad=$cbt->TGLAKAD;
																										if($temptglAkad!=null)
																										{
																											$tgl_akad=$temptglAkad;
																										}
																									}
																									if($tgl_akad!=0)
																									{
																										//$tglakad=$transaksipra->TANGGALPRA; 
																										$newtglmsk = date("d-m-Y", strtotime($tgl_akad)); 
																										echo $newtglmsk;
																									}else
																									{
																										echo 'kosong';
																									}
																									
																								}
																								
																					?>" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Tgl Perkiraan Selesai:</div>
                                        <div class="span8"><input type="text" value="<?php 		$tgl_selesai=0;
																								if ($transaksipra==null)
																								{
																									echo 'kosong';
																								}else
																								{
																									$covbytranpra=$this->m_covernote->getDataCovFromTranId($transaksipra->TRANSAKSIPRAID);
																									foreach ($covbytranpra as $cbt)
																									{
																										$temptglSelesai=$cbt->TGLSELESAI;
																										if($temptglSelesai!=null)
																										{
																											$tgl_selesai=$temptglSelesai;
																										}
																									}
																									if($tgl_selesai!=0)
																									{
																										//$tglakad=$transaksipra->TANGGALPRA; 
																										$newtglselesai = date("d-m-Y", strtotime($tgl_selesai)); 
																										echo $newtglselesai;
																									}else
																									{
																										echo 'kosong';
																									}
																									
																								}
																								
																					?>" disabled/></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

						<div class="span11">
                                
                                        <h3>Data Realisasi</h3>
                                                
										
								<div class="data-fluid">
                                                    
										<table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="20%">
														No
													</th>
                                                    <th width="20%">
														Akta
													</th>
                                                    <th width="20%">
														Proses
													</th>
                                                                
                                                    <th width="20%" class="TAC">
														Actions
													</th>
                                                </tr>
                                            </thead>
                                            
											<tbody>
											<?php 	$no=1;
														$akta=$this->m_aktatran->getDataByTranID($transaksipra->TRANSAKSIPRAID);
														foreach($akta as $pt) { ?>
													<tr>
														<?php 	
																$akt = $this->m_akta->getDataById($pt->AKTAID);
																//$pros=$this->m_proses->getDataById($pt->PROSESID);
																//$status=$this->m_statusproses->getDataByID($pt->STATUSPROSESID);
														?>
														<td>
															<?php echo $no;?>
														</td>
														<td>
															<?php echo $akt->AKTADESC;?>
														</td>
														</td>
														<td>
															<?php  
																	$proses=$this->m_prosestran->getDataById($pt->CURRENTPROSES)->PROSESID;
																	$prosesName=$this->m_proses->getDataById($proses)->PROSESDESC;
																	echo $prosesName;?>
														</td>	
														<td>
                                                            <a href="#fModal" role="button" onClick="display_data_detail('<?php echo $pt->AKTATRANID; ?>')"  data-toggle="modal" class="button purple tip" data-original-title="Detail">
																<div class="icon"><span class="icon-list icon-white"></span></div>
															</a>
															<!--<a href="#dModal" role="button" onClick="display_data('<?php echo $akt->AKTAID; ?>','<?php echo $pt->AKTATRANID; ?>','<?php echo $transaksipra->TRANSAKSIPRAID;?>')" class="button green tip" data-original-title="Edit" data-toggle="modal"><div class="icon">
															<span class="ico-pencil"></span></div></a>-->
														</td>
                                                     </tr>
											<?php $no++;}; ?>
                                            </tbody>
                                        </table>                    
                                </div> 
                        </div>  
										
                    </div>
                </div>
            </div>
        </div>
		 <!-- Bootrstrap modal form -->
		
		<!-- modal pertama-->
        <div id="dModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				
                
				<div id="data_c">
                    
					
					
                </div>
                
            
        </div>
		
		<!-- end modal pertama-->
		
		<!-- modal kedua-->
		<div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				
                
				<div id="data_d">
                    
					
					
                </div>
                
            
        </div>
		<!-- end modal kedua-->
		<!-- end bootstrap -->
    </body>
</html>
<script>
		
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
			
		function display_data_detail(aktatranid) { 
			xmlhttp5=GetXmlHttpObject5();
			if (xmlhttp5==null)
			{
				alert ("Your browser does not support AJAX!");
				return;
			} 
			var url="<?php echo base_url();?>proses/detail_monitoring_covernote";
			url=url+"/"+aktatranid;
			xmlhttp5.onreadystatechange=function() 
			{
				if (xmlhttp5.readyState==4 || xmlhttp5.readyState=="complete") 
				{
					document.getElementById('data_d').innerHTML=xmlhttp5.responseText;
				}
			}
			xmlhttp5.open("POST",url,true);
			xmlhttp5.send(null);
			}
			
			function GetXmlHttpObject5() {
					var xmlhttp5=null;
					try {
					// Firefox, Opera 8.0+, Safari
					xmlhttp5=new XMLHttpRequest();
					}
					catch (e) {
					// Internet Explorer
						try {
							xmlhttp5=new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch (e) {
							xmlhttp5=new ActiveXObject("Microsoft.XMLHTTP");
						}
					}
					return xmlhttp5;
				}			

	
	</script>