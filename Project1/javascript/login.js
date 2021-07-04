function change(n){
    b = n.id ;
  a =  document.getElementById(b);
  a.style.borderColor = "red";
}

function normal(n){
    b = n.id ;
    a =  document.getElementById(b);
    a.style.borderColor = "black"; 
}

function showHide(n){
    a=n.innerHTML;
    if(a == "<i class=\"fas fa-eye-slash\"></i>"){
        document.aayu.three.type = Text;
        n.innerHTML = "<i class=\"fas fa-eye\"></i>";
    }
    else{
        document.aayu.three.type = "password";
        n.innerHTML = "<i class=\"fas fa-eye-slash\"></i>";

    }
}