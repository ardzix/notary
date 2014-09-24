<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <!-- jquery untuk handle table -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>
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
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Permintaan eskalasi berhasil diproses!</div>
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
                        <h1>Proses<small> Pasca-Realisasi</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="alert alert-block">                
                                    Cari Data Ekskalasi
                                </div>

                                <div class="head dblue">
                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                    <h2>Data Ekskalasi</h2>
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('table_sort_pagination');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                                        
                                </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="15%">Akta</th>
                                                <th width="15%">Current Proses</th>
                                                <th width="20%">Status</th>
                                                <th width="15%" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($transakta as $row) {
                                                ?>
                                                <tr>

                                                    <td><?= $no++ ?></td>
                                                    <td><?php
                                                        $aktaDesc = $this->model_translate->dynamicTranslate('akta', 'AKTAID', $row->AKTAID, 'AKTADESC');

                                                        echo $aktaDesc;
                                                        ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row->CURRENTPROSES == 0) {
                                                            echo "-";
                                                        } else {
                                                            $proses = $this->model_translate->dynamicTranslate('prosestran', 'PROSESTRANID', $row->CURRENTPROSES, 'PROSESID');
                                                            echo $this->model_translate->dynamicTranslate('proses', 'PROSESID', $proses, 'PROSESDESC');
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $transid = $this->model_translate->Appv($this->uri->segment(5), 'TRANSAKSIPRAID', 'transaksipra');

                                                        $approv = $this->model_translate->eskalasi($row->AKTATRANID, $row->CURRENTPROSES);
                                                        if ($approv == NULL) {
                                                            echo '<span class="label label-important">Tidak Melakukan Eskalasi</span>';
                                                        } else {
                                                            if ($approv->APPROVAL == 0) {
                                                                echo '<span class="label label-warning">Belum di Approve</span>';
                                                            } elseif ($approv->APPROVAL == 1) {
                                                                echo '<span class="label label-success">Sudah Approve</span>';
                                                            } elseif ($approv->APPROVAL == 2) {
                                                                echo '<<span class="label label-green">Eskalasi Ditolak</span>';
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $employee = $this->model_translate->Appv($transid->SUPERVISOR, 'EMPLOYEEID', 'employee');
                                                        ?>
                                                        <a href="#sModal" role="button" data-toggle="modal" onClick="modalToogler('<?= $row->AKTATRANID ?>', '<?= $aktaDesc ?>', '<?= $transid->EMPLOYEEID ?>', '<?= $transid->SUPERVISOR ?>', '<?= $employee->NAMALENGKAP ?>', '<?= $row->CURRENTPROSES ?>')" class="button yellow tip" data-original-title="ekskalasi">
                                                            <div class="icon"><span class="icon-resize-full icon-white"></span></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>                   
                                </div> 
                            </div> 
                        </div>
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>
        <!-- Bootrstrap modal form -->
        <div id="sModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabels">Kirim Ekskalasi</h3>
            </div>
            <form method="POST" action="<?= base_url() ?>control/add/eskalasi">
                <div class="row-fluid">
                    <div class="block-fluid">
                        <div class="row-form">
                            <input type="hidden" id="aktatranId" name="AKTATRANID" value="">
                            <input type="hidden" id="employeeId" name="EMPLOYEEID" value="">
                            <input type="hidden" id="target" name="TARGET" value="">
                            <input type="hidden" id="currentProses" name="CURRENTPROSES" value="">

                            <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(5) ?>">
                            <input type="hidden" name="LINK" value="<?= 'proses/pasca_realisasi/approval/proses_approve/' . $this->uri->segment(5) ?>">
                            <?php
                            $dat = $this->m_customertrans->getCustIdFromTransId($this->uri->segment(5));
                            ?>
                            <input type="hidden" name="DEBITUR" value="<? 
                                   foreach ($dat as $dt) {
                                   $cs = $this->m_customer->getDataById($dt->CUSTOMERID);
                                   echo $cs->NAMACUST;
                                   echo ', ';
                                   };?>">

                        </div>
                        <div class="row-form">
                            <div class="span2">Nama Akta:</div>
                            <div class="span5">
                                <input type="text" id="aktaDesc" value="" name="NAMAAKTA" readonly>
                            </div> 
                        </div>
                        <div class="row-form">
                            <div class="span2">Di Kirim ke:</div>
                            <div class="span5">
                                <input type="text" id="supervisor" value=""/>
                            </div> 
                        </div>
                        <div class="row-form">
                            <div class="span2">Alasan:</div>
                            <div class="span5">
                                <textarea name="ALASAN"></textarea> 
                            </div> 
                        </div>
                    </div>
                </div>                   
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Kirim</button> 
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
                </div>
            </form>
        </div>
    </body>
</html>
<script language="javascript">

    function modalToogler(aktatranId, aktaDesc, employeeId, target, supervisor, currentProses)
    {
        document.getElementById('aktatranId').value = aktatranId;
        document.getElementById('aktaDesc').value = aktaDesc;
        document.getElementById('employeeId').value = employeeId;
        document.getElementById('target').value = target;
        document.getElementById('supervisor').value = supervisor;
        document.getElementById('currentProses').value = currentProses;


    }
</script>