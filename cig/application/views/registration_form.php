<html>
<?php
error_reporting(E_WARNING | E_PARSE | E_NOTICE);
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/cig/index.php/user_authentication/user_login_process");
}
?>
<head>
<title>Registration Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
<div id="login1">
<h2>Customer Registration</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('user_authentication/new_customer_registration');

echo form_label('Customer Name: ');
echo"<br/>";
echo form_input('Cname');
echo"<br/>";
echo"<br/>";
echo form_label('Email : ');
echo"<br/>";
$data = array(
'type' => 'email',
'name' => 'Cemail'
);

echo form_input($data);
echo"<br/>";
echo"<br/>";
echo form_label('Password : ');

echo form_password('Cpassword');
echo"<br/>";

echo"<br/>";
echo form_label('Phone No: ');
echo"<br/>";
echo form_input('Cphone');
echo"<br/>";
echo "<input type='hidden' name='Croll' value='1'>";
echo"<br/>";

echo"<br/>";
echo form_label('Address: ');
echo"<br/>";
$data = array(
      'name'        => 'CAddress',
      'id'          => 'txt_area',
      'rows'        => '4',
      'cols'        => '8'
    );
echo form_textarea('Caddress');
echo"<br/>";
echo"<br/>";


echo form_submit('Csubmit', 'Sign Up');
echo form_close();
?>
<a href="<?php echo base_url() ?> ">For Login Click Here</a>
</div>


<div id="login2">
<h2>Service Provider Registration</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";

echo form_open_multipart('user_authentication/new_sp_registration');


echo form_label('Service Provider Name: ');
echo"<br/>";
echo form_input('SPName');
echo"<br/>";
echo"<br/>";
echo form_label('Email : ');
echo"<br/>";
$data = array(
'type' => 'email',
'name' => 'SPEmail'
);

echo form_input($data);
echo"<br/>";
echo"<br/>";
echo form_label('Password : ');

echo form_password('SPPassword');
echo"<br/>";

echo"<br/>";
echo form_label('Phone No: ');
echo"<br/>";
echo form_input('SPPhone');
echo"<br/>";
echo"<br/>";
echo form_label('Address: ');
echo"<br/>";
$data = array(
      'name'        => 'SPAddress',
      'id'          => 'txt_area',
      'rows'        => '4',
      'cols'        => '8'
    );
echo form_textarea('SPAddress');
echo"<br/>";
echo"<br/>";
?>
<input type="file" name="userfile" size="20" />
<?php
echo form_submit('SPsubmit', 'Sign Up');
echo form_close();
?>
<a href="<?php echo base_url() ?> ">For Login Click Here</a>
</div>




</div>
</body>
</html>