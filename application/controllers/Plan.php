<?php
  class Plan extends CI_Controller {

    private $sUser;

    /* Constructor */
    function __construct() {
      parent::__construct();

      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->model('MPlan');

      $this->sUser = $this->session->userdata('user_id');

      /* Sesison check */
      if("" == $this->sUser || NULL == $this->sUser) {
        echo "<script>alert('먼저 로그인을 해주세요.');</script>";
        redirect('Main', 'refresh');
      }
    }

    /* Plan index (default) */
    function index() {
      //nothing
    }

    /* View myPlan */
    function myPlan() {
      $ret = array();

      // GET value of Plan/myPlan
      if($this->uri->segment(3)){
        $get_date = $this->uri->segment(3);
      }else{
        $get_date = date("Y-m-d");
      }

      // Plan count check (validation)
      $valid_plan = $this->MPlan->check_valid_plan($get_date, $this->sUser);

      if($valid_plan != 0){ // not empty
        $view_params['plans'] = $this->MPlan->view_plan($get_date, $this->sUser);
        $view_params['comment'] = $this->MPlan->view_comment($get_date, $this->sUser);

        $this->load->view('header');
        $this->load->view('viewPlan', $view_params);
        $this->load->view('footer');
      }else {
        echo "<script>alert('아직 일정을 등록하지 않았습니다.')</script>";
        redirect('Plan/add', 'refresh');
      }
    }

    /* Insert Plan */
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
        // Plan count check (validation)
        $valid_plan = $this->MPlan->check_valid_plan(date("Y-m-d"), $this->sUser);

        if($valid_plan > 0) {
          echo "<script>alert('등록된 일정이 있습니다.')</script>";
          redirect('Plan/myPlan/'.date("Y-m-d"), 'refresh');
        }

        // view form
        $this->load->view('header');
        $this->load->view('addPlan');
        $this->load->view('footer');
      }
    }

    /* Update Plan */
    function modify() {
      if($this->input->post()) {
        // redirect address info
        $date = $this->input->post('plan_date');
        $info = $this->check_modify();
        $result = $info['result'];
        $msg = $info['msg'];

        if($result == TRUE){
          echo "<script>alert('".$msg."')</script>";
          redirect('Plan/myPlan/'.$date, 'refresh');
        }
      }else{
        echo "<script>alert('올바르지 않은 요청입니다.')</script>";

        // view form
        $this->load->view('header');
        $this->load->view('main');
        $this->load->view('footer');
      }
    }

    /* Delete Plan */
    function remove() {
      // GET value of Plan/myPlan
      if(null != $this->uri->segment(3) && null != $this->uri->segment(4)){
        $get_date = $this->uri->segment(3); //date
        $get_seq  = $this->uri->segment(4); //seq

        $info = $this->check_remove($get_date, $get_seq);

        $result = $info['result'];
        $msg = $info['msg'];

        if($result == TRUE){
          echo "<script>alert('".$msg."')</script>";
          redirect('Plan/myPlan/'.$get_date, 'refresh');
        }
      }else {
        echo "<script>alert('올바르지 않은 요청입니다.')</script>";
        redirect('Main', 'refresh');
      }
    }

    /* Check add */
    function check_add() {
      $plan_count = 0;

      // Initialize array to return
      $ret = array();
      $ret['msg'] = 0;
      $ret['result'] = FALSE;
      $seq = $this->input->post('plan_detail_seq');
      $content = $this->input->post('plan_content');

      // Insert dataset (Plan)
      $data = array();

      for($i = 0; $i < sizeof($seq); $i++){
        $data = array(
            'plan_date' => $this->input->post('plan_date'),
            'plan_detail_seq' => $seq[$i],
            'plan_content' => $content[$i],
            'user_id' => $this->session->userdata('user_id'),
            'plan_status' => 0
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

    /* Check modify */
    function check_modify() {
      $plan_count = 0;

      $ret = array();
      $ret['msg'] = '';
      $ret['result'] = FALSE;

      $seq = $this->input->post('plan_detail_seq');
      $content = $this->input->post('plan_content');
      $status = $this->input->post('plan_status');
      $row_status = $this->input->post('row_status');

      // Modify dataset (Plan)
      $data = array();

      for($i = 0; $i < sizeof($seq); $i++) {
        if($row_status[$i] == "R") {
          $data = array(
              'plan_date' => $this->input->post('plan_date'),
              'plan_detail_seq' => $seq[$i],
              'plan_content' => $content[$i],
              'user_id' => $this->session->userdata('user_id'),
              'plan_status' => isset($status[$i]) ? $status[$i] : 0
          );
          $plan_count += $this->MPlan->modify_plan($data);
        }else {
          $data2 = array(
              'plan_date' => $this->input->post('plan_date'),
              'plan_detail_seq' => $this->MPlan->get_max_seq($this->input->post('plan_date'), $this->session->userdata('user_id'))+1,
              'plan_content' => $content[$i],
              'user_id' => $this->session->userdata('user_id'),
              'plan_status' => isset($status[$i]) ? $status[$i] : 0
          );
          $plan_count += $this->MPlan->additional_plan($data2);
        }
      }

      // Modify dataset (Plan info)
      $data = array(
          'plan_date' => $this->input->post('plan_date'),
          'user_id' => $this->session->userdata('user_id'),
          'plan_comment' => $this->input->post('plan_comment')
      );

      $this->MPlan->modify_plan_info($data);

      if($plan_count > 0){
        $ret['msg'] = "저장되었습니다.";
        $ret['result'] = TRUE;
      }
      return $ret;
    }

    /* Check remove */
    function check_remove($date, $seq) {
      $ret = array();
      $ret['msg'] = '';
      $ret['result'] = FALSE;

      // Remove dataset (Plan)
      $data = array(
          'plan_date' => $date,
          'plan_detail_seq' => $seq,
          'user_id' => $this->session->userdata('user_id')
      );

      $plan_count = $this->MPlan->remove_plan($data);

      // Remove plan info (if there is no plan)
      if($this->MPlan->check_valid_plan($date, $this->sUser) == 0) {
        $this->MPlan->remove_plan_info($date, $this->sUser);
        redirect('Main', 'refresh');
      }

      if($plan_count == 1){
        $ret['msg'] = "삭제되었습니다.";
        $ret['result'] = TRUE;

        // Update other plans (detail_seq)
        $this->MPlan->update_seq($data);
      }else{
        $ret['msg'] = "삭제 중 오류가 발생하였습니다.";
        $this->db->trans_rollback();
      }
      return $ret;
    }
  }
?>
