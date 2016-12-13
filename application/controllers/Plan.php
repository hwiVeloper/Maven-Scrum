<?php
  class Plan extends CI_Controller {
    // Constructor
    function __construct() {
      parent::__construct();

      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->model('MPlan');
    }

    // Plan index (default)
    function index() {
      $this->view();
    }

    // View Plan
    function view() {

    }

    // Insert Plan
    function add() {
      
    }

    // Update Plan
    function modify() {

    }

    // Delete Plan
    function remove() {

    }
  }
?>
