<?php
/*
 * Project Name: notary
 * File Name: pra_realisasi
 * Created on: 09 Jan 14 - 9:25:13
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <!-- jquery untuk handle table -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>

        <!-- jquery validation engine -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/jquery.validationEngine.js'></script>
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
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Proses<small> Pra-Realisasi Detail untuk customer <?php
                        
						echo $customer;
						?></small></h1>
                    </div>
                  <div class="row-fluid">

                    <div class="span6">                

                      <div class="block">
                        <div class="head">                                
                          <h2>Detail untuk proses <?php echo $proses; ?></h2>
                          </div>                                               
                        <form id="validate" method="POST" action="<?= base_url() ?>control/add/praRealisasiDetail">
                            <div class="data-fluid">
                              <div class="row-form">
                                <div class="span4">Waktu Proses Transaksi:</div>
                                <div class="span5">
                                  <input type="text" name="waktuProses" class="validate[required]"/>
                                  <span class="bottom">Required, </span></div>
                                <div class="span3">
                  <select name="satuanwaktustd" >
                                    <?php
                                                                    foreach ($satuanwaktustd as $row):
                                                                        ?>
                                    <option value="<?= $row->SATWAKTUSTDID; ?>">
                                      <?= $row->SATWAKTUDESC; ?>
                                    </option>
                                    <?php
endforeach;
?>
                                  </select></div>
                              </div>
                              <div class="row-form">
                                <div class="span4">Alert terhadap PIC:</div>
                                <div class="span5">
                                  <input type="text" name="picAlert" class="validate[required]"/>
                                  <span class="bottom">Required,</span></div>
                                <div class="span3">
                              <select name="satuanwaktustd2" >
                                    <?php
                                                                    foreach ($satuanwaktustd as $row):
                                                                        ?>
                                    <option value="<?= $row->SATWAKTUSTDID; ?>">
                                      <?= $row->SATWAKTUDESC; ?>
                                    </option>
                                    <?php
endforeach;
?>
                                </select></div>
                              </div>
                              <div class="row-form">
                                <div class="span4">Alert terhadap Supervisor:</div>
                                <div class="span5">
                                  <input type="text" name="spvAlert" class="validate[required]"/>
                                  <span class="bottom">Required, </span></div>
                                <div class="span3">
                                  <select name="satuanwaktustd3" >
                                    <?php
                                                                    foreach ($satuanwaktustd as $row):
                                                                        ?>
                                    <option value="<?= $row->SATWAKTUSTDID; ?>">
                                      <?= $row->SATWAKTUDESC; ?>
                                    </option>
                                    <?php
endforeach;
?>
                                  </select>
                                </div>
                              </div>
                              <div class="row-form">
                                <div class="span4">Biaya Proses Transaksi:</div>
                                <div class="span8">
                                  <input type="text" name="biayaProses" class="validate[required]"/>
                                  <span class="bottom">Required,</span></div>
                              </div>
                              <div class="row-form">
                                <div class="span4">Biaya Drop Transaksi:</div>
                                <div class="span8">
                                  <input type="text" name="biayaDrop"/>
                                </div>
                              </div>
                              <div class="toolbar bottom tar">
                                    <div class="btn-group"><input name="transId" type="hidden" value="<?php echo $tranId; ?>"><input name="custId" type="hidden" value="<?php echo $custId; ?>"> <input name="prosesId" type="hidden" value="<?php echo $prosesId[0]; ?>"> <input name="impProsesId" type="hidden" value="<?php echo $impProsesId; ?>">
                                        <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                        <button class="btn" type="submit">Submit</button>
                                </div>
                              </div>

                          </div>  
                          
                                        
                        </form>
                        </div>
                    </div>
                    <div class="span4">
                      <div class="block">
                        <div class="head"> </div>
                        </div>
                    </div>

                </div>                 
                

            </div>
                                </div>
                            </div> 
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </body>
    
    
</html>
