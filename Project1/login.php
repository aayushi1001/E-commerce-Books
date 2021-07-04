<?php
if(isset($_POST["btn"])){
$email = $_POST["email"];
$password = $_POST["pass"];
$confirmPassword = $_POST["conPass"];
$con = mysqli_connect("localhost","root","","ecommerce");
if(!$con){
    die("could not connect");
}
if($password == $confirmPassword){
    $sql = "select * from customers where email = '".$email."'";
    $check = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($check);
    $check = $row["password"];
    if($check == $password){
        $check = 0;
    }

}
else{
    $check = -1;
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="style/register.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Pattaya' rel='stylesheet'>
    <script src="javascript/login.js"></script>
</head>
<body>
    <div class="container text-center d-flex mt-5 v">
        <form name="aayu" method="POST" action="" class="bg-link">
            <div class="form-group mb-4">
            <i class="fas fa-user-circle" id="user"></i>
            </div>
            <div class="form-group">
                <h1 class="mb-3 display-4 fs">Log In Here...</h1>
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">Enter your Email</label>
                <input type="email" placeholder="Enter your Email" class="form-control mb-2" id="email" name="email" required>
                <label for="pass" class="sr-only">Enter your Password</label>
                <input type="password" placeholder="Enter your password" class="form-control mb-2" id="pass" name="pass" required onkeyup="passlength();">
                <button class="show" type ="button" onclick="showHide(this);"><i class="fas fa-eye-slash"></i></button>
                <label for="conPass" class="sr-only">Confirm Password</label>
                <input type="password" placeholder="Confirm-Password" class="form-control mb-2" id="conPass" name="conPass" required>
            </div>
            <div class="form-group">
                <input type="checkbox" value="remember-me" class="mb-3"> &nbsp;Remember Me
            </div>
            <div class="form-group">
                <button class="btn btn-block" type="submit" name="btn">Log In</button>
                <?php
                if(isset($check)){
                if($check == 0){
                    echo "<small class='bg-success text-white mb-3'>Registration Successfull</small>";
                    header("Location:home.php"); 
                }
                else{
                    echo "<small class='bg-danger form-control text-white mb-3'>Unable to Login !!</small>";
                }
                }
                ?>
            </div>
            <div class="form-group">
                <a href="register.php" class="text-dark h6">Don't have an account? Click Here !!</a>
            </div>

            <script>
                function showHide(n){
                    a=n.innerHTML;
                    if(a == "<i class=\"fas fa-eye-slash\"></i>"){
                        document.aayu.pass.type = Text;
                        n.innerHTML = "<i class=\"fas fa-eye\"></i>";
                    }
                    else{
                        document.aayu.pass.type = "password";
                        n.innerHTML = "<i class=\"fas fa-eye-slash\"></i>";
                    }
                }
             </script>
        
    
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>    
</body>
</html>