<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('MUser');
  }

  /**
   * View my info
   */
  function index() {
    // session check
    if(!($this->session->userdata('user_id'))){
      echo "<script>alert('먼저 로그인을 해주세요.')</script>";
      redirect('Main', 'refresh');
    }

    $get_user = $this->session->userdata('user_id');

    $view_params['user'] = $this->MUser->get_user($get_user);

    $this->load->view('header');
    $this->load->view('myInfo', $view_params);
    $this->load->view('footer');
  }

  /**
   * Modify my info
   */
  function modify() {
    // set POST values
    $user_password = $this->input->post('user_password');
    $user_password_confirm = $this->input->post('user_password_confirm');
    $user_name = $this->input->post('user_name');
    $user_birth = $this->input->post('user_birth');
    $user_email = $this->input->post('user_email');
    $user_field = $this->input->post('user_field');

    // password check
    $change_password_tf = FALSE;
    $error_message = "비밀번호 입력을 확인해 주세요.";

    if($user_password == "" && $user_password_confirm == "") {
      $change_password_tf = FALSE;
    }else if($user_password != "" && $user_password_confirm != "") {
      if($user_password != $user_password_confirm){
        echo "<script>alert('".$error_message."');</script>";
        redirect('User', 'refresh');
      }else{
        $change_password_tf = TRUE;
      }
    }else {
      echo "<script>alert('".$error_message."');</script>";
      redirect('User', 'refresh');
    }

    // make array if changing password is allowed
    if($change_password_tf){
      $data = array(
        'user_password' => md5($user_password),
        'user_name' => $user_name,
        'user_birth' => $user_birth,
        'user_email' => $user_email,
        'user_field' => $user_field
      );
    }else{
      $data = array(
        'user_name' => $user_name,
        'user_birth' => $user_birth,
        'user_email' => $user_email,
        'user_field' => $user_field
      );
    }

    $this->MUser->modify_user($data);

    //echo "<script>alert('저장되었습니다.');</script>";
    redirect('User', 'refresh');
  }
}
