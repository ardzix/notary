<?php
/*
 * Project Name: notary
 * File Name: pasca_realisasi
 * Created on: 15 Jan 14 - 12:55:32
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>

<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head><?php
        $optionPrintArray = explode('&', $this->uri->segment(4));
        $withDoneArray = explode('=', $optionPrintArray[0]);
        $withDone = $withDoneArray[1];
        $pageSizeArray = explode('=', $optionPrintArray[1]);
        $pageSize = $pageSizeArray[1];
        ?>
        <style type="text/css" media="print">
            @page { size: landscape <?php if ($pageSize == 0)
            echo 'a4';
        else
            echo 'a3';
        ?>;   }
            </style>
<?= $this->load->view('slice/header-content'); ?>
            <!-- jquery untuk handle table -->
            <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>
            <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/form.js'></script>
        </head>

        <body style="font-size: <?php
        if ($pageSize == 1)
            echo "12px";
        else
            echo "8px";
        ?>; line-height:  <?php
        if ($pageSize == 1)
            echo "100%";
        else
            echo "90%";
        ?>">

        <div class="wrapper">

            <!-- sidebar menu start here -->



            <!-- content start here -->
            <div class="content">


                <div class="row-fluid">
                    <div class="span12">
                        <b><u>Dr. RANTI FAUZA MAYANA, SH.</u><br style="line-height: 180%">
                            NOTARIS PEJABAT PEMBUAT AKTA TANAH<br style="line-height: 180%">
                            Jl. Dr. Cipto No. 23 Bandung<br style="line-height: 220%"></b>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="block">
                            <div class="data-fluid">
                                <?php
                                $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 26));

                                $menuid1 = $qry['allow'];

                                if ($menuid1 == 1) {
                                    ?>
                                    <H3>Anda tidak punya hak akses untuk menu Monitoring</H3>
                                    <H4>Silahkan pilih tab menu yang tersedia diatas</H4>
                                    <?php
                                } else {
                                    if ($pageSize == 0)
                                        $width = array(40, 60, 100, 40, 100, 40, 100, 80, 60, 60, 100, 100);
                                    else
                                        $width = array(80, 120, 200, 80, 200, 80, 200, 160, 120, 120, 200, 200);
//                                        $width = array(2, 3, 7, 3, 7, 2, 3, 2, 2, 2, 5, 5);
                                    ?>
                                    <table class="" id="tableTransaksi" cellpadding="5" cellspacing="0" border="1">
                                        <thead >
                                            <tr>
                                                <th width="<?= $width[0] ?>px">NO</th>
                                                <th width="<?= $width[1] ?>px">TGL AKAD</th>
                                                <th width="<?= $width[2] ?>px">NAMA DEBITUR</th>
                                                <th width="<?= $width[3] ?>px">NO SERTIFIKAT</th>
                                                <th width="<?= $width[4] ?>px">DEVELOPER</th>
                                                <th width="<?= $width[5] ?>px">KOTA/KAB/NOT</th>
                                                <th width="<?= $width[6] ?>px">BANK</th>
                                                <th width="<?= $width[7] ?>px">PROSES</th>
                                                <th width="<?= $width[8] ?>px">TGL MASUK PROSES</th>
                                                <th width="<?= $width[9] ?>px">TGL SELESAI PROSES</th>
                                                <th width="<?= $width[10] ?>px">TGL PENYERAHAN KE BANK/DEBITUR</th>
                                                <th width="<?= $width[11] ?>px">KENDALA</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php
                                            $no = 0;
                                            $lastNoCoverNote='';
                                            foreach ($monitoring as $row) {
                                               
                                                if ($withDone == 'false') {
                                                    if ($row->STATUSPROSES == 2) {
                                                        $no++;
                                                         
                                                if($lastNoCoverNote!=$row->NOCOVERNOTE && $lastNoCoverNote!=''){
                                                ?>
                                                    <tr><td colspan="12"></td></tr>
                                                <?php
                                                }
                                                
                                                        ?>
                                                        <tr <?php if ($row->STATUSPROSES != 2) { ?>style="background-color: #FFD700"<?php } ?>>
                                                            <td align="center"><?= $no ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($row->TGLAKAD != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLAKAD));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $dat = $this->m_customertrans->getCustIdFromTransId($row->TRANSAKSIPRAID);
                                                                foreach ($dat as $dt) {
                                                                    $cs = $this->m_customer->getDataById($dt->CUSTOMERID);
                                                                    echo $cs->NAMACUST;
                                                                    echo ', ';
                                                                };
                                                                ?>
                                                            </td>
                                                            <td align="center"><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NOMOR'); ?> - <?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'KEL_DESA'); ?></td>
                                                            <td align="center"><?php
                                                                if ($row->DEVELOPERID == NULL) {
                                                                    echo '';
                                                                } else {
                                                                    echo $this->model_translate->dynamicTranslate('developer', 'DEVELOPERID', $row->DEVELOPERID, 'DEVELOPERDESC');
                                                                }
                                                                ?></td>
                                                            <td align="center"><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'KOTA_KAB'); ?></td>
                                                            <td align="center"><?= $this->model_translate->dynamicTranslate('bankrekening', 'BANKREKID', $row->BANKREKID, 'BANKREKDESC'); ?></td>
                                                            <td align="center"><?= $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'PROSESDESC'); ?></td>
                                                            <td align="center">
                                                                <?php
                                                                if ($row->TGLMASUK != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLMASUK));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center">
                                                                <?php
                                                                if ($row->TGLSELESAI != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLSELESAI));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center">
                                                                <?php
                                                                if ($row->TGLPENYERAHAN != 0000 - 00 - 00) {
                                                                    echo date('d-m-Y', strtotime($row->TGLPENYERAHAN));
                                                                } else {
                                                                    echo "-";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?= $row->KENDALA ?></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                } else {

                                                    $no++;
                                                    
                                                     
                                                if($lastNoCoverNote!=$row->NOCOVERNOTE && $lastNoCoverNote!=''){
                                                ?>
                                                    <tr><td colspan="12"></td></tr>
                                                <?php
                                                }
                                                
                                                    ?>
                                                    <tr <?php if ($row->STATUSPROSES != 2) { ?>style="background-color: #FFD700"<?php } ?>>
                                                        <td align="center"><?= $no ?></td>
                                                        <td align="center">
                                                            <?php
                                                            if ($row->TGLAKAD != 0000 - 00 - 00) {
                                                                echo date('d-m-Y', strtotime($row->TGLAKAD));
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $dat = $this->m_customertrans->getCustIdFromTransId($row->TRANSAKSIPRAID);
                                                            foreach ($dat as $dt) {
                                                                $cs = $this->m_customer->getDataById($dt->CUSTOMERID);
                                                                echo $cs->NAMACUST;
                                                                echo ', ';
                                                            };
                                                            ?>
                                                        </td>
                                                        <td align="center"><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NOMOR'); ?></td>
                                                        <td><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NAMAPEMILIK'); ?></td>
                                                        <td align="center"><?= $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'KOTA_KAB'); ?></td>
                                                        <td align="center"><?= $this->model_translate->dynamicTranslate('bankrekening', 'BANKREKID', $row->BANKREKID, 'BANKREKDESC'); ?></td>
                                                        <td align="center"><?= $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'PROSESDESC'); ?></td>
                                                        <td align="center">
                                                            <?php
                                                            if ($row->TGLMASUK != 0000 - 00 - 00) {
                                                                echo date('d-m-Y', strtotime($row->TGLMASUK));
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td align="center">
                                                            <?php
                                                            if ($row->TGLSELESAI != 0000 - 00 - 00) {
                                                                echo date('d-m-Y', strtotime($row->TGLSELESAI));
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td align="center">
                                                            <?php
                                                            if ($row->TGLPENYERAHAN != 0000 - 00 - 00) {
                                                                echo date('d-m-Y', strtotime($row->TGLPENYERAHAN));
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php if ($row->STATUSPROSES == 2) echo $row->KENDALA; ?></td>

                                                    </tr>
                                                    <?php
                                                }
                                                
                                                $lastNoCoverNote=$row->NOCOVERNOTE;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php 
                                    $date=getdate(); 
                                    $user=$this->model_core->get_where_array('user', array('USERID' => $this->session->userdata('USERID')));
                                    $pegawai=$this->model_core->get_where_array('employee', array('EMPLOYEEID' => $user['EMPLOYEEID']));
                                    ?>
                                    <br>
                                    <p>Bandung, <?= $date['mday'] ?>/<?= $date['mon'] ?>/<?= $date['year'] ?> - Dibuat oleh: <?= $pegawai['NAMALENGKAP'] ?></p>
                                    <?php
                                }
                                ?>
                            </div>   
                        </div>
                    </div>
                    <div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
                        <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h3 id="myModalLabel">Apakah anda yakin ingin menghapus data ini?</h3> 
                        </div> 
                        <div class="modal-body"><p>Peringatan! Data yang berelasi dengan ID Transaksi ini akan ikut terhapus.</p></div> 
                        <div class="modal-footer"> 
                            <a id="transaksi" href=""> 
                                <button class="btn btn-warning" aria-hidden="true">Delete</button> 
                            </a> 
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> 
                        </div> 
                    </div>
                    <!-- Edit modal -->
                    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Pilih Bagian Data yang akan Di Edit</h3>
                        </div>
                        <div class="modal-body">
                            <div class="widgets">
                                <a id="transaksipraid" href="" class="swidget blue">
                                    <div class="icon">
                                        <span class="ico-tag"></span>
                                    </div>
                                    <div class="bottom">
                                        <div class="text">Transaksi</div>
                                    </div>                                
                                </a>
                                <a id="covernoteid" href="" class="swidget blue">
                                    <div class="icon">
                                        <span class="ico-tags"></span>
                                    </div>
                                    <div class="bottom">
                                        <div class="text">Covernote</div>
                                    </div>                                
                                </a>
                                <a id="aktatranid" href="" class="swidget blue">
                                    <div class="icon">
                                        <span class="ico-user"></span>
                                    </div>
                                    <div class="bottom">
                                        <div class="text">Akta</div>
                                    </div>                                
                                </a>
                                <a id="prosestranid" href="" class="swidget blue">
                                    <div class="icon">
                                        <span class="ico-user"></span>
                                    </div>
                                    <div class="bottom">
                                        <div class="text">Proses</div>
                                    </div>                                
                                </a>
                                <a id="sertifikatid" href="" class="swidget blue">
                                    <div class="icon">
                                        <span class="ico-user"></span>
                                    </div>
                                    <div class="bottom">
                                        <div class="text">Sertifikat</div>
                                    </div>                                
                                </a>
                                <a id="sertifikatbaru" href="" class="swidget blue">
                                    <div class="icon">
                                        <span class="ico-user"></span>
                                    </div>
                                    <div class="bottom">
                                        <div class="text">Buat sertifikat baru</div>
                                    </div>                                
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END of Edit modal -->
                </div>
            </div> 
        </div>
        <?= $this->load->view('slice/tambal'); ?>
    </div>
    <script>
//        $(document).ready(function() {
//            $('#tableTransaksi').DataTable().fnDestroy();
//
//            $('#tableTransaksi').DataTable({
//                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//                "iDisplayLength": -1
//                        // searching : false
//            });
//        });
//
//        function modalToogler(transaksi) {
//            document.getElementById('transaksi').href = "<?= base_url() ?>control/delete/delete_transaksi/" + transaksi;
//        }
//        function modalToogler2(transaksiId, covernoteId, aktatranId, prosestranId, sertifikatId) {
//            document.getElementById('transaksipraid').href = "<?= base_url() ?>proses/pra_realisasi/input_data/edit_transaksi/" + transaksiId;
//            document.getElementById('covernoteid').href = "<?= base_url() ?>proses/pra_realisasi/input_data/edit_covernote/" + covernoteId;
//            document.getElementById('aktatranid').href = "<?= base_url() ?>proses/pra_realisasi/input_data/edit_akta/" + aktatranId;
//            document.getElementById('prosestranid').href = "<?= base_url() ?>proses/pra_realisasi/input_data/edit_proses/" + prosestranId;
//            document.getElementById('sertifikatid').href = "<?= base_url() ?>proses/pra_realisasi/input_data/edit_sertifikat/" + sertifikatId;
//            document.getElementById('sertifikatbaru').href = "<?= base_url() ?>proses/pra_realisasi/input_data/edit_sertifikat_baru/" + aktatranId;
//
//        }
//        /*if (top.location != location) {
//         top.location.href = document.location.href ;
//         }*/
//        $(function() {
//            $('.dp1').datepicker({
//                dateFormat: 'dd-mm-yy'
//            });
//        });

        $(document).ready(function() {
//            alert("<?= $pageSize ?>")
            window.print();
            window.close();
        });
    </script>
</body>
</html>    
