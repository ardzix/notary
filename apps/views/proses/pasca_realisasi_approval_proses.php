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
                if (isset($_GET['message']) && $_GET['message'] == 'success_eska') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Permintaan eskalasi telah disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success_approve') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Permintaan approval telah anda terima!</div>
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
                                                <th width="20%">Current Proses</th>
                                                <th width="20%">Status</th>
                                                <th width="20%">PIC</th>
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
                                                    <td>
                                                        <?php
                                                        $aktaDesc = $this->model_translate->dynamicTranslate('akta', 'AKTAID', $row->AKTAID, 'AKTADESC');

                                                        echo $aktaDesc;
                                                        ?>
                                                    </td>
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

                                                        if ($row->APPROVAL == NULL) {
                                                            echo '<span class="label label-important">Belum Eskalasi</span>';
                                                        } else {
                                                            if ($row->APPROVAL == 0) {
                                                                echo '<span class="label label-warning">Belum di Approve</span>';
                                                            } elseif ($row->APPROVAL == 1) {
                                                                echo '<span class="label label-success">Sudah di Approve</span>';
                                                            } elseif ($row->APPROVAL == 2) {
                                                                echo '<span class="label label-green">Eskalasi Ditolak</span>';
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $employeeid = $this->model_translate->Appv($row->EMPLOYEEID, 'EMPLOYEEID', 'employee');
                                                        if ($employeeid == NULL) {
                                                            echo "kosong";
                                                        } else {
                                                            echo $employeeid->NAMALENGKAP;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $employee = $this->model_translate->Appv($transid->NOTARIS, 'EMPLOYEEID', 'employee');

                                                        $tglSelesai = $this->model_translate->Appv($row->CURRENTPROSES, 'PROSESTRANID', 'prosestran');


                                                        $employee2 = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $this->session->userdata('EMPLOYEEID')));

                                                        $jabatan = $this->model_core->get_where_array('jabatan', array('JABATANID' => $employee2['JABATANID']));

                                                        if ($jabatan['GRUP'] != 1) {
                                                            ?>
                                                            <a href="#sModal" role="button" data-toggle="modal" onClick="modalToogler('<?= $row->AKTATRANID ?>', '<?= $aktaDesc ?>', '<?= $transid->SUPERVISOR ?>', '<?= $transid->NOTARIS ?>', '<?= $employee->NAMALENGKAP ?>', '<?= $row->EKSKAID ?>', '<?= $row->CURRENTPROSES ?>')" class="button yellow tip" data-original-title="Ekskalasi">
                                                                <div class="icon"><span class="icon-resize-full icon-white"></span></div>
                                                            </a>
                                                            <?php
                                                        } else {
                                                            echo '';
                                                        }

                                                        $originalDate = $tglSelesai->TGLDEADLINE;
                                                        $tglSelesai = date("d-m-Y", strtotime($originalDate));
                                                        ?>
                                                        <a href="#gModal" role="button" data-toggle="modal" onClick="modalToogler2('<?= $tglSelesai ?>', '<?= $row->EKSKAID ?>', '<?= $row->CURRENTPROSES ?>', '<?= $aktaDesc ?>', '<?= $row->EMPLOYEEID ?>', '<?= $row->parent ?>')" class="button purple tip" data-original-title="Approve">
                                                            <div class="icon"><span class="icon-thumbs-up icon-white"></span></div>
                                                        </a>
                                                        <a href="#aModal" role="button" data-toggle="modal" onClick="modalToogler3('<?= $row->ALASAN ?>')" class="button purple tip" data-original-title="Detail Alasan">
                                                            <div class="icon"><span class="icon-list icon-white"></span></div>
                                                        </a>
                                                        <a href="<?= base_url() ?>control/edit/tolak_approve/<?= $row->EKSKAID ?>/<?= $this->uri->segment(5) ?>/<?= $row->parent ?>" class="button red tip" data-original-title="Tolak Eskalasi">
                                                            <div class="icon"><span class="icon-thumbs-down icon-white"></span></div>
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
            <form method="POST" action="<?= base_url() ?>control/add/eskalasi_approv">
                <div class="row-fluid">
                    <div class="block-fluid">
                        <div class="row-form">
                            <input type="hidden" id="aktatranId" name="AKTATRANID" value="">
                            <input type="hidden" id="employeeId" name="EMPLOYEEID" value="">
                            <input type="hidden" id="target" name="TARGET" value="">
                            <input type="hidden" id="currentProses" name="CURRENTPROSES" value="">
                            
                            <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(5) ?>">
                            <input type="hidden" id="eskaID" value="" name="EKSKAID">
                            
                            <input type="hidden" name="LINK" value="<?= 'proses/pasca_realisasi/approval/proses_approve/' . $this->uri->segment(5) ?>">
                            <?php
                            $dat = $this->m_customertrans->getCustIdFromTransId($this->uri->segment(5));
                            ?>
                            <input type="hidden" name="DEBITUR" value="<?
                            foreach ($dat as $dt) {
                                $cs = $this->m_customer->getDataById($dt->CUSTOMERID);
                                echo $cs->NAMACUST;
                                echo ', ';
                            };
                            ?>">

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
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save updates</button> 
                        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
                    </div>
                </div>
            </form>
        </div>
        <!-- Bootrstrap modal form -->
        <div id="gModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabels">Approve</h3>
            </div>
            <form method="POST" action="<?= base_url() ?>control/edit/approve">
                <div class="row-fluid">
                    <div class="block-fluid">
                        <div class="row-form">
                            <input type="hidden" name="TRANSAKSIPRAID" value="<?= $this->uri->segment(5) ?>">
                            <input type="hidden" id="ekskaid" value="" name="EKSKAID">
                            <input type="hidden" id="aktaDesca" value="" name="AKTADESC">
                            <input type="hidden" id="employeeid" value="" name="EMPLOYEEID">
                            <input type="hidden" id="prosesId" value="" name="PROSESID">
                            <input type="hidden" id="parent" value="" name="parent">
                            <input type="hidden" name="LINK" value="<?= 'proses/pasca_realisasi/approve/proses_ekskalasi/' . $this->uri->segment(5) ?>">
                            <input type="hidden" name="LINK2" value="<?= 'proses/pasca_realisasi/ekskalasi/proses_ekskalasi/' . $this->uri->segment(5) ?>">
                        </div>
                        <div class="row-form">
                            <div class="span5">Tanggal Selesai Lama:</div>
                            <div class="span5">
                                <input type="text" id="tglLama" value="" disabled>
                            </div> 
                        </div>
                        <div class="row-form">
                            <div class="span5">Tanggal Selesai Baru:</div>
                            <div class="span5">
                                <input type="text" value="" NAME="TGLDEADLINE">
                                <span class="bottom">Contoh: 02-02-2012</span>
                            </div>
                        </div>
                    </div>
                </div>                   
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save updates</button> 
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
                </div>
        </div>
        <!-- Bootrstrap default dialog -->
        <div id="aModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 id="myModalLabel">Alasan</h3>
            </div>
            <div class="modal-body">
                <p  id="alasan"></p>
            </div>
        </div> 
    </body>
</html>
<script language="javascript">

    function modalToogler(aktatranId, aktaDesc, employeeId, target, supervisor, eskaID,currentProses)
    {
        document.getElementById('aktatranId').value = aktatranId;
        document.getElementById('aktaDesc').value = aktaDesc;
        document.getElementById('employeeId').value = employeeId;
        document.getElementById('target').value = target;
        document.getElementById('supervisor').value = supervisor;
        document.getElementById('eskaID').value = eskaID;
        document.getElementById('currentProses').value = currentProses;


    }

    function modalToogler2(tglLama, ekskaid, prosesId, aktaDesca, employeeid, parent)
    {
        document.getElementById('tglLama').value = tglLama;
        document.getElementById('ekskaid').value = ekskaid;
        document.getElementById('prosesId').value = prosesId;
        document.getElementById('aktaDesca').value = aktaDesca;
        document.getElementById('employeeid').value = employeeid;
        document.getElementById('parent').value = parent;
    }

    function modalToogler3(alasan)
    {
        document.getElementById('alasan').innerHTML = alasan;

    }
</script>

