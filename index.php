<?php
//opens session
session_save_path("D:\\");
session_start();

//if no user is loged in then log them in as guest
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

//check what type of user is loged in and show them the proper info/menu for them
//user
if($_SESSION['type']=="user"){
//display username and logout button
    echo "
    Welcome ".$_SESSION['username']."!<br>
    <button onclick=\"window.location='logout.php'\">logout</button><br>";
//bar
}else if($_SESSION['type']=="bar"){
//display bar name and logout button
    echo "
    Welcome ".$_SESSION['barname']."!<br>
    <button onclick=\"window.location='logout.php'\">logout</button><br>";
//guest
}else{
//display buttons to eather create and account or login
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