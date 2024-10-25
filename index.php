<?php
$insert=FALSE;
    if(isset($_POST['name'])){

    //Set connection variables
    $server="localhost";
    $username="root";
    $password="";
        // create a database connection.
    $con=mysqli_connect($server,$username,$password);
        // check for connection success
    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }
    //echo "Success connecting to database!";
    // Collect post variables
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql="INSERT INTO `trip_info`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone_Number`, `Desc`, `DT`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;
    //Execute the query
    if($con->query($sql)==TRUE){
        //echo "Successfully inserted";
        // flag for successful insertion
        $insert=TRUE;
    }
    else{
        echo "ERROR: $sql <BR> $con->error";
    }
    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Japan trip Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="jp" src="jap.jpg" alt="Japan">
    <div class="container">
        <H2>Welcome to Maheshwari Travels Limited </H2>
        <p>Enter your details and submit your form to confirm your participation in the trip of Japan</p>
       <?php
       if($insert==TRUE){
       echo "<p class='submit'>Submitted Successfully</p>";
       }
       ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name: ">
            <input type="number" name="age" id="age" placeholder="Enter your Age: ">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender: ">
            <input type="email" name="email" id="email" placeholder="Enter your Email: ">
            <input type="phone" name="phone" id="phone" placeholder="Enter your PhoneNumber: ">
            <textarea name="desc" id="desc" cols="30" row="10" placeholder="Enter about yourself"></textarea>
            <button class="btn">Submit</button>
            
        </form>
    </div>
    <script src="script.js"></script>
    
</body>
</html>