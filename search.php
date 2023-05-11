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

<div class="container rounded p-3 my-3 border vertical-scrollbar" style="width: 300px; height: 350px; background-color: rgb(255,105,180);">
<h1>Please Select</h1><br>
  <form action="/search.php" method="get" id="form1">
      <h3><input type="radio" name="info" <?php if (isset($info) && $info=="graph") echo "checked";?> value="graph" required> GRAPH </h3>
      <h3><input type="radio" name="info" <?php if (isset($info) && $info=="data") echo "checked";?> value="data" required> DATA </h3><br>
      <input type="date" id="datepicker" class="form-control input-sm datetime" name="datetime" required>  
        <div class="row pt-3">
            <div class="col-sm-12 text-center rounded-pill">
                <button id="btnReset" class="btn btn-default btn-md center-block" type="reset" value="Reset" Style="width: 100px;" OnClick="btnSearch_Click" >RESET</button>
                <button id="btnSubmit" class="btn btn-primary btn-md center-block" type="submit" button  form="form1" value="Submit" Style="width: 100px;" OnClick="btnClear_Click" >SUMBIT</button>
            </div>
        </div>
  </form>
</div>

<script>
</script>
</body>

</html> 