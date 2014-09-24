<?php

/*
 * Project Name: notary
 * File Name: proses
 * Created on: 09 Jan 14 - 9:04:38
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Proses extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->model_core->check_login();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('m_bankrekening', 'm_developer', 'm_satuanwaktustd', 'm_aktaproses', 'm_akta', 'm_aktatran', 'm_customertrans', 'm_transaksipra', 'm_customer', 'm_covernote', 'm_bankutama', 'm_tipewilayah', 'm_prosestran', 'm_proses', 'm_statusproses'));
    }

    public function index() {
        $data['title'] = NOTARY_TITLE . 'Proses';

        $this->load->view('proses/index', $data);
    }

    public function pra_realisasi() {

        if ($this->uri->segment(3) == 'entry') {
            /*
              | -------------------------------------------------------------------
              |  ENTRY
              | -------------------------------------------------------------------
             */
            if ($this->uri->segment(4) == 'newTrans') {

                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Pick Customer)';
                $praRealisasiId = $this->model_core->get_data_max('transaksipra', 'TRANSAKSIPRAID');
                $data['akta'] = $this->model_core->get_where_result('akta', array('deleted' => 0));
                $data['praRealisasiId'] = $praRealisasiId['TRANSAKSIPRAID'] + 1;
                $data['dataTableTipeDokumen'] = $this->model_core->getDataSpecified('tipedokumen', array('TIPEDOKUMENID', 'TIPEDOKDESC'));

                $table = 'employee';
                $join = array(array('jabatan', 'jabatan.JABATANID', 'employee.JABATANID'));
                $field = array('employee.EMPLOYEEID', 'employee.NAMALENGKAP');
                $where = array(array('jabatan.GRUP', 3));
                $data['pic'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);


                $where = array(array('jabatan.GRUP', 2));
                $data['spv'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);
                $data['developer'] = $this->model_core->getDataSpecified('developer', array('DEVELOPERID', 'DEVELOPERDESC'));
                $data['tipecustomer'] = $this->model_core->getDataSpecified('tipecustomer', array('TIPECUSTID', 'TIPECUSTDESC'));

                $where1 = array(array('jabatan.GRUP', 1));
                $data['notaris'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where1);
                $data['bank'] = $this->model_core->getDataSpecified('bankrekening', array('BANKREKID', 'BANKREKDESC'));
                $data['stsPajak'] = $this->model_core->getDataSpecified('statuspajak', array('STATUSPJKID', 'STATUSPJKDESC'));
                $data['stsBayar'] = $this->model_core->getDataSpecified('statusbayar', array('STATUSBYR', 'STATUSBYRDESC'));
                $data['dataTableCustomer'] = $this->model_core->getDataSpecified('customer', array('CUSTOMERID', 'NAMACUST'));

                $this->load->view('proses/pra_realisasi_pick_customer', $data);
            } elseif ($this->uri->segment(4) == 'pick_customer_uploadRow') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Pick Customer)';

                $this->load->view('proses/pra_realisasi_pick_customer_uploadRow', $data);
            } elseif ($this->uri->segment(4) == 'selectTipeDokumen') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Pick Customer)';

                $this->load->view('proses/pra_realisasi_pick_customer_selectTipeDokumen', $data);
            } elseif ($this->uri->segment(4) == 'pick_customer_pilihProses') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Pick Customer)';

                $this->load->view('proses/pra_realisasi_pick_customer_pilihProses', $data);
            } elseif ($this->uri->segment(4) == 'myModalLabel') {

                $data['label'] = $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $this->input->post('custId'), 'NAMACUST');
                $this->load->view('proses/myModalLabel', $data);
            } elseif ($this->uri->segment(4) == 'myModalBody') {
                $data['dataTranPra'] = $this->model_core->getDataSpecifiedWthWhere('customertrans', array('TRANSAKSIPRAID'), array('CUSTOMERID', $this->input->post('custId')));

                $this->load->view('proses/myModalBody', $data);
            } elseif ($this->uri->segment(4) == 'sertifikat') {
                $data['title'] = NOTARY_TITLE . 'Pra Realisasi';
                $data['tipeSertifikat'] = $this->model_core->get_data('typesertifikat');
                $data['aktaTran'] = $this->model_core->get_where_result('aktatran', array('TRANSAKSIPRAID' => $this->uri->segment(5)));

                $this->load->view('proses/pra_realisasi_sertifikat', $data);
            } elseif ($this->uri->segment(4) == 'detail') {

                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Detail)';

                $parameter = $this->uri->segment(4);
                $parameterExplode = explode('&&', $parameter);
                $tranId = explode('=', $parameterExplode[0]);
                $custId = explode('=', $parameterExplode[1]);
                $prosesId = explode('=', $parameterExplode[2]);
                $dataProsesId = explode(',', $prosesId[1]);

                $data['tranId'] = $tranId[1];
                $data['prosesId'] = $dataProsesId;
                $data['impProsesId'] = $prosesId[1];
                $data['custId'] = $custId[1];
                $data['customer'] = $this->model_translate->dynamicTranslate('customer', 'CUSTOMERID', $custId[1], 'NAMACUST');
                $data['proses'] = $this->model_translate->dynamicTranslate('proses', 'PROSESID', $dataProsesId[0], 'PROSESDESC');
                $data['satuanwaktustd'] = $this->model_core->get_data('satuanwaktustd');

                if ($data['prosesId'][0] != '')
                    $this->load->view('proses/praRealisasiDetail', $data);
                else
                    redirect('proses/pra_realisasi');
            } elseif ($this->uri->segment(4) == 'detailTrans') {
                $data['title'] = NOTARY_TITLE . 'Detail Transaksi Pra-Realisasi';
                $data['dataTableProses'] = $this->model_core->getDataSpecifiedWthWhere('aktatran', array('AKTATRANID', 'AKTAID', 'CURRENTPROSES', 'TRANSAKSIPRAID'), array('TRANSAKSIPRAID	', $this->uri->segment(5)));
                $data['akta'] = $this->model_core->getDataSpecified('akta', array('AKTAID', 'AKTADESC'));
                $this->load->view('proses/detailTransPra', $data);
            } elseif ($this->uri->segment(4) == 'update_pick_customer') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Pick Customer)';

                $this->load->view('proses/pra_realisasi_update_pick_customer', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Entry)';
                $data['dataTableCustomer'] = $this->model_core->getDataSpecified('customer', array('CUSTOMERID', 'NAMACUST', 'NOIDPERSONALCUST'));

                $this->load->view('proses/pra_realisasi_entry', $data);
            }
        } elseif ($this->uri->segment(3) == 'validasi'){
            /*
              | -------------------------------------------------------------------
              |  VALIDASI
              | -------------------------------------------------------------------
             */
            if ($this->uri->segment(4) == 'proses') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (validasi Customer)';
                $data['dataTableDokumen'] = $this->model_core->get_where_result('dokumen', array('TRANSAKSIPRAID' => $this->uri->segment(5)));
                $data['dataStatusDokumen'] = $this->model_core->get_data('statusdokumen');

                $this->load->view('proses/pra_realisasi_validasi_pick_customer', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Validasi)';
                $data['dataTableTransaksipra'] = $this->model_core->getDataSpecified('transaksipra', array('TRANSAKSIPRAID'));
                $this->load->view('proses/pra_realisasi_validasi', $data);
            }
        } elseif ($this->uri->segment(3) == 'monitoring_dokumen') {
            /*
              | -------------------------------------------------------------------
              |  Monitoring Dokumen
              | -------------------------------------------------------------------
             */
            if ($this->uri->segment(4) == 'proses') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Monitoring Dokumen)';
                $data['dataTableDokumen'] = $this->model_core->get_where_result('dokumen', array('TRANSAKSIPRAID' => $this->uri->segment(5)));
                $data['dataStatusDokumen'] = $this->model_core->get_data('statusdokumen');

                $this->load->view('proses/pra_realisasi_monitoring_proses', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Monitoring Dokumen)';
                $data['dataTableTransaksipra'] = $this->model_core->getDataSpecified('transaksipra', array('TRANSAKSIPRAID'));
                $this->load->view('proses/pra_realisasi_monitoring', $data);
            }
        } elseif ($this->uri->segment(3) == 'drop') {
            /*
              | -------------------------------------------------------------------
              |  DROP
              | -------------------------------------------------------------------
             */
            if ($this->uri->segment(4) == 'proses') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Drop Pra-Realisasi)';
                $data['dataTableAkta'] = $this->model_core->get_where_result('aktatran', array('TRANSAKSIPRAID' => $this->uri->segment(5)));
                $data['statusAkta'] = $this->model_core->get_data('statusakta');

                $this->load->view('proses/pra_realisasi_drop_proses', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Drop)';
                $data['dataTableTransaksipra'] = $this->model_core->getDataSpecified('transaksipra', array('TRANSAKSIPRAID'));
                $this->load->view('proses/pra_realisasi_drop', $data);
            }
        } elseif ($this->uri->segment(3) == 'input_all') {
            /*
              | -------------------------------------------------------------------
              |  INPUT ALL
              | -------------------------------------------------------------------
             */
            if ($this->uri->segment(4) == 'transaksi') {
                $table = 'employee';
                $join = array(array('jabatan', 'jabatan.JABATANID', 'employee.JABATANID'));
                $field = array('employee.EMPLOYEEID', 'employee.NAMALENGKAP');
                $where = array(array('jabatan.GRUP', 3));
                $data['pic'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);


                $where = array(array('jabatan.GRUP', 2));
                $data['spv'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);
                $data['developer'] = $this->model_core->getDataSpecified('developer', array('DEVELOPERID', 'DEVELOPERDESC'));
                $data['tipecustomer'] = $this->model_core->getDataSpecified('tipecustomer', array('TIPECUSTID', 'TIPECUSTDESC'));

                $where1 = array(array('jabatan.GRUP', 1));
                $data['notaris'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where1);
                $data['bank'] = $this->model_core->getDataSpecified('bankrekening', array('BANKREKID', 'BANKREKDESC'));
                $data['stsPajak'] = $this->model_core->getDataSpecified('statuspajak', array('STATUSPJKID', 'STATUSPJKDESC'));
                $data['stsBayar'] = $this->model_core->getDataSpecified('statusbayar', array('STATUSBYR', 'STATUSBYRDESC'));
                $data['dataTableCustomer'] = $this->model_core->getDataSpecified('customer', array('CUSTOMERID', 'NAMACUST'));

                $data['title'] = NOTARY_TITLE . 'Pra Realisasi(Input All)';

                $this->load->view('proses/pra_realisasi_input_all_transaksi', $data);
            } elseif ($this->uri->segment(4) == 'covernote') {
                $data['title'] = NOTARY_TITLE . 'Pra Realisasi(Input All)';
                $data['transaksipra'] = $this->m_transaksipra->getDataById($this->uri->segment(5));
                $data['tipeWilayah'] = $this->model_core->get_data('tipewilayah');

                $this->load->view('proses/pra_realisasi_input_all_covernote', $data);
            } elseif ($this->uri->segment(4) == 'akta') {
                $data['title'] = NOTARY_TITLE . 'Pra Realisasi(Input All)';
                $data['akta'] = $this->model_core->get_where_result('akta', array('deleted' => 0));

                $this->load->view('proses/pra_realisasi_input_all_akta', $data);
            } elseif ($this->uri->segment(4) == 'proses_akta') {
                $data['title'] = NOTARY_TITLE . 'Pra Realisasi(Input All)';
                $data['transaksipra'] = $this->m_transaksipra->getDataById($this->uri->segment(5));

                $this->load->view('proses/pra_realisasi_input_all_proses_akta', $data);
            } elseif ($this->uri->segment(4) == 'sertifikat') {
                $data['title'] = NOTARY_TITLE . 'Pra Realisasi(Input All)';
                $data['tipeSertifikat'] = $this->model_core->get_data('typesertifikat');
                $data['aktaTran'] = $this->model_core->get_where_result('aktatran', array('TRANSAKSIPRAID' => $this->uri->segment(5)));

                $this->load->view('proses/pra_realisasi_input_all_sertifikat', $data);
            }
        } elseif ($this->uri->segment(3) == 'input_data') {
            /*
              | -------------------------------------------------------------------
              |  INPUT DATA
              | -------------------------------------------------------------------
             */
            //TRANSAKSI
            if ($this->uri->segment(4) == 'edit_transaksi') {
                $data['title'] = NOTARY_TITLE . 'EDIT TRANSAKSI';
                $data['transaksipra'] = $this->model_core->get_where_array('transaksipra', array('TRANSAKSIPRAID' => $this->uri->segment(5)));
                $data['bank'] = $this->model_core->getDataSpecified('bankrekening', array('BANKREKID', 'BANKREKDESC'));

                $table = 'employee';
                $join = array(array('jabatan', 'jabatan.JABATANID', 'employee.JABATANID'));
                $field = array('employee.EMPLOYEEID', 'employee.NAMALENGKAP');

                $where = array(array('jabatan.GRUP', 3));
                $data['pic'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);

                $where1 = array(array('jabatan.GRUP', 1));
                $data['notaris'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where1);

                $where = array(array('jabatan.GRUP', 2));
                $data['spv'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);

                $data['stsPajak'] = $this->model_core->getDataSpecified('statuspajak', array('STATUSPJKID', 'STATUSPJKDESC'));
                $data['developer'] = $this->model_core->getDataSpecified('developer', array('DEVELOPERID', 'DEVELOPERDESC'));

                $this->load->view('proses/pra_realisasi_input_data_edit_transaksi', $data);
            } else if ($this->uri->segment(4) == 'edit_covernote') {
                //COVERNOTE
                $data['title'] = NOTARY_TITLE . 'EDIT COVERNOTE';
                $data['covernote'] = $this->model_core->get_where_array('covernote', array('COVERNOTEID' => $this->uri->segment(5)));

                $this->load->view('proses/pra_realisasi_input_data_edit_covernote', $data);
            } else if ($this->uri->segment(4) == 'edit_akta') {
                //AKTA
                $data['title'] = NOTARY_TITLE . 'EDIT AKTA';
                $data['aktatran'] = $this->model_core->get_where_array('aktatran', array('AKTATRANID' => $this->uri->segment(5)));

                $this->load->view('proses/pra_realisasi_input_data_edit_akta', $data);
            } else if ($this->uri->segment(4) == 'edit_proses') {
                //PROSES
                $data['title'] = NOTARY_TITLE . 'EDIT PROSES';
                $data['prosestran'] = $this->model_core->get_where_array('prosestran', array('PROSESTRANID' => $this->uri->segment(5)));
                $data['proses'] = $this->model_core->get_data('proses');
                $data['pjproses'] = $this->model_core->get_where_result('employee', array('IS_PJ' => "1"));

                $this->load->view('proses/pra_realisasi_input_data_edit_proses', $data);
            } else if ($this->uri->segment(4) == 'edit_sertifikat') {
                //SERTIFIKAT
                $data['title'] = NOTARY_TITLE . 'EDIT SERTIFIKAT';
                $data['sertifikat'] = $this->model_core->get_where_array('sertifikat', array('SERTIFIKATID' => $this->uri->segment(5)));
                $data['tipeSertifikat'] = $this->model_core->get_data('typesertifikat');

                $this->load->view('proses/pra_realisasi_input_data_edit_sertifikat', $data);
            } else if ($this->uri->segment(4) == 'edit_sertifikat_baru') {
                //SERTIFIKAT BARU
                $data['title'] = NOTARY_TITLE . 'EDIT SERTIFIKAT BARU';
                $data['tipeSertifikat'] = $this->model_core->get_data('typesertifikat');

                $this->load->view('proses/pra_realisasi_input_data_edit_sertifikat_baru', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'INPUT DATA';
                $data['akta'] = $this->model_core->get_data('akta');
                $data['proses'] = $this->model_core->get_data('proses');
                $data['pjproses'] = $this->model_core->get_where_result('employee', array('IS_PJ' => "1"));
                $data['customer'] = $this->model_core->getDataSpecified('customer', array('CUSTOMERID', 'NAMACUST'));
                $data['stsPajak'] = $this->model_core->getDataSpecified('statuspajak', array('STATUSPJKID', 'STATUSPJKDESC'));
                $data['bank'] = $this->model_core->getDataSpecified('bankrekening', array('BANKREKID', 'BANKREKDESC'));
                $data['aktatranId'] = $this->model_core->lastAktatranId();
                $data['tipeSertifikat'] = $this->model_core->get_data('typesertifikat');

                $table = 'employee';
                $join = array(array('jabatan', 'jabatan.JABATANID', 'employee.JABATANID'));
                $field = array('employee.EMPLOYEEID', 'employee.NAMALENGKAP');

                $where = array(array('jabatan.GRUP', 3));
                $data['pic'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);

                $where = array(array('jabatan.GRUP', 2));
                $data['spv'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);
                $data['developer'] = $this->model_core->getDataSpecified('developer', array('DEVELOPERID', 'DEVELOPERDESC'));
                $data['tipecustomer'] = $this->model_core->getDataSpecified('tipecustomer', array('TIPECUSTID', 'TIPECUSTDESC'));
                $data['satuanwaktu'] = $this->m_satuanwaktustd->getData();

                $where1 = array(array('jabatan.GRUP', 1));
                $data['notaris'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where1);

                $this->load->view('proses/pra_realisasi_input_data', $data);
            }
        }
    }

    public function realisasi() {

        if ($this->uri->segment(3) == 'penyerahanDokumen') {
            if ($this->uri->segment(4) == 'proses') {
                $data['title'] = NOTARY_TITLE . 'Realisasi (Proses Penyerahan Dokumen)';
                $data['dataTableDokumen'] = $this->model_core->get_where_result('dokumen', array('TRANSAKSIPRAID' => $this->uri->segment(5)));
                $data['dataStatusDokumen'] = $this->model_core->get_data('statusdokumen');

                $this->load->view('proses/realisasi_penyerahan_dokumen_proses', $data);
            } elseif ($this->uri->segment(4) == 'dokumen') {
                if ($this->uri->segment(5) == 'proses') {
                    $data['title'] = NOTARY_TITLE . 'Proses pengecekan dokumen';
                    $data['dataStatusDokumen'] = $this->model_core->get_data('statusdokumen');
                    $table = array('dokumen', array('DOKUMENID', 'TRANSAKSIPRAID', 'TIPEDOKUMENID', 'IDSTATUSDOC', 'SCANNEDDOKFILE', 'asli'));
                    $where = array(array('TIPEDOKUMENID', $this->uri->segment(6)), array('TRANSAKSIPRAID', $this->uri->segment(7)));
                    $data['dataTableDokumen'] = $this->model_core->getDataSpecifiedWthWhere2($table, $where);

                    $this->load->view('proses/realisasi_penyerahan_dokumen_proses_1', $data);
                } else {
                    $data['title'] = NOTARY_TITLE . 'Realisasi (Upload Dokumen Baru)';
                    $data['dataTableDokumen'] = $this->model_core->getDataSpecifiedWthWhere('prosesdoc', array('TIPEDOKUMENID'), array('AKTAID', $this->uri->segment(5)));

                    $this->load->view('proses/realisasi_penyerahan_dokumen_dokumen', $data);
                }
            } else {
                $data['title'] = NOTARY_TITLE . 'Realisasi (Penyerahan Dokumen)';
                $data['dataTableTransaksipra'] = $this->model_core->getDataSpecified('transaksipra', array('TRANSAKSIPRAID'));

                $this->load->view('proses/realisasi_penyerahan_dokumen', $data);
            }
        } elseif ($this->uri->segment(3) == 'covernote') {

            if ($this->uri->segment(4) == 'proses') {
                $data['title'] = 'Covernote';

                $this->load->view('proses/realisasi_covernote_proses', $data);
            } else {

                $data['title'] = NOTARY_TITLE . 'Realisasi (Covernote)';
//$data['dataTableTransaksipra'] = $this->model_core->getDataSpecified('transaksipra', array('TRANSAKSIPRAID', 'CUSTOMERID'));
                $data['transaksipra'] = $this->m_transaksipra->getData();
                $this->load->view('proses/realisasi_covernote', $data);
            }
        } elseif ($this->uri->segment(3) == 'penjadwalanClendar') {

            $this->load->model('calendarModel');

            $monthName = array(1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");

            $date = getdate();
            $data['year'] = $date['year'];
            $data['mon'] = $date['mon'];

            if (isset($_POST['year']))
                $data['year'] = $_POST['year'];
            if (isset($_POST['mon']))
                $data['mon'] = $_POST['mon'];

            $data['month'] = $monthName[$data['mon']];


            $data['calendarContent'] = $this->calendarModel->statusJadwal($_POST['empId'], $data['year'], $data['mon']);

            $prefs = array(
                'start_day' => 'monday',
                'month_type' => 'long',
                'day_type' => 'short'
            );

            $prefs['template'] = ' {table_open}<table class="calendar">{/table_open}

								   {heading_row_start}<tr bgcolor="#036">{/heading_row_start}
								
								   {heading_previous_cell}<th><a href="{previous_url}"></a></th>{/heading_previous_cell}
								   {heading_title_cell}<th colspan="{colspan}"></th>{/heading_title_cell}
								   {heading_next_cell}<th><a href="{next_url}"></a></th>{/heading_next_cell}
								
								   {heading_row_end}</tr>{/heading_row_end}
								
								   {week_row_start}<tr >{/week_row_start}
								   {week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
								   {week_row_end}</tr>{/week_row_end}
								
								   {cal_row_start}<tr>{/cal_row_start}
								   {cal_cell_start}<td class="tdWrapper">{/cal_cell_start}
								
								   {cal_cell_content}<span class="{content}" onclick="generateDaySchedule({day})"><span class="day_listing">{day}</span></span>{/cal_cell_content}
								
								   {cal_cell_no_content}<span class="default"><span class="day_listing">{day}</span></span>{/cal_cell_no_content}
								
								   {cal_cell_blank}&nbsp;{/cal_cell_blank}
								
								   {cal_cell_end}</td>{/cal_cell_end}
								   {cal_row_end}</tr>{/cal_row_end}
								
								   {table_close}</table>{/table_close}								';

            $this->load->library('calendar', $prefs);



            $this->load->view('proses/realisasi_penjadwalanCalendar', $data);
        }

        elseif ($this->uri->segment(3) == 'penjadwalanJadwal') {

            $dataSQL = array('aktivitasnotaris', array('AKTIVITASNOTID', 'AKTIFITASDESC',
                    'HOUR(aktivitasnotaris.AWALAKTIFITAS) AS JAMAWAL', 'MINUTE(aktivitasnotaris.AWALAKTIFITAS) AS MENITAWAL',
                    'HOUR(aktivitasnotaris.AKHIRAKTIFITAS) AS JAMAKHIR', 'MINUTE(aktivitasnotaris.AKHIRAKTIFITAS) AS MENITAKHIR'));
            $where = array(
                array('aktivitasnotaris.EMPLOYEEID', $_POST['empId']),
                array('YEAR(aktivitasnotaris.AWALAKTIFITAS)', $_POST['year']),
                array('MONTH(aktivitasnotaris.AWALAKTIFITAS)', $_POST['mon']),
                array('DAY(aktivitasnotaris.AWALAKTIFITAS)', $_POST['day'])
            );
            $data['jadwal'] = $this->model_core->getDataSpecifiedWthWhere2($dataSQL, $where);

            $this->load->view('proses/realisasi_penjadwalanJadwal', $data);
        } elseif ($this->uri->segment(3) == 'penjadwalan') {
            $id = $this->uri->segment(4);

            $data['title'] = NOTARY_TITLE . 'Realisasi(Penjadwalan)';
            $jabatanNotaris = 1;
            $data['employee'] = $this->model_core->getDataSpecifiedWthWhere('employee', array('EMPLOYEEID', 'NAMALENGKAP'), array('JABATANID', $jabatanNotaris));
            $data["idemp"] = $id;
            $this->load->view('proses/realisasi_penjadwalan2', $data);
        }
    }

    public function pasca_realisasi() {
        if ($this->uri->segment(3) == 'ekskalasi') {
            if ($this->uri->segment(4) === 'proses_ekskalasi') {

                $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Proses Eskalasi)';
                $data['transakta'] = $this->model_core->get_where_result('aktatran', array('TRANSAKSIPRAID' => $this->uri->segment(5)));
                
                $this->load->view('proses/pasca_realisasi_eskalasi_proses', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Ekskalasi)';

                $data['transcover'] = $this->model_core->join();
                $this->load->view('proses/pasca_realisasi_ekskalasi', $data);
            }
        } elseif ($this->uri->segment(3) == 'pick_eskalasi') {
            $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Pick Eskalasi)';

            $this->load->view('proses/pasca_realisasi_pick_eskalasi', $data);
        } elseif ($this->uri->segment(3) == 'approval') {
            if ($this->uri->segment(4) === 'proses_approve') {

                $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Proses Eskalasi)';
                $data['transakta'] = $this->model_core->joinAppv2($this->uri->segment(5));

                $this->load->view('proses/pasca_realisasi_approval_proses', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Approval)';

                $data['transcover'] = $this->model_core->joinAppv();
                $this->load->view('proses/pasca_realisasi_approval', $data);
            }
        } elseif ($this->uri->segment(3) == 'update_proses') {
            $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Update Proses)';
            $data['transcover'] = $this->m_transaksipra->getData_update_proses();

            $this->load->view('proses/pasca_realisasi_updateProses', $data);
        } elseif ($this->uri->segment(3) == 'update-proses-details') {
            $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Update Proses)';
            $id = $this->uri->segment(4);
            $data['data'] = $this->m_transaksipra->getData_akta($id);
//            p_code($data);
//            exit;

            $this->load->view('proses/pasca_realisasi_updateproses_detail', $data);
        } else {
            $data['title'] = NOTARY_TITLE . 'Pasca Realisasi';
            $data['monitoring'] = $this->model_core->monitoring();
//            p_code($data['monitoring']);
//            exit;

            $this->load->view('proses/pasca_realisasi_monitoring_baru', $data);
        }
    }

    /*
      | -------------------------------------------------------------------
      |  PEMBAYARAN
      | -------------------------------------------------------------------
     */

    public function pembayaran() {
        if ($this->uri->segment(3) == 'lihat') {
            $this->load->view('proses/pembayaran_lihat');
        } elseif ($this->uri->segment(3) == 'simulasi') {
            $this->load->view('proses/pembayaran_simulasi');
        } elseif ($this->uri->segment(3) == 'bayar') {
            $this->load->view('proses/pembayaran_bayar');
        } elseif ($this->uri->segment(3) == 'ditail_pembayaran') {
            $this->load->view('proses/pembayaran_ditail_pembayaran');
        }
    }

    public function pascaExtend() {
        if ($this->uri->segment(3) == 'updateProses') {
            if ($this->uri->segment(4) == 'modalHead') {
                $data['label'] = $this->model_translate->dynamicTranslate('transaksipra', 'TRANSAKSIPRAID', $this->input->post('tranId'), 'NOTRANSAKSI');
                $this->load->view('proses/myModalLabel', $data);
            } elseif ($this->uri->segment(4) == 'modalBody') {
                $query = "SELECT
							akta.AKTADESC,
							proses.PROSESDESC,
							transaksipra.NOTRANSAKSI
							FROM
							aktatran
							INNER JOIN akta ON aktatran.AKTAID = akta.AKTAID
							INNER JOIN proses ON aktatran.AKTAID = proses.AKTAID
							INNER JOIN transaksipra ON transaksipra.TRANSAKSIPRAID = aktatran.TRANSAKSIPRAID
							WHERE
							aktatran.TRANSAKSIPRAID =" . $this->input->post('tranId');

                $data['dataTranPra'] = $this->model_core->getDataSpecifiedQuery($query);
                $this->load->view('proses/myModalBody', $data);
            } else
                show_404();
        } else
            show_404();
    }

    public function detail_pasca_realisasi($tpID) {
        $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Detail Monitoring)';
        $data['transaksipra'] = $this->m_transaksipra->getDataById($tpID);
        /* if ($cnID != 'kosong' && $tpID != 'kosong') {
          $data['covernote'] = $this->m_covernote->getDataById($cnID);
          $bankid = $this->m_covernote->getDataById($cnID)->BANKUTAMAID;
          $data['bank'] = $this->m_bankutama->getDataById($bankid);
          $data['transaksipra'] = $this->m_transaksipra->getDataById($tpID);
          //$data['prosestran'] = $this->m_prosestran->getDataByTransaksipraID($tpID);
          $data['akta'] = $this->m_aktatran->getDataByTranID($tpID);
          } elseif ($cnID == 'kosong' && $tpID != 'kosong') {
          $data['covernote'] = null;
          $data['bank'] = null;
          $data['transaksipra'] = $this->m_transaksipra->getDataById($tpID);
          $data['akta'] = $this->m_aktatran->getDataByTranID($tpID);
          } else if ($cnID != 'kosong' && $tpID == 'kosong') {
          $data['covernote'] = $this->m_covernote->getDataById($cnID);
          $bankid = $this->m_covernote->getDataById($cnID)->BANKUTAMAID;
          $data['bank'] = $this->m_bankutama->getDataById($bankid);
          $data['transaksipra'] = null;
          $data['akta'] = null;
          } else if ($cnID == 'kosong' && $tpID == 'kosong') {
          $data['covernote'] = null;
          $data['bank'] = null;
          $data['transaksipra'] = null;
          $data['akta'] = null;
          }
         */
        $this->load->view('proses/pasca_realisasi_detail_monitoring', $data);
    }

    public function detail_covernote($id) {
        $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Detail Monitoring)';
        $data['transaksipra'] = $this->m_transaksipra->getDataById($id);
        $data['tipeWilayah'] = $this->model_core->get_data('tipewilayah');
        $this->load->view('proses/detail_covernote', $data);
    }

    public function add_covernote() {

        $count = $this->input->post('counter');
        $tid = $this->input->post('tranid');
        $array;

        for ($i = 0; $i <= $count; $i++) {
            $cn = 'ncnote_' . $i;
            $ncn = "'" . $this->input->post($cn) . "'";
            $array[$i] = $ncn;

            $nocvrnt = implode(',', $array);
        }

        $qry = $this->model_core->cek_covernote($nocvrnt);

        if ($qry == 1) {
            redirect('proses/detail_covernote/' . $tid . '/error');
        } else {

            $count = $this->input->post('counter');
            for ($i = 0; $i <= $count; $i++) {

                $cn = 'ncnote_' . $i;
                $ncn = $this->input->post($cn);
                $tid = $this->input->post('tranid');
                $tgl = $this->input->post('tgl_akad');
                $dev = $this->input->post('developer');
                $nbk = $this->input->post('nama_bank');
                $target = $this->input->post('target_selesai');
                $tanggalTarget = date('Y-m-d', strtotime($target));
                $tanggal = strtotime($tgl);
                $newtanggal = date('Y-m-d', $tanggal);
                $tipeWilayah = $this->input->post('tipeWilayah');

                $bk = $this->input->post('bank');
                //config file upload
                $config['file_name'] = $ncn;
                $config['upload_path'] = './assets/covernote/';
                $config['allowed_types'] = 'gif|jpeg|jpg|png|bmp|word|wordx|pdf';


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('covernote')) {

                    $scan = 'kosong';
                } else {

                    $aa = end(explode(".", $this->upload->file_name));
                    $scan = $ncn . '.' . $aa;
                }

                if ($nbk == 'kosong') {
                    $data = array(
                        'TRANSAKSIPRAID' => $tid,
                        'NOCOVERNOTE' => $ncn,
                        'TGLAKAD' => $newtanggal,
                        'CNSCANNEDFILE' => $scan,
                        'TGLSELESAI' => $tanggalTarget,
                        'TIPEWILAYAHID' => $tipeWilayah
                    );
                    $this->m_covernote->insertData($data);
                } else {
                    $data = array(
                        'TRANSAKSIPRAID' => $tid,
                        'NOCOVERNOTE' => $ncn,
                        'TGLAKAD' => $newtanggal,
                        //'BANKUTAMAID'=>$bk,
                        'CNSCANNEDFILE' => $scan,
                        'TGLSELESAI' => $tanggalTarget,
                        'TIPEWILAYAHID' => $tipeWilayah
                    );
                    $this->m_covernote->insertData($data);
                }
            }
        }
        redirect('proses/realisasi/covernote', 'location', 301 . '?message=success');
    }

    public function AktaGetAjax($aktaid, $aktatranid, $transaksipraid) {
        $data['aktaproses'] = $this->m_proses->getDataByAktaID($aktaid);
        $data['aktatran'] = $aktatranid;
        $data['transaksipra'] = $transaksipraid;
        $this->load->view('proses/akta_get_ajax', $data);
    }

    public function AktaGetAjax2($aktaid, $aktatranid, $transaksipraid) {

        $data['aktaproses'] = $this->m_proses->getDataByAktaID($aktaid);
        $data['aktatran'] = $aktatranid;
        $data['transaksipra'] = $transaksipraid;
        $this->load->view('proses/akta_get_ajax_all', $data);
    }

    public function AjaxDetailEkskalasi($id) {
        $data['akta'] = $this->m_aktatran->getDataByTranID($id);
        $this->load->view('proses/detail_ekskalasi', $data);
    }

    public function setup_akta_add() {

//        p_code($_POST);
//        exit;

        $transaksipra = $this->input->post('transaksipra');
        $no_akta = $this->input->post('nomor_akta');
        $aktatran = $this->input->post('aktatran');
        $check = $this->input->post('proses');

        echo $aktatran;
        exit;

        for ($i = 0; $i < count($check); $i++) {
            $sat = $this->input->post('satuan_' . $i);
            $ps = $this->input->post('id_proses_' . $i);
            $wkt = $this->input->post('waktu_' . $i);
            $wkt = $this->input->post('waktu_' . $i);
            $tglmulai = $this->input->post('tgl_mulai_' . $i);
            echo 'i_' . $i;
            $tanggal = strtotime($tglmulai);
            $newtanggal = date('Y-m-d', $tanggal);
            //echo $check[$i];
            if ($check[$i] != null) {
                $satuan_waktu = $this->m_satuanwaktustd->getDataById($sat);
                $satuan = $satuan_waktu->KONVERSI;
                $totalhari = $wkt * $satuan;
                $years = floor($totalhari / (365));
                $months = floor(($totalhari - $years * 365) / 30);
                $days = floor(($totalhari - $years * 365 - $months * 30));
                $newtgl = $this->m_covernote->add_date($newtanggal, $days, $months, $years);
                $tanggalbaru = date("Y-m-d", strtotime($newtgl));

                $data = array(
                    'AKTATRANID' => $aktatran,
                    'USERID' => $this->session->userdata('USERID'),
                    'PROSESID' => $ps,
                    'SATPROSES' => $sat,
                    'WAKTUPROSTRAN' => $wkt,
                    'TGLMULAI' => $newtanggal,
                    'TGLSELESAI' => $tanggalbaru,
                    'STATUSPROSES' => '1'
                );
                $this->m_prosestran->insertData($data);
            }
        }

        $currentproses = $this->m_prosestran->getCurrentProses($aktatran);
        $tgl_mulai_selesai = $this->m_prosestran->getMinMaxTgl($aktatran);




        foreach ($currentproses as $ps) {
            $tranproses = $ps->PROSESID;
            //echo 'Tanggal mulai '.$tglMulaiAktatran;
        }
        foreach ($tgl_mulai_selesai as $pc) {

            $tglMulaiAktatran = $pc->TGLMULAI;
            $tglSelesaiAktatran = $pc->TGLSELESAI;
        }



        //echo $tranproses;
        if ($currentproses != null) {
            echo 'kosong';
            $data = array(
                'NOAKTA' => $no_akta,
                'CURRENTPROSES' => $tranproses,
                'TGLMULAI' => $tglMulaiAktatran,
                'TGLSELESAI' => $tglSelesaiAktatran
            );
            $this->m_aktatran->updateData($aktatran, $data);
        }
        redirect('proses/detail_covernote/' . $transaksipra, 'location', 301 . '?message=success');
    }

    public function setup_akta_add2() {
        $transaksipra = $this->input->post('transaksipra');
        $no_akta = $this->input->post('nomor_akta');
        $aktatran = $this->input->post('aktatran');
        $check = $this->input->post('proses');

        for ($i = 0; $i < count($check); $i++) {
            $sat = $this->input->post('satuan_' . $i);
            $ps = $this->input->post('id_proses_' . $i);
            $wkt = $this->input->post('waktu_' . $i);
            $tglmulai = $this->input->post('tgl_mulai_' . $i);
            echo 'i_' . $i;
            $tanggal = strtotime($tglmulai);
            $newtanggal = date('Y-m-d', $tanggal);
            //echo $check[$i];
            if ($check[$i] != null) {
                $satuan_waktu = $this->m_satuanwaktustd->getDataById($sat);
                $satuan = $satuan_waktu->KONVERSI;
                $totalhari = $wkt * $satuan;
                $years = floor($totalhari / (365));
                $months = floor(($totalhari - $years * 365) / 30);
                $days = floor(($totalhari - $years * 365 - $months * 30));
                $newtgl = $this->m_covernote->add_date($newtanggal, $days, $months, $years);
                $tanggalbaru = date("Y-m-d", strtotime($newtgl));

                $data = array(
                    'AKTATRANID' => $aktatran,
                    'PROSESID' => $ps,
                    'SATPROSES' => $sat,
                    'WAKTUPROSTRAN' => $wkt,
                    'TGLMULAI' => $newtanggal,
                    'TGLSELESAI' => $tanggalbaru,
                    'STATUSPROSES' => '1'
                );
                $this->m_prosestran->insertData($data);
            }
        }

        $currentproses = $this->m_prosestran->getCurrentProses($aktatran);
        $tgl_mulai_selesai = $this->m_prosestran->getMinMaxTgl($aktatran);

        foreach ($currentproses as $ps) {
            $tranproses = $ps->PROSESTRANID;
            //echo 'Tanggal mulai '.$tglMulaiAktatran;
        }
        foreach ($tgl_mulai_selesai as $pc) {

            $tglMulaiAktatran = $pc->TGLMULAI;
            $tglSelesaiAktatran = $pc->TGLSELESAI;
        }
        //echo $tranproses;
        if ($currentproses != null) {
            echo 'kosong';
            $data = array(
                'NOAKTA' => $no_akta,
                'CURRENTPROSES' => $tranproses,
                'TGLMULAI' => $tglMulaiAktatran,
                'TGLSELESAI' => $tglSelesaiAktatran
            );


            $this->m_aktatran->updateData($aktatran, $data);
        }
        redirect('proses/pra_realisasi/input_all/proses_akta/' . $transaksipra);
    }

    function update_covernote() {
        $tid = $this->input->post('tranid');
        $tgl = $this->input->post('tgl_akad');
        $dev = $this->input->post('developer');
        $bk = $this->input->post('bank');
        $count = $this->input->post('counter');
        $jml = $this->input->post('jml');
        $nbk = $this->input->post('nama_bank');
        $target = $this->input->post('tgl_selesai');
        $tanggalTarget = date('Y-m-d', strtotime($target));
        $tanggal = strtotime($tgl);
        $newtanggal = date('Y-m-d', $tanggal);
        //update covernote lama
        for ($a = 0; $a <= $jml; $a++) {
            $cn = 'ncnotea_' . $a;
            $cid = 'cnoteid_' . $a;
            $ncid = $this->input->post($cid);
            $ncn = $this->input->post($cn);

            $config['file_name'] = $ncn;
            $config['upload_path'] = './assets/covernote/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|bmp|word|wordx|pdf';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('covernote')) {

                $scan = 'kosong';
            } else {

                $aa = end(explode(".", $this->upload->file_name));
                $scan = $ncn . '.' . $aa;
            }
            if ($nbk == 'kosong') {
                $data = array(
                    'TRANSAKSIPRAID' => $tid,
                    'NOCOVERNOTE' => $ncn,
                    'TGLAKAD' => $newtanggal,
                    'CNSCANNEDFILE' => $scan,
                    'TGLSELESAI' => $tanggalTarget
                );
                $this->m_covernote->updateData($ncid, $data);
            } else {
                $data = array(
                    'TRANSAKSIPRAID' => $tid,
                    'NOCOVERNOTE' => $ncn,
                    'TGLAKAD' => $newtanggal,
                    //'BANKUTAMAID'=>$bk,
                    'CNSCANNEDFILE' => $scan,
                    'TGLSELESAI' => $tanggalTarget
                );
                $this->m_covernote->updateData($ncid, $data);
            }
        }
        //add covernote baru
        for ($i = 1; $i <= $count; $i++) {
            $cn = 'ncnote_' . $i;

            $ncn = $this->input->post($cn);

            $config['file_name'] = $ncn;
            $config['upload_path'] = './assets/covernote/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|bmp|word|wordx|pdf';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('covernote')) {

                $scan = 'kosong';
            } else {

                $aa = end(explode(".", $this->upload->file_name));
                $scan = $ncn . '.' . $aa;
            }
            if ($nbk == 'kosong') {
                $data = array(
                    'TRANSAKSIPRAID' => $tid,
                    'NOCOVERNOTE' => $ncn,
                    'TGLAKAD' => $newtanggal,
                    'CNSCANNEDFILE' => $scan,
                    'TGLSELESAI' => $tanggalTarget
                );
                $this->m_covernote->insertData($data);
            } else {
                $data = array(
                    'TRANSAKSIPRAID' => $tid,
                    'NOCOVERNOTE' => $ncn,
                    'TGLAKAD' => $newtanggal,
                    //'BANKUTAMAID'=>$bk,
                    'CNSCANNEDFILE' => $scan,
                    'TGLSELESAI' => $tanggalTarget
                );
                $this->m_covernote->insertData($data);
            }
        }
        redirect('proses/pasca_realisasi', 'location', 301);
    }

    function view_edit_covernote($id) {
        $data['title'] = NOTARY_TITLE . 'Pasca Realisasi (Detail Covernote)';

        $data['transaksipra'] = $this->m_transaksipra->getDataById($id);
        $this->load->view('proses/edit_covernote', $data);
    }

    function detail_edit_covernote($aktaid, $aktatranid, $transaksipraid) {
        $data['aktatranid'] = $aktatranid;
        $data['proses'] = $this->m_proses->getDataByAktaID($aktaid);
        $data['prosestran'] = $this->m_prosestran->getDataByAktatranID($aktatranid);
        $data['transaksipra'] = $transaksipraid;
        $this->load->view('proses/detail_edit_covernote', $data);
    }

    function edit_detail_covernote() {

        $transaksipra = $this->input->post('transaksipra');
        $no_akta = $this->input->post('nomor_akta');
        $aktatran = $this->input->post('aktatran');
        $check = $this->input->post('proses');
        for ($i = 0; $i < count($check); $i++) {
            $sat = $this->input->post('satuan_' . $i);
            $ps = $this->input->post('id_proses_' . $i);
            $wkt = $this->input->post('waktu_' . $i);
            $prosestran = $this->input->post('prosestran_' . $i);
            $tglmulai = $this->input->post('tgl_mulai_' . $i);

            //echo $check[$i];

            if ($check[$i] != null) {

                /* echo $sat;
                  echo $wkt;
                  echo '<br>';
                 */

                //menghitung tanggal selesai berdasarkan tanggal mulai dan jumlah hari
                $satuan_waktu = $this->m_satuanwaktustd->getDataById($sat);
                $satuan = $satuan_waktu->KONVERSI;
                $totalhari = $wkt * $satuan;
                $years = floor($totalhari / (365));
                $months = floor(($totalhari - $years * 365) / 30);
                $days = floor(($totalhari - $years * 365 - $months * 30));
                $newtgl = $this->m_covernote->add_date($tglmulai, $days, $months, $years);
                $tanggalbaru = date("Y-m-d", strtotime($newtgl));
                if ($prosestran == '') {


                    $data = array(
                        'AKTATRANID' => $aktatran,
                        'PROSESID' => $ps,
                        'SATPROSES' => $sat,
                        'WAKTUPROSTRAN' => $wkt,
                        'TGLMULAI' => $tglmulai,
                        'TGLSELESAI' => $tanggalbaru,
                    );
                    $this->m_prosestran->insertData($data);
                } else {
                    $data = array(
                        'AKTATRANID' => $aktatran,
                        'PROSESID' => $ps,
                        'SATPROSES' => $sat,
                        'WAKTUPROSTRAN' => $wkt,
                        'TGLMULAI' => $tglmulai,
                        'TGLSELESAI' => $tanggalbaru,
                    );
                    $this->m_prosestran->updateData($prosestran, $data);
                }
            }
        }

        $MinValue = $this->m_prosestran->getMinNomorUrut($aktatran);
        $MaxValue = $this->m_prosestran->getMaxNomorUrut($aktatran);

        foreach ($MinValue as $ps) {
            $tranproses = $ps->PROSESTRANID;
            $tglMulaiAktatran = $ps->TGLMULAI;
        }
        foreach ($MaxValue as $pc) {

            $tglSelesaiAktatran = $pc->TGLMULAI;
        }

        //echo $tranproses;

        if ($MinValue != null) {


            $data = array(
                'NOAKTA' => $no_akta,
                'CURRENTPROSES' => $tranproses,
                'TGLMULAI' => $tglMulaiAktatran,
                'TGLSELESAI' => $tglSelesaiAktatran
            );
            $this->m_aktatran->updateData($aktatran, $data);
        }

        redirect('proses/view_edit_covernote/' . $transaksipra, 'location', 301);
    }

    //=====================================BEGIN SUBMIT CHANGE PROSES====================================================================
    //function di gunakan untuk mengubah status akta proses dari pasca_realisasi_update_proses 
    //------- proses submit dari http://localhost/notary/proses/pasca_realisasi/update-proses-details/:id ---------
    //===============================================================================================================
    function submit_update_proses($id_akta, $id, $idprosestran) {
//        echo $id_akta . '<br>';
//        echo $id. '<br>';
//        echo $idprosestran;
//        exit;

        $this->m_transaksipra->update_proses_akta($id_akta, $idprosestran);
        redirect('proses/pasca_realisasi/update-proses-details/' . $id . '?message_success');
    }

    //=====================================END SUBMIT CHANGE PROSES====================================================================

    function detail_monitoring_covernote($aktatranid) {
        $data['aktatranid'] = $aktatranid;

        $data['prosestran'] = $this->m_prosestran->getDataByAktatranID($aktatranid);
        $this->load->view('proses/detail_monitoring_covernote', $data);
    }

}
