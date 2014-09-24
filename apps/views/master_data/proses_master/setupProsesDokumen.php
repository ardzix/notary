<?php
/*
 * Project Name: notary
 * File Name: setup_proses
 * File Directory: Expression filedir is undefined on line 5, column 22 in Templates/Scripting/EmptyPHP.php.
 * Created on: 08 Jan 14 - 9:44:21
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/jquery.validationEngine.js'></script>
    </head>

    <body>    
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header"><a href="#" class="button" onClick="document.location = '<?= base_url() ?>master_data/proses_master'">
                            <div class="icon">
                                <span class="ico-arrow-left"></span>
                            </div>
                        </a>
                        <h1>Proses Master<small> Setup Proses</small></h1>
                    </div>
                    <div class="row-fluid">
                        <div class="block">
                            <div class="head">
                                <h2>Setup Proses</h2>
                                <ul class="buttons">
                                    <li><a href="#" onClick="source('tabs');
                                            return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                </ul>                                
                            </div>  
                            <div class="data-fluid tabbable">                    
                                <ul class="nav nav-tabs">
                                    <!-----------------------------------------------------------
                                    SETUP AKTA
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 54));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/proses_master/setup_akta">Setup Akta</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    SETUP AKTA DOKUMEN
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 48));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li class="active"><a href="<?php echo base_url(); ?>master_data/proses_master/setup_akta/setup_dokumen">Setup Akta Dokumen</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="tab-content">
                                    <div class="head green">                                 <div class="icon"><span class="ico-pen-2"></span></div>
                                        <h2>Masukan Proses Baru</h2>                                
                                    </div>
                                    <form name="prosesDoc" id="validate" method="post" action="<?= base_url() ?>control/add/prosesDoc2">
                                        <div class="span6">                

                                            <div class="block">
                                                <div class="head">                                
                                                    <h2></h2>                                
                                                </div>                                        
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4"> Pilih Proses:</div>
                                                        <div class="span8">
                                                            <select name="proses" class="select" style="width: 100%" >
                                                                <option value="0">Pilih Proses</option>
                                                                <?php
                                                                foreach ($proses as $row):
                                                                    ?>
                                                                    <option value="<?= $row->AKTAID; ?>"><?= $row->AKTADESC; ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                  
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="span6">   
                                            <div class="block">
                                                <div class="head">                                
                                                    <h2>&nbsp;</h2>                                
                                                </div>  
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4">Tipe Dokumen:</div>
                                                        <div class="span8">
                                                            <select name="tipeDokumen[]" multiple id="tipeDokumen">
                                                                <?php
                                                                foreach ($dataTableTipeDokumen as $row):
                                                                    ?>
                                                                    <option value="<?= $row->TIPEDOKUMENID ?>">
                                                                        <?= $row->TIPEDOKDESC ?>
                                                                    </option>
                                                                    <?php
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                                            <button class="btn" type="button" id="prosesDocButton">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>&nbsp;
                    <br/>&nbsp;
                    <br/>&nbsp;
                    <br/>&nbsp;
                    <br/>&nbsp;
                    <br/>&nbsp;
                    <br/>&nbsp;
                    <?= $this->load->view('slice/tambal'); ?>
                </div>
            </div>
        </div>
        <script language="javascript">

            $("#prosesDocButton").click(function() {

                var InvForm = document.forms.prosesDoc;
                var tipeDokumenVal;
                var x, y = 0;

                for (x = 0; x < InvForm.tipeDokumen.length; x++)
                {
                    if (InvForm.tipeDokumen[x].selected)
                    {
                        if (y == 0)
                            tipeDokumenVal = InvForm.tipeDokumen[x].value;
                        else
                            tipeDokumenVal = tipeDokumenVal + "," + InvForm.tipeDokumen[x].value;
                        y++;
                    }

                }
                if (y > 0)
                {
                    InvForm.submit();
                }
                else
                {
                    alert("Mohon pilih minimal satu dokumen");
                    document.getElementById('upload_doc').style.visibility = "hidden";
                }
            });


            $("#parent0").change(function() {

                var comboValue = document.getElementById("parent0").value;
                var data = {values: comboValue};
                //		alert(comboValue);


                if (comboValue != 0)
                {
                    document.getElementById("deskripsiProses0").disabled = true;
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>master_data/proses_master/setupProsesFormGenerator",
                        data: data,
                        success: function(msg) {
                            $('#formGenerated').html(msg);
                        }
                    });

                    $('#formGenerated1').html("");
                    $('#formGenerated2').html("");
                    $('#formGenerated3').html("");
                    $('#formGenerated4').html("");
                }
                else
                {
                    $('#formGenerated').html("");
                    $('#formGenerated1').html("");
                    $('#formGenerated2').html("");
                    $('#formGenerated3').html("");
                    $('#formGenerated4').html("");
                    document.getElementById("deskripsiProses0").disabled = false;
                }
            });
        </script>
    </body>
</html>