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
$boldBorder = array();
$doneArray = array();
foreach ($monitoring as $row) {

    if ($withDone == 'false') {
        if ($row->STATUSPROSES != 2) {
            $no++;

            if ($lastNoCoverNote != $row->NOCOVERNOTE && $lastNoCoverNote != '') {
                array_push($boldBorder, $excellRow - 1);
            }


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
            $excellRow++;
            $lastNoCoverNote = $row->NOCOVERNOTE;
        }
    } else {
        $no++;

        if ($row->STATUSPROSES == 2) {
            array_push($doneArray, $excellRow);
        }

        if ($lastNoCoverNote != $row->NOCOVERNOTE && $lastNoCoverNote != '') {
            array_push($boldBorder, $excellRow - 1);
        }


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
        $excellRow++;
        $lastNoCoverNote = $row->NOCOVERNOTE;
    }
}

$date = getdate();
$user = $this->model_core->get_where_array('user', array('USERID' => $this->session->userdata('USERID')));
$pegawai = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $user['EMPLOYEEID']));



$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$excellRow, 'Bandung, '.$date['mday'].'/'. $date['mon'] .'/'. $date['year'] .' - Dibuat oleh: '. $pegawai['NAMALENGKAP']);

//
//Styling

$columnIndex = array(0 => 'A', 1 => 'B', 2 => 'C', 3 => 'D', 4 => 'E', 5 => 'F', 6 => 'G', 7 => 'H', 8 => 'I', 9 => 'J', 10 => 'K', 11 => 'L');

for ($i = 0; $i < 12; $i++) {
$objPHPExcel->getActiveSheet()->getStyle($columnIndex[$i] . '5:' . $columnIndex[$i] . '5')->applyFromArray(
array(
'borders' => array(
'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
)
)
);
}

$objPHPExcel->getActiveSheet()->getStyle('A5:L5')->applyFromArray(
array(
'borders' => array(
'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
'top' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
)
)
);

for ($i = 6; $i < $excellRow; $i++) {

for ($j = 0; $j < 12; $j++) {
$objPHPExcel->getActiveSheet()->getStyle($columnIndex[$j] . $i . ':' . $columnIndex[$j] . $i)->applyFromArray(
array(
'borders' => array(
'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
)
)
);
}


$objPHPExcel->getActiveSheet()->getStyle('A' . $i . ':L' . $i)->applyFromArray(
array(
'borders' => array(
'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
)
)
);
}

for ($i = 0; $i < count($boldBorder); $i++) {
$objPHPExcel->getActiveSheet()->getStyle('A' . $boldBorder[$i] . ':L' . $boldBorder[$i])->applyFromArray(
array(
//                'fill' => array(
//                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
//                    'color' => array('argb' => 'FFCCFFCC')
//                ),
'borders' => array(
'bottom' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
)
)
);
}

for ($i = 0; $i < count($doneArray); $i++) {
$objPHPExcel->getActiveSheet()->getStyle('A' . $doneArray[$i] . ':L' . $doneArray[$i])->applyFromArray(
array(
'fill' => array(
'type' => PHPExcel_Style_Fill::FILL_SOLID,
'color' => array('argb' => 'FFFFFF00')
)
)
);
}

//$objPHPExcel->getActiveSheet()->getStyle('C5:R95')->applyFromArray(
//        array('fill' => array(
//                'type' => PHPExcel_Style_Fill::FILL_SOLID,
//                'color' => array('argb' => 'FFFFFF00')
//            ),
//        )
//);
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
