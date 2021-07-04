<?php
$book = $_GET["Book"];
$con = mysqli_connect("localhost","root","","ecommerce");
if(!$con){
  die("hatt bhikhari!");
}
$s = "select * from books where bookId='".$book."'";
$name = mysqli_query($con,$s);
$row = mysqli_fetch_assoc($name);
$book = "images/".$row['BookCode'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
    <!-- <link href="style/desciption.css" rel="stylesheet"> -->
    <style>
        .price_color{
            color: crimson;
        }
        .img-h{
            height: 57vh;
            width: 300px;
        }


        .Bb{
            margin-top: -3.2%;
            border-bottom: 0.5px solid rgb(211, 209, 209);
        }

        .rt{
            font-size: 16px;
            margin-top: -3.2%;
            padding: -10%;
        }

    </style>
</head>

<body>
<?php include('navbar.php'); ?> 

<div class="container-fluid d-flex p-3 border border-dark my-3 ">
    <div class="row">
        <div class="col-lg-4 col-12 mb-3 mx-auto"><img src="<?php echo $book?>" alt="image not available" class="img-h"></div>
    <div class="d-flex flex-column col-lg-7 col-12">
        <p class="h4-responsive"> <span class="h4-responsive font-weight-normal">  <?php echo $row['BookName'];?></span></p> <br/>
        <p class="h6 pb-2 font-weight-normal text-muted Bb">A Novel By : &nbsp; <span class="h6 font-weight-normal">  <?php echo $row['Author'];?></span></p> <br/>
        <p><?php echo $row['description'] ?></p>
        <p class="h4 font-weight-normal price_color"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $row['price'] ?></p>
        <p class="h6  font-weight-normal text-dark">Inclusive of all taxes</p> <br/>
        <?php
        if($row['stock']>0){
         ?>
        <h4 class="font-weight-bold text-success pb-4">In Stock</h4>
        <?php
        }
        else {
        ?>
        <h4 class="font-weight-bold text-danger pb-4">Out of Stock</h4>
        <?php
        }
        ?>
        <p class="pb-4 text-dark">10 days replacement policy <i class="fas fa-undo-alt"></i></p>
        <div class="d-flex">
            <button class="btn btn-warning" onclick="cart(this);">Add to Cart</button>
            <button class="btn btn-warning" onclick="wish(this);">Add to Wishlist</button>
        </div>
    </div>
    </div>
    <br>
</div>

<script type="text/javascript" src="javascript/description.js"></script>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<?php include('footer.php'); ?> 
</body>
</html>