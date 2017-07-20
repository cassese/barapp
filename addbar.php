<?php

//includes redbean ORM (object-relational-mapping (makes database calls easier))
include "rb.php";

//sets up connection to database for redbean
R::setup( 'mysql:host=localhost;dbname=barapp', 'barapp', 'password' );

//if they came here through the form and not just went to the url
if(isset($_POST['submit'])){

    //searches for a bar with the username the same as the new user wants to set theirs as
    $bar = R::find('bar', 'username="'.$_POST['username'].'"');

    //if the search does not find anything then continue
    if(empty($bar)){

        //sets $bar to bar type
        $bar = R::dispense('bar');

        //set the barname
        $bar->barname = $_POST['barname'];

        //sets the username
        $bar->username = $_POST['username'];

        //sets the password to a hashe of the password so its not stored in plain text
        $bar->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //stores the new bar user in the database
        $id = R::store( $bar );

        echo "Account created!";

    /*if the search does find a match then alerts the user saying
    that it has already been taken*/
    }else{

        echo "Account not created for username is taken!";

    }

}

?>