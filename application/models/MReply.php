<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReply extends CI_Model{

  public function __construct() {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function add_reply($data) {
    $query = $this->db->insert('scrum_reply', $data);
    return $this->db->insert_id();
  }

  function delete_reply($id) {
    $this->db->where('reply_id', $id);
    $this->db->delete('scrum_reply');
  }

  function get_child_reply($id) {
    $sql = "SELECT r.reply_id
            FROM (SELECT @rownum := @rownum + 1 AS rownum
                       , get_lvl() AS id
                       , @level AS level
                  FROM (SELECT @start_with:=$id
                             , @id:=@start_with
                             , @level:=0) vars
                  JOIN scrum_reply
                  WHERE @id IS NOT NULL) func
                  JOIN scrum_reply r ON func.id = r.reply_id
            WHERE plan_date in (SELECT plan_date FROM scrum_plan WHERE r.plan_date = plan_date)
            AND user_id in (SELECT user_id FROM scrum_user WHERE r.user_id = user_id)
            ORDER BY rownum, r.reply_id";
    $query = $this->db->query($sql);

    return $query->result_array();
  }
}
