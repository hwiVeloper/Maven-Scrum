<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>


@import url(http://fonts.googleapis.com/earlyaccess/jejuhallasan.css);

.layer{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%, -50%)
}
.main_title {
    font-family: 'Jeju Hallasan', serif !important;
    font-size: 0.8rem !important;
    text-align: right;
    padding: 0 0 10px 80px;
}
</style>
    <div class="layer">
        <h4 class="main_title">지금 MAVEN DAILY SCRUM을 시작하세요!</h4>
        <!-- Form Start -->
        <form action="" method="post" onsubmit="<?php echo base_url('Main') ?>">
            <!-- I D -->
            <div class= "form-group">
              <input class="form-control" type="text" id="user_id" name="user_id"
                  placeholder="ID" tabindex="1" autofocus>
            </div>
            <!-- Password -->
            <div class= "form-group">
              <input class="form-control" type="password" id="user_password" name="user_password"
                  placeholder="Password" tabindex="2">
            </div>
            <!-- Submit button -->
            <div class="form-group">
              <button type="submit" class="btn btn-primary" style="width:100%;" tabindex="5">로그인</button>
            </div>
          </form>
    </div>
<script type="text/javascript">
  $(function() {
    $('.custom-select').change(function() {

    });
  });
</script>
