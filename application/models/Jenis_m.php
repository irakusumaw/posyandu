<?php

class Jenis_m extends CI_Model {
  private $_table = "vitamin";
  private $_table2 = "imunisasi";

  public $id_vit;
  public $nama_vit;
  public $ket;

  function SelectAll(){
    return $this->db->get_where($this->_table)->result();
  }

  function SelectAllImun(){
    return $this->db->get_where($this->_table2)->result();
  }

  // function validate_input($email){
  //   $this->db->where('email',$email);
  //   $result = $this->db->get('user',1);
  //   return $result;
  // }

  function SelectByID($id_user){
    return $this->db->get_where($this->_table,['id_vit'=>$id_user])->result();
  }

  function SelectByIDImun($id_user){
    return $this->db->get_where($this->_table2,['id_imun'=>$id_user])->result();
  }

  function Insert($data){
    return $this->db->insert($this->_table, $data);
  }

  function InsertImun($data){
    return $this->db->insert($this->_table2, $data);
  }

  function Update($data){
    $this->db->update($this->_table, $data, ['id_vit'=>$data['id_vit']]);
  }

  function UpdateImun($data){
    $this->db->update($this->_table2, $data, ['id_imun'=>$data['id_imun']]);
  }

  function Delete($data){
    $id_barang = $data['id_vit'];
    return $this->db->delete($this->_table, ["id_vit"=>$id_barang]);
  }

  function DeleteImun($data){
    $id_barang = $data['id_imun'];
    return $this->db->delete($this->_table2, ["id_imun"=>$id_barang]);
  }

  public function get_data_user($nik){
  return $this->db->get_where($this->_table,['nik'=>$nik])->result();
}
}



?>