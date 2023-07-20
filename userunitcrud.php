<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM user_unit ORDER BY user_id ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <table width='80%' border=1>
 
    <tr>
        <th>id</th> <th>user_id</th> <th>unit_id</th>
    </tr>
    <?php  
    while($data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data['id']."</td>";
        echo "<td>".$data['user_id']."</td>";
        echo "<td>".$data['unit_id']."</td>";
        echo "<td><a href='userunitedit.php?id=$data[id]'>Edit</a> | <a href='userunitdelete.php?id=$data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table><br/><br/>
    <a href="userunitadd.php">Add New Connection</a>
    <a href="index.php">Go Back</a>
</body>
</html>