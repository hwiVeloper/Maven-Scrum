<div class="container">
  <div class="alert alert-info" role="alert">
    여러분들의 반짝거리는 아이디어와 희망하는 개선점을 적어주세요.
  </div>
  <div class="card card-outline-primary text-xs-right">
    <div class="card-block">
      <!-- WRITE SUGGESTION AREA -->
      <form class="" action="<?php echo base_url('Suggestions/add'); ?>" method="post">
        <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>">
        <textarea class="form-control" name="suggestion_content" rows="4" placeholder="건의 내용" style="" required></textarea>
        <button type="submit" class="btn btn-primary" href="" style="margin-top:0.25em;">건의하기</button>
      </form>
    </div>
  </div>
  <div class="box">
      <div class="alert alert-danger" role="alert">
        미완료된 건의사항
      </div>
      <div class="alert alert-success" role="alert">
        완료된 건의사항
      </div>
  </div>
<?php
  foreach($suggestions as $k => $row) :
    if($row['suggestion_complete'] == 0){
      $complete_yn = "card-outline-danger";
    } else {
      $complete_yn = "card-outline-success";
    }
?>
  <!-- VIEW SUGGESTIONS AREA -->
  <div class="card <?=$complete_yn?> text-xs-left">
    <div class="card-block">
      <h5>
        <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$row['user_img']);?>" width="50px" height="50px">
        <strong>&nbsp;<?=$row['user_name']?></strong>
      </h5>
      <p style="margin-top:1.0em"><?=$row['suggestion_content']?></p>
      <p class="card-text">
        <small class="text-muted"><?=$row['suggestion_timestamp']?></small>
        <br><br>
<?php if($row['suggestion_complete_user_id'] != '') : ?>
        <i class="fa fa-thumbs-o-up" aria-hidden="true" style="color:green"></i>
        <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$row['dev_img']);?>" width="35px" height="35px">
        <small class="text-muted"><?=$row['suggestion_comment']?></small>
<?php endif; ?>
        <?php
        if($this->session->userdata('user_id') == $row['user_id']){
        ?>
        <a class="btn btn-link" href="<?php echo base_url('Suggestions/delete/'.$row['suggestion_id'])?>">삭제</a>
        <?php
        }
        ?>
      </p>
    </div>
  </div>
<?php
  endforeach;
?>
</div>
