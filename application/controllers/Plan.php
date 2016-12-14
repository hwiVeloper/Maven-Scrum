<?php
  class Plan extends CI_Controller {
    // Constructor
    function __construct() {
      parent::__construct();

      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->model('MPlan');

      /* Sesison check */
      if(!($this->session->userdata('user_id'))) {
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
        $info = $this->check_add();
        $result = $info['result'];
        $msg = $info['msg'];

        if($result == TRUE){
          echo "<script>alert('".$msg."')</script>";
          redirect('Main', 'refresh');
        }
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

    // Check add
    function check_add() {
      $plan_count = 0;
      // Initialize array to return
      $ret = array();
      $ret['msg'] = 0;
      $ret['result'] = TRUE;

      $seq = $this->input->post('plan_detail_seq');
      $content = $this->input->post('plan_content');

      // Insert dataset (Plan)
      $data = array();
      for($i = 0; $i < sizeof($seq); $i++){
        $data = array(
            'plan_date' => $this->input->post('plan_date'),
            'plan_detail_seq' => $seq[$i],
            'plan_content' => $content[$i],
            //'plan_comment' => $this->input->post('plan_comment'),
            'user_id' => $this->session->userdata('user_id')
        );
        $plan_count += $this->MPlan->add_plan($data);
      }

      // Insert dataset (Plan info)
      $data = array(
          'plan_date' => $this->input->post('plan_date'),
          'plan_comment' => $this->input->post('plan_comment'),
          'user_id' => $this->session->userdata('user_id')
      );
      $this->MPlan->add_plan_info($data);

      if($plan_count > 0){
        $ret['msg'] = $plan_count."건이 등록되었습니다.";
        $ret['result'] = TRUE;
      }

      return $ret;
    }
  }
?>
