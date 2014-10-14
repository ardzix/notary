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
                        <a href="#" class="button" onClick="document.location='<?= base_url() ?>proses/pra_realisasi/entry'">
                            <div class="icon">
                                <span class="ico-arrow-left"></span>
                            </div>
                        </a>
                        <h1>Detail Transaksi<small> Pra-Realisasi</small></h1>
                    </div>


                    <div class="row-fluid" id="prosesTranContent">
                        <div class="span12">
                            <div class="block">

                                <div class="span12">

                                    <div class="head dblue">
                                        <div class="icon"><span class="ico-layout-9"></span></div>
                                        <h2>Data Proses</h2>
                                        <ul class="buttons">
                                            <li><a href="#" onClick="source('table_sort_pagination'); return false;"></a></li>
                                        </ul>                                                        
                                    </div>                
                                    <div class="data-fluid">
                                        <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Akta</th>
                                                    <th>Dokumen</th>
                                                    <!--<th width="50" class="TAC">Actions</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php foreach ($dataTableProses as $row) { ?>       
                                                    <tr>
                                                        <td><a href="#"><?php echo $this->model_translate->dynamicTranslate('akta', 'AKTAID', $row->AKTAID, 'AKTADESC'); ?></a></td>
                                                        <td>
                                                            <?php
                                                            foreach ($this->model_core->getDataSpecifiedWthWhere(
                                                                    'prosesdoc', array('TIPEDOKUMENID'), array('AKTAID', $row->AKTAID))
                                                            as $row2) {


                                                                $data = array('dokumen', array('DOKUMENID', 'SCANNEDDOKFILE'));
                                                                $where = array(array('TRANSAKSIPRAID', $row->TRANSAKSIPRAID), array('TIPEDOKUMENID', $row2->TIPEDOKUMENID));
                                                                $qryDoc = $this->model_core->getDataSpecifiedWthWhere2($data, $where);

                                                                $descDoc = $this->model_translate->dynamicTranslate('tipedokumen', 'TIPEDOKUMENID', $row2->TIPEDOKUMENID, 'TIPEDOKDESC');
                                                                ;
                                                                $rowGet = 0;
                                                                foreach ($qryDoc as $row3) {
                                                                    $rowGet++;
                                                                    $dokId = $row3->DOKUMENID;
                                                                    $dokFile = explode(';', $row3->SCANNEDDOKFILE);
                                                                }
                                                                ?> 
                                                                <a  role="button"  data-toggle="modal" href="<?php
                                                        if ($rowGet > 0)
                                                            echo base_url() . "assets/docs/" . str_replace(' ','_',$dokFile[0]); //pake info
                                                        else
                                                            echo '#fModal';
                                                                ?>"  <?php
																echo 'onClick="';
														 if ($rowGet > 0)	
														 {
															 
                                                           echo "modalToogler('"; echo $this->model_translate->dynamicTranslate('akta', 'AKTAID', $row->AKTAID, 'AKTADESC'); ?>','<?php echo $descDoc; ?><?php echo "')";?><?php echo'"';
                                                            
														 }
														 else
														 {
                                                          echo   "addDocProsesTran(";?><?= $row2->TIPEDOKUMENID ?>
                                                            <?php echo ')"';
														 }
																?> target="_blank" class="label label-<?php
                                                        if ($rowGet > 0)
                                                            echo "info"; //pake info
                                                        else
                                                            echo "important btn";
                                                                ?> tip" data-original-title="<?php
                                                           if ($rowGet > 0)
                                                               echo 'Klik untuk melihat dokumen';
                                                           else
                                                               echo "Klik untuk menambahkan dokumen";
                                                                ?>" ><span class="<?php
                                                           if ($rowGet > 0)
                                                               echo 'ico-download-alt';
                                                           else
                                                               echo "ico-upload-alt";
                                                                ?> icon-white"></span><?php echo $descDoc; ?></a>
                                                                   <?php } ?>

                                                        </td>
<!--                                                        <td>
                                                            <a href="#" role="button"  class="button purple tip" onClick="deleteProsesTran(<?= $row->AKTATRANID ?>)" >
                                                                <div class="icon"><span class="ico-remove"></span></div>
                                                            </a>

                                                        </td>-->
                                                    </tr>
<?php } ?>                                                            
                                            </tbody>
                                        </table>       

                                  </div> 


<!--                                    <div class="data-fluid">
                                        <div class="span10">
                                        </div>
                                        <div class="span2" align="right">
                                            <a href="#fModal2" role="button" class="btn btn-success" data-toggle="modal"><span class="ico-pencil"></span>&nbsp;&nbsp;Proses baru</a>
                                        </div></div>-->


                                    <div class="data-fluid">
                                        <div class="span4">
                                            <span class="label label-info"><i>*) Untuk dokumen yang telah diunggah</i></span>
                                        </div></div>

                                    <div class="data-fluid">
                                        <div class="span4">
                                            <span class="label label-important"><i>*) Untuk dokumen yang belum diunggah</i></span>
                                        </div>

                                    </div>
                                </div>
                                
                                
                             
                            </div> 
                        </div>
<?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>
    </body>
	
    <div id="fModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
    
<form name="addProsesDetailTrans" action="<?= base_url() ?>control/add/addProsesDetailTrans" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModal2Labels">Modal form</h3>
        </div>        
        <div class="row-fluid">
            <div class="block-fluid">
                <div class="row-form">
                    <div class="span12">
                        <span class="top title"><br>
                            Pilih Poses:<br>
                        </span><select class="select" id="prosesId" name="prosesId" >
                                        <?php     foreach ($akta as $row):
                                                                        ?>
                                        <option value="<?= $row->AKTAID; ?>">
                                          <?= $row->AKTADESC; ?>
                                        </option>
                                        <?php
endforeach;
?>
                                      </select>   
                                      <input name="transId" type="hidden" value="<?php echo $this->uri->segment(5); ?>">                  
                    </div>
                </div>
            </div>
        </div>                   
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Save updates</button> 
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
        </div>
        </form>
    </div>

    <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form name="addProsesDetailTrans" action="<?= base_url() ?>control/add/addDocDetailTrans" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabels">Modal form</h3>
        </div>        
        <div class="row-fluid">
            <div class="block-fluid">
                <div class="row-form">
                    <div class="span12">
                        <span class="top title"><br>
                            Pilih file dokumen:<br>
                        </span><input name="dokumen" type="file">  
                        
                        <input name="transId" type="hidden" value="<?php echo $this->uri->segment(5); ?>">     
                        <input name="tipeDokId" id="tipeDokId" type="hidden" value="">                       
                    </div>
                </div>
            </div>
        </div>                   
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Save updates</button> 
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
        </div>
        </form>
    </div>
    
    
</html>


<script language="javascript">

    function modalToogler(prosesId,tipeDocId)
    {
        document.getElementById('myModalLabels').innerHTML="Form unggah dokumen <b>"+tipeDocId+"</b> untuk proses <b>"+prosesId+"</b>";
    }
    function addDocProsesTran(tipeDocId)
    {
		document.getElementById('tipeDokId').value=tipeDocId;
    }
	
	function addDocProsesTranSubmit()
	{
		 if (confirm('Apakah anda ykin ingin menghapus proses ini?')) {
		         $.ajax({
					type: "POST",
					url : "<?= base_url() ?>control/delete/delProsesTran",
					success: function(msg){
						$('#prosesTranContent').html(msg);
				}
			});	
			document.location="<?= base_url() ?>proses/pra_realisasi/detailTrans/<?php echo $this->uri->segment(5); ?>";
		} else {
			// Do nothing!
		}

	}
	
	function deleteProsesTran(id)
	{
		 var data = {prosesTranId:id};
		 if (confirm('Apakah anda ykin ingin menghapus proses ini?')) {
		         $.ajax({
					type: "POST",
					url : "<?= base_url() ?>control/delete/delProsesTran",
					data: data,
					success: function(msg){
						$('#prosesTranContent').html(msg);
				}
			});	
			document.location="<?= base_url() ?>proses/pra_realisasi/entry/detailTrans/<?php echo $this->uri->segment(5); ?>";
		} else {
			// Do nothing!
		}

	}
</script>
