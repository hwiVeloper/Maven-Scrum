<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-lg-8 push-lg-2 pull-lg-2 col-md-12">
      <div class="" align="center">
        <!-- <img class="img-fluid" src="<?php echo base_url('assets/img/logo.gif');?>" align="middle"> -->
      </div>
      <h5 align="center">REGISTER</h5>
      <!-- Form Start -->
      <form class="" action="<?php echo base_url('Signup/register'); ?>" method="post" style="margin-top:1.5em;">
        <!-- I D -->
        <div class= "form-group">
          <label for="user_id">ID</label>
          <input class="form-control" type="text" id="user_id" name="user_id"
              placeholder="Input your ID" tabindex="1" required>
        </div>
        <!-- Password -->
        <div class= "form-group">
          <label for="user_password">Password</label>
          <input class="form-control" type="password" id="user_password" name="user_password"
              placeholder="Input your Password" tabindex="2" required>
        </div>
        <!-- Password confirm -->
        <div class= "form-group">
          <label for="user_password_confirm">Password confirm</label>
          <input class="form-control" type="password" id="user_password" name="user_password_confirm"
              placeholder="Password confirm" tabindex="3" required>
        </div>
        <!-- Name -->
        <div class= "form-group">
          <label for="user_name">Name</label>
          <input class="form-control" type="text" id="user_name" name="user_name"
              placeholder="Input your Name" tabindex="4" required>
        </div>
        <!-- Birth -->
        <div class= "form-group">
          <label for="user_birth">Birth</label>
          <input class="form-control" type="date" id="user_birth" name="user_birth"
              placeholder="Input your Birth" tabindex="5">
        </div>
        <!-- Email -->
        <div class= "form-group">
          <label for="user_email">Email</label>
          <input class="form-control" type="email" id="user_email" name="user_email"
              placeholder="Input your Email" tabindex="6">
        </div>
        <!-- Field -->
        <div class= "form-group">
          <label for="user_field">Field</label>
          <select class="custom-select form-control" name="user_field" tabindex="7">
            <option value="" selected>Select your field</option>
            <option value="Backend">Backend</option>
            <option value="Frontend">Frontend</option>
            <option value="Database">Database</option>
            <option value="DataScience">DataScience</option>
            <option value="Network">Network</option>
            <option value="Security">Security</option>
          </select>
        </div>
        <!-- S button -->
        <div class="form-group">
          <button type="submit" class="col-md-6 col-xs-12 btn btn-primary" tabindex="8">Register</button>
          <button type="submit" class="col-md-6 col-xs-12 btn btn-danger" tabindex="9"
            onclick="location.href='<?php echo base_url();?>'">Cancel</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>
</div>
