<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model{

  function validate_login($email,$password){
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $result = $this->db->get('user',1);
    return $result;
  }

  function validate_register($email){
    $this->db->where('email',$email);
    $result = $this->db->get('user',1);
    return $result;
  }

  function register_role($data_register){
  	$this->db->insert('user', $data_register);
  }

  function user_token($user_token){
    $this->db->insert('user_token', $user_token);
  }

}