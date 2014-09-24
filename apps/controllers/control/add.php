<?php

/*
 * Project Name: notary
 * File Name: add
 * Created on: 15 Jan 14 - 15:00:22
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Add extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('m_bankrekening', 'm_developer', 'm_satuanwaktustd', 'm_aktaproses', 'm_akta', 'm_aktatran', 'm_customertrans', 'm_transaksipra', 'm_customer', 'm_covernote', 'm_bankutama', 'm_tipewilayah', 'm_prosestran', 'm_proses', 'm_statusproses'));
    }

    /* ===========================================================================
     * 	COMMON MASTER START by KokoroLelah
     * =========================================================================== */

    public function employee() {
//        p_code($_POST);
//        exit;
        $empid = $this->model_core->get_data_max('employee', 'EMPLOYEEID');
        $EMPLOYEEID = $empid['EMPLOYEEID'] + 1;

        $GENDER = $this->input->post('GENDER');
        $IDENTITASPERSONALID = $this->input->post('IDENTITASPERSONALID');
        $TITLEID = $this->input->post('TITLEID');
        $JABATANID = $this->input->post('JABATANID');
        $TGLLAHIR = $this->input->post('TANGGALLAHIR');

        $data = array(
            'EMPLOYEEID' => $EMPLOYEEID,
            'NIP' => $this->input->post('NIP'),
            'NAMALENGKAP' => $this->input->post('NAMALENGKAP'),
            'NOIDENTITASPERSONAL' => $this->input->post('NOIDENTITASPERSONAL'),
            'IS_PJ' => $this->input->post('pjproses')
        );

        if ($GENDER != "") {
            $data['GENDER'] = $GENDER;
        }
        if ($IDENTITASPERSONALID != "") {
            //$IDENTITASPERSONALID NULL;
            $data['IDENTITASPERSONALID'] = $IDENTITASPERSONALID;
        }
        if ($TITLEID != "") {
            $data['TITLEID'] = $TITLEID;
        }
        if ($JABATANID != "") {
            $data['JABATANID'] = $JABATANID;
        }
        if ($TGLLAHIR != "") {
            $data['TANGGALLAHIR'] = date('Y-m-d', strtotime($TGLLAHIR));
        }
//        p_code($data);
//        exit;
        $qry = $this->model_core->insert('employee', $data);

        if ($qry) {

            $empid = $this->model_core->get_data_max('employee', 'EMPLOYEEID');
            $employeeid = $empid['EMPLOYEEID'];

            $data = array(
                'EMPLOYEEID' => $employeeid
            );

            $qry = $this->model_core->insert('contactditail', $data);


            $data2 = array(
                'EMPLOYEEID' => $employeeid
            );

            $qry2 = $this->model_core->insert('foto', $data2);

            redirect('master_data/common_master/employee/entry_detail/' . $employeeid . '?message=success');
        } else {
            redirect('master_data/common_master/employee/entry');
        }
    }

    public function employee_detail() {

        $data = array(
//            'EMPLOYEEID' => $this->input->post('EMPLOYEEID'),
            'GEDUNG' => $this->input->post('GEDUNG'),
            'LANTAIGEDUNG' => $this->input->post('LANTAIGEDUNG'),
            'JALAN' => $this->input->post('JALAN'),
            'RT' => $this->input->post('RT'),
            'RW' => $this->input->post('RW'),
            'KELURAHANDESA' => $this->input->post('KELURAHANDESA'),
            'KECAMATAN' => $this->input->post('KECAMATAN'),
            'DATI1' => $this->input->post('DATI1'),
            'DATI2' => $this->input->post('DATI2'),
            'NEGARA' => $this->input->post('NEGARA'),
            'KODEPOS' => $this->input->post('KODEPOS'),
            'NOTELP' => $this->input->post('NOTELP'),
            'NOHP' => $this->input->post('NOHP'),
            'EMAIL' => $this->input->post('EMAIL')
        );

        $qry = $this->model_core->update('contactditail', 'EMPLOYEEID', $this->input->post('EMPLOYEEID'), $data);

        if ($qry) {
            redirect('master_data/common_master/employee/entry_detail_foto/' . $this->input->post('EMPLOYEEID') . '?message=success');
        } else {
            redirect('master_data/common_master/employee/entry');
        }
    }

    public function employee_detail_foto() {

        $employee = $this->input->post('EMPLOYEEID');
        $ftoid = $this->model_core->get_data_max('foto', 'FOTOID');
        $FOTOID = $ftoid['FOTOID'] + 1;

//      
        $config['upload_path'] = './assets/images/employee';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $employee . '_' . $FOTOID;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
            p_code($error);
//            exit;
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
                    redirect('master_data/common_master/employee/index?message=success');
                } else {
                    redirect('master_data/common_master/employee/entry_detail_foto');
                }
            }

// uploading successfull, now do your further actions
        }
    }

    public function customer_baru() {
        $data = array(
            'TIPECUSTID' => $this->input->post('TIPECUSTID'),
            'NAMACUST' => $this->input->post('NAMACUST'),
            'NOIDPERSONALCUST' => $this->input->post('NOIDPERSONALCUST')
        );

        $qry = $this->model_core->insert('customer', $data);

        if ($qry) {
            if ($this->input->post('TIPECUSTID') == 2) {
                $cstmid = $this->model_core->get_data_max('customer', 'CUSTOMERID');
                $customerid = $cstmid['CUSTOMERID'];

                $data = array(
                    'CUSTOMERID' => $customerid,
                    'NAMAPERUSAHAAN' => $this->input->post('NAMAPERUSAHAAN')
                );

                $qry = $this->model_core->insert('contactditailcustomer', $data);
            } else {
                $cstmid = $this->model_core->get_data_max('customer', 'CUSTOMERID');
                $customerid = $cstmid['CUSTOMERID'];

                $data = array(
                    'CUSTOMERID' => $customerid
                );

                $qry = $this->model_core->insert('contactditailcustomer', $data);
            }
            redirect('proses/pra_realisasi/input_all/transaksi');
        }
    }

    public function customer_baru3() {
        $data = array(
            'TIPECUSTID' => $this->input->post('TIPECUSTID'),
            'NAMACUST' => $this->input->post('NAMACUST'),
            'NOIDPERSONALCUST' => $this->input->post('NOIDPERSONALCUST')
        );

        $qry = $this->model_core->insert('customer', $data);

        if ($qry) {
            if ($this->input->post('TIPECUSTID') == 2) {
                $cstmid = $this->model_core->get_data_max('customer', 'CUSTOMERID');
                $customerid = $cstmid['CUSTOMERID'];

                $data = array(
                    'CUSTOMERID' => $customerid,
                    'NAMAPERUSAHAAN' => $this->input->post('NAMAPERUSAHAAN')
                );

                $qry = $this->model_core->insert('contactditailcustomer', $data);
            } else {
                $cstmid = $this->model_core->get_data_max('customer', 'CUSTOMERID');
                $customerid = $cstmid['CUSTOMERID'];

                $data = array(
                    'CUSTOMERID' => $customerid
                );

                $qry = $this->model_core->insert('contactditailcustomer', $data);
            }
            redirect('proses/pra_realisasi/input_data');
        }
    }

    public function customer_baru2() {
        $data = array(
            'TIPECUSTID' => $this->input->post('TIPECUSTID'),
            'NAMACUST' => $this->input->post('NAMACUST'),
            'NOIDPERSONALCUST' => $this->input->post('NOIDPERSONALCUST')
        );

        $qry = $this->model_core->insert('customer', $data);

        if ($qry) {
            $cstmid = $this->model_core->get_data_max('customer', 'CUSTOMERID');
            $customerid = $cstmid['CUSTOMERID'];

            $data = array(
                'CUSTOMERID' => $customerid
            );

            $qry = $this->model_core->insert('contactditailcustomer', $data);
            redirect('proses/pra_realisasi/entry/newTrans');
        } else {
            redirect('proses/pra_realisasi/entry/newTrans');
        }
    }

    public function customer() {


        $cstmid = $this->model_core->get_data_max('customer', 'CUSTOMERID');
        $CUSTOMERID = $cstmid['CUSTOMERID'] + 1;

        $GENDER = $this->input->post('GENDER');
        $IDENTITASPERSONALID = $this->input->post('IDENTITASPERSONALID');
        $PEKERJAANID = $this->input->post('PEKERJAANID');
        $TGLLAHIR = $this->input->post('TANGGALLAHIRCUST');

        $data = array(
            'CUSTOMERID' => $CUSTOMERID,
            'TIPECUSTID' => $this->input->post('TIPECUSTID'),
            'NAMACUST' => $this->input->post('NAMACUST'),
            'NOIDPERSONALCUST' => $this->input->post('NOIDPERSONALCUST')
        );

        if ($GENDER != "") {
            $data['GENDER'] = $GENDER;
        }
        if ($IDENTITASPERSONALID != "") {
            //$IDENTITASPERSONALID NULL;
            $data['IDENTITASPERSONALID'] = $IDENTITASPERSONALID;
        }
        if ($PEKERJAANID != "") {
            $data['PEKERJAANID'] = $PEKERJAANID;
        }
        if ($TGLLAHIR != "") {
            $data['TANGGALLAHIRCUST'] = date('Y-m-d', strtotime($TGLLAHIR));
        }

        //p_code($data);
        //exit;

        $qry = $this->model_core->insert('customer', $data);

        if ($qry) {
            $cstmid = $this->model_core->get_data_max('customer', 'CUSTOMERID');
            $customerid = $cstmid['CUSTOMERID'];

            $data = array(
                'CUSTOMERID' => $customerid
            );

            $qry = $this->model_core->insert('contactditailcustomer', $data);

            redirect('master_data/common_master/customer/entry_detail/' . $CUSTOMERID . '?message=success');
        } else {
            redirect('master_data/common_master/customer/entry?message=error');
        }
    }

    public function customer_detail() {


        $data = array(
            'GEDUNGCUST' => $this->input->post('GEDUNGCUST'),
            'LANTAICUST' => $this->input->post('LANTAICUST'),
            'JALANCUST' => $this->input->post('JALANCUST'),
            'RTCUST' => $this->input->post('RTCUST'),
            'RWCUST' => $this->input->post('RWCUST'),
            'KELURAHANCUST' => $this->input->post('KELURAHANCUST'),
            'KECAMATANCUST' => $this->input->post('KECAMATANCUST'),
            'DATI2CUST' => $this->input->post('DATI2CUST'),
            'DATI1CUST' => $this->input->post('DATI1CUST'),
            'NEGARACUST' => $this->input->post('NEGARACUST'),
            'KODEPOSCUST' => $this->input->post('KODEPOSCUST'),
            'NOTELPCUST' => $this->input->post('NOTELPCUST'),
            'NOHPCUST' => $this->input->post('NOHPCUST'),
            'NOFAXCUST' => $this->input->post('NOFAXCUST'),
            'NAMAPERUSAHAAN' => $this->input->post('NAMAPERUSAHAAN'),
            'EMAIL' => $this->input->post('EMAIL')
        );

        $qry = $this->model_core->update('contactditailcustomer', 'CUSTOMERID', $this->input->post('CUSTOMERID'), $data);

        if ($qry) {
            redirect('master_data/common_master/customer/index?message=success');
        } else {
            redirect('master_data/common_master/customer/entry_detail/' . $this->input->post('COSTUMERID'));
        }
    }

    public function akun() {


        if ($this->input->post('PASSWORD') != $this->input->post('KONFIRMASIPASSWORD')) {
            redirect('master_data/common_master/admin/akun/add?message=error');
        } else {
            $data = array(
                'EMPLOYEEID' => $this->input->post('EMPLOYEEID'),
                'STATUSUSERID' => $this->input->post('STATUSUSERID'),
                'OTORITASID' => $this->input->post('OTORITASID'),
                'USERNAME' => $this->input->post('USERNAME'),
                'PASSWORD' => md5($this->input->post('PASSWORD')),
                'WAKTUDAFTAR' => date('Y-m-d H:i:s'),
                'PEMBUATUSER' => $this->session->userdata('USERID')
            );
            $qry = $this->model_core->insert('user', $data);

            if ($qry) {
                redirect('master_data/common_master/admin/akun?message=success');
            } else {

                redirect('master_data/common_master/admin/akun/add?message=error');
            }
        }
    }

    /* ===========================================================================
     * 	COMMON MASTER END by KokoroLelah
     * =========================================================================== */

    /* ===========================================================================
     * 	PROSES MASTER START by Mr Ardzix
     * =========================================================================== */

    public function addDocDetailTrans() {
//        p_code($_POST);
//        exit;


        $prosesTranId = $this->input->post('transId');
        $tipeDokumen = explode(',', $this->input->post('tipeDokId'));
        $files = $_FILES;

        $file ['file']['name'][0] = $files ['dokumen']['name'];
        $file ['file']['type'][0] = $files ['dokumen']['type'];
        $file ['file']['tmp_name'][0] = $files ['dokumen']['tmp_name'];
        $file ['file']['error'][0] = $files ['dokumen']['error'];
        $file ['file']['size'][0] = $files ['dokumen']['size'];

        $qry = $this->dokumenUpload($tipeDokumen, $prosesTranId, $file);


        if ($qry) {
            redirect('proses/pra_realisasi/entry/detailTrans/' . $prosesTranId);
        } else {
            redirect('proses/pra_realisasi/entry/detailTrans/' . $prosesTranId);
        }
    }

    public function tipe_sertifikat() {
//        p_code($_POST);
//        exit;

        $data = array(
            'TYPESERTIFIKATDESC' => $this->input->post('TYPESERTIFIKAT')
        );

        $qry = $this->model_core->insert('typesertifikat', $data);

        if ($qry) {
            redirect('master_data/proses_master/tipe_sertifikat');
        }
    }

    public function kantor_proses() {
//        p_code($_POST);
//        exit;

        $data = array(
            'KANTORPROSES' => $this->input->post('KANTORPROSES')
        );


        $qry = $this->model_core->insert('kantorproses', $data);

        if ($qry) {
            $this->session->set_flashdata('success_insert', 'data berhasil ditambah');
            redirect('master_data/proses_master/kantor_proses');
        }
    }

    public function addProsesDetailTrans() {


        $data = array(
            'AKTAID' => $this->input->post('prosesId'),
            'TRANSAKSIPRAID' => $this->input->post('transId'),
            'CURRENTPROSES' => 1
        );

        $qry = $this->model_core->insert('aktatran', $data);

        if ($qry) {
            redirect('proses/pra_realisasi/entry/detailTrans/' . $this->input->post('transId'));
        } else {
            redirect('proses/pra_realisasi/entry/detailTrans/' . $this->input->post('transId'));
        }
    }

    public function jadwal($idemp) {
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
            'EMPLOYEEID' => $this->input->post('empIdForm'),
            'AKTIFITASDESC' => $this->input->post('desc'),
            'AWALAKTIFITAS' => $startActivity,
            'AKHIRAKTIFITAS' => $stopActivity,
            'TOTALJAM' => $totalHours
        );


        $qry = $this->model_core->insert('aktivitasnotaris', $data);

        if ($qry) {
            redirect('proses/realisasi/penjadwalan/' . $idemp);
        } else {
            redirect('proses/realisasi/penjadwalan/' . $idemp);
        }
    }

    public function setupProses() {

        /* ---------------------------
         * Added by Mr Ardzix 201401211605
         */

        $data = array(
            'SATWAKTUSTDID' => $this->input->post('satuanwaktustd'),
            'DEFSATALERT' => $this->input->post('DEFSATALERT'),
            'PROSESDESC' => $this->input->post('deskripsiProses'),
            'DEFWAKTUSTD' => $this->input->post('definisiWaktuStandar'),
            'DEFPICALERT' => $this->input->post('definisiGambarPeringatan'),
            'DEFSPVALERT' => $this->input->post('definisiProsesSPV'),
            'DEFBIAYAPROSES' => $this->input->post('definisiBiayaProses'),
            'DEFBIAYADROP' => $this->input->post('definisiBiayaDrop'),
            'KANTORPROSESID' => $this->input->post('kantorprosesid')
        );

        $qry = $this->model_core->insert('proses', $data);

        if ($qry) {
            redirect('master_data/proses_master/setup_proses?message=success');
        } else {
            echo " <script language='javascript'>
									alert('Data gagal dimasukan');
									</script>";
            redirect('master_data/proses_master/setup_proses');
        }
    }

    public function prosesDoc() {

        /* ---------------------------
         * Added by Mr Ardzix 201401221550
         */

        $tipeData = explode(",", $this->input->post('ms'));
        $isInserted = 0;
        for ($i = 0; $i < count($tipeData); $i++) {
            $data = array(
                'AKTAID' => $this->input->post('proses'),
                'TIPEDOKUMENID' => $tipeData[$i]
            );

            $qry = $this->model_core->insert('prosesdoc', $data);


            if ($qry)
                $isInserted++;
        }

        if ($isInserted > 0) {
            redirect('master_data/proses_master/setup_proses');
        } else {
            echo " <script language='javascript'>
									alert('Data gagal dimasukan');
									</script>";
            redirect('master_data/proses_master/setup_proses');
        }
    }

    public function prosesDoc2() {

        /* ---------------------------
         * Added by Mr Ardzix 201401221550
         */
//        p_code($_POST);
//        exit;
        $tipeData = $this->input->post('tipeDokumen');

        $isInserted = 0;
        for ($i = 0; $i < count($tipeData); $i++) {
            $data = array(
                'AKTAID' => $this->input->post('proses'),
                'TIPEDOKUMENID' => $tipeData[$i]
            );

            $qry = $this->model_core->insert('prosesdoc', $data);


            if ($qry)
                $isInserted++;
        }

        if ($isInserted > 0) {
            redirect('master_data/proses_master/setup_akta/setup_dokumen?message=success');
        } else {
            echo " <script language='javascript'>
									alert('Data gagal dimasukan');
									</script>";
            redirect('master_data/proses_master/setup_akta/setup_dokumen');
        }
    }

    public function praRealisasiDetail() {
        $tranId = $this->input->post('transId');
        $custId = $this->input->post('custId');
        $prosesId = $this->input->post('prosesId');
        $impProsesId = $this->input->post('impProsesId');


        $data = array(
            'WAKTUPROSTRAN' => $this->input->post('waktuProses'),
            'PICALERTPROSTRAN' => $this->input->post('picAlert'),
            'SPVALERTPROSTRAN' => $this->input->post('spvAlert'),
            'BIAYAPROSTRAN' => $this->input->post('biayaProses'),
            'BIAYADROPTRAN' => $this->input->post('biayaDrop')
        );

        $update = array('prosestran', $data);
        $where = array(array('TRANSAKSIPRAID', $tranId), array('PROSESID', $prosesId));
        $qry = $this->model_core->updataMultiWhere($update, $where);

        $expProses = explode(',', $impProsesId);
        $totalNextProses = count($expProses) - 1;
        $nextProses = "";
        if ($totalNextProses > 0) {
            for ($i = 1; $i < count($expProses); $i++) {
                if ($i == 1)
                    $nextProses = $nextProses . $expProses[$i];
                else
                    $nextProses = $nextProses . "," . $expProses[$i];
            }

            if ($qry) {
                redirect('proses/pra_realisasi/detail/tranId=' . $tranId . '&&cust=' . $custId . '&&proses=' . $nextProses);
            } else {
                echo " <script language='javascript'>
										alert('" . $this->upload->display_errors() . "');
										</script>";
                redirect('proses/pra_realisasi/detail/tranId=' . $tranId . '&&cust=' . $custId . '&&proses=' . $impProsesId);
            }
        } else {
            if ($qry) {
                redirect('proses/pra_realisasi/detailTrans/' . $tranId);
            } else {
                echo " <script language='javascript'>
										alert('" . $this->upload->display_errors() . "');
										</script>";
                redirect('proses/pra_realisasi/detail/tranId=' . $tranId . '&&cust=' . $custId . '&&proses=' . $nextProses);
            }
        }
    }

    public function praRealisasi() {
//        p_code($_FILES);
//        exit;

        /* ---------------------------
         * Added by Mr Ardzix 201401240925
         */

        $delimProses = $this->input->post('prosesSelected');
        $delimTipeDokumen = $this->input->post('docSelected');
        $isInserted = 0;

        $proses = explode(',', $delimProses);
        $tipeDokumen = explode(',', $delimTipeDokumen);
        $custId = $this->input->post('custId');
        $userId = $this->session->userdata('USERID');
        $employeeId = $this->input->post('employeeId');
        $developerId = $this->input->post('developerId');
        $bankId = $this->input->post('bankId');
        $noTran = $this->input->post('noTran');
        $statusPajakId = $this->input->post('statusPajakId');
        $statusBayar = $this->input->post('statusBayar'); //belum dibuat // <- Dropdown box (dibuatkan)
        $spv = $this->input->post('spv');
        $notaris = $this->input->post('NOTARIS');
        $files = $_FILES;

        if ($developerId == 0)
            $developerId = NULL;

        $where = array('NOTRANSAKSI =', $noTran);
        $field = array('NOTRANSAKSI');

        $NOTRANSAKSI = $this->model_core->getDataSpecifiedWthWhere('transaksipra', $field, $where);

        if (!empty($NOTRANSAKSI)) {
            redirect('proses/pra_realisasi/entry/newTrans/error');
        } else {
            $data = array(
                'USERID' => $userId,
                'EMPLOYEEID' => $employeeId,
                'STATUSPJKID' => $statusPajakId,
                'DEVELOPERID' => $developerId,
                'BANKREKID' => $bankId,
                'NOTRANSAKSI' => $noTran,
                'SUPERVISOR' => $spv,
                'NOTARIS' => $notaris
            );

            $qry = $this->model_core->insert('transaksipra', $data);
            $prosesTranId = mysql_insert_id();

            if ($qry)
                $isInserted++; //jadi 1
            if ($this->prosesTransIns($proses, $prosesTranId, $userId))
                $isInserted++; //jadi 2
            if ($this->customerTrans($prosesTranId, $custId))
                $isInserted++; //jadi 3

            $compar = 3;
            if (count($tipeDokumen[0]) != "") {
                if ($this->dokumenUpload($tipeDokumen, $prosesTranId, $files))
                    $isInserted++; //jadi 4
                $compar = 4;
            }


            if ($isInserted == $compar) {
                redirect('proses/pra_realisasi/entry/sertifikat/' . $prosesTranId . '?message=success');
            } else {
                redirect('proses/pra_realisasi/entry/sertifikat/' . $prosesTranId . '?message=success');
            }
        }
    }

    private function customerTrans($prosesTranId, $custIdImp) {

        $custId = explode(',', $custIdImp);
        $jumlah = count($custId);
        $success = 0;
        for ($i = 0; $i < $jumlah; $i++) {

            $data = array(
                'CUSTOMERID' => $custId[$i],
                'TRANSAKSIPRAID' => $prosesTranId
            );

            $qry = $this->model_core->insert('customertrans', $data);

            if ($qry)
                $success++;
        }

        if ($success == $jumlah)
            return TRUE;
        else
            return FALSE;
    }

    private function dokumenUpload($arrayDoc, $prosesTranId, $files) {

        if (empty($files)) {
            $isInserted = 0;
            if (count($files) != 0) {
                for ($i = 0; $i < count($arrayDoc); $i++) {

                    $data = array(
                        'TRANSAKSIPRAID' => $prosesTranId,
                        'TIPEDOKUMENID' => $arrayDoc[$i],
                        'IDSTATUSDOC' => 1 // <- Dropdown box (dibuatkan)
                    );

                    $qry = $this->model_core->insert('dokumen', $data);

                    if ($qry)
                        $isInserted++;
                    if ($upload)
                        $isInserted++;
                }
            }
        } else {
            $this->load->library('upload');
            $isInserted = 0;
            if (count($files) != 0) {
                for ($i = 0; $i < count($arrayDoc); $i++) {

                    $fileName = 'docProses_' . $prosesTranId . '_' . $arrayDoc[$i] . '_' . $files['file']['name'][$i];
                    $fileType = $files['file']['type'][$i];
                    $fileSize = $files['file']['size'][$i];

                    $_FILES['file']['name'] = $fileName;
                    $_FILES['file']['type'] = $fileType;
                    $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
                    $_FILES['file']['error'] = $files['file']['error'][$i];
                    $_FILES['file']['size'] = $fileSize;
                    $this->upload->initialize($this->set_upload_options());
                    $upload = $this->upload->do_upload('file');
                    if (!$upload) {
                        $error = array('error' => $this->upload->display_errors());
                        p_code($error);
                    } else {
                        $data = array(
                            'TRANSAKSIPRAID' => $prosesTranId,
                            'TIPEDOKUMENID' => $arrayDoc[$i],
                            'SCANNEDDOKFILE' => $fileName . ';' . $fileType . ';' . $fileSize,
                            'IDSTATUSDOC' => 1 // <- Dropdown box (dibuatkan)
                        );

                        $qry = $this->model_core->insert('dokumen', $data);

                        if ($qry)
                            $isInserted++;
                        if ($upload)
                            $isInserted++;
                    }
                }
            }
        }
        if ($isInserted == (count($arrayDoc) * 2))
            return TRUE;
        else
            return FALSE;
    }

    private function prosesTransIns($arrayProses, $prosesTranId, $userId) {
        $isInserted = 0;
        for ($i = 0; $i < count($arrayProses); $i++) {
            $data = array(
                'TRANSAKSIPRAID' => $prosesTranId,
                'AKTAID' => $arrayProses[$i],
                'CURRENTPROSES' => 0,
                'STATUSAKTAID' => 1
            );

            $qry = $this->model_core->insert('aktatran', $data);

            if ($qry)
                $isInserted++;
        }

        if ($isInserted == count($arrayProses))
            return TRUE;
        else
            return FALSE;
    }

    private function set_upload_options() {
        $config = array();
        $config['upload_path'] = './assets/docs';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['overwrite'] = TRUE;
        return $config;
    }

    function sertifikat() {

        $transaksipraid = $this->uri->segment(4);
        $data = array(
            'AKTATRANID' => $this->input->post('AKTATRANID'),
            'TYPESERTIFIKATID' => $this->input->post('TYPESERTIFIKATID'),
            'NAMAPEMILIK' => $this->input->post('NAMAPEMILIK'),
            'NAMAPENJUAL' => $this->input->post('NAMAPENJUAL'),
            'NOMOR' => $this->input->post('NOMOR')
        );

        $qry = $this->model_core->insert('sertifikat', $data);

        if ($qry) {
            redirect('proses/pra_realisasi/entry/sertifikat/' . $transaksipraid . '?message=success2');
        }
    }

    /* ===========================================================================
     * 	FINANCIAL MASTER START by IRFAN
     * =========================================================================== */

    public function sebutan_entry() {
        $data = array(
            'BANKUTAMADESC' => $this->input->post('BANKUTAMADESC')
        );

        $qry = $this->model_core->get_where_result('bankutama', array('BANKUTAMADESC' => $this->input->post('BANKUTAMADESC')));
//        p_code($qry);
//        exit;
//        p_code(num_rows($qry));
//        exit;
        if (!empty($qry)) {
            $this->session->set_flashdata('error_exist', 'data udah ada');
            redirect('master_data/financial_master/bank_info/sebutan_entry');
        } else {
            $qry = $this->model_core->insert('bankutama', $data);

            if ($qry) {
                redirect('master_data/financial_master/bank_info/sebutan_edit?message=success');
            } else {
                redirect('master_data/financial_master/bank_info/sebutan_edit?message=error');
            }
        }
    }

    public function bank_entry() {

        $data = array(
            'BANKUTAMAID' => $this->input->post('BANKUTAMAID'),
            'BANKREKDESC' => $this->input->post('BANKREKDESC'),
            'ALAMATBANKREK' => $this->input->post('ALAMATBANKREK')
        );

        $qry = $this->model_core->insert('bankrekening', $data);

        if ($qry) {
            redirect('master_data/financial_master/bank_info/bank_edit?message=success');
        } else {
            redirect('master_data/financial_master/bank_info/bank_edit?message=error');
        }
    }

    public function daftar_rekening() {

        $data = array(
            'BANKREKID' => $this->input->post('BANKREKID'),
            'NOREKENING' => $this->input->post('NOREKENING'),
            'NMREKENING' => $this->input->post('NMREKENING')
        );

        $qry = $this->model_core->insert('daftarrekening', $data);

        if ($qry) {
            redirect('master_data/financial_master/bank_info/rekening_edit?message=success');
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

    public function gender() {

        $data = array(
            'GENDERDESC' => $this->input->post('GENDERDESC')
        );

        $qry = $this->model_core->insert('gender', $data);

        if ($qry) {
            redirect('master_data/form_master/gender?message=success');
        } else {
            redirect('master_data/form_master/gender?message=error');
        }
    }

    public function pekerjaan() {

        $data = array(
            'PEKERJAANDESC' => $this->input->post('PEKERJAANDESC')
        );

        $qry = $this->model_core->insert('pekerjaan', $data);

        if ($qry) {
            redirect('master_data/form_master/pekerjaan?message=success');
        } else {
            redirect('master_data/form_master/pekerjaan/');
        }
    }

    public function jabatan() {

        $data = array(
            'JABATANDESC' => $this->input->post('JABATANDESC')
        );

        $qry = $this->model_core->insert('jabatan', $data);

        if ($qry) {
            redirect('master_data/form_master/jabatan?message=success');
        } else {
            redirect('master_data/form_master/jabatan/');
        }
    }

    public function identitaspersonal() {

        $data = array(
            'IDENTITASPERSONALDESC' => $this->input->post('IDENTITASPERSONALDESC')
        );

        $qry = $this->model_core->insert('identitaspersonal', $data);

        if ($qry) {
            redirect('master_data/form_master/identitas_personal?message=success');
        } else {
            redirect('master_data/form_master/identitas_personal/');
        }
    }

    public function title() {

        $data = array(
            'TITLEDESC' => $this->input->post('TITLEDESC')
        );

        $qry = $this->model_core->insert('title', $data);

        if ($qry) {
            redirect('master_data/form_master/title?message=success');
        } else {
            redirect('master_data/form_master/title/');
        }
    }

    public function status_display() {

        $data = array(
            'STATUSDISPLAYDESC' => $this->input->post('STATUSDISPLAYDESC')
        );

        $qry = $this->model_core->insert('statusdisplay', $data);

        if ($qry) {
            redirect('master_data/form_master/status_display?message=success');
        } else {
            redirect('master_data/form_master/status_display/');
        }
    }

    public function status_bayar() {

        $data = array(
            'STATUSBYRDESC' => $this->input->post('STATUSBYRDESC')
        );

        $qry = $this->model_core->insert('statusbayar', $data);

        if ($qry) {
            redirect('master_data/form_master/status_bayar?message=success');
        } else {
            redirect('master_data/form_master/status_bayar/');
        }
    }

    public function status_proses() {

        $data = array(
            'STATUSDESC' => $this->input->post('STATUSDESC')
        );

        $qry = $this->model_core->insert('statusproses', $data);

        if ($qry) {
            redirect('master_data/form_master/status_proses?message=success');
        } else {
            redirect('master_data/form_master/status_proses/');
        }
    }

    public function status_pajak() {

        $data = array(
            'STATUSPJKDESC' => $this->input->post('STATUSPJKDESC')
        );

        $qry = $this->model_core->insert('statuspajak', $data);

        if ($qry) {
            redirect('master_data/form_master/status_pajak?message=success');
        } else {
            redirect('master_data/form_master/status_pajak/');
        }
    }

    public function status_user() {

        $data = array(
            'STATUSUSERDESC' => $this->input->post('STATUSUSERDESC')
        );

        $qry = $this->model_core->insert('statususer', $data);

        if ($qry) {
            redirect('master_data/form_master/status_user?message=success');
        } else {
            redirect('master_data/form_master/status_user/');
        }
    }

    public function tipe_customer() {

        $data = array(
            'TIPECUSTDESC' => $this->input->post('TIPECUSTDESC'),
            'INISIALTIPECUST' => $this->input->post('INISIALTIPECUST')
        );

        $qry = $this->model_core->insert('tipecustomer', $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_customer?message=success');
        } else {
            redirect('master_data/form_master/tipe_customer/');
        }
    }

    public function tipe_pembayaran() {

        $data = array(
            'TIPEBYRIDDESC' => $this->input->post('TIPEBYRIDDESC'),
        );

        $qry = $this->model_core->insert('tipepembayaran', $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_pembayaran?message=success');
        } else {
            redirect('master_data/form_master/tipe_pembayaran/');
        }
    }

    public function tipe_dokumen() {

        $data = array(
            'TIPEDOKDESC' => $this->input->post('TIPEDOKDESC'),
        );

        $qry = $this->model_core->insert('tipedokumen', $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_dokumen?message=success');
        } else {
            redirect('master_data/form_master/tipe_dokumen/');
        }
    }

    public function tipe_wilayah() {

        $data = array(
            'TIPEWILAYAHDESC' => $this->input->post('TIPEWILAYAHDESC'),
        );

        $qry = $this->model_core->insert('tipewilayah', $data);

        if ($qry) {
            redirect('master_data/form_master/tipe_wilayah?message=success');
        } else {
            redirect('master_data/form_master/tipe_wilayah/');
        }
    }

    public function otoritas() {

        $data = array(
            'OTORITASDESC' => $this->input->post('OTORITASDESC'),
        );

        $qry = $this->model_core->insert('otoritas', $data);

        if ($qry) {
            redirect('master_data/form_master/otoritas?message=success');
        } else {
            redirect('master_data/form_master/otoritas/');
        }
    }

    public function menu() {

        $data = array(
            'MENUDESC' => $this->input->post('MENUDESC'),
            'LEVELMENU' => $this->input->post('LEVELMENU'),
            'NOURUTMENU' => $this->input->post('NOURUTMENU')
        );

        $qry = $this->model_core->insert('menu', $data);

        if ($qry) {
            redirect('master_data/form_master/menu?message=success');
        } else {
            redirect('master_data/form_master/menu/');
        }
    }

    public function rate_pajak() {

        $data = array(
            'TGGLAWALBERLAKU' => date('Y-m-d', strtotime($this->input->post('TGGLAWALBERLAKU'))),
            'TGGLAKHIRBERLAKU' => date('Y-m-d', strtotime($this->input->post('TGGLAKHIRBERLAKU'))),
            'NILRATEPJK' => $this->input->post('NILRATEPJK')
        );

        $qry = $this->model_core->insert('ratepajak', $data);

        if ($qry) {
            redirect('master_data/form_master/rate_pajak?message=success');
        } else {
            redirect('master_data/form_master/rate_pajak/');
        }
    }

    public function satuan_waktu_std() {

        $data = array(
            'SATWAKTUDESC' => $this->input->post('SATWAKTUDESC'),
            'KONVERSI' => $this->input->post('KONVERSI')
        );

        $qry = $this->model_core->insert('satuanwaktustd', $data);

        if ($qry) {
            redirect('master_data/form_master/satuan_waktu_standard?message=success');
        } else {
            redirect('master_data/form_master/satuan_waktu_standard/');
        }
    }

    public function status_dokumen() {

        $data = array(
            'IDSTATUSDOC' => $this->input->post('IDSTATUSDOC'),
            'STATUS' => $this->input->post('STATUS')
        );

        $qry = $this->model_core->insert('statusdokumen', $data);

        if ($qry) {
            redirect('master_data/form_master/status_dokumen?message=success');
        } else {
            redirect('master_data/form_master/status_dokumen/');
        }
    }

    /* ===========================================================================
     * 	FORM MASTER END by KokoroLelah
     * =========================================================================== */

    /* ===========================================================================
     * 	PROSES START by KokoroLelah
     * =========================================================================== */

//    public function status_dokumen_asli() {
//
//        $data = array(
//            'TRANSAKSIPRAID' => $this->input->post('TRANSAKSIPRAID'),
//            'TIPEDOKUMENID' => $this->input->post('TIPEDOKUMENID'),
//            'IDSTATUSDOC' => $this->input->post('IDSTATUSDOC'),
//            'asli' => $this->input->post('asli')
//        );
//
//        $qry = $this->model_core->insert('dokumen', $data);
//
//        if ($qry) {
//            redirect('proses/realisasi/penyerahanDokumen/dokumen/proses/' . $this->input->post('TIPEDOKUMENID') . '/' . $this->input->post('TRANSAKSIPRAID'));
//        }
//    }

    public function status_dokumen_asli() {

        $filename = 'docProses_' . $this->input->post('TRANSAKSIPRAID') . '_' . $this->input->post('TIPEDOKUMENID') . '_' . $_FILES['dokumen']['name'];

        $config['upload_path'] = './assets/docs';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('dokumen')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $param = array('upload_data' => $this->upload->data());

            if ($param) {
                $data = array(
                    'SCANNEDDOKFILE' => $param['upload_data']['file_name'] . ';' . $param['upload_data']['file_type'] . ';' . $param['upload_data']['file_size'],
                    'TRANSAKSIPRAID' => $this->input->post('TRANSAKSIPRAID'),
                    'TIPEDOKUMENID' => $this->input->post('TIPEDOKUMENID'),
                    'IDSTATUSDOC' => $this->input->post('IDSTATUSDOC'),
                    'asli' => $this->input->post('asli')
                );

                $qry = $this->model_core->insert('dokumen', $data);
                if ($qry) {
                    redirect('proses/realisasi/penyerahanDokumen/dokumen/proses/' . $this->input->post('TIPEDOKUMENID') . '/' . $this->input->post('TRANSAKSIPRAID'));
                } else {
                    redirect('proses/realisasi/penyerahanDokumen/dokumen/proses/' . $this->input->post('TIPEDOKUMENID') . '/' . $this->input->post('TRANSAKSIPRAID'));
                }
            }

// uploading successfull, now do your further actions
        }
    }

    public function eskalasi() {

        $data = array(
            'EMPLOYEEID' => $this->input->post('EMPLOYEEID'),
            'TARGET' => $this->input->post('TARGET'),
            'ALASAN' => $this->input->post('ALASAN'),
            'AKTATRANID' => $this->input->post('AKTATRANID'),
            'CURRENTPROSES' => $this->input->post('CURRENTPROSES')
        );

        $qry = $this->model_core->insert('eskalasi', $data);

        if ($qry) {

            $data2 = array(
                'STATUS' => 0,
                'TIPE' => 0,
                'MESSAGE1' => 'Need Approval : ' . $this->input->post('NAMAAKTA'),
                'MESSAGE2' => 'Debitur ' . $this->input->post('DEBITUR'),
                'EMPLOYEEID' => $this->input->post('TARGET'),
                'LINK' => $this->input->post('LINK')
            );

            $qry2 = $this->model_core->insert('notifikasi', $data2);

            redirect('proses/pasca_realisasi/ekskalasi/proses_ekskalasi/' . $this->input->post('TRANSAKSIPRAID') . '?message=success');
        }
    }

    public function eskalasi_approv() {
//        p_code($_POST);
//        exit;

        $data = array(
            'EMPLOYEEID' => $this->input->post('EMPLOYEEID'),
            'TARGET' => $this->input->post('TARGET'),
            'ALASAN' => $this->input->post('ALASAN'),
            'AKTATRANID' => $this->input->post('AKTATRANID'),
            'parent' => $this->input->post('EKSKAID'),
            'CURRENTPROSES' => $this->input->post('CURRENTPROSES')
        );

        $qry = $this->model_core->insert('eskalasi', $data);

        if ($qry) {

            $data2 = array(
                'STATUS' => 0,
                'TIPE' => 0,
                'MESSAGE1' => 'Need Approval : ' . $this->input->post('NAMAAKTA'),
                'MESSAGE2' => 'Debitur ' . $this->input->post('DEBITUR'),
                'EMPLOYEEID' => $this->input->post('TARGET'),
                'LINK' => $this->input->post('LINK')
            );

            $qry2 = $this->model_core->insert('notifikasi', $data2);

            redirect('proses/pasca_realisasi/approval/proses_approve/' . $this->input->post('TRANSAKSIPRAID') . '?message=success_eska');
        }
    }

    public function developer() {

        $data = array(
            'DEVELOPERDESC' => $this->input->post('DEVELOPERDESC')
        );

        $qry = $this->model_core->insert('developer', $data);

        if ($qry) {
            redirect('proses/pra_realisasi/input_data');
        }
    }

    /* ===========================================================================
     * 	INPUT ALL by KokoroLelah
     * =========================================================================== */

    public function input_all() {

        if ($this->uri->segment(4) == 'transaksi') {

            $custId = $this->input->post('custId');
            $userId = $this->session->userdata('USERID');
            $employeeId = $this->input->post('employeeId');
            $developerId = $this->input->post('developerId');
            $bankId = $this->input->post('bankId');
            $noTran = $this->input->post('noTran');
            $statusPajakId = $this->input->post('statusPajakId');
            $spv = $this->input->post('spv');
            $notaris = $this->input->post('NOTARIS');
            $files = $_FILES;

            if ($developerId == 0)
                $developerId = NULL;

            $where = array('NOTRANSAKSI =', $noTran);
            $field = array('NOTRANSAKSI');
            //cek apakah notransaksi sudah dipakai atau belum
            $NOTRANSAKSI = $this->model_core->getDataSpecifiedWthWhere('transaksipra', $field, $where);
            if (!empty($NOTRANSAKSI)) {
                //jika sudah redirect dan keluarkan pesan error
                redirect('proses/pra_realisasi/input_all/transaksi/error');
            } else {

                $data = array(
                    'USERID' => $userId,
                    'EMPLOYEEID' => $employeeId,
                    'STATUSPJKID' => $statusPajakId,
                    'DEVELOPERID' => $developerId,
                    'BANKREKID' => $bankId,
                    'NOTRANSAKSI' => $noTran,
                    'SUPERVISOR' => $spv,
                    'NOTARIS' => $notaris
                );


                $qry = $this->model_core->insert('transaksipra', $data);

                if ($qry) {
                    $prosesTranId = mysql_insert_id();
                    $customer = explode(',', $custId);
                    $jumlah = count($customer);
                    $success = 0;
                    for ($i = 0; $i < $jumlah; $i++) {

                        $data = array(
                            'CUSTOMERID' => $customer[$i],
                            'TRANSAKSIPRAID' => $prosesTranId
                        );

                        $qry = $this->model_core->insert('customertrans', $data);

                        if ($qry)
                            $success++;
                    }

                    if ($success == $jumlah)
                        redirect('proses/pra_realisasi/input_all/covernote/' . $prosesTranId);
                    else
                        echo 'gagal';
                }
            }
        } elseif ($this->uri->segment(4) == 'covernote') {



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
                redirect('proses/pra_realisasi/input_all/covernote' . $tid . '/error');
            } else {

                $count = $this->input->post('counter');
                for ($i = 0; $i <= $count; $i++) {
                    $cn = 'ncnote_' . $i;
                    $ncn = $this->input->post($cn);
                    $tid = $this->input->post('tranid');
                    $tgl = $this->input->post('tgl_akad');
                    $kel = $this->input->post('kel_desa');
                    $dev = $this->input->post('developer');
                    $nbk = $this->input->post('nama_bank');
                    $tipeWilayah = $this->input->post('tipeWilayah');
                    $target = $this->input->post('target_selesai');
                    $tanggalTarget = date('Y-m-d', strtotime($target));
                    $tanggal = strtotime($tgl);
                    $newtanggal = date('Y-m-d', $tanggal);

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
                            'TIPEWILAYAHID' => $tipeWilayah,
                            'KEL_DESA' => $kel
                        );

                        $this->m_covernote->insertData($data);
                    } else {
                        $data = array(
                            'TRANSAKSIPRAID' => $tid,
                            'NOCOVERNOTE' => $ncn,
                            'TGLAKAD' => $newtanggal,
                            'CNSCANNEDFILE' => $scan,
                            'TGLSELESAI' => $tanggalTarget,
                            'TIPEWILAYAHID' => $tipeWilayah,
                            'KEL_DESA' => $kel
                        );

                        $this->m_covernote->insertData($data);
                    }
                }
            }
            redirect('proses/pra_realisasi/input_all/akta/' . $tid);
        } elseif ($this->uri->segment(4) == 'akta') {

//            p_code($_POST);
//            exit;

            $delimProses = $this->input->post('prosesSelected');
            $delimTipeDokumen = $this->input->post('docSelected');
            $isInserted = 0;

            $proses = explode(',', $delimProses);
            $tipeDokumen = explode(',', $delimTipeDokumen);
            $prosesTranId = $this->uri->segment(5);
            $files = $_FILES;

            $isInserted = 0;
            for ($i = 0; $i < count($proses); $i++) {
                $data = array(
                    'TRANSAKSIPRAID' => $this->uri->segment(5),
                    'AKTAID' => $proses[$i],
                    'CURRENTPROSES' => 1,
                    'STATUSAKTAID' => 1
                );



                $qry = $this->model_core->insert('aktatran', $data);

                if ($qry)
                    $isInserted++;
            }

            if ($isInserted == count($proses)) {

                if (empty($files)) {
                    $isInserted = 0;
                    if (count($files) != 0) {
                        for ($i = 0; $i < count($tipeDokumen); $i++) {
                            $data = array(
                                'TRANSAKSIPRAID' => $prosesTranId,
                                'TIPEDOKUMENID' => $tipeDokumen[$i],
                                'IDSTATUSDOC' => 1 // <- Dropdown box (dibuatkan)
                            );

                            $qry = $this->model_core->insert('dokumen', $data);
                        }
                    }
                } else {
                    $this->load->library('upload');
                    $isInserted = 0;
                    if (count($files) != 0) {
                        for ($i = 0; $i < count($tipeDokumen); $i++) {

                            $fileName = 'docProses_' . $prosesTranId . '_' . $tipeDokumen[$i] . '_' . $files['file']['name'][$i];
                            $fileType = $files['file']['type'][$i];
                            $fileSize = $files['file']['size'][$i];

                            $_FILES['file']['name'] = $fileName;
                            $_FILES['file']['type'] = $fileType;
                            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
                            $_FILES['file']['error'] = $files['file']['error'][$i];
                            $_FILES['file']['size'] = $fileSize;
                            $this->upload->initialize($this->set_upload_options2());
                            $upload = $this->upload->do_upload('file');

                            $data = array(
                                'TRANSAKSIPRAID' => $prosesTranId,
                                'TIPEDOKUMENID' => $tipeDokumen[$i],
                                'SCANNEDDOKFILE' => $fileName . ';' . $fileType . ';' . $fileSize,
                                'IDSTATUSDOC' => 1 // <- Dropdown box (dibuatkan)
                            );

                            $qry = $this->model_core->insert('dokumen', $data);
                        }
                    }
                }
                redirect('proses/pra_realisasi/input_all/proses_akta/' . $prosesTranId);
            }
        } elseif ($this->uri->segment(4) == 'sertifikat') {


            $transaksipraid = $this->uri->segment(5);
            $data = array(
                'AKTATRANID' => $this->input->post('AKTATRANID'),
                'TYPESERTIFIKATID' => $this->input->post('TYPESERTIFIKATID'),
                'NAMAPEMILIK' => $this->input->post('NAMAPEMILIK'),
                'NAMAPENJUAL' => $this->input->post('NAMAPENJUAL'),
                'NAMAPEMBELI' => $this->input->post('NAMAPEMBELI'),
                'NOMOR' => $this->input->post('NOMOR')
            );

            $qry = $this->model_core->insert('sertifikat', $data);

            if ($qry) {
                redirect('proses/pra_realisasi/input_all/sertifikat/' . $transaksipraid);
            }
        }
    }

    public function input_data() {

        $userId = $this->session->userdata('USERID');
        $noCovernote = $this->input->post('noCovernote');
        $notaris = $this->input->post('notaris');
        $tgl_akad = date('Y-m-d', strtotime($this->input->post('tgl_akad')));
        $debitur = $this->input->post('debitur');
        $dlncovernote = date('Y-m-d', strtotime($this->input->post('dlncovernote')));
        $bankId = $this->input->post('bankId');
        $employeeId = $this->input->post('employeeId');
        $statusPajakId = $this->input->post('statusPajakId');
        $spv = $this->input->post('spv');
        $developerId = $this->input->post('developerId');
        $biaya = $this->input->post('biaya');
        $akta = $_POST['akta'];
        $aktaTranId = $_POST['aktatranId'];
        $noAkta = $_POST['noAkta'];
        $tgl_akta = $_POST['tgl_akta'];
        $notarisAkta = $_POST['notarisAkta'];
        $objHukum = $_POST['objHukum'];
        $objakta = $_POST['objakta'];
        $noSertifikat = $_POST['noSertifikat'];
        $kelDesa = $_POST['kelDesa'];
        $kotaKab = $_POST['kotaKab'];
        $atsNama = $_POST['atsNama'];
        $penjual = $_POST['penjual'];
        $pembeli = $_POST['pembeli'];
        $proses = $_POST['proses'];
        $noProses = $_POST['noProses'];
        $prosesAkta = $_POST['prosesakta'];
        $pjproses = $_POST['pjproses'];
        $tglMasuk = $_POST['tglMasuk'];
        $tglKeluar = $_POST['tglKeluar'];
        $tglDiserahkan = $_POST['tglDiserahkan'];

        if ($developerId == 0)
            $developerId = NULL;


        //Transaksipra
        $data = array(
            'USERID' => $userId,
            'EMPLOYEEID' => $employeeId,
            'STATUSPJKID' => $statusPajakId,
            'DEVELOPERID' => $developerId,
            'BANKREKID' => $bankId,
            'SUPERVISOR' => $spv,
            'NOTARIS' => $notaris
        );
        $qry = $this->model_core->insert('transaksipra', $data);

        //Costumer Trans
        $prosesTranId = mysql_insert_id();
        $customer = explode(',', $debitur);
        $jumlah = count($customer);
        $success = 0;
        for ($i = 0; $i < $jumlah; $i++) {

            $data = array(
                'CUSTOMERID' => $customer[$i],
                'TRANSAKSIPRAID' => $prosesTranId
            );

            $qry = $this->model_core->insert('customertrans', $data);
        }

        //covernote
        $data = array(
            'TRANSAKSIPRAID' => $prosesTranId,
            'NOCOVERNOTE' => $noCovernote,
            'TGLAKAD' => $tgl_akad,
            'TGLSELESAI' => $dlncovernote
        );

        $this->m_covernote->insertData($data);

        //aktatran
        for ($i = 0; $i < count($noAkta); $i++) {
            $data = array(
                'AKTAID' => $akta[$i],
                'TRANSAKSIPRAID' => $prosesTranId,
                'CURRENTPROSES' => 1,
                'STATUSAKTAID' => 1,
                'NOAKTA' => $noAkta[$i],
                'NOTARISAKTA' => $notarisAkta[$i],
                'TGLMULAI' => date('Y-m-d', strtotime($tgl_akta[$i]))
            );
            $qry = $this->model_core->insertRetId('aktatran', $data);

            if ($qry != 0) {
                $arrayAktaId[$i + 1] = $qry;
            }
        }

        //prosestran
        for ($a = 0; $a < count($proses); $a++) {
            $satuanwkt = $this->m_proses->getSatuanWktById($proses[$a]);
            $sat = $satuanwkt['SATWAKTUSTDID'];
            $waktu = $this->m_proses->getDefWktById($proses[$a]);
            $wkt = $waktu['DEFWAKTUSTD'];
            $newtanggal = date('Y-m-d', strtotime($tglMasuk[$a]));

            //
            $satuan_waktu = $this->m_satuanwaktustd->getDataById($sat);
            $satuan = $satuan_waktu->KONVERSI;
            $totalhari = $wkt * $satuan;
            $years = floor($totalhari / (365));
            $months = floor(($totalhari - $years * 365) / 30);
            $days = floor(($totalhari - $years * 365 - $months * 30));
            $newtgl = $this->m_covernote->add_date($newtanggal, $days, $months, $years);
            $tanggalbaru = date("Y-m-d", strtotime($newtgl));

            $tglKeluar = date('Y-m-d', strtotime($tglKeluar[$a]));
            if ($tglKeluar == '1970-01-01') {
                $tglKeluar = NULL;
            }
            $tglDiserahkan = date('Y-m-d', strtotime($tglDiserahkan[$a]));
            if ($tglDiserahkan == '1970-01-01') {
                $tglDiserahkan = NULL;
            }

            $data = array(
                'AKTATRANID' => $arrayAktaId[$prosesAkta[$a]],
                'PROSESID' => $proses[$a],
                'USERID' => $this->session->userdata('USERID'),
                'STATUSPROSES' => '1',
                'EMPLOYEEID' => $pjproses[$a],
                'TGLMASUK' => date('Y-m-d', strtotime($tglMasuk[$a])),
                'TGLSELESAI' => $tglKeluar,
                'TGLPENYERAHAN' => $tglDiserahkan,
                'TGLDEADLINE' => $tanggalbaru,
                'NOMORURUT' => $noProses[$a]
            );
            $qry = $this->model_core->insert('prosestran', $data);
            if ($qry) {

                //update aktatran
                $currentproses = $this->m_prosestran->getCurrentProses($arrayAktaId[$prosesAkta[$a]]);
                $tgl_mulai_selesai = $this->m_prosestran->getMinMaxTgl($arrayAktaId[$prosesAkta[$a]]);

                foreach ($tgl_mulai_selesai as $pc) {
                    $tglMulaiAktatran = $pc->TGLMASUK;
                    $tglSelesaiAktatran = $pc->TGLDEADLINE;
                }

                $data2 = array(
                    'CURRENTPROSES' => $currentproses['PROSESTRANID'],
                    'TGLSELESAI' => $tglSelesaiAktatran
                );

                $this->m_aktatran->updateData($arrayAktaId[$prosesAkta[$a]], $data2);
            }
        }

        //sertifikat
        for ($b = 0; $b < count($objHukum); $b++) {
            $data = array(
                'TYPESERTIFIKATID' => $objHukum[$b],
                'NAMAPENJUAL' => $penjual[$b],
                'NAMAPEMILIK' => $atsNama[$b],
                'NAMAPEMBELI' => $pembeli[$b],
                'NOMOR' => $noSertifikat[$b],
                'KOTA_KAB' => $kotaKab[$b],
                'KEL_DESA' => $kelDesa[$b],
                'AKTATRANID' => $arrayAktaId[$objakta[$b]]
            );
            $query = $this->model_core->insertRetId('sertifikat', $data);

            $aktasertifikat = array(
                'AKTATRANID' => $arrayAktaId[$objakta[$b]],
                'SERTIFIKATID' => $query
            );

            $this->model_core->insert('aktasertifikat', $aktasertifikat);
        }
        redirect('proses/pasca_realisasi');
    }

    private function set_upload_options2() {
        $config = array();
        $config['upload_path'] = './assets/docs';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['overwrite'] = TRUE;
        return $config;
    }

}
