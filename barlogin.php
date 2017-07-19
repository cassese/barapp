<?php
session_save_path("D:\\");
session_start();

include "rb.php";

R::setup( 'mysql:host=localhost;dbname=barapp', 'barapp', 'password' );

if(!isset($_POST['submit'])){

    echo "<form action=\"barlogin.php\" method=\"post\">

    username:<input type=\"text\" name=\"username\"/><br>
    password:<input type=\"password\" name=\"password\"/><br>
    <input type=\"submit\" name=\"submit\" value=\"login!\"/>

    </form>";

}else{

    $bar = R::findone('bar','username = "'.$_POST["username"].'"');

    if(password_verify($_POST['password'],$bar->password)){

        $_SESSION["username"] = $bar->username;
        $_SESSION["id"] = $bar->id;
        $_SESSION["type"] = "bar";
        header("location: index.php");

    }else{
        echo "fail";
    }

}

?>