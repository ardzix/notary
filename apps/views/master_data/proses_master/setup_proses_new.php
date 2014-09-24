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
                                    DATA PROSES
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 46));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/proses_master/setup_proses">Data Proses</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    MASUKAN PROSES BARU
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 47));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li class="active"><a href="<?= base_url() ?>master_data/proses_master/setup_proses_new">Masukan Proses Baru</a></li>
                                        <?php
                                    }
                                    ?>

                                </ul>
                                <div class="tab-content">
                                    <div class="head green">                                 <div class="icon"><span class="ico-pen-2"></span></div>
                                        <h2>Masukan Proses Baru</h2>                                
                                    </div>
                                    <form name="setupProses" id="validate" method="post" action="<?= base_url() ?>control/add/setupProses">
                                        <div class="span6">                

                                            <div class="block">
                                                <div class="head">                                
                                                    <h2></h2>                                
                                                </div>                                        
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4">Satuan Waktu Proses:</div>
                                                        <div class="span8">
                                                            <select name="satuanwaktustd" class="select"  style="width : 100%">
                                                                <option value="0">Pilih Satuan Waktu Proses</option>
                                                                <?php
                                                                foreach ($satuanwaktustd as $row):
                                                                    ?>
                                                                    <option value="<?= $row->SATWAKTUSTDID; ?>"><?= $row->SATWAKTUDESC; ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                  
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Definisi Waktu Standard Proses:</div>
                                                        <div class="span8">
                                                            <input type="text" NAME="definisiWaktuStandar"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Nama Proses:</div>
                                                        <div class="span8">
                                                            <input id="deskripsiProses0" type="text" name="deskripsiProses"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Kantor Proses:</div>
                                                        <div class="span8">
                                                            <select name="kantorprosesid" class="select" style="width : 100%">
                                                                <?php
                                                                foreach ($kantorproses as $row):
                                                                    ?>
                                                                    <option value="<?= $row->KANTORPROSESID; ?>"><?= $row->KANTORPROSES; ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                  
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="toolbar bottom">
                                                        <div class="btn-group">
                                                            <button class="btn btn-info" type="button" onClick="$('#validate').validationEngine('hide');">Hide prompts</button>
                                                            <button class="btn" type="submit">Simpan</button>
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
                                                        <div class="span4">Satuan Waktu Alert:</div>
                                                        <div class="span8">
                                                            <select name="DEFSATALERT" class="select" style="width : 100%">
                                                                <option value="0">Pilih Satuan Waktu Alert</option>
                                                                <?php
                                                                foreach ($satuanwaktustd as $row):
                                                                    ?>
                                                                    <option value="<?= $row->SATWAKTUSTDID; ?>"><?= $row->SATWAKTUDESC; ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                  
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Definisi Standard Alert PIC:</div>
                                                        <div class="span8">
                                                            <input type="text" NAME="definisiGambarPeringatan"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Definisi Standard Alert Supervisor:</div>
                                                        <div class="span8">
                                                            <input type="text" NAME="definisiProsesSPV"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Definisi Biaya Proses:</div>
                                                        <div class="span8">
                                                            <input type="text" NAME="definisiBiayaProses"/>
                                                        </div>
                                                    </div>
                                                    <div class="row-form">
                                                        <div class="span4">Definisi Biaya Drop:</div>
                                                        <div class="span8">
                                                            <input type="text" NAME="definisiBiayaDrop"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


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
        </div>
    </body>
</html>

<script language="javascript">

    $("#prosesDocButton").click(function() {

        var InvForm = document.forms.prosesDoc;
        var msVal;
        var x, y = 0;

        for (x = 0; x < InvForm.ms.length; x++)
        {
            if (InvForm.ms[x].selected)
            {
                if (y == 0)
                    msVal = InvForm.ms[x].value;
                else
                    msVal = msVal + "," + InvForm.ms[x].value;
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
