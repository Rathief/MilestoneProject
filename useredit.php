<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $admin=$_POST['admin'] ?? 0;
    $currency=$_POST['currency'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET username='$username',pass='$pass',admin=$admin,currency=$currency WHERE user_id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: usercrud.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $username=$user_data['username'];
    $pass=$user_data['pass'];
    $admin=$user_data['admin'];
    $currency=$user_data['currency'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="useredit.php">
        <table border="0">
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username" value=<?php echo $username;?>></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="text" name="pass" value=<?php echo $pass;?>></td>
            </tr>
            <tr> 
                <td>admin</td>
                <td><input type="checkbox" name="admin" value="true" <?php if($admin){echo "checked";};?>></td>
            </tr>
            <tr> 
                <td>currency</td>
                <td><input type="number" name="currency" value=<?php echo $currency;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>