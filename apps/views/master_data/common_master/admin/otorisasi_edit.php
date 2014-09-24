<?php
/*
 * Project Name: notary
 * File Name: admin_edit_akun
 * File Directory: Expression filedir is undefined on line 5, column 22 in Templates/Scripting/EmptyPHP.php.
 * Created on: 07 Jan 14 - 14:58:43
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
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
                        <h1>EDIT<small> Admin Master Data</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">                

                            <div class="block">
                                <div class="head">                                
                                    <h2>Edit Otorisasi Akun</h2>                                
                                </div>                                        
                                <div class="data-fluid">
                                    <form action="<?= base_url() ?>control/edit/otorisasi_akun" method="post">
                                        <input type="hidden" name="USERID" value="<?= $user['USERID']?>">
                                        <div class="row-form">
                                            <div class="span4">Akun:</div>
                                            <div class="span8"><input type="text" NAME="USERNAME" value="<?= $user['USERNAME'] ?>" disabled/></div>
                                        </div>
                                        <div class="row-form">
                                            <div class="span4">Curent:</div>
                                            <div class="span8"><input type="text" value="<?= $this->model_translate->dynamicTranslate('otoritas', 'OTORITASID', $user['OTORITASID'], 'OTORITASDESC') ?>" disabled/></div>
                                        </div>
                                        <div class="row-form">
                                            <div class="span4">Otorisasi Baru:</div>
                                            <div class="span8">
                                                <select class="select" name="OTORITASID">
                                                    <option value="<?= $user['OTORITASID'] ?>"><?= $this->model_translate->dynamicTranslate('otoritas', 'OTORITASID', $user['OTORITASID'], 'OTORITASDESC') ?></option>
                                                    <?php foreach ($otoritas as $row):
                                                        ?>
                                                    <option value="<?= $row->OTORITASID ?>"><?= $row->OTORITASDESC ?></option>
                                                    <?php
                                                    endforeach;
                                                    ?>                                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="toolbar bottom tar">
                                            <div class="btn-group">
                                                <button class="btn" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>