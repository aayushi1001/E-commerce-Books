<?php
if(isset($_POST["btn"])){
$name = $_POST['name'];
$email = $_POST["email"];
$contact = $_POST["contact"];
$password = $_POST["pass"];
$confirm = $_POST["conPass"];
$con = mysqli_connect("localhost","root","","ecommerce");
if($password === $confirm){
if($con){
    if(strlen($password) >= 8 && strlen($contact) == 10){
        echo "dabhjdvcj";
    $s = "insert into customers (customer_name,email,password,contact) values('".$name."','".$email."','".$password."','".$contact."')";
    $check = mysqli_query($con,$s);
    }
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
    <title>BookStore</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Pattaya' rel='stylesheet'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="style/register.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
</head>
<body>
    <div class="container text-center d-flex mt-5 v">
        <form name="aayu" method="POST" action="<?php $_PHP_SELF ?>" class="bg-link">
            <div class="form-group mb-0">
            <i class="fas fa-user-circle" id="user"></i>
            </div>
            <div class="form-group">
                <h1 class="mb-3 display-4 fs">Register Here</h1>
            </div>
            <div class="form-group">
                <label for="name" class="sr-only">Enter your Name</label>
                <input type="text" placeholder="Enter your Name" class="form-control mb-2" id="name" name="name" required autofocus>
                <label for="email" class="sr-only">Enter your Email</label>
                <input type="email" placeholder="Enter your Email" class="form-control mb-2" id="email" name="email" required>
                <label for="contact" class="sr-only">Enter your Contact Number</label>
                <input type="number" placeholder="Enter your Mobile Number" class="form-control mb-2" id="contact" name="contact" onkeyup="mobileval();">
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
                <button class="btn btn-block" type="submit" name="btn">Register</button>
                <p id="error" class="text-danger mb-2 font-weight-bold"></p>
                <p id="error1" class="text-danger mb-2 font-weight-bold"></p>
                <?php
                if(isset($check)){
                if($check > 0){
                    echo "<small class='bg-success text-white mb-3'>Registration Successfull</small>";
                    header("Location:home.php"); 
                }
                else{
                    echo "<small class='bg-danger form-control text-white mb-3'>Registration Unsuccessfull</small>";
                }
                }
                ?>
            </div>
            <div class="form-group">
                <a href="login.php" class="text-dark h6">Already have an account? Click Here!</a>
            </div>
        </form>
    </div>
</body>
<script>
    function passlength(){
        e = document.getElementById("pass");
        if(e.value.length <8){
            a = document.getElementById("error");
            a.innerHTML = "Password should be greater than 8 characters";
            e.style.borderColor = "red";
            e.style.borderWidth = "2px";
        }
        else if(e.value.length >=8){
            a = document.getElementById("error");
            a.innerHTML = "";
            e.style.borderColor = "";
            e.style.borderWidth = "";
        }
    }
    function mobileval(){
        e = document.getElementById("contact");
        a = document.getElementById("error1");
        if(e.value.length > 10 || e.value.length <10){
            e.style.borderColor = "red";
            e.style.borderWidth = "2px";
            a.innerHTML = "Invalid mobile number !!";
        }
        else if(e < 0){
            a.innerHTML = "Invalid mobile number !!";
        }
        else{
            a.innerHTML = "";
            e.style.borderColor = "";
            e.style.borderWidth = "";
        }
    }
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
</html>