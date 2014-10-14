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
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
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
                            <span class="ico-plus-sign"></span>
                        </div>
                        <h1>Proses Master<small> Tipe Sertifikat</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">                    
                                    
                                    <div class="span6">
                                        <div class="block">
                                            <div class="head">                                
                                                <h2>Input Tipe Sertifikat Baru</h2>                                
                                            </div>
                                            <form  id="validate" method="post" action="<?= base_url() ?>control/add/tipe_sertifikat">
                                                <div class="data-fluid">
                                                    <div class="row-form">
                                                        <div class="span4">Tipe Sertifikat:</div>
                                                        <div class="span8"><input class="validate[required]" type="text" name="TYPESERTIFIKAT" placeholder="Masukan Tipe Sertifikat Baru"/></div>
                                                    </div>
                                                    <div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit" onClick="$('#validate').validationEngine('hide');">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Tipe Sertifikat</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination');
                                                            return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" class="checkall"/></th>
                                                            <th width="50%">Tipe Sertifikat</th>
                                                            <th width="50%" class="TAC">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($tipesertifikat as $row):
                                                            ?>
                                                            <tr>
                                                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                                                <td><?= $row->TYPESERTIFIKATDESC ?></td>
                                                                <td>

                                                                    <a href="<?= base_url() ?>master_data/proses_master/tipe_sertifikat/edit/<?= $row->TYPESERTIFIKATID ?>" class="button green tip" data-original-title="Edit">
                                                                        <div class="icon"><span class="ico-pencil"></span></div>
                                                                    </a>
                                                                    <a href="#bModal" role="button" class="button red tip" data-original-title="Delete" data-toggle="modal" onclick="hapus('<?= $row->TYPESERTIFIKATID ?>')"> 
                                                                        <div class="icon"><span class="ico-remove"></span></div> 
                                                                    </a>

                                                                </td>
                                                            </tr>  
                                                            <?php
                                                        endforeach;
                                                        ?>                            
                                                    </tbody>
                                                </table>                    
                                            </div>
                                        </div> 
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <br>&nbsp;
                <?= $this->load->view('slice/tambal'); ?>
            </div>
        </div>
    </div>
</div>
<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
        <h3 id="myModalLabel">Apakah anda yakin ingin menghapus data ini?</h3> 
    </div> 
    <div class="modal-body"><p>Peringatan! Data yang telah terhapus tidak akan bisa dikembalikan lagi.</p></div> 
    <div class="modal-footer"> 
        <a id="tipe_sertifikat" href=""> 
            <button class="btn btn-warning" aria-hidden="true">Delete</button> 
        </a> 
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> 
    </div> 
</div>
<script>
    function hapus(tipe_sertifikat) {
        document.getElementById('tipe_sertifikat').href = '<?= base_url() ?>control/delete/delete_tipe_sertifikat/' + tipe_sertifikat;
    }
</script>
</body>
</html>

