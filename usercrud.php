<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY user_id ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <table width='80%' border=1>
 
    <tr>
        <th>Username</th> <th>Password</th> <th>Admin Status</th> <th>Currency</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['username']."</td>";
        echo "<td>".$user_data['pass']."</td>";
        echo "<td>".$user_data['admin']."</td>";   
        echo "<td>".$user_data['currency']."</td>"; 
        echo "<td><a href='useredit.php?id=$user_data[user_id]'>Edit</a> | <a href='userdelete.php?id=$user_data[user_id]'>Delete</a></td></tr>";        
    }
    ?>
    </table><br/><br/>
    <a href="useradd.php">Add New User</a>
    <a href="index.php">Go Back</a>
</body>
</html>