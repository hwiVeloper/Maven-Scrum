<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-lg-8 push-lg-2 pull-lg-2 col-md-12" style="margin-top:2em;">
      <h3 align="center">내 정보</h3>
      <!-- Form Start -->
      <form class="" action="<?php echo base_url('User/modify')?>" onsubmit="return check_password()" method="post"
        style="margin-top:1.5em;" id="user_form">
        <!-- I D -->
        <div class= "form-group">
          <label for="user_id">ID</label>
          <input class="form-control" type="text" placeholder="" value="<?=$user->user_id?>" disabled>
        </div>
        <!-- Password -->
        <div class= "form-group">
          <label for="user_password">비밀번호</label>
          <input class="form-control" type="password" id="user_password" name="user_password"
              placeholder="바꾸고 싶다면, 입력해주세요." tabindex="2">
        </div>
        <!-- Password confirm -->
        <div class= "form-group">
          <label for="user_password_confirm">비밀번호 확인</label>
          <input class="form-control" type="password" id="user_password_confirm" name="user_password_confirm"
              placeholder="비밀번호 확인" tabindex="3">
        </div>
        <!-- Name -->
        <div class= "form-group">
          <label for="user_name">Name</label>
          <input class="form-control" type="text" id="user_name" name="user_name"
              placeholder="이름을 입력해 주세요." tabindex="4" value="<?=$user->user_name?>" required>
        </div>
        <!-- Birth -->
        <div class= "form-group">
          <label for="user_birth">Birth</label>
          <input class="form-control" type="date" id="user_birth" name="user_birth"
              placeholder="생일을 입력해 주세요." value="<?=$user->user_birth?>" tabindex="5">
        </div>
        <!-- Email -->
        <div class= "form-group">
          <label for="user_email">Email</label>
          <input class="form-control" type="email" id="user_email" name="user_email"
              placeholder="Input your Email" value="<?=$user->user_email?>" tabindex="6">
        </div>
        <!-- Field -->
        <?php
        $null_value  = "";
        $backend     = "";
        $frontend    = "";
        $database    = "";
        $datascience = "";
        $network     = "";
        $security    = "";
        switch($user->user_field){
          case ""           : $null_value  = "selected"; break;
          case "Backend"    : $backend     = "selected"; break;
          case "Frontend"   : $frontend    = "selected"; break;
          case "Database"   : $database    = "selected"; break;
          case "DataScience": $datascience = "selected"; break;
          case "Network"    : $network     = "selected"; break;
          case "Security"   : $security    = "selected"; break;
        }
        ?>
        <div class= "form-group">
          <label for="user_field">Field</label>
          <select class="custom-select form-control" name="user_field" tabindex="7">
            <option <?=$null_value?>value="">Select your field</option>
            <option <?=$backend?>     value="Backend">Backend</option>
            <option <?=$frontend?>    value="Frontend">Frontend</option>
            <option <?=$database?>    value="Database">Database</option>
            <option <?=$datascience?> value="DataScience">DataScience</option>
            <option <?=$network?>     value="Network">Network</option>
            <option <?=$security?>    value="Security">Security</option>
          </select>
        </div>
        <!-- S button -->
        <div class="form-group">
          <button type="submit" class="col-md-6 col-xs-12 btn btn-primary" tabindex="8">저장</button>
          <a class="col-md-6 col-xs-12 btn btn-secondary" tabindex="9" href="javascript:history.back();">뒤로가기</a>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>
</div>
<script type="text/javascript">
  function check_password() {
    var error_message = "비밀번호 입력을 확인해 주세요."
    var p1 = document.forms["user_form"]["user_password"].value;
    var p2 = document.forms["user_form"]["user_password_confirm"].value;
    if (p1 == "" && p2 == "") {
      return true;
    }else if(p1 != "" && p2 != "") {
      if(p1 != p2){
        alert(error_message);
        return false;
      }else{
        return true;
      }
    }else {
      alert(error_message);
      return false;
    }
  }
</script>
