 <?php $this->load->view('slice/header-content'); ?>
	   <script type='text/javascript' src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel" align="center">Data Realisasi</h3>
           </div>
	<div class="modal-body" id="myModalBody">
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
														Status
													</th>
                                                                
                                                    <th width="20%" class="TAC">
														Actions
													</th>
                                                </tr>
                                            </thead>
                                            
											<tbody>
											<?php 	$no=1;
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
															<?php echo $pt->CURRENTPROSES;?>
														</td>	
														<td>
                                                            <a href="#" class="button purple tip" data-original-title="Detail">
																<div class="icon"><span class="icon-list"></span></div>
															</a>
														</td>
                                                     </tr>
											<?php $no++;}; ?>
                                            </tbody>
                                        </table>                    
                               
                        
					
					
                </div>
				<div class="modal-footer">
                    
                </div>