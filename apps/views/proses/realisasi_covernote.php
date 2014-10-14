<?php
/*
 * Project Name: notary
 * File Name: realisasi_covernote
 * Created on: 29 Jan 14 - 8:22:37
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
                        <div align="center"><strong>[Pemberitahuan]</strong> Data covernote berhasil disimpan!</div>
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
                        <h1>Proses<small> Realisasi</small></h1>
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
                                        <!-----------------------------------------------------------
                                        PENJADWALAN
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 23));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/realisasi/penjadwalan">Penjadwalan</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        PENYERAHAN DOKUMEN
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 24));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li><a href="<?= base_url() ?>proses/realisasi/penyerahanDokumen">Penyerahan Dokumen</a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-----------------------------------------------------------
                                        COVERNOTE
                                        ------------------------------------------------------------>
                                        <?php
                                        $qry = $this->model_core->get_where_array('otoritasmenu', array('OTORITASID' => $this->session->userdata('OTORITASID'), 'MENUID' => 25));

                                        $menuid1 = $qry['allow'];

                                        if ($menuid1 != 1) {
                                            ?>
                                            <li class="active"><a href="<?= base_url() ?>proses/realisasi/covernote">Cover Note</a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="span12">
                                            <div class="head dblue">
                                                <div class="icon"><span class="ico-layout-9"></span></div>
                                                <h2>Data Transaksi Pra-Realisasi</h2>
                                                <ul class="buttons">
                                                    <li><a href="#" onClick="source('table_sort_pagination');
                                                            return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                                </ul>                                                        
                                            </div>                
                                            <div class="data-fluid">
                                                <div class="alert alert-success">            
                                                    <strong>Klik Pick!!</strong> Pada data transkasi yang ingin dibuatkan covernotenya. . .
                                                </div>
                                                <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                                    <thead>
                                                        <?php $no = 1; ?>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="15%">Transaksi ID</th>
                                                            <th width="15%">Nama Debitur</th>
                                                            <th width="15%">No Covernote</th>
                                                            <th width="20%">Bank</th>
                                                            <th width="20">Developer</th>
                                                            <th width="10%" class="TAC">Actions</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($transaksipra as $tp) {
                                                            $ncn = $this->m_covernote->getDataCovFromTranId($tp->TRANSAKSIPRAID);
                                                            if ($ncn == null) {
                                                                ?>
                                                                <tr>
                                                                    <td>
        <?php echo $no; ?>
                                                                    </td>
                                                                    <td>
        <?php echo $tp->TRANSAKSIPRAID; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $dat = $this->m_customertrans->getCustIdFromTransId($tp->TRANSAKSIPRAID);
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
                                                                    <?php /* if ($ncn==null)
                                                                      { */ ?>
                                                                    <td>

                                                                        <span class="label label-important"><i>Belum ada covernote</i></span>

                                                                        <?php /* }else
                                                                          {
                                                                          foreach($ncn as $n)
                                                                          {
                                                                          echo $n->NOCOVERNOTE;
                                                                          echo '<br>';
                                                                          }
                                                                          } */
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $bank = $this->m_bankrekening->getDataById($tp->BANKREKID);

                                                                        if ($bank == null) {
                                                                            ?>
                                                                            <i>Tidak ada Bank</i>
                                                                        <?php
                                                                        } else {
                                                                            if ($bank->BANKREKDESC == null) {
                                                                                ?>
                                                                                <i>Tidak ada Bank</i>
                                                                            <?php
                                                                            } else {
                                                                                //$bank=$this->m_bankutama->getDataById($cn->BANKUTAMAID);

                                                                                echo $bank->BANKREKDESC;
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $developer = $this->m_developer->getDataById($tp->DEVELOPERID);
                                                                        if ($developer == null) {
                                                                            ?>
                                                                            <i>Tidak ada Developer<i>
                                                                        <?php
                                                                        } else {
                                                                            if ($developer->DEVELOPERDESC == null) {
                                                                                ?>
                                                                                        <i>Tidak ada Developer</i>
                                                                            <?php
                                                                            } else {
                                                                                echo $developer->DEVELOPERDESC;
                                                                            }
                                                                        }
                                                                        ?>
                                                                                </td>
                                                                                <td>

                                                                                <?php
                                                                                $cid = $this->m_covernote->getDataByTranId($tp->TRANSAKSIPRAID);
                                                                                if ($cid != null) {
                                                                                    ?>
                                                                                        <a href="<?php echo base_url() . 'proses/view_edit_covernote/' . $tp->TRANSAKSIPRAID; ?>" class="button purple tip" data-original-title="edit" >
                                                                                            <div class="icon"><span class="icon-edit icon-white"></span></div>
                                                                                        </a>
                                                                                <?php } else { ?>
                                                                                        <a href="<?php echo base_url() . 'proses/detail_covernote/' . $tp->TRANSAKSIPRAID; ?>" class="button yellow tip jDialog_form_button"  data-original-title="Pick">
                                                                                            <div class="icon"><span class="ico-hand-up"></span></div>
                                                                                        </a>
        <?php }; ?>	



                                                                                </td>

                                                                                </tr>
        <?php $no++;
    }
};
?>                                                       
                                                                        </tbody>
                                                                        </table> 
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
                                                                        </body>
                                                                        <!-- Bootrstrap modal form -->
                                                                        <div id="fModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                <h3 id="myModalLabels">Upload Fix Covernote Document</h3>
                                                                            </div>        
                                                                            <div class="row-fluid">
                                                                                <div class="block-fluid">
                                                                                    <div class="row-form">
                                                                                        <div class="span12">
                                                                                            <span class="top title"><br>
                                                                                                Pilih file dokumen:<br>
                                                                                            </span><input name="dokumen" type="file">                     
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>                   
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Save updates</button> 
                                                                                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>            
                                                                            </div>
                                                                        </div>
                                                                        </html>
