<!DOCTYPE html>
<html>
  <head>
    <meta content ="text/html" charset="utf-8">
  </head>
  <?php
    /* 컨트롤러에서 넘어온 데이터
     * $email, $eamil_valid, $url, $url_valid, $url_exist
     */
    $validation_text = ($email_valid) ? "Is Valid" : "Is Not Valid";
    //$validation_url = ($url_valid) ? "Is Valid" : "Is Not Valid";
    // $exist_url = ($url_exist) ? "Is Valid" : "Is Not Valid";
  ?>
  <body style="text-align: left; color: blue;">
    <h1>Main Page</h1>
    <hr/>
    <div class="" style="float: left">
      The Email : <?= $email ?><?=$validation_text ?>
    </div>
    <div class="" style="clear:both"></div>
    <hr/>
    <div class="">
      The Url : <?=$url ?>
      <?=anchor($url, '[visit the url]', array("target" => "_blank",
              "title"=>"opens a new Tab")); ?>
    </div>
    <div class="" style="clear: both;"></div>
    <hr/>
    <?php echo anchor ('Homepage/page_b', 'Navigate me to page B'); ?>
  </body>
</html>
