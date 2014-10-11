<?php
/*
 * Project Name: notary
 * File Name: header-menu
 * Created on: 07 Jan 14 - 8:12:50
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>
<?php
if ($this->session->flashdata('delete')) {
    ?>
    <div class="alert alert-error">            
        <div align="center"><strong>[Pemberitahuan]</strong> Data berhasil dihapus!</div>
    </div>
    <?php
} elseif ($this->session->flashdata('error_exist')) {
    ?>
    <div class="alert alert-error">            
        <div align="center"><strong>[Pemberitahuan]</strong> Data sudah ada di database!</div>
    </div>
    <?php
} elseif ($this->session->flashdata('alert_delete_rek')) {
    ?>   
    <div class="alert alert-error">            
        <div align="center"><strong>[Peringatan]</strong> Data yang ingin anda hapus masih terkait dengan data Bank Rekening, harap hapus terlebih dahulu data bank rekening terkait.</div>
    </div>
    <?php
} elseif ($this->session->flashdata('alert_delete_rek2')) {
    ?>   
    <div class="alert alert-error">            
        <div align="center"><strong>[Peringatan]</strong> Data yang ingin anda hapus masih terkait dengan data Pemilik Rekening, harap hapus terlebih dahulu data pemilik rekening terkait.</div>
    </div>
    <?php
}
?>
<ul class="navigation">
    <?php
    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 1));

    $menuid1 = $qry['allow'];

    if ($menuid1 != 1) {
        ?>
        <li>
            <a href="<?= base_url() ?>notifikasi" class="button kuning">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/notifikasi.svg'?>">                   
                <div class="name">Notifikasi</div>
            </a>                
        </li>
        <?php
    }
    ?>

    <?php
    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 2));

    $menuid2 = $qry['allow'];

    if ($menuid2 != 1) {
        ?>
        <li>
            <a href="<?= base_url() ?>proses" class="button oren">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/proses.svg'?>">                    
                <div class="name">Proses</div>
            </a> 
        </li>
        <?php
    }
    ?>

    <?php
    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 7));

    $menuid7 = $qry['allow'];

    if ($menuid7 != 1) {
        ?>
        <li>
            <a href="<?= base_url() ?>master_data" class="button merah">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/master_data.svg'?>">                     
                <div class="name">Master Data</div>
            </a>                                   
        </li>
        <?php
    }
    ?>

    <?php
    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 13));

    $menuid13 = $qry['allow'];

    if ($menuid13 != 1) {
        ?>
        <li>
            <a href="<?= base_url() ?>kinerja" class="button ungu">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/kinerja.svg'?>">                  
                <div class="name">Kinerja</div>
            </a>                
        </li>
        <?php
    }
    ?>
    <?php
    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 14));

    $menuid14 = $qry['allow'];

    if ($menuid14 != 1) {
        ?>
        <li>
            <a href="<?= base_url() ?>laporan" class="button biru">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/laporan.svg'?>">                    
                <div class="name">Laporan</div>
            </a>                                
        </li>
        <?php
    }
    ?>
    <?php
    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 15));

    $menuid15 = $qry['allow'];

    if ($menuid15 != 1) {
        ?>
        <li>
            <a href="<?= base_url() ?>chating" class="button birugelap">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/bincang.svg'?>">                  
                <div class="name">Chat</div>
            </a>                                
        </li>
        <?php
    }
    ?>
    <?php
    $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 16));

    $menuid16 = $qry['allow'];

    if ($menuid16 != 1) {
        ?>
        <li>
            <a href="<?= base_url() ?>help" class="button tosca">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/help.svg'?>">                    
                <div class="name">Help</div>
            </a>                                  
        </li>
        <?php
    }
    ?> 
        <li>
            <a href="<?= base_url() ?>auth/logout" class="button hijau">
                <img class="icon2" src="<?= NOTARY_ASSETS.'menu/logout.svg'?>">                    
                <div class="name">Logout</div>
            </a>                                  
        </li>
    <li>
        <div class="user">
            <img src="<?= NOTARY_ASSETS ?>img/examples/users/Muhammad Arif Fathurohman.jpg" align="left"/>
            <a href="#" class="name">
                <span><?php
                    $username = $this->model_core->get_where_array('user', array('USERID' => $this->session->userdata('USERID')));
                    if ($username['USERNAME'] == null) {
                    echo '';
                    } else {
                    echo $username['USERNAME'];
                    }
                    ?></span>
                <span class="sm">
                    <?php
                    $otoritas = $this->model_translate->dynamicTranslate('otoritas', 'OTORITASID', $username['OTORITASID'], 'OTORITASDESC');
                    echo $otoritas;
                    ?>
                </span>
            </a>
        </div>
    </li>
</ul>

<div class="page-header">
    <?php echo set_breadcrumb(); ?>
</div>