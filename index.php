<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Electricity Calculator</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Electricity Calculator</h2>
    <form method="post" action="index.php">
        <div class="form-group">
            <label for="voltage">Voltage (V):</label>
            <input type="number" step="0.01" min="0" class="form-control" id="voltage" name="voltage" required>
        </div>
        <div class="form-group">
            <label for="current">Current (A):</label>
            <input type="number" step="0.01" min="0" class="form-control" id="current" name="current" required>
        </div>
        <div class="form-group">
            <label for="rate">Current Rate (sen/kWh):</label>
            <input type="number" step="0.01" min="0" class="form-control" id="rate" name="rate" required>
        </div>
        <input type="submit" value="Calculate">
    </form>
</div>


<?php 
    if ($_POST){
    $voltage=$_POST["voltage"];
    $current=$_POST["current"];
    $rate=$_POST["rate"];
    $rate=$rate/100;
    $power = ($voltage * $current)/1000;
    echo "<br>";
    echo"<div class='alert alert-primary' role='alert'>";
    echo"<h2 class='mt-5'>Result</h2>";
    echo"<p>Power: $power kW</p>";
    echo "<p>Rate: RM $rate</p>";
    echo "</div> ";
    
    
    echo "<table class='table'>";
    echo " <tr>
      <th >#</th>
      <th >Hour</th>
      <th >Energy (kWh)</th>
      <th >TOTAL (RM)</th>
    </tr>";
    for ($hour = 1; $hour <= 24; $hour++) {
        $energy = ($power * $hour);
        $totalCharge = round($energy*$rate,2) ;
        
     echo" <tr>
        <th>$hour</th>
        <td>$hour</td>
        <td>$energy</td>
        <td>$totalCharge</td>
      </tr>";
      
    }
    echo "</table>";
}
?>
</body>
</html>

