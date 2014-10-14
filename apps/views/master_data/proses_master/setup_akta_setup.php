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
                        <div class="icon">
                            <span class="ico-pencil"></span>
                        </div>
                        <h1>Proses Master<small> Setup Akta</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">                

                            <div class="block">
                                <div class="head">                                
                                    <h2>Setup Akta</h2>                                
                                </div>                                        
                                <div class="data-fluid">
                                    <?php echo form_open('master_data/addAktaToProses'); ?>
                                    <div class="row-form">
                                        <div class="span4">Akta ID:</div>
                                        <div class="span8"><input type="text" value="<?php echo $akta->AKTAID ?>" name="akta_id" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Nama Akta:</div>
                                        <div class="span8"><input type="text" value="<?php echo $akta->AKTADESC ?>" disabled/></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span4">Proses:</div>
                                        <div class="span8">
                                            <?php
                                            $class = 'class="select"';
                                            //$js=array('id'=>'model_id', 'onChange'='show_lighboxModel('.$mod->model)_id.')');
                                            $npros = $this->m_proses->getNullAktaProses($this->uri->segment(5));
                                            if ($npros != null) {
                                                foreach ($npros as $pros) {
                                                    $p[$pros->PROSESID] = $pros->PROSESDESC;
                                                }
                                                echo form_dropdown('proses', $p, '', $class);
                                                ?>
                                            </div>
                                        <?php } else {
                                            ?>
                                            <input type="text" value="Proses tidak tersedia" disabled/></div>
                                        <div class="row-form">
                                            <div class="span4"></div>
                                            <div class="span8" class="bl_blue">
                                                <a href="<?php echo base_url(); ?>master_data/proses_master/setup_proses" class="btn">new</a>
                                                <i class="label label-info">*silahkan tambah proses </i>
                                            </div>
                                        </div>	
                                    <?php }
                                    ?>
                                </div>

                                <div class="row-form">
                                    <div class="span4">No Urut:</div>
                                    <div class="span8"><input type="text" name="no_urut" required/></div>
                                </div>
                                <input type="hidden" value="<?php echo $akta->AKTAID ?>" name="akta" />
                                <div class="row-form">
                                    <div class="span4"></div>
                                    <div class="span8">
                                        <?php if ($npros == null) { ?>

                                            <button class="btn btn-primary" id='submit' disabled>Save</button>
                                        <?php } else { ?>
                                            <button class="btn btn-primary" id='submit'>Save</button>
                                        <?php }; ?>
                                        <a href="<?php echo base_url(); ?>master_data/proses_master/setup_akta" class="btn btn-warning">Close</a>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="span5">                
                        <br />
                        <br />
                        <div class="block"><div class="data-fluid">
                                <table class="table  lcnp dataTable" cellpadding="0" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th width="40%">Proses</th>
                                            <th width="30%">No. Urut</th>
                                            <th width="30%" class="TAC">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ps = $this->m_proses->getDataProsesAkta($akta->AKTAID);
                                        foreach ($ps as $s) {
                                            ?>	
                                            <tr>

                                                <td><?php echo $this->model_translate->dynamicTranslate('proses', 'PROSESID', $s->PROSESID, 'PROSESDESC') ?></td>
                                                <td><?php echo $s->NOMORURUT; ?></td>
                                                <td>
                                                    <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onClick="modalToogler('<?= $akta->AKTAID ?>', '<?= $s->PROSESID ?>')">
                                                        <div class="icon"><span class="ico-remove"></span></div>
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
<?php echo form_open('master_data/deleteProsesAkta'); ?>
            <input type="hidden" id="id_akta" name="id_akta" />
            <input type="hidden" id="id_proses" name="id_proses" />

            <button class="btn btn-warning" aria-hidden="true">Delete</button>

            <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a> 
<?php echo form_close(); ?>
        </div>
    </div>
</body>
</html>
<script language="javascript">

    function modalToogler(aktaId, prosesId)
    {

        document.getElementById('id_akta').value = aktaId;
        document.getElementById('id_proses').value = prosesId;

    }
</script>

