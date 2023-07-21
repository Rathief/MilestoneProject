<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="d-flex align-items-center py-4">
    <main class="form-contact m-auto">
        <form action="contact.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Contact Us</h1>
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingFirst" placeholder="first_name" name="first_name">
                        <label for="floatingFirst">First Name</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingLast" placeholder="last_name" name="last_name">
                        <label for="floatingLast">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email">
                <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPhone" placeholder="Phone" name="phone">
                <label for="floatingPhone">Phone</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingSubject" placeholder="Subject" name="subject">
                <label for="floatingSubject">Message Subject</label>
            </div>
            <div class="form-floating">
                <textarea type="text" class="form-control" id="floatingMessage" placeholder="Message" name="message" style="height:10lh;"></textarea>
                <label for="floatingMessage">Message</label>
            </div>
            <button class="btn btn-primary w-100 py-2 my-2" type="submit" name="Submit" value="Add">Submit</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO contacts(first_name,last_name,email,phone,subject,message) 
                                         VALUES('$firstname','$lastname','$email','$phone','$subject','$message')");
        
        // redirect to login page
        header('Location: http://localhost/milestoneproject/contact.php');
    }
    ?>
</body>
</html>