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
  <link href="<?php echo base_url('assets/css/main_page.css') ?>" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo.gif')?>">
</head>
<body style="height:100%">
<?php
  $home_url = base_url();
  if($this->session->userdata('user_id')){
    $home_url = base_url('Home');
  }
?>

<div class="container-fluid">

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
              <button type="submit" class="main_login" tabindex="5">로그인</button>
            </div>
          </form>
    </div>

    <footer>
        <ul class="footer_menu">
            <li class="maven">ⓒ MAVEN</li>
            <li class="facebook"><a href="https://www.facebook.com/mismaven/?fref=ts" target="_blank">페이스북</a></li>
            <li class="github"><a href="#" target="_blank">깃허브</a></li>
            <li class="website"><a href="http://mismaven.kr/" target="_blank">공식페이지</a></li>
        </ul>
    </footer>
<script type="text/javascript">
  $(function() {
    $('.custom-select').change(function() {

    });
  });
</script>

</div>
</body>
</html>
