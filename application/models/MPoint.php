<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPoint extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_user_point($user) {
    $sql = "SELECT *
                 , (month_attendance_count * 10
                  + month_plan_count * 10
                  + month_reply_count * 1) AS month_point
                 , (attendance_count * 10
                  + plan_count * 10
                  + reply_count * 1) AS accml_point
            FROM (SELECT COUNT(*) AS month_attendance_count
                  FROM scrum_user u
                     , scrum_attendance a
                  WHERE u.user_id = '$user'
                  AND u.user_id = a.user_id
                  AND DATE_FORMAT(a.attendance_date, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')) AS month_attendance
               , (SELECT COUNT(*) AS month_plan_count
                  FROM scrum_user u
                     , scrum_plan_info p
                  WHERE u.user_id = '$user'
                  AND u.user_id = p.user_id
                  AND DATE_FORMAT(p.plan_date, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')) AS month_plan
               , (SELECT COUNT(*) AS month_reply_count
                  FROM scrum_user u
                     , scrum_reply r
                  WHERE u.user_id = '$user'
                  AND u.user_id = r.write_user
                  AND r.user_id != r.write_user
                  AND DATE_FORMAT(r.plan_date, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')) AS month_reply
               , (SELECT COUNT(*) AS attendance_count
                  FROM scrum_user u
                     , scrum_attendance a
                  WHERE u.user_id = '$user'
                  AND u.user_id = a.user_id
                  AND DATE_FORMAT(a.attendance_date, '%Y-%m') > '2017-03') AS attendance
               , (SELECT COUNT(*) AS plan_count
                  FROM scrum_user u
                     , scrum_plan_info p
                  WHERE u.user_id = '$user'
                  AND u.user_id = p.user_id
                  AND DATE_FORMAT(p.plan_date, '%Y-%m') > '2017-03') AS plan
               , (SELECT COUNT(*) AS reply_count
                  FROM scrum_user u
                     , scrum_reply r
                  WHERE u.user_id = '$user'
                  AND u.user_id = r.write_user
                  AND r.user_id != r.write_user
                  AND DATE_FORMAT(r.plan_date, '%Y-%m')  > '2017-03') AS reply";
    $query = $this->db->query($sql);

    return $query->row();
  }

  function get_rank_of_this_month() {
    $sql = "SELECT a.*
            FROM (SELECT plan.user_id
                       , (SELECT user_name FROM scrum_user WHERE user_id = plan.user_id) AS user_name
                       , attendance.count AS attendance_count
                       , plan.count AS plan_count
                       , reply.count AS reply_count
                       , (attendance.count * 10 + plan.count * 10 + reply.count) AS point
                  FROM (SELECT u.user_id
                             , count(p.plan_date) count
                        FROM scrum_user u
                        LEFT JOIN scrum_plan_info p ON u.user_id = p.user_id
                        AND DATE_FORMAT(p.plan_date, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')
                        GROUP BY u.user_id) AS plan
                     , (SELECT u.user_id
                             , count(r.reply_timestamp) count
                        FROM scrum_user u
                        LEFT JOIN scrum_reply r ON u.user_id = r.write_user
                        AND DATE_FORMAT(r.reply_timestamp, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')
                        GROUP BY u.user_id) AS reply
                     , (SELECT u.user_id
                             , count(a.user_id) count
                        FROM scrum_user u
                        LEFT JOIN scrum_attendance a ON u.user_id = a.user_id
                        AND DATE_FORMAT(a.attendance_date, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')
                        GROUP BY u.user_id) AS attendance
            WHERE plan.user_id = reply.user_id
            AND plan.user_id = attendance.user_id) AS a
ORDER BY point DESC";
    $query = $this->db->query($sql);

    return $query->result_array();
  }
}