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
  <!-- <script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.2.3"></script> -->

  <!-- CSS Libraries -->
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo.gif')?>">

  <!-- Custom CSS -->
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

    .nav-link {
      padding-top: 0.6em!important;
    }
    #user-menu {
      margin-bottom: 0em;
    }
  </style>
</head>
<body style="height:100%">

<!-- NAVBAR (FIXED-TOP) -->
<div class="container-fluid">
  <nav class="navbar navbar-fixed-top navbar-dark bg-inverse" role="navigation">
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
    <a class="navbar-brand-mobile" href="<?=base_url()?>">
      <img src="<?php echo base_url('assets/img/logo.gif');?>" alt="" width="88px" height="45px"/>
    </a>
    <!-- User Account Information -->
    <ul class="nav navbar-nav pull-xs-right" style="float:right">
      <li class="nav-item">
<?php
        if($this->session->userdata('user_id')) {
?>
        <div class="dropdown">
          <a class="dropdown-toggle nav-link" id="user-menu" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" href="#">
            <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$this->session->userdata('user_img'));?>" width="30em" height="30em">
            <span class="hidden-xs-down">&nbsp;<?=$this->session->userdata('user_name')?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-menu" style="width:300px;">
            <div class="col-md-4">
              <img class="img-rounded" src="<?php echo base_url('assets/img/member/'.$this->session->userdata('user_img'));?>" width="100em" height="100em">
            </div>
            <div class="col-md-8" style="padding-left:0px">
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
        }else {
          echo "<span class='nav-link' style='color: rgba(255, 255, 255, 0.5);'>로그인 해주세요!</span>";
        }
?>
      </li>
    </ul>
    <div class="collapse navbar-toggleable-md" id="navbarResponsive">
      <a class="navbar-brand" href="<?=base_url()?>">
        <img src="<?php echo base_url('assets/img/logo.gif');?>" alt="" width="88px" height="45px"/>
      </a>
      <ul class="nav navbar-nav">
        <li class="nav-item active">
<?php
          $home_url = base_url();
          if($this->session->userdata('user_id')){
            $home_url = base_url('Home');
          }
?>
          <a class="nav-link" href="<?=$home_url?>">Home</a>
        </li>
<?php
      if($this->session->userdata('user_id')) {
        if($this->session->userdata('user_level') >= "1"){
?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Dashboard') ?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Calendar') ?>">Calendar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plan</a>
          <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('Plan/myPlan/'.date("Y-m-d")) ?>">Today</a>
            <a class="dropdown-item" href="<?php echo base_url('Plan/add') ?>">Write Today</a>
          </div>
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
<div class="container-fluid" style="margin-top:4rem">
  <div style="margin-top:4.5em"></div>
