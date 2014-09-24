 

<?php $this->load->view('slice/header-content'); ?>
	   <script type='text/javascript' src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel" align="center">Setup Akta</h3>
           </div>
		    <?php echo form_open('proses/edit_detail_covernote');?>
	   <div class="row-form">
					
                   
					<table align="center">
						<tr>
							
							<td>
								Nomor Akta :
							</td>
							<td >
								<?php $nomorAkta=$this->m_aktatran->getDataById($aktatranid)->NOAKTA;?>
								<input type="text" value="<?php echo $nomorAkta;?>" name="nomor_akta" />
							</td>
							
						</tr>
					</table>
					<table   class="table dtable lcnp" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
									
									<th width="5%">No</th>
									
                                    <th width="10%"></th>
                                    <th width="25%">Proses</th>
                                    <th width="20%">Satuan</th>
									<th width="20%">Waktu Proses</th>
									<th width="25%">Tanggal Mulai</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php echo form_hidden('aktatran',$aktatranid);?>
								<?php echo form_hidden('transaksipra',$transaksipra);?>
								<?php 	$no=0;
										$noprosestran=0;
										$tempProsesTranId=null;
										foreach($proses as $ap){
												//$pros = $this->m_proses->getDataById($ap->PROSESID);
												$cek=False;
												$tempProsesTranId=null;
												foreach($prosestran as $akttran)
												{	
													
													//cek apakah proses id di proses tran sama dengan di proses
													if($akttran->PROSESID==$ap->PROSESID)
													{
														$cek=True;
														$tempProsesTranId=$akttran->PROSESTRANID;
													}
												}
												
												?>
                                <tr>
									<td><?php echo $no+1;?></td>
                                    <td>
										<?php 
												if($cek)
												{
												?>
										<input type="hidden" value="<?php echo $tempProsesTranId;?>" name="<?php echo 'prosestran_'.$no;?>" />
										<input type="checkbox" value="<?php echo $no;?>" name="proses[]" checked />
										<?php
												}else
												{
										?>
										<input type="hidden" value="" name="<?php echo 'prosestran_'.$no;?>" />
										<input type="checkbox" value="<?php echo $no;?>" name="proses[]"  />
										<?php }
										?>
									</td>
                                    <td><?php echo $ap->PROSESDESC;?>
										<?php echo form_hidden('id_proses_'.$no,$ap->PROSESID);?>
										
									</td>
									<td>
										<?php 
										//$js='onClick="display_data(this.value);"';
										//$js=array('id'=>'model_id', 'onChange'='show_lighboxModel('.$mod->model)_id.')');
										$wkt=$this->m_satuanwaktustd->getData();
										foreach($wkt as $wt)
										{
											$w[$wt->SATWAKTUSTDID]=$wt->SATWAKTUDESC;
											
										}
										echo form_dropdown('satuan_'.$no,$w,$ap->SATWAKTUSTDID);
										
																						
																									?>
									</td>
									<td>
										<input type="text" value="<?php $pp=$ap->DEFWAKTUSTD;
																		if ($pp==null)
																		{
																			echo 'kosong';
																		}else
																		{
																			echo $pp;
																		}?>"																
																	name="<?php echo 'waktu_'.$no; ?>" />
									</td>
									<td>
										<?php 	if($tempProsesTranId!=null)
												{
												$tgl_mulai=$this->m_prosestran->getDataById($tempProsesTranId)->TGLMULAI;
												$newtanggal=date('d-m-Y',strtotime($tgl_mulai));
												}else{
													$newtanggal=null;
												}
												?>
										<input type="text" value="<?php echo $newtanggal;?>"  name="<?php echo 'tgl_mulai_'.$no; ?>"  />
										Cth : 23-01-2013
									</td>
                                </tr>  
								<?php $no++;};?>


                            </tbody>
                        </table>  
					
					
                </div>
				<div class="modal-footer">
                    <button class="btn btn-primary" aria-hidden="true">Save updates</button>
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
					
                </div>
				<?php echo form_close();?>