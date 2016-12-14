<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html" charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Page B</h1>
    <hr/>
    <div class="" style="float: left">
      <!-- 컨트롤러가 제공한 $since, $past 매개변수를 이용해 렌더링한다. -->
      Since: <?=$since ?> <?=2016 ?> ^^
    </div>
    <div class="" style="clear: both;"></div>
    <hr/>
    <?php echo anchor ('homepage', 'Back to Home Page'); ?>
  </body>
</html>
