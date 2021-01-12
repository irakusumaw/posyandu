<?php

class User_m extends CI_Model {
  private $_table = "user";

  public $user_id;
  public $username;
  public $password;
  public $level;
  public $email;
  public $nik;

  function SelectAll(){
    return $this->db->get_where($this->_table,['level'=>2])->result();
  }

  function validate_register($email){
    $this->db->where('email',$email);
    $result = $this->db->get('user',1);
    return $result;
  }

  function SelectByID($id_user){
    return $this->db->get_where($this->_table,['user_id'=>$id_user])->result();
  }

  function Insert($data){
    return $this->db->insert($this->_table, $data);
  }

  function Update($data){
    $this->db->update($this->_table, $data, ['user_id'=>$data['user_id']]);
  }

  function Delete($data){
    $id_barang = $data['user_id'];
    return $this->db->delete($this->_table, ["user_id"=>$id_barang]);
  }

  public function get_data_user($nik){
    return $this->db->get_where($this->_table,['nik'=>$nik])->result();
  }

  function updateProfile($data){
    $this->db->update($this->_table, $data, ['user_id'=>$data['user_id']]);
  }

}
?>