<?php
$con = mysqli_connect("localhost","root","","ecommerce");
$s = "select bookId from wishlist where Customer_id=1";
$name = mysqli_query($con,$s);
$row = mysqli_fetch_assoc($name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="style/Help.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
</head>
<body>
<?php include('navbar.php'); ?> 

<div id="o">
    <div class="container d-flex flex-column mt-2 v">
    <strong class="text-dark h2-responsive font-weight-normal mb-3">Your Wishlist</strong> 
    <br>
    <?php
    if (mysqli_num_rows($name)>0) {
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
                // $sum = $sum + $r['price'];
                ?>
                <div class="container d-flex flex-column">
                <p class="h4 px-5 text-danger mt-3">Price : &nbsp; <span class="h5 font-weight-normal"> INR  <?php echo $r['price'];?></span></p> <br/>
                <p class="h4 px-5 "> <span class="h5 font-weight-normal">  <?php echo $r['BookName'];?></span></p> <br/>
                <p class="h6 px-5 font-weight-normal text-muted order_details">A Novel By : &nbsp; <span class="h6 font-weight-normal">  <?php echo $r['Author'];?></span></p> <br/>
                <p class="h6 px-5 font-weight-normal text-muted order_details mt-2"><span class="h6 font-weight-normal">  <?php echo $row['Status'];?></span></p> <br/>
                </div>
                <?php
                if($row['Status'] == "Out For Delivery" || $row['Status'] == "Delivered"){
                ?>
                <button class="btn btn-primary" style="height:10vh">Apply for return</button>
                <?php
                }
                // else if()
                $row = mysqli_fetch_assoc($name);
                ?>
            </div>
            <?php
       }
       ?>
        <!-- <p class="h4 px-5 mt-3">Total : &nbsp; <span class="h5 font-weight-normal"> INR  <?php echo $sum;?></span></p> <br/> -->
       <?php
    } 
      else {
        ?>
        <div class="row">
          <div class="col-lg-4 mx-4"><img src="images/oops.jfif" alt="image unavailable"></div>
          <br><div class="col-lg-7"><strong class='text-dark h1-responsive font-weight-normal mb-3'>No Items In Your Wishlist!</strong> <br>
         <a class='h5 font-weight-normal text-danger link_decor' href='home.php'>click here to find your favourite items now!</a></div>
        </div>
        <?php
      }
    ?>
    </div>
    </div>
    <br>
    <?php include('footer.php'); ?> 
</body>
</html>