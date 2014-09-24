<?php

/*
 * Project Name: notary
 * File Name: master_data
 * Created on: 07 Jan 14 - 8:35:47
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Master_data extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->model_core->check_login();
        $this->load->model(array('m_akta', 'm_proses', 'm_aktatran', 'm_aktaproses'));
    }

    public function index() {
        $data['title'] = NOTARY_TITLE . 'Master Data';

        $this->load->view('master_data/index', $data);
    }

    /*
      | -------------------------------------------------------------------
      |  COMMON MASTER
      | -------------------------------------------------------------------
     */

    public function common_master() {

        if ($this->uri->segment(3) == 'customer') {
            if ($this->uri->segment(4) == 'entry') {
                //redirect ke halam entry
                $data['title'] = NOTARY_TITLE . 'Entry Customer Master Data';
                $data['gender'] = $this->model_core->get_data('gender');
                $data['tipecustomer'] = $this->model_core->get_data('tipecustomer');
                $data['pekerjaan'] = $this->model_core->get_data('pekerjaan');
                $data['identitaspersonal'] = $this->model_core->get_data('identitaspersonal');

                $this->load->view('master_data/common_master/customer/entry', $data);
            } elseif ($this->uri->segment(4) == 'entry_detail') {
                //redirect ke halam entry
                $data['title'] = NOTARY_TITLE . 'Entry Detail Customer Master Data';

                $this->load->view('master_data/common_master/customer/entry_detail', $data);
            } elseif ($this->uri->segment(4) == 'detail') {
                //redirect ke halam entry
                $data['title'] = NOTARY_TITLE . 'Detail Customer Master Data';
                $data['basic'] = $this->model_core->get_where_array('customer', array('CUSTOMERID' => $this->uri->segment(5)));
                $data['detail'] = $this->model_core->get_where_array('contactditailcustomer', array('CUSTOMERID' => $this->uri->segment(5)));


                $this->load->view('master_data/common_master/customer/detail_customer', $data);
            } else {
                //redirect ke halaman customer
                $data['title'] = NOTARY_TITLE . 'Customer Master Data';
                $data['basic'] = $this->model_core->get_data('customer');

                $this->load->view('master_data/common_master/customer/index', $data);
            }
        } elseif ($this->uri->segment(3) == 'employee') {
            if ($this->uri->segment(4) == 'entry') {
                //redirect ke halam entry
                $data['title'] = NOTARY_TITLE . ' Entry Employee Master Data';
                $data['gender'] = $this->model_core->get_data('gender');
                $data['jabatan'] = $this->model_core->get_data('jabatan');
                $data['identitaspersonal'] = $this->model_core->get_data('identitaspersonal');
                $data['titel'] = $this->model_core->get_data('title');

                $this->load->view('master_data/common_master/employee/entry', $data);
            } elseif ($this->uri->segment(4) == 'entry_detail') {
                //redirect ke halam entry
                $data['title'] = NOTARY_TITLE . 'Entry Detail Employee Master Data';

                $this->load->view('master_data/common_master/employee/entry_detail', $data);
            } elseif ($this->uri->segment(4) == 'entry_detail_foto') {
                //redirect ke halam entry
                $data['title'] = NOTARY_TITLE . 'Entry Photo Employee Master Data';
                $data['statusdisplay'] = $this->model_core->get_data('statusdisplay');

                $this->load->view('master_data/common_master/employee/entry_detail_foto', $data);
            } elseif ($this->uri->segment(4) == 'detail') {
                //redirect ke halam entry
                $data['title'] = NOTARY_TITLE . 'Detail Employee Master Data';
                $data['basic'] = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $this->uri->segment(5)));
                $data['detail'] = $this->model_core->get_where_array('contactditail', array('EMPLOYEEID' => $this->uri->segment(5)));
                $data['foto'] = $this->model_core->get_where_array('foto', array('EMPLOYEEID' => $this->uri->segment(5)));

//                p_code($data['foto']);
//                exit;

                $this->load->view('master_data/common_master/employee/detail_employee', $data);
            } else {
                //redirect ke halaman employee
                $data['title'] = NOTARY_TITLE . 'Employee Master Data';
                $data['list'] = $this->model_core->get_data('employee');

                $this->load->view('master_data/common_master/employee/index', $data);
            }
        } elseif ($this->uri->segment(3) == 'admin') {

            if ($this->uri->segment(4) == 'akun') {

                if ($this->uri->segment(5) == 'add') {
                    $data['title'] = NOTARY_TITLE . 'Akun';
                    $data['employee'] = $this->model_core->get_data('employee');
                    $data['statususer'] = $this->model_core->get_data('statususer');
                    $data['otoritas'] = $this->model_core->get_data('otoritas');

                    $this->load->view('master_data/common_master/admin/akun_add', $data);
                } elseif ($this->uri->segment(5) == 'edit') {
                    $data['title'] = NOTARY_TITLE . 'Edit Akun';
                    $data['edit'] = $this->model_core->get_where_array('user', array('USERID' => $this->uri->segment(6)));


                    $this->load->view('master_data/common_master/admin/akun_edit', $data);
                } elseif ($this->uri->segment(5) == 'edit_admin') {
                    $data['title'] = NOTARY_TITLE . 'Edit Akun';
                    $data['user'] = $this->model_core->get_data('user');


                    $this->load->view('master_data/common_master/admin/akun_edit_admin', $data);
                } elseif ($this->uri->segment(5) == 'detail') {
                    $data['title'] = NOTARY_TITLE . 'Detail Akun';
                    $data['user'] = $this->model_core->get_where_array('user', array('USERID' => $this->uri->segment(6)));

                    $this->load->view('master_data/common_master/admin/akun_detail', $data);
                } else {
                    //segment untuk otorisasi
                    $data['title'] = NOTARY_TITLE . 'Akun';
                    $field = array('USERID', 'USERNAME', 'EMPLOYEEID', 'STATUSUSERID');
                    $table = 'user';
                    $data['user'] = $this->model_core->getDataSpecified($table, $field);

                    $this->load->view('master_data/common_master/admin/akun', $data);
                }
            } elseif ($this->uri->segment(4) == 'otorisasi') {

                if ($this->uri->segment(5) == 'edit') {
                    $data['title'] = NOTARY_TITLE . 'Edit Otorisasi';
                    $data['user'] = $this->model_core->get_where_array('user', array('USERID' => $this->uri->segment(6)));
                    $data['otoritas'] = $this->model_core->get_data('otoritas');

                    $this->load->view('master_data/common_master/admin/otorisasi_edit', $data);
                } else {
                    $data['title'] = NOTARY_TITLE . 'Otorisasi';
                    $data['user'] = $this->model_core->get_data('user');

                    $this->load->view('master_data/common_master/admin/otorisasi', $data);
                }
                //segment untuk otorisasi
            } elseif ($this->uri->segment(4) == 'customer') {
                if ($this->uri->segment(5) == 'edit') {
                    $data['title'] = NOTARY_TITLE . 'Edit Customer';
                    $data['customer'] = $this->model_core->get_where_array('customer', array('CUSTOMERID' => $this->uri->segment(6)));
                    $data['gender'] = $this->model_core->get_data('gender');
                    $data['tipecustomer'] = $this->model_core->get_data('tipecustomer');
                    $data['pekerjaan'] = $this->model_core->get_data('pekerjaan');
                    $data['identitaspersonal'] = $this->model_core->get_data('identitaspersonal');

                    $this->load->view('master_data/common_master/admin/customer_edit', $data);
                } elseif ($this->uri->segment(5) == 'edit_detail') {
                    $data['title'] = NOTARY_TITLE . 'Edit Detail Customer';
                    $data['detail'] = $this->model_core->get_where_array('contactditailcustomer', array('CUSTOMERID' => $this->uri->segment(6)));

                    $this->load->view('master_data/common_master/admin/customer_edit_detail', $data);
                } elseif ($this->uri->segment(5) == 'detail') {
                    $data['title'] = NOTARY_TITLE . 'Detail Customer';
                    $data['basic'] = $this->model_core->get_where_array('customer', array('CUSTOMERID' => $this->uri->segment(6)));
                    $data['detail'] = $this->model_core->get_where_array('contactditailcustomer', array('CUSTOMERID' => $this->uri->segment(6)));

                    $this->load->view('master_data/common_master/admin/customer_detail', $data);
                } elseif ($this->uri->segment(5) == 'delete') {
                    
                } else {
                    $data['title'] = NOTARY_TITLE . 'Customer';
                    $data['customer'] = $this->model_core->get_data('customer');

                    $this->load->view('master_data/common_master/admin/customer', $data);
                }
                //segment untuk customer
            } elseif ($this->uri->segment(4) == 'employee') {
                if ($this->uri->segment(5) == 'edit') {
                    $data['title'] = NOTARY_TITLE . 'Edit Employee';
                    $data['gender'] = $this->model_core->get_data('gender');
                    $data['jabatan'] = $this->model_core->get_data('jabatan');
                    $data['identitaspersonal'] = $this->model_core->get_data('identitaspersonal');
                    $data['titel'] = $this->model_core->get_data('title');
                    $data['employee'] = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $this->uri->segment(6)));

                    $this->load->view('master_data/common_master/admin/employee_edit', $data);
                } elseif ($this->uri->segment(5) == 'edit_detail') {
                    $data['title'] = NOTARY_TITLE . 'Edit Detail Employee';
                    $data['detail'] = $this->model_core->get_where_array('contactditail', array('EMPLOYEEID' => $this->uri->segment(6)));

                    $this->load->view('master_data/common_master/admin/employee_edit_detail', $data);
                } elseif ($this->uri->segment(5) == 'edit_detail_foto') {
                    $data['title'] = NOTARY_TITLE . 'Detail Employee';
                    $data['foto'] = $this->model_core->get_where_array('foto', array('EMPLOYEEID' => $this->uri->segment(6)));

                    $this->load->view('master_data/common_master/admin/employee_edit_foto', $data);
                } elseif ($this->uri->segment(5) == 'detail') {
                    $data['title'] = NOTARY_TITLE . 'Detail Employee';
                    $data['basic'] = $this->model_core->get_where_array('employee', array('EMPLOYEEID' => $this->uri->segment(6)));
                    $data['detail'] = $this->model_core->get_where_array('contactditail', array('EMPLOYEEID' => $this->uri->segment(6)));
                    $data['foto'] = $this->model_core->get_where_array('foto', array('EMPLOYEEID' => $this->uri->segment(6)));

                    $this->load->view('master_data/common_master/admin/employee_detail', $data);
                } elseif ($this->uri->segment(5) == 'delete') {
                    
                } else {
                    //segment untuk employee
                    $data['title'] = NOTARY_TITLE . 'Employee';
                    $data['list'] = $this->model_core->get_data('employee');
                    $this->load->view('master_data/common_master/admin/employee', $data);
                }
            } elseif ($this->uri->segment(4) == 'konfigurasi_menu') {
                if ($this->uri->segment(5) == 'list') {
                    $data['title'] = NOTARY_TITLE . 'Konfigurasi Menu';
                    $data['otoritasmenu'] = $this->model_core->get_where_result_array('otoritasmenu', array('OTORITASID' => $_POST['otoId']));
//                    p_code($data['otoritasmenu']);
//                    exit;
                    $this->load->view('master_data/common_master/admin/konfigurasi_menu_list', $data);
                } else {
                    $data['title'] = NOTARY_TITLE . 'Konfigurasi Menu';
                    $data['otoritas'] = $this->model_core->get_data('otoritas');

                    $this->load->view('master_data/common_master/admin/konfigurasi_menu', $data);
                }
            }
        } else {
            //halaman utama common master
            $data['title'] = NOTARY_TITLE . 'Common Master';

            $this->load->view('master_data/common_master/index', $data);
        }
    }

    /*
      | -------------------------------------------------------------------
      |  PROSES MASTER
      |  20140121 edited by Ardzix
      | -------------------------------------------------------------------
     */

    public function proses_master() {
        //menuju menu setup progress
        if ($this->uri->segment(3) == 'setup_proses') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Setup Proses (edit)';
                $data['proses'] = $this->model_core->get_where_array('proses', array('PROSESID' => $this->uri->segment(5)));
                $data['kantorproses'] = $this->model_core->get_data('kantorproses');
                $data['satuanwaktustd'] = $this->model_core->get_data('satuanwaktustd');

                $this->load->view('master_data/proses_master/setup_proses_edit', $data);
            } else {
                $this->load->model('parentChild');

                $data['title'] = NOTARY_TITLE . 'Setup Proses';
                $data['dataTable'] = $this->model_core->get_data('proses');
                $this->load->view('master_data/proses_master/setup_proses', $data);
            }
        } elseif ($this->uri->segment(3) == 'setup_proses_new') {
            $this->load->model('parentChild');

            $data['title'] = NOTARY_TITLE . 'Setup Proses';
            $data['satuanwaktustd'] = $this->model_core->get_data('satuanwaktustd');
            $data['kantorproses'] = $this->model_core->get_data('kantorproses');
            $this->load->view('master_data/proses_master/setup_proses_new', $data);
        } elseif ($this->uri->segment(3) == 'setupProsesDokumen') {
            $data['title'] = NOTARY_TITLE . 'Setup Proses';

            $data['proses'] = $this->model_core->getDataSpecified('akta', array('AKTAID', 'AKTADESC'));
            $data['dataTableTipeDokumen'] = $this->model_core->getDataSpecified('tipedokumen', array('TIPEDOKUMENID', 'TIPEDOKDESC'));
            $this->load->view('master_data/proses_master/setupProsesDokumen', $data);
        } elseif ($this->uri->segment(3) == 'setupProsesFormGenerator') {
            $data['title'] = NOTARY_TITLE . 'Setup Proses';

            $this->load->view('master_data/proses_master/setupProsesFormGenerator', $data);
        } elseif ($this->uri->segment(3) == 'setupProsesFormGenerator1') {
            $data['title'] = NOTARY_TITLE . 'Setup Proses';

            $this->load->view('master_data/proses_master/setupProsesFormGenerator1', $data);
        } elseif ($this->uri->segment(3) == 'setupProsesFormGenerator2') {
            $data['title'] = NOTARY_TITLE . 'Setup Proses';

            $this->load->view('master_data/proses_master/setupProsesFormGenerator2', $data);
        } elseif ($this->uri->segment(3) == 'setupProsesFormGenerator3') {
            $data['title'] = NOTARY_TITLE . 'Setup Proses';

            $this->load->view('master_data/proses_master/setupProsesFormGenerator3', $data);
        } elseif ($this->uri->segment(3) == 'setupProsesFormGenerator4') {
            $data['title'] = NOTARY_TITLE . 'Setup Proses';

            $this->load->view('master_data/proses_master/setupProsesFormGenerator4', $data);
        } elseif ($this->uri->segment(3) == 'setup_timeline') {
            if ($this->uri->segment(4) == 'pick') {
                $data['title'] = NOTARY_TITLE . 'Setup timeline';

                if ($this->uri->segment(5) != '') {

                    $id = $this->uri->segment(5);

                    $table = 'aktatran';
                    $join = array(
                        array('prosestran', 'aktatran.aktatranid', 'prosestran.aktatranid'),
                        array('proses', 'prosestran.prosesid', 'proses.prosesid'),
                        array('akta', 'aktatran.aktaid', 'akta.aktaid')
                    );

                    $field = array('akta.AKTAID', 'akta.AKTADESC', 'prosestran.PROSESTRANID', 'proses.PROSESID', 'proses.PROSESDESC', 'prosestran.WAKTUPROSTRAN', 'prosestran.SATPROSES', 'aktatran.TRANSAKSIPRAID');
                    $where = array(array('aktatran.transaksipraid', $id));
                    $data['dataTable'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);
                    $data['satWaktu'] = $this->model_core->getDataSpecified('satuanwaktustd', array('SATWAKTUSTDID', 'SATWAKTUDESC'));

                    /*
                      $where = array('TRANSAKSIPRAID', $this->uri->segment(5));

                      $data['dataTable'] = $this->model_core->getDataSpecifiedWthWhere('prosesTran',array('PROSESTRANID', 'WAKTUPROSTRAN', 'PROSESID', 'SATPROSES'), $where);

                     */

                    $this->load->view('master_data/proses_master/setup_timeline_pick', $data);
                } else {
                    redirect('master_data/proses_master/setup_timeline');
                }
            } else if ($this->uri->segment(4) == 'detail') {
                $data['title'] = NOTARY_TITLE . 'Pra-Realisasi (Detail)';

                $parameter = $this->uri->segment(5);
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
                    redirect('master_data/proses_master/setup_timeline');
            } else {
                $data['title'] = NOTARY_TITLE . 'Setup timeline';

                $data['dataTable'] = $this->model_core->getDataSpecified('transaksipra', array('TRANSAKSIPRAID'));
                $this->load->view('master_data/proses_master/setup_timeline', $data);
            }
        } else if ($this->uri->segment(3) == 'setup_akta') {
            if ($this->uri->segment(4) == 'setup') {
                $data['title'] = NOTARY_TITLE . 'Proses Master (Set-up Akta)';
                $id = $this->uri->segment(5);
                $data['akta'] = $this->m_akta->getDataById($id);
                $this->load->view('master_data/proses_master/setup_akta_setup', $data);
            } else if ($this->uri->segment(4) == 'setup_dokumen') {
                $data['title'] = NOTARY_TITLE . 'Setup Proses';

                $data['proses'] = $this->model_core->get_where_result('akta', array('deleted' => 0));
                $data['dataTableTipeDokumen'] = $this->model_core->getDataSpecified('tipedokumen', array('TIPEDOKUMENID', 'TIPEDOKDESC'));
                $this->load->view('master_data/proses_master/setupProsesDokumen', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Proses Master (Set-Up Akta)';
                $data['akta'] = $this->model_core->get_where_result('akta', array('deleted' => 0));

                $this->load->view('master_data/proses_master/setup_akta', $data);
            }
        } elseif ($this->uri->segment(3) == 'tipe_sertifikat') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Proses Master (Sertifikat-Edit)';
                $data['tipesertifikat'] = $this->model_core->get_where_array('typesertifikat', array('TYPESERTIFIKATID' => $this->uri->segment(5)));

                $this->load->view('master_data/proses_master/tipe_sertifikat_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Proses Master (Sertifikat)';
                $data['tipesertifikat'] = $this->model_core->get_data('typesertifikat');

                $this->load->view('master_data/proses_master/tipe_sertifikat', $data);
            }
        } elseif ($this->uri->segment(3) == 'kantor_proses') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Proses Master (Kantor Proses-Edit)';
                $data['kantorproses'] = $this->model_core->get_where_array('kantorproses', array('KANTORPROSESID' => $this->uri->segment(5)));

                $this->load->view('master_data/proses_master/kantor_proses_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Proses Master (Kantor Proses)';
                $data['kantorproses'] = $this->model_core->get_data('kantorproses');

                $this->load->view('master_data/proses_master/kantor_proses', $data);
            }
        } else {
            $data['title'] = NOTARY_TITLE . 'Proses Master';

            $this->load->view('master_data/proses_master/index', $data);
        }
    }

    /*
      | -------------------------------------------------------------------
      |  FINANCIAL MASTER
      | -------------------------------------------------------------------
     */

    public function financial_master() {
        if ($this->uri->segment(3) == 'bank_info') {
            if ($this->uri->segment(4) == 'sebutan_entry') {
                $data['title'] = NOTARY_TITLE . 'Entry Sebutan Bank(Bank Info)';

                $this->load->view('master_data/financial_master/bank_info/sebutan_entry', $data);
            } elseif ($this->uri->segment(4) == 'sebutan_edit') {


                if ($this->uri->segment(5) == 'edit_sebutan') {
                    $data['title'] = NOTARY_TITLE . 'Edit Sebutan Bank(Bank Info)';
                    $data['bankutama'] = $this->model_core->get_where_array('bankutama', array('BANKUTAMAID' => $this->uri->segment(6)));

                    $this->load->view('master_data/financial_master/bank_info/edit_sebutan', $data);
                } else {
                    $data['title'] = NOTARY_TITLE . 'Edit Sebutan Bank(Bank Info)';
                    $data['bankutama'] = $this->model_core->get_data('bankutama');
                    $this->load->view('master_data/financial_master/bank_info/sebutan_edit', $data);
                }
            } elseif ($this->uri->segment(4) == 'bank_entry') {
                $data['title'] = NOTARY_TITLE . 'Entry Bank(Bank Info)';
                $data['bankutama'] = $this->model_core->get_data('bankutama');

                $this->load->view('master_data/financial_master/bank_info/bank_entry', $data);
            } elseif ($this->uri->segment(4) == 'bank_edit') {

                if ($this->uri->segment(5) == 'edit_bank') {
                    $data['title'] = NOTARY_TITLE . 'Edit Bank(Bank Info)';
                    $data['bankrekening'] = $this->model_core->get_where_array('bankrekening', array('BANKREKID' => $this->uri->segment(6)));
                    $data['bankutama'] = $this->model_core->get_data('bankutama');
                    $this->load->view('master_data/financial_master/bank_info/edit_bank', $data);
                } else {
                    $data['title'] = NOTARY_TITLE . 'Edit Bank(Bank Info)';
                    $data['bankrekening'] = $this->model_core->get_data('bankrekening');
                    $this->load->view('master_data/financial_master/bank_info/bank_edit', $data);
                }
            } elseif ($this->uri->segment(4) == 'rekening_entry') {

                $data['title'] = NOTARY_TITLE . 'Entry Rekening Bank(Bank Info)';
                $data['bankrekening'] = $this->model_core->get_data('bankrekening');

                $this->load->view('master_data/financial_master/bank_info/rekening_entry', $data);
            } elseif ($this->uri->segment(4) == 'rekening_edit') {

                if ($this->uri->segment(5) == 'edit_rekening') {
                    $data['title'] = NOTARY_TITLE . 'Edit Rekening(Bank Info)';
                    $data['daftarrekening'] = $this->model_core->get_where_array('daftarrekening', array('REKENINGID' => $this->uri->segment(6)));

                    //$data['daftarrekening'] = $this->model_core->get_data('daftarrekening');
                    $this->load->view('master_data/financial_master/bank_info/edit_rekening', $data);
                } else {
                    $data['title'] = NOTARY_TITLE . 'Entry Sebutan Bank(Bank Info)';
                    $data['daftarrekening'] = $this->model_core->get_data('daftarrekening');
                    $this->load->view('master_data/financial_master/bank_info/rekening_edit', $data);
                }
            }
        } else {
            $data['title'] = NOTARY_TITLE . 'Financial Master';

            $this->load->view('master_data/financial_master/index', $data);
        }
    }

    /*
      | -------------------------------------------------------------------
      |  SETUP MASTER
      | -------------------------------------------------------------------
     */

    public function set_up() {
        $this->load->model('parentChild');
        $data['satWaktu'] = $this->model_core->getDataSpecified('satuanwaktustd', array('SATWAKTUSTDID', 'SATWAKTUDESC'));
        if ($this->uri->segment(3) == 'user_defined_alert') {
            if ($this->uri->segment(4) == 'pick') {
                $data['title'] = NOTARY_TITLE . 'Set-up - Pick (User Defined Alert)';
                $id = $this->uri->segment(5);

                $table = 'aktatran';
                $join = array(
                    array('prosestran', 'aktatran.aktatranid', 'prosestran.aktatranid'),
                    array('proses', 'prosestran.prosesid', 'proses.prosesid'),
                    array('akta', 'aktatran.aktaid', 'akta.aktaid')
                );

                $field = array('akta.AKTAID', 'akta.AKTADESC', 'prosestran.PROSESTRANID', 'proses.PROSESID', 'proses.PROSESDESC', 'prosestran.SATALERT', 'prosestran.PICALERTPROSTRAN', 'prosestran.SPVALERTPROSTRAN', 'aktatran.TRANSAKSIPRAID', 'proses.DEFSPVALERT', 'proses.DEFPICALERT', 'proses.DEFSATALERT');
                $where = array(array('aktatran.transaksipraid', $id));
                $data['dataTable'] = $this->model_core->getDataSpecifiedJoin($table, $join, $field, $where);
                //$data['dataTable'] = $this->model_core->getDataSpecifiedWthWhere('aktaTran',array('PROSESTRANID', 'PROSESID', 'SATALERT', 'PICALERTPROSTRAN', 'SPVALERTPROSTRAN', 'TRANSAKSIPRAID'),array('TRANSAKSIPRAID',$id));

                $this->load->view('master_data/set_up/user_defined_alert/pick_user', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Set-up (User Defined Alert)';

                $data['dataTable'] = $this->model_core->getDataSpecified('transaksipra', array('TRANSAKSIPRAID'));

                $this->load->view('master_data/set_up/user_defined_alert/index', $data);
            }
        } elseif ($this->uri->segment(3) == 'set_default') {
            if ($this->uri->segment(4) == 'alert') {
                $data['title'] = NOTARY_TITLE . 'Set-up Alert(Set Default)';

                $data['dataTable'] = $this->parentChild->seeker('0', array('PROSESID', 'DEFSATALERT', 'PROSESDESC', 'DEFSPVALERT', 'DEFPICALERT'), 'proses', 'PROSESPARENT', 'PROSESID');
                $this->load->view('master_data/set_up/set_default/alert', $data);
            } elseif ($this->uri->segment(4) == 'proses') {
                $data['title'] = NOTARY_TITLE . 'Set-up Proses(Set Default)';

                $data['dataTable'] = $this->parentChild->seeker('0', array('PROSESID', 'SATWAKTUSTDID', 'PROSESDESC', 'DEFWAKTUSTD'), 'proses', 'PROSESPARENT', 'PROSESID');

                $this->load->view('master_data/set_up/set_default/proses', $data);
            }
        } elseif ($this->uri->segment(3) == 'approval_atau_escalation') {
            $data['title'] = NOTARY_TITLE . 'Set-up (Approval atau Escalation)';

            $this->load->view('master_data/set_up/approval_or_escalation/index', $data);
        } else {
            $data['title'] = NOTARY_TITLE . 'Set-up';

            $this->load->view('master_data/set_up/index', $data);
        }
    }

    /*
      | -------------------------------------------------------------------
      |  FROM MASTER
      | -------------------------------------------------------------------
     */

    public function Form_master() {
        if ($this->uri->segment(3) == 'gender') {

            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Gender';
                $data['gender'] = $this->model_core->get_where_array('gender', array('GENDER' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/gender_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Master Gender';
                $data['gender'] = $this->model_core->get_data('gender');

                $this->load->view('master_data/form_master/gender', $data);
            }
        } elseif ($this->uri->segment(3) == 'pekerjaan') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Gender';
                $data['pekerjaan'] = $this->model_core->get_where_array('pekerjaan', array('PEKERJAANID' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/pekerjaan_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Pekerjaan';
                $data['pekerjaan'] = $this->model_core->get_data('pekerjaan');

                $this->load->view('master_data/form_master/pekerjaan', $data);
            }
        } elseif ($this->uri->segment(3) == 'jabatan') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Jabatan';
                $data['jabatan'] = $this->model_core->get_where_array('jabatan', array('JABATANID' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/jabatan_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Jabatan';
                $data['jabatan'] = $this->model_core->get_data('jabatan');

                $this->load->view('master_data/form_master/jabatan', $data);
            }
        } elseif ($this->uri->segment(3) == 'identitas_personal') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Identitas Personal';
                $data['identitaspersonal'] = $this->model_core->get_where_array('identitaspersonal', array('IDENTITASPERSONALID' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/identitas_personal_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Identitas Personal';
                $data['identitaspersonal'] = $this->model_core->get_data('identitaspersonal');

                $this->load->view('master_data/form_master/identitas_personal', $data);
            }
        } elseif ($this->uri->segment(3) == 'title') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Title';
                $data['title'] = $this->model_core->get_where_array('title', array('TITLEID' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/title_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Title';
                $data['title'] = $this->model_core->get_data('title');

                $this->load->view('master_data/form_master/title', $data);
            }
        } elseif ($this->uri->segment(3) == 'status_display') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Status Display';
                $data['statusdisplay'] = $this->model_core->get_where_array('statusdisplay', array('STATUSDISPLAYID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/status_display_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Status Display';
                $data['statusdisplay'] = $this->model_core->get_data('statusdisplay');

                $this->load->view('master_data/form_master/status_display', $data);
            }
        } elseif ($this->uri->segment(3) == 'status_bayar') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Gender';
                $data['statusbayar'] = $this->model_core->get_where_array('statusbayar', array('STATUSBYR' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/status_bayar_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Status Bayar';
                $data['statusbayar'] = $this->model_core->get_data('statusbayar');

                $this->load->view('master_data/form_master/status_bayar', $data);
            }
        } elseif ($this->uri->segment(3) == 'status_proses') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Status Proses';
                $data['statusproses'] = $this->model_core->get_where_array('statusproses', array('STATUSPROSESID' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/status_proses_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Status Proses';
                $data['statusproses'] = $this->model_core->get_data('statusproses');

                $this->load->view('master_data/form_master/status_proses', $data);
            }
        } elseif ($this->uri->segment(3) == 'status_pajak') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Status Pajak';
                $data['statuspajak'] = $this->model_core->get_where_array('statuspajak', array('STATUSPJKID' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/status_pajak_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Satus Pajak';
                $data['statuspajak'] = $this->model_core->get_data('statuspajak');

                $this->load->view('master_data/form_master/status_pajak', $data);
            }
        } elseif ($this->uri->segment(3) == 'status_user') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Status User';
                $data['statususer'] = $this->model_core->get_where_array('statususer', array('STATUSUSERID' => $this->uri->segment(5)));

                $this->load->view('master_data/form_master/status_user_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Status User';
                $data['statususer'] = $this->model_core->get_data('statususer');

                $this->load->View('master_data/form_master/status_user', $data);
            }
        } elseif ($this->uri->segment(3) == 'tipe_customer') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Tipe Customer';
                $data['tipecustomer'] = $this->model_core->get_where_array('tipecustomer', array('TIPECUSTID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/tipe_customer_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Tipe Customer';
                $data['tipecustomer'] = $this->model_core->get_data('tipecustomer');

                $this->load->view('master_data/form_master/tipe_customer', $data);
            }
        } elseif ($this->uri->segment(3) == 'tipe_pembayaran') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Tipe Pembayaran';
                $data['tipepembayaran'] = $this->model_core->get_where_array('tipepembayaran', array('TIPEBYRID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/tipe_pembayaran_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Tipe Pembayaran';
                $data['tipepembayaran'] = $this->model_core->get_data('tipepembayaran');

                $this->load->view('master_data/form_master/tipe_pembayaran', $data);
            }
        } elseif ($this->uri->segment(3) == 'tipe_dokumen') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Tipe Dokumen';
                $data['tipedokumen'] = $this->model_core->get_where_array('tipedokumen', array('TIPEDOKUMENID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/tipe_dokumen_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Tipe Dokumen';
                $data['tipedokumen'] = $this->model_core->get_data('tipedokumen');

                $this->load->view('master_data/form_master/tipe_dokumen', $data);
            }
        } elseif ($this->uri->segment(3) == 'tipe_wilayah') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Tipe Wilayah';
                $data['tipewilayah'] = $this->model_core->get_where_array('tipewilayah', array('TIPEWILAYAHID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/tipe_wilayah_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Tipe Wilayah';
                $data['tipewilayah'] = $this->model_core->get_data('tipewilayah');

                $this->load->view('master_data/form_master/tipe_wilayah', $data);
            }
        } elseif ($this->uri->segment(3) == 'otoritas') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Otoritas';
                $data['otoritas'] = $this->model_core->get_where_array('otoritas', array('OTORITASID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/otoritas_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Otoritas';
                $data['otoritas'] = $this->model_core->get_data('otoritas');

                $this->load->view('master_data/form_master/otoritas', $data);
            }
        } elseif ($this->uri->segment(3) == 'menu') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Mneu';
                $data['menu'] = $this->model_core->get_where_array('menu', array('MENUID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/menu_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Menu';
                $data['menu'] = $this->model_core->get_data('menu');

                $this->load->view('master_data/form_master/menu', $data);
            }
        } elseif ($this->uri->segment(3) == 'rate_pajak') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Rate Pajak';
                $data['ratepajak'] = $this->model_core->get_where_array('ratepajak', array('RATEPJKID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/rate_pajak_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Rate Pajak';
                $data['ratepajak'] = $this->model_core->get_data('ratepajak');

                $this->load->view('master_data/form_master/rate_pajak', $data);
            }
        } elseif ($this->uri->segment(3) == 'satuan_waktu_standard') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Satuan Waktu Standard';
                $data['satuanwaktustd'] = $this->model_core->get_where_array('satuanwaktustd', array('SATWAKTUSTDID' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/satuan_waktu_standard_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Satuan Waktu Standard';
                $data['satuanwaktustd'] = $this->model_core->get_data('satuanwaktustd');

                $this->load->view('master_data/form_master/satuan_waktu_standard', $data);
            }
        } elseif ($this->uri->segment(3) == 'status_dokumen') {
            if ($this->uri->segment(4) == 'edit') {
                $data['title'] = NOTARY_TITLE . 'Edit Master Satuan Waktu Standard';
                $data['statusdokumen'] = $this->model_core->get_where_array('statusdokumen', array('IDSTATUSDOC' => $this->uri->segment(5)));


                $this->load->view('master_data/form_master/status_dokumen_edit', $data);
            } else {
                $data['title'] = NOTARY_TITLE . 'Satuan Waktu Standard';
                $data['statusdokumen'] = $this->model_core->get_data('statusdokumen');

                $this->load->view('master_data/form_master/status_dokumen', $data);
            }
        }
    }

    //setting akta
    function akta() {
        
    }

    function add_akta() {
        $nama_akta = $this->input->post('nama_akta');
        echo $nama_akta;
        $data = array('AKTADESC' => $nama_akta);
        $this->m_akta->insertData($data);

        redirect('master_data/proses_master/setup_akta?message=success', 'location', 301);
    }

    function setup_akta($id) {
        echo $id;
    }

    function del_akta($id) {
        //$id=$this->input->post('aktaId');
        $this->m_akta->deleteData($id);

        //redirect('master_data/proses_master/setup_akta','location',301);
        redirect('master_data/common_master/admin/akun', 'location', 301);
    }

    function deleteProsesAkta() {
        $aktaId = $this->input->post('id_akta');
        $prosesId = $this->input->post('id_proses');
        
        $this->m_proses->deleteProsesAkta($prosesId, $aktaId);
        redirect('master_data/proses_master/setup_akta/setup/' . $aktaId, 'location', 301);
    }

    function addAktaToProses() {
         
        
        $idAkta = $this->input->post('akta');
        $idProses = $this->input->post('proses');
        $noUrut = $this->input->post('no_urut');
        
        $data = array(
            'PROSESID' => $idProses,
            'AKTAID' => $idAkta,
            'NOMORURUT' => $noUrut
        );
       
        $qry = $this->m_proses->insertToprosesakta($data);
        
        if($qry){
           redirect('master_data/proses_master/setup_akta/setup/' . $idAkta, 'location', 301);
        }
    }

}
