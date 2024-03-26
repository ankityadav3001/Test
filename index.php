<?php
if(isset($_POST['name'])){
    $_server="localhost";
    $username="root";
    $password="";
    $database = "party_form";

    $con=mysqli_connect($_server, $username, $password, $database);

    if(!$con){
        die("Connection to the database failed due to " . mysqli_connect_error());
    }
    
    // Sanitize input
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    $sql = "INSERT INTO `party` (`name`, `branch`, `gender`, `email`, `phone`, `other`, `date`) 
            VALUES ('$name', '$branch', '$gender', '$email', '$phone', '$desc', current_timestamp())";

    if(mysqli_query($con, $sql)){
        echo "Successfully inserted";
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>party Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="party background">
    <div class="container">
        <h1>welcome to party form</h1>
        <P>Enter your details to show interest in this party</P>
        <p class="sumbitmsg">thanks for submitting your form. we are happy we are happy to see you at party</p>
        <form action="index.php" method="post">
            <input type="text" name="name"  id="age" placeholder="enter your Name">
            <input type="text" name="branch"  id="age" placeholder="enter your Branch&Section">
            <input type="text" name="gender" id="gender" placeholder="enter your Gender">
            <input type="email" name="email" id="email" placeholder="enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="enter your Phone Number">
            <textarea name="desc"  id="desc"  cols="30" rows="10"
            placeholder="Enter your suggestion if you have"></textarea>
            <button class="btn">sumbit</button>
        </form>
    </div>
    <script src="index.js"></script>

</body>
</html>
