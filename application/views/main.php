<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
  .img-fluid {
    max-width: 70%;
  }
</style>
<div class="row">
<div class="centered">
  <div class="" align="center">
    <!-- <img class="img-fluid" src="<?php echo base_url('assets/img/logo.gif');?>" align="middle"> -->
  </div>
  <h5 align="center">DAILY SCRUM</h5>
  <!-- Form Start -->
  <form class="" action="" method="post" style="margin-top:1.5em;" onsubmit="<?php echo base_url('Main') ?>">
    <!-- I D -->
    <div class= "form-group">
      <label for="user_id">ID</label>
      <input class="form-control" type="text" id="user_id" name="user_id"
          placeholder="Input your ID" tabindex="1" autofocus>
    </div>
    <!-- Password -->
    <div class= "form-group">
      <label for="user_password">Password</label>
      <input class="form-control" type="password" id="user_password" name="user_password"
          placeholder="Input your Password" tabindex="2">
    </div>
    <!-- Submit button -->
    <div class="form-group">
      <button type="submit" class="btn btn-primary" style="width:100%;" tabindex="3">Sign in</button>
    </div>
    <!-- S button -->
    <div class="form-group">
      <button type="button" class="btn btn-secondary" style="width:100%;"
        onclick="location.href='<?php echo base_url("Signup");?>'" tabindex="4">Sign up</button>
    </div>
  </form>
  <!-- End Form -->
</div>
</div>
