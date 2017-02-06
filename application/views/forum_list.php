<style media="screen">
  .forum-bottom {
    bottom:0;
    position:absolute;
    padding: 1em 0em;
  }

  .form-control {
    margin-bottom: 0.75em;
  }
</style>
<div class="container">
  <div class="col-md-8 col-xs-12" align="left">
    <h3>
      <?=substr($ym, 0, 4).'년 '.substr($ym, 4, 2).'월'?>&nbsp;
    </h3>
  </div>
  <div class="col-md-2 col-xs-12" align="right">
    <select class="form-control" name="forum_ym">
      <?php foreach ($ym_list as $k => $row): ?>
        <option value="<?=$row['forum_ym']?>"><?=$row['forum_seq'].'회'?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-2 col-xs-12">
    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#add">나눔주제 등록</button>
  </div>
  <?php foreach ($list as $k => $row): ?>
  <div class="col-md-6">
    <div class="card">
      <h4 class="card-header">
        <img class="card-img-top img-rounded" src="<?='assets/img/member/'.$row['user_img']?>" alt=""
          width="50px" height="50px">&nbsp;<?=$row['user_name']?>
      </h4>
      <div class="card-block">
        <h4 class="card-title"><?='['.$row['forum_type'].']'?>&nbsp;<?=$row['forum_title']?></h4>
        <p class="card-text"><?=$row['forum_content']?></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<!-- Genre Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">쟝르 추가</h4>
      </div>
      <form class="" action="" method="post">
        <div class="modal-body">
          <input type="hidden" name="forum_ym" value="<?=$ym?>">
          <input type="hidden" name="forum_writer" value="<?=$this->session->userdata('user_id')?>">
          <input class="form-control" type="text" name="forum_type" value="" placeholder="나눔 주제 종류 (시연, 강의, 소개, 스터디 등)">
          <input class="form-control" type="text" name="forum_title" value="" placeholder="나눔 주제 제목">
          <textarea class="form-control" name="forum_content" rows="15" cols="80" placeholder="상세 내용"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
          <button type="submit" class="btn btn-primary">등록하기</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
