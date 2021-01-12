<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  function __construct(){
    parent::__construct();
    login_status();
    $this->load->model(array('User_m','Jenis_m','Pasien_m', 'dashboard_m'));
    // $this->load->library('form_validation');
  }

  function index(){
    //Allow admin access
    if($this->session->userdata('level')==='1'){
      $data['title'] = "Aplikasi e Posyandu";
      $data['jml_user'] = $this->dashboard_m->hitung_user();
      $data['jml_vit'] = $this->dashboard_m->hitung_vitamin();
      $data['jml_imun'] = $this->dashboard_m->hitung_imunisasi();
      $data['jml_pibu'] = $this->dashboard_m->hitung_pasienibu();
      $data['jml_pbayi'] = $this->dashboard_m->hitung_pasienbayi();
      $data['jml_kibu'] = $this->dashboard_m->kematian_pasienibu();
      $data['jml_kbayi'] = $this->dashboard_m->kematian_pasienbayi();

      $this->template->load('admin/_template2', 'admin/dashboard', $data);
    }else{
      // echo "Access Denied";
      redirect('user');
    }
  }

  //-------------------------
  // ------CRUD PASIEN-------
  // ------------------------
  function pasienIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Ibu Hamil";
      $data['data_ibuhamil'] = $this->Pasien_m->selectall_pasien_ibuhamil(); 
      $this->template->load('admin/_template2','admin/pasien/ibu/ibuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function tambahPasienIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Ibu Hamil";

      $data['nik_user'] = $this->User_m->SelectAll();
      $this->template->load('admin/_template2','admin/pasien/ibu/inputPasienIbuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function inputPasienIbuHamilAct(){
      $nik_ibuhamil = $this->input->post('nik_ibuhamil',TRUE);
      $nama_ibuhamil = $this->input->post('nama_ibuhamil',TRUE);
      $nama_suami = $this->input->post('nama_suami',TRUE);
      $tempatlhr_ibuhamil = $this->input->post('tempatlhr_ibuhamil',TRUE);
      $lahir_ibu = new DateTime($tanggallhr_ibuhamil = $this->input->post('tanggallhr_ibuhamil'));
      $tinggi_ibuhamil = $this->input->post('tinggi_ibuhamil');
      // $umur = $this->input->post('usia');
      $alamat_ibu = $this->input->post('alamat_ibu');
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
      redirect('pasien/Pasien-Ibu-Hamil.html');
  }

  function updatePasienIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Ibu Hamil";

      $id_ibuhamil = $this->uri->segment(3);
      $data['data_ibuhamil'] = $this->Pasien_m->selectbyid_pasien_ibuhamil($id_ibuhamil);
      $this->template->load('admin/_template2','admin/pasien/ibu/updateIbuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function updatePasienIbuHamilAct(){
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
    redirect('pasien/Pasien-Ibu-Hamil.html');
  }

  function inputkematian_act(){
    $id_ibuhamil = $this->input->post('id_ibuhamil',TRUE);
    $tanggal_kematian = $this->input->post('tanggal_kematian',TRUE);
    $penyebab = $this->input->post('penyebab',TRUE);

    $data = array(
      'id_ibuhamil' => $id_ibuhamil,
      'tgl_kematian' => $tanggal_kematian,
      'penyebab' => $penyebab
    );

    $this->Pasien_m->Update($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Kematian Berhasil Ditambahkan.</div>');
    redirect('pasien/Pasien-Ibu-Hamil.html');
  }

  function detailPasienIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Ibu Hamil";
      
      $id_ibuhamil = $this->uri->segment(3);
      $data['data_ibuhamil'] = $this->Pasien_m->selectbyid_pasien_ibuhamil($id_ibuhamil);
      $data['data_vit'] = $this->Pasien_m->selectVitbyId_ibu($id_ibuhamil);
      $data['data_imun'] = $this->Pasien_m->SelectImunbyId_ibu($id_ibuhamil);
      $data['data_pelibu'] = $this->Pasien_m->selectPelbyId_ibu($id_ibuhamil);
      $this->template->load('admin/_template2','admin/pasien/ibu/detailPasienIbuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function deletePasienIbuHamil(){
    $data['id_ibuhamil'] = $this->uri->segment(3);
    if (!isset($data['id_ibuhamil'])) redirect('admin/pasienIbuHamil');
    if($this->Pasien_m->Delete($data)){
      //set flashdata belum muncul
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Dihapus.</div>');
      redirect(site_url('admin/pasienIbuHamil'));
    } else { 
      //set flashdata belum muncul
      $this->session->set_flashdata('gagal', 'Data Gagal dihapus, Coba Lagi');
      redirect(site_url('admin/pasienIbuHamil'));
    }
  }  

  function posyanduPasienIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Bayi";

      date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
      $tgl = date('Y-m-d');

      $nik_ibuhamil = $this->uri->segment(3);
      $data['cek_tgl_penimb'] = $this->Pasien_m->selectall_penimb_ibu($nik_ibuhamil,$tgl);
      $data['cek_tgl_vit'] = $this->Pasien_m->selectall_vit_ibu($nik_ibuhamil,$tgl);
      $data['cek_tgl_imun'] = $this->Pasien_m->selectall_imun_ibu($nik_ibuhamil,$tgl);
      $data['cek_kematian'] = $this->Pasien_m->kematian_ibu($nik_ibuhamil);
      $data['data_vitamin'] = $this->Pasien_m->SelectVit();
      $data['data_imunisasi'] = $this->Pasien_m->SelectImun();
      $data['data_ibuhamil'] = $this->Pasien_m->selectbyid_pasien_ibuhamil($nik_ibuhamil);
      $this->template->load('admin/_template2','admin/pasien/ibu/posyanduPasienIbuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function inputpenibuhamil_act(){
      $id_ibuhamil = $this->input->post('id_ibuhamil',TRUE);
      $bb_ibu = $this->input->post('bb_ibu',TRUE);
      $lingleng = $this->input->post('lingleng',TRUE);
      $sistol = $this->input->post('sistol',TRUE);
      $diastol = $this->input->post('diastol',TRUE);
      $dbayi = $this->input->post('dbayi',TRUE);
      $posisi = $this->input->post('posisi',TRUE);
      //$keluhan = $this->input->post('keluhan',TRUE);
      
      date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
      $date = date('Y-m-d');
        $data = array(
          'id_ibuhamil' => $id_ibuhamil,
          'bb_ibu' => $bb_ibu,
          'lingleng' => $lingleng,
          'sistol' => $sistol,
          'diastol' => $diastol,
          'dbayi' => $dbayi,
          'posisi' => $posisi,
          //'keluhan' => $keluhan,
          'tgl_penimb_ibu' => $date,
        );
      $this->Pasien_m->Insertpenimb_ibu($data);
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Penimbangan Berhasil Ditambahkan.</div>');
      redirect('pasien/Pasien-Ibu-Hamil.html');
  }

  function inputpemvitibu_act(){
    $id_vit = $this->input->post('id_vit',TRUE);
    $id_ibuhamil = $this->input->post('id_ibuhamil',TRUE);
    $ket = $this->input->post('ket',TRUE);

    date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
    $date = date('Y-m-d');
      $data = array(
        'id_vit' => $id_vit,
        'id_ibuhamil' => $id_ibuhamil,
        'tgl_pem_vit' => $date,
        'ket' => $ket,
      );
    $this->Pasien_m->Insertpembvit_ibu($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Vitamin Berhasil Ditambahkan.</div>');
    redirect('pasien/Pasien-Ibu-Hamil.html');
  }

  function inputpemimunibu_act(){
    $id_imun = $this->input->post('id_imun',TRUE);
    $id_ibuhamil = $this->input->post('id_ibuhamil',TRUE);
    $ket = $this->input->post('ket',TRUE);

    date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
    $date = date('Y-m-d');
      $data = array(
        'id_imun' => $id_imun,
        'id_ibuhamil' => $id_ibuhamil,
        'tgl_pem' => $date,
        'ket' => $ket,
      );
    $this->Pasien_m->Insertpembimun_ibu($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Imunisasi Berhasil Ditambahkan.</div>');
    redirect('pasien/Pasien-Ibu-Hamil.html');
  }

  function inputpelayananbumil_act(){
      $id_ibuhamil = $this->input->post('id_ibuhamil',TRUE);
      $keluhan = $this->input->post('keluhan',TRUE);
      $nasihat = $this->input->post('nasihat',TRUE);

      date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
      $date = date('Y-m-d');
        $data = array(
          'id_ibuhamil' => $id_ibuhamil,
          'tgl_pel' => $date,
          'keluhan' => $keluhan,
          'nasihat' => $nasihat,
          
        );
      $this->Pasien_m->insertPelIbu($data);
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Penimbangan Berhasil Ditambahkan.</div>');
      redirect('pasien/Pasien-Ibu-Hamil.html');
  }

  function pasienBabyView(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Bayi";
      $data['data_bayi'] = $this->Pasien_m->selectall_pasien_bayi(); 
      $this->template->load('admin/_template2','admin/pasien/bayi/bayi', $data);
    }else{
      echo "Access Denied";
    }
  }

  function tambahPasienBayi(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Bayi";
      $data['nik_user'] = $this->User_m->SelectAll();
      $this->template->load('admin/_template2','admin/pasien/bayi/inputPasienBayi', $data);
    }else{
      echo "Access Denied";
    }    
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
        redirect('pasien/Pasien-Bayi.html');
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
      redirect('pasien/Pasien-Bayi.html');
      }
  }

  function deletePasienBayi(){
    $data['id_balita'] = $this->uri->segment(3);
    if (!isset($data['id_balita'])) redirect('pasien/Pasien-Bayi.html');
    if($this->Pasien_m->DeleteBayi($data)){
      //set flashdata belum muncul
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Dihapus.</div>');
      redirect(site_url('pasien/Pasien-Bayi.html'));
    } else { 
      //set flashdata belum muncul
      $this->session->set_flashdata('gagal', 'Data Gagal dihapus, Coba Lagi');
      redirect(site_url('pasien/Pasien-Bayi.html'));
    }
  }

  function updatePasienBayi(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Ibu Hamil";
      $id_balita = $this->uri->segment(3);
      $data['data_bayi'] = $this->Pasien_m->selectbyid_pasien_bayi($id_balita);
      $this->template->load('admin/_template2','admin/pasien/bayi/updatePasienBayi', $data);
    }else{
      echo "Access Denied";
    }
  }

  function updatePasienBayiAct(){
      $id_balita = $this->input->post('id_balita',TRUE);
      $nama_bayi = $this->input->post('nama_bayi',TRUE);
      $nama_ibu = $this->input->post('nama_ibu',TRUE);
      $nama_ayah = $this->input->post('nama_ayah',TRUE);
      $tempatlhr_bayi = $this->input->post('tempatlhr_bayi',TRUE);
      $lahir_bayi = new DateTime($tanggallhr_bayi = $this->input->post('tanggallhr_bayi'));
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $berat_lahir = $this->input->post('berat_lahir');
      $usia_bayi = $this->input->post('usia_bayi');
      $panjang_lahir = $this->input->post('panjang_lahir');
      $alamat_bayi = $this->input->post('alamat_bayi');

      //$now = new DateTime();
      //$diff = date_diff($lahir_bayi, $now);
      //$months = $diff->format("%m");

      $data = array(
        'id_balita' => $id_balita,
        'nama_bayi' => $nama_bayi,
          'nama_ibu' => $nama_ibu,
          'nama_ayah' => $nama_ayah,
          'tempatlhr_bayi' => $tempatlhr_bayi,
          'tanggallhr_bayi' => $tanggallhr_bayi,
          'jenis_kelamin' => $jenis_kelamin,
          'berat_lahir' => $berat_lahir,
          'usia_bayi' => $usia_bayi,
          'panjang_lahir' => $panjang_lahir,
          'alamat_bayi' => $alamat_bayi
      );
    $this->Pasien_m->UpdateBayi($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Ditambahkan.</div>');
    redirect('pasien/Pasien-Bayi.html');
  }

  function detailPasienBayi(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Bayi";      
      $id_bayi = $this->uri->segment(3);
      $data['data_bayi'] = $this->Pasien_m->selectbyid_pasien_bayi($id_bayi);
      $data['data_vit'] = $this->Pasien_m->selectVitbyId_bayi($id_bayi);
      $data['data_imun'] = $this->Pasien_m->SelectImunbyId_bayi($id_bayi);
      $data['data_pelbayi'] = $this->Pasien_m->selectPelbyId_bayi($id_bayi);
      $this->template->load('admin/_template2','admin/pasien/bayi/detailPasienBayi', $data);
    }else{
      echo "Access Denied";
    }
  }

  function posyanduPasienBayi(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Pasien Bayi";

      date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
      $tgl = date('Y-m-d');

      $id_bayi = $this->uri->segment(3);

      $data['cek_tgl_penimb'] = $this->Pasien_m->selectall_penimb_bayi($id_bayi,$tgl);
      $data['cek_tgl_vit'] = $this->Pasien_m->selectall_vit_bayi($id_bayi,$tgl);
      $data['cek_tgl_imun'] = $this->Pasien_m->selectall_imun_bayi($id_bayi,$tgl);
      $data['cek_kematian'] = $this->Pasien_m->kematian_bayi($id_bayi);
      $data['data_vit'] = $this->Pasien_m->detailPemVitBayi($id_bayi);
      $data['data_imun'] = $this->Pasien_m->detailPemImunBayi($id_bayi);
      $data['data_vitamin'] = $this->Pasien_m->SelectVit();
      //$data['data_imunisasi'] = $this->Pasien_m->SelectImun();  //ini yg lama
      $data['data_imunisasi'] = $this->Pasien_m->SelectImunWhere($id_bayi); //ini yg baru
      $data['data_bayi'] = $this->Pasien_m->selectbyid_pasien_bayi($id_bayi);
      $this->template->load('admin/_template2','admin/pasien/bayi/posyanduPasienBayi', $data);
    }else{
      echo "Access Denied";
    } 
  }

  function inputPenimBayiAct(){
      $id_balita = $this->input->post('id_balita',TRUE);
      $bb_bayi = $this->input->post('bb_bayi',TRUE);
      $tinggi_bayi = $this->input->post('tinggi_bayi',TRUE);
      $lingkep = $this->input->post('lingkep',TRUE);
      $tdd = $this->input->post('tdd',TRUE);
      $tdl = $this->input->post('tdl',TRUE);
      $kpsp = $this->input->post('kpsp',TRUE);
      $kmpe = $this->input->post('kmpe',TRUE);
      $mchat = $this->input->post('mchat',TRUE);
      $gpph = $this->input->post('gpph',TRUE);

      date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
      $date = date('Y-m-d');
        $data = array(
          'id_balita' => $id_balita,
          'bb_bayi' => $bb_bayi,
          'tinggi_bayi' => $tinggi_bayi,
          'lingkep' => $lingkep,
          'tdd' => $tdd,
          'tdl' => $tdl,
          'kpsp' => $kpsp,
          'kmpe' => $kmpe,
          'mchat' => $mchat,
          'gpph' => $gpph,
          'tgl_penimb_bayi' => $date,
        );
      $this->Pasien_m->insertPenimBayi($data);
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Penimbangan Berhasil Ditambahkan.</div>');
      redirect('pasien/Pasien-Bayi.html');
  }

  function inputPemVitBayiAct(){
    $id_vit = $this->input->post('id_vit',TRUE);
    $id_balita = $this->input->post('id_balita',TRUE);
    $ket = $this->input->post('ket',TRUE);

    date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
    $date = date('Y-m-d');
      $data = array(
        'id_vit' => $id_vit,
        'id_bayi' => $id_balita,
        'tgl_pem' => $date,
        'ket' => $ket,
      );
    $this->Pasien_m->insertPemVitBayi($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Vitamin Berhasil Ditambahkan.</div>');
    redirect('pasien/Pasien-Bayi.html');
  }

  function inputPemImunBayiAct(){
    $id_imun = $this->input->post('id_imun',TRUE);
    $id_balita = $this->input->post('id_balita',TRUE);
    $ket = $this->input->post('ket',TRUE);

    date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
    $date = date('Y-m-d');
      $validate = $this->Pasien_m->validate_imun_bayi($id_balita, $id_imun);
    if($validate < 1){
      $data = array(
        'id_imun' => $id_imun,
        'id_bayi' => $id_balita,
        'tgl_pem' => $date,
        'ket' => $ket,
      );
    $this->Pasien_m->insertPemImunBayi($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Imunisasi Berhasil Ditambahkan.</div>');
    redirect('pasien/Pasien-Bayi.html');
    }else{
    echo $this->session->set_userdata('danger','<div class="alert alert-danger col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Gagal! Data Pemberian Imunisasi Tahun Ini Sudah Maks.</div>');
    redirect('pasien/Pasien-Bayi.html');
    }
  }

  function inputPelayananBayiAct(){
      $id_balita = $this->input->post('id_balita',TRUE);
      $keluhan = $this->input->post('keluhan',TRUE);
      $nasihat = $this->input->post('nasihat',TRUE);

      date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
      $date = date('Y-m-d');
        $data = array(
          'id_balita' => $id_balita,
          'tgl_pelbayi' => $date,
          'keluhan' => $keluhan,
          'nasihat' => $nasihat,
          
        );
      $this->Pasien_m->insertPelBayi($data);
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Penimbangan Berhasil Ditambahkan.</div>');
      redirect('pasien/Pasien-Bayi.html');
  }

  function inputKematianAct(){
    $id_balita = $this->input->post('id_balita',TRUE);
    $tanggal_kematian = $this->input->post('tgl_kematian',TRUE);
    $penyebab = $this->input->post('penyebab',TRUE);

    $data = array(
      'id_balita' => $id_balita,
      'tgl_kematian' => $tanggal_kematian,
      'penyebab' => $penyebab
    );

    $this->Pasien_m->UpdateBayi($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Kematian Berhasil Ditambahkan.</div>');
    redirect('pasien/Pasien-Bayi.html');
  }

  //-------------------------
  // ------CRUD IMUNISASI------
  // ------------------------
  function imunisasiIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Imunisasi Ibu Hamil";
      $this->template->load('admin/_template2','admin/imunisasi/ibu/ibuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function imunisasiBabyView(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Imunisasi Bayi";
      $this->template->load('admin/_template2','admin/imunisasi/bayi/bayi', $data);
    }else{
      echo "Access Denied";
    }
  }

  //-------------------------
  // ------CRUD VITAMIN------
  // ------------------------
  function vitaminIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Imunisasi Ibu Hamil";
      $this->template->load('admin/_template2','admin/vitamin/ibu/ibuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function vitaminBabyView(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Imunisasi Bayi";
      $this->template->load('admin/_template2','admin/vitamin/bayi/bayi', $data);
    }else{
      echo "Access Denied";
    }
  }

  //-------------------------
  // ------CRUD PENIMBANGAN------
  // ------------------------
  function penimbanganIbuHamil(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Imunisasi Ibu Hamil";
      $this->template->load('admin/_template2','admin/penimbangan/ibu/ibuHamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function penimbanganBabyView(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Imunisasi Bayi";
      $this->template->load('admin/_template2','admin/penimbangan/bayi/bayi', $data);
    }else{
      echo "Access Denied";
    }
  }

  // ------------------------
  // ------CRUD VITAMIN-------
  // ------------------------

  function vitaminView(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Jenis Vitamin";
      $data['data_vitamin'] = $this->Jenis_m->SelectAll();
      $this->template->load('admin/_template2','admin/jenis/vitamin/view', $data);
    }else{
      echo "Access Denied";
    }
  }

  function vitaminInput(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Jenis Vitamin";
      $this->template->load('admin/_template2','admin/jenis/vitamin/input', $data);
    }else{
      echo "Access Denied";
    }
  }

  function vitaminInputAction(){
    $nama_vit = $this->input->post('nama_vit',TRUE);
    $ket = $this->input->post('ket',TRUE);

      $data = array(
        'nama_vit' => $nama_vit,
        'ket' => $ket
      );
    $this->Jenis_m->Insert($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i>  Well done! Data Berhasil Disimpan.</div>');
    redirect('vitamin/Vitamin.html');
  }

  function vitaminDetail(){
    $id = $this->uri->segment(3);
    if (!isset($id)) redirect('admin/vitaminView');
    $data['title'] = "Detail Data User";
    $data['data_vitamin'] = $this->Jenis_m->SelectByID($id);
    if (!$data["data_vitamin"]) show_404();
    $this->template->load('admin/_template2', 'admin/jenis/vitamin/detail',$data);
  }

  function vitaminHapus(){
    $data['id_vit'] = $this->uri->segment(3);
    if (!isset($data['id_vit'])) redirect('admin/vitaminView');
    if($this->Jenis_m->Delete($data)){
      //set flashdata belum muncul
      $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i>  Well done! Data Berhasil Dihapus.</div>');
      redirect(site_url('vitamin/Vitamin.html'));
    } else { 
      //set flashdata belum muncul
     $this->session->set_userdata('danger','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i>  DANGER! Data Gagal Dihapus.</div>');
      redirect(site_url('vitamin/Vitamin.html'));
    }
  }

  function vitaminEdit(){
    $id = $this->uri->segment(3);
    if (!isset($id)) redirect('admin/vitaminView');
    $data['title'] = "Ubah Pengguna";
    $data['data_vitamin'] = $this->Jenis_m->SelectByID($id);
    if (!$data["data_vitamin"]) show_404();
    $this->template->load('admin/_template2', 'admin/jenis/vitamin/edit',$data);
  }

  function vitaminEditAction(){
    $id_vit = $this->input->post('id_vit');
    $nama_vit = $this->input->post('nama_vit',TRUE);
    $ket = $this->input->post('ket',TRUE);

    $data = array(
        'id_vit' => $id_vit,
        'nama_vit' => $nama_vit,
        'ket' => $ket,
      );
    $this->Jenis_m->Update($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Diubah.</div>');
    redirect('vitamin/Vitamin.html');
  }

  // ------------------------
  // ------CRUD IMUNISASI-------
  // ------------------------

  function imunisasiView(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Jenis Imunisasi";
      $data['data_imun'] = $this->Jenis_m->SelectAllImun();
      $this->template->load('admin/_template2','admin/jenis/imunisasi/view', $data);
    }else{
      echo "Access Denied";
    }
  }

  function imunisasiInput(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Jenis Vitamin";
      $this->template->load('admin/_template2','admin/jenis/imunisasi/input', $data);
    }else{
      echo "Access Denied";
    }
  }

  function imunisasiInputAction(){
    $nama_imun = $this->input->post('nama_imun',TRUE);
    $ket = $this->input->post('ket',TRUE);

      $data = array(
        'nama_imun' => $nama_imun,
        'ket' => $ket
      );
    $this->Jenis_m->InsertImun($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i>  Well done! Data Berhasil Disimpan.</div>');
    redirect('imunisasi/Imunisasi.html');
  }

  function imunisasiDetail(){
    $id = $this->uri->segment(3);
    if (!isset($id)) redirect('admin/vitaminView');
    $data['title'] = "Detail Data User";
    $data['data_imun'] = $this->Jenis_m->SelectByIDImun($id);
    if (!$data["data_imun"]) show_404();
    $this->template->load('admin/_template2', 'admin/jenis/imunisasi/detail',$data);
  }

  function imunisasiHapus(){
    $data['id_imun'] = $this->uri->segment(3);
    if (!isset($data['id_imun'])) redirect('admin/imunisasiView');
    if($this->Jenis_m->DeleteImun($data)){
      //set flashdata belum muncul
      $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i>  Well done! Data Berhasil Dihapus.</div>');
      redirect(site_url('imunisasi/Imunisasi.html'));
    } else { 
      //set flashdata belum muncul
     $this->session->set_userdata('danger','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i>  DANGER! Data Gagal Dihapus.</div>');
      redirect(site_url('imunisasi/Imunisasi.html'));
    }
  }

  function imunisasiEdit(){
    $id = $this->uri->segment(3);
    if (!isset($id)) redirect('admin/vitaminView');
    $data['title'] = "Ubah Pengguna";
    $data['data_imun'] = $this->Jenis_m->SelectByIDImun($id);
    if (!$data["data_imun"]) show_404();
    $this->template->load('admin/_template2', 'admin/jenis/imunisasi/edit',$data);
  }

  function imunisasiEditAction(){
    $id_imun = $this->input->post('id_imun');
    $nama_imun = $this->input->post('nama_imun',TRUE);
    $ket = $this->input->post('ket',TRUE);

    $data = array(
        'id_imun' => $id_imun,
        'nama_imun' => $nama_imun,
        'ket' => $ket,
      );
    $this->Jenis_m->UpdateImun($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Diubah.</div>');
    redirect('imunisasi/Imunisasi.html');
  }

  // ------------------------
  // -------CRUD USER--------
  // ------------------------

  function user(){
    $data['title'] = "Daftar Pengguna";
    $data['data_user'] = $this->User_m->SelectAll();
    $this->template->load('admin/_template2', 'admin/user/view',$data);
  }

  function user_input() {
    $data['title'] = "Tambah Pengguna";
    $this->template->load('admin/_template2', 'admin/user/input',$data);
  }
  
  function user_input_action() {
    $username = $this->input->post('username',TRUE);
    $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
    $nik = $this->input->post('nik',TRUE);
    $tempat_lahir = $this->input->post('tempat_lahir',TRUE);
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $alamat_kota = $this->input->post('alamat_kota');
    $kode_pos = $this->input->post('kode_pos');
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->User_m->validate_register($email);
    if($validate->num_rows() > 0){
      echo $this->session->set_userdata('danger','<div class="alert alert-danger col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> DANGER! Data Gagal Disimpan, karena sudah ada.</div>');
      redirect('Kelola-User.html');
    }else{
      $data = array(
        'username' => $username,
        'nama_lengkap' => $nama_lengkap,
        'nik' => $nik,
        'tempat_lahir' => $tempat_lahir,
        'tgl_lahir' => $tanggal_lahir,
        'no_hp' => $no_hp,
        'alamat' => $alamat,
        'alamat_kota' => $alamat_kota,
        'kode_pos' => $kode_pos,
        'email' => $email,
        'password' => $password,
        'level' => 2
      );
    $this->User_m->Insert($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Ditambahkan.</div>');
    redirect('Kelola-User.html');
    }
  }

  function user_edit() {
		$id = $this->uri->segment(3);
    if (!isset($id)) redirect('admin/user');
    $data['title'] = "Ubah Pengguna";
    $data['data_user'] = $this->User_m->SelectByID($id);
    if (!$data["data_user"]) show_404();
    $this->template->load('admin/_template2', 'admin/user/edit',$data);
  }

  function user_edit_action() {
    $user_id = $this->input->post('user_id');
    $username = $this->input->post('username',TRUE);
    $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
    $nik = $this->input->post('nik',TRUE);
    $tempat_lahir = $this->input->post('tempat_lahir',TRUE);
    $tanggal_lahir = $this->input->post('tanggal_lahir');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $alamat_kota = $this->input->post('alamat_kota');
    $kode_pos = $this->input->post('kode_pos');
      $data = array(
        'user_id' => $user_id,
        'username' => $username,
        'nama_lengkap' => $nama_lengkap,
        'nik' => $nik,
        'tempat_lahir' => $tempat_lahir,
        'tgl_lahir' => $tanggal_lahir,
        'no_hp' => $no_hp,
        'alamat' => $alamat,
        'alamat_kota' => $alamat_kota,
        'kode_pos' => $kode_pos,
        'level' => 2
      );
    $this->User_m->Update($data);
    echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Diubah.</div>');
    redirect('Kelola-User.html');
  }

  function user_hapus()
	{
    $data['user_id'] = $this->uri->segment(3);
    if (!isset($data['user_id'])) redirect('admin/user');
    if($this->User_m->Delete($data)){
      //set flashdata belum muncul
      echo $this->session->set_userdata('success','<div class="alert alert-success col-lg-12" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <i class="si si-check mr-2" aria-hidden="true"></i> Well done! Data Berhasil Dihapus.</div>');
      redirect(site_url('Admin/user'));
    } else { 
      //set flashdata belum muncul
      $this->session->set_flashdata('gagal', 'Data Gagal dihapus, Coba Lagi');
      redirect(site_url('Admin/user'));
    }
  }

  function user_detail(){
		$id = $this->uri->segment(3);
    if (!isset($id)) redirect('admin/user');
    $data['title'] = "Detail Data User";
    $data['data_user'] = $this->User_m->SelectByID($id);
    if (!$data["data_user"]) show_404();
    $this->template->load('admin/_template2', 'admin/user/detail',$data);
  } 


  function laporan_ibu(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Laporan Ibu hamil";
      $this->template->load('admin/_template2','admin/laporan/ibu_hamil', $data);
    }else{
      echo "Access Denied";
    }  
  }

  function laporan_ibu_act(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Laporan Ibu Hamil";
      
      $start_date = $this->input->post('start_date',TRUE);
      $end_date = $this->input->post('end_date',TRUE);
      $data['laporan_penimb_ibu'] = $this->Pasien_m->laporan_penimb_ibu($start_date, $end_date);
      $data['laporan_vit_ibu'] = $this->Pasien_m->laporan_vit_ibu($start_date, $end_date);
      $data['laporan_imun_ibu'] = $this->Pasien_m->laporan_imun_ibu($start_date, $end_date);
      $data['laporan_kematian_ibu'] = $this->Pasien_m->laporan_kematian_ibu($start_date, $end_date);
      $this->template->load('admin/_template2','admin/laporan/ibu_hamil', $data);
    }else{
      echo "Access Denied";
    }
  }

  function laporan_balita(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Laporan Bayi";
      $this->template->load('admin/_template2','admin/laporan/balitaView', $data);
    }else{
      echo "Access Denied";
    }  
  }

  function laporan_balita_act(){
    if($this->session->userdata('level')==='1'){
      $data['title'] = "e Posyandu || Kelola Laporan Bayi";
      
      $start_date = $this->input->post('start_date',TRUE);
      $end_date = $this->input->post('end_date',TRUE);
      $data['laporan_penimb_bayi'] = $this->Pasien_m->laporan_penimb_bayi($start_date, $end_date );
      $data['laporan_vit_bayi'] = $this->Pasien_m->laporan_vit_bayi($start_date, $end_date);
      $data['laporan_imun_bayi'] = $this->Pasien_m->laporan_imun_bayi($start_date, $end_date);
      $data['laporan_kematian_bayi'] = $this->Pasien_m->laporan_kematian_bayi($start_date, $end_date);
      $this->template->load('admin/_template2','admin/laporan/balitaView', $data);
    }else{
      echo "Access Denied";
    }
  }

  
}