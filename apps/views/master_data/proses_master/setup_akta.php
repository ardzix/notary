<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">
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
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'success') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil disimpan!</div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'update') {
                    ?>
                    <div class="alert alert-success">            
                        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil diupdate!</div>
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
                        <h1>Proses Master <small> Master Data</small></h1>
                    </div>

                    <ul class="nav nav-tabs">
                        <!-----------------------------------------------------------
                        SETUP AKTA
                        ------------------------------------------------------------>
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 54));

                        $menuid1 = $qry['allow'];

                        if ($menuid1 != 1) {
                            ?>
                            <li class="active"><a href="<?= base_url() ?>master_data/proses_master/setup_akta">Setup Akta</a></li>
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
                            <li><a href="<?php echo base_url(); ?>master_data/proses_master/setup_akta/setup_dokumen">Setup Akta Dokumen</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="tab-content">
                        <?php
                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 54));

                        $menuid1 = $qry['allow'];

                        if ($menuid1 == 1) {
                            ?>
                            <H3>Anda tidak punya hak akses untuk tab Setup Akta</H3>
                            <H4>Silahkan pilih tab menu lain yang tersedia diatas</H4>
                            <?php
                        } else {
                            ?>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="block">

                                        <div class="head dblue">
                                            <a href="#gModal" role="button" data-original-title="Create" data-toggle="modal">
                                                <span class="label label-success">Tambah Akta</span>
                                            </a>
                                        </div>                
                                        <div class="data-fluid">
                                            <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" class="checkall"/></th>
                                                        <th width="20%">Desc</th>
                                                        <th width="30%">Proses</th>
                                                        <th width="30%" class="TAC">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($akta as $at) { ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="order[]" value="528"/>
                                                            </td>
                                                            <td>
                                                                <?php echo $at->AKTADESC; ?>
                                                            </td>


                                                            <td>
                                                                <?php
                                                                $id = $at->AKTAID;
                                                                //mendapatkan semua proses berdasarkan akta id
                                                                $pros = $this->m_proses->getDataProsesAkta($id);

                                                                foreach ($pros as $pr) {
                                                                    ?>
                                                                    <span class="label label-success"><?php echo $this->model_translate->dynamicTranslate('proses', 'PROSESID', $pr->PROSESID, 'PROSESDESC'); ?></span>																
                                                                    <?php
                                                                }
                                                                ?>


                                                            </td>

                                                            <td>
                                                                <!--                                                                <button class="btn tip" data-original-title="Default tip">Default tip</button>-->

                                                                <a href="#fModal" role="button" class="button green tip" data-original-title="Edit" data-toggle="modal" onclick="modalToogler2('<?= $at->AKTAID ?>', '<?= $at->AKTADESC ?>')">
                                                                    <div class="icon"><span class="ico-pencil"></span></div>
                                                                </a>
                                                                <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onClick="modalToogler('<?= $at->AKTAID ?>')" >
                                                                    <div class="icon"><span class="ico-remove"></span></div>
                                                                </a>

                                                                <a href="<?= base_url() . 'master_data/proses_master/setup_akta/setup/' . $at->AKTAID ?>" class="button yellow tip jDialog_form_button" data-original-title="Setup Akta">
                                                                    <div class="icon"><span class="ico-hand-up"></span></div>
                                                                </a>
                                                            </td>
                                                        </tr>   
                                                    <?php }; ?>
                                                </tbody>
                                            </table>                    
                                        </div> 
                                    </div> 
                                </div>
                                <?= $this->load->view('slice/tambal'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootrstrap modal -->
        <div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Apakah anda yakin ingin menghapus data ini?</h3>
            </div>
            <div class="modal-body">
                <p>Peringatan! Data yang telah terhapus tidak akan bisa dikembalikan lagi.</p>
            </div>
            <div class="modal-footer">
                <a href="" id="delete">
                    <button class="btn btn-warning" aria-hidden="true">Delete</button>
                </a> 
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>            
            </div>
        </div>  

        <!-- Bootrstrap modal form -->
        <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form action="<?= base_url() ?>control/edit/akta" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Edit Nama Akta</h3>
                </div>
                <div class="row-form">
                    <input type="hidden" id="AKTAID" value="" name="AKTAID">
                    <div class="span4">Nama Akta:</div>
                    <div class="span4"><input type="text" id="NAMAAKTA" value="" name="NAMAAKTA"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" aria-hidden="true">Save updates</button>
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
        </div>

        <!-- Bootrstrap modal form-->
        <div id="gModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <form action="<?= base_url() ?>master_data/add_akta" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Buat Nama Akta</h3>
                </div>
                <div class="row-form">
                    <input type="hidden" name="NAMA" value="">
                    <input type="hidden" id="dokumen" name="DOKUMENID" value="">
                    <div class="span4">Nama Akta:</div>
                    <div class="span4"><input type="text" value="" name="nama_akta"></div>
                </div>
                <div class="modal-footer">
                    <?php //echo form_submit('submit','Save');?>
                    <button type="submit" class="btn btn-primary">Save</button>

                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>
        </div>
    </body>
</html>
<script language="javascript">

    function modalToogler(aktaId)
    {
        document.getElementById('delete').href = '<?= base_url() ?>control/delete/delete_akta/' + aktaId;

    }
    
    function modalToogler2(aktaId, aktadesc){
        document.getElementById('AKTAID').value=aktaId;
        document.getElementById('NAMAAKTA').value=aktadesc;
    }
</script>