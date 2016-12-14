<div class="col-md-12">
  <h3>There is a session here</h3>
  <h3>Welcome <?php echo $this->session->userdata('user_name')?>!</h3>
  <h6>You are logged in!</h6>
  <hr/>
  <h3>Your User ID is: <?php echo $_SESSION['user_id'] ?></h3>
  <h3>Your System Role is: <?php echo $_SESSION['user_level'] ?></h3>
  <h3>Your email is: <?php echo $_SESSION['user_email'] ?></h3>
  <h3>Your field is: <?php echo $_SESSION['user_field'] ?></h3>
  <?php echo anchor('Main/logout', 'LOGOUT');?>
</div>
