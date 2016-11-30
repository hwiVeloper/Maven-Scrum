<?php
  class User extends CI_Controller {
    function users() {
      // Database 로딩
      $this->load->database();

      // Model 클래스 로딩
      $this->load->model('Usermodel');

      $view_params['mega_title'] = 'Model Example';

      // Database로부터 scrum_users 테이블 정보를 얻기 위해 모델을 호출
      $view_params['users'] = $this->Usermodel->get_users();

      $this->load->view('userView', $view_params);
    }
  }
?>
