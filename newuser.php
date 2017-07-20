<html>

<head>

<title>new user</title>

</head>

<body>

    <?php

    //grabs what type of user they are trying to make (bar or regular user)
    //then sets the right form action
    //regular user
    if($_GET['type']=='user'){

        echo "<form action='adduser.php' method='post'>";

    //bar user
    }else{

        //adds bar name for bar type user
        echo "<form action='addbar.php' method='post'><br>
        bar name (this is what people will search for you by):<input type='text' name='barname'/><br>
        ";

    }

    ?>
    <!-- default input types that we want to show no matter what type of user -->
    username:<input type="text" name="username"/><br>
    password:<input type="password" name="password"/><br>
    <input type="submit" name="submit" value="create acount"/>

</form>

</body>

</html>