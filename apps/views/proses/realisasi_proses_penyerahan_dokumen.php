<?php

/*
 * Project Name: notary
 * File Name: realisasi_proses_penyerahan_dokumen
 * Created on: 13 Jan 14 - 8:56:13
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->load->view('slice/header-content'); ?>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/multiselect/jquery.multi-select.min.js'></script>
        <script type='text/javascript'>
            function showDiv() {
                document.getElementById('upload_doc').style.visibility = "visible";
            }
        </script>
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
                        <h1>Proses<small> Realisasi</small></h1>
                    </div>
                    <div class="row-fluid">

                        <div class="span6">                

                            <div class="block">
                                <div class="head">                                
                                    <h2>Proses Penyerahan Dokumen</h2>                                
                                </div>                                        
                                <div class="data-fluid">

                                    <div class="row-form">
                                        <div class="span4">No. Pra-Realisasi:</div>
                                        <div class="span8"><input type="text" name="test" value="987987987" disabled/></div>
                                    </div>
                                    <div class="toolbar bottom tar">
                                        <div class="btn-group">
                                            <button class="btn" type="submit" onclick="showDiv()">Tampilkan Proses Upload File</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="upload_doc"  style="visibility: hidden">
                            <div class="span10">  
                                <div class="block">
                                    <div class="head green">
                                        <div class="icon"><span class="ico-brush"></span></div>
                                        <h2>Copy Dokumen Yang diserahkan:</h2>    
                                        <ul class="buttons">
                                            <li><a onclick="source('table_hover_check'); return false;" href="#"><div class="icon"><span class="ico-info"></span></div></a></li>
                                        </ul>                                                          
                                    </div>                
                                    <div class="data-fluid">
                                        <table width="100%" cellspacing="0" cellpadding="0" class="table table-hover">
                                            <thead>
                                                <tr class="">
                                                    <th width="10%">No.</th>
                                                    <th width="20%">Jenis Dokumen</th>
                                                    <th width="10%">Check</th>
                                                    <th width="25%">Asli</th>
                                                    <th width="35%" id="tengah">Scanned File</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td>1</td>
                                                    <td>KTP</td>
                                                    <td><input type="checkbox" value="1" style="opacity: 0;"></td>
                                                    <td><input type="checkbox" value="1" style="opacity: 0;"></td>
                                                    <td>
                                                        <div class="row-form">
                                                            <div class="span9">                            
                                                                <div class="input-append file">
                                                                    <input type="file" name="file" style="width: 256px;">
                                                                    <input type="text" style="width: 269px;">
                                                                    <button class="btn">Browse</button>
                                                                </div>                            
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>                            
                                            </tbody>
                                        </table>
                                    </div>                
                                </div>
                                <div class="btn-group">
                                    <button class="btn" type="submit">Proses</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?= $this->load->view('slice/tambal'); ?>
                </div>
            </div>
        </div>
    </body>
</html>