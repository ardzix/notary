 

<?php //$this->load->view('slice/header-content'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">

<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3 id="myModalLabel" align="center">Setup Akta</h3>
</div>
<?php echo form_open('proses/setup_akta_add2'); ?>
<div class="row-form">


    <table align="center">
        <tr>

            <td>
                Nomor Akta :
            </td>
            <td >
                <input type="text" value="" name="nomor_akta" />
            </td>

        </tr>
    </table>
    <table   class="table dtable lcnp" cellpadding="0" cellspacing="0" width="100%">
        <thead>
            <tr>

                <th width="5%">No</th>

                <th width="10%"></th>
                <th width="20%">Proses</th>
                <th width="20%">Satuan</th>
                <th width="20%">Waktu Proses</th>
                <th width="25%">Tanggal Mulai</th>

            </tr>
        </thead>
        <tbody>
            <?php echo form_hidden('aktatran', $aktatran); ?>
            <?php echo form_hidden('transaksipra', $transaksipra); ?>
            <?php
            $no = 0;
            foreach ($aktaproses as $ap) {
                //$pros = $this->m_proses->getDataById($ap->PROSESID);
                ?>
                <tr>
                    <td><?php echo $no + 1; ?></td>
                    <td><input type="checkbox" value="<?php echo $no; ?>" name="proses[]"/></td>
                    <td><?php echo $ap->PROSESDESC; ?>
    <?php echo form_hidden('id_proses_' . $no, $ap->PROSESID); ?>

                    </td>
                    <td>
                        <?php
                        //$js='onClick="display_data(this.value);"';
                        //$js=array('id'=>'model_id', 'onChange'='show_lighboxModel('.$mod->model)_id.')');
                        $wkt = $this->m_satuanwaktustd->getData();
                        foreach ($wkt as $wt) {
                            $w[$wt->SATWAKTUSTDID] = $wt->SATWAKTUDESC;
                        }
                        echo form_dropdown('satuan_' . $no, $w, $ap->SATWAKTUSTDID);
                        ?>
                    </td>
                    <td>
                        <input type="text" value="<?php
                    $pp = $ap->DEFWAKTUSTD;
                    if ($pp == null) {
                        echo 'kosong';
                    } else {
                        echo $pp;
                    }
                        ?>"																
                               name="<?php echo 'waktu_' . $no; ?>" />
                    </td>
                    <td>
                        <input  type="text" value="" class="datepicker" name="<?php echo 'tgl_mulai_' . $no; ?>" />
                        Cth : 23-01-2012
                    </td>
                </tr>  
    <?php $no++;
}; ?>


        </tbody>
    </table>  


</div>
<div class="modal-footer">

    <button class="btn btn-primary" aria-hidden="true">Save updates</button>
    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>

</div>
<?php echo form_close(); ?>


</head>