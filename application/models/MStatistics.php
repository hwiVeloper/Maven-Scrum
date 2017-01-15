<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MStatistics extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_members() {
    $sql = "SELECT '' AS user_id
                 , '날짜' as user_name
            FROM dual
            UNION
            SELECT user_id
                 , user_name
            FROM (SELECT *
                  FROM scrum_user
                  ORDER BY user_name) u
            ";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_attendance($y, $m, $user) {
    // Custom Date
    $ymd = $y.$m.'01';
    $sql = "SELECT A.date_list, info.*
            FROM (SELECT LAST_DAY(DATE_FORMAT($ymd, '%Y-%m-01') ) - INTERVAL (A.A + (10 * B.A) + (100 * C.A)) DAY AS date_list
                  FROM (SELECT 0 AS A UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
                        UNION ALL SELECT 9) AS A
                  CROSS JOIN (SELECT 0 AS A UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL
                  SELECT 8 UNION ALL SELECT 9) AS B
                  CROSS JOIN (SELECT 0 AS A UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL
                  SELECT 8 UNION ALL SELECT 9) AS C
                ) A LEFT JOIN (SELECT * FROM scrum_plan_info WHERE user_id = '$user') info ON A.date_list = DATE_FORMAT(plan_date, '%Y-%m-%d')
            WHERE A.date_list BETWEEN DATE_FORMAT($ymd, '%Y-%m-01') AND LAST_DAY(DATE_FORMAT($ymd, '%Y-%m-01'))
            ORDER BY date_list";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
