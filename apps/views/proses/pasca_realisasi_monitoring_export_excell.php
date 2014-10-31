<?php

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');


$optionPrintArray = explode('&', $this->uri->segment(4));
$withDoneArray = explode('=', $optionPrintArray[0]);
$withDone = $withDoneArray[1];
$pageSizeArray = explode('=', $optionPrintArray[1]);
$pageSize = $pageSizeArray[1];

$date = getdate();
$user = $this->model_core->get_where_array('user', array('USERID' => $this->session->userdata('USERID')));
$pegawai = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $user['EMPLOYEEID']));

/** Include PHPExcel */
//require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
$this->load->library('PHPExcel');


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Arif Dzikrullah")
        ->setLastModifiedBy($pegawai['NAMALENGKAP'])
        ->setTitle("Office 2007 XLSX Document")
        ->setSubject("Office 2007 XLSX Document")
        ->setDescription("Document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Result file");



// Set header
$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Dr. RANTI FAUZA MAYANA, SH.')
        ->setCellValue('A2', 'NOTARIS PEJABAT PEMBUAT AKTA TANAH')
        ->setCellValue('A3', 'Jl. Dr. Cipto No. 23 Bandung');

// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A5', 'NO')
        ->setCellValue('B5', 'TGL AKAD')
        ->setCellValue('C5', 'NAMA DEBITUR')
        ->setCellValue('D5', 'NO SERTIFIKAT')
        ->setCellValue('E5', 'DEVELOPER')
        ->setCellValue('F5', 'KOTA/KAB/NOT')
        ->setCellValue('G5', 'BANK')
        ->setCellValue('H5', 'PROSES')
        ->setCellValue('I5', 'TGL MASUK PROSES')
        ->setCellValue('J5', 'TGL SELESAI PROSES')
        ->setCellValue('K5', 'TGL PENYERAHAN KE BANK/DEBITUR')
        ->setCellValue('L5', 'KENDALA');

//Insert data

$no = 0;
$excellRow = 6;
$lastNoCoverNote = '';
foreach ($monitoring as $row) {

//    if ($withDone == 'false') {
//        if ($row->STATUSPROSES == 2) {
    $no++;

//            if ($lastNoCoverNote != $row->NOCOVERNOTE && $lastNoCoverNote != '')
//                $excellRow++;


    if ($row->TGLAKAD != 0000 - 00 - 00) {
        $tglAkad = date('d-m-Y', strtotime($row->TGLAKAD));
    } else {
        $tglAkad = "-";
    }

    $dat = $this->m_customertrans->getCustIdFromTransId($row->TRANSAKSIPRAID);
    $transaksiPraId = '';
    foreach ($dat as $dt) {
        $cs = $this->m_customer->getDataById($dt->CUSTOMERID);
        $transaksiPraId = $transaksiPraId . $cs->NAMACUST . ', ';
    };

    if ($row->DEVELOPERID == NULL) {
        $developer = '';
    } else {
        $developer = $this->model_translate->dynamicTranslate('developer', 'DEVELOPERID', $row->DEVELOPERID, 'DEVELOPERDESC');
    }

    if ($row->TGLMASUK != 0000 - 00 - 00) {
        $tglMasuk = date('d-m-Y', strtotime($row->TGLMASUK));
    } else {
        $tglMasuk = "-";
    }

    if ($row->TGLSELESAI != 0000 - 00 - 00) {
        $tglSelesai = date('d-m-Y', strtotime($row->TGLSELESAI));
    } else {
        $tglSelesai = "-";
    }

    if ($row->TGLPENYERAHAN != 0000 - 00 - 00) {
        $tglPenyerahan = date('d-m-Y', strtotime($row->TGLPENYERAHAN));
    } else {
        $tglPenyerahan = "-";
    }

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $excellRow, $no)
            ->setCellValue('B' . $excellRow, $tglAkad)
            ->setCellValue('C' . $excellRow, $transaksiPraId)
            ->setCellValue('D' . $excellRow, $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'NOMOR') . ' - ' . $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'KEL_DESA'))
            ->setCellValue('E' . $excellRow, $developer)
            ->setCellValue('F' . $excellRow, $this->model_translate->dynamicTranslate('sertifikat', 'SERTIFIKATID', $row->SERTIFIKATID, 'KOTA_KAB'))
            ->setCellValue('G' . $excellRow, $this->model_translate->dynamicTranslate('bankrekening', 'BANKREKID', $row->BANKREKID, 'BANKREKDESC'))
            ->setCellValue('H' . $excellRow, $this->model_translate->dynamicTranslate('proses', 'PROSESID', $row->PROSESID, 'PROSESDESC'))
            ->setCellValue('I' . $excellRow, $tglMasuk)
            ->setCellValue('J' . $excellRow, $tglSelesai)
            ->setCellValue('K' . $excellRow, $tglPenyerahan)
            ->setCellValue('L' . $excellRow, $row->KENDALA);
//        }
    $excellRow++;
}
//}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Pasca Realisasi Export');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Pasca Realisasi Export.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
