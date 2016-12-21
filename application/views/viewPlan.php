<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
  <form id="modifyForm" action="<?php echo base_url('Plan/modify'); ?>" class="" method="post">
  <table id="mobileTables" class="table" style="margin-top: 1em;">
    <tbody id="append">
      <tr>
        <th>날 짜</th>
        <td colspan="3"><?php echo $plans[0]['plan_date'] ?></td>
      </tr>
      <!-- To do Area -->
      <?php foreach ($plans as $k=>$row) : ?>
      <?php
      $base_date = $row['plan_date'];
      $base_user = $row['user_id'];
      $base_seq  = $row['plan_detail_seq']+1;
      ?>
      <input type="hidden" name="plan_date" value="<?=$row['plan_date']?>">
      <input type="hidden" name="plan_detail_seq[]" value="<?=$row['plan_detail_seq']?>">
      <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
      <input type="hidden" name="row_status[]" value="R">
      <?php if(0 == $row['plan_status']) : ?>
      <tr class="">
      <?php else : ?>
      <tr class="bg-success">
      <?php endif; ?>
        <th style="vertical-align:middle;">할 일 <?php echo ($k+1); ?></th>
        <td>
          <input type="text" name="plan_content[]" value="<?php echo $row['plan_content']; ?>"
            class="form-control">
        </td>
        <!-- Check box Area -->
        <?php
          if($row['plan_status'] == 1){
            $complete = "selected";
            $not_completed = "";
          }else {
            $complete = "";
            $not_completed = "selected";
          }
        ?>
        <td style="text-align:left;vertical-align:middle" class="plan_status">
          <select class="custom-select" name="plan_status[]">
            <option value="0" <?=$not_completed?>>미완료</option>
            <option value="1" <?=$complete?>>완료</option>
          </select>
        </td>
        <td class="delete_button">
          <button type="button" name="" class="btn btn-danger" onclick="return confirm_delete('<?=$row["plan_date"]?>', <?=$row['plan_detail_seq']?>);">삭제</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
    <tr>
      <th>코멘트</th>
      <td>
        <textarea class="form-control" name="plan_comment" rows="8"><?php echo $comment ?></textarea>
      </td>
      <td colspan="2"></td>
    </tr>
    <!-- Button area -->
    <tr>
      <th></th>
      <td align="center">
        <button type="submit" name="submit" class="col-md-4 col-sm-12 col-xs-12 btn btn-primary">저장하기</button>
        <button id="addToDo" type="button" class="col-md-4 col-sm-12 col-xs-12 btn btn-secondary">할 일 추가</button>
        <button type="button" name="" class="col-md-4 col-sm-12 col-xs-12 btn btn-secondary">달력보기</button>
      </td>
      <td colspan="2"></td>
    </tr>
  </table>
  </form>
</div>
<!-- JQuery Area -->
<script type="text/javascript">

  /* Checkbox change Event (each row color change) */
  $('.custom-select').change(function() {
    if($(this).find('option:selected').attr('value') == '1') {
      $(this).closest('tr').addClass('bg-success');
    }else{
      $(this).closest('tr').removeClass('bg-success');
    }
  });

  /* Confirm delete button */
  function confirm_delete(date, seq) {
    if(confirm("Are U sure to delete?")){
      location.href = "http://scrum.mismaven.kr/Plan/remove/"+date+"/"+seq;
    }else{
      return false;
    }
  }

  /* Add To-do List*/
  $(function() {
    $("#addToDo").click(function() {
      // append things
      var h =  '<input type="hidden" name="plan_date" value="<?=$base_date?>">';
          h += '<input type="hidden" name="plan_detail_seq[]" value="N">';
          h += '<input type="hidden" name="user_id" value="<?=$base_user?>">';
          h += '<input type="hidden" name="row_status[]" value="C">';
          h += '<tr class="">';
          h += '  <th style="vertical-align:middle;">할 일(+)</th>';
          h += '  <td>';
          h += '    <input type="text" name="plan_content[]" value="" class="form-control">';
          h += '  </td>';
          h += '  <td style="text-align:left;vertical-align:middle" class="plan_status">';
          h += '    <select class="custom-select" name="plan_status[]">';
          h += '      <option value="0" selected>미완료</option>';
          h += '      <option value="1">완료</option>';
          h += '    </select>';
          h += '  </td>';
          h += '  <td class="delete_button">';
          h += '  </td>';
          h += '</tr>';
      var appendTr = document.getElementById("append"); //tbody
      var addedTr = document.createElement("tr");
          addedTr.innerHTML = h;
          appendTr.append(addedTr);
    });
  });
</script>
