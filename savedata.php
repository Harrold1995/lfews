<?php
    require_once('con_db.php');
?>

<?php
date_default_timezone_set('Asia/Taipei');
echo date('Y-m-d h:i A');
echo "<br/>";
session_start();


if(isset($_POST['location']) && $_POST['location'] == 'bayawan bridge'){
    // elise ni gikan sa server katong mainDisplay.cgi url
    $from_server_page = file_get_contents('http://192.168.41.15/parameters.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $normalwater = []; 
    $sensordata = [];
    $distance = [];
    $actualdata = [];
        foreach($x->query('//input[@type="TEXT" and @name = "val5"]/@value') as $td){
            $normalwater[] = $td->C14N();
        }
        foreach($x->query('//input[@name = "vali"]/@value') as $tds){

            $sensordata[] = $tds->C14N();
        }
        foreach($x->query('//td') as $td){
            $distance[] = $td->C14N();
                //if just need the text use:
            //echo $td->textContent;   
        }
    $normalwater = (float) filter_var( $normalwater[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $sensordata = (float) filter_var( $sensordata[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );        
    $distance = (float) filter_var( $distance[86], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $colorCode = "";
    $from_server_page = file_get_contents('http://192.168.41.15/MainDisplay.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $tabledata = [];
        foreach($x->query('//td') as $td){
            // if(){   
            // }
            @$tabledata[] = $td->textContent;
            // $tabledata[] = $td
            // echo json_encode($td->C14N());
            //if just need the text use:
        }
    $reported_data = [
        'device' => $tabledata[0],
        'type' => $tabledata[1],
        'amount' => $tabledata[2],
        'unit' => $tabledata[3],
        ];
        // echo "<pre>";
    $labels = [];
    $data_amount = [];
    $time =  date('h');
    $time_convention =  date('A');
    $min = date('i');       
        for ($i = 0; $i < 60; $i++){
            // $labels[] = $time.":".(( $i > 1) ? $i." mins":$i. " min");
            $labels[] = $time.":".$i." ".$time_convention;
            if($min >= $i){
                if($min == $i){
                    if($sensordata > $distance){            //5.751  > 4.440
                        $currentbayawan =  $sensordata - $distance;   //5.751-4.440 = 1.311            
                        $currentbayawan =  $currentbayawan+$normalwater;      //1.311 + 0.305 = 1.616  to 161.6 mao ni scenario 1
                    }
                    elseif($sensordata == $distance){
                        $currentbayawan = $normalwater;

                    }else{
                        $currentbayawan =  $distance-$sensordata;
                        $currentbayawan =  $currentbayawan+$normalwater;
                    }  
                    
                    $amt = $currentbayawan*100;
                    if($amt <= 100){
                        $colorCode = "rgba(44, 130, 201, 1)"; //blue
                    }
                    if($amt <= 200 && $amt > 100){
                        $colorCode = "rgba(0, 230, 64, 1)"; //green
                    }
                    if($amt <= 300  && $amt > 200){
                        $colorCode = "rgba(247, 202, 24, 1)";
                    }
                    if($amt <= 400   && $amt > 300){
                        $colorCode = "rgba(232, 126, 4, 1)";
                    }
                    if($amt <= 500  && $amt > 400){
                        $colorCode = "rgba(207, 0, 15, 1)";
                    }
                $_SESSION['bayawan_bridge']['minutes'][$i] = $currentbayawan*100; //to centimeters
            }
            @$data_amount[$i] =  $_SESSION['bayawan_bridge']['minutes'][$i];
        }   
    }
                $data['colorCode'] =$colorCode;
                $data['sensordata'] =$sensordata;
                $data['distance'] =$distance;
                $data['normalwater'] =$normalwater;
                $data['unit'] = $reported_data['unit'];
                $data['labels'] = $labels;
                $data['data_amount'] = $data_amount;
        // print_r($labels);
        echo json_encode($data);
}
if(isset($_POST['location']) && $_POST['location'] == 'canalum'){
    $from_server_page = file_get_contents('http://192.168.41.13/parameters.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $normalwater = []; 
    $sensordata = [];
    $distance = [];
    $actualdata = [];
        foreach($x->query('//input[@type="TEXT" and @name = "val5"]/@value') as $td){
            $normalwater[] = $td->C14N();
        }
        foreach($x->query('//input[@name = "vali"]/@value') as $tds){
            $sensordata[] = $tds->C14N();
        }
        foreach($x->query('//td') as $td){

            $distance[] = $td->C14N();
        }
    $normalwater = (float) filter_var( $normalwater[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $sensordata = (float) filter_var( $sensordata[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );        
    $distance = (float) filter_var( $distance[86], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $colorCode = "";
    $from_server_page = file_get_contents('http://192.168.41.13/MainDisplay.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $tabledata = [];
        foreach($x->query('//td') as $td){
            @$tabledata[] = $td->textContent;
        }
        $reported_data = [
            'device' => $tabledata[0],
            'type' => $tabledata[1],
            'amount' => $tabledata[2],
            'unit' => $tabledata[3],
        ];
        $labels = [];
        $data_amount = [];
        $time =  date('h');
        $time_convention =  date('A');
        $min = date('i');       
    for ($i = 0; $i < 60; $i++){
        $labels[] = $time.":".$i." ".$time_convention;
        if($min >= $i){
            if($min == $i){
                if($sensordata > $distance){            //5.751  > 4.440
                    $currentcanalum =  $sensordata - $distance;   //5.751-4.440 = 1.311            
                    $currentcanalum =  $currentcanalum+$normalwater;      //1.311 + 0.305 = 1.616  to 161.6 mao ni scenario 1
                }
                elseif($sensordata == $distance){
                    $currentcanalum = $normalwater;

                }else{
                    $currentcanalum =  $distance-$sensordata;
                    $currentcanalum =  $currentcanalum+$normalwater;
                }  
                $amt = $currentcanalum*100;
                if($amt <= 100){
                    $colorCode = "rgba(44, 130, 201, 1)"; //blue
                }
                if($amt <= 200 && $amt > 100){
                    $colorCode = "rgba(0, 230, 64, 1)"; //green
                }
                if($amt <= 300  && $amt > 200){
                    $colorCode = "rgba(247, 202, 24, 1)"; //yellow
                }
                if($amt <= 400   && $amt > 300){
                    $colorCode = "rgba(232, 126, 4, 1)"; //orange
                }
                if($amt <= 500  && $amt > 400){
                    $colorCode = "rgba(207, 0, 15, 1)"; //red
                }
            $_SESSION['canalum']['minutes'][$i] = $currentcanalum*100; //to centimeters
        }
        @$data_amount[$i] =  $_SESSION['canalum']['minutes'][$i];
    }   
}
            $data['colorCode'] =$colorCode;
            $data['sensordata'] =$sensordata;
            $data['distance'] =$distance;
            $data['normalwater'] =$normalwater;
            $data['unit'] = $reported_data['unit'];
            $data['labels'] = $labels;
            $data['data_amount'] = $data_amount;
        echo json_encode($data);
}
if(isset($_POST['location']) && $_POST['location'] == 'jugno'){
    $from_server_page = file_get_contents('http://192.168.41.14/parameters.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $normalwater = []; 
    $sensordata = [];
    $actualdata = [];
    $distance = [];
        foreach($x->query('//input[@type="TEXT" and @name = "val5"]/@value') as $td){
            $normalwater[] = $td->C14N();
        }
        foreach($x->query('//input[@name = "vali"]/@value') as $tds){
            $sensordata[] = $tds->C14N();
        }
        foreach($x->query('//td') as $td){
            $distance[] = $td->C14N();
        }
    $normalwater = (float) filter_var( $normalwater[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $sensordata = (float) filter_var( $sensordata[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );        
    $distance = (float) filter_var( $distance[86], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $colorCode = "";
    $from_server_page = file_get_contents('http://192.168.41.14/MainDisplay.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $tabledata = [];
    foreach($x->query('//td') as $td){
        @$tabledata[] = $td->textContent;
    }
    $reported_data = [
        'device' => $tabledata[0],
        'type' => $tabledata[1],
        'amount' => $tabledata[2],
        'unit' => $tabledata[3],
    ];
    $labels = [];
    $data_amount = [];
    $time =  date('h');
    $time_convention =  date('A');
    $min = date('i');       
    for ($i = 0; $i < 60; $i++){
        $labels[] = $time.":".$i." ".$time_convention;
        if($min >= $i){
            if($min == $i){
                if($sensordata > $distance){            //5.751  > 4.440
                    $currentjugno =  $sensordata - $distance;   //5.751-4.440 = 1.311            
                    $currentjugno =  $currentjugno+$normalwater;      //1.311 + 0.305 = 1.616  to 161.6 mao ni scenario 1 taas tubig
                }
                elseif($sensordata == $distance){
                    $currentjugno = $normalwater;
                }else{
                    $currentjugno =  $distance-$sensordata;
                    $currentjugno =  $currentjugno+$normalwater;
                }  
                $amt = $currentjugno*100;
                if($amt <= 30.4){
                    $colorCode = "rgba(44, 130, 201, 1)"; //blue
                }
                if($amt <= 50 && $amt > 30.5){
                    $colorCode = "rgba(0, 230, 64, 1)"; //green
                }
                if($amt <= 70 && $amt > 50){
                    $colorCode = "rgba(247, 202, 24, 1)"; //yellow
                }
                if($amt <= 90   && $amt > 70){
                    $colorCode = "rgba(232, 126, 4, 1)"; //orange
                }
                if($amt <= 110  && $amt > 90){
                    $colorCode = "rgba(207, 0, 15, 1)"; //red
                }

                $_SESSION['jugno']['minutes'][$i] = $currentjugno*100; //to centimeters
            }
            @$data_amount[$i] =  $_SESSION['jugno']['minutes'][$i];
        }   
    }
        $data['colorCode'] =$colorCode;
        $data['sensordata'] =$sensordata;
        $data['distance'] =$distance;
        $data['normalwater'] =$normalwater;
        $data['unit'] = $reported_data['unit'];
        $data['labels'] = $labels;
        $data['data_amount'] = $data_amount;
    echo json_encode($data);
}
if(isset($_POST['location']) && $_POST['location'] == 'kalumboyanspillway'){
    $from_server_page = file_get_contents('http://192.168.41.12/parameters.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $normalwater = []; 
    $sensordata = [];
    $actualdata = [];
        foreach($x->query('//input[@type="TEXT" and @name = "val5"]/@value') as $td){
            $normalwater[] = $td->C14N();
        }
        foreach($x->query('//input[@name = "vali"]/@value') as $tds){
            $sensordata[] = $tds->C14N();
        }
        foreach($x->query('//td') as $td){
            $distance[] = $td->C14N();
        }
    $normalwater = (float) filter_var( $normalwater[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $sensordata = (float) filter_var( $sensordata[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );        
    $distance = (float) filter_var( $distance[86], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $colorCode = "";
    $from_server_page = file_get_contents('http://192.168.41.12/MainDisplay.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $tabledata = [];
        foreach($x->query('//td') as $td){
            @$tabledata[] = $td->textContent;
        }
        $reported_data = [
            'device' => $tabledata[0],
            'type' => $tabledata[1],
            'amount' => $tabledata[2],
            'unit' => $tabledata[3],
        ];
    $labels = [];
    $data_amount = [];
    $time =  date('h');
    $time_convention =  date('A');
    $min = date('i');       
    for ($i = 0; $i < 60; $i++){
        $labels[] = $time.":".$i." ".$time_convention;
        if($min >= $i){
            if($min == $i){

                if($sensordata > $distance){            //5.751  > 4.440
                    $currentkal_spillway =  $sensordata - $distance;   //5.751-4.440 = 1.311            
                    $currentkal_spillway =  $currentkal_spillway+$normalwater;      //1.311 + 0.305 = 1.616  to 161.6 mao ni scenario 1
                }
                elseif($sensordata == $distance){
                    $currentkal_spillway = $normalwater;

                }else{
                    $currentkal_spillway =  $distance-$sensordata;
                    $currentkal_spillway =  $currentkal_spillway+$normalwater;
                }  
                
                $amt = $currentkal_spillway*100;
                if($amt <= 100){
                    $colorCode = "rgba(44, 130, 201, 1)"; //blue
                }
                if($amt <= 200 && $amt > 100){
                    $colorCode = "rgba(0, 230, 64, 1)"; //green
                }
                if($amt <= 300  && $amt > 200){
                    $colorCode = "rgba(247, 202, 24, 1)"; //yellow
                }
                if($amt <= 400   && $amt > 300){
                    $colorCode = "rgba(232, 126, 4, 1)"; //orange
                }
                if($amt <= 500  && $amt > 400){
                    $colorCode = "rgba(207, 0, 15, 1)"; //red
                }

                $_SESSION['kalumboyanspillway']['minutes'][$i] = $currentkal_spillway*100; //to centimeters
            }
            @$data_amount[$i] =  $_SESSION['kalumboyanspillway']['minutes'][$i];
        }   
    }
        $data['colorCode'] =$colorCode;
        $data['sensordata'] =$sensordata;
        $data['distance'] =$distance;
        $data['normalwater'] =$normalwater;
        $data['unit'] = $reported_data['unit'];
        $data['labels'] = $labels;
        $data['data_amount'] = $data_amount;
    echo json_encode($data);
}
if(isset($_POST['location']) && $_POST['location'] == 'kalumboyanbridge'){
    $from_server_page = file_get_contents('http://192.168.41.11/parameters.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $normalwater = []; 
    $sensordata = [];
    $actualdata = [];
        foreach($x->query('//input[@type="TEXT" and @name = "val5"]/@value') as $td){
            $normalwater[] = $td->C14N();
        }
        foreach($x->query('//input[@name = "vali"]/@value') as $tds){
            $sensordata[] = $tds->C14N();
        }
        foreach($x->query('//td') as $td){
            $distance[] = $td->C14N();
      }
    $normalwater = (float) filter_var( $normalwater[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $sensordata = (float) filter_var( $sensordata[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );        
    $distance = (float) filter_var( $distance[86], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $colorCode = "";
    $from_server_page = file_get_contents('http://192.168.41.11/MainDisplay.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $tabledata = [];
    foreach($x->query('//td') as $td){
        @$tabledata[] = $td->textContent;
    }
    $reported_data = [
        'device' => $tabledata[0],
        'type' => $tabledata[1],
        'amount' => $tabledata[2],
        'unit' => $tabledata[3],
    ];
    $labels = [];
    $data_amount = [];
    $time =  date('h');
    $time_convention =  date('A');
    $min = date('i');       
    for ($i = 0; $i < 60; $i++){
        $labels[] = $time.":".$i." ".$time_convention;
        if($min >= $i){
            if($min == $i){
                if($sensordata > $distance){            //5.751  > 4.440
                    $currentkal_bridge =  $sensordata - $distance;   //5.751-4.440 = 1.311            
                    $currentkal_bridge =  $currentkal_bridge+$normalwater;      //1.311 + 0.305 = 1.616  to 161.6 mao ni scenario 1
                }
                elseif($sensordata == $distance){
                    $currentkal_bridge = $normalwater;

                }else{
                    $currentkal_bridge =  $distance-$sensordata;
                    $currentkal_bridge =  $currentkal_bridge+$normalwater;
                }  
                $amt = $currentkal_bridge*100;
                if($amt <= 100){
                    $colorCode = "rgba(44, 130, 201, 1)"; //blue
                }
                if($amt <= 200 && $amt > 100){
                    $colorCode = "rgba(0, 230, 64, 1)"; //green
                }
                if($amt <= 300  && $amt > 200){
                    $colorCode = "rgba(247, 202, 24, 1)"; //yellow
                }
                if($amt <= 400   && $amt > 300){
                    $colorCode = "rgba(232, 126, 4, 1)"; //orange
                }
                if($amt <= 500  && $amt > 400){
                    $colorCode = "rgba(207, 0, 15, 1)"; //red
                }
                $_SESSION['kalumboyanbridge']['minutes'][$i] = $currentkal_bridge*100; //to centimeters
            }
            @$data_amount[$i] =  $_SESSION['kalumboyanbridge']['minutes'][$i];
        }   
    }
                $data['colorCode'] =$colorCode;
                $data['sensordata'] =$sensordata;
                $data['distance'] =$distance;
                $data['normalwater'] =$normalwater;
                $data['unit'] = $reported_data['unit'];
                $data['labels'] = $labels;
                $data['data_amount'] = $data_amount;
    echo json_encode($data);
}
if(isset($_POST['location']) && $_POST['location'] == 'kalamtukan'){
    $from_server_page = file_get_contents('http://192.168.41.10/parameters.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $normalwater = []; 
    $sensordata = [];
    $actualdata = [];
        foreach($x->query('//input[@type="TEXT" and @name = "val5"]/@value') as $td){
            $normalwater[] = $td->C14N();
        }
        foreach($x->query('//input[@name = "vali"]/@value') as $tds){
            $sensordata[] = $tds->C14N();
        }
        foreach($x->query('//td') as $td){
            $distance[] = $td->C14N();
       }
    $normalwater = (float) filter_var( $normalwater[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $sensordata = (float) filter_var( $sensordata[0], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );        
    $distance = (float) filter_var( $distance[86], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    $colorCode = "";
    $from_server_page = file_get_contents('http://192.168.41.10/MainDisplay.cgi');
    $dom = new \domDocument();
    @$dom->loadHtml($from_server_page);
    $x = new \DOMXpath($dom);
    $tabledata = [];
    foreach($x->query('//td') as $td){
        @$tabledata[] = $td->textContent;
    }
    $reported_data = [
        'device' => $tabledata[0],
        'type' => $tabledata[1],
        'amount' => $tabledata[2],
        'unit' => $tabledata[3],
    ];
    $labels = [];
    $data_amount = [];
    $time =  date('h');
    $time_convention =  date('A');
    $min = date('i');       
    for ($i = 0; $i < 60; $i++){
        $labels[] = $time.":".$i." ".$time_convention;
        if($min >= $i){
            if($min == $i){
                if($sensordata > $distance){            //5.751  > 4.440
                    $currentkalamtukan =  $sensordata - $distance;   //5.751-4.440 = 1.311            
                    $currentkalamtukan =  $currentkalamtukan+$normalwater;      //1.311 + 0.305 = 1.616  to 161.6 mao ni scenario 1
                }
                elseif($sensordata == $distance){
                    $currentkalamtukan = $normalwater;
                }else{
                    $currentkalamtukan =  $distance-$sensordata;
                    $currentkalamtukan =  $currentkalamtukan+$normalwater;
                }  
                $amt = $currentkalamtukan*100;
                if($amt <= 100){
                    $colorCode = "rgba(44, 130, 201, 1)"; //blue
                }
                if($amt <= 200 && $amt > 100){
                    $colorCode = "rgba(0, 230, 64, 1)"; //green
                }
                if($amt <= 300  && $amt > 200){
                    $colorCode = "rgba(247, 202, 24, 1)"; //yellow
                }
                if($amt <= 400   && $amt > 300){
                    $colorCode = "rgba(232, 126, 4, 1)"; //orange
                }
                if($amt <= 500  && $amt > 400){
                    $colorCode = "rgba(207, 0, 15, 1)"; //red
                }
                $_SESSION['kalamtukan']['minutes'][$i] = $currentkalamtukan*100; //to centimeters
            }
            @$data_amount[$i] =  $_SESSION['kalamtukan']['minutes'][$i];
        }   
    }
            $data['colorCode'] =$colorCode;
            $data['sensordata'] =$sensordata;
            $data['distance'] =$distance;
            $data['normalwater'] =$normalwater;
            $data['unit'] = $reported_data['unit'];
            $data['labels'] = $labels;
            $data['data_amount'] = $data_amount;
    echo json_encode($data);
}
// echo "LFEWS";
$sec = date('s'); 
 if($sec >= 30 && $sec <= 59){


 $min = date('i'); 
 $data_array = [];      
 for ($i = 0; $i < 60; $i++){
     $data_array[$i] = [
         'minutes' => $i,
         'bayawan_bridge' => @$_SESSION['bayawan_bridge']['minutes'][$i],
         'canalum' => @$_SESSION['canalum']['minutes'][$i],
         'jugno' => @$_SESSION['jugno']['minutes'][$i],
         'kalumboyanspillway' => @$_SESSION['kalumboyanspillway']['minutes'][$i],
         'kalumboyanbridge' => @$_SESSION['kalumboyanbridge']['minutes'][$i],
         'kalamtukan' => @$_SESSION['kalamtukan']['minutes'][$i],
     ];
 }

 $min = (float)$min;

 $bayawan_bridge = $data_array[$min]['bayawan_bridge'];
 $canalum = $data_array[$min]['canalum'];
 $jugno = $data_array[$min]['jugno'];
 $kalumboyanspillway = $data_array[$min]['kalumboyanspillway'];
 $kalumboyanbridge = $data_array[$min]['kalumboyanbridge'];
 $kalamtukan = $data_array[$min]['kalamtukan'];
 $minutes = $data_array[$min]['minutes'];

 $sql = "INSERT INTO `waterleveldata` (`id`, `minutes`, `bayawan`, `canalum`, `jugno`, `kalumboyan_spillway`, `kalumboyan_bridge`, `kalamtukan`, `data_taken`) VALUES (NULL, '$minutes', '$bayawan_bridge', '$canalum', '$jugno', '$kalumboyanspillway', '$kalumboyanbridge', '$kalamtukan', CURRENT_TIMESTAMP);";

  if(isset($_POST['location']) && $_POST['location'] == 'bayawan bridge'){
 $servername = "localhost";
 $username = "root";
 $password = "admin1234";
 $dbname = "waterlevel1";
 //Create connection
 $mysqli = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if (!$mysqli) {
       die("Connection failed: " . mysqli_connect_error());
 }


     $date_min = date('Y-m-d h:i A');

     $result =  $mysqli->query("SELECT count(*) as existing FROM waterleveldata WHERE data_taken LIKE '%$date_min%'");

     $data= mysqli_fetch_assoc($result);
     if($data['existing'] == 0){
         $s = $mysqli->query($sql);
     }
 }
 }


echo "data save";



