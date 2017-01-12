<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
  p.card-content, .text-muted-comment {
    display: -webkit-box;
    overflow : hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
  }
  .card-text i {
      color :#7495C6;
  }
  .plan-card {
    height: 350px;
  }

  #select_date{
    padding: 0 5px;
  }

  @media(max-width:572px){
    #select_date{
      padding: 0;
    }
  }
  .dsh_user {
      margin-top : 0.5rem;
      margin-bottom: 0;
      color: #d9534f;
  }
  .dsh_user i {
      font-size: 25px;
  }
  .dsh_ct {
      position: relative;
      top: -5px;
      font-style: italic;
      padding-left: 5px;
  }
  .card-block.text-xs-right {
      padding-top: 1.25rem;
      border-top: 1px solid #ddd;
      font-size: 15px;
      color: #7495c6;
  }
  .text-muted.text-muted-comment {
      padding-bottom: 5px;
  }

  .card {
      transition: 0.22s ease-in-out;
      -ms-user-select: none;
      -moz-user-select: -moz-none;
      -khtml-user-select: none;
      -webkit-user-select: none;
      user-select: none;
  }
  .card:hover {
      border: 5px solid #7495c6;
      transition: 0.22s ease-in-out;
  }
</style>
<!-- SPACE -->
<div style="margin-top:1rem"></div>

<!-- COUNT PLAN BY MEMBERS & MOVE OTHER DATE -->
<div class="row" style="margin: 0.25em 0;">
  <div class="col-lg-2 col-md-4 col-sm-6" role="alert">
    <p class="dsh_user"><i class="fa fa-id-badge" aria-hidden="true"></i><strong class="dsh_ct"> 작성인원 : <?=$today_count?></strong></p>
  </div>
  <div id="select_date" class="form-group col-lg-10 col-md-8 col-sm-6" role="alert">
    <form class="form-inline" action="<?php echo base_url('Dashboard')?>" method="post">
      <div class="col-md-4 col-sm-3 col-xs-12">
        <!-- blank -->
      </div>
      <div class="col-md-6 col-sm-7 col-xs-12" align="right">
        <button type="button" class="btn btn-secondary hidden-md-down" style="width:3em;height:3em;" onclick="window.location.href='<?=base_url('Dashboard')?>/<?=date("Y-m-d", strtotime($input_date." yesterday"))?>'">
          <i class="fa fa-angle-left"  aria-hidden="true"></i>
        </button>
        <input id="dashboardDate" class="form-control" style="height:3em;" type="date" name="plan_date" value="<?=$input_date?>" height="100%"/>
        <button type="button" class="btn btn-secondary hidden-md-down" style="width:3em;height:3em;" onclick="window.location.href='<?=base_url('Dashboard')?>/<?=date("Y-m-d", strtotime($input_date." tomorrow"))?>'">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
        </button>
      </div>
      <div class="col-md-2 col-sm-3 col-xs-12">
        <button class="btn btn-primary btn-block" style="height:3em;" type="submit" name="button">조회</button>
      </div>
      <!-- 공지 올리기 버튼 자리 -->
      <!-- <div class="col-md-2 col-sm-2 col-xs-12">
        <button class="btn btn-secondary btn-block" style="height:3em;" type="submit" name="button">공지 올리기</button>
      </div> -->
    </form>
  </div>
</div>

<!-- SPACE -->
<div style="margin-top:0.1rem"></div>

<!-- CARD AREA -->
<div class="row">
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
        <div class="" style="float:left;padding-top:0.7rem">
          <i class="fa fa-commenting" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i><?=$row['reply_count']?>
        </div>
        <?php
        $view_more = base_url('Plan/detail/'.$row['plan_date'].'/'.$row['user_id']);
        ?>
        <a href="<?=$view_more?>" class="btn btn-primary">더보기</a>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
  <?php endforeach; ?>
</div>
<script type="text/javascript">
  // script
</script>