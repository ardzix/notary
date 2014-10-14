<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Covernote_word extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function Simpan() {
        $this->load->library('word/word');

        $this->word->setDefaultFontName('Time New Roman');
        $this->word->setDefaultFontSize('11');

        $section = $this->word->createSection();

        $this->word->addFontStyle('fheader1', array('size' => 18, 'bold' => true, 'underline' => PHPWord_Style_Font::UNDERLINE_SINGLE));
        $this->word->addParagraphStyle('pheader', array('align' => 'center'));
        $section->addText('Dr. RANTY FAUZA MAYANA, SH.', 'fheader1', 'pheader');

        $this->word->addFontStyle('fheader2', array('size' => 14, 'bold' => true));
        $section->addText('Dr. RANTY FAUZA MAYANA, SH.', 'fheader2', 'pheader');

        $section->addText('Dr. RANTY FAUZA MAYANA, SH.', '', 'pheader');

        $this->word->addFontStyle('fheader3', array('size' => 12, 'bold' => true));
        $section->addText('SURAT KETERANGAN', 'fheader3', 'pheader');

        $this->word->addFontStyle('fheader3', array('size' => 12, 'bold' => true));
        $section->addText('Nomor : /N/2014', 'fheader3', 'pheader');

        $textrun = $section->createTextRun();
        $textrun->addText('Yang bertanda tangan di bawah ini: ');
        $textrun->addText('Dr. RANTY FAUZA MAYANA, SH', array('bold' => true));
        $textrun->addText(' Notaris di kota Bandung Menerangkan:');


        $textrun = $section->createTextRun();
        $textrun->addText('Bahwa untuk menjamin pelunasan hutang atas nama Perseroan Terbatas ');
        $textrun->addText('PT. METANA', array('bold' => true));
        $textrun->addText(' berkedudukan di Kota Bandung dengan PT. BANK RAKYAT INDONESIA (Persero) Tbk Cabang Bandung Naripan dengan telah ditandatangani:');

        $section->addText('1. Akta Perjanjian Membuka Kredit Investasi (KI) Refinancing Normor_ _ _ _ _ ; _ _ _');
        $section->addText('2. Akta Pemberian Hak Tanggungan Nomor _ _ _ _ _ _ _/2014, Untuk jaminan atas 1 (sebidang) tanah berikut bangunan yang berdiri diatasnya, yang terletak di:');

        $section->addText('Povinsi	: Jawa Barat;');
        $section->addText('Kota		: Bandung;');
        $section->addText('Kecamatan	: Arcamanik;');
        $section->addText('Kelurahan	: Cisantren Endah;');
        $section->addText('Kampung	: Susukan Waru;');



        $textrun = $section->createTextRun();
        $textrun->addText('-Tanah Hak Milik Nomor 165 / Kelurahan Cisaranten Endah, ', array('bold' => true));
        $textrun->addText('luas tanah 1.185 m2 (seribu seratus delapan puluh lima meter persegi), dengan Nomor Identifikasi Bidang Tanah (NIB) 10.15.21.05.01926, diuraikan dalam Surat Ukur');

        $textrun = $section->createTextRun();
        $textrun->addText('-atas tanah ');
        $textrun->addText('Hak Milik Nomor 1635 / Kelurahan Cisantren Endah ', array('bold' => true));
        $textrun->addText('tersebut akan segera dipasang Hak Tanggungan Peringkat I (Pertama) sebesar ');
        $textrun->addText('Rp. 500.000.000,- (Lima Ratus Juta);', array('bold' => true));

        $section->addText('-Bahwa proses Pemasangan Hak Tanggungan Peringkat I (Pertama) tersebut diurus oleh Kantor saya, Notaris.');

        $textrun = $section->createTextRun();
        $textrun->addText('- Apabila telah selesai dari Badan Pertahanan Nasional Kantor Pertahanan Kota Bandung dalam jangka waktu kurang lebih 3 (tiga) bulan maka Sertifikat Hak Milik tersebut berikut dengan Sertifikat Hak Tanggungannya akan saya serahkan pada ');
        $textrun->addText('PT. BANK RAKYAT INDONESIA (Persero) Tbk Cabang Bandung ', array('bold' => true));
        $textrun->addText('Naripan dan dengan mengembalikan Surat Keterangan ini kepada Kantor saya, Notaris. ');

        $this->word->addParagraphStyle('pfooter', array('align' => 'right'));

        $section->addText('Bandung, Januari 2014', '', 'pfooter');
        $section->addText('Notaris di Bandung,', '', 'pfooter');

        $section->addTextBreak(3);

        $section->addText('Dr. RANTI FAUZA MAYANA, SH', '', 'pfooter');


        $id = $this->uri->segment(3);


        $filename = 'covernote_' . $id .'_mentah.docx'; //save our document as this file name
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
        $objWriter->save('php://output');
    }

}
