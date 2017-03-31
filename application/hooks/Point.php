<?php
class Point{

  private $ci;

  function __construct() {
    $this->ci = &get_instance();
    $this->ci->load->model('MPoint');
  }
  function index() {
    $user_point_info = $this->ci->MPoint->get_user_point($this->ci->session->userdata('user_id'));

    // 매 번 세션을 최신화된 포인트로 수정한다.
    $this->ci->session->set_userdata('month_attendance_count' , $user_point_info->month_attendance_count );
    $this->ci->session->set_userdata('month_plan_count'       , $user_point_info->month_plan_count       );
    $this->ci->session->set_userdata('month_reply_count'      , $user_point_info->month_reply_count      );
    $this->ci->session->set_userdata('month_point'            , $user_point_info->month_point            );
    $this->ci->session->set_userdata('attendance_count'       , $user_point_info->attendance_count       );
    $this->ci->session->set_userdata('plan_count'             , $user_point_info->plan_count             );
    $this->ci->session->set_userdata('reply_count'            , $user_point_info->reply_count            );
    $this->ci->session->set_userdata('accml_point'            , $user_point_info->accml_point            );
  }
}
?>