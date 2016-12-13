<?php
  class Plan extends CI_Controller {
    // Constructor
    function __construct() {
      parent::__construct();

      $this->load->helper('form');
      $this->load->model('MPlan');

      /* Sesison check */
      if(!($this->session->userdata())) {
        echo "<script>alert('먼저 로그인을 해주세요.');</script>";
        redirect('Main', 'refresh');
      }
    }

    // Plan index (default)
    function index() {

    }

    // View Plan
    function view() {
      echo "view";
    }

    // Insert Plan
    function add() {
      if($this->input->post()) {
        // value check
        // add process
        echo "post";
      }else{
        // view form
        $this->load->view('header');
        $this->load->view('addPlan');
        $this->load->view('footer');
      }
    }

    // Update Plan
    function modify() {
      echo "modify";
    }

    // Delete Plan
    function remove() {
      echo "remove";
    }
  }
?>
