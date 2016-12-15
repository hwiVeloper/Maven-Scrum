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

    }

    /* View Plan */
    function view() {
      $ret = array();

      // GET value of Plan/view
      if($this->uri->segment(3)){
        $get_date = $this->uri->segment(3);

        // Plan count check (validation)
        $valid_plan = $this->MPlan->check_valid_plan($get_date, $this->sUser);

        if($valid_plan != 0){ // not empty
          $view_params['plans'] = $this->MPlan->view_plan($get_date, $this->sUser);
          $view_params['comment'] = $this->MPlan->view_comment($get_date, $this->sUser);
          //echo $view_params['plans'][0]['plan_date'];
          $this->load->view('header');
          $this->load->view('viewPlan', $view_params);
          $this->load->view('footer');
        }else {
          echo "<script>alert('아직 일정을 등록하지 않았습니다.')</script>";
          redirect('Plan/add', 'refresh');
        }
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
        // view form
        $this->load->view('header');
        $this->load->view('addPlan');
        $this->load->view('footer');
      }
    }

    /* Update Plan */
    function modify() {
      echo "modify";
    }

    /* Delete Plan */
    function remove() {
      echo "remove";
    }

    /* Check add */
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
  }
?>
