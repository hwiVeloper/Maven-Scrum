<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
  /* Menu Highlights Option by Uri */
  $uri_segment = $this->uri->segment(1);

  // menus
  $menu_home = "";
  $menu_dashboard = "";
  $menu_calendar = "";
  $menu_plan = "";
  $menu_suggestion = "";

  switch($uri_segment){
    case "Home": case "Main":
      $menu_home = "active";
      break;
    case "Dashboard":
      $menu_dashboard = "active";
      break;
    case "Calendar":
      $menu_calendar = "active";
      break;
    case "Plan":
      $menu_plan = "active";
      break;
    case "Suggestions":
      $menu_suggestion = "active";
      break;
    default:
      $menu_home = "active";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Meta Informations -->
  <meta http-equiv="Content-Type" context="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

  <!-- Title -->
  <title>MAVEN DAILY SCRUM</title>

  <!-- Javascript Libraries -->
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

  <!-- CSS Libraries -->
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo.gif')?>">

  <!-- Custom Style -->
  <style type="text/css">
    .img-rounded {
      border: 0px;
      border-radius: 50%;
      -webkit-transition: all .2s ease-in-out;
      -o-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      max-width: 100%;
      height: auto;
    }

    #user-menu {
      margin-bottom: 0em;
    }
  </style>
</head>
<body style="height:100%">
<div class="container-fluid" style="margin-top:4rem">
  <div style="margin-top:4.5em"></div>
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
