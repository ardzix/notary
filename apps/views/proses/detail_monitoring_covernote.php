 

<?php $this->load->view('slice/header-content'); ?>
	   <script type='text/javascript' src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel" align="center">Detail Akta</h3>
           </div>
		    
	   <div class="row-form">
					
                   
					<table align="center">
						<tr>
							
							<td>
								Nomor Akta :
							</td>
							<td >
								<?php 	$nomorAkta=$this->m_aktatran->getDataById($aktatranid)->NOAKTA; 
										echo $nomorAkta;
										//echo $aktatranid;
								?>
							
							</td>
							
						</tr>
					</table>
					<table   class="table dtable lcnp" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
									
									<th width="5%">No</th>
									
                                   
                                    <th width="25%">Proses</th>
                                    <th width="20%">Satuan</th>
									<th width="20%">Waktu Proses</th>
									<th width="25%">Tanggal Mulai</th>
                                </tr>
                            </thead>
                            <tbody>
								
								<?php 	$no=0;
										$noprosestran=0;
										foreach($prosestran as $ap){
												//$pros = $this->m_proses->getDataById($ap->PROSESID);
												
												
												?>
                                <tr>
									<td><?php echo $no+1;?></td>
                                    
                                    <td><?php 	$prosesName=$this->m_proses->getDataById($ap->PROSESID)->PROSESDESC;
												echo $prosesName;?>
										
										
									</td>
									<td>
										<?php 	$satuan = $ap->SATPROSES;
												if($satuan==null)
												{
													$satuan=$this->m_proses->getDataById($ap->PROSESID)->SATWAKTUSTDID;
													$satuanname=$this->m_satuanwaktustd->getDataById($satuan)->SATWAKTUDESC;
													echo $satuanname;
												}else
												{
													
													$satuanName=$this->m_satuanwaktustd->getDataById($satuan)->SATWAKTUDESC;
													echo $satuanName;
													
												}
										?>
									</td>
									<td>
										<?php  $wkt=$ap->WAKTUPROSTRAN;
												if($wkt==null)
												{
													$wkt=$this->m_proses->getDataById($ap->PROSESID)->DEFWAKTUSTD;
													echo $wkt;
												
												}else
												{
													echo $wkt;
												}
												?>
										
									</td>
									<td>
										<?php $tgl_mulai=$ap->TGLMULAI;
												$newtanggal=date('d-m-Y',strtotime($tgl_mulai));
												echo $newtanggal;?>
										
									</td>
                                </tr>  
								<?php $no++;};?>


                            </tbody>
                        </table>  
					
					
                </div>
				<div class="modal-footer">
                   
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
					
                </div>
				<?php echo form_close();?>