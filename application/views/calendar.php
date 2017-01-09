<style>
  th {
    text-align: center;
  }
  .table td {
    padding-top: 2em;
    padding-bottom: 2em;
    vertical-align: middle;
  }
  .table th {
    padding-top: 2em;
    padding-bottom: 2em;
    border-top-width: 0px;
    vertical-align: middle;
  }

  td.comment {
    vertical-align: middle;
    padding-left: 0.75em;
  }
  td.content {
    padding-left: 0.75em;
  }
  td.todo {
    text-align: center;
  }
</style>

<!-- SIMPLE INFORMATION -->
<div class="row" style="margin-bottom:1em;">
<!-- ATTENDANCE : <?=$month_info->is_content_days?><br> -->
<!-- TOTAL : <?=$month_info->current_days?><br> -->
<!-- PERCENTAGE : <?=round($month_info->percentage, 2).' %'?> -->
</div>

<!-- TAB AREA -->
<ul class="nav nav-tabs" role="tablist" id="calTabs">
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#calendar" role="tab">
      <i class="fa fa-calendar" aria-hidden="true"></i> CALENDAR STYLE
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#list" role="tab">
      <i class="fa fa-list" aria-hidden="true"></i> LIST STYLE
    </a>
  </li>
</ul>

<!-- TAB CONTENTS -->
<div class="tab-content">
  <div class="tab-pane fade active" id="calendar" role="tabpanel">
    <!-- VIEW CALENDAR -->
    <?=$cal_view?>
  </div>
  <div class="tab-pane fade" id="list" role="tabpanel">
    <div class="" style="margin-top:1em;"></div>
    <!-- VIEW LIST OF THIS MONTH -->
    <table id="" class="table table-bordered table-sm">
      <tr>
        <th>날짜</th>
        <th>순번</th>
        <th>내용</th>
        <th>상태</th>
        <th>코멘트</th>
      </tr>
<?php foreach($list_view as $k => $row) : ?>
      <tr>
<?php if($row['plan_detail_seq'] == 0) : ?>
        <th rowspan="<?=$row['each_count']?>">
          <?=$row['plan_date_for_table']?><br/>
          <a class="btn btn-secondary" href="<?=base_url('Plan/myPlan/'.$row['plan_date_for_table'])?>">관리</a>
        </th>
<?php endif; ?>
        <td class="todo">할일 <?=$row['plan_detail_seq']+1?></td>
        <td class="content"><?=$row['plan_content']?></td>
<?php
      if($row['plan_status'] == 0) {
        $class = 'bg-danger';
      }else {
        $class = 'bg-success';
      }
?>
        <td class="<?=$class?>" align="center" style="color:#fff"><?=$row['plan_status_display']?></td>
<?php if($row['plan_detail_seq'] == 0) : ?>
        <td class="comment" rowspan="<?=$row['each_count']?>"><?=$row['plan_comment']?></td>
<?php endif; ?>
      </tr>
<?php endforeach; ?>
    </table>
  </div>
</div>

<script type="text/javascript">
$(".is-content").parent("td").addClass("bg-success");
$(".is-content").parent("td").click(function() {
  $(this).find("a.is-content").get(0).click();
});

$(function () {
    $('#calTabs a:first').tab('show')
  })
</script>
