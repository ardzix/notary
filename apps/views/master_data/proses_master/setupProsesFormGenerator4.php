<?php 

$this->load->model('model_core');
$parent = $this->model_core->getDataSpecifiedWthWhere('proses',array('PROSESID', 'PROSESDESC'),array('PROSESPARENT',$_POST['values']));

 ?>
                                    <div class="row-form">
                                      <div class="span4">Buat proses pada level ini:</div>
                                      <div class="span8">
                                        <input id="deskripsiProses5" type="text" name="deskripsiProses5"/>
                                        <span class="bottom">Wajib diisi jika ingin membuat proses pada level 6</span></div>
                                    </div>
                                    