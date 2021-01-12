<?php

class dashboard_m extends CI_Model {
    private $_tablevit = "vitamin";
    private $_tableimun = "imunisasi";
    
    private $_tableibu = "ibu_hamil";
    private $_tablebayi = "balita";

    function hitung_user(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level = 2');

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
    }
    }

    function hitung_vitamin(){
        return $this->db->get($this->_tablevit)->num_rows();
    }

    function hitung_imunisasi(){
        return $this->db->get($this->_tableimun)->num_rows();
    }

    function hitung_pasienibu(){
        return $this->db->get($this->_tableibu)->num_rows();
    }

    function hitung_pasienbayi(){
        return $this->db->get($this->_tablebayi)->num_rows();
    }

    function kematian_pasienibu(){
        $this->db->select('*');
        $this->db->from('ibu_hamil');
        $this->db->where('tgl_kematian !=');

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
    }
    }

    function kematian_pasienbayi(){
        $this->db->select('*');
        $this->db->from('balita');
        $this->db->where('tgl_kematian !=');

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
    }
    }

}
?>