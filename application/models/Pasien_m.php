<?php

class Pasien_m extends CI_Model {
  private $_tableuser = "user";
  private $_tableibu = "ibu_hamil";  
  private $_tablepenimb_ibu = "penimb_ibu";
  private $_tableimun_ibu = "pemb_imun_ibu";
  private $_tablevit_ibu = "pemb_vitamin_ibu";
  private $_tablepelayanan_ibu = "pelayanan_ibu";

  private $_tablevit = "vitamin";
  private $_tableimun = "imunisasi";

  private $_tablebayi ="balita";
  private $_tablepenimb_bayi = "penimb_bayi";
  private $_tableimun_bayi = "pemb_imun_bayi";
  private $_tablevit_bayi = "pemb_vit_balita";
  private $_tablepelayanan_bayi = "pelayanan_bayi";

  public $id_ibuhamil;
  public $nik_ibuhamil;
  public $nama_ibuhamil;
  public $nama_suami;
  public $umur;
  public $tempatlhr_ibuhamil;
  public $tanggallhr_ibuhamil;
  public $tinggi_ibuhamil;
  public $tgl_daftar_ibuhamil;

  //-------Table Penimbangan ibu-----//
  public $bb_ibu;
  public $lingleng;
  public $tgl_penimb_ibu;

  function validate_register($email){
    $this->db->where('email',$email);
    $result = $this->db->get('user',1);
    return $result;
  }

  function selectall_pasien_ibuhamil(){
    return $this->db->get($this->_tableibu)->result();
  }

  function kematian_ibu($id_ibuhamil){
    return $this->db->get_where($this->_tableibu,['id_ibuhamil' =>$id_ibuhamil])->row();
  }

  function kematian_bayi($id_bayi){
    return $this->db->get_where($this->_tablebayi,['id_balita' =>$id_bayi])->row();
  }

  function selectall_pasien_bayi(){
    return $this->db->get($this->_tablebayi)->result();
  }

  function selectall_penimb_ibu($id_ibuhamil,$tgl){
    $this->db->select('*');
    $this->db->from('penimb_ibu');
    $this->db->where('id_ibuhamil',$id_ibuhamil);
    $this->db->where('tgl_penimb_ibu',$tgl);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
        }
  }

  function selectall_penimb_bayi($id_bayi,$tgl){
    $this->db->select('*');
    $this->db->from('penimb_bayi');
    $this->db->where('id_balita',$id_bayi);
    $this->db->where('tgl_penimb_bayi',$tgl);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
        }
  }

  function selectall_vit_ibu($id_ibuhamil,$tgl){
    $this->db->select('*');
    $this->db->from('pemb_vitamin_ibu');
    $this->db->where('id_ibuhamil',$id_ibuhamil);
    $this->db->where('tgl_pem_vit',$tgl);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
        }
  }

  function selectall_vit_bayi($id_bayi,$tgl){
    $this->db->select('*');
    $this->db->from('pemb_vit_balita');
    $this->db->where('id_bayi',$id_bayi);
    $this->db->where('tgl_pem',$tgl);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
        }
  }

  function selectall_imun_ibu($id_ibuhamil,$tgl){
    $this->db->select('*');
    $this->db->from('pemb_imun_ibu');
    $this->db->where('id_ibuhamil',$id_ibuhamil);
    $this->db->where('tgl_pem',$tgl);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
        }
  }

  function selectall_imun_bayi($id_bayi,$tgl){
    $this->db->select('*');
    $this->db->from('pemb_imun_bayi');
    $this->db->where('id_bayi',$id_bayi);
    $this->db->where('tgl_pem',$tgl);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
        }
  }
  
  public function getIbuHamilPerNIK($nik){
    return $this->db->get_where($this->_tableibu,['nik_ibuhamil'=>$nik])->result();
  }

  public function getBayiPerNIK($nik){
    return $this->db->get_where($this->_tablebayi,['nik_ortu'=>$nik])->result();
  }

  function SelectVit(){
    return $this->db->get($this->_tablevit)->result();
  }

  function selectVitbyId_ibu($id_ibuhamil){
    $query = $this->db->query("SELECT Z.nama_vit, Z.tgl_pem_vit, Z.ket
    FROM ibu_hamil
    LEFT JOIN (SELECT pemb_vitamin_ibu.id_vit, pemb_vitamin_ibu.tgl_pem_vit, vitamin.nama_vit, pemb_vitamin_ibu.ket, pemb_vitamin_ibu.id_ibuhamil
    FROM pemb_vitamin_ibu
    LEFT JOIN vitamin
    ON pemb_vitamin_ibu.id_vit=vitamin.id_vit)
    as Z ON Z.id_ibuhamil=ibu_hamil.id_ibuhamil
    WHERE ibu_hamil.id_ibuhamil = '$id_ibuhamil'
    AND Z.id_ibuhamil='$id_ibuhamil'");


      if ($query->result()==0){
          return false;
      }
      else {
          return $query->result();
      }
  }

  function selectVitbyId_bayi($id_balita){
    $query = $this->db->query("SELECT Z.nama_vit, Z.tgl_pem, Z.ket
    FROM balita
    LEFT JOIN (SELECT pemb_vit_balita.id_vit, pemb_vit_balita.tgl_pem, vitamin.nama_vit, pemb_vit_balita.ket, pemb_vit_balita.id_bayi FROM pemb_vit_balita LEFT JOIN vitamin ON pemb_vit_balita.id_vit=vitamin.id_vit) as Z ON Z.id_bayi=balita.id_balita
    WHERE balita.id_balita = '$id_balita' AND Z.id_bayi='$id_balita'");


      if ($query->result()==0){
          return false;
      }
      else {
          return $query->result();
      }
  }

  function validate_imun_bayi($id_bayi,$id_imun){
    $this->db->select('*');
    $this->db->from('pemb_imun_bayi');
    $this->db->where('id_imun',$id_imun);
    $this->db->where('id_bayi',$id_bayi);
    //$this->db->where('YEAR(tgl_pem)',$tahun);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->num_rows();
        }
  }

  function detailPemVitBayi($id_bayi){
    $query = $this->db->query("SELECT Z.nama_vit, Z.tgl_pem, Z.ket
    FROM balita
    LEFT JOIN (SELECT pemb_vit_balita.id_vit, pemb_vit_balita.tgl_pem, vitamin.nama_vit, pemb_vit_balita.ket, pemb_vit_balita.id_bayi FROM pemb_vit_balita LEFT JOIN vitamin ON pemb_vit_balita.id_vit=vitamin.id_vit) as Z ON Z.id_bayi=balita.id_balita
    WHERE balita.id_balita = '$id_bayi' AND Z.id_bayi='$id_bayi'");


      if ($query->result()==0){
          return false;
      }
      else {
          return $query->result();
      }
  }

  function SelectImun(){
    return $this->db->get($this->_tableimun)->result();
  }

  function SelectImunWhere($id_bayi){
    $query1 = $this->db->query("SELECT a.id_imun,a.nama_imun from imunisasi a left join pemb_imun_bayi b on a.id_imun = b.id_imun where (select count(b.id_imun) from pemb_imun_bayi where id_bayi = id_bayi) < 1");
      if ($query1->result()==0){
          return false;
      }else {
          return $query1->result();
      }
  }

  function SelectImunbyId_ibu($id_ibuhamil){
    $query = $this->db->query("SELECT Z.nama_imun, Z.tgl_pem, Z.ket
    FROM ibu_hamil
    LEFT JOIN (SELECT pemb_imun_ibu.id_imun, pemb_imun_ibu.tgl_pem, imunisasi.nama_imun, pemb_imun_ibu.ket, pemb_imun_ibu.id_ibuhamil FROM pemb_imun_ibu LEFT JOIN imunisasi ON pemb_imun_ibu.id_imun=imunisasi.id_imun) as Z ON Z.id_ibuhamil=ibu_hamil.id_ibuhamil
    WHERE ibu_hamil.id_ibuhamil = '$id_ibuhamil' AND Z.id_ibuhamil='$id_ibuhamil'");

      if ($query->result()==0){
          return false;
      }
      else {
          return $query->result();
      }
  }

  function SelectImunbyId_bayi($id_balita){
    $query = $this->db->query("SELECT Z.nama_imun, Z.tgl_pem, Z.ket
    FROM balita
    LEFT JOIN (SELECT pemb_imun_bayi.id_imun, pemb_imun_bayi.tgl_pem, imunisasi.nama_imun, pemb_imun_bayi.ket, pemb_imun_bayi.id_bayi FROM pemb_imun_bayi LEFT JOIN imunisasi ON pemb_imun_bayi.id_imun=imunisasi.id_imun) as Z ON Z.id_bayi=balita.id_balita
    WHERE balita.id_balita = '$id_balita' AND Z.id_bayi='$id_balita'");

      if ($query->result()==0){
          return false;
      }
      else {
          return $query->result();
      }
  }

  function selectPelbyId_bayi($id_balita){
    $this->db->select('*');
    $this->db->from('balita');
    $this->db->join('pelayanan_bayi', 'balita.id_balita = pelayanan_bayi.id_balita', 'left');
    $this->db->where('balita.id_balita',$id_balita);
    $this->db->order_by('pelayanan_bayi.tgl_pelbayi', 'DESC');

    $query = $this->db->get();

    if ($query->result()==0){
        return false;
    }
    else {
        return $query->result();
    }
}

  function selectPelbyId_ibu($id_ibuhamil){
    $this->db->select('*');
    $this->db->from('ibu_hamil');
    $this->db->join('pelayanan_ibu', 'ibu_hamil.id_ibuhamil = pelayanan_ibu.id_ibuhamil', 'left');
    $this->db->where('ibu_hamil.id_ibuhamil',$id_ibuhamil);
    $this->db->order_by('pelayanan_ibu.tgl_pel', 'DESC');

    $query = $this->db->get();

    if ($query->result()==0){
        return false;
    }
    else {
        return $query->result();
    }
}

  function detailPemImunBayi($id_bayi){
    $query = $this->db->query("SELECT Z.nama_imun, Z.tgl_pem, Z.ket
    FROM balita
    LEFT JOIN (SELECT pemb_imun_bayi.id_imun, pemb_imun_bayi.tgl_pem, imunisasi.nama_imun, pemb_imun_bayi.ket, pemb_imun_bayi.id_bayi FROM pemb_imun_bayi LEFT JOIN imunisasi ON pemb_imun_bayi.id_imun=imunisasi.id_imun) as Z ON Z.id_bayi=balita.id_balita
    WHERE balita.id_balita = '$id_bayi' AND Z.id_bayi='$id_bayi'");

      if ($query->result()==0){
          return false;
      }
      else {
          return $query->result();
      }
  }

  function selectbyid_pasien_ibuhamil($id_ibuhamil){
    // return $this->db->get_where($this->_tableibu,['id_ibuhamil'=>$id_ibuhamil])->result();
        $this->db->select('*');
        $this->db->from('ibu_hamil');
        $this->db->join('penimb_ibu', 'ibu_hamil.id_ibuhamil = penimb_ibu.id_ibuhamil', 'left');
        $this->db->where('ibu_hamil.id_ibuhamil',$id_ibuhamil);
        $this->db->order_by('penimb_ibu.tgl_penimb_ibu', 'DESC');

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->result();
        }
  }

  function selectbyid_pasien_bayi($id_balita){
    $this->db->select('*');
    $this->db->from('balita');
    $this->db->join('penimb_bayi', 'balita.id_balita = penimb_bayi.id_balita', 'left');
    $this->db->where('balita.id_balita',$id_balita);
    $this->db->order_by('penimb_bayi.tgl_penimb_bayi', 'DESC');

    $query = $this->db->get();

    if ($query->result()==0){
        return false;
    }
    else {
        return $query->result();
    }
}  

  function SelectByID($id_user){
    return $this->db->get_where($this->_table,['user_id'=>$id_user])->result();
  }

  function Insert($data){
    return $this->db->insert($this->_tableibu, $data);
  }

  function insertPasienBayi($data){
    return $this->db->insert($this->_tablebayi, $data);
  }


  function Insertpenimb_ibu($data){
    return $this->db->insert($this->_tablepenimb_ibu, $data);
  }

  function InsertPenimBayi($data){
    return $this->db->insert($this->_tablepenimb_bayi, $data);
  }

  function Insertpembvit_ibu($data){
    return $this->db->insert($this->_tablevit_ibu, $data);
  }

  function insertPemVitBayi($data){
    return $this->db->insert($this->_tablevit_bayi, $data);
  }

  function insertPelBayi($data){
    return $this->db->insert($this->_tablepelayanan_bayi, $data);
  }

  function insertPelIbu($data){
    return $this->db->insert($this->_tablepelayanan_ibu, $data);
  }

  function Insertpembimun_ibu($data){
    return $this->db->insert($this->_tableimun_ibu, $data);
  }

  function insertPemImunBayi($data){
    return $this->db->insert($this->_tableimun_bayi, $data);
  }

  function Update($data){
    $this->db->update($this->_tableibu, $data, ['id_ibuhamil'=>$data['id_ibuhamil']]);
  }

  function UpdateBayi($data){
    $this->db->update($this->_tablebayi, $data, ['id_balita'=>$data['id_balita']]);
  }

  function Delete($data){
    $id_ibuhamil = $data['id_ibuhamil'];
    return $this->db->delete($this->_tableibu, ["id_ibuhamil"=>$id_ibuhamil]);
  }

  function DeleteBayi($data){
    $id_balita = $data['id_balita'];
    return $this->db->delete($this->_tablebayi, ["id_balita"=>$id_balita]);
  }

  public function get_data_user($nik){
  return $this->db->get_where($this->_tableuser,['nik'=>$nik])->result();
}

function validateInputBayi($nik_ortu,$nama_bayi){
  // $this->db->where('email',$email);
  // $this->db->where('email',$email);
  // $result = $this->db->get('user',1);
  return $this->db->get_where($this->_tablebayi,['nik_ortu'=>$nik_ortu,'nama_bayi'=>$nama_bayi]);
}

function laporan_penimb_ibu($start_date, $end_date){
        $this->db->select('*');
        $this->db->from('penimb_ibu, ibu_hamil');
        $this->db->where('penimb_ibu.id_ibuhamil = ibu_hamil.id_ibuhamil');
        $this->db->where('penimb_ibu.tgl_penimb_ibu >=', $start_date);
        $this->db->where('penimb_ibu.tgl_penimb_ibu <=', $end_date);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->result();
        }
}

function laporan_vit_ibu($start_date, $end_date){
  $this->db->select('*');
  $this->db->from('pemb_vitamin_ibu, vitamin, ibu_hamil');
  $this->db->where('pemb_vitamin_ibu.id_ibuhamil = ibu_hamil.id_ibuhamil');
  $this->db->where('pemb_vitamin_ibu.id_vit = vitamin.id_vit');
  $this->db->where('pemb_vitamin_ibu.tgl_pem_vit >=', $start_date);
  $this->db->where('pemb_vitamin_ibu.tgl_pem_vit <=', $end_date);

  $query = $this->db->get();

  if ($query->result()==0){
      return false;
  }
  else {
      return $query->result();
  }
}

function laporan_imun_ibu($start_date, $end_date)
{
  $this->db->select('*');
  $this->db->from('pemb_imun_ibu, imunisasi, ibu_hamil');
  $this->db->where('pemb_imun_ibu.id_ibuhamil = ibu_hamil.id_ibuhamil');
  $this->db->where('pemb_imun_ibu.id_imun = imunisasi.id_imun');
  $this->db->where('pemb_imun_ibu.tgl_pem >=', $start_date);
  $this->db->where('pemb_imun_ibu.tgl_pem <=', $end_date);

  $query = $this->db->get();

  if ($query->result()==0){
      return false;
  }
  else {
      return $query->result();
  }
}

function laporan_kematian_ibu ($start_date, $end_date){
  $this->db->select('*');
  $this->db->from('ibu_hamil');
  $this->db->where('tgl_kematian >=', $start_date);
  $this->db->where('tgl_kematian <=', $end_date);

  $query = $this->db->get();

  if ($query->result()==0){
      return false;
  }
  else {
      return $query->result();
  }
}

function laporan_penimb_bayi($start_date, $end_date)
{
        $this->db->select('*');
        $this->db->from('penimb_bayi, balita');
        $this->db->where('penimb_bayi.id_balita = balita.id_balita');
        $this->db->where('penimb_bayi.tgl_penimb_bayi >=', $start_date);
        $this->db->where('penimb_bayi.tgl_penimb_bayi <=', $end_date);

        $query = $this->db->get();

        if ($query->result()==0){
            return false;
        }
        else {
            return $query->result();
        }
}

function laporan_vit_bayi($start_date, $end_date)
{
  $this->db->select('*');
  $this->db->from('pemb_vit_balita, vitamin, balita');
  $this->db->where('pemb_vit_balita.id_bayi = balita.id_balita');
  $this->db->where('pemb_vit_balita.id_vit = vitamin.id_vit');
  $this->db->where('pemb_vit_balita.tgl_pem >=', $start_date);
  $this->db->where('pemb_vit_balita.tgl_pem <=', $end_date);

  $query = $this->db->get();

  if ($query->result()==0){
      return false;
  }
  else {
      return $query->result();
  }
}

function laporan_imun_bayi($start_date, $end_date)
{
  $this->db->select('*');
  $this->db->from('pemb_imun_bayi, imunisasi, balita');
  $this->db->where('pemb_imun_bayi.id_bayi = balita.id_balita');
  $this->db->where('pemb_imun_bayi.id_imun = imunisasi.id_imun');
  $this->db->where('pemb_imun_bayi.tgl_pem >=', $start_date);
  $this->db->where('pemb_imun_bayi.tgl_pem <=', $end_date);

  $query = $this->db->get();

  if ($query->result()==0){
      return false;
  }
  else {
      return $query->result();
  }
}

function laporan_kematian_bayi($start_date, $end_date)
{
  $this->db->select('*');
  $this->db->from('balita');
  $this->db->where('tgl_kematian >=', $start_date);
  $this->db->where('tgl_kematian <=', $end_date);

  $query = $this->db->get();

  if ($query->result()==0){
      return false;
  }
  else {
      return $query->result();
  }
}

}
?>