<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h3>Dashboard</h3>

<!-- SPACE -->
<div style="margin-top:1rem"></div>

<!-- COUNT PLAN BY MEMBERS & MOVE OTHER DATE -->
<div class="row">
  <div class="alert alert-success col-lg-9 col-md-8 col-sm-6" role="alert">
    <strong>작성인원</strong> : <?=$today_count?>
  </div>
  <div class="form-group col-lg-3 col-md-4 col-sm-6" role="alert">
    <form class="" action="" method="post">
      <input class="form-control" style="margin-top: 0.25rem;" type="date" name="plan_date" value="<?=date('Y-m-d')?>" />
    </form>
  </div>
</div>

<!-- SPACE -->
<div style="margin-top:1rem"></div>

<!-- CARD AREA -->
<div class="row">
  <?php foreach ($today_plans as $k=>$row) : ?>
  <?php
  if(0 == $row['plan_detail_seq']) {
  ?>
  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
    <div class="card">
      <h4 class="card-header">
        <img class="img-thumbnail" src="<?php echo base_url('assets/img/member/'.$row['user_img']);?>" width="50px" height="50px">
        <strong>&nbsp;<?=$row['user_name']?></strong>
      </h4>
      <div class="card-block">
        <p class="card-text"><?=$row['plan_content']?></p>
  <?php
  }else {
  ?>
        <p class="card-text"><?=$row['plan_content']?></p>
  <?php
  }

  // card footer
  if(2 == $row['plan_detail_seq'] || $row['each_count'] == $row['plan_detail_seq'] + 1) {
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
          (댓글수 들어갈 부분)
        </div>
        <a href="#" class="btn btn-primary">더보기</a>
      </div>
    </div>
  </div>
  <?php
  }
  ?>
  <?php endforeach; ?>
</div>
