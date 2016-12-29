<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCalendar extends CI_Model{

  public function __construct() {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function check_content($y, $m, $user) {
    $sql = "SELECT DAYOFMONTH(plan_date) AS day
                 , CONCAT('http://scrum.mismaven.kr/Plan/detail/', plan_date, '/', user_id) AS cal_link
            FROM scrum_plan_info
            WHERE user_id = '$user'
            AND YEAR(plan_date) = '$y'
            AND MONTH(plan_date) = '$m'";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
