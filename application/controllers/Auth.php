<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_m');
  }

  function index(){
    $this->login();
  }

  // Login, Register, Logout

  function login(){
    if ($this->session->userdata('email')&&$this->session->userdata('logged_in')){
      redirect_role($this->session->userdata('level'));
    }else{
      $this->load->view('login_view');
    }
  }

  function login_auth(){
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->Auth_m->validate_login($email,$password);
    $data = $this->db->get_where('user', ['email' => $email])->row_array();
    if($validate->num_rows() > 0){
      if($data['is_active'] > 0){
      $data  = $validate->row_array();
      $user_id = $data['user_id'];
      $username = $data['username'];
      $nik = $data['nik'];
      $nama_lengkap = $data['nama_lengkap'];
      $email = $data['email'];
      $level = $data['level'];
      $data_session = array(
        'user_id' => $user_id,
        'username' => $username,
        'nik' => $nik,
        'nama_lengkap' => $nama_lengkap,
        'email'     => $email,
        'level'     => $level,
        'is_active' => $is_active,
        'logged_in' => TRUE
      );
      $this->session->set_userdata($data_session);
      redirect_role($level);
    }else{
      echo $this->session->set_flashdata('msg','Akun anda belum aktif!');
      redirect('/');
    }
    }else{
      echo $this->session->set_flashdata('msg','Email atau Password salah!');
      redirect('/');
    }
  }

  function register(){
    if ($this->session->userdata('email')&&$this->session->userdata('logged_in')){
      redirect($this->session->userdata('level'));
    }else{
      $this->load->view('register_view');
    }
  }

  function register_auth(){
    $username = $this->input->post('username',TRUE);
    $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
    $nik = $this->input->post('nik',TRUE);
    $tempat_lahir = $this->input->post('tempat_lahir',TRUE);
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $alamat_kota = $this->input->post('alamat_kota');
    $kode_pos = $this->input->post('kode_pos');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->Auth_m->validate_register($email);
    if($validate->num_rows() > 0){
      echo $this->session->set_flashdata('msg','Email sudah terdaftar! Silahkan login');
      redirect('/');
    }else{
      $data_register = array(
        'username' => $username,
        'nama_lengkap' => $nama_lengkap,
        'nik' => $nik,
        'tempat_lahir' => $tempat_lahir,
        'tgl_lahir' => $tanggal_lahir,
        'no_hp' => $no_hp,
        'alamat' => $alamat,
        'alamat_kota' => $alamat_kota,
        'kode_pos' => $kode_pos,
        // 'jenis_kelamin' => $jenis_kelamin,
        'email' => $email,
        'password' => $password,
        'level' => 2,
        'is_active' => 0
      );
     
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];

     $this->Auth_m->register_role($data_register);
     $this->Auth_m->user_token($user_token);

      $this->_sendEmail($token, 'verify');

      echo $this->session->set_flashdata('msg_success','Silahkan Cek Email untuk Aktifasi');
      redirect('/');
    }

  }

  private function _sendEmail($token, $type){
    $config =[
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'posyandubalita9@gmail.com',
      'smtp_pass' => 'ira311099',
      'smtp_port' => 465,
      'mailtype' =>'html',
      'charset' => 'utf-8',
      'newline' => '\r\n'
    ];

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n"); 
    if($type == 'verify') {
    $this->email->from('posyandubalita9@gmail.com', 'posyandu balita');
    $this->email->to($this->input->post('email'));
    $this->email->subject('Account Verification');
    $this->email->message('Klik link berikut untuk mengaktifkan akun anda <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifasi</a>');
    } else if($type == 'forgot'){
      $this->email->from('posyandubalita9@gmail.com', 'posyandu balita');
    $this->email->to($this->input->post('email'));
    $this->email->subject('Reset Password');
    $this->email->message('Klik link berikut untuk Reset Password Anda <a href="'. base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
    }
    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  function verify(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if($user){
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if($user_token){
        if(time() - $user_token['date_created'] < (60 * 60 * 24)){
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);
          echo $this->session->set_flashdata('msg_success','Silahkan Login');
          redirect('/');
        }else{
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);
          echo $this->session->set_flashdata('msg',' Token Expired Aktifasi Akun Gagal');
          redirect('/');
        }
      } else{
        echo $this->session->set_flashdata('msg',' Token Salah Aktifasi Akun Gagal');
        redirect('/');
      }
    }else {
      echo $this->session->set_flashdata('msg',' Email Salah Aktifasi Akun Gagal');
      redirect('/');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('/');
  }

  public function lupaPassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if($this->form_validation->run() == false){
      $this->load->view('lupaPassword');
    }else{
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
        ];

        $this->Auth_m->user_token($user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Silahkan Cek Email Anda untuk Reset Password
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
          redirect('auth/lupaPassword');

      }else{
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Email Anda Belum Terdaftar Atau Belum Aktif
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
          redirect('auth/lupaPassword');
      }
    } 
  }

  public function resetPassword(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if($user){
     $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if($user_token){
        $this->session->set_userdata('reset_email', $email);
        $this->gantiPassword();
      }else{
        echo $this->session->set_flashdata('msg',' Token Salah Reset Password Gagal');
        redirect('/');
      }
    }else{
      echo $this->session->set_flashdata('msg',' Email Salah Reset Password Gagal');
      redirect('/');
    }
  }

  public function gantiPassword()
  {
    if(!$this->session->userdata('reset_email')){
      redirect('/');
    }
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[8]|matches[password1]');
    if($this->form_validation->run() == false){
      $this->load->view('gantiPassword');
    }else{
      $password = md5($this->input->post('password1'));
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');

      echo $this->session->set_flashdata('msg_success','Password Berhasil direset');
      redirect('/');
    }
  }

}