

<?php $no=1; foreach($jadwal as $row){ ?>
<tr class="">
    <td><?php echo $no; ?></td>
    <td id="desc<?php echo $row->AKTIVITASNOTID; ?>"><?= $row->AKTIFITASDESC ?></td>
    <?Php
        $jam=null;
        $menit=null;

        $cjam = strlen($row->JAMAWAL);
        if($cjam<2){
            $jam = "0$row->JAMAWAL";
        } else {
            $jam = $row->JAMAWAL;
        }
    ?>:<?
        $cmentit=strlen($row->MENITAWAL);
        if($cmentit<2){
            $menit = "0$row->MENITAWAL";
        } else {
            $menit = $row->MENITAWAL;
        }
    ?>
    <td id="waktuawal<?php echo $row->AKTIVITASNOTID; ?>"><?Php echo $jam.":".$menit ?></td>
    <?Php
        $jam=null;
        $menit=null;
            $cjam = strlen($row->JAMAKHIR);
            if($cjam<2){
                $jam = "0$row->JAMAKHIR";
            } else {
                $jam = $row->JAMAKHIR;
            }
        ?>:<?
            $cmentit=strlen($row->MENITAKHIR);
            if($cmentit<2){
                $menit =  "0$row->MENITAKHIR";
            } else {
                $menit = $row->MENITAKHIR;
            }
        ?>
    <td id="waktuakhir<?php echo $row->AKTIVITASNOTID; ?>"><?Php echo $jam.":".$menit ?></td>
    <td>              
                                                   
        <a href="#editModal" role="button" id="demo-default" class="button blue tip" onclick="edit_data_row(<?php echo $row->AKTIVITASNOTID; ?>)" title="Edit" data-toggle="modal" data-original-title="Edit" >
            <div class="icon"><span class="ico-pencil"></span></div>
        </a>
        <a href="#confirmModal" role="button"  class="button red tip" onclick="delete_data('<?Php echo $row->AKTIVITASNOTID ?>')" title="Delete" data-toggle="modal" data-original-title="Delete" >
            <div class="icon"><span class="ico-trashcan"></span></div>
        </a>
    </td>
</tr>     
<?php $no++; } ?>