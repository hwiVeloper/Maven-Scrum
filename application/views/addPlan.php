<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
  var count = 0;
  $(function() {
    $("#addToDo").click(function() {
      count++;
      var h = "<div class='col-sm-2'></div>";
          h+= "<div class='col-sm-10'>";
          h+= "<input type='hidden' name='plan_detail_seq[]' value='"+count+"'>";
          h+= "<input type='text' class='form-control' name='plan_content[]' placeholder='할 일 "+(count+1)+"'>";
          h+= "</div>";

      var appendDiv = document.getElementById("append");
      var addedDiv = document.createElement("div");
          addedDiv.innerHTML = h;
          appendDiv.append(addedDiv);
    });
  });
</script>
<div class="container">
  <h3>일정 등록</h3>
  <!-- Form Start -->
  <form id="addForm" action="<?php echo base_url('Plan/add') ?>" class="" method="post" style="margin-top:1.5em;">
    <!-- Today date -->
    <div class="form-group row">
      <label for="plan_date" class="col-sm-2 col-form-label">날 짜</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="plan_date" value="<?php echo date('Y-m-d');?>" readonly>
      </div>
    </div>
    <!-- To do -->
    <div class="form-group row" id="append">
      <label for="plan_content[]" class="col-sm-2 col-form-label">오늘 할 일</label>
      <div class="col-sm-10">
        <input type="hidden" name="plan_detail_seq[]" value="0">
        <input type="text" class="form-control" name="plan_content[]" placeholder="할 일 1" required>
      </div>
    </div>
    <!-- Comment myself -->
    <div class="form-group row">
      <label for="plan_comment" class="col-sm-2 col-form-label">코멘트</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="plan_comment" rows="8" placeholder="나에게 한마디"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button id="addToDo" type="button" class="col-sm-6 col-xs-12 btn btn-secondary">할 일 추가</button>
        <button type="submit" class="col-sm-6 col-xs-12 btn btn-primary">등 록</button>
      </div>
    </div>
  </form>
  <!-- End Form -->
</div>
