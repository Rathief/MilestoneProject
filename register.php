<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(username,pass) VALUES('$username','$password')");
        
        // redirect to login page
        header('Location: http://localhost/milestoneproject/login.html');
    }
?>