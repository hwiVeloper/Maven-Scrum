<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $mega_title; ?></title>
  </head>
  <body>
    <h3>Database Access Test</h3>
    <table border="1">
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
      </tr>
      <?php foreach ($users as $user) : ?>
      <tr>
        <td><?php echo $user->user_id; ?></td>
        <td><?php echo $user->user_name; ?></td>
        <td><?php echo $user->user_email; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
