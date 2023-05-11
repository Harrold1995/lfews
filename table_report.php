<?php
$servername = "localhost";
$username = "root";
$password = "admin1234";
$dbname = "waterlevel1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
// echo "Connected successfully";


date_default_timezone_set('Asia/Taipei');
date('Y-m-d h:i A');


$sql = "SELECT * FROM `waterleveldata` ORDER BY `waterleveldata`.`id` DESC"; //limit 60
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  ?>
  <table id="example" class="table table-bordered table-condensed table-sm table-hover ">
   <thead class="bg-info">
    <tr>
        <th><b>Data Taken</b></th>
       <th><b>Bayawan (300.99 cm)</b></th>
       <th><b>Canalum (37.60 cm)</b></th>
       <th><b>Jugno (300.99 cm)</b></th>
        <th><b>Kalumboyan Spillway (35 cm)</b></th>
        <th><b>Kalumboyan Bridge (53.20 cm)</b></th>
      <th><b>Kalamtukan (90.99 cm)</b></th>
      
      </tr>
</thead>
<tbody>
 <?php

 //function for color code
function colorcellbayawan($amt){
  $colorCode="gray";

  // $amt=$currentbayawan+$normalwater;
  if($amt <= 300.99){
      $colorCode = "rgba(44, 130, 201, 1)"; //blue
  }
  if($amt <= 490.99 && $amt > 301){
      $colorCode = "rgba(0, 230, 64, 1)"; //green
  }
  if($amt <= 520  && $amt > 491){
      $colorCode = "rgba(247, 202, 24, 1)"; //yellow
  }
  if($amt <= 620.99   && $amt > 521){
      $colorCode = "rgba(232, 126, 4, 1)"; //orange
  }
  if($amt >= 621){
      $colorCode = "rgba(207, 0, 15, 1)"; //red
  }
  return $colorCode;
}

function colorcellcanalum($amt){
  $colorCode="gray";

  if($amt <= 37.60){
      $colorCode = "rgba(44, 130, 201, 1)"; //blue
  }
  if($amt <= 120.99 && $amt > 37.70){
      $colorCode = "rgba(0, 230, 64, 1)"; //green
  }
  if($amt <= 270.99  && $amt > 121){
      $colorCode = "rgba(247, 202, 24, 1)"; //yellow
  }
  if($amt <= 369.99   && $amt > 271){
      $colorCode = "rgba(232, 126, 4, 1)"; //orange
  }
  if($amt >= 370){
      $colorCode = "rgba(207, 0, 15, 1)"; //red
  }
  return $colorCode;
}

function colorcelljugno($amt){
  $colorCode="gray";

  if($amt <= 37.60){
      $colorCode = "rgba(44, 130, 201, 1)"; //blue
  }
  if($amt <= 120.99 && $amt > 37.70){
      $colorCode = "rgba(0, 230, 64, 1)"; //green
  }
  if($amt <= 270.99  && $amt > 121){
      $colorCode = "rgba(247, 202, 24, 1)"; //yellow
  }
  if($amt <= 369.99   && $amt > 271){
      $colorCode = "rgba(232, 126, 4, 1)"; //orange
  }
  if($amt >= 370){
      $colorCode = "rgba(207, 0, 15, 1)"; //red
  }
  return $colorCode;
}

function colorcellkalumboyan_spillway($amt){
  $colorCode="gray";

  if($amt <= 37.60 && $amt > 0){
      $colorCode = "rgba(44, 130, 201, 1)"; //blue
  }
  if($amt <= 120.99 && $amt > 37.70){
      $colorCode = "rgba(0, 230, 64, 1)"; //green
  }
  if($amt <= 270.99  && $amt > 121){
      $colorCode = "rgba(247, 202, 24, 1)"; //yellow
  }
  if($amt <= 369.99   && $amt > 271){
      $colorCode = "rgba(232, 126, 4, 1)"; //orange
  }
  if($amt <= 1000  && $amt > 370){
      $colorCode = "rgba(207, 0, 15, 1)"; //red
  }
  return $colorCode;
}

function colorcellkalumboyan_bridge($amt){
  $colorCode="gray";

  if($amt <= 53.20){
    $colorCode = "rgba(44, 130, 201, 1)"; //blue
}
if($amt <= 77.59 && $amt > 53.21){
    $colorCode = "rgba(0, 230, 64, 1)"; //green
}
if($amt <= 124.99  && $amt > 77.60){
    $colorCode = "rgba(247, 202, 24, 1)";//yellow
}
if($amt <= 169.99   && $amt > 125.00){
    $colorCode = "rgba(232, 126, 4, 1)";//orange
}
if($amt >= 170.00){
    $colorCode = "rgba(207, 0, 15, 1)";//red
  }
  return $colorCode;
}

function colorcellkalamtukan($amt){
  $colorCode="gray";
 
  if($amt <= 90 ){
    $colorCode = "rgba(44, 130, 201, 1)"; //blue
}
if($amt <= 120.99 && $amt > 91.00){
    $colorCode = "rgba(0, 230, 64, 1)"; //green
}
if($amt <= 150.99  && $amt > 121.00){
    $colorCode = "rgba(247, 202, 24, 1)";//yellow
}
if($amt <= 180.99   && $amt > 151.00){
    $colorCode = "rgba(232, 126, 4, 1)";//orange
}
if($amt >= 181.00){
    $colorCode = "rgba(207, 0, 15, 1)";//red
  }
  return $colorCode;
}
// output data of each row
while($row = $result->fetch_assoc()) {
  $colorcodebayawan = colorcellbayawan( $row["bayawan"]);
  $colorcodecanalum = colorcellcanalum( $row["canalum"]);
  $colorcodejugno = colorcelljugno( $row["jugno"]);
  $colorcodekalumboyan_spillway = colorcellkalumboyan_spillway( $row["kalumboyan_spillway"]);
  $colorcodekalumboyan_bridge = colorcellkalumboyan_bridge( $row["kalumboyan_bridge"]);
  $colorcodekalamtukan = colorcellkalamtukan( $row["kalamtukan"]);

      echo '<tr>';
      echo '<td >' . $row["data_taken"]. '</td>';
        echo '<td style="background:'.$colorcodebayawan.'; font-weight:bold; ">' . $row["bayawan"]. '</td>';
        echo '<td style="background:'.$colorcodecanalum.'; font-weight:bold; ">' . $row["canalum"]. '</td>';
        echo '<td style="background:'.$colorcodejugno.'; font-weight:bold; ">' . $row["jugno"]. '</td>';
        echo '<td style="background:'.$colorcodekalumboyan_spillway.'; font-weight:bold; ">' . $row["kalumboyan_spillway"]. '</td>';
        echo '<td style="background:'.$colorcodekalumboyan_bridge.'; font-weight:bold; ">' . $row["kalumboyan_bridge"]. '</td>';
        echo '<td style="background:'.$colorcodekalamtukan.'; font-weight:bold; ">' . $row["kalamtukan"]. '</td>';
      echo '</tr>';
}
?>
</tbody>
</table>
<?php
} else {
    echo "NO DATA FOUND";
}

$conn->close();



?>

