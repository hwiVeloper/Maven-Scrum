<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
  p.card-content {
    display: -webkit-box;
    overflow : hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
  }
  #select_date{
    padding: 0 5px;
  }

  @media(max-width:572px){
    #select_date{
      padding: 0;
    }
  }
</style>
<h3>Dashboard</h3>

<!-- SPACE -->
<div style="margin-top:1rem"></div>

<!-- COUNT PLAN BY MEMBERS & MOVE OTHER DATE -->
<div class="row" style="margin: 0.25em 0;">
  <div class="alert alert-success col-lg-9 col-md-8 col-sm-6" role="alert">
    <strong>작성인원</strong> : <?=$today_count?>
  </div>
  <div id="select_date" class="form-group col-lg-3 col-md-4 col-sm-6" role="alert">
    <form class="form-inline" action="<?php echo base_url('Dashboard')?>" method="post">
      <div class="col-md-8 col-sm-8 col-xs-12">
          <input id="dashboardDate" class="form-control" style="height:3em;width:100%;" type="date" name="plan_date" value="<?=$input_date?>" height="100%"/>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <button class="btn btn-primary btn-block" style="height:3em;" type="submit" name="button">조회</button>
      </div>

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
      $sts = '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
    }else{
      $sts = '<i class="fa fa-times" aria-hidden="true" style="color:red"></i>';
    }
  ?>
  <?php
  if(0 == $row['plan_detail_seq']) {
  ?>
  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
    <div class="card">
      <h4 class="card-header">
        <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$row['user_img']);?>" width="50px" height="50px">
        <strong>&nbsp;<?=$row['user_name']?></strong>
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
          <small class="text-muted">
          <?=$row['plan_comment']?><br>
          <?=$row['plan_creation_dttm']?>
          </small>
        </p>
      </div>
      <div class="card-block text-xs-right" style="padding-top:0;">
        <div class="" style="float:left;padding-top:0.25rem">
          <i class="fa fa-comments-o" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i><?=$row['reply_count']?>
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

</script>
