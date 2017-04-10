<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MForum extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_forum_list_by_ym($ym) {
    $sql = "SELECT *
                 , user_name
                 , user_img
            FROM scrum_forum_detail d
               , scrum_user u
            WHERE forum_ym = '$ym'
            AND u.user_id = d.forum_writer
            ORDER BY d.forum_dttm";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_max_ym() {
    $sql = "SELECT MAX(forum_ym) max_ym
            FROM scrum_forum";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->max_ym;
  }

  function get_ym_list() {
    $sql = "SELECT *
            FROM scrum_forum
            ORDER BY forum_seq DESC";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function check_forum_count_by_ym($ym, $user) {
    $sql = "SELECT COUNT(*) AS count
            FROM scrum_forum_detail
            WHERE forum_ym = '$ym'
            AND forum_writer = '$user'";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->count;
  }

  function insert($data) {
    $this->db->insert('scrum_forum_detail', $data);
    return $this->db->affected_rows();
  }

  function update($data, $ym, $user) {
    $this->db->where('forum_ym', $ym);
    $this->db->where('forum_writer', $user);
    $this->db->update('scrum_forum_detail', $data);

    return $this->db->affected_rows();
  }

  function delete($ym, $user) {
    $this->db->where('forum_ym', $ym);
    $this->db->where('forum_writer', $user);
    $this->db->delete('scrum_forum_detail');
  }

  function get_forum_open($ym) {
    $sql = "SELECT forum_open
            FROM scrum_forum
            WHERE forum_ym = '$ym'";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->forum_open;
  }
}
