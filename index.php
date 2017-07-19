<?php
session_save_path("D:\\");
session_start();

if(!isset($_SESSION['type'])){

    $_SESSION['type'] = "guest";

}

?>

<html>
	
<head>
	
<title>home</title>

<script type="text/javascript"></script>

</head>

<body>

<?php

if($_SESSION['type']=="user"){

    echo "Welcome ".$_SESSION['username']."!";

}else if($_SESSION['type']=="bar"){

    echo "Welcome ".$_SESSION['username']."!"; 

}else{

echo "
<button onclick=\"window.location='newuser.php?type=bar'\">create business account</button><br>
<button onclick=\"window.location='newuser.php?type=user'\">create user account</button><br>
<button onclick=\"window.location='userlogin.php'\">user login</button><br>
<button onclick=\"window.location='barlogin.php'\">bar login</button><br>
";

}

?>

</body>

</html>