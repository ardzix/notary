<?php
	if($this->uri->segment(3)=='updateProses')
	{
?>

<div class="row-fluid">
                        <div class="span12">
                          <div class="block">
                            <div class="head">
                              <h4>&nbsp;Silahkan pilih untuk menampilkan detail transaksi</h2>
                            </div>
                            <div class="data-fluid">
                              <table cellpadding="0" cellspacing="0" width="100%" class="table table-hover">
                                <thead>
                                  <tr>
                                    <th width="25%"> No Transaksi</th>
                                    <th width="25%"> Akta</th>
                                    <th width="25%"> Proses</th>
                                    <th width="25%"> Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($dataTranPra as $row){ ?>       
                                  <tr>
                                    <td><?= $row->NOTRANSAKSI ?></td>
                                    <td><?= $row->AKTADESC ?></td>
                                    <td><?= $row->PROSESDESC ?></td>
                                    <td><a href=#" role="button">
                                                                        <div class="icon"><span class="icon-list"></span></div>
                                                                    </a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                        </div></div>
		
<?php		
	}
	else
	{
?>		
	 <div class="row-fluid">
                        <div class="span12">
                          <div class="block">
                            <div class="head">
                              <h4>&nbsp;Silahkan pilih untuk menampilkan detail transaksi</h2>
                            </div>
                            <div class="data-fluid">
                              <table cellpadding="0" cellspacing="0" width="100%" class="table table-hover">
                                <thead>
                                  <tr>
                                    <th width="25%"> Id Pra-Realisasi</th>
                                    <th width="25%"> PIC</th>
                                    <th width="25%"> Tangal Input</th>
                                    <th width="25%"> Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($dataTranPra as $row){ ?>       
                                  <tr>
                                    <td><a href="#"><?= $row->TRANSAKSIPRAID ?></a></td>
                                    <td> <?php echo $this->model_translate->dynamicTranslate('employee','EMPLOYEEID', $this->model_translate->dynamicTranslate('transaksipra', 'TRANSAKSIPRAID', $row->TRANSAKSIPRAID , 'EMPLOYEEID'),'NAMALENGKAP');  ?> </td>
                                    <td> <?php  echo $this->model_translate->dynamicTranslate('transaksipra', 'TRANSAKSIPRAID', $row->TRANSAKSIPRAID , 'TANGGALPRA') ?> </td>
                                    <td><a href="<?= base_url() ?>proses/pra_realisasi/entry/detailTrans/<?= $row->TRANSAKSIPRAID ?>" role="button">
                                                                        <div class="icon"><span class="icon-list"></span></div>
                                                                    </a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                        </div></div>
                        
                        <?php } ?>