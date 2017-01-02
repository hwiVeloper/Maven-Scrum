<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.img-fluid {
  width:300px;
}

html, body {
  height: 100%;
  background-image: url("<?php echo base_url('assets/img/main_bg.jpg')?>");
  background-size: cover;
}

.centered {
  /*padding-top: 5em;*/
  /*padding-bottom: 5em;*/
}
.centered > .container {
}

@media (min-width: 1200px) {
  input, button {
    max-width:50%;
  }
}
</style>
<div class="outer" style="">
  <div class="inner">
    <!-- <div class="row"> -->
    <div class="centered">
      <!-- Container Start -->
      <div class="container">
        <div class="col-md-12">
          <!-- <img class="img-fluid" src="<?php echo base_url('assets/img/logo.gif');?>" style=""> -->
        </div>
        <h4 class="col-md-12" align="center" style="color:#fff">DAILY SCRUM</h4>
        <div class="col-md-12" align="center">
          <!-- Form Start -->
          <form class="" action="" method="post" style="margin-top:1.5em;" onsubmit="<?php echo base_url('Main') ?>">
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
            <!-- Remember me / Auto login -->
            <!-- <div class= "form-group">
              <div class="col-md-6" style="padding:0px;">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="remember_id" tabindex="3">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Remember ID</span>
                </label>
              </div>
              <div class="col-md-6" style="padding:0px;">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="auto_login" tabindex="4">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Auto Login</span>
                </label>
              </div>
            </div> -->
            <!-- Submit button -->
            <div class="form-group">
              <button type="submit" class="btn btn-primary" style="width:100%;" tabindex="5">Sign in</button>
            </div>
            <!-- Sign up button -->
            <!-- <div class="form-group">
              <button type="button" class="btn btn-secondary" style="width:100%;"
                onclick="location.href='<?php echo base_url("Signup");?>'" tabindex="6">Sign up</button>
            </div> -->
          </form>
          <!-- End Form -->
        </div>
      </div>
      <!-- Container End -->
    </div>
    <!-- </div> -->
  </div>
</div>
<script type="text/javascript">
  $(function() {
    $('.custom-select').change(function() {

    });
  });
</script>
