<?php
  class Hello extends CI_Controller {
    public function index() {
      // $view_params 변수는 필수가 아니다.
      // 뷰가 매개변수를 사용하지 않는다면 $this->load->view('뷰 파일명'); 로 충분함.
      // 뷰 스크립트에서 $view_params로부터 $변수 = $값을 추출한다.
      // 이 예제는 3개의 변수를 생성한다.

      $view_params = array(
        'mega_title' => 'MAVEN SCRUM - Hello Members :)',
        'title'      => 'Welcome to Maven Scrum Page',
        'message'    => 'Hello MAVENS'
      );

      //view('뷰 파일명', 매개변수 배열);
      $this->load->view('helloview', $view_params);
    }
  }
?>
