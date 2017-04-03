<?php
class Attendance{

  private $ci;

  function __construct() {
    $this->ci = &get_instance();
    $this->ci->load->model('MAttendance');
  }
  function index() {
    // $this->ci->MAttendance->test_model();
    if(! $this->ci->session->userdata('user_id')){
      return;
    }

    // session user id
    $user_id = $this->ci->session->userdata('user_id');
    // today date
    $today = date('Y-m-d');
    // get attendance info (model)
    $attendance_yn = $this->ci->MAttendance->get_today_attendance($user_id, $today);
    // row count 0 ?
    if($attendance_yn == 0) {
      echo "<script>alert('출석체크!, 10포인트 적립합니다.');</script>";
      // insert new row
      $data = array(
        'user_id' => $user_id,
        'attendance_date' => $today
      );
      $this->ci->MAttendance->add_attendance($data);
    }
  }
}
?>