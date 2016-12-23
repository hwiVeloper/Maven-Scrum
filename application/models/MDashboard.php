<?php
class MDashboard extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function today_count($date) {
    $sql = "SELECT COUNT(*) as count
            FROM scrum_plan_info
            WHERE plan_date = '$date'";
    $query = $this->db->query($sql);
    $row = $query->row();
    return $row->count;
  }

  function today_plans($date) {
    $sql = "SELECT a.*
                 , i.plan_comment
                 , i.plan_creation_dttm
                 , u.user_img
                 , u.user_name
                 , (SELECT COUNT(*)
                    FROM scrum_plan
                    WHERE plan_date = a.plan_date
                    AND user_id = a.user_id) AS each_count
            FROM scrum_plan AS a
               , scrum_plan AS a2
               , scrum_user AS u
               , scrum_plan_info AS i
            WHERE a.plan_date = a2.plan_date
              AND a.plan_detail_seq <= a2.plan_detail_seq
              AND a.user_id = u.user_id
              AND a.plan_date = i.plan_date
              AND a.user_id = i.user_id
            GROUP BY a.user_id
                  , a.plan_content
                  , a.plan_status
            HAVING a.plan_detail_seq <= 2 AND a.plan_date = '$date'
            ORDER BY a.plan_date
                   , a.user_id
                   , a.plan_detail_seq";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
?>
