<?php
$con = mysqli_connect("localhost","root","","ecommerce");
if(!$con){
  die("hatt bhikhari!");
}
$s = "select * from books";
$name = mysqli_query($con,$s);
//$row = mysqli_fetch_assoc($name);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Nook</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Pattaya' rel='stylesheet'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/main.css">
    <script src="javascript/books.js"></script>
</head>
<style>
  #w{
    outline: none ;
    border: none !important;
   background: transparent;
}
.NewRelease{
    font-family: 'Pattaya';
}

</style>
<body>

<?php include('navbar.php'); ?>
<?php include('carousel.php'); ?>

<p class="h1-responsive NewRelease text-center mt-4 mb-3">Trending New Releases</p>
<!-- <button class="btnleft" onclick="normal();"><i class="fas fa-less-than"></i></button> -->
<div class="container">
  <div class="row d-flex" id="TNR">
  <?php
  $BS = "select * from newrelease";
  $BSCode = mysqli_query($con,$BS);
  while( $row1 = mysqli_fetch_array($BSCode)){
    $BS1 = "select * from books where bookId = '".$row1['bookId']."'";
    $BSCode1 = mysqli_query($con,$BS1);
    $row = mysqli_fetch_array($BSCode1);
    $n = $row["BookCode"];
    $n = "images/".$n;
    ?>
    <div  class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-5 bg-light rounded py-2 mx-2 mb-2 flex-column"><a href="description.php?Book=<?php echo $row['bookId']; ?>"><img class="img NewReleaseBook mx-0" src="<?php echo "$n"; ?>" id="b1" alt="image not available"></a> <br>
      <div class="flex-row">
        <button type="submit" id="w" class="mt-2"><i class="far fa-heart fa-lg pr-3"></i></button>
        <span id="b11" class="price font-weight-bold pl-2">Rs <?php echo $row['price']; ?></span>
      </div>
    </div>
  <?php
  }
  ?>
  <!-- <div  class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=Book2"><img class="NewReleaseBook" src="images/book2.jpg" id="b2" alt="image not available"></a><br><span id="b22" class="price font-weight-bold">Price:INR 399</span></div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=Book3"><img class="NewReleaseBook" src="images/book3.jpg" id="b3" alt="image not available"></a><br><span id="b33" class="price font-weight-bold">Price:INR 299</span></div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=Book4"><img class="NewReleaseBook" src="images/book4.jfif" id="b4" alt="image not available"></a><br><span id="b44" class="price font-weight-bold">Price:INR 399</span></div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=Book5"><img class="NewReleaseBook" src="images/book5.jfif" id="b5" alt="image not available"></a><br><span id="b55" class="price font-weight-bold">Price:INR 499</span></div>
  <div  class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=Book6"><img class="NewReleaseBook" src="images/book6.jpg" id="b6" alt="image not available"></a><br><span id="b66" class="price font-weight-bold">Price:INR 299</span></div> -->
</div>
<!-- <button class="btnright"><i class="fas fa-greater-than" onclick="change();"></i></button> -->
<p class="NewRelease h1-responsive text-center mt-5 mb-3">Bestseller Books</p>
<div class="row">
<?php
$BS = "select * from bestseller";
$BSCode = mysqli_query($con,$BS);
  while( $row1 = mysqli_fetch_array($BSCode)){
    $BS1 = "select * from books where bookId = '".$row1['bookId']."'";
    $BSCode1 = mysqli_query($con,$BS1);
    $row = mysqli_fetch_array($BSCode1);
    $n = $row["BookCode"];
    $n = "images/".$n;
    ?>
    <div  class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-5 bg-light rounded py-2 mx-2 mb-2 flex-column"><a href="description.php?Book=<?php echo $row['bookId']; ?>"><img class="img NewReleaseBook mx-0" src="<?php echo "$n"; ?>" id="b1" alt="image not available"></a> <br>
      <div class="flex-row">
        <button type="submit" id="w" class="mt-2"><i class="far fa-heart fa-lg pr-3"></i></button>
        <span id="b11" class="price font-weight-bold pl-2">Rs <?php echo $row['price']; ?></span>
      </div>
    </div>
  <?php
  }
  ?>
  <!-- <div  class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=bs1"><img class="NewReleaseBook" src="images/bs1.jpg" alt=""></a><span class="price font-weight-bold">Price:INR 399</span> </div>
  <div  class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=bs2"><img class="NewReleaseBook" src="images/bs2.jpg" alt=""></a><span class="price font-weight-bold">Price:INR 399</span></div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=bs3"><img class="NewReleaseBook" src="images/bs3.jpg" alt=""></a><span class="price font-weight-bold">Price:INR 299</span></div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=bs4"><img class="NewReleaseBook" src="images/bs4.jpg" alt=""></a><span class="price font-weight-bold">Price:INR 399</span></div>
  <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=bs5"><img class="NewReleaseBook" src="images/bs5.jpg" alt=""></a><span class="price font-weight-bold">Price:INR 499</span></div>
  <div  class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="description.php?Book=bs6"><img class="NewReleaseBook" src="images/bs6.jpg" alt=""></a><span class="price font-weight-bold">Price:INR 299</span></div> -->
</div>
<p class="NewRelease h1-responsive text-center mt-5 mb-3">Featured Series</p>
<div class="row">
<?php
$BS = "select * from featuredseries";
$FSCode = mysqli_query($con,$BS);
  while( $row2 = mysqli_fetch_array($FSCode)){
    $FS1 = "select * from books where bookId = '".$row2['bookId']."'";
    $FSCode1 = mysqli_query($con,$FS1);
    $row = mysqli_fetch_array($FSCode1);
    $n = $row["BookCode"];
    $n = "images/".$n;
    ?>
    <div  class="col-md-2 col-sm-5 col-5 bg-light rounded py-2 px-2 mx-2 mb-2 flex-column"><a href="description.php?Book=<?php echo $row['bookId']; ?>"><img class="sr" src="<?php echo "$n"; ?>" id="b1" alt="image not available"></a> <br>
      <div class="flex-row">
        <?php 
        // yahn session variable
        $w = "select bookId from wishlist where customer_id =(select customer_id from customers where customer_name = 'tim' )";
        $W1 = mysqli_query($con,$w);
        $wishes = mysqli_fetch_array($FSCode1);
        $flag = 0;
        if($wishes){
          while($wishes){
            if($wishes == $row['bookId']){
              $flag= 1;
              break;
            }
          }
        }
        if($flag == 0){
        ?>
        <button type="button" id="w" class="mt-2 pr-2" onclick="wish(this)"><i class="far fa-heart fa-lg pr-3"></i></button>
        <?php
        }
        else{
         ?>
        <button type="button" id="w" class="mt-2 pr-2" onclick="wish(this)"><i class="fas fa-heart text-amber fa-lg pr-3"></i></button>
        <?php } ?> 
        <span id="b11" class="price font-weight-bold pl-4">Rs <?php echo $row['price']; ?></span>
      </div>
    </div>
  <?php
  }
  ?>
  <!-- <div  class="col-md-3 col-sm-6 col-6"><a href="buy.html"><img class="sr" src="images/s1.webp" alt=""></a><br><span class="price font-weight-bold">Price:INR 2399</span> </div>
  <div  class="col-md-3 col-sm-6 col-6"><img class="sr" src="images/s2.jpg" alt=""><br><span class="price font-weight-bold">Price:INR 4399</span></div>
  <div class="col-md-3 col-sm-6 col-6"><img class="sr" src="images/s3.png" alt=""><br><span class="price font-weight-bold">Price:INR 1299</span></div>
  <div class="col-md-3 col-sm-6 col-6"><img class="sr" src="images/s4.jpg" alt=""><br><span class="price font-weight-bold">Price:INR 599</span></div> -->
</div>
<!-- <p class="NewRelease h1-responsive text-center mt-5 mb-3">Shop By Genre</p>
<div class="row">
  <div  class="col-md-2 col-4 mb-2"><a href="#"><img class="genre" src="images/g1.png" alt=""></a> </div>
  <div  class="col-md-2 col-4 mb-2"><img class="genre" src="images/g2.png" alt=""></div>
  <div class="col-md-2 col-4 mb-2"><img class="genre" src="images/g3.png" alt=""></div>
  <div class="col-md-2 col-4 mb-2"><img class="genre" src="images/g2.png" alt=""></div>
  <div class="col-md-2 col-4 mb-2"><img class="genre" src="images/g2.png" alt=""></div>
  <div  class="col-md-2 col-4 mb-2"><img class="genre" src="images/g2.png" alt=""></div>
</div> -->
</div>
<br> <br> <br>
              <script>
                function wish(n){
                  alert("sjhdfvjs");
                    a=n.innerHTML;
                    if(a == "<i class=\"far fa-heart fa-lg pr-3\"></i>"){
                       
                        n.innerHTML = "<i class=\"fas fa-heart text-amber fa-lg pr-3\"></i>";
                    }
                    else{
                        
                        n.innerHTML = "<i class=\"far fa-heart fa-lg pr-3\"></i>";
                    }
                }
             </script>


    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <?php include('footer.php'); ?> 
</body>
</html>