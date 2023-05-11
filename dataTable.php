<?php
date_default_timezone_set('Asia/Taipei');
date('Y-m-d h:i A');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BAYAWAN WATER LEVEL MONITORING</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.png.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!--Jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="jquery/3.2.1/jquery-3.5.1.min.js"></script>
  <script src="jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
  <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
  </head>
<body>

<div>
  <img src= "img/WebBanner.png" height="150" width="1370s">
</div>
<?php include 'header.php';?>

<?php include 'dashboard.php';?>

<div class="table_report">

</div>

<script>
$(document).ready(function() {
  function table_report(){
      $.ajax({
        url: "table_report.php",
        type:'GET',
        success: function(result){
           $('.table_report').html(result);
            $('#example').DataTable( {
                "order": [[ 0, "desc" ]]
            } );
        }
      });
  }
    setInterval(function(){ table_report() }, 3000);
    table_report();
   
} );
</script>  
</body>
</html>
