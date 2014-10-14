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
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/form.js'></script>
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
                                            <li><a href="<?= base_url() ?>proses/pra_realisasi/entry/newTrans">Transaksi Baru</a></li>
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
                                            <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/input_all/transaksi">Input semua</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        Input Data
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 56));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>proses/pra_realisasi/input_data">Input semua</a></li>
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
                                                <form name="praRealisasi" action="<?= base_url() ?>control/add/input_data" method="post">
                                                    <div class="row-fluid">

                                                        <div class="span12"> 
                                                            <div class="block">
                                                                <div class="head">                                
                                                                    <h2>Proses Transaksi Baru</h2>
                                                                </div>                                        
                                                                <div class="data-fluid">
                                                                    <span id="myForm">
                                                                    </span>
                                                                    <div class="row-form">
                                                                        <div class="span2">No Covernote:</div>
                                                                        <div class="span4">
                                                                            <input type="text" name="noCovernote"> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Notaris:</div>
                                                                        <div class="span4">
                                                                            <select class="select" id="notaris" name="notaris" style="width:100%">
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
                                                                        </div>
                                                                    </div>

                                                                    <div class="row-form">
                                                                        <div class="span2">Developer:</div>
                                                                        <div class="span4">
                                                                            <select class="select" id="developerId" name="developerId" style="width:100%" >
                                                                                <option value="0">Masukan Developer</option>
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
                                                                        </div>
                                                                        <div class="span1">
                                                                            <a data-toggle="modal" class="btn" role="button" href="#fModal">Tambah</a>
                                                                        </div>
                                                                    </div> 

                                                                    <div class="row-form">
                                                                        <div class="span2">Nama Debitur:</div>
                                                                        <div class="span4">
                                                                            <select id='custSelector' multiple="multiple" class="select" style="width: 100%;">
                                                                                <option value="0">choose a option...</option>
                                                                                <?php foreach ($customer as $row) { ?>
                                                                                    <option value="<?= $row->CUSTOMERID ?>"><?= $row->NAMACUST; ?></option>
                                                                                <?php } ?>
                                                                            </select> 
                                                                            <input type="hidden" id="custId" name="debitur">
                                                                        </div>
                                                                        <div class="span1">
                                                                            <a data-toggle="modal" class="btn" role="button" href="#gModal">Tambah</a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row-form">
                                                                        <div class="span2">Tanggal Akad:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="" id="tglMulaiCovernote" name="tgl_akad" class="dp1" /></div>
                                                                    </div>

                                                                    <div class="row-form">
                                                                        <div class="span2">Jangka Waktu Covernote:</div>
                                                                        <div class="span2">
                                                                            <input type="text" value="" id="jangkaWaktu" /> 
                                                                        </div> 
                                                                        <div class="span2">
                                                                            <select class="select" id="satwaktujangka" style="width:100%" >
                                                                                <?php
                                                                                foreach ($satuanwaktu as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->KONVERSI; ?>">
                                                                                        <?= $row->SATWAKTUDESC; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select> 
                                                                        </div> 
                                                                        <div class="span1">
                                                                            <a data-toggle="modal" class="btn" role="button" style="width:75%" onclick="setDeadlineCovernote()">Set</a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row-form">
                                                                        <div class="span2">Tanggal Deadline Covernote:</div>
                                                                        <div class="span4">
                                                                            <input type="text" value="" id="deadlineCovernote" name="dlncovernote" class="dp1" /> </div>  
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Bank:</div>
                                                                        <div class="span4">
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
                                                                        </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Status Pajak:</div>
                                                                        <div class="span4">
                                                                            <select class="select"  name="statusPajakId" style="width:100%" >
                                                                                <?php
                                                                                foreach ($stsPajak as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->STATUSPJKID; ?>">
                                                                                        <?= $row->STATUSPJKDESC; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Penanggung Jawab:</div>
                                                                        <div class="span4">
                                                                            <select class="select" name="employeeId" style="width:100%">
                                                                                <?php
                                                                                foreach ($pic as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->EMPLOYEEID; ?>">
                                                                                        <?= $row->NAMALENGKAP; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Supervisor:</div>
                                                                        <div class="span4">
                                                                            <select class="select" name="spv" style="width:100%">
                                                                                <?php
                                                                                foreach ($spv as $row):
                                                                                    ?>
                                                                                    <option value="<?= $row->EMPLOYEEID; ?>">
                                                                                        <?= $row->NAMALENGKAP; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                endforeach;
                                                                                ?>
                                                                            </select> </div>
                                                                    </div>

                                                                    <div class="row-form">
                                                                        <div class="span2">Akta :</div>
                                                                        <div class="span1">
                                                                            <a class="button yellow tip jDialog_form_button" id="btnAddAkta" >
                                                                                <div class="icon"><span class="icon-plus-sign "></span></div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="akta">
                                                                        
                                                                    </div>
                                                                    <div class="row-form">
                                                                        <div class="span2">Biaya:</div>
                                                                        <div class="span4">
                                                                            <input type="text" name="biaya"> </div>
                                                                    </div>
                                                                    <div class="toolbar bottom">
                                                                        <div class="btn-group">
                                                                            <button type="submit" class="btn">Simpan</button>
                                                                        </div>
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
                            </div> 
                        </div>
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>

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


        <div id="gModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Input Cutomer Baru</h3>
            </div>        
            <div class="row-fluid">
                <form method="POST" action="<?= base_url() ?>control/add/customer_baru3">
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
                            <div class="span4">Nama Badan Usaha:</div>
                            <div class="span8">
                                <input type="text" name="NAMAPERUSAHAAN"/>
                                <span class="bottom">Kosongkan jika tipe ini costumer pribadi</span>
                            </div>
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
    <script>
        $(document).ready(function() {

            $('#btnAddAkta').click(function() {
                var num = $('.cloneAkta').length; // how many "duplicatable" input fields we currently have
                var newNum = new Number(num + 1);      // the numeric ID of the new input field being added

                //var aktatran1 = document.getElementById("aktatran" + num).value;
                var aktatranId = Number(newNum + 1);

                $(".akta")
                        .append("<div id='fieldAkta" + newNum + "' class='cloneAkta'>" +
                                "<hr>" +
                                "<div class='row-form'>" +
                                "<div class='span2'>Jenis Akta:</div>" +
                                "<div class='span4'>" +
                                "<select class='select' name='akta[]'>" +
                                "<option value='0'>choose a option...</option>" +
                                <?php foreach ($akta as $row): ?>
                                    "<option value='<?= $row->AKTAID ?>'><?= $row->AKTADESC ?></option>" +
                                <?php
                                    endforeach;
                                ?>
                        "</select>" +
                                "</div>" +
                                "<div class='span1'>" +
                                "<a class='button yellow tip jDialog_form_button' onclick='deleteField(\"fieldAkta" + newNum + "\")'>" +
                                "<div class='icon'><span class='icon-minus-sign '></span></div>" +
                                "</a>" +
                                "</div>" +
                                "</div>" +
                                "<input type='hidden' value='" + aktatranId + "' id='aktatran" + newNum + "' name='aktatranId[]' />" +
                                "<div class='row-form'>" +
                                "<div class='span2'>Nomor Akta:</div>" +
                                "<div class='span4'>" +
                                "<input type='text' id='noTran' name='noAkta[]'>" +
                                "</div>" +
                                "</div>" +
                                "<div class='row-form'>" +
                                "<div class='span2'>Tanggal Akta:</div>" +
                                "<div class='span4'>" +
                                "<input type='text' value='' name='tgl_akta[]' class='dp1' /></div>" +
                                "</div>" +
                                "<div class='row-form'>" +
                                "<div class='span2'>Notaris:</div>" +
                                "<div class='span4'>" +
                                "<input type='text' id='noTran' name='notarisAkta[]'>" +
                                "</div>" +
                                "</div>" +
                                "<div class='row-form'>" +
                                "<div class='span2'>Objeck Hukum:</div>" +
                                "<div class='span1'>" +
                                "<a class='button yellow tip jDialog_form_button' onclick='addHukum(\"hukum" + newNum + "\",\"" + newNum + "\")'>" +
                                "<div class='icon'><span class='icon-plus-sign'></span></div>" +
                                "</a>" +
                                "</div>" +
                                "</div>" +
                                "<div class='objhukum'>" +
                                "<div id='hukum" + newNum + "'></div>" +
                                "</div>" +
                                "<div class='row-form'>" +
                                "<div class='span2'>Proses:</div>" +
                                "<div class='span1'>" +
                                "<a class='button yellow tip jDialog_form_button' onclick='addProses(\"proses" + newNum + "\",\"" + newNum + "\")'>" +
                                "<div class='icon'><span class='icon-plus-sign '></span></div>" +
                                "</a>" +
                                "</div>" +
                                "</div>" +
                                "<div class='objhukum'>" +
                                "<div id='proses" + newNum + "'></div>" +
                                "</div>" +
                                "</div>"
                                );
                        $('.dp1').datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            });

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

        });
        
        function setDeadlineCovernote(){
            if(document.getElementById("tglMulaiCovernote").value != ""){
                var awalArr = document.getElementById("tglMulaiCovernote").value.split("-");
                var awal = new Date();
                awal.setFullYear(parseInt(awalArr[2]), parseInt(awalArr[1])-1, parseInt(awalArr[0]));
                
                var e = document.getElementById("satwaktujangka");
                var satuan = e.options[e.selectedIndex].value;
                //alert(awal);
                var jangkaWaktu = document.getElementById("jangkaWaktu").value * satuan;
                awal.setDate(awal.getDate() + jangkaWaktu);
                var date_ = awal.getDate() < 10 ?  "0" + awal.getDate() : awal.getDate();
                var month_ = (awal.getMonth()+1) < 10 ? "0" + (awal.getMonth()+1) : (awal.getMonth()+1);
                document.getElementById("deadlineCovernote").value = date_+"-"+month_+"-"+awal.getFullYear();
            } else {
                alert("Tanggal Akad belum di set");
            }
            
            alert(akhir);
        }

        function deleteField($id) {
//            alert($id);
            document.getElementById($id).remove();
        }

        function addHukum($idhukum, $idAkta) {
            var num = $('.cloneHukum').length; // how many "duplicatable" input fields we currently have
            var newNum = new Number(num + 1);      // the numeric ID of the new input field being added

            $("#" + $idhukum)
                    .append("<div id='fieldHukum" + newNum + "' class='cloneHukum'>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Objeck Hukum:</div>" +
                            "<div class='span4'>" +
                            "<select class='select' name='objHukum[]' style='width:100%' >" +
<?php
foreach ($tipeSertifikat as $row):
    ?>
                        "<option value='<?= $row->TYPESERTIFIKATID; ?>'><?= $row->TYPESERTIFIKATDESC; ?></option>" +
    <?php
endforeach;
?>
                    "</select>" +
                            "</div>" +
                            "<div class='span1'>" +
                            "<a class='button yellow tip jDialog_form_button' onclick='deleteField(\"fieldHukum" + newNum + "\")'>" +
                            "<div class='icon'><span class='icon-minus-sign '></span></div>" +
                            "</a>" +
                            "</div>" +
                            "</div>" +
                            "<input type='hidden' value='" + $idAkta + "' name='objakta[]' />" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Nomor Sertifikat:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' id='noTran' name='noSertifikat[]'> </div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Kelurahan/Desa:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' id='noTran' name='kelDesa[]'> </div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Kota/Kabupaten:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' id='noTran' name='kotaKab[]'> </div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Atas Nama:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' id='noTran' name='atsNama[]'> </div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Nama Penjual:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' id='noTran' name='penjual[]'> </div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Nama Pembeli:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' id='noTran' name='pembeli[]'> </div>" +
                            "</div>" +
                            "</div>" +
                            "<hr>" +
                            "</div>"
                            );
        }

        function addProses($idproses, $aktaId) {
            var num = $('.cloneProses').length; // how many "duplicatable" input fields we currently have
            var newNum = new Number(num + 1);      // the numeric ID of the new input field being added

            $("#" + $idproses)
                    .append("<div id='fieldProses" + newNum + "' class='cloneProses'>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Nomor Urut Proses:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' name='noProses[]' /></div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Nama Proses:</div>" +
                            "<div class='span4'>" +
                            "<select class='select' name='proses[]'>" +
                            "<option value='0'>choose a option...</option>" +
<?php foreach ($proses as $row):
    ?>
                        "<option value='<?= $row->PROSESID ?>'><?= $row->PROSESDESC ?></option>" +
    <?php
endforeach;
?>
                    "</select> </div>" +
                            "<div class='span1'>" +
                            "<a  class='button yellow tip jDialog_form_button' onclick='deleteField(\"fieldProses" + newNum + "\")'>" +
                            "<div class='icon'><span class='icon-minus-sign '></span></div>" +
                            "</a>" +
                            "</div>" +
                            "</div>" +
                            "<input type='hidden' value='" + $aktaId + "' name='prosesakta[]' />" +
                            "<div class='row-form'>" +
                            "<div class='span3'>PJ Proses:</div>" +
                            "<div class='span4'>" +
                            "<select class='select' name='pjproses[]'>" +
                            "<option value='0'>choose a option...</option>" +
<?php foreach ($pjproses as $row):
    ?>
                        "<option value='<?= $row->EMPLOYEEID ?>'><?= $row->NAMALENGKAP ?></option>" +
    <?php
endforeach;
?>
                    "</select> </div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Tanggal Masuk:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' value='' name='tglMasuk[]' class='dp1' /></div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Tanggal Selesai:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' value='' name='tglKeluar[]' class='dp1' /></div>" +
                            "</div>" +
                            "<div class='row-form'>" +
                            "<div class='span3'>Tanggal Diserahkan:</div>" +
                            "<div class='span4'>" +
                            "<input type='text' value='' name='tglDiserahkan[]' class='dp1' /></div>" +
                            "</div>" +
                            "<hr>" +
                            "</div>"

                    );
                    $('.dp1').datepicker({
                dateFormat: 'dd-mm-yy'
            });
        }
    </script>
    <script>
        /*if (top.location != location) {
         top.location.href = document.location.href ;
         }*/
        $(function() {
            $('.dp1').datepicker({
                dateFormat: 'dd-mm-yy'
            });
        });


    </script>
</html>