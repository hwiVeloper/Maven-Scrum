<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
// $(document).ready(function(){
//   setInterval(function() {
//     $("#plans").load("<?=base_url('Dashboard/'.$this->uri->segment(2))?> #plans");
//     trophy_apply();
//   }, 1000);
// });
</script>

<!-- COUNT PLAN BY MEMBERS & MOVE OTHER DATE -->
<div class="row dsh_mobile">
  <div class="col-lg-2 col-md-4 col-sm-6" role="alert">
    <p class="dsh_user"><i class="fa fa-id-badge" aria-hidden="true"></i><strong class="dsh_ct"> 작성인원 : <?=$today_count?></strong></p>
  </div>
  <div id="select_date" class="form-group col-lg-10 col-md-8 col-sm-6" role="alert">
    <form class="form-inline" action="<?php echo base_url('Dashboard')?>" method="post">
      <div class="col-md-4 col-sm-3 col-xs-12">
        <!-- blank -->
      </div>
      <div class="col-md-6 col-sm-7 col-xs-8 dsb_search1" align="right">
        <button type="button" class="btn btn-secondary hidden-md-down" onclick="window.location.href='<?=base_url('Dashboard')?>/<?=date("Y-m-d", strtotime($input_date." yesterday"))?>'">
          <i class="fa fa-angle-left"  aria-hidden="true"></i>
        </button>
        <input id="dashboardDate" class="form-control" type="date" name="plan_date" value="<?=$input_date?>" height="100%"/>
        <button type="button" class="btn btn-secondary hidden-md-down" onclick="window.location.href='<?=base_url('Dashboard')?>/<?=date("Y-m-d", strtotime($input_date." tomorrow"))?>'">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
        </button>
      </div>
      <div class="col-md-2 col-sm-3 col-xs-4 dsb_search2">
        <button class="btn btn-primary btn-block" type="submit" name="button">조회</button>
      </div>
      <!-- 공지 올리기 버튼 자리 -->
      <!-- <div class="col-md-2 col-sm-2 col-xs-12">
        <button class="btn btn-secondary btn-block" style="height:3em;" type="submit" name="button">공지 올리기</button>
      </div> -->
    </form>
  </div>
</div>

<!-- CARD AREA -->
<div id="plans" class="row">
  <?php
  foreach ($today_plans as $k=>$row) :
    if(1 == $row['plan_status']){
      $sts = '<i class="fa fa-check" aria-hidden="true" style="color:#425f4b"></i>';
    }else{
      $sts = '<i class="fa fa-times" aria-hidden="true" style="color:#d9534f"></i>';
    }
  ?>
  <?php
  if(0 == $row['plan_detail_seq']) {
  ?>
  <div class="plan-card col-lg-3 col-md-6 col-sm-12 col-xs-12">
    <div class="trophy">
    </div>
    <div class="card">
      <h4 class="card-header">
        <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$row['user_img']);?>" width="50px" height="50px">
        &nbsp;<?=$row['user_name']?>
      </h4>
      <div class="card-block">
        <p class="card-text card-content"><?=$sts." "?><?=$row['plan_content']?></p>
  <?php
  }else {
  ?>
        <p class="card-text card-content"><?=$sts." "?><?=$row['plan_content']?></p>
  <?php
  }
  // card footer
  if(2 == $row['plan_detail_seq'] || $row['each_count'] == $row['plan_detail_seq'] + 1) {
    if(1 == $row['each_count']){
      echo '<p class="card-text"><i class="fa fa-minus" aria-hidden="true"></i></p>';
      echo '<p class="card-text"><i class="fa fa-minus" aria-hidden="true"></i></p>';
    }
    if(2 == $row['each_count']){
      echo '<p class="card-text"><i class="fa fa-minus" aria-hidden="true"></i></p>';
    }
  ?>
        <p class="card-text">
          <small class="text-muted text-muted-comment">
          <?=$row['plan_comment']?><br>
          </small>
          <small class="text-muted">
          <?=$row['plan_creation_dttm']?>
          </small>
        </p>
      </div>
      <div class="card-block text-xs-right">
        <div class="cb_comment">
          <i class="fa fa-commenting" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i><?=$row['reply_count']?>
        </div>
        <?php
        $view_more = base_url('Plan/detail/'.$row['plan_date'].'/'.$row['user_id']);
        ?>
        <a href="<?=$view_more?>" class="biliboard">더보기 <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
  <?php endforeach; ?>
</div>
