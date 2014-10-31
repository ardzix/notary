<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
* Fungsi-fungsi view helper untuk edit transaksi
* @author Taufik
*  
*/



if (!function_exists('create_option')) {

    function create_option($array_model, $transValue, $valueModelCol, $descCol) {
        $retval = '';
        foreach ($array_model as $row){
            // $retval = $retval . '<option value="">'.$row->$descCol.'</option>';
            //$retval = $retval . '<option selected="true" value="'.$row->$valueModelCol.'">'.$row->descCol.'</option>';
            if($row->$valueModelCol == $transValue) {
                $retval = $retval . '<option selected="true" value="'.$row->$valueModelCol.'">'.$row->$descCol.'</option>';            
            } else {
                $retval = $retval . '<option value="'.$row->$valueModelCol.'">'.$row->$descCol.'</option>';
            }

        }

        return $retval;
    }

}

if (!function_exists('convert_date')) {

    function convert_date($date) {
        $retval;
        if($date != "" || $date != NULL){
            $tglDeadline = split("-",$date);
            $retval = $tglDeadline[2]."-".$tglDeadline[1]."-".$tglDeadline[0] ;    
        } else {
            $retval = "";
        }
        
        return $retval;
    }
}

if(!function_exists('print_objek_hukum')) {
    function print_objek_hukum($idxAkta, $aktatranid, $trans_objek, $tipeSertifikat, $idxObjHukum){
        $retval['html'] = '';
        foreach ($trans_objek as $row) {
            if($aktatranid == $row->AKTATRANID) {
                $idxObjHukum ++;
                $idfield = 'existingFieldHukum-' . $idxAkta . '-' . $idxObjHukum;
                $retval["html"] = $retval["html"] . "<div id='".$idfield."' class='cloneHukum'>" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Objeck Hukum:</div>" .
                        "<div class='span4'>" .
                            "<select class='select' name='objHukum[]' style='width:100%' >" .
                                create_option($tipeSertifikat, $row->TYPESERTIFIKATID, 'TYPESERTIFIKATID', 'TYPESERTIFIKATDESC') .
                            "</select>" .
                        "</div>" .
                        "<div class='span1'>" .
                            "<a class='button yellow tip jDialog_form_button' onclick='deleteExistingField(\"".$idfield."\", \"idDeletedSertifikat\", \"".$row->SERTIFIKATID."\")'>" .
                                "<div class='icon'>  <span class='icon-minus-sign '></span> </div>" .
                            "</a>" .
                        "</div>" .
                    "</div>" .
                    "<input type='hidden' value='" . $row->SERTIFIKATID . "' name='sertifikatid[]' />" .
                    "<input type='hidden' value='" . $idxAkta . "' name='objakta[]' />" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Nomor Sertifikat:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' value='".$row->NOMOR."' name='noSertifikat[]'/> ".
                        "</div>" .
                    "</div>" .

                    "<div class='row-form'>" .
                        "<div class='span3'>Kelurahan/Desa:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' value='".$row->KEL_DESA."' name='kelDesa[]'/> ".
                        " </div>" .
                    "</div>" .

                    "<div class='row-form'>" .
                        "<div class='span3'>Kota/Kabupaten:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' value='".$row->KOTA_KAB."' name='kotaKab[]'/>".
                        "</div>" .
                    "</div>" .

                    "<div class='row-form'>" .
                        "<div class='span3'>Atas Nama:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' value='".$row->NAMAPEMILIK."' name='atsNama[]'/>".
                        "</div>" .
                    "</div>" .

                    "<div class='row-form'>" .
                        "<div class='span3'>Nama Penjual:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' value='".$row->NAMAPENJUAL."' name='penjual[]'/>" .
                        "</div>" .
                    "</div>" .

                    "<div class='row-form'>" .
                        "<div class='span3'>Nama Pembeli:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' value='".$row->NAMAPEMBELI."' name='pembeli[]'/>".
                        "</div>" .
                    "</div>" .
                    "<hr></hr>" .
                "</div>";
            }

        }
        $retval["idxObjHukum"] = $idxObjHukum;
        return $retval;
    }
}

if(!function_exists('print_proses')) {
    function print_proses($idxAkta, $aktatranid, $trans_proses, $proses, $pjproses, $idxProses, $statusproses){
        $retval = '';
        foreach ($trans_proses as $row) {
            if($aktatranid == $row->AKTATRANID) {

                $idxProses++;
                $idfield = 'existingFieldProses-' . $idxAkta . '-' . $idxProses;
                $retval['html'] = $retval['html'] .
                "<div id='" . $idfield . "' class='cloneProses'>" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Nomor Urut Proses:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' name='noProses[]' value='".$row->NOMORURUT."'/>" .
                        "</div>" .
                    "</div>" .

                    "<div class='row-form'>" .
                        "<div class='span3'>Nama Proses:</div>" .
                        "<div class='span4'>" .
                            "<select class='select' name='proses[]' style='width:100%'>" .
                                "<option value='0'>choose a option...</option>" .
                                create_option($proses, $row->PROSESID, 'PROSESID', 'PROSESDESC') .
                            "</select> ".
                        "</div>" .
                        "<div class='span1'>" .
                            "<a  class='button yellow tip jDialog_form_button' onclick='deleteExistingField(\"" . $idfield . "\",\"idDeletedProses\", \"".$row->PROSESTRANID."\")'>" .
                                "<div class='icon'><span class='icon-minus-sign '></span></div>" .
                            "</a>" .
                        "</div>" .
                    "</div>" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Status Proses:</div>" .
                        "<div class='span4'>" .
                            "<select class='select' name='statusproses[]' style='width:100%'>" .
                                create_option($statusproses, $row->STATUSPROSES, 'STATUSPROSESID', 'STATUSDESC') .
                            "</select>".
                        "</div>" .
                    "</div>" .

                    "<input type='hidden' value='" . $row->PROSESTRANID . "' name='prosestranid[]' />" .
                    "<input type='hidden' value='" . $idxAkta . "' name='prosesakta[]' />" .

                    "<div class='row-form'>" .
                        "<div class='span3'>PJ Proses:</div>" .
                        "<div class='span4'>" .
                            "<select class='select' name='pjproses[]' style='width:100%'>" .
                                create_option($pjproses, $row->EMPLOYEEID, 'EMPLOYEEID', 'NAMALENGKAP') .
                            "</select>".
                        "</div>" .
                    "</div>" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Tanggal Masuk:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' name='tglMasuk[]' class='dp1' value='".convert_date($row->TGLMASUK)."' />" .
                        "</div>" .
                    "</div>" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Tanggal Selesai:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' name='tglKeluar[]' class='dp1' value='".convert_date($row->TGLSELESAI)."' />" .
                        "</div>" .
                    "</div>" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Tanggal Diserahkan:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' name='tglDiserahkan[]' class='dp1' value='".convert_date($row->TGLPENYERAHAN)."' />" .
                        "</div>" .
                    "</div>" .
                    "<div class='row-form'>" .
                        "<div class='span3'>Kendala:</div>" .
                        "<div class='span4'>" .
                            "<input type='text' name='kendala[]' value='".$row->KENDALA."' />" .
                        "</div>" .
                    "</div>" .
                    "<hr></hr>" .
                "</div>";
            }

        }
        $retval['idxProses'] = $idxProses;
        return $retval;
    }
}

/* End of file breadcrumb_helper.php */
/* Location: ./application/helpers/breadcrumb_helper.php */
