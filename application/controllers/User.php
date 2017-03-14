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

    if($_FILES){
      echo "<script>alert('파일 업로드 시작');</script>";
      // file upload
      $config['upload_path'] = './assets/img/member/';
      $config['allowed_types'] = 'jpg|jpeg|gif|png';
      $config['file_ext_tolower'] = TRUE;
      $config['overwrite'] = TRUE;
      $config['max_size'] = "4096";
      $config['remove_spaces'] = TRUE;
      $config['file_name'] = $this->input->post('original_file_name');

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('user_img') ) {
        $error = array('error' => $this->upload->display_errors());
        echo "<script>alert('업로드실패');</script>";
        redirect('User', 'refresh');
      } else {
        echo "<script>alert('업로드성공');</script>";
        $file_name = $this->upload->data('file_name');
      }
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

    echo "<script>alert('저장되었습니다.');</script>";
    redirect('User', 'refresh');
  }
}
