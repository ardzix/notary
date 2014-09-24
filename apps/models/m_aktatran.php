<?php

class m_aktatran extends CI_Model {

    var $table = 'aktatran';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertData($data) {
        $this->db->insert($this->table, $data);
    }

    function getDataById($id) {
        $this->db->where('AKTATRANID', $id);
        $hasil = $this->db->get($this->table)->row();
        return $hasil;
    }

    function getDataByTranID($id) {
        $this->db->where('TRANSAKSIPRAID', $id);
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function getData() {
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function getDataByAktaId($id) {
        $this->db->where('AKTAID', $id);
        $hasil = $this->db->get($this->table)->result();
        return $hasil;
    }

    function getJmlData() {
        $hasil = $this->db->get($this->table)->num_rows();
        return $hasil;
    }

    function getDataTransaksipraCovernote() {
        $hasil = $this->db->query('SELECT * FROM covernote RIGHT JOIN transaksipra ON transaksipra.TRANSAKSIPRAID = covernote.TRANSAKSIPRAID')->result();
        return $hasil;
    }

    function updateData($id, $data) {
        $this->db->where('AKTATRANID', $id);
        $this->db->update($this->table, $data);
    }

    function getDataByJoinAktatranProsesTran($id) {
        $this->db->select('*');
        $this->db->from('aktatran');
        $this->db->join('transaksipra', 'aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID');
        $this->db->where('EMPLOYEEID', $id);
        $this->db->or_where('SUPERVISOR', $id);
        $this->db->or_where('NOTARIS', $id);
        $hasil = $this->db->get()->result();
        return $hasil;
    }

}

?>