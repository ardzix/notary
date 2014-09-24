<?php
/*
 * Project Name: notary
 * File Name: realisasi
 * Created on: 13 Jan 14 - 8:04:35
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
        <link rel="stylesheet" type="text/css" href="<?= NOTARY_ASSETS ?>css/anytime.css" />
        <script src="<?= NOTARY_ASSETS ?>js/jquery-migrate-1.0.0.js"></script>
        <script src="<?= NOTARY_ASSETS ?>js/anytime.js"></script>


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

                    <div class="page-header" id="upHeader">
                        <div class="icon">
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Proses<small> Realisasi - Penjadwalan</small></h1>
                    </div>
                    <ul class="nav nav-tabs">
                        <!-----------------------------------------------------------
                        PENJADWALAN
                        ------------------------------------------------------------>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 23));

                        $menuid1 = $qry['allow'];

                        if ($menuid1 != 1) {
                            ?>
                            <li class="active"><a href="<?= base_url() ?>proses/realisasi/penjadwalan">Penjadwalan</a></li>
                            <?php
                        }
                        ?>
                        <!-----------------------------------------------------------
                        PENYERAHAN DOKUMEN
                        ------------------------------------------------------------>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 24));

                        $menuid1 = $qry['allow'];

                        if ($menuid1 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>proses/realisasi/penyerahanDokumen">Penyerahan Dokumen</a></li>
                            <?php
                        }
                        ?>
                        <!-----------------------------------------------------------
                        COVERNOTE
                        ------------------------------------------------------------>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 25));

                        $menuid1 = $qry['allow'];

                        if ($menuid1 != 1) {
                            ?>
                            <li><a href="<?= base_url() ?>proses/realisasi/covernote">Cover Note</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <br>
                    <br>
                    <?php
                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 23));

                    $menuid1 = $qry['allow'];

                    if ($menuid1 == 1) {
                        ?>
                        <H3>Anda tidak punya hak akses untuk menu penjadwalan</H3>
                        <H4>Silahkan pilih tab menu yang tersedia diatas</H4>
                        <?php
                    } else {
                        ?>
                        <div class="row-fluid">

                            <div class="span6">
                                <div class="row-form">
                                    <div class="span3">Pilih Pegawai:</div>
                                    <div class="span9">
                                        <select class="select" id="employeeId" name="employeeId" >
                                            <option value="0">Pilih pegawai</option>
                                            <?php
                                            foreach ($employee as $row):
                                                ?>
                                                <option value="<?= $row->EMPLOYEEID; ?>"   >
                                                    <?= $row->NAMALENGKAP; ?>
                                                </option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="block" id="calendar" >
                                </div>
                            </div>

                            <div class="span8">
                                <div class="block" id="jadwal" style="visibility: hidden">

                                    <div align="center">&nbsp;</div>

                                    <p>
                                    <div class="span12">  
                                        <div class="block">
                                            <div class="head green">
                                                <div class="icon"><span class=" ico-bookmark-3"></span></div>
                                                <h2 id="labelJadwal">Jadwal pada tanggal:</h2>    

                                            </div>                
                                            <div class="data-fluid">
                                                <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover">
                                                    <thead>
                                                        <tr class="">
                                                            <th >No.</th>
                                                            <th >Aktifitas</th>
                                                            <th >Mulai Aktifitas</th>

                                                            <th >Akhir Aktifitas</th>
                                                            <th id="tengah">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody   id="tableJadwal">          
                                                    </tbody>
                                                </table>
                                            </div>                
                                        </div>
                                    </div>
                                    </p>
                                    <div class="span12">  
                                        <div class="block">
                                            <div class="data-fluid">


                                                <a href="#fModal" role="button" class="btn btn-success" data-toggle="modal"><span class="ico-pencil"></span>&nbsp;&nbsp;Jadwal Baru</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?PHP
                        }
                        ?>
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>
    </body>

    <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form id="formModal" name="jadwal" action="<?= base_url() ?>control/add/jadwal/"  method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Input Jadwal Baru</h3>
            </div>        
            <div class="row-fluid">
                <div class="block-fluid">
                    <div class="row-form">
                        <div class="span12">
                            <span class="top title">Deskripsi Jadwal:</span>
                            <input type="text" name="desc" value=""/>                        
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span6">
                            <span class="top title">Waktu Mulai:</span>
                            <input type="text" name="bTime" id="bTime" value=""/>
                        </div>
                        <div class="span6">
                            <span class="top title">Waktu Selesai:</span>
                            <input type="text" name="eTime" id="eTime" value=""/>
                        </div>
                    </div>   
                </div>
            </div>                   
            <div class="modal-footer">
                <input type="hidden" id="empIdForm" name="empIdForm">
                <input type="hidden" id="yearForm" name="yearForm">
                <input type="hidden" id="monForm" name="monForm">
                <input type="hidden" id="dayForm" name="dayForm">
                <button class="btn btn-primary" type="submit" >Save updates</button> 
                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
            </div></form>
    </div>

    <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><form id="editformModal" name="jadwal" action="<?= base_url() ?>control/edit/jadwal/"  method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Input Jadwal Baru</h3>
            </div>        
            <div class="row-fluid">
                <div class="block-fluid">
                    <div class="row-form">
                        <div class="span12">
                            <span class="top title">Deskripsi Jadwal:</span>
                            <input id="fdesc" type="text" name="desc" value=""/>                        
                        </div>
                    </div>
                    <div class="row-form">
                        <div class="span6">
                            <span class="top title">Waktu Mulai:</span>
                            <input  id="fwaktumulai" type="text" name="bTime" value=""/>
                        </div>
                        <div class="span6">
                            <span class="top title">Waktu Selesai:</span>
                            <input id="fwaktuakhir" type="text" name="eTime" value=""/>
                        </div>
                    </div>   
                </div>
            </div>                   
            <div class="modal-footer">
                <input type="hidden" id="empIdFormE" name="empIdForm">
                <input type="hidden" id="yearFormE" name="yearForm">
                <input type="hidden" id="monFormE" name="monForm">
                <input type="hidden" id="dayFormE" name="dayForm">
                <button class="btn btn-primary" type="submit" >Save updates</button> 
                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
            </div></form>
    </div>

    <div id="confirmModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabels">Confirmation</h3>
        </div>
        <div class="modal-body" id="myModalBody">
            you sure you want to delete this ??
        </div>
        <div class="modal-footer" id="modalfooter">

        </div>
    </div>

</html>

<script language="javascript">
    var empId = null;
    function edit_data_row(no)
    {
        //alert();
        $('#fwaktumulai').val($('#waktuawal' + no).html());
        $('#fwaktuakhir').val($('#waktuakhir' + no).html());
        $('#fdesc').val($('#desc' + no).html());
        $("#editformModal").attr("action", "<?= base_url() ?>control/edit/jadwal/" + empId + "/" + no);
<?php $date = getdate(); ?>
        var year = <?php echo $date['year']; ?>;
        var mon = <?php echo $date['mon']; ?>;
        var day = '<?php echo $date['mday']; ?>';


    }

    function delete_data(id)
    {
        $('#modalfooter').html('<a href="#" data-dismiss="modal" class="btn" >Cancel</a><a href="<?Php echo site_url(); ?>control/delete/delete_jadwal/' + empId + '/' + id + '" class="btn success" >Confirm</a>');
    }

<?php
if ($idemp != null) {
    ;
    ?>
        empId = <?Php echo $idemp; ?>;
        $("#formModal").attr("action", "<?= base_url() ?>control/add/jadwal/" + empId);
        $('#employeeId option[value=<?Php echo $idemp; ?>]').attr('selected', 'selected');
        var data = {empId: empId};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/realisasi/penjadwalanClendar",
            data: data,
            success: function(msg) {
                $('#calendar').html(msg);
            }
        });
        document.getElementById("empIdForm").value = empId;
        document.location = "#calendar";


    <?php $date = getdate(); ?>
        var year = <?php echo $date['year']; ?>;
        var mon = <?php echo $date['mon']; ?>;
        var day = '<?php echo $date['mday']; ?>';

        document.getElementById('labelJadwal').innerHTML = "Jadwal pada tanggal " + day + " " + mon + " " + year + " :";

        var data = {empId: empId, day: day, mon: mon, year: year};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/realisasi/penjadwalanJadwal",
            data: data,
            success: function(msg) {
                $('#tableJadwal').html(msg);
            }
        });


        document.getElementById('jadwal').style.visibility = "visible";
<?Php } ?>
    $("#employeeId").change(function() {

        empId = $("#employeeId").val();
        document.getElementById('jadwal').style.visibility = "visible";
        $("#formModal").attr("action", "<?= base_url() ?>control/add/jadwal/" + empId);
        var data = {empId: empId};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/realisasi/penjadwalanClendar",
            data: data,
            success: function(msg) {
                $('#calendar').html(msg);
            }
        });
        document.getElementById("empIdForm").value = empId;
        document.location = "#calendar";


<?php $date = getdate(); ?>
        var year = <?php echo $date['year']; ?>;
        var mon = <?php echo $date['mon']; ?>;
        var day = '<?php echo $date['mday']; ?>';

        document.getElementById('labelJadwal').innerHTML = "Jadwal pada tanggal " + day + " " + mon + " " + year + " :";

        var data = {empId: empId, day: day, mon: mon, year: year};
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>proses/realisasi/penjadwalanJadwal",
            data: data,
            success: function(msg) {
                $('#tableJadwal').html(msg);
            }
        });


        document.getElementById('jadwal').style.visibility = "visible";
    })
    $("#bTime").AnyTime_picker({format: "%H:%i", labelTitle: "Waktu Mulai",
        labelHour: "Jam", labelMinute: "Menit"});
    $("#eTime").AnyTime_picker({format: "%H:%i", labelTitle: "Waktu Selesai",
        labelHour: "Jam", labelMinute: "Menit"});
    $("#fwaktumulai").AnyTime_picker({format: "%H:%i", labelTitle: "Waktu Mulai",
        labelHour: "Jam", labelMinute: "Menit"});
    $("#fwaktuakhir").AnyTime_picker({format: "%H:%i", labelTitle: "Waktu Selesai",
        labelHour: "Jam", labelMinute: "Menit"});
</script>
