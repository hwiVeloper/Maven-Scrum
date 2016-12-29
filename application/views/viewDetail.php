<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
  .row {
    margin-bottom: 3em;
  }
  .plan_detail_head {
    border-left: 4px solid #777;
    font-weight: bold;
  }
  .plan_detail_content {
    margin-left: 4px;
  }
</style>
<div class="row" style="">
  <!-- PLAN AREA -->
  <div class="col-md-6 col-sm-12">
    <h3>일정 상세보기</h3>
    <div class="card text-xs-left">
      <div class="card-block">
        <h4 class="card-title">
          <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$plans[0]['user_img']);?>" width="50px" height="50px">
          <strong>&nbsp;<?=$plans[0]['user_name']?></strong>
        </h4>
        <dt class="col-sm-3">작성일</dt>
        <dd class="col-sm-9"><?=$plan_date?></dd>
        <dt class="col-sm-3">할 일</dt>
        <?php
        foreach ($plans as $k=>$row) :
          if(1 == $row['plan_status']){
            $sts = '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
          }else{
            $sts = '<i class="fa fa-times" aria-hidden="true" style="color:red"></i>';
          }

          if($k == 0){
        ?>
        <dd class="col-sm-9"><?=$sts?> <?=$row['plan_content']?></dd>
        <?php
          }else{
        ?>
        <dd class="col-sm-9 offset-sm-3"><?=$sts?> <?=$row['plan_content']?></dd>
        <?php
          }
        ?>
        <?php
        endforeach;
        ?>
        <dt class="col-sm-3">코멘트</dt>
        <dd class="col-sm-9"><?=$comment?></dd>
        <p class="card-text" align="right"><small class="text-muted"><?=$creation_dttm?>에 작성</small></p>
      </div>
    </div>
  </div>
  <!-- END PLAN AREA -->
  <!-- REPLY AREA -->
  <div class="col-md-6 col-sm-12">
    <h3>댓글 <small class="text-muted"><?=$count_reply?> 개</small></h3>
    <div class="card text-xs-center">
      <div class="card-block">
        <div class="card card-outline-primary">
          <div class="card-block">
            <!-- WRITE REPLY AREA -->
            <form class="" action="<?php echo base_url('Reply/add'); ?>" method="post">
              <input type="hidden" name="user_id" value="<?=$user_id?>">
              <input type="hidden" name="write_user" value="<?=$this->session->userdata('user_id')?>">
              <input type="hidden" name="plan_date" value="<?=$plan_date?>">
              <textarea class="form-control" name="reply_comment" rows="2" placeholder="댓글을 남겨주세요." style="" required=""></textarea>
              <button type="submit" class="btn btn-primary" href="" style="margin-top:0.25em;width:100%;">댓글 등록</button>
            </form>
          </div>
        </div>
        <blockquote class="card-blockquote">
          <?php
          // reply count check and fetch replies(count > 0)
          if($count_reply == 0){
            echo "댓글이 없습니다.";
          }else {
            foreach ($replies as $k=>$row) :
          ?>
            <div class="card card-outline-danger text-xs-left">
              <div class="card-block">
                <h5>
                  <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$row['user_img']);?>" width="50px" height="50px">
                  <strong>&nbsp;<?=$row['user_name']?></strong>
                </h5>
                <p style="margin-top:1.0em"><?=$row['reply_comment']?></p>
                <p class="card-text">
                  <small class="text-muted"><?=$row['reply_timestamp']?></small>
                  <?php
                  if($this->session->userdata('user_id') == $row['write_user']){
                  ?>
                  <a class="btn btn-link" href="<?php echo base_url('Reply/delete/'.$row['reply_id'].'/'.$row['plan_date'].'/'.$row['user_id'])?>">삭제</a>
                  <?php
                  }
                  ?>
                </p>
              </div>
            </div>
          <?php
            endforeach;
          }
          ?>
        </blockquote>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-fixed-bottom navbar-light bg-faded" align="right">
    <?php
    if($user_id == $this->session->userdata('user_id')){
    ?>
    <a class="btn btn-primary" href="<?=base_url('Plan/myPlan/'.$plan_date)?>">내 일정관리</a>
    <?php
    }
    ?>
    <a class="btn btn-secondary" href="javascript:history.back(-1);">돌아가기</a>
  </nav>
</div>