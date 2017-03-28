<?php
  /* Menu Highlights Option by Uri */
  $uri_segment = $this->uri->segment(1);

  // menus
  $menu_home       = "";
  $menu_dashboard  = "";
  $menu_calendar   = "";
  $menu_plan       = "";
  $menu_suggestion = "";
  $menu_statistics = "";
  $menu_forum      = "";

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
    case "Statistics":
      $menu_statistics = "active";
      break;
    case "Forum":
      $menu_forum = "active";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <!-- Title -->
  <title>MAVEN SCRUM | <?=$this->uri->segment(1)?></title>

  <!-- Javascript Libraries -->
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

  <!-- CSS Libraries -->
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo base_url('assets/img/maven.png')?>">

  <!-- Custom Style -->
  <link href="<?php echo base_url('assets/css/scrum_custom_style.css') ?>" rel="stylesheet">

  <!-- highcharts cdn -->
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>

</head>
<body>
<?php
  $home_url = base_url();
  if($this->session->userdata('user_id')){
    $home_url = base_url('Home');
  }
?>
<!-- NAVBAR (FIXED-TOP) -->
<div class="container-fluid">
  <nav class="navbar navbar-fixed-top navbar-dark bg-inverse" role="navigation">
      <div id="nav-icon2" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    <a class="navbar-brand-mobile" href="<?=$home_url?>">
      <img src="<?php echo base_url('assets/img/logo.png');?>" alt="" width="88px" height="45px"/>
    </a>
    <!-- User Account Information -->
    <ul class="nav navbar-nav float-xs-right">
      <li class="nav-item">
<?php
        if($this->session->userdata('user_id')) {
?>
        <div class="dropdown">
          <a class="dropdown-toggle nav-link" href="#">
            <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$this->session->userdata('user_img'));?>" width="30em" height="30em">
            <span class="hidden-xs-down">&nbsp;<?=$this->session->userdata('user_name')?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" style="width: 350px">
            <div class="col-md-4 col-xs-4">
              <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$this->session->userdata('user_img'));?>" width="70em" height="70em">
            </div>
            <div class="col-md-8 col-xs-8" style="padding-left:0px;padding-top:5px;">
              <p class="text-left"><strong><?=$this->session->userdata('user_name')?>&nbsp;(<?=$this->session->userdata('user_id')?>)</strong></p>
              <p class="text-left small"><?=$this->session->userdata('user_email')?></p>
            </div>
            <div class="col-md-12 dropdown-divider"></div>
            <div class="col-md-12">
              <a href="<?php echo base_url('User')?>" class="btn btn-primary btn-block btn-sm">내정보</a>
            </div>
            <div class="col-md-12" style="margin-top:0.25em">
              <a href="<?php echo base_url('Main/logout')?>" class="btn btn-danger btn-block btn-sm">로그아웃</a>
            </div>
          </div>
        </div>
<?php
        }
?>
      </li>
    </ul>
    <!-- USER NOTIFICATION -->
    <ul class="nav navbar-nav float-xs-right" style="margin-right: 1em;">
      <li class="nav-item">
        <a class="nav-link left" href="#">
          <i class="fa fa-bell-o" aria-hidden="true"></i>
          <span class="tag tag-pill tag-danger"><?php echo $this->MNotification->count_notification();?></span>
        </a>
  			<ul class="dropdown-menu dropdown-menu-right" style="width: 375px;">
  				<li class="col-sm-12">
  					<ul>
<?php
            if( $this->MNotification->count_notification() > 0){
              foreach ( $this->MNotification->view_notifications() as $row) :
?>
              <li class="col-sm-12">
                <div class="col-md-2 col-sm-4 col-xs-3">
                  <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$row['user_img']);?>" width="50px" height="50px">
                </div>
                <div class="col-md-10 col-sm-8 col-xs-9" align="left">
                  <a href="<?php echo base_url($row['alarm_target_controller'].$row['alarm_target_date'].'/'.$row['alarm_to_user']).'/'.$row['alarm_id']?>">
                    <?php
                    if ($row['reply_user']) {
                      echo $row['user_name_from'].'님께서 '.$row['user_name_to'].'님의 일정에 남긴 댓글에 답글을 달았습니다.';
                    } else {
                      echo $row['user_name_from'].'님께서 '.$row['alarm_target_date'].'의 일정에 댓글을 달았습니다.';
                    }
                    ?>
                  </a>
                </div>
              </li>
<?php
              endforeach;
            }else {
              echo "<li>알림이 없습니다.</li>";
            }
?>
  					</ul>
  				</li>
  			</ul>
			</li>
    </ul>
    <!-- NAVBAR MENUS -->
    <div class="collapse navbar-toggleable-md" id="navbarResponsive">
        <a href="<?=base_url()?>">
          <img class="nav_img" src="<?php echo base_url('assets/img/logo.png');?>" alt="" width="88px" height="45px"/>
        </a>
      <ul class="nav navbar-nav">
<?php
      if($this->session->userdata('user_id')) {
        if($this->session->userdata('user_level') >= "1"){
?>
        <li class="nav-item <?=$menu_home?>">
          <a class="nav-link left" href="<?=$home_url?>">개발자노트</a>
        </li>
        <li class="nav-item <?=$menu_dashboard?>">
          <a class="nav-link left" href="<?php echo base_url('Dashboard') ?>">모두의오늘</a>
        </li>
        <li class="nav-item <?=$menu_calendar?>">
          <a class="nav-link left" href="<?php echo base_url('Calendar') ?>">달력보기</a>
        </li>
        <li class="nav-item dropdown <?=$menu_plan?>">
          <a class="nav-link left dropdown-toggle" href="#" id="responsiveNavbarDropdown"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">내일정</a>
          <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('Plan/myPlan/'.date("Y-m-d")) ?>">오늘일정</a>
            <a class="dropdown-item" href="<?php echo base_url('Plan/add') ?>">일정쓰기</a>
          </div>
        </li>
        <li class="nav-item <?=$menu_suggestion?>">
          <a class="nav-link left" href="<?php echo base_url('Suggestions')?>">건의사항</a>
        </li>
        <!-- <li class="nav-item <?=$menu_statistics?>">
          <a class="nav-link left" href="<?php echo base_url('Statistics')?>">통계(준비중)</a>
        </li> -->
        <li class="nav-item <?=$menu_forum?>">
          <a class="nav-link left" href="<?php echo base_url('Forum')?>">나눔의 장</a>
        </li>
<?php
        }else if($this->session->userdata('user_level') == "0"){
          echo "<li class='nav-item'>";
          echo '<a class="nav-link" href="#">승인 대기중입니다. 관리자에게 문의하여 주세요.</a>';
          echo "</li>";
        }
      }
?>
      </ul>
    </div>
  </nav>
</div>
<div class="container-fluid">
