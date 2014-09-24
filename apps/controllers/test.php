<?php

/*
 * Project Name: notary
 * File Name: contoh_word
 * Created on: 13 Jan 14 - 13:41:03
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function word() {
        $this->load->library('word/word');
//our docx will have 'lanscape' paper orientation
        $section = $this->word->createSection(array('orientation' => 'landscape'));

        // Add text elements
        $section->addText('Hello World!');
        $section->addTextBreak(1);

        $section->addText('I am inline styled.', array('name' => 'Verdana', 'color' => '006699'));
        $section->addTextBreak(1);

        $this->word->addFontStyle('rStyle', array('bold' => true, 'italic' => true, 'size' => 16));
        $this->word->addParagraphStyle('pStyle', array('align' => 'center', 'spaceAfter' => 100));
        $section->addText('I am styled by two style definitions.', 'rStyle', 'pStyle');
        $section->addText('I have only a paragraph style definition.', null, 'pStyle');

        // Define table style arrays
        $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
        $styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');

// Define cell style arrays
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
        $fontStyle = array('bold' => true, 'align' => 'center');

// Add table style
        $this->word->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

// Add table
        $table = $section->addTable('myOwnTableStyle');

// Add row
        $table->addRow(900);

// Add cells
        $table->addCell(2000, $styleCell)->addText('Row 1', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 2', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 3', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 4', $fontStyle);
        $table->addCell(500, $styleCellBTLR)->addText('Row 5', $fontStyle);

// Add more rows / cells
        for ($i = 1; $i <= 2; $i++) {
            $table->addRow();
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");

            $text = ($i % 2 == 0) ? 'X' : '';
            $table->addCell(500)->addText($text);
        }

        $filename = 'word test.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

    public function excel() {
        //load our new PHPExcel library
        $this->load->library('excel/excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
//name the worksheet
        $this->excel->getActiveSheet()->setTitle('test worksheet');
//set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
//change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
//make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename = 'excel test.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    public function pdf() {
        $this->load->library('pdf/pdf');
        $this->pdf->load_view('pdf');
        $this->pdf->render();
        $this->pdf->stream("Test.pdf");
    }

}