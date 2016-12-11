<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html" charset="utf-8">
    <title>login in view</title>
  </head>
  <body>
    <h1>Welcome <?=$user_name?> !</h1>
    <h1>You are logged in!</h1>
    <hr/>
    <h3>Your User ID is: <?=$user_id?></h3>
    <h3>Your System Role is:<?=$user_level?></h3>
    <?php echo anchor('Auth/logout', 'LOGOUT'); ?>
  </body>
</html>
