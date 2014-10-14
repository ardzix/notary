<?php
/*
 * Project Name: notary
 * File Name: konfigurasi_menu
 * Created on: 23 Jan 14 - 9:06:40
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
        <!--[if gt IE 8]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />        
        <![endif]-->                
        <title><?= $title ?></title>
        <link rel="icon" type="image/ico" href="favicon.ico"/>

        <link href="<?= NOTARY_ASSETS ?>css/stylesheets.css" rel="stylesheet" type="text/css" />
        <!--[if lte IE 7]>
            <link href="<?= NOTARY_ASSETS ?>css/ie.css" rel="stylesheet" type="text/css" />
            <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/other/lte-ie7.js'></script>
        <![endif]-->    
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/jquery/jquery-1.9.1.min.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/jquery/globalize.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/other/excanvas.js'></script>

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/other/jquery.mousewheel.min.js'></script>

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/bootstrap/bootstrap.min.js'></script>

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/uniform/jquery.uniform.min.js'></script>

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/shbrush/XRegExp.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/shbrush/shCore.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/shbrush/shBrushXml.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/shbrush/shBrushJScript.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/shbrush/shBrushCss.js'></script>

        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/charts.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/actions.js'></script>

        <!--jss untuk notifikasi -->
        <link rel="stylesheet" href="<?= NOTARY_ASSETS ?>css/jquery.gritter.css" type="text/css">
        <script type="text/javascript" src="<?= NOTARY_ASSETS ?>js/jquery.gritter.js"></script>
        <script>
            
            var x = 1;

            function cek() {
                $.ajax({
                    url: "<?php echo base_url(); ?>notifikasi/cekNotifikasi",
                    cache: false,
                    success: function(msg) {

                        var pisah = msg.split("|");
                        if (pisah[6] == null) {
                        }
                        else
                        {
                            if (pisah[4] == "1") {
                            }
                            else {

                                tampildataNotif(msg); //memanggil function tampildataNotif untuk menampilkan Notif Popup
                            }
                        }
                        //	$("#notifikasi").html(pisah[0]);
                    }
                });
                var waktu = setTimeout("cek()", 3000);
            }

            function tampildataNotif(datanya) {
                var pisah = datanya.split("|");
                var dataId = "";
                dataId = pisah[6];
                $.gritter.add({
                    title: pisah[5],
                    text: pisah[4],
                    sticky: false,
                    //image: 'gambar/nopic.jpg',
                    //time: '',
                    class_name: 'gritter-light',
                    before_open: function() {
                        if ($('.gritter-item-wrapper').length == 1)
                        {

                            return false;
                        }
                    },
                    after_open: function(e) {
                        bunyiNotif();
                    },
                    after_close: function(e, manual_close) {
                        simpandataTerkirim(dataId)

                    }
                });

                return false;

            }

            function simpandataTerkirim(dataID)
            {
                var code = "1";
                $.ajax(
                        {
                            type: "POST",
                            url: "<?php echo base_url(); ?>notifikasi/success/" + dataID,
                            data: "code=" + code + "&IDnotif=" + dataID,
                            cache: false,
                            success: function(message)
                            {

                            }
                        });
            }

            $(document).ready(function() {
                $.extend($.gritter.options, {// for light notifications (can be added directly to $.gritter.add too)
                    position: 'bottom-left',
                    fade_out_speed: 3000 // how fast the notices fade out
                });
                cek();
                $("#pesan").click(function() {
                    $("#loading").show();
                    if (x == 1) {
                        $("#pesan").css("background-color", "#efefef");
                        x = 0;
                    } else {
                        $("#pesan").css("background-color", "#4B59a9");
                        x = 1;
                    }
                    $("#info").toggle();
                    //ajax untuk menampilkan pesan yang belum terbaca
                    $.ajax({
                        url: "lihatpesan.php",
                        cache: false,
                        success: function(msg) {
                            $("#loading").hide();
                            $("#konten-info").html(msg);
                        }
                    });

                });
                $("#content").click(function() {
                    $("#info").hide();
                    // $("#pesan").css("background-color","#4B59a9");
                    x = 1;
                });
            });


            function bunyiNotif() {
                var sound1 = "assets/sound/x.ogg";
                var sound2 = "assets/sound/x.mp3";
                $('<audio id="chatAudio"><source src="' + sound1 + '" type="audio/ogg"><source src="' + sound2 + '" type="audio/mpeg"><source src="' + sound3 + '" type="audio/wav"></audio>').appendTo('body');
                $('#chatAudio')[0].play();
            }
        </script>


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
                        <div align="center"><strong>[Pemberitahuan]</strong> Konfigurasi menu berhasil diupdate!</div>
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
                        <h1>Admin <small> Master Data</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="head">
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('tabs');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                
                                </div> 
                                <ul class="nav nav-tabs">
                                    <!-----------------------------------------------------------
                                    AKUN
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 37));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/akun">Akun</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    OTORISASI
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 38));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/otorisasi">Otorisasi</a></li>
                                        <?php
                                    }
                                    ?>    
                                    <!-----------------------------------------------------------
                                    DATA CUSTOMER
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 39));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/customer">Data Customer</a></li>
                                        <?php
                                    }
                                    ?>
                                    <!-----------------------------------------------------------
                                    DATA EMPLOYEE
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 40));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li><a href="<?= base_url() ?>master_data/common_master/admin/employee">Data Employee</a></li>
                                        <?php
                                    }
                                    ?>   
                                    <!-----------------------------------------------------------
                                    KONFIGURASI MENU
                                    ------------------------------------------------------------>
                                    <?php
                                    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 41));

                                    $menuid1 = $qry['allow'];

                                    if ($menuid1 != 1) {
                                        ?>
                                        <li class="active"><a href="<?= base_url() ?>master_data/common_master/admin/konfigurasi_menu">Konfigurasi Menu</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="span5">
                                    <div class="data-fluid">
                                        <form action="<?= base_url() ?>control/edit/konfigurasi_menu" method="post">
                                            <div class="row-form">
                                                <div class="span4">Otorisasi:</div>
                                                <div class="span8">
                                                    <select name="OTORITASID" id="OTORITASID">
                                                        <option value="0">choose a option...</option>
                                                        <?php foreach ($otoritas as $row):
                                                            ?>
                                                            <option value="<?= $row->OTORITASID ?>"><?= $row->OTORITASDESC ?></option>
                                                            <?php
                                                        endforeach;
                                                        ?>                                                                   
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row-form">
                                                <div class="block" id="pilihMenu">
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
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>
        <script>
            $("#OTORITASID").change(function(){
                var otoId = $("#OTORITASID").val();
                var data = {otoId: otoId};
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>master_data/common_master/admin/konfigurasi_menu/list",
                    data: data,
                    success: function(msg) {
                        $('#pilihMenu').html(msg);
                    }
                });
                document.location = "#pilihMenu";
            
            });
        </script>
    </body>
</html>