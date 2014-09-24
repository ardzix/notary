<?php

class m_notifikasi extends CI_Model {

    var $table = 'notifikasi';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertData($data) {
        $this->db->insert($this->table, $data);
    }

    function getDataById($id) {
        $this->db->where('NOTIFIKASIID', $id);
        $hasil = $this->db->get($this->table)->row();
        return $hasil;
    }

    function getDataByTranId($id) {
        $this->db->where('NOTIFIKASIID', $id);
        $hasil = $this->db->get($this->table)->row();
        return $hasil;
    }

    function getDataCovFromTranId($id) {
        $this->db->where('TRANSAKSIPRAID', $id);
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function getData() {
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function getAllData($page, $url) {
        $this->db->order_by('model_id', 'DESC');
        $hasil = $this->db->get($this->table, $page, $url)->result();
        return $hasil;
    }

    function getJmlData() {
        $hasil = $this->db->get($this->table)->num_rows();
        return $hasil;
    }

    function getNotifikasi($id) {
        $this->db->order_by('NOTIFIKASIID', "desc");
        $this->db->where('EMPLOYEEID', $id);
        $this->db->where('STATUS', '0');
        $hasil = $this->db->get($this->table);
        return $hasil;
    }

    function getServiceNotifikasi($id) {
        $this->db->select();
        $this->db->order_by('TIMESTAMP', "desc");
        $this->db->order_by('STATUS', "desc");
        $this->db->where('EMPLOYEEID', $id);
        $this->db->limit(10, 0);
        $hasil = $this->db->get('notifikasi')->result();
        return $hasil;
    }

    function successNotifikasi($id, $data) {
        $this->db->where('NOTIFIKASIID', $id);
        $this->db->update($this->table, $data);
    }

}
