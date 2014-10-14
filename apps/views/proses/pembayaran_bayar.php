<?php
/*
 * Project Name: notary
 * File Name: lihat
 * Created on: 20 Jan 14 - 8:19:32
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>
        <script type='text/javascript' src="<?= NOTARY_ASSETS ?>js/plugins/select/select2.min.js"></script>

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

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-plus-sign"></span>
                        </div>
                         <h1>Pembayaran</h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span12">                
                            <div class="block">
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <li><a href="<?= base_url() ?>proses/pembayaran/lihat/">Lihat</a></li>
                                        <li><a href="<?= base_url() ?>proses/pembayaran/simulasi">Simulasi</a></li>
                                        <li class="active"><a href="<?= base_url() ?>proses/pembayaran/bayar">Bayar</a></li>
                                        <li><a href="<?= base_url() ?>proses/pembayaran/ditail_pembayaran">Ditail Pemabayaran</a></li>
                                    </ul>
                                 <div class="span10">
                                        <fieldset>
                                            <legend>Hasil Pencarian:</legend>
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2></h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination');
                                                        return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>
                                        </fieldset>
                                        <table class="table fpTable lcnp" cellpadding="0" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" class="checkall"/></th>
                                                    <th width="20%">Nomer Cover Note</th>
                                                    <th width="20%">Nama</th>
                                                    <th width="20%">Proses</th>
                                                    <th width="20%">Tgl Selesai</th>
                                                    <th width="15%">Status</th>
                                                    <th width="5%" class="TAC">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table> 
                                        <br><br><br>
                                    </div>

                                    <div class="span6">
                                        <fieldset>
                                            <legend>Hasil Pencarian:</legend>
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2></h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination');
                                                        return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>
                                        </fieldset>
                                        <table class="table fpTable lcnp" cellpadding="0" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" class="checkall"/></th>
                                                    <th width="10%">Nomer</th>
                                                    <th width="30%">Proses</th>
                                                    <th width="30%">Status Simulasi</th>
                                                    <th width="15%">Biaya</th>
                                                    <th width="5%" class="TAC">Actions</th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                                 <tr>
                                                    <td><a href="#"></a></td>
                                                    <td>KBB</td>
                                                    <td>3</td>
                                                    <td>Bulan</td>
                                                    <td>Bulan</td>
                                                    <td>
                                                        <a href="#bModal" role="button" class="button green tip" data-original-title="Delete" data-toggle="modal" data-original-title="Edit">
                                                            <div class="icon"><span class="ico-pencil"></span></div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>  
                                    </div>
                                    <div class="span6"></div>
                                    <div class="span6">
                                        <table cellpadding="0" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="10%"></th>
                                                    <th width="30%"></th>
                                                    <th width="30%"></th>
                                                    <th width="15%">Total:</th>
                                                    <th width="5%" >4.500.000</th>
                                                </tr>
                                                <tr>
                                                    <th width="10%"></th>
                                                    <th width="30%"></th>
                                                    <th width="30%"></th>
                                                    <th width="15%">Sudah Dibayar:</th>
                                                    <th width="5%" >1.500.000</th>
                                                </tr>
                                                <tr>
                                                    <th width="10%"></th>
                                                    <th width="30%"></th>
                                                    <th width="30%"></th>
                                                    <th width="15%">Sisa:</th>
                                                    <th width="5%" >3.000.000</th>
                                                </tr>
                                            </thead>
                                             <tbody>


                                            </tbody>
                                        </table>  
                                    </div>
                                    <div class="span6"></div>
                                    <div class="span6">
                                        <div style="border: #000080 solid 1px;width: 515px; height: 48px; border-radius:5px;">
                                            <table>
                                                <tr>
                                                    <td><h5 style="margin-top: 3px;margin-left: 60px;">Tetapkan pembayaran?</h5></td>
                                                    <td><form><div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit" style="width: 50px;">Ok</button>
                                                        </div>
                                                    </div></form></td>
                                                    <td><form><div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit" style="width: 50px;">Batal</button>
                                                        </div>
                                                    </div></form></td>
                                                    <td><form><div class="toolbar bottom tar">
                                                        <div class="btn-group">
                                                            <button class="btn" type="submit" style="width: 50px;">Cetak</button>
                                                        </div>
                                                    </div></form></td>
                                                </tr>
                                            </table>
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
        <h3 id="myModalLabel">Apakah anda yakin ingin memperbaharui data ini?</h3> 
    </div> 
    <div class="modal-body">
        <form>
            <table align="center">
                <tr>
                    <td>Nomer:</td>
                    <td><input type="text" style="width:300px;" class="validate[required]" placeholder="Masukan Nomer"/></td>
                </tr>
                 <tr>
                    <td>Proses:</td>
                    <td><input type="text" style="width:300px;" class="validate[required]" placeholder="Masukan Proses"/></td>
                </tr>
                 <tr>
                    <td>Status Simulasi:</td>
                    <td><input type="text" style="width:300px;" class="validate[required]" placeholder="Masukan Status Simulasi"/></td>
                </tr>
                <tr>
                    <td>Satuan:</td>
                    <td><select style="width:300px;"><option>Hari</option><option>Minggu</option><option>Bulan</option></select></td>
                </tr>
            </table>
        </form>
    </div> 
    <div class="modal-footer"> 
        <a href=""> 
            <button class="btn btn-group" aria-hidden="true">Update</button> 
        </a> 
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button> 
    </div> 
</div>
</body>
</html>
