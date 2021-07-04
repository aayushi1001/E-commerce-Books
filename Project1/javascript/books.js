function change(){
    a = document.getElementById("b1");
   a.src = "images/c1.jfif";
  a1 = document.getElementById("b11");
  a1.innerHTML = "Price:INR 599";

  a = document.getElementById("b2");
  a.src = "images/c2.jpg";
 a1 = document.getElementById("b22");
 a1.innerHTML = "Price:INR 199";

 a = document.getElementById("b3");
 a.src = "images/c3.jpg";
a1 = document.getElementById("b33");
a1.innerHTML = "Price:INR 299";

a = document.getElementById("b4");
a.src = "images/c4.jpg";
a1 = document.getElementById("b44");
a1.innerHTML = "Price:INR 185";

a = document.getElementById("b5");
a.src = "images/c5.jpg";
a1 = document.getElementById("b55");
a1.innerHTML = "Price:INR 199";

a = document.getElementById("b6");
a.src = "images/c6.jpg";
a1 = document.getElementById("b66");
a1.innerHTML = "Price:INR 249";
}

function normal(){
    a = document.getElementById("b1");
    a.src = "images/book1.jpg";
   a1 = document.getElementById("b11");
   a1.innerHTML = "Price:INR 399";
 
   a = document.getElementById("b2");
   a.src = "images/book2.jpg";
  a1 = document.getElementById("b22");
  a1.innerHTML = "Price:INR 399";
 
  a = document.getElementById("b3");
  a.src = "images/book3.jpg";
 a1 = document.getElementById("b33");
 a1.innerHTML = "Price:INR 299";
 
 a = document.getElementById("b4");
 a.src = "images/book4.jfif";
 a1 = document.getElementById("b44");
 a1.innerHTML = "Price:INR 399";
 
 a = document.getElementById("b5");
 a.src = "images/book5.jfif";
 a1 = document.getElementById("b55");
 a1.innerHTML = "Price:INR 499";
 
 a = document.getElementById("b6");
 a.src = "images/book6.jpg";
 a1 = document.getElementById("b66");
 a1.innerHTML = "Price:INR 299";
}

function deleteItems(){
    n = document.getElementById("TNR");
    n.innerHTML = '<div  class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6"><a href="buy.html"><img class="NewReleaseBook" src="images/book1.jpg" id="b1" alt="image not available"></a><br><span id="b11" class="price">Price:INR 399</span> </div>';
}