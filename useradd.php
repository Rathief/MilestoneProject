<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="usercrud.php">Go Back</a>
    <br/><br/>
 
    <form action="useradd.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>password</td>
                <td><input type="text" name="pass"></td>
            </tr>
            <tr> 
                <td>admin</td>
                <td><input type="checkbox" name="admin", value="true"></td>
            </tr>
            <tr> 
                <td>currency</td>
                <td><input type="number" name="currency"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $admin = $_POST['admin'] ?? 0;
        $currency = $_POST['currency'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(username,pass,admin,currency) VALUES('$username','$pass',$admin,$currency)");
        
        // Show message when user added
        echo "User added successfully. <a href='usercrud.php'>View Users</a>";
    }
    ?>
</body>
</html>