<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Snap</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <style>
        .b{
            width:20rem;
        }
        #save{
            display:none;
        }
        #results{
            margin-left:10vw;
        }
    </style>
</head>
<body>
    <div class="container">
    <div id="results" class=" container text-center d-flex "></div>
    <button id="save" onclick="saveSnap();" class="btn btn-outline-primary btn-lg btn-block b mt-2">Save Picture</button>

    <div id="camera"  class="container text-center d-flex "></div> 
    <button id="btn" onclick="take_picture();" class="btn btn-outline-primary btn-lg btn-block b">Take Picture</button>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script>
  Webcam.set({
    width:650,
    height:500,
    image_format:'jpeg',
    jpeg_quality:90
  });
  Webcam.attach("#camera");

function take_picture(){
  Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results').innerHTML = 
  '<img src="'+data_uri+'"/>';
  var a = document.getElementById('results').innerHTML;
  Webcam.reset();
  var x = document.getElementById("btn");
  x.style.display = "none";
  document.getElementById("camera").style.display = "none";
   document.getElementById("save").style.display = "block";
} );
}

function saveSnap(){
 // Get base64 value from <img id='imageprev'> source
 var base64image = document.getElementById("results").src;

 Webcam.upload( base64image, 'upload.php', function(code, text) {
  console.log('Save successfully');
  //console.log(text);
 });

}

</script>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>