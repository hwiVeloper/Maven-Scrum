<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCharts extends CI_Model{
  public function __construct() {
    parent::__construct();
  }

  /**
   * 최근 7일 날짜정보 GET
   */
  function get_recent_seven_dates() {
    $sql = "SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 DAY), '%d') AS date UNION
            SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 DAY), '%d') AS date UNION
            SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 DAY), '%d') AS date UNION
            SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 DAY), '%d') AS date UNION
            SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 DAY), '%d') AS date UNION
            SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 DAY), '%d') AS date UNION
            SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 0 DAY), '%d') AS date";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  /**
   * 최근 7일 user의 완료된 plan 개수 GET
   */
  function get_recent_plan_complete_count($user) {
    $sql = "SELECT d.date
                 , count(plan_status) AS count
            FROM (SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 0 DAY), '%Y-%m-%d') AS date) d
                  LEFT OUTER JOIN scrum_plan p ON d.date = p.plan_date AND user_id = '$user'
            AND plan_status = 1
            GROUP BY d.date";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  /**
   * 최근 7일 MAVEN 평균 완료 plan 개수 GET
   */
  function get_recent_plan_average() {
    $sql = "SELECT d.date
                 , count(plan_status) / (SELECT count(*) FROM scrum_plan_info WHERE plan_date = d.date) avg
            FROM
                 (SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 6 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 4 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 2 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 1 DAY), '%Y-%m-%d') AS date UNION
                  SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 0 DAY), '%Y-%m-%d') AS date) d
                  LEFT OUTER JOIN scrum_plan p ON d.date = p.plan_date
            AND plan_status = 1
            GROUP BY d.date";
    $query = $this->db->query($sql);

    return $query->result_array();
  }
}
