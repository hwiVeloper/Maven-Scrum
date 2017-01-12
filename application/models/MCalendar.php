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

  function get_month_info_by_user($y, $m, $user) {
    /* 두가지로 경우 나누기 */
    $sql = "SELECT COUNT(plan_date) AS is_content_days
                 , DAYOFMONTH(NOW()) AS current_days
                 , COUNT(plan_date) / DAYOFMONTH(NOW()) * 100 AS percentage
            FROM scrum_plan_info
            WHERE user_id = '$user'
            AND YEAR(plan_date) = '$y'
            AND MONTH(plan_date) = '$m'
            ";
    $query = $this->db->query($sql);
    return $query->row();
  }

  function get_list($y, $m, $user) {
    $sql = "SELECT p.plan_date
                 , CASE WHEN plan_detail_seq = 0 THEN p.plan_date
                   ELSE '' END AS plan_date_for_table
                 , plan_detail_seq
                 , plan_content
                 , plan_status
                 , CASE WHEN plan_status = 1 THEN '완료'
                   ELSE '미완료' END AS plan_status_display
                 , CASE WHEN plan_detail_seq = 0 THEN plan_comment
                   ELSE '' END AS plan_comment
                 , (SELECT COUNT(plan_detail_seq) FROM scrum_plan
                    WHERE plan_date = p.plan_date
                    AND user_id = p.user_id) AS each_count
            FROM scrum_plan p
               , scrum_plan_info i
            WHERE p.user_id = '$user'
            AND p.plan_date LIKE '$y-$m%'
            AND p.plan_date = i.plan_date
            AND p.user_id = i.user_id
            ORDER BY p.plan_date DESC, plan_detail_seq ASC
            ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
