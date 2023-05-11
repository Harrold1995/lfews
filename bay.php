<?php include 'header.php';?>
<?php include 'dashboard.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BAYAWAN CITY WATER LEVEL MONITORING</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
<!-- Jquery -->
<script src="jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>


<body>

  <h2 align="center">BAYAWAN BRIDGE
<?php 

  require_once('con_db.php');
  $colorcodebayawan = "";
  $row = "";

  $bayawan_bridge = [0];

   echo '<td style="background:'.$colorcodebayawan.'; font-weight:bold; ">' . $row[`bayawan_bridge`]. '</td>';
?>
      </h2> 

  <!-- Start your project here-->
  <canvas id="lineChart"></canvas>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
 
  <script>
  
    $(document).ready(function(){
        var ctxL = document.getElementById("lineChart").getContext('2d');
      function fetch_data(){
        $.ajax({
            url:'data.php',
            type:'post',
            data:{
              'location': 'bayawan bridge'
            },

            success:function(data){

         
                var data = $.parseJSON(data);
                console.log(data);

                // return false;
              
                var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: data.labels,
                datasets: [{
                        // label: "BAYAWAN BRIDGE UNIT("+data.unit+")",
                        label: "BAYAWAN BRIDGE",
                        data:data.data_amount,
                        backgroundColor: [data.colorCode],
                        borderColor: [
                        'rgba(150, 99, 132, .7)',
                        ],
                        borderWidth: 2
                    },
                        
                ]

                },
                options: {
                    animation:false,
                   responsive: true
                }
                });
            }

       });
      }
      setInterval(function(){ fetch_data() }, 3000);
      


       
    })

</script>
</body>

</html> 