<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  function __construct(){
    parent::__construct();
    login_status();
    $this->load->model(array('User_m','Pasien_m'));
  }

  function index(){
    //Allow user/pasien access
    if($this->session->userdata('level')==='2'){
      $data['title'] = "Aplikasi e Posyandu";
      $this->template->load('user/_template2', 'user/dashboard', $data);
    }else{
      echo "Access Denied";
    }
  }
  
  // ------------------------
  // ------CRUD PROFIL-------
  // ------------------------
  
  function profil(){
    $data['title'] = "Profil Saya";
    // $data['data_user'] = $this->User_m->SelectAll();
    $nik = $this->session->userdata('nik');
    $data['profile'] = $this->User_m->get_data_user($nik);
    $this->template->load('user/_template2', 'user/profil/view',$data);
  }

  function updateProfile(){
    $user_id = $this->input->post('user_id');
    $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
    // $nik = $this->input->post('nik');
    $no_hp = $this->input->post('no_hp',TRUE);
    $tgllahir = new DateTime($tgl_lahir = $this->input->post('tgl_lahir'));
    $tempat_lahir = $this->input->post('tempat_lahir');
    // $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $alamat_kota = $this->input->post('alamat_kota');
    $kode_pos = $this->input->post('kode_pos');

    $now = new DateTime();
    $diff = date_diff($tgllahir, $now);
    $years = $diff->format("%Y");

      $data = array(
        'user_id' => $user_id,
        'nama_lengkap' => $nama_lengkap,
        // 'nik' => $nik,
        'no_hp' => $no_hp,
        'tgl_lahir' => $tgl_lahir,
        'tempat_lahir' => $tempat_lahir,
        // 'umur' => $years,
        'alamat' => $alamat,
        'alamat_kota' => $alamat_kota,
        'kode_pos' => $kode_pos
      );
    $this->User_m->updateProfile($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Diubah.</div>');
    redirect('Kelola-Profile.html');
  }
  function updatePassword(){
    $user_id = $this->input->post('user_id');
    $password = md5($this->input->post('password'));

    $data = array(
      'user_id' => $user_id,
      'password' => $password
    );

    $this->User_m->updateProfile($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Password Berhasil Diubah.</div>');
    redirect('Kelola-Profile.html');
  }

  // ------------------------
  // ------CRUD PENDAFTARAN--
  // ------------------------
  
  function pendaftaranIbuHamil(){
    $data['title'] = "Pendaftaran Pasien Ibu Hamil";
    $nik = $this->session->userdata('nik');
    $data['profile'] = $this->Pasien_m->get_data_user($nik);
    $this->template->load('user/_template2', 'user/pendaftaran/ibu/pendaftaranIbuHamil',$data);
  }

  function inputPasienIbuHamilAct(){
      $nik_ibuhamil = $this->input->post('nik_ibuhamil',TRUE);
      $nama_ibuhamil = $this->input->post('nama_ibuhamil',TRUE);
      $nama_suami = $this->input->post('nama_suami',TRUE);
      $tempatlhr_ibuhamil = $this->input->post('tempatlhr_ibuhamil',TRUE);
      $lahir_ibu = new DateTime($tanggallhr_ibuhamil = $this->input->post('tanggallhr_ibuhamil'));
      $tinggi_ibuhamil = $this->input->post('tinggi_ibuhamil');
      // $umur = $this->input->post('usia');
      $alamat_ibu = $this->input->post('alamat_ibuhamil');
      $kandunganke = $this->input->post('kandunganke');

      date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
      $date = date('Y-m-d');

      $now = new DateTime();
      $diff = date_diff($lahir_ibu, $now);
      $years = $diff->format("%Y");

        $data = array(
          'nik_ibuhamil' => $nik_ibuhamil,
          'nama_ibuhamil' => $nama_ibuhamil,
          'nama_suami' => $nama_suami,
          'tempatlhr_ibuhamil' => $tempatlhr_ibuhamil,
          'tanggallhr_ibuhamil' => $tanggallhr_ibuhamil,
          'tinggi_ibuhamil' => $tinggi_ibuhamil,
          'umur' => $years,
          'tgl_daftar_pasien' => $date,
          'alamat_ibu' => $alamat_ibu,
          'kandunganke' => $kandunganke,
          'tgl_kematian' => 00-00-0000
        );
      $this->Pasien_m->Insert($data);
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Ditambahkan.</div>');
      redirect('User/dataIbuHamil');
  }  

  function pendaftaranBayi(){
    $data['title'] = "Pendaftaran Pasien Ibu Hamil";
    // $data['data_user'] = $this->User_m->SelectAll();
    $nik = $this->session->userdata('nik');
    $data['profile'] = $this->Pasien_m->get_data_user($nik);
    $this->template->load('user/_template2', 'user/pendaftaran/bayi/pendaftaranPasienBayi',$data);
  }

  function inputPasienBayiAct(){
      $nik_ortu = $this->input->post('nik_ortu',TRUE);
      $nama_bayi = $this->input->post('nama_bayi',TRUE);
      $nama_ibu = $this->input->post('nama_ibu',TRUE);
      $nama_ayah = $this->input->post('nama_ayah',TRUE);
      $tempatlhr_bayi = $this->input->post('tempatlhr_bayi',TRUE);
      $lahir_bayi = new DateTime($tanggallhr_bayi = $this->input->post('tanggallhr_bayi'));
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $berat_lahir = $this->input->post('berat_lahir');
      // $usia_bayi = $this->input->post('usia_bayi');
      $panjang_lahir = $this->input->post('panjang_lahir');
      $alamat_bayi = $this->input->post('alamat_bayi');

      $validate = $this->Pasien_m->validateInputBayi($nik_ortu,$nama_bayi);
      if($validate->row_array() > 0){
        echo $this->session->set_userdata('danger','<div class="alert alert-danger col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> DANGER! Data Gagal Disimpan, karena sudah ada.</div>');
        redirect('user/dataBayi');
      }else{
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $date = date('Y-m-d');

        $now = new DateTime();
        $diff = date_diff($lahir_bayi, $now);
        $months = $diff->format("%m");

          $data = array(
            'nik_ortu' => $nik_ortu,
            'nama_bayi' => $nama_bayi,
            'nama_ibu' => $nama_ibu,
            'nama_ayah' => $nama_ayah,
            'tempatlhr_bayi' => $tempatlhr_bayi,
            'tanggallhr_bayi' => $tanggallhr_bayi,
            'jenis_kelamin' => $jenis_kelamin,
            'berat_lahir' => $berat_lahir,
            'usia_bayi' => $months,
            'panjang_lahir' => $panjang_lahir,
            'tgl_daftar_bayi' => $date,
            'alamat_bayi' => $alamat_bayi,
            'tgl_kematian' => 00-00-0000
          );
        $this->Pasien_m->insertPasienBayi($data);
        echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Ditambahkan.</div>');
        redirect('User/dataBayi');
      }
  }

  // --------------------------
  // ------CRUD DATA PASIEN----
  // --------------------------
  
  function dataIbuHamil(){    
    $data['title'] = "Data Pasien Ibu Hamil";
    // $data['data_user'] = $this->User_m->SelectAll();
    $nik = $this->session->userdata('nik');
    $data['data_ibuhamil'] = $this->Pasien_m->getIbuHamilPerNIK($nik);
    $this->template->load('user/_template2', 'user/pasien/ibu/dataPasienIbuHamil',$data);
  }

  function detailDataIbuHamil(){
    $data['title'] = "Data Pasien Ibu Hamil";
    // $data['data_user'] = $this->User_m->SelectAll();
    $id_ibuhamil = $this->uri->segment(3);
    $data['data_ibuhamil'] = $this->Pasien_m->selectbyid_pasien_ibuhamil($id_ibuhamil);
    $data['data_vit'] = $this->Pasien_m->selectVitbyId_ibu($id_ibuhamil);
    $data['data_imun'] = $this->Pasien_m->SelectImunbyId_ibu($id_ibuhamil);
    $data['data_pelibu'] = $this->Pasien_m->selectPelbyId_ibu($id_ibuhamil);
    $this->template->load('user/_template2', 'user/pasien/ibu/detailPasienIbuHamil',$data);
  }

  function editDataIbuHamil(){
    $data['title'] = "Data Pasien Ibu Hamil";
    // $data['data_user'] = $this->User_m->SelectAll();
    $id_ibuhamil = $this->uri->segment(3);
    $data['data_ibuhamil'] = $this->Pasien_m->selectbyid_pasien_ibuhamil($id_ibuhamil);
    $this->template->load('user/_template2', 'user/pasien/ibu/editPasienIbuHamil',$data);
  }

  function editPasienIbuAct(){
    $id_ibuhamil = $this->input->post('id_ibuhamil',TRUE);
    $nama_ibuhamil = $this->input->post('nama_ibuhamil',TRUE);
    $nama_suami = $this->input->post('nama_suami',TRUE);
    $tempatlhr_ibuhamil = $this->input->post('tempatlhr_ibuhamil',TRUE);
    $lahir_ibu = new DateTime($tanggallhr_ibuhamil = $this->input->post('tanggallhr_ibuhamil'));
    $tinggi_ibuhamil = $this->input->post('tinggi_ibuhamil');
    // $umur = $this->input->post('umur');
    $alamat_ibu = $this->input->post('alamat_ibu');
    $kandunganke = $this->input->post('kandunganke');

    $now = new DateTime();
    $diff = date_diff($lahir_ibu, $now);
    $years = $diff->format("%Y");

      $data = array(
        'id_ibuhamil' => $id_ibuhamil,
        'nama_ibuhamil' => $nama_ibuhamil,
        'nama_suami' => $nama_suami,
        'tempatlhr_ibuhamil' => $tempatlhr_ibuhamil,
        'tanggallhr_ibuhamil' => $tanggallhr_ibuhamil,
        'tinggi_ibuhamil' => $tinggi_ibuhamil,
        'umur' => $years,
        'alamat_ibu' => $alamat_ibu,
        'kandunganke' => $kandunganke
      );
    $this->Pasien_m->Update($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Ditambahkan.</div>');
    redirect('User/dataIbuHamil');
  }

  function dataBayi(){
    $data['title'] = "Data Pasien Ibu Hamil";
    // $data['data_user'] = $this->User_m->SelectAll();
    $nik = $this->session->userdata('nik');
    $data['data_bayi'] = $this->Pasien_m->getBayiPerNIK($nik); 
    $this->template->load('user/_template2', 'user/pasien/bayi/dataPasienBayi',$data);
  }

  function detailDataBayi(){
    $data['title'] = "Data Pasien Ibu Hamil";
    // $data['data_user'] = $this->User_m->SelectAll();
    $id_bayi = $this->uri->segment(3);
      $data['data_bayi'] = $this->Pasien_m->selectbyid_pasien_bayi($id_bayi);
      $data['data_vit'] = $this->Pasien_m->selectVitbyId_bayi($id_bayi);
      $data['data_imun'] = $this->Pasien_m->SelectImunbyId_bayi($id_bayi);
      $data['data_pelbayi'] = $this->Pasien_m->selectPelbyId_bayi($id_bayi);
    $this->template->load('user/_template2', 'user/pasien/bayi/detailPasienBayi',$data);
  }

  function editDataBayi(){
    $data['title'] = "Data Pasien Ibu Hamil";
    // $data['data_user'] = $this->User_m->SelectAll();
    $id_balita = $this->uri->segment(3);
      $data['data_bayi'] = $this->Pasien_m->selectbyid_pasien_bayi($id_balita);
    $this->template->load('user/_template2', 'user/pasien/bayi/editPasienBayi',$data);
  }

  function editDataBayiAct(){
    $id_balita = $this->input->post('id_balita',TRUE);
      $nama_bayi = $this->input->post('nama_bayi',TRUE);
      $nama_ibu = $this->input->post('nama_ibu',TRUE);
      $nama_ayah = $this->input->post('nama_ayah',TRUE);
      $tempatlhr_bayi = $this->input->post('tempatlhr_bayi',TRUE);
      $lahir_bayi = new DateTime($tanggallhr_bayi = $this->input->post('tanggallhr_bayi'));
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $berat_lahir = $this->input->post('berat_lahir');
      // $usia_bayi = $this->input->post('usia_bayi');
      $panjang_lahir = $this->input->post('panjang_lahir');
      $alamat_bayi = $this->input->post('alamat_bayi');

      $now = new DateTime();
      $diff = date_diff($lahir_bayi, $now);
      $months = $diff->format("%m");

      $data = array(
        'id_balita' => $id_balita,
        'nama_bayi' => $nama_bayi,
          'nama_ibu' => $nama_ibu,
          'nama_ayah' => $nama_ayah,
          'tempatlhr_bayi' => $tempatlhr_bayi,
          'tanggallhr_bayi' => $tanggallhr_bayi,
          'jenis_kelamin' => $jenis_kelamin,
          'berat_lahir' => $berat_lahir,
          'usia_bayi' => $months,
          'panjang_lahir' => $panjang_lahir,
          'alamat_bayi' => $alamat_bayi
      );
    $this->Pasien_m->UpdateBayi($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Ditambahkan.</div>');
    redirect('User/dataBayi');
  }
}