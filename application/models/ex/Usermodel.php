<?php
  class Usermodel extends CI_Model {
    function __construct (){
      // Model 생성자를 호출
      parent::__construct();
    }

    // scrum_user 테이블의 사용자 리스트를 가져와서
    // 각 사용자의 세부 정보를 담고 있는 객체의 배열을 리턴
    function get_users() {
      // SQL 질의를 생성하는 CI의 Database 객체 메소드를 호출
      $query = $this->db->get('scrum_user');
      // 사용자 정보 객체의 배열을 리턴
      return $query->result();
    }
  }
?>
