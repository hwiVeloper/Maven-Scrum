<!DOCTYPE html>

<html>
<head>
  <!-- Meta Informations -->
  <meta http-equiv="Content-Type" context="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Title -->
  <title>MAVEN DAILY SCRUM</title>

  <!-- Javascript Libraries -->
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

  <!-- CSS Libraries -->
  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
</head>
<body>

<!-- NAVBAR (FIXED-TOP) -->
<div class="container-fluid">
  <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-toggleable-md" id="navbarResponsive">
      <a class="navbar-brand" href="http://scrum.mismaven.kr">
        <img src="<?php echo base_url('assets/img/logo.gif');?>" alt="" width="88px" height="45px"/>
      </a>
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="http://scrum.mismaven.kr">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lorem ipsum</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plan</a>
          <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
            <a class="dropdown-item" href="#">Calendar</a>
            <a class="dropdown-item" href="#">Today Plan</a>
            <a class="dropdown-item" href="#">Write Plan</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>
<div class="container-fluid" style="margin-top:4rem">
  <div style="margin-top:4.5em"></div>
