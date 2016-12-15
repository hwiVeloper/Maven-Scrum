<style>
  th {
    width: 10%;
  }
  td {
    text-align: left;
    width: 75%;
  }
  td.check_status {
    width: 5%;
  }
  td.delete_button {
    width: 10%;
  }
</style>
<div class="container">
  <h3>나의 일정</h3>
  <table id="mobileTables" class="table" style="margin-top: 1em;">
    <tr>
      <th>날 짜</th>
      <td colspan="3"><?php echo $plans[0]['plan_date'] ?></td>
    </tr>
    <!-- To do Area -->
    <form id="modifyForm" action="<?php echo base_url('Plan/modify'); ?>" class="" method="post">
    <?php foreach ($plans as $k=>$row) : ?>
    <input type="hidden" name="plan_date" value="<?=$row['plan_date']?>">
    <input type="hidden" name="plan_detail_seq[]" value="<?=$row['plan_detail_seq']?>">
    <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
    <?php if(0 == $row['plan_status']) : ?>
    <tr class="table-danger">
    <?php else : ?>
    <tr class="table-success">
    <?php endif; ?>
      <th>할 일 <?php echo ($k+1); ?></th>
      <td>
        <input type="text" name="plan_content[]" value="<?php echo $row['plan_content']; ?>"
          class="form-control">
      </td>
      <!-- Check box Area -->
      <?php
        if($row['plan_status'] == 1){
          $check = "checked";
          $sts = "완료";
        }else {
          $check = "";
          $sts = "미완료";
        }
      ?>
      <td style="text-align:left;">
        <form class="" action="" method="post">
        <label class="custom-control custom-checkbox todoLabels">
          <input type="checkbox" class="custom-control-input todoCheckboxes" <?=$check?>>
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description sts"><?=$sts?></span>
        </label>
      </td>
      <td class="delete_button">
        <button type="button" name="submit" class="btn btn-danger">삭제</button>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr>
      <th>코멘트</th>
      <td>
        <textarea class="form-control" name="plan_comment" rows="8"><?php echo $comment[0]['plan_comment']?></textarea>
      </td>
    </tr>
    <!-- Button area -->
    <tr>
      <th></th>
      <td colspan="3">
        <button type="submit" name="submit" class="btn btn-primary">저장하기</button>
        <button type="button" name="button" class="btn btn-secondary">달력보기</button>
      </td>
    </tr>
    </form>
  </table>
</div>
<!-- JQuery Area -->
<script type="text/javascript">
  /* Checkbox change Event (each row color change) */
  $('.todoCheckboxes').click(function() {
    if($(this).is(':checked')) {
      $(this).closest('tr').removeClass('table-danger');
      $(this).closest('tr').addClass('table-success');
      $(this).siblings('.custom-control-description.sts').text('완료');
    }else{
      $(this).closest('tr').removeClass('table-success');
      $(this).closest('tr').addClass('table-danger');
      $(this).siblings('.custom-control-description.sts').text('미완료');
    }
  });
</script>
