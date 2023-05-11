
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BAYAWAN WATER LEVEL MONITORING</title>

  <!-- Jquery -->
  <script src="jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Jquery -->
  <script src="jquery/3.2.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>
<?php include 'header.php';?>
<?php include 'dashboard.php';?>

      <!-- <div class="container p-3 my-3 border">
        <input type="date" id="datepicker" class="form-control input-sm datetime" name="datetime">    
    </div> -->

<!-- <div class="mh-100" style="width: 100px; height: 200px; background-color: rgba(0,0,255,0.1);">Max-height 100%</div> -->


<!-- <input type="text" value="Hello World" id="myInput">
<button onclick="myFunction()">Copy text</button>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script> -->

<!-- <?php echo "Hello World!"; ?> -->



<div class="parent-container d-flex">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container-fluid p-3 my-3 border vertical-scrollbar" style="width: 700px; height: 600px; background-color: rgba(129, 207, 224, 1);">
<label for="textdata"><h1><center>TEXT DATA</center></h1></label>
<textarea class="form-control rounded-0" id="textdata" rows="20">
Bayawan City Local Flood Early Warning System Updates 
As of 8:05 AM on  <?php
              date_default_timezone_set("Asia/Manila");
              echo date('M d, Y');
              ?> 
Automatic Water Level Station Report (cm) 
Stations(Normal Water)------------Previous-------------Current  
Kalamtukan(35cm)-----------------(63.2)Green----------(51.3)Green
Kalumboyan NewBridge(35cm)----(52.0)Green---------(51.5)Green
Kalumboyan Spillway(35cm)-------Under Maintenance
Jugno,Nangka(35cm)--------------(76.0)Green----------(76.0)Green
Canalum(35cm)--------------------(87.4)Green----------(86.00)Green
Bayawan Bridge(35cm)------------(76.8)Green----------(76.8)Green
Tide Level------------(76.8)Green--------(76.8)Green
</textarea>
<button onclick="myFunction()">Copy text</button>

</div>
    </div>
        </div>
            </div>

<script>
    function myFunction() {
        var copyText = document.getElementById("textdata");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);
        }
</script>
                

    <div class="container">
        <div class="row">
            <div class="col">
            
            <div class="container-fluid p-3 my-3 border vertical-scrollbar" style="width: 700px; height: 600px; background-color: rgba(129, 207, 224, 1);">
            <label for="exampleFormControlTextarea2"><h1><center>TABLE  DATA</center></h1></label>
    <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="20">
   
    



    </textarea>
    </div>
    </div>
            </div>
            </div>
        </div>
    </div>
</div>


<!-- 
<div class="container-fluid p-3 my-3 border vertical-scrollbar" style="width: 500px; height: 700px; background-color: rgba(129, 207, 224, 1);">
    <p>
    Bayawan City Local Flood Early Warning System Updates<br> 
    As of 8:05 AM on January 13, 2021 <br>
    Automatic Water Level Station Report (cm) <br>
    Stations----------------Previous------------Current <br>
    Kalamtukan------------(63.2)Green-------(51.3)Green<br>
    Kalumboyan NewBridge--(52.0)Green-----(51.5)Green<br>
    Kalumboyan Spillway--------Under Maintenance<br>
    Jugno,Nangka---------(76.0)Green------(76.0)Green<br>
    Canalum --------------(87.4)Green--------(86.00)Green<br>
    Bayawan Bridge-------(76.8)Green--------(76.8)Green<br>
    Tide Level------------(76.8)Green--------(76.8)Green<br>
    </p><br>
    <span><center>As of 8:05 AM on January 13, 2021</span> <br>
    <span>Automatic Water Level Station Report (cm)

Alert Level status for categorized flood prone area
Very high Flood Susceptibility---------Level 1
High Flood Susceptibility--------------Level 1
Moderate Flood Susceptibility---------Level 1
Low Flood Susceptibility---------------Level 1
Legend:
Alert Level 1 = Wait for updates and stay informed
Alert Level 2 = Prepare for possible preemptive
Evacuation, all DRRMO and CPSO personnel proceed to
command center
Alert Level 3 = Pre-emptive Evacuation
Alert Level 4 = Evacuate now and proceed to designated
Evacuation Center
Very high Flood Susceptibility
Banga - Purok 4 Cansig-id
Maninihon - Portions of Sitio Division
Nangka - Ondol Portions of Canalum and Candalaga
Pagatban(Purok 7 and Purok 8 )
Poblacion (Plywood and San Ramon)
Suba (areas within 50 meters from river bank)
Ubos (Balataong and portions of Camote near river
bank)
Villareal (Camote and Sampaguita))
High Flood Susceptibility
Banga - Purok 1
Nangka (Jugno, Proper Nangka, Upper and Lower
Tan-ayan, Lower Calidawan and Manaol)
Suba(Areas within 150 meters from river bank)
Villareal (Makiangayon and Masagana)
Moderate Flood Susceptibility
Banga (Purok 3 Cambulo)
Kalumboyan (Portions of Proper Kalumboyan and
Shangrila)
Malabugas (Lower Purok 2, Proper Malabugas and Lower
Purok 3)
Maninihon (Lower Napit-an)
Nangka(Himulaos, Candalaga and Hinaki)
Pagatban(Purok 3, 4 and 5)
Poblacion (MH Del Pilar)
Suba (Zamora St corner Quindo Street)
Tabuan (Lower Dita, Lower and Uppwer)
Tinago (Purok 6, Purok 7 and Purok 8 )
Ubos (Malunggay, Gabi and Talong(Burgos))
Villareal (San Vicente)
Low Flood Susceptibility
Banga (Purok 2 and Purok 4)
Boyco(Parts of Pasil, Purok 5, Recto St and Bollos St)
Kalumboyan(Portions of Proper Kalumboyan)
Malabugas (Lower Purok 1(Pasil)
Maninihon (Upper Napit-an)
Nangka(Mantapi and Portions of Candumaing)
Pagatban(Purok 1, Purok 2, and Purok 6)
Poblacion (Melchora Aquino, Emilio Jacinto)
Suba(Teologio St, Zamora St, Quindo St and Mabini
Tinago(Purok 9), Ubos(Camote (Eastern Part)
Villareal(Gmelina, Pagkakaisa)
BE UPDATED, BE ALERT, BE PREPARED</span>
</div> -->

</bod>
</html>