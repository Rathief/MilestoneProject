<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $user_id=$_POST['user_id'];
    $unit_id=$_POST['unit_id'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE user_unit SET user_id='$user_id',unit_id='$unit_id' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: userunitcrud.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM user_unit WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $user_id=$user_data['user_id'];
    $unit_id=$user_data['unit_id'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="userunitedit.php">
        <table border="0">
            <tr> 
                <td>user_id</td>
                <td><input type="text" name="user_id" value=<?php echo $user_id;?>></td>
            </tr>
            <tr> 
                <td>unit_id</td>
                <td><input type="text" name="unit_id" value=<?php echo $unit_id;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>