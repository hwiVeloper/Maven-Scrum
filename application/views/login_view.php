<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"/>
  </head>
  <body>
    <h1>Log-in Here</h1>
    <!-- Make login form to use form helper -->
    <?php
    // Auth controller called when check_if_valid() returns true
    $submit_attributes = array('onsubmit' => 'return check_if_valid();',
                               'id' => 'auth');
    echo form_open('Auth', $submit_attributes);
    echo "<table><tr><td>";

    // <input> tag attributes
    echo form_label("User Name");
    echo "<td></td>";
    echo form_input(array('name' => 'user_name', 'value' => ''));
    echo "<td></td>";

    // Error message (hidden)
    echo "<label id='user_name_err' style='color:red; display:none;'>
          Name is too short</label>";
    echo "</td></tr><tr><td>";

    echo form_label("Password");
    echo "</td><td>";
    echo form_password("password", "");
    echo "</td><td>";

    // Error message (hidden)
    echo "<label id='password_err' style='color:red; display:none;'>
          Password is too short</label>";
    echo "</td></tr>";
    echo "</table>";

    // Submit Button
    echo form_input(array('type' => 'submit', 'value' => 'LOGIN'));
    echo form_close();
    ?>
    <hr/>
    <!-- Authentication fail message -->
    <p style="color: red"><?php echo $msg; ?></p>
  </body>
  <!-- Javascript service -->
  <script type="text/javascript">
    var submit = true;
    var user_name = $('[name="user_name"]').val();
    var password = $('[name="password"]').val();
    if(user_name.length < 2) {
      $('#user_name_err').show();
      submit = false;
    }else {
      $('#user_name_err').hide();
    }

    if(password.length < 6) {
      $('#password_err').show();
      submit = false;
    }else {
      $('#password_err').hide();
    }
    return submit;
  </script>
</html>
