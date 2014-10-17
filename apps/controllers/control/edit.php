<?php

/*
 * Project Name: notary
 * File Name: edit
 * Created on: 20 Jan 14 - 10:11:32
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('m_bankrekening', 'm_sertifikat','m_developer', 'm_satuanwaktustd', 'm_aktaproses', 'm_akta', 'm_aktatran', 'm_customertrans', 'm_transaksipra', 'm_customer', 'm_covernote', 'm_bankutama', 'm_tipewilayah', 'm_prosestran', 'm_proses', 'm_statusproses'));
    }

    /* ===========================================================================
     * 	COMMON MASTER START by KokoroLelah
     * =========================================================================== */

    public function akun() {
//        p_code($_POST);
//        exit;

        $user = $this->model_core->get_where_array('user', array('USERID' => $this->input->post('USERID')));

        if ($this->input->post('PASSWORD') == "" || md5($this->input->post('PASSWORD')) != $user['PASSWORD']) {
            echo '<script language="javascript">alert("password kosong atau password salah");</script>';
            redirect('master_data/common_master/admin/akun/edit/' . $this->input->post('USERID') . '/error');
        } else {
            $data = array(
                'USERNAME' => $this->input->post('USERNAME')
            );
            $where = array(
                'USERID' => $this->input->post('USERID'),
                'PASSWORD' => md5($this->input->post('PASSWORD'))
            );
//            p_code($where);
//            exit;
            $qry = $this->model_core->update_login('user', $where, $data);

            if ($qry) {
                redirect('master_data/common_master/admin/akun?message=update');
            } else {
                redirect('master_data/common_master/admin/akun/edit/' . $this->input->post('USERID') . '?message=error_update');
            }
        }
    }

    public function akun_password() {
        $user = $this->model_core->get_where_array('user', array('USERID' => $this->input->post('USERID')));
        if (md5($this->input->post('PASSWORDLAMA')) != $user['PASSWORD'] || $this->input->post('PASSWORDBARU') != $this->input->post('REPASSWORDBARU')) {
            redirect('master_data/common_master/admin/akun/edit/' . $this->input->post('USERID') . '/error');
        } else {
            $data = array(
                'PASSWORD' => md5($this->input->post('PASSWORDBARU'))
            );

            $qry = $this->model_core->update('user', 'USERID', $this->input->post('USERID'), $data);

            if ($qry) {
                redirect('master_data/common_master/admin/akun?message=update');
            } else {
                redirect('master_data/common_master/admin/akun/edit/' . $this->input->post('USERID') . '?message=error_update');
            }
        }
    }

    public function akun_admin() {

        if ($this->input->post('PASSWORDBARU') != $this->input->post('REPASSWORDBARU')) {
            redirect('master_data/common_master/admin/akun/edit_admin/' . $this->input->post('USERID'));
        } else {
            $data = array(
                'PASSWORD' => md5($this->input->post('PASSWORDBARU'))
            );

            $qry = $this->model_core->update('user', 'USERID', $this->input->post('USERID'), $data);

            if ($qry) {
                redirect('master_data/common_master/admin/akun?message=update');
            } else {
                redirect('master_data/common_master/admin/akun/edit_admin/' . $this->input->post('USERID') . '?message=error_update');
            }
        }
    }

    public function otorisasi_akun() {

        $data = array(
            'OTORITASID' => $this->input->post('OTORITASID')
        );

        $qry = $this->model_core->update('user', 'USERID', $this->input->post('USERID'), $data);

        if ($qry) {
            redirect('master_data/common_master/admin/otorisasi?message=update');
        } else {
            redirect('master_data/common_master/admin/otorisasi/edit/' . $this->input->post('USERID'));
        }
    }

    public function konfigurasi_menu() {

        $data = array(
            'allow' => 1
        );

        $qry1 = $this->model_core->update('otoritasmenu', 'OTORITASID', $this->input->post('OTORITASID'), $data);

        if ($qry1) {
            $menu = $this->input->post('MENUID');
            for ($i = 0; $i < count($menu); $i++) {

                $data = array(
                    'allow' => 0
                );

                $update = array(
                    'OTORITASID' => $this->input->post('OTORITASID'),
                    'MENUID' => $menu[$i]
                );

                $qry = $this->model_core->update_login('otoritasmenu', $update, $data);
            }
            redirect('master_data/common_master/admin/konfigurasi_menu?message=update');
        }
    }

    public function customer() {

        $data = array(
            'PEKERJAANID' => $this->input->post('PEKERJAANID'),
            'GENDER' => $this->input->post('GENDER'),
            'IDENTITASPERSONALID' => $this->input->post('IDENTITASPERSONALID'),
            'TIPECUSTID' => $this->input->post('TIPECUSTID'),
            'NAMACUST' => $this->input->post('NAMACUST'),
            'TANGGALLAHIRCUST' => date('Y-m-d', strtotime($this->input->post('TANGGALLAHIRCUST'))),
            'NOIDPERSONALCUST' => $this->input->post('NOIDPERSONALCUST')
        );

        $qry = $this->model_core->update('customer', 'CUSTOMERID', $this->input->post('CUSTOMERID'), $data);
        if ($qry) {
            redirect('master_data/common_master/admin/customer?message=update');
        }
    }

    public function customer_detail() {


        $data = array(
            'NAMAPERUSAHAAN' => $this->input->post('NAMAPERUSAHAAN'),
            'GEDUNGCUST' => $this->input->post('GEDUNGCUST'),
            'LANTAICUST' => $this->input->post('LANTAICUST'),
            'JALANCUST' => $this->input->post('JALANCUST'),
            'KELURAHANCUST' => $this->input->post('KELURAHANCUST'),
            'RTCUST' => $this->input->post('RTCUST'),
            'RWCUST' => $this->input->post('RWCUST'),
            'KECAMATANCUST' => $this->input->post('KECAMATANCUST'),
            'KODEPOSCUST' => $this->input->post('KODEPOSCUST'),
            'DATI2CUST' => $this->input->post('DATI2CUST'),
            'NOTELPCUST' => $this->input->post('NOTELPCUST'),
            'DATI1CUST' => $this->input->post('DATI1CUST'),
            'NOFAXCUST' => $this->input->post('NOFAXCUST'),
            'NEGARACUST' => $this->input->post('NEGARACUST'),
            'NOHPCUST' => $this->input->post('NOHPCUST'),
            'EMAIL' => $this->input->post('EMAIL')
        );

        $qry = $this->model_core->update('contactditailcustomer', 'CUSTOMERID', $this->input->post('CUSTOMERID'), $data);

        if ($qry) {
            redirect('master_data/common_master/admin/customer?message=update');
        }
    }

    public function employee() {

        $tglLahir = date('Y-m-d', strtotime($this->input->post('TANGGALLAHIR')));
        if ($tglLahir == '1970-01-01') {
            $tglLahir = NULL;
        }

        $data = array(
            'NIP' => $this->input->post('NIP'),
            'IDENTITASPERSONALID' => $this->input->post('IDENTITASPERSONALID'),
            'NOIDENTITASPERSONAL' => $this->input->post('NOIDENTITASPERSONAL'),
            'NAMALENGKAP' => $this->input->post('NAMALENGKAP'),
            'GENDER' => $this->input->post('GENDER'),
            'TANGGALLAHIR' => $tglLahir,
            'JABATANID' => $this->input->post('JABATANID'),
            'TITLEID' => $this->input->post('TITLEID'),
            'IS_PJ' => $this->input->post('pjproses')
        );

        $qry = $this->model_core->update('employee', 'EMPLOYEEID', $this->input->post('EMPLOYEEID'), $data);

        if ($qry) {

            redirect('master_data/common_master/admin/employee?message=update');
        }
    }

    public function employee_detail() {

        $data = array(
            'GEDUNG' => $this->input->post('GEDUNG'),
            'LANTAIGEDUNG' => $this->input->post('LANTAIGEDUNG'),
            'JALAN' => $this->input->post('JALAN'),
            'KELURAHANDESA' => $this->input->post('KELURAHANDESA'),
            'RT' => $this->input->post('RT'),
            'KECAMATAN' => $this->input->post('KECAMATAN'),
            'RW' => $this->input->post('RW'),
            'DATI1' => $this->input->post('DATI1'),
            'KODEPOS' => $this->input->post('KODEPOS'),
            'DATI2' => $this->input->post('DATI2'),
            'NEGARA' => $this->input->post('NEGARA'),
            'NOTELP' => $this->input->post('NOTELP'),
            'NOHP' => $this->input->post('NOHP'),
            'EMAIL' => $this->input->post('EMAIL')
        );

        $qry = $this->model_core->update('contactditail', 'EMPLOYEEID', $this->input->post('EMPLOYEEID'), $data);

        if ($qry) {

            redirect('master_data/common_master/admin/employee?message=update');
        }
    }

    public function employee_detail_foto() {

//      
        $config['upload_path'] = './assets/images/employee';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
            p_code($error);

// uploading failed. $error will holds the errors.
        } else {
            $param = array('upload_data' => $this->upload->data());

            if ($param) {
                $data = array(
                    'NAMAFILEIMAGE' => $param['upload_data']['file_name'],
                    'UKURANFILE' => $param['upload_data']['file_size'],
                    'TIPEFILE' => $param['upload_data']['file_type'],
                    'PANJANGIMAGE' => $param['upload_data']['image_height'],
                    'LEBARIMAGE' => $param['upload_data']['image_width'],
                    'STATUSDISPLAYID' => $this->input->post('STATUSDISPLAYID')
                );

                $qry = $this->model_core->update('foto', 'EMPLOYEEID', $this->input->post('EMPLOYEEID'), $data);
                if ($qry) {
                    redirect('master_data/common_master/admin/employee?message=update');
                } else {
                    redirect('master_data/common_master/admin/employee_edit_foto');
                }
            }

// uploading successfull, now do your further actions
        }
    }

    /* ===========================================================================
     * 	COMMON MASTER END by KokoroLelah
     * =========================================================================== */

    /* ===========================================================================
     * 	FINANCIAL MASTER START by IRFAN
     * =========================================================================== */

    public function edit_bank_utama() {
        $data = array(
            'BANKUTAMADESC' => $this->input->post('BANKUTAMADESC')
        );

        $qry = $this->model_core->update('bankutama', 'BANKUTAMAID', $this->input->post('BANKUTAMAID'), $data);

        if ($qry) {
            redirect('master_data/financial_master/bank_info/sebutan_edit?message=update');
        } else {
            redirect('master_data/form_master/otoritas/');
        }
    }

    public function edit_bank_rekenning() {
        $data = array(
            'BANKUTAMAID' => $this->input->post('BANKUTAMAID'),
            'BANKREKDESC' => $this->input->post('BANKREKDESC'),
            'ALAMATBANKREK' => $this->input->post('ALAMATBANKREK')
        );

        $qry = $this->model_core->update('bankrekening', 'BANKREKID', $this->input->post('BANKREKID'), $data);

        if ($qry) {
            redirect('master_data/financial_master/bank_info/bank_edit?message=update');
        } else {
            redirect('master_data/financial_master/bank_info/bank_edit?message=error');
        }
    }

    public function edit_daftar_rekening() {

        $data = array(
            'NOREKENING' => $this->input->post('NOREKENING'),
            'NMREKENING' => $this->input->post('NMREKENING')
        );

        $qry = $this->model_core->update('daftarrekening', 'REKENINGID', $this->input->post('REKENINGID'), $data);

        if ($qry) {
            redirect('master_data/financial_master/bank_info/rekening_edit?message=update');
        } else {
            redirect('master_data/financial_master/bank_info/rekening_edit?message=error');
        }
    }

    /* ===========================================================================
     * 	FINANCIAL MASTER END by IRFAN
     * =========================================================================== */

    /* ===========================================================================
     * 	FORM MASTER START by IRFAN
     * =========================================================================== */

    public function edit_gender() {
        $data = array(
            'GENDERDESC' => $this->input->post('GENDERDESC')
        );

        $qry = $this->model_core->update('gender', 'GENDER', $this->input->post('GENDER'), $data);

        if ($qry) {
            redirect('master_data/form_master/gender?message=update');
        } else {
            redirect('master_data/form_master/gender?message=error');
        }
    }

    public function edit_pekerjaan() {
        $data = array(
            'PEKERJAANDESC' => $this->input->post('PEKERJAANDESC')
        );

        $qry = $this->model_core->update('pekerjaan', 'PEKERJAANID', $this->input->post('PEKERJAANID'), $data);

        if ($qry) {
            redirect('master_data/form_master/pekerjaan?message=update');
        } else {
            redirect('master_data/form_master/pekerjaan?message=error');
        }
    }

    public function edit_jabatan() {
        $data = array(
            'JABATANDESC' => $this->input->post('JABATANDESC')
        );

        $qry = $this->model_core->update('jabatan', 'JABATANID', $this->input->post('JABATANID'), $data);

        if ($qry) {
            redirect('master_data/form_master/jabatan?message=update');
        } else {
            redirect('master_data/form_master/jabatan?message=error');
        }
    }

    public function edit_identitas_personal() {
        $data = array(
            'IDENTITASPERSONALDESC' => $this->input->post('IDENTITASPERSONALDESC')
        );

        $qry = $this->model_core->update('identitaspersonal', 'IDENTITASPERSONALID', $this->input->post('IDENTITASPERSONALID'), $data);

        if ($qry) {
            redirect('master_data/form_master/identitas_personal?message=update');
        } else {
            redirect('master_data/form_master/identitas_personal/');
        }
    }

    public function edit_title() {
        $data = array(
            'TITLEDESC' => $this->input->post('TITLEDESC')
        );

        $qry = $this->model_core->update('title', 'TITLEID', $this->input->post('TITLEID'), $data);

        if ($qry) {
            redirect('master_data/form_master/title?message=update');
        } else {
            redirect('master_data/form_master/title/');
        }
    }

    public function edit_status_display() {
        $data = array(
            'STATUSDISPLAYDESC' => $this->input->post('STATUSDISPLAYDESC')
        );

        $qry = $this->model_core->update('statusdisplay', 'STATUSDISPLAYID', $this->input->post('STATUSDISPLAYID'), $data);

        if ($qry) {
            redirect('master_data/form_master/status_display?message=update');
        } else {
            redirect('master_data/form_master/status_display/');
        }
    }

    public function edit_status_bayar() {
        $data = array(
            'STATUSBYRDESC' => $this->input->post('STATUSBYRDESC')
        );

        $qry = $this->model_core->update('statusbayar', 'STATUSBYR', $this->input->post('STATUSBYR'), $data);

        if ($qry) {
            redirect('master_data/form_master/status_bayar?message=update');
        } else {
            redirect('master_data/form_master/status_bayar/');
        }
    }

    public function edit_status_proses() {
        $data = array(
            'STATUSDESC' => $this->input->post('STATUSDESC')
        );

        $qry = $this->model_core->update('statusproses', 'STATUSPROSESID', $this->input->post('STATUSPROSESID'), $data);

        if ($qry) {
            redirect('master_data/form_master/status_proses?message=update');
        } else {
            redirect('master_data/form_master/status_proses/');
        }
    }

    public function edit_status_pajak() {
        $data = array(
            'STATUSPJKDESC' => $this->input->post('STATUSPJKDESC')
        );

        $qry = $this->model_core->update('statuspajak', 'STATUSPJKID', $this->input->post('STATUSPJKID'), $data);

        if ($qry) {
            redirect('master_data/form_master/status_pajak?message=update');
        } else {
            redirect('master_data/form_master/status_pajak/');
        }
    }

    public function edit_status_user() {
        $data = array(
            'STATUSUSERDESC' => $this->input->post('STATUSUSERDESC')
        );

        $qry = $this->model_core->update('statususer', 'STATUSUSERID', $this->input->post('STATUSUSERID'), $data);

        if ($qry) {
            redirect('master_data/form_master/status_user?message=update');
        } else {
            redirect('master_data/form_master/status_user/');
        }
    }

    public function edit_tipe_customer() {
        $data = array(
            'TIPECUSTDESC' => $this->input->post('TIPECUSTDESC'),
            'INISIALTIPECUST' => $this->input->post('INISIALTIPECUST')
        );

        $qry = $this->model_core->update('tipecustomer', 'TIPECUSTID', $this->input->post('TIPECUSTID'), $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_customer?message=update');
        } else {
            redirect('master_data/form_master/tipe_customer/');
        }
    }

    public function edit_tipe_pembayaran() {
        $data = array(
            'TIPEBYRIDDESC' => $this->input->post('TIPEBYRIDDESC')
        );

        $qry = $this->model_core->update('tipepembayaran', 'TIPEBYRID', $this->input->post('TIPEBYRID'), $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_pembayaran?message=update');
        } else {
            redirect('master_data/form_master/tipe_pembayaran/');
        }
    }

    public function edit_tipe_dokumen() {
        $data = array(
            'TIPEDOKDESC' => $this->input->post('TIPEDOKDESC')
        );

        $qry = $this->model_core->update('tipedokumen', 'TIPEDOKUMENID', $this->input->post('TIPEDOKUMENID'), $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_dokumen?message=update');
        } else {
            redirect('master_data/form_master/tipe_dokumen/');
        }
    }

    public function edit_tipe_wilayah() {
        $data = array(
            'TIPEWILAYAHDESC' => $this->input->post('TIPEWILAYAHDESC')
        );

        $qry = $this->model_core->update('tipewilayah', 'TIPEWILAYAHID', $this->input->post('TIPEWILAYAHID'), $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_wilayah?message=update');
        } else {
            redirect('master_data/form_master/tipe_wilayah/');
        }
    }

    public function edit_otoritas() {
        $data = array(
            'OTORITASDESC' => $this->input->post('OTORITASDESC')
        );

        $qry = $this->model_core->update('otoritas', 'OTORITASID', $this->input->post('OTORITASID'), $data);

        if ($qry) {
            redirect('master_data/form_master/otoritas?message=update');
        } else {
            redirect('master_data/form_master/otoritas/');
        }
    }

    public function edit_menu() {
        $data = array(
            'MENUDESC' => $this->input->post('MENUDESC'),
            'LEVELMENU' => $this->input->post('LEVELMENU'),
            'NOURUTMENU' => $this->input->post('NOURUTMENU')
        );

        $qry = $this->model_core->update('menu', 'MENUID', $this->input->post('MENUID'), $data);

        if ($qry) {
            redirect('master_data/form_master/menu/');
        } else {
            redirect('master_data/form_master/menu/');
        }
    }

    public function edit_rate_pajak() {
        $data = array(
            'TGGLAWALBERLAKU' => date('Y-m-d', strtotime($this->input->post('TGGLAWALBERLAKU'))),
            'TGGLAKHIRBERLAKU' => date('Y-m-d', strtotime($this->input->post('TGGLAKHIRBERLAKU'))),
            'NILRATEPJK' => $this->input->post('NILRATEPJK')
        );

        $qry = $this->model_core->update('ratepajak', 'RATEPJKID', $this->input->post('RATEPJKID'), $data);

        if ($qry) {
            redirect('master_data/form_master/rate_pajak?message=update');
        } else {
            redirect('master_data/form_master/rate_pajak/');
        }
    }

    public function edit_satuan_waktu_std() {
        $data = array(
            'SATWAKTUDESC' => $this->input->post('SATWAKTUDESC'),
            'KONVERSI' => $this->input->post('KONVERSI')
        );

        $qry = $this->model_core->update('satuanwaktustd', 'SATWAKTUSTDID', $this->input->post('SATWAKTUSTDID'), $data);

        if ($qry) {
            redirect('master_data/form_master/satuan_waktu_standard?message=update');
        } else {
            redirect('master_data/form_master/satuan_waktu_standard/');
        }
    }

    public function tipe_sertifikat() {
        $data = array(
            'TYPESERTIFIKATDESC' => $this->input->post('TYPESERTIFIKATDESC')
        );

        $qry = $this->model_core->update('typesertifikat', 'TYPESERTIFIKATID', $this->input->post('TYPESERTIFIKATID'), $data);

        if ($qry) {
            redirect('master_data/proses_master/tipe_sertifikat?message=update');
        }
    }

    public function kantor_proses() {
        $data = array(
            'KANTORPROSES' => $this->input->post('KANTORPROSES')
        );

        $qry = $this->model_core->update('kantorproses', 'KANTORPROSESID', $this->input->post('KANTORPROSESID'), $data);

        if ($qry) {
            $this->session->set_flashdata('success_edit', 'edit berhasil');
            redirect('master_data/proses_master/kantor_proses');
        }
    }

    public function edit_status_dokumen() {
        $data = array(
            'STATUS' => $this->input->post('STATUS')
        );

        $qry = $this->model_core->update('statusdokumen', 'IDSTATUSDOC', $this->input->post('IDSTATUSDOC'), $data);

        if ($qry) {
            redirect('master_data/form_master/status_dokumen?message=update');
        } else {
            redirect('master_data/form_master/status_dokumen/');
        }
    }

    /* ===========================================================================
     * 	FORM MASTER END by IRFAN
     * =========================================================================== */

    /* ===========================================================================
     * 	PRA-REALISASI START
     * =========================================================================== */

    public function status_dokumen() {
//        p_code($_POST);
//        exit;
        $data = array(
            'IDSTATUSDOC' => $this->input->post('IDSTATUSDOC')
        );

        $qry = $this->model_core->update('dokumen', 'DOKUMENID', $this->input->post('DOKUMENID'), $data);

        if ($qry) {
            redirect(base_url() . 'proses/pra_realisasi/validasi/proses/' . $this->input->post('TRANSAKSIPRAID') . '?message=update');
        }
    }

    public function status_dokumen_asli() {
//        p_code($_POST);
//        exit;
        $data = array(
            'IDSTATUSDOC' => $this->input->post('IDSTATUSDOC'),
            'asli' => $this->input->post('asli')
        );

        $qry = $this->model_core->update('dokumen', 'DOKUMENID', $this->input->post('DOKUMENID'), $data);

        if ($qry) {
            redirect(base_url() . 'proses/realisasi/penyerahanDokumen/proses/' . $this->input->post('TRANSAKSIPRAID') . '?message=update_asli');
        }
    }

    public function status_akta() {
//        p_code($_POST);
//        exit;
        $data = array(
            'STATUSAKTAID' => $this->input->post('STATUSAKTAID')
        );

        $qry = $this->model_core->update('aktatran', 'AKTATRANID', $this->input->post('AKTATRANID'), $data);

        if ($qry) {
            redirect(base_url() . 'proses/pra_realisasi/drop/proses/' . $this->input->post('TRANSAKSIPRAID') . '?message=update');
        }
    }

    /* ===========================================================================
     * 	PRA-REALISASI START
     * =========================================================================== */

    /* ===========================================================================
     * 	SET DEFAULT by TAUFIK
     * =========================================================================== */

    public function default_waktu_proses() {

        $data = array(
            'SATWAKTUSTDID' => $this->input->post('SATUAN'),
            'DEFWAKTUSTD' => $this->input->post('VALUE'),
        );

        $qry = $this->model_core->update('proses', 'PROSESID', $this->input->post('PROSESID'), $data);

        if ($qry) {
            redirect(base_url() . 'master_data/set_up/set_default/proses?message=update');
        }
    }

    public function default_alert() {

        $data = array(
            'DEFSATALERT' => $this->input->post('SATUAN'),
            'DEFSPVALERT' => $this->input->post('DEFSVPALERT'),
            'DEFPICALERT' => $this->input->post('DEFPICALERT'),
        );

        $qry = $this->model_core->update('proses', 'PROSESID', $this->input->post('PROSESID'), $data);

        if ($qry) {
            redirect(base_url() . 'master_data/set_up/set_default/alert?message=update');
        }
    }

    public function setup_timeline() {
        $data = array(
            'WAKTUPROSTRAN' => $this->input->post('VALUE'),
            'SATPROSES' => $this->input->post('SATUAN')
        );

        echo $this->input->post('PROSESTRANID');
        echo $this->input->post('VALUE');
        $qry = $this->model_core->update('prosestran', 'PROSESTRANID', $this->input->post('PROSESTRANID'), $data);

        if ($qry) {
            redirect(base_url() . 'master_data/proses_master/setup_timeline/pick/' . $this->input->post('TRANSAKSIPRAID') . '?message=update');
        }
    }

    public function setup_userdefined_alert() {
        $data = array(
            'PICALERTPROSTRAN' => $this->input->post('DEFPICALERT'),
            'SPVALERTPROSTRAN' => $this->input->post('DEFSVPALERT'),
            'SATALERT' => $this->input->post('SATUAN')
        );

        echo $this->input->post('PROSESTRANID');
        echo $this->input->post('VALUE');
        $qry = $this->model_core->update('prosestran', 'PROSESTRANID', $this->input->post('PROSESTRANID'), $data);

        if ($qry) {
            redirect(base_url() . 'master_data/set_up/user_defined_alert/pick/' . $this->input->post('TRANSAKSIPRAID') . '?message=update');
        }
    }

    /* ===========================================================================
     * 	SET DEFAULT END by TAUFIK
     * =========================================================================== */

    public function upload_dokumen() {

        $filename = 'docProses_' . $this->input->post('TRANSAKSIPRAID') . '_' . $this->input->post('TIPEDOKUMENID') . '_' . $_FILES['dokumen']['name'];

        $config['upload_path'] = './assets/docs';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('dokumen')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $param = array('upload_data' => $this->upload->data());

            if ($param) {
                $data = array(
                    'SCANNEDDOKFILE' => $param['upload_data']['file_name'] . ';' . $param['upload_data']['file_type'] . ';' . $param['upload_data']['file_size']
                );

                $qry = $this->model_core->update('dokumen', 'DOKUMENID', $this->input->post('DOKUMENID'), $data);
                if ($qry) {
                    redirect('proses/realisasi/penyerahanDokumen/proses/' . $this->input->post('TRANSAKSIPRAID') . '?message=update_dokumen');
                } else {
                    redirect('proses/realisasi/penyerahanDokumen/proses/' . $this->input->post('TRANSAKSIPRAID') . '?message=error_dokumen');
                }
            }

// uploading successfull, now do your further actions
        }
    }

    public function approve() {
//        p_code($_POST);
//        exit;

        $data = array(
            'APPROVAL' => 1
        );

        $qry = $this->model_core->update('eskalasi', 'EKSKAID', $this->input->post('EKSKAID'), $data);

        if ($qry) {

            $field = array('parent');
            $where = array('EKSKAID =', $this->input->post('EKSKAID'));
            $ambildata = $this->model_core->getDataSpecifiedWthWhere('eskalasi', $field, $where);

            if ($ambildata[0]->parent != NULL) {

                $data3 = array(
                    'APPROVAL' => 1
                );

                $this->model_core->update('eskalasi', 'EKSKAID', $this->input->post('parent'), $data3);

                $data1 = array(
                    'TGLDEADLINE' => date('Y-m-d', strtotime($this->input->post('TGLDEADLINE'))),
                );
                $qry1 = $this->model_core->update('prosestran', 'PROSESTRANID', $this->input->post('PROSESID'), $data1);
                if ($qry1) {

                    $where = array(
                        'EKSKAID' => $this->input->post('parent')
                    );
                    $ambildata2 = $this->model_core->get_where_array('eskalasi', $where);

                    $data2 = array(
                        'STATUS' => 0,
                        'TIPE' => 1,
                        'MESSAGE1' => 'Approval Accepted : ' . $this->input->post('AKTADESC'),
                        'MESSAGE2' => 'Deadline changed to ' . $this->input->post('TGLDEADLINE'),
                        'EMPLOYEEID' => $ambildata2['EMPLOYEEID'],
                        'LINK' => $this->input->post('LINK2')
                    );

                    $this->model_core->insert('notifikasi', $data2);

                    $data4 = array(
                        'STATUS' => 0,
                        'TIPE' => 1,
                        'MESSAGE1' => 'Approval Accepted : ' . $this->input->post('AKTADESC'),
                        'MESSAGE2' => 'Deadline changed to ' . $this->input->post('TGLDEADLINE'),
                        'EMPLOYEEID' => $this->input->post('EMPLOYEEID'),
                        'LINK' => $this->input->post('LINK')
                    );

                    $qry2 = $this->model_core->insert('notifikasi', $data4);

                    if ($qry2) {
                        redirect('proses/pasca_realisasi/approval/proses_approve/' . $this->input->post('TRANSAKSIPRAID'));
                    }
                }
            } else {

                $data1 = array(
                    'TGLDEADLINE' => date('Y-m-d', strtotime($this->input->post('TGLDEADLINE'))),
                );
                $qry1 = $this->model_core->update('prosestran', 'PROSESTRANID', $this->input->post('PROSESID'), $data1);

                if ($qry1) {

                    $data4 = array(
                        'STATUS' => 0,
                        'TIPE' => 1,
                        'MESSAGE1' => 'Approval Accepted : ' . $this->input->post('AKTADESC'),
                        'MESSAGE2' => 'Deadline changed to ' . $this->input->post('TGLDEADLINE'),
                        'EMPLOYEEID' => $this->input->post('EMPLOYEEID'),
                        'LINK' => $this->input->post('LINK')
                    );

                    $qry2 = $this->model_core->insert('notifikasi', $data4);

                    if ($qry2) {
                        redirect('proses/pasca_realisasi/approval/proses_approve/' . $this->input->post('TRANSAKSIPRAID') . '?message=success_approve');
                    }
                }
            }
        }
    }

    public function tolak_approve() {
        $data = array(
            'APPROVAL' => 2
        );

        $qry = $this->model_core->update('eskalasi', 'EKSKAID', $this->uri->segment(4), $data);
        if ($qry) {
            redirect('proses/pasca_realisasi/approval/proses_approve/' . $this->uri->segment(5));
        }
    }

    public function jadwal($idemp, $id) {
        $day = $this->input->post('dayForm');
        $mon = $this->input->post('monForm');
        $year = $this->input->post('yearForm');
        $startTime = explode(':', $this->input->post('bTime'));
        $stopTime = explode(':', $this->input->post('eTime'));
        $startHour = $startTime[0];
        $startMin = $startTime[1];
        $stopHour = $stopTime[0];
        $stopMin = $stopTime[1];

        $startActivity = $year . '-' . $mon . '-' . $day . ' ' . $startHour . ':' . $startMin . ':00';
        $stopActivity = $year . '-' . $mon . '-' . $day . ' ' . $stopHour . ':' . $stopMin . ':00';
        $totalHours = (doubleval($stopHour) + doubleval($stopMin / 60)) - (doubleval($startHour) + doubleval($startMin / 60));

        $data = array(
            'AKTIFITASDESC' => $this->input->post('desc'),
            'AWALAKTIFITAS' => $startActivity,
            'AKHIRAKTIFITAS' => $stopActivity,
            'TOTALJAM' => $totalHours
        );


        $qry = $this->model_core->update('aktivitasnotaris', 'AKTIVITASNOTID', $id, $data);

        if ($qry) {
            redirect('proses/realisasi/penjadwalan/' . $idemp);
        } else {
            redirect('proses/realisasi/penjadwalan/' . $idemp);
        }
    }

    public function setupProses() {
//        p_code($_POST);
//        exit;
        $data = array(
            'SATWAKTUSTDID' => $this->input->post('SATWAKTUSTDID'),
            'DEFWAKTUSTD' => $this->input->post('DEFWAKTUSTD'),
            'PROSESDESC' => $this->input->post('PROSESDESC'),
            'DEFSATALERT' => $this->input->post('DEFSATALERT'),
            'DEFPICALERT' => $this->input->post('DEFPICALERT'),
            'DEFSPVALERT' => $this->input->post('DEFSPVALERT'),
            'DEFBIAYAPROSES' => $this->input->post('DEFBIAYAPROSES'),
            'DEFBIAYADROP' => $this->input->post('DEFBIAYADROP'),
            'KANTORPROSESID' => $this->input->post('kantorprosesid')
        );

        $qry = $this->model_core->update('proses', 'PROSESID', $this->uri->segment(4), $data);

        if ($qry) {
            redirect('master_data/proses_master/setup_proses?message=update');
        }
    }

    public function akta() {
//        p_code($_POST);
//        exit;
        $data = array(
            'AKTADESC' => $this->input->post('NAMAAKTA')
        );

        $qry = $this->model_core->update('akta', 'AKTAID', $this->input->post('AKTAID'), $data);

        if ($qry) {
            redirect('master_data/proses_master/setup_akta?message=update');
        }
    }

    /* ===========================================================================
     * 	INPUT DATA START by KokoroLelah
     * =========================================================================== */

    public function transaksi() {
//        p_code($_POST);
//        exit;
        $developerid = $this->input->post('developerId');
        if ($developerid == '') {
            $developerid = NULL;
        }

        $data = array(
            'EMPLOYEEID' => $this->input->post('employeeId'),
            'STATUSPJKID' => $this->input->post('statusPajakId'),
            'DEVELOPERID' => $developerid,
            'BANKREKID' => $this->input->post('bankId'),
            'SUPERVISOR' => $this->input->post('spv'),
            'NOTARIS' => $this->input->post('notaris')
        );

        $qry = $this->model_core->update('transaksipra', 'TRANSAKSIPRAID', $this->input->post('transaksipraid'), $data);

        if ($qry) {
            $this->session->set_flashdata('transaksi_edit', 'sukses');
            redirect('proses/pasca_realisasi');
        }
    }

    public function covernote() {
//        p_code($_POST);
//        exit;
        $data = array(
            'NOCOVERNOTE' => $this->input->post('noCovernote'),
            'TGLAKAD' => date('Y-m-d', strtotime($this->input->post('tgl_akad'))),
            'TGLSELESAI' => date('Y-m-d', strtotime($this->input->post('dlncovernote')))
        );

        $qry = $this->model_core->update('covernote', 'COVERNOTEID', $this->input->post('covernoteId'), $data);

        if ($qry) {
            $this->session->set_flashdata('covernote', 'sukses');
            redirect('proses/pasca_realisasi');
        }
    }

    public function aktatran() {
//        p_code($_POST);
//        exit;
        $data = array(
            'AKTAID' => $this->input->post('akta'),
            'NOAKTA' => $this->input->post('noAkta'),
            'TGLMULAI' => date('Y-m-d', strtotime($this->input->post('tgl_akta'))),
            'NOTARISAKTA' => $this->input->post('notarisAkta')
        );

        $qry = $this->model_core->update('aktatran', 'AKTATRANID', $this->input->post('aktatranId'), $data);

        if ($qry) {
            $this->session->set_flashdata('aktatran', 'sukses');
            redirect('proses/pasca_realisasi');
        }
    }

    public function prosestran() {
//        p_code($_POST);
//        exit;

        $tglMasuk = date('Y-m-d', strtotime($this->input->post('tglMasuk')));
        if ($tglMasuk == '1970-01-01') {
            $tglMasuk = NULL;
        }
        $tglKeluar = date('Y-m-d', strtotime($this->input->post('tglKeluar')));
        if ($tglKeluar == '1970-01-01') {
            $tglKeluar = NULL;
        }
        $tglDiserahkan = date('Y-m-d', strtotime($this->input->post('tglDiserahkan')));
        if ($tglDiserahkan == '1970-01-01') {
            $tglDiserahkan = NULL;
        }

        $data = array(
            'NOMORURUT' => $this->input->post('noProses'),
            'PROSESID' => $this->input->post('proses'),
            'EMPLOYEEID' => $this->input->post('pjproses'),
            'TGLMASUK' => $tglMasuk,
            'TGLSELESAI' => $tglKeluar,
            'TGLPENYERAHAN' => $tglDiserahkan
        );

        $qry = $this->model_core->update('prosestran', 'PROSESTRANID', $this->input->post('prosestranId'), $data);
        if ($qry) {
            $currentproses = $this->m_prosestran->getCurrentProses($this->input->post('aktatranId'));

            $data2 = array(
                'CURRENTPROSES' => $currentproses['PROSESTRANID']
            );

            $this->m_aktatran->updateData($this->input->post('aktatranId'), $data2);

            $this->session->set_flashdata('prosestran', $data);
            redirect('proses/pasca_realisasi');
        }
    }

    public function sertifikat() {
//        p_code($_POST);
//        exit;
        $data = array(
            'TYPESERTIFIKATID' => $this->input->post('objhukum'),
            'NAMAPENJUAL' => $this->input->post('penjual'),
            'NAMAPEMILIK' => $this->input->post('atsNama'),
            'NAMAPEMBELI' => $this->input->post('pembeli'),
            'NOMOR' => $this->input->post('noSertifikat'),
            'KOTA_KAB' => $this->input->post('kelDesa'),
            'KEL_DESA' => $this->input->post('kotaKab')
        );

        $qry = $this->model_core->update('sertifikat', 'SERTIFIKATID', $this->input->post('sertifikatId'), $data);
        if ($qry) {
            $this->session->set_flashdata('sertifikat', 'sukses');
            redirect('proses/pasca_realisasi');
        }
    }

    public function sertifikat_baru() {
        // p_code($_POST);
        // exit;
        $data = array(
            'TYPESERTIFIKATID' => $this->input->post('objhukum'),
            'NAMAPENJUAL' => $this->input->post('penjual'),
            'NAMAPEMILIK' => $this->input->post('atsNama'),
            'NAMAPEMBELI' => $this->input->post('pembeli'),
            'NOMOR' => $this->input->post('noSertifikat'),
            'KOTA_KAB' => $this->input->post('kotaKab'),
            'KEL_DESA' => $this->input->post('kelDesa'),
            'AKTATRANID' => $this->input->post('aktatranId')
        );
        $query = $this->model_core->insertRetId('sertifikat', $data);

        $aktasertifikat = array(
            'AKTATRANID' => $arrayAktaId[$objakta[$b]],
            'SERTIFIKATID' => $query
        );

        $qry = $this->model_core->insert('aktasertifikat', $aktasertifikat);
        if ($qry) {
            $this->session->set_flashdata('sertifikat_baru', 'sukses');
            redirect('proses/pasca_realisasi');
        }
    }

    /* ===========================================================================
     * Edit Data By Taufik
     * =========================================================================== */
    /*
    *   fungsi edit data transaksi
    *
    *
    */
    public function edit_data_trans() {
        
        $post = $_POST;
        
        $this->db->trans_start();

        foreach($_POST['idxakta'] as $idx ){
            $aktatranid[$idx] = $_POST['aktatranId'][$idx - 1];    
        }
        
        $customerList = split(",", $post["debitur"]);

        //update transaksipra
        $arrTransaksiPra = array(
            "EMPLOYEEID" => $post["employeeId"],
            "STATUSPJKID" => $post["statusPajakId"],
            "SUPERVISOR" => $post["spv"],
            "NOTARIS" => $post["notaris"],
            "NOTRANSAKSI" => $post["noCovernote"],
            "BANKREKID" => $post["bankId"]
        );

        if($post["developerId"] != 0){
            $arrTransaksiPra["DEVELOPERID"] = $post["developerId"];
        }
        $this->m_transaksipra->update_transaksi($arrTransaksiPra, $post["transaksipraid"]);
        $this->m_transaksipra->deleteCustomerRelationByTransID($post["transaksipraid"]);
        $this->m_transaksipra->addCustomerRelation($post["transaksipraid"], $customerList);
        //update covernote 
        $arrCovernote = array (
            "NOCOVERNOTE" => $post["noCovernote"],
            "TGLAKAD" => date('Y-m-d', strtotime($post["tgl_akad"])),
            "TGLSELESAI" => date('Y-m-d', strtotime($post["dlncovernote"]))
        );
        
        $this->m_covernote->updateData($post["covernoteId"],$arrCovernote);

        //update akta tran
        //insert akta baru
        $i = 0;
        for($i = 0; $i < sizeof($post["aktatranId"]);$i++) {
            $curAktaTran = $post["aktatranId"][$i];
            if($curAktaTran != 0){
                $dataAktaTran = array(
                    "AKTAID" => $post["akta"][$i],
                    "NOAKTA" => $post["noAkta"][$i],
                    "TGLMULAI" => date('Y-m-d', strtotime($post["tgl_akta"][$i])),
                    "NOTARISAKTA" => $post["notarisAkta"][$i]
                    );
                $this->m_aktatran->updateData($curAktaTran, $dataAktaTran);
            } else {
                $dataAktaTran = array(
                    'AKTAID' => $post["akta"][$i],
                    'TRANSAKSIPRAID' => $post["transaksipraid"],
                    'CURRENTPROSES' => 1,
                    'STATUSAKTAID' => 1,
                    'NOAKTA' => $post["noAkta"][$i],
                    'NOTARISAKTA' => $post["notarisAkta"][$i],
                    'TGLMULAI' => date('Y-m-d', strtotime($post["tgl_akta"][$i]))
                );
                $qry = $this->model_core->insertRetId('aktatran', $dataAktaTran);

                if ($qry != 0) {
                    $aktatranid[$post["idxakta"][$i]] = $qry;
                }
            }
            // $i++;
        }

        
        //insert proses baru

        //update prosestran
        
        for($i = 0; $i < sizeof($post["prosestranid"]);$i++) {
            $curProsesTran = $post["prosestranid"][$i];

            if($post["tglMasuk"][$i] != "") {
                $tglmasuk = date('Y-m-d', strtotime($post["tglMasuk"][$i]));
                $duration = $this->m_prosestran->getProcessDurationByProcessID($post["proses"][$i]);
                $deadlineProses = date('Y-m-d', strtotime($tglmasuk."+ ".$duration." days"));
            } else {
                $tglmasuk = NULL; 
                $deadlineProses = NULL;
            }

            if($post["tglKeluar"][$i] != "") {
                $tglSelesai = date('Y-m-d', strtotime($post["tglKeluar"][$i]));    
            } else {
                $tglSelesai = NULL;
            }

            if($post["tglDiserahkan"][$i] != "") {
                $tglPenyerahan = date('Y-m-d', strtotime($post["tglDiserahkan"][$i]));   
            } else {
                $tglPenyerahan = NULL;
            }
            
            if($curProsesTran != 0){
                $dataProsesTran = array(
                    "NOMORURUT" => $post["noProses"][$i],
                    "TGLMASUK" => $tglmasuk,
                    "TGLSELESAI" => $tglSelesai,
                    "TGLDEADLINE" => $deadlineProses,
                    "TGLPENYERAHAN" => $tglPenyerahan,
                    "EMPLOYEEID" => $post["pjproses"][$i],
                    "STATUSPROSES" => $post["statusproses"][$i],
                    "PROSESID" => $post["proses"][$i]
                );
                $this->m_prosestran->updateData($curProsesTran, $dataProsesTran);
            } else {
                $data = array(
                    'AKTATRANID' => $aktatranid[$post["prosesakta"][$i]],
                    'PROSESID' => $post["proses"][$i],
                    'USERID' => $this->session->userdata('USERID'),
                    'STATUSPROSES' => '1',
                    'EMPLOYEEID' => $post["pjproses"][$i],
                    'TGLMASUK' => $tglmasuk,
                    'TGLSELESAI' => $tglSelesai,
                    'TGLPENYERAHAN' => $tglDiserahkan,
                    'TGLDEADLINE' => $deadlineProses,
                    "STATUSPROSES" => $post["statusproses"][$i],
                    'NOMORURUT' => $post["noProses"][$i]
                );
                $qry = $this->model_core->insertRetId('prosestran', $data);
            }
            
            // $i++;
        }
        
        //update object hukum

        //insert object hukum baru

        // echo sizeof($post["sertifikatid"]);
        for($i = 0; $i < count($post["sertifikatid"]); $i++) {
            $curObjHukum = $post["sertifikatid"][$i];
            // echo $curObjHukum . "-". $i;
            if($curObjHukum != 0){
                $dataObjHukum = array(
                    "TYPESERTIFIKATID" => $post["objHukum"][$i],
                    "NAMAPENJUAL" => $post["penjual"][$i],
                    "NAMAPEMILIK" => $post["atsNama"][$i],
                    "NAMAPEMBELI" => $post["pembeli"][$i],
                    "NOMOR" => $post["noSertifikat"][$i],
                    "KOTA_KAB" => $post["kotaKab"][$i],
                    "KEL_DESA" => $post["kelDesa"][$i]
                );
                $this->m_sertifikat->updateData( $curObjHukum, $dataObjHukum);
            } else {
                $dataObjHukum = array(
                    "TYPESERTIFIKATID" => $post["objHukum"][$i],
                    "NAMAPENJUAL" => $post["penjual"][$i],
                    "NAMAPEMILIK" => $post["atsNama"][$i],
                    "NAMAPEMBELI" => $post["pembeli"][$i],
                    "NOMOR" => $post["noSertifikat"][$i],
                    "AKTATRANID" => $aktatranid[$post["objakta"][$i]],
                    "KOTA_KAB" => $post["kotaKab"][$i],
                    "KEL_DESA" => $post["kelDesa"][$i]
                );  
                $qry = $this->model_core->insertRetId('sertifikat', $dataObjHukum);
                // echo $qry;
            }
            
            // $i++;
        }

        //delete akta
        $deletedIdAkta = split(",",$post["deletedAkta"]);
        foreach ($deletedIdAkta as $key) {
            if($key != ''){
                $this->m_aktatran->delete($key);
            }
        }

        //delete proses
        $deletedIdSertifikat = split(",",$post["deletedSertifikat"]);
        foreach ($deletedIdSertifikat as $key) {
            if($key != ''){
                $this->m_sertifikat->delete($key);
            }
        }

        //delete object hukum
        $deletedIdProses = split(",",$post["deletedProses"]);        
        foreach ($deletedIdProses as $key) {
            if($key != ''){
                $this->m_prosestran->delete($key);
            }
        }

        //current proses
        for($i = 0; $i < sizeof($post["idxAkta"]);$i++) {
            $currentproses = $this->m_prosestran->getCurrentProses($aktatranid[$post["idxAkta"][$i]]);
            $tgl_mulai_selesai = $this->m_prosestran->getMinMaxTgl($aktatranid[$post["idxAkta"][$i]]);

            foreach ($tgl_mulai_selesai as $pc) {
                $tglSelesaiAktatran = $pc->TGLDEADLINE;
            }

            $dataupdate = array(
                'CURRENTPROSES' => $currentproses['PROSESTRANID'],
                'TGLSELESAI' => $tglSelesaiAktatran
            );

            $this->m_aktatran->updateData($aktatranid[$post["idxAkta"][$i]], $dataupdate);
        }
        

        $this->db->trans_complete();
        redirect('proses/pasca_realisasi/monitoring_filter/'.$post["transaksipraid"]);
    }

}
