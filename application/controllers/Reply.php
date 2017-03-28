<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reply extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('MReply');
  }

  /**
   * Add reply
   */
  function add() {
    $redirect_address = 'Plan/detail/'.$this->input->post('plan_date').'/'.$this->input->post('user_id');
    $reply_comment = "";
    if($this->input->post('reply_comment')){
      $reply_comment = $this->input->post('reply_comment');

      // reply_comment NULL check
      if("" == $reply_comment){
        echo "<script>alert('침묵은 허용하지 않는다.')</script>";
        redirect($redirect_address, 'refresh');
      }

      $data = array(
          'user_id' => $this->input->post('user_id'),
          'write_user' => $this->input->post('write_user'),
          'plan_date' => $this->input->post('plan_date'),
          'reply_comment' => $this->input->post('reply_comment'),
          'up_reply_id' => $this->input->post('up_reply_id'),
          'up_reply_user' => $this->input->post('up_reply_user')
      );

      $added_reply_id = $this->MReply->add_reply($data);

      $noti_data1 = array(
        'alarm_from_user' => $this->session->userdata('user_id'), // 작성자
        'alarm_to_user' => $this->input->post('user_id'), // 소유자
        'alarm_reply_user' => $this->input->post('up_reply_user'), // 댓글 소유자
        'alarm_target_date' => $this->input->post('plan_date'), // 소유자의 plan 날짜
        'alarm_target_controller' => 'Plan/detail/', // 타겟 컨트롤러
        'alarm_ref_reply' => $added_reply_id, // 댓글 소유자 참조 댓글id
        'alarm_status' => 0,
        'alarm_creation_dttm' => date('Y-m-d h:i:s')
      );
      $this->MNotification->add_notification($noti_data1);
      // echo "<script>alert('등록되었습니다.')</script>";
      redirect($redirect_address, 'refresh');
    }
  }

  /**
   * Delete reply
   */
  function delete() {
    if($this->uri->segment(3)){
      $reply_id = $this->uri->segment(3);

      $deleted_reply_count = $this->MReply->delete_reply($reply_id);
      $this->MNotification->delete_notification($reply_id);

      // 하위 대댓글 등을 가져온다.
      $child_replies = $this->MReply->get_child_reply($reply_id);

      // 하위 대댓글 셋을 삭제
      foreach($child_replies as $k=>$row) {
        $this->MReply->delete_reply($row['reply_id']);
        $this->MNotification->delete_notification($row['reply_id']);
      }

      //echo "<script>alert('삭제되었습니다..')</script>";
      redirect("Plan/detail/".$this->uri->segment(4).'/'.$this->uri->segment(5), "refresh");
    }else{
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect("javascript:history.back(-1);");
    }
  }
}
