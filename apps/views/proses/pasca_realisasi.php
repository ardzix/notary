<?php
/*
 * Project Name: notary
 * File Name: pasca_realisasi
 * Created on: 15 Jan 14 - 12:55:32
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
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

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-layout-7"></span>
                        </div>
                        <h1>Proses<small> Pra-Realisasi</small></h1>
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
                                <div class="data-fluid tabbable">                    
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab1" data-toggle="tab">Monitoring</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Eskalasi</a></li>
                                        <li><a href="#tab3" data-toggle="tab">Approval</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="span12">
                                                <div class="alert alert-block">                
                                                    Cari Data Realisasi
                                                </div>
                                                <div class="head dblue">
                                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                                    <h2>Data Realisasi</h2>
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
                                                                <th width="15%">No. Covernote</th>
                                                                <th width="20%">TransaksipraID</th>
                                                                <th width="20%">Nama</th>
                                                                <th width="20%">Tgl. Akad</th>

                                                                <th width="15%" class="TAC">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($transcover as $cn) { ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?>
                                                                    </td>
                                                                    <td><?php echo $cn->NOCOVERNOTE; ?>
                                                                    </td>
                                                                    <td><?php echo $cn->TRANSAKSIPRAID; ?>
                                                                    </td>
                                                                    <td><?php
                                                                        $dat = $this->m_customertrans->getCustIdFromTransId($cn->TRANSAKSIPRAID);
                                                                        foreach ($dat as $dt) {
                                                                            //echo $dt->TRANSAKSIPRAID;
                                                                            $cs = $this->m_customer->getDataById($dt->CUSTOMERID);
                                                                            echo $cs->NAMACUST;
                                                                            echo ', ';
                                                                        };
                                                                        //$cid=$this->m_transaksipra->getDataById($cn->TRANSAKSIPRAID)->CUSTOMERID;
                                                                        //$cusid = $this->m_customer->getDataById($cid);
                                                                        //echo $cusid->NAMACUST;
                                                                        ?>
                                                                    </td>
                                                                    <td><?php $tgl = $cn->TGLAKAD;
                                                                    $newtgl = date("d-m-Y", strtotime($tgl));
                                                                    echo $newtgl; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $cID = $cn->COVERNOTEID;
                                                                        if ($cID == null) {
                                                                            $cID = 'kosong';
                                                                        }
                                                                        $tID = $cn->TRANSAKSIPRAID;
                                                                        if ($tID == null) {
                                                                            $tID = 'kosong';
                                                                        }
                                                                        ?>

                                                                        <a href="<?php echo base_url() . 'proses/detail_pasca_realisasi/' . $cID . '/' . $tID; ?>" class="button purple tip" data-original-title="Detail">
                                                                            <div class="icon"><span class="icon-list icon-white"></span></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
    <?php $no++;
}; ?>
                                                        </tbody>
                                                    </table>                    
                                                </div> 
                                            </div>   
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <div class="span12">
                                                <div class="alert alert-block">                
                                                    Cari Data Realisasi
                                                </div>
                                                <div class="head dblue">
                                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                                    <h2>Data Realisasi</h2>
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
                                                                <th width="15%">No. Covernote</th>
                                                                <th width="20%">TransaksipraID</th>
                                                                <th width="20%">Nama</th>
                                                                <th width="20%">Tgl. Akad</th>

                                                                <th width="15%" class="TAC">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                    <?php $no = 1;
                                                                    foreach ($transcover as $cn) { ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?>
                                                                    </td>
                                                                    <td><?php echo $cn->NOCOVERNOTE; ?>
                                                                    </td>
                                                                    <td><?php echo $cn->TRANSAKSIPRAID; ?>
                                                                    </td>
                                                                    <td><?php
                                                                    $dat = $this->m_customertrans->getCustIdFromTransId($cn->TRANSAKSIPRAID);
                                                                    foreach ($dat as $dt) {
                                                                        //echo $dt->TRANSAKSIPRAID;
                                                                        $cs = $this->m_customer->getDataById($dt->CUSTOMERID);
                                                                        echo $cs->NAMACUST;
                                                                        echo ', ';
                                                                    };
                                                                    //$cid=$this->m_transaksipra->getDataById($cn->TRANSAKSIPRAID)->CUSTOMERID;
                                                                    //$cusid = $this->m_customer->getDataById($cid);
                                                                    //echo $cusid->NAMACUST;
                                                                    ?>
                                                                    </td>
                                                                    <td><?php echo $cn->TGLAKAD; ?>
                                                                    </td>
                                                                    <td>
                                                                <?php
                                                                $cID = $cn->COVERNOTEID;
                                                                if ($cID == null) {
                                                                    $cID = 'kosong';
                                                                }
                                                                $tID = $cn->TRANSAKSIPRAID;
                                                                if ($tID == null) {
                                                                    $tID = 'kosong';
                                                                }
                                                                ?>
                                                                        <a href="<?php echo base_url() . 'proses/detail_covernote/'; ?>" class="button yellow tip jDialog_form_button"  data-original-title="Pick">
                                                                            <div class="icon"><span class="ico-hand-up"></span></div>
                                                                        </a>		
                                                                        <a data-toggle="modal" href="#dModal" role="button" onClick="display_data('<?php echo $cn->TRANSAKSIPRAID; ?>')" class="button purple tip" data-original-title="Detail">
                                                                            <div class="icon"><span class="icon-list icon-white"></span></div>
                                                                        </a>
                                                                    </td>
                                                                </tr>
    <?php $no++;
}; ?>
                                                        </tbody>
                                                    </table>                    
                                                </div> 
                                            </div> 
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <div class="span12">
                                                <div class="alert alert-block">                
                                                    Cari Data Realisasi
                                                </div>
                                                <div class="head dblue">
                                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                                    <h2>Data Realisasi</h2>
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
                                                                <th width="15%">No.Covernote</th>
                                                                <th width="20%">TransaksipraID</th>
                                                                <th width="20%">Nama</th>
                                                                <th width="20%">Tgl.Akad</th>

                                                                <th width="15%" class="TAC">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><a href="#">1234567</a></td>
                                                                <td>Asep</td>
                                                                <td>SHM</td>
                                                                <td>1-1-2014</td>
                                                                <td><span class="label label-important">Alerted</span></td>
                                                                <td>
                                                                    <a href="#" class="button purple tip" data-original-title="Eskali">
                                                                        <div class="icon"><span class="icon-resize-full"></span></div>
                                                                    </a>
                                                                    <a href="<?= base_url(); ?>proses/pasca_realisasi/pick_eskalasi" class="button yellow tip" data-original-title="Approve">
                                                                        <div class="icon"><span class="ico-thumbs-up"></span></div>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>                    
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
<?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>
            </div>
        </div>
        <!-- mulai modal-->
        <div id="dModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


            <div id="data_c">



            </div>


        </div>

        <!-- akhir modal-->
    </body>
</html>
<script>
    function modalToogler(dokId)
    {
        display_data(id);
    }
    function display_data(id) {
        xmlhttp4 = GetXmlHttpObject4();
        if (xmlhttp4 == null)
        {
            alert("Your browser does not support AJAX!");
            return;
        }
        var url = "<?php echo base_url(); ?>proses/AjaxDetailEkskalasi";
        url = url + "/" + id;
        xmlhttp4.onreadystatechange = function()
        {
            if (xmlhttp4.readyState == 4 || xmlhttp4.readyState == "complete")
            {
                document.getElementById('data_c').innerHTML = xmlhttp4.responseText;
            }
        }
        xmlhttp4.open("POST", url, true);
        xmlhttp4.send(null);
    }

    function GetXmlHttpObject4() {
        var xmlhttp4 = null;
        try {
            // Firefox, Opera 8.0+, Safari
            xmlhttp4 = new XMLHttpRequest();
        }
        catch (e) {
            // Internet Explorer
            try {
                xmlhttp4 = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e) {
                xmlhttp4 = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlhttp4;
    }


</script>