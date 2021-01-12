<?php
defined('BASEPATH') or exit('No direct script access allowed');

// function login status jika belum login maka redirect ke home
function login_status(){
    $CI =& get_instance();
    if($CI->session->userdata('logged_in') !== TRUE){
        redirect('/');
    }
}

// redirect role buat di auth, jadi sudah login
// bakal redirect ke dashboard sesuai role
function redirect_role($level){
    //access admin dashboard
    if($level === '1'){
        redirect('admin');
    //access user/pelelang dashboard
    }elseif($level === '2'){
        redirect('user');
    //access author (nanti didelete/belum fix)
    }else{
        redirect('page/author');
    }
}

// redirect role belum bisa buat status sudah login pengen nya di fix kalau ketemu logika nya
// jadi jika yang login user jika mengakses halaman admin (/admin) bakal redirect
// ke halaman yang semestinya dia akses (halaman /user),
// jika role author (contoh) akses ke halaman /admin juga maka redirect ke /author

// cara ini juga belum berhasil
// function role_admin()
// {
//     $CI =& get_instance();
//     if($CI->session->userdata('level') !== 1){
//         redirect('/');
//     }
// }

// function role_user()
// {
//     $CI =& get_instance();
//     if($CI->session->userdata('level') !== 2){
//         redirect('/');
//     }
// }