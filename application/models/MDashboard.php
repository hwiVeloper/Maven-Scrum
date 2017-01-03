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
    $sql = "SELECT p1.*
                 , i.plan_comment
                 , i.plan_creation_dttm
                 , u.user_img
                 , u.user_name
                 , (SELECT COUNT(*)
                    FROM scrum_plan
                    WHERE plan_date = p1.plan_date
                    AND user_id = p1.user_id) AS each_count
                 , (SELECT COUNT(*)
                    FROM scrum_reply
                    WHERE plan_date = '$date'
                    AND user_id = p1.user_id) AS reply_count
            FROM scrum_plan AS p1
               , scrum_user AS u
               , scrum_plan_info AS i
            WHERE p1.user_id = u.user_id
              AND p1.plan_date = i.plan_date
              AND p1.user_id = i.user_id
              AND p1.plan_detail_seq <= 2
              AND p1.plan_date = '$date'
            GROUP BY p1.user_id
                   , p1.plan_content
                   , p1.plan_status
            ORDER BY i.plan_creation_dttm
                   , p1.plan_date
                   , p1.user_id
                   , p1.plan_detail_seq";
                   
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
?>
