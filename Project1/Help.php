<?php
$con = mysqli_connect("localhost","root","","ecommerce");
$s = "select * from orders where Customer_id=1";
$name = mysqli_query($con,$s);
$row = mysqli_fetch_assoc($name);
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
    <link href="style/Help.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
</head>
<body>
<?php include('navbar.php'); ?> 
    <div class="container">
        <div class="row">
            <div class="col-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card d-flex flex-row mb-4">
                    <div class="card-body d-flex flex-column">
                        <strong class="text-dark h2-responsive mb-3">Your Orders</strong>
                        <a href="#" class="text-primary h6-responsive link_decor" data-toggle="collapse" data-target="#o">Click here to track your orders, return items or buy things again</a>
                    </div>
                    <img src="images/carton.jpg"  alt="not available" class="flex-auto carton">
                </div>
            </div>
            <div class="col-md-6 col-sm-12  ">
                <div class="card d-flex flex-row">
                    <div class="card-body d-flex flex-column">
                        <strong class="text-dark h2-responsive mb-3">Edit Personal Information</strong>
                        <a href="#" class="text-primary h6-responsive link_decor" data-toggle="collapse" data-target="#q">Click here to change your password, username or profile picture</a>
                    </div>
                    <img src="images/lock.jpg"  alt="not available" class="flex-auto lock">
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card d-flex flex-row mt-10">
                    <div class="card-body d-flex flex-column">
                        <strong class="text-dark h2-responsive mb-3">Location Settings</strong>
                        <a href="#" class="text-primary h6-responsive link_decor" data-toggle="collapse" data-target="#p">Click here to edit your order location</a>
                    </div>
                    <img src="images/location.jpg"  alt="not available" class="flex-auto loc">
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card d-flex flex-row">
                    <div class="card-body d-flex flex-column">
                        <strong class="text-dark h2-responsive mb-3">View Wishlist</strong>
                        <a href="#" class="text-primary h6-responsive link_decor">Move your wishlists to your bag!</a>
                    </div>
                    <img src="images/wish.jpg"  alt="not available" class="flex-auto loc">
                </div>
            </div>
        </div>
    </div>
    <div id="o" class="collapse">
    <div class="container d-flex flex-column mt-2 v">
    <strong class="text-dark h2-responsive font-weight-normal mb-3">Your Order Details</strong> 
    <br>
    <?php
    if (mysqli_num_rows($name)>0) {
        $sum =0;
        ?> 
        <p class="h5 mb-2">Your order number:<?php echo "100'".$row['Order_id']."'";?></p> <br/>
        <?php
       while ($row)
       {    
           ?>
            <div class="container mt-3 d-flex v">
            <?php
            $pic = "images/".$row['Item'].".jpg";
            ?>
            <img src="<?php echo $pic;?>" id="b1" alt="image not available">
            <?php
            $price = "select * from books where BookCode='".$row['Item']."'";
            $r = mysqli_query($con,$price);
            $r = mysqli_fetch_assoc($r);
            $sum = $sum + $r['price'];
            ?>
            <div class="container d-flex flex-column">
            <p class="h4 px-5 text-danger mt-3">Price : &nbsp; <span class="h5 font-weight-normal"> INR  <?php echo $r['price'];?></span></p> <br/>
            <p class="h4 px-5 "> <span class="h5 font-weight-normal">  <?php echo $r['BookName'];?></span></p> <br/>
            <p class="h6 px-5 font-weight-normal text-muted order_details">A Novel By : &nbsp; <span class="h6 font-weight-normal">  <?php echo $r['Author'];?></span></p> <br/>
            </div>
            <?php
            $row = mysqli_fetch_assoc($name);
            ?>
            </div>
            <?php
       }
       ?>
        <p class="h4 px-5 mt-3">Total : &nbsp; <span class="h5 font-weight-normal"> INR  <?php echo $sum;?></span></p> <br/>
       <?php
    } 
      else {
        ?>
       <br><strong class='text-dark h2-responsive font-weight-normal mb-3'>No orders</strong>
        <a class='h5 font-weight-normal text-danger link_decor' href='home.php'>click here to place orders</a>
        <?php
      }
    ?>
    </div>
    </div>
    <br>
    <div id="p" class="collapse">
    <div class="container d-flex flex-column mt-2 v">
        <h2 class="mb-4 font-weight-bold ">Location Settings</h2>
        <form action="">
        <input type="text" placeholder="enter your delivery location" class="form-control mb-2 py-2"> <br>
        <button class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    <br>
    <div id="q" class="collapse">
      <div class="container d-flex flex-column mt-2 v">
      <h2 class="mb-4 font-weight-bold ">Edit Personal Information</h2>
          <div class="d-flex text-center">
            <button class="btn btn-dark" data-toggle="collapse" data-target="#r">Change Password</button>
            <button class="btn btn-dark" data-toggle="collapse" data-target="#s">Change Username</button>
            <button class="btn btn-dark" data-toggle="collapse" data-target="#t">Change Profile Picture</button>
          </div>

          <div id="r" class="collapse">
        <div class="container d-flex flex-column mt-4 text-center v">
            <form action="" class="form-group">
            <h2 class="mb-4 font-weight-bold ">Enter Your Details Here</h2>
            <input type="password" placeholder="Enter Old Password" class="font-control mb-2 py-2"> <br>
            <input type="password" class="font-control mb-2 py-2" placeholder="Enter New Password"> <br>
            <input type="password" class="font-control mb-2 py-2" placeholder="confirm New Password"> <br>
            <button class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>

        <div id="s" class="collapse">
        <div class="container d-flex flex-column mt-4 text-center v">
            <form action="" class="form-group">
            <h2 class="mb-4 font-weight-bold ">Enter Your Details Here</h2>
            <input type="password" placeholder="Enter Your Password" class="font-control mb-2 py-2"> <br>
            <input type="text" class="font-control mb-2 py-2" placeholder="Enter New Username"> <br>
            <button class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>

        <div id="t" class="collapse">
            <div class="container d-flex flex-column mt-4 text-center v">
            <input type="file" name="dp" id="dp" class="form-control">
            <a href="" class="btn mt-4 btn-light">Take Picture</a>
            <button class="btn btn-primary">Submit</button>
            </div>
        </div>
          
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <br> <br> 
    <?php include('footer.php'); ?> 
</body>
</html>