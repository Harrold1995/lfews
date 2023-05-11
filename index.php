
<!DOCTYPE html>
<html lang="en">

<head>
<div>
<link rel="stylesheet" href="css/style.css">
</div>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" type ="image/png" href="img/favicon.png.png">
  <title>BAYAWAN CITY WATER LEVEL MONITORING</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">
<!-- Jquery -->
<script src="jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>


<body>

<div class="webBanner"> 
  <img src= "img/WebBanner.png" height="180" width="100%">
</div>

<?php include 'header.php';?>

<?php include 'dashboard.php';?>
  
  <div class="row">
      <div class="col-sm-4 bordered">
      <!-- <h2 align="center">BAYAWAN BRIDGE </h2> -->
        <iframe style="width:100%;height:350px;" frameBorder="0" src="http://localhost/waterlevel/bayawan_bridge.php">
        </iframe>
      </div>

      <div class="col-sm-4 bordered">
      <!-- <h2 align="center">CANALUM</h2> -->
        <iframe  style="width:100%;height:350px;" frameBorder="0" src="http://localhost/waterlevel/canalum.php">
        </iframe>
      </div>

      <div class="col-sm-4 bordered">
      <!-- <h2 align="center">JUGNO</h2> -->
        <iframe  style="width:100%;height:350px;" frameBorder="0"  src="http://localhost/waterlevel/jugno.php">
        </iframe>
      </div>

      <div class="col-sm-4 bordered">
      <!-- <h2 align="center">KALUMBOYAN SPILLWAY</h2> -->
        <iframe  style="width:100%;height:350px;" frameBorder="0"  src="http://localhost/waterlevel/kalumboyan.php">
        </iframe>
      </div>

      <div class="col-sm-4 bordered">
      <!-- <h2 align="center">KALUMBOYAN BRIDGE</h2> -->
      <iframe  style="width:100%;height:350px;"  frameBorder="0" src="http://localhost/waterlevel/kalumboyan_bridge.php">
      </iframe>
      </div>
      
      <div class="col-sm-4 bordered" >
      <!-- <h2 align="center">KALAMTUKAN</h2> -->
        <iframe  style="width:100%;height:350px;" frameBorder="0" src="http://localhost/waterlevel/kalamtukan.php">
        </iframe>
      </div>
  </div> 

    <!-- JQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
 
  <script>
  
    $(function(){


        function save_data(){
            
            $.ajax({
              url: "savedata.php",
              success: function(result){
                     console.log(result);
              }
            });

        }
              setInterval(function(){ save_data() }, 1000);

    });
  </script>
</body>

</html> 