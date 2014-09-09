<?php include_once "config/modul/db.class.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="config/theme/login.css" rel="stylesheet" type="text/css"  />
<link href="config/jquery/css/custom-theme/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="config/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="config/jquery/jquery-ui-1.8.18.custom.min.js"></script>
<script>
$(document).ready(function(){
	$("#form-login").toggle('drop',1000);
	
	$("#submit").button();
	
});
</script>
<title>Login Auto Fallen</title>
</head>

<body>
<div id="header">
<b>Welcome </b>to Auto Fallen
</div>

<div id="logo">

</div>

<div id="form-login" class="ui-widget-content ui-corner-all">
<h3 class="ui-widget-header">Login<span class="ui-icon ui-icon-locked" style="float:right"></span></h3>
<form id="form" action="config/modul/security.php">
	<fieldset>
		<label for="name">User</label>
		<input type="text" name="user" id="user" class="text ui-widget-content ui-corner-all" />
		<label for="password">Password</label>
		<input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all" />
	</fieldset>
    <input type="submit" name="submit" id="submit"  value="login" />
</form>
</div>


 <!-- FOOTER SET -->
 <div id="footer">
  <?php echo FOOTER.' @ '.AUTHOR.' . '.YEAR_IN ?>
 </div>
 
</body>
</html>