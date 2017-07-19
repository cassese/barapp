<?php
session_save_path("D:\\");
session_start();

include "rb.php";

R::setup( 'mysql:host=localhost;dbname=barapp', 'barapp', 'password' );

if(!isset($_POST['submit'])){

    echo "<form action=\"userlogin.php\" method=\"post\">

    username:<input type=\"text\" name=\"username\"/><br>
    password:<input type=\"password\" name=\"password\"/><br>
    <input type=\"submit\" name=\"submit\" value=\"login!\"/>

    </form>";

}else{

    $user = R::findone('user','username = "'.$_POST["username"].'"');

    if(password_verify($_POST['password'],$user->password)){

        $_SESSION["username"] = $user->username;
        $_SESSION["id"] = $user->id;
        $_SESSION["type"] = "user";
        header("location: index.php");

    }else{
        echo "fail";
    }

}

?>