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
<?php
$date = strtotime($open.' -6 day');
$close_date = date('Y-m-d', $date);
?>
<div class="container">
  <div class="col-md-8 col-xs-12" align="left">
    <h3>
      <?=substr($ym, 0, 4).'년 '.substr($ym, 4, 2).'월'?>&nbsp;
    </h3>
  </div>
  <div class="col-md-2 col-xs-12" align="right">
    <form class="" action="<?=base_url('Forum/')?>" method="post">
      <select class="form-control" name="forum_ym" onchange="this.form.submit()">
        <?php foreach ($ym_list as $k => $row): ?>
          <option value="<?=$row['forum_ym']?>" <?=substr($row['forum_ym'], 4, 2) == substr($ym, 4, 2) ? "selected" : ""?>><?=$row['forum_seq'].'회'?></option>
        <?php endforeach; ?>
      </select>
    </form>
  </div>
  <div class="col-md-2 col-xs-12">
    <?php if ($close_date > date('Y-m-d')): ?>
      <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#add">나눔주제 등록</button>
    <?php endif; ?>
  </div>
  <!-- SUBJECT AREA -->
  <div class="col-md-12 col-xs-12">
    <ul class="timeline" style="padding-top:6em;">
      <?php foreach ($list as $k => $row): ?>
        <li <?=$k % 2 == 0 ? "" : 'class="timeline-inverted"'?>>
          <div class="timeline-badge" style="background-color: transparent"><img src="<?=base_url('assets/img/member/'.$row['user_img'])?>" alt="" class="img-rounded"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title"><?='['.$row['forum_type'].']'?>&nbsp;<?=$row['forum_title']?></h4>
              <p>
                <form class="" action="<?=base_url('Forum/remove')?>" method="post" onsubmit="return confirm('삭제하시겠습니까?');">
                  <small class="text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?=substr($row['forum_dttm'], 0, 11)?></small>
                  <?php if ($this->session->userdata('user_id') == $row['forum_writer']): ?>
                    <button type="button" data-toggle="modal" data-target="#modify"
                      data-ym="<?=$row['forum_ym']?>"
                      data-title="<?=$row['forum_title']?>"
                      data-user="<?=$row['forum_writer']?>"
                      data-type="<?=$row['forum_type']?>"
                      data-content="<?=str_replace('<br />', '', $row['forum_content'])?>">수정</button>

                    <input type="hidden" name="forum_ym" value="<?=$row['forum_ym']?>">
                    <input type="hidden" name="forum_writer" value="<?=$row['forum_writer']?>">
                    <button type="submit">삭제</button>
                  <?php endif; ?>
                </form>
              </p>
            </div>
            <div class="timeline-body">
              <p style="text-align:justify"><?=$row['forum_content']?></p>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<!-- Forum Add Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">나눔 주제 등록</h4>
      </div>
      <form class="" action="<?=base_url('Forum/add')?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="forum_ym" value="<?=$ym?>">
          <input type="hidden" name="forum_writer" value="<?=$this->session->userdata('user_id')?>">
          <input class="form-control" type="text" name="forum_type" value="" placeholder="나눔 주제 종류 (시연, 강의, 소개, 스터디 등)">
          <input class="form-control" type="text" name="forum_title" value="" placeholder="나눔 주제 제목">
          <textarea class="form-control" name="forum_content" rows="15" placeholder="상세 내용" style="height: 150px;"></textarea>
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

<!-- Forum Modify Modal -->
<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">나눔 주제 수정</h4>
      </div>
      <form class="" action="<?=base_url('Forum/modify')?>" method="post">
        <div class="modal-body">
          <input id="modYm" type="hidden" name="forum_ym" value="<?=$ym?>">
          <input id="modUser" type="hidden" name="forum_writer" value="<?=$this->session->userdata('user_id')?>">
          <input id="modType" class="form-control" type="text" name="forum_type" value="" placeholder="나눔 주제 종류 (시연, 강의, 소개, 스터디 등)">
          <input id="modTitle" class="form-control" type="text" name="forum_title" value="" placeholder="나눔 주제 제목">
          <textarea id="modContent" class="form-control" name="forum_content" rows="15" placeholder="상세 내용" style="height: 150px;"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
          <button type="submit" class="btn btn-primary">수정</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
  $('#modify').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var ym = button.data('ym');
    var title = button.data('title');
    var user = button.data('user');
    var content = button.data('content');
    var type = button.data('type');

    var modal = $(this);

    modal.find('#modYm').val(ym);
    modal.find('#modTitle').val(title);
    modal.find('#modUser').val(user);
    modal.find('#modType').val(type);
    modal.find('#modContent').html(content);
  });
</script>
