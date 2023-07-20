<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="userunitcrud.php">Go Back</a>
    <br/><br/>
 
    <form action="userunitadd.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>user_id</td>
                <td><input type="text" name="user_id"></td>
            </tr>
            <tr> 
                <td>unit_id</td>
                <td><input type="text" name="unit_id"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into userunit table.
    if(isset($_POST['Submit'])) {
        $user_id = $_POST['user_id'];
        $unit_id = $_POST['unit_id'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO user_unit(user_id,unit_id) VALUES('$user_id',$unit_id)");
        
        // Show message when user added
        echo "Connection added successfully. <a href='userunitcrud.php'>View Connections</a>";
    }
    ?>
</body>
</html>