<?php

include "rb.php";

R::setup( 'mysql:host=localhost;dbname=barapp', 'barapp', 'password' );

if(isset($_POST['submit'])){

    $bar = R::find('bar', 'username="'.$_POST['username'].'"');

    if(!isset($bar->barname)){

        $bar = R::dispense('bar');

        $bar->barname = $_POST['barname'];
        $bar->username = $_POST['username'];
        $bar->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $id = R::store( $bar );

        echo "Account created!";

    }else{

        echo "Account not created for username is taken!";

    }

}

?>