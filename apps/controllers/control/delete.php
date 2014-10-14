<?php

/*
 * Project Name: notary
 * File Name: delete
 * Created on: 21 Jan 14 - 16:44:56
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

class Delete extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
     /* ===========================================================================
     * 	PROSES START by ARIF
     * =========================================================================== */
    public function delete_transaksi() {

        $qry = $this->model_core->delete('transaksipra', 'TRANSAKSIPRAID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('proses/pasca_realisasi');
        }
    }

    /* ---------------------------------------------------------------------------
     * function by Ardzix (maaf yeh ngisi paling atas, haha)
     * --------------------------------------------------------------------------- */

    public function delProsesTran() {
        $qry = $this->model_core->delete('aktatran', 'AKTATRANID', $this->input->post('prosesTranId'));


        if (!$qry)
            mysql_error();
    }
    
   

    /* ---------------------------------------------------------------------------
     * end ardzix's function
     * --------------------------------------------------------------------------- */


    /* ===========================================================================
     * 	COMMON MASTER START by KokoroLelah
     * =========================================================================== */

    public function akun() {
        $qry = $this->model_core->delete('user', 'USERID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/common_master/admin/akun');
        }
    }

    public function employee() {
        $qry = $this->model_core->delete('employee', 'EMPLOYEEID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/common_master/admin/employee');
        }
    }

    public function customer() {
        $qry = $this->model_core->delete('customer', 'CUSTOMERID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/common_master/admin/customer');
        }
    }

    /* ===========================================================================
     * 	COMMON MASTER END by KokoroLelah
     * =========================================================================== */
    /* ===========================================================================
     * 	FINANCIAL MASTER START by IRFAN
     * =========================================================================== */

    public function delete_bank_utama() {
        $bankrekening = $this->model_core->get_where_result('bankrekening',array('BANKUTAMAID' => $this->uri->segment(4)));
        
        if(!empty($bankrekening)){
            $this->session->set_flashdata('alert_delete_rek', 'Data Rekening terkait masih ada');
            redirect('master_data/financial_master/bank_info/sebutan_edit');
        }
        
        $qry = $this->model_core->delete('bankutama', 'BANKUTAMAID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/financial_master/bank_info/sebutan_edit/');
        } else {
            redirect('master_data/financial_master/bank_info/sebutan_edit/');
        }
    }

    public function delete_bank_rekening() {
        $pemilik_rekening = $this->model_core->get_where_result('daftarrekening', array('BANKREKID' => $this->uri->segment(4)));
        
        if(!empty($pemilik_rekening)){
            $this->session->set_flashdata('alert_delete_rek2', 'Data Pemilik Rekening terkait masih ada');
            redirect('master_data/financial_master/bank_info/sebutan_edit');
        }
        
        $qry = $this->model_core->delete('bankrekening', 'BANKREKID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/financial_master/bank_info/bank_edit/');
        } else {
            redirect('master_data/financial_master/bank_info/bank_edit/');
        }
    }

    public function delete_daftar_rekening() {
        $qry = $this->model_core->delete('daftarrekening', 'REKENINGID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/financial_master/bank_info/rekening_edit/');
        } else {
            redirect('master_data/financial_master/bank_info/rekening_edit/');
        }
    }

    /* ===========================================================================
     * 	FINANCIAL MASTER END by IRFAN
     * =========================================================================== */

    /* ===========================================================================
     * 	FORM MASTER START by IRFAN
     * =========================================================================== */

    public function delete_gender() {

        $qry = $this->model_core->delete('gender', 'GENDER', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/gender');
        }
    }

    public function delete_tipe_sertifikat() {

        $qry = $this->model_core->delete('typesertifikat', 'TYPESERTIFIKATID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/proses_master/tipe_sertifikat');
        }
    }

    public function delete_pekerjaan() {
        $qry = $this->model_core->delete('pekerjaan', 'PEKERJAANID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/pekerjaan/');
        } else {
            redirect('master_data/form_master/pekerjaan/');
        }
    }

    public function delete_jabatan() {
        $qry = $this->model_core->delete('jabatan', 'JABATANID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/jabatan/');
        } else {
            redirect('master_data/form_master/jabatan/');
        }
    }

    public function delete_identitas_personal() {
        $qry = $this->model_core->delete('identitaspersonal', 'IDENTITASPERSONALID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/identitas_personal/');
        } else {
            redirect('master_data/form_master/identitas_personal/');
        }
    }

    public function delete_title() {
        $qry = $this->model_core->delete('title', 'TITLEID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/title/');
        } else {
            redirect('master_data/form_master/title/');
        }
    }

    public function delete_status_display() {
        $qry = $this->model_core->delete('statusdisplay', 'STATUSDISPLAYID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/status_display/');
        } else {
            redirect('master_data/form_master/status_display/');
        }
    }

    public function delete_status_bayar() {
        $qry = $this->model_core->delete('statusbayar', 'STATUSBYR', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/status_bayar/');
        } else {
            redirect('master_data/form_master/status_bayar/');
        }
    }

    public function delete_status_proses() {
        $qry = $this->model_core->delete('statusproses', 'STATUSPROSESID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/status_proses/');
        } else {
            redirect('master_data/form_master/status_proses/');
        }
    }

    public function delete_status_pajak() {
        $qry = $this->model_core->delete('statuspajak', 'STATUSPJKID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/status_pajak/');
        } else {
            redirect('master_data/form_master/status_pajak/');
        }
    }

    public function delete_status_user() {
        $qry = $this->model_core->delete('statususer', 'STATUSUSERID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/status_user/');
        } else {
            redirect('master_data/form_master/status_user/');
        }
    }

    public function delete_tipe_customer() {
        $qry = $this->model_core->delete('tipecustomer', 'TIPECUSTID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/tipe_customer/');
        } else {
            redirect('master_data/form_master/tipe_customer/');
        }
    }

    public function delete_tipe_pembayaran() {
        $qry = $this->model_core->delete('tipepembayaran', 'TIPEBYRID', $this->uri->segment(4));

        if ($qry) {
            redirect('master_data/form_master/tipe_pembayaran/');
        } else {
            redirect('master_data/form_master/tipe_pembayaran/');
        }
    }

    public function delete_tipe_dokumen() {
        $qry = $this->model_core->delete('tipedokumen', 'TIPEDOKUMENID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/tipe_dokumen/');
        } else {
            redirect('master_data/form_master/tipe_dokumen/');
        }
    }

    public function delete_tipe_wilayah() {
        $qry = $this->model_core->delete('tipewilayah', 'TIPEWILAYAHID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/tipe_wilayah/');
        } else {
            redirect('master_data/form_master/tipe_wilayah/');
        }
    }

    public function delete_otoritas() {
        $qry = $this->model_core->delete('otoritas', 'OTORITASID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/otoritas/');
        } else {
            redirect('master_data/form_master/otoritas/');
        }
    }

    public function delete_menu() {
        $qry = $this->model_core->delete('menu', 'MENUID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/menu/');
        } else {
            redirect('master_data/form_master/menu/');
        }
    }

    public function delete_rate_pajak() {
        $qry = $this->model_core->delete('ratepajak', 'RATEPJKID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/rate_pajak/');
        } else {
            redirect('master_data/form_master/rate_pajak/');
        }
    }

    public function delete_satuan_waktu_std() {
        $qry = $this->model_core->delete('satuanwaktustd', 'SATWAKTUSTDID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/satuan_waktu_standard/');
        } else {
            redirect('master_data/form_master/satuan_waktu_standard/');
        }
    }

    public function delete_status_dokumen() {
        $qry = $this->model_core->delete('statusdokumen', 'IDSTATUSDOC', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/form_master/status_dokumen/');
        } else {
            redirect('master_data/form_master/status_dokumen/');
        }
    }

    public function delete_jadwal($idemp, $id) {
        $qry = $this->model_core->delete('aktivitasnotaris', 'AKTIVITASNOTID', $id);

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('proses/realisasi/penjadwalan/' . $idemp);
        } else {
            redirect('proses/realisasi/penjadwalan/' . $idemp);
        }
    }

    /* ===========================================================================
     * 	FORM MASTER END by KokoroLelah
     * =========================================================================== */
    /* ===========================================================================
     * 	PROSES MASTER END start KokoroLelah
     * =========================================================================== */

    public function delete_akta() {

        $data = array(
            'deleted' => 1
        );

        $qry = $this->model_core->update('akta', 'AKTAID', $this->uri->segment(4), $data);

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/proses_master/setup_akta?message=delete');
        }
    }
    
    public function delete_proses() {

       $qry = $this->model_core->delete('proses', 'PROSESID', $this->uri->segment(4));

        if ($qry) {
            $this->session->set_flashdata('delete', 'data berhasil dihapus');
            redirect('master_data/proses_master/setup_proses?message=delete');
        }
    }

}
