<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

  /* Constructor */
  function __construct() {
    parent::__construct();

    $this->load->helper('form');
    $this->load->model('MSignup');
  }

  /* index (default) */
  function index() {
    // Error when the session is set
    if($this->session->userdata('user_id')){
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Main', 'refresh');
    }

    // load views
    $this->load->view('header');
    $this->load->view('signup');
    $this->load->view('footer');
  }

  function register() {
    if($this->input->post()){
      $user_count = 0;

      $check = TRUE;

      // Null check
      if(NULL == $this->input->post('user_id') || "" == $this->input->post('user_id')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[아이디]')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_password') || "" == $this->input->post('user_password')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[비밀번호]')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_password_confirm') || "" == $this->input->post('user_password_confirm')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[비밀번호확인]')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_name') || "" == $this->input->post('user_name')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[이름]')</script>";
        $check = FALSE;
      }

      // Check password
      if($this->input->post('user_password') != $this->input->post('user_password_confirm')){
        echo "<script>alert('비밀번호가 일치하지 않습니다.')</script>";
        $check = FALSE;
      }
      if(!$check){
        redirect("javascript:history.back(-1);");
      }

      $data = array(
          'user_id'               => $this->input->post('user_id'),
          'user_password'         => md5($this->input->post('user_password')), // md5
          'user_name'             => $this->input->post('user_name'),
          'user_birth'            => $this->input->post('user_birth'),
          'user_email'            => $this->input->post('user_email'),
          'user_field'            => $this->input->post('user_field'),
          'user_level'            => 0, // default level = 0
          'user_img'              => ""
      );
      $user_count = $this->MSignup->register_user($data);

      if($user_count > 0) {
        echo "<script>alert('등록되었습니다. 승인을 기다려주세요.')</script>";
        redirect('Main', 'refresh');
      }
    }else {
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Main', 'refresh');
    }
  }
}
?>
