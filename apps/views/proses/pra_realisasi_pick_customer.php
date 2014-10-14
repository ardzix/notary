<?php
/*
 * Project Name: notary
 * File Name: pra_realisasi_pick_customer_old
 * Created on: 23 Jan 14 - 15:39:21
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>

        <script type='text/javascript'>
            function showDiv() {
                document.getElementById('upload_doc').style.visibility = "visible";
            }
        </script>
    </head>

    <body> 
        <?php
        if ($this->uri->segment(5) == 'error') {
            ?>
            <script>
                alert("Nomor transaksi telah digunakan");
            </script>
            <?php
        }
        ?>
<!--        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div> -->
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data Pra Realisasi berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Proses<small> Pra-Realisasi</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="head">
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('tabs');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                
                                </div>  
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <!-----------------------------------------------------------
                                        DAFTAR TRANSAKSI CUSTOMER 
                                        ----------------------------------------------------------->
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 17));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/entry">Daftar Transaksi Customer</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Transaksi Baru
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 18));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/entry/newTrans">Transaksi Baru</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Input Semua
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 19));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/input_all/transaksi">Input semua</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Validasi Dokumen
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 20));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/validasi">Validasi Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Monitoring Dokumen
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 21));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/monitoring_dokumen">Monitoring Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Drop Pra-Realisasi
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 22));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/drop">Drop Pra-Realisasi</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>  
                                    <div class="tab-content">
                                        <div class="span12">         
                                            <div class="data-fluid">
                                                <form name="praRealisasi" action="<?= base_url() ?>control/add/praRealisasi" method="post" enctype="multipart/form-data">
                                                    <div class="row-fluid">

                                                        <div class="span6"> 
                                                            <div class="block">
                                                                <div class="head">                                
                                                                    <h2>Proses Transaksi Baru</h2>
                                                                </div>                                        
                                                                <div class="data-fluid">
                                                                    <div class="row-form">
                                                                        <div class="span4">No Transaksi:</div>
                                                                        <div class="span8">
                                                                            <input type="text" id="noTran" name="noTran">
                                                                            <span class="bottom">Silahkan masukan nomor transkasi</span> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4">Customer :</div>
                                                                        <div class="span8">
                                                                            <select id='custSelector' multiple="multiple" class="select" style="width: 100%;">
                                                                                <option value="0">choose a option...</option>
                                                                                <?php foreach ($dataTableCustomer as $row) { ?>
                                                                                    <option value="<?= $row->CUSTOMERID ?>"><?= $row->NAMACUST; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                            <input type="hidden" id="custId" name="custId">
                                                                            <span class="bottom">Silahkan pilih satu atau beberapa customer</span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4"></div>
                                                                        <div class="span8">
                                                                            <a data-toggle="modal" class="btn" role="button" href="#gModal">Tambah</a>
                                                                            <span class="bottom">klik tambah untuk memasukan customer baru</span></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4">PIC :</div>
                                                                        <div class="span8">
                                                                            <select class="select" id="employeeId" name="employeeId" style="width:100%" >
                                                                                <?php
                                                                                foreach ($pic as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->EMPLOYEEID; ?>">
                                                                                        <?= $row->NAMALENGKAP; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select>
                                                                            <span class="bottom">Pilih PIC untuk mengurus realisasi ini</span></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4">Supervisor :</div>
                                                                        <div class="span8">
                                                                            <select class="select" id="spv" name="spv" style="width:100%" >
                                                                                <?php
                                                                                foreach ($spv as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->EMPLOYEEID; ?>">
                                                                                        <?= $row->NAMALENGKAP; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select>
                                                                            <span class="bottom">Pilih Supervisor untuk mengurus realisasi ini</span></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4">Notaris :</div>
                                                                        <div class="span8">
                                                                            <select class="select" id="notaris" name="NOTARIS" >
                                                                                <?php
                                                                                foreach ($notaris as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->EMPLOYEEID; ?>">
                                                                                        <?= $row->NAMALENGKAP; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select>
                                                                            <span class="bottom">Pilih Supervisor untuk mengurus realisasi ini</span></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4">Developer :</div>
                                                                        <div class="span8">
                                                                            <select class="select" id="developerId" name="developerId" style="width:100%" >
                                                                                <option value="">Masukan Developer</option>
                                                                                <?php
                                                                                foreach ($developer as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->DEVELOPERID; ?>">
                                                                                        <?= $row->DEVELOPERDESC; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select>
                                                                            <span class="bottom">Pilih developer untuk realisasi ini</span></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4"></div>
                                                                        <div class="span8">
                                                                            <a data-toggle="modal" class="btn" role="button" href="#fModal">Tambah</a>
                                                                            <span class="bottom">klik tambah untuk memasukan developer baru</span></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4">Bank :</div>
                                                                        <div class="span8">
                                                                            <select class="select" id="bankId" name="bankId" style="width:100%" >
                                                                                <?php
                                                                                foreach ($bank as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->BANKREKID; ?>">
                                                                                        <?= $row->BANKREKDESC; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select>
                                                                            <span class="bottom">Pilih bank untuk realisasi ini</span></div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span4">Status Pajak :</div>
                                                                        <div class="span8">
                                                                            <select class="select"  name="statusPajakId" >
                                                                                <?php
                                                                                foreach ($stsPajak as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->STATUSPJKID; ?>">
                                                                                        <?= $row->STATUSPJKDESC; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select>
                                                                            <span class="bottom">Status pajak untuk realisasi ini</span> </div>
                                                                    </div>
                                                                    <!--                                                                    <div class="row-form">
                                                                                                                                            <div class="span4">Status Bayar :</div>
                                                                                                                                            <div class="span8">
                                                                                                                                                <select class="select" name="statusBayar" >
                                                                    <?php /* foreach ($stsBayar as $row):
                                                                      ?>
                                                                      <option value="<?= $row->STATUSBYR; ?>">
                                                                      <?= $row->STATUSBYRDESC; ?>
                                                                      </option>
                                                                      <?php
                                                                      endforeach;
                                                                     */ ?>
                                                                                                                                                </select>
                                                                                                                                                <span class="bottom">Status bayar untuk realisasi ini</span> </div>
                                                                                                                                        </div>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="span6">
                                                            <br>
                                                            <br>
                                                            <div class="row-form">
                                                                <div class="span4">Pilih Akta :</div>
                                                                <div class="span8">
                                                                    <select id='canselect_code' name='canselect_code' multiple>
                                                                        <?php
                                                                        foreach ($akta as $row):
                                                                            ?>
                                                                            <option value="<?= $row->AKTAID; ?>">
                                                                                <?= $row->AKTADESC; ?>
                                                                            </option>
                                                                            <?php
                                                                        endforeach;
                                                                        ?>
                                                                    </select>
                                                                    <input class='btn' type='button' id='btnRight_code' value='  masukkan  ' />
                                                                    <input class='btn' type='button' id='btnLeft_code' value='  batalkan  ' />
                                                                    <select id='isselect_code' name="akta[]" multiple="multiple">

                                                                    </select>
                                                                </div>
                                                                <div class="row-form">
                                                                    <div class="span4"></div>
                                                                    <div class="span8">
                                                                        <br>
                                                                        <button type="button" class="btn" id="docGenerator" align="">Tampilkan List Dokumen</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="layoutDocSelector" style="visibility:hidden">                

                                                                <div class="block">
                                                                    <div class="data-fluid">
                                                                        <div class="row-form">
                                                                            <div class="span12">
                                                                                <span  class="top title">Dokumen yang diserahkan:</span>
                                                                                <select name="ms_example2" multiple="multiple" id="msDoc">

                                                                                </select> <span class="bottom">Pilih dokumen yang sudah siap untuk diunggah(tekan tombol `Ctrl` untuk memilih beberapa)<br>
                                                                                    <i>*) Lewati proses ini jika tidak ada dokumen yg akan diunggah</i>
                                                                                </span>
                                                                                <div class="btn-group">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="toolbar bottom tar">
                                                                            <div class="btn-group">
                                                                                <button type="button" class="btn" id="uploadGenerator">Tampilkan Proses Upload File</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div id="upload_doc"  style="visibility: hidden">
                                                            <div class="span12">  
                                                                <div class="block">
                                                                    <div class="head green">
                                                                        <div class="icon"><span class="ico-brush"></span></div>
                                                                        <h2>File dokumen yang diserahkan:</h2>    
                                                                        <ul class="buttons">
                                                                            <li><a onclick="source('table_hover_check');
                                                                                    return false;" href="#"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                                        </ul>                                                          
                                                                    </div>                
                                                                    <div class="data-fluid">
                                                                        <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover">
                                                                            <thead>
                                                                                <tr class="">
                                                                                    <th width="10%">No.</th>
                                                                                    <th width="20%">Jenis Dokumen</th>

                                                                                    <th width="25%">File yang diizinkan</th>
                                                                                    <th width="35%" id="tengah">Scanned File</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="tableUploadRow">          
                                                                            </tbody>
                                                                        </table>
                                                                    </div>                
                                                                </div>
                                                            </div>

                                                            <div class="span3" id="submitButton" style="visibility:hidden">

                                                                <input name="prosesSelected" id="prosesSelected" type="hidden" value="">
                                                                <input name="docSelected" id="docSelected" type="hidden" value="">  
                                                                <div class="btn-group">
                                                                    <button class="btn" type="submit">simpan</button>
                                                                </div>
                                                                <!--                                                                <div class="btn-group">
                                                                                                                                    <button class="btn">print</button>
                                                                                                                                </div>-->
                                                            </div>
                                                        </div>    
                                                    </div>
                                                </form>
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
            <!-- Bootrstrap modal form -->
            <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Input Developer Baru</h3>
                </div>        
                <div class="row-fluid">
                    <form method="POST" action="<?= base_url() ?>control/add/developer">
                        <div class="block-fluid">
                            <div class="row-form">
                                <div class="span12">
                                    <span class="top title">Nama Developer:</span>
                                    <input type="text" name="DEVELOPERDESC"/>                        
                                </div>
                            </div>
                        </div>                   
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Save updates</button> 
                            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
                        </div>
                    </form>
                </div>
            </div>
            <!-- Bootrstrap modal form -->
            <div id="gModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Input Cutomer Baru</h3>
                </div>        
                <div class="row-fluid">
                    <form method="POST" action="<?= base_url() ?>control/add/customer_baru2">
                        <div class="block-fluid">
                            <div class="row-form">
                                <div class="span4">Nama Customer:</div>
                                <div class="span8">
                                    <input type="text" name="NAMACUST"/>                        
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span4">Tipe Customer :</div>
                                <div class="span8">
                                    <select class="select" id="TIPECUSTID" name="TIPECUSTID" style="width:100%" >
                                        <?php
                                        foreach ($tipecustomer as $row):
                                            ?>
                                            <option value="<?= $row->TIPECUSTID; ?>">
                                                <?= $row->TIPECUSTDESC; ?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <span class="bottom">Pilih tipe customer</span></div>
                            </div>
                            <div class="row-form">
                                <div class="span4">Nomer Identitas:</div>
                                <div class="span8">
                                    <input type="text" name="NOIDPERSONALCUST"/>                        
                                </div>
                            </div>
                        </div>                   
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Save updates</button> 
                            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>

<script language="javascript">

    $("#custSelector").click(function() {
        var InvForm = document.forms.praRealisasi;
        var custIdVal;
        var x, y = 0;

        for (x = 0; x < InvForm.custSelector.length; x++)
        {
            if (InvForm.custSelector[x].selected)
            {
                if (y == 0)
                    custIdVal = InvForm.custSelector[x].value;
                else
                    custIdVal = custIdVal + "," + InvForm.custSelector[x].value;
                y++;
            }

        }

        document.getElementById('custId').value = custIdVal;

    });

    $("#uploadGenerator").click(function() {
        var InvForm = document.forms.praRealisasi;
        var msDocVal;
        var x, y = 0;

        for (x = 0; x < InvForm.msDoc.length; x++)
        {
            if (InvForm.msDoc[x].selected)
            {
                if (y == 0)
                    msDocVal = InvForm.msDoc[x].value;
                else
                    msDocVal = msDocVal + "," + InvForm.msDoc[x].value;
                y++;
            }

        }
        var data = {values: msDocVal, index: y};
        document.getElementById('docSelected').value = msDocVal;

        if (y > 0)
        {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>proses/pra_realisasi/entry/pick_customer_uploadRow",
                data: data,
                success: function(msg) {
                    $('#tableUploadRow').html(msg);
                }
            });

            showDiv();
        }
        else
        {
            alert("Mohon pilih minimal satu dokumen");
            document.getElementById('upload_doc').style.visibility = "hidden";
        }
    });




    $("#docGenerator").click(function() {


        var InvForm = document.forms.praRealisasi;
        var msVal;
        var x, y = 0;

        for (x = 0; x < InvForm.isselect_code.length; x++)
        {
            if (InvForm.isselect_code[x].selected)
            {
                if (y == 0)
                    msVal = InvForm.isselect_code[x].value;
                else
                    msVal = msVal + "," + InvForm.isselect_code[x].value;
                y++;
            }

        }
        var data = {values: msVal, index: y};
        document.getElementById('prosesSelected').value = msVal;
        if (y > 0)
        {
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>proses/pra_realisasi/entry/selectTipeDokumen",
                data: data,
                success: function(msg) {
                    $('#msDoc').html(msg);
                }
            });
            document.getElementById('layoutDocSelector').style.visibility = "visible";
            document.getElementById('submitButton').style.visibility = "visible";

        }
        else
        {
            alert("Mohon pilih minimal satu dokumen");
            document.getElementById('layoutDocSelector').style.visibility = "hidden";
            document.getElementById('upload_doc').style.visibility = "hidden";
            document.getElementById('submitButton').style.visibility = "hidden";
        }
    });

    //tambah multiple select
    $('[id^=\"btnRight\"]').click(function(e) {

        $(this).prev('select').find('option:selected').clone().appendTo('#isselect_code');

    });

    $('[id^=\"btnLeft\"]').click(function(e) {

        $(this).next('select').find('option:selected').remove();

    });
</script>

