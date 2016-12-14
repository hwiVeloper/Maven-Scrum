<?php
  class Homepage extends CI_Controller {
    function __construct() {
      parent::__construct();
      $this->load->helper('email_helper');
      $this->load->helper('url');
      $this->load->helper('date_helper');
    }
    public function index() {
      $data = array();
      $data['email'] = $email = "the@email.com";

      // validateors_helper 호출
      $data['email_valid'] = valid_email($email);
      $data['url'] = $url = "http://naver.com";
      // $data['url_valid'] = isValidURL($url);
      // $data['url_exist'] = isURLExists($url);
      $this->load->view('home_page_view', $data);
    }
    public function page_b() {
      $data = array();
      $mysql_date = "2016-12-07";

      // date_time_helper 호출
      $data['since'] = standard_date($mysql_date);
      $data['past']  = 2016;
      $this->load->view('page_b_view', $data);
    }
  }
?>
