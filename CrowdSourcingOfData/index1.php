<!DOCTYPE html>
<html>
<title>An Extreme Essential Information about Covid Resources</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 75px;
  text-align: center;
  text-decoration: none;
  margin: 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}
</style>
<div class="w3-container w3-teal w3-margin-bottom">
<h1><b>CROWDSOURCING OF DATA</b><b class="w3-right">#IndiaFightsCorona</b></h1>
<h3><b><em>
<?php 
if(!empty($_POST['uname'])){
	echo "Welcome, " . $_POST['uname'] . ".";
}

if(!empty($_POST['wnumber'])){
	echo "<br>Your registered mobile number is " . $_POST['wnumber'][0] . $_POST['wnumber'][1] . $_POST['wnumber'][2] . $_POST['wnumber'][3] . $_POST['wnumber'][4] . "XXXXX." ;
}

if(!empty($_POST['mailid'])){
	echo "<br>Your registered Mail ID is " . $_POST['mailid'][0] . $_POST['mailid'][1] . $_POST['mailid'][2] . $_POST['mailid'][3] . "XXXXX." ;
}

if(!empty($_POST['district'])){
	echo "<br>You are from " . $_POST['district'] . " district." ;
}

if(!empty($_POST['sugg_n'])){
	echo "<br>Your suggestions are noted and we respect it." ;
}else{
	echo "<br>If you have any suggestions, please send it.";
}

?>
</em></b></h3>
</div>
<div class="w3-row-padding ">

<div class="w3-twothird"><img src="IFCPoster.jpg" style="width:100%">
<div class="w3-teal w3-hover-shadow w3-center"><h2><b>Oxygen Supply</b></h2></div>
<?php

require_once "config.php";

$sql = "SELECT * FROM oxygen_supply";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<table class='w3-table w3-striped w3-bordered w3-border'>";
			echo "<thead class='w3-teal'>";
					echo "<th >#</th>";
					echo "<th >Supplier's Details</th>";
					echo "<th >District</th>";
					echo "<th >Sub_Item</th>";
					echo "<th >Status</th>";
					echo "<th >Update-Info.(Iff sure)</th>";
                    echo "<th >Remove-Info(Iff any problem)</th>";
			echo "</thead>";
            $i = 1;
			while($row = mysqli_fetch_array($result)){
                
				echo "<tr>";
                    echo "<td>" . $i . "</td>";
					echo "<td>Name: " . $row['Supplier_Name'];
                    echo "<br>Mobile Number: " . $row['Supplier_Contact'];
                    echo "</td>";
					echo "<td>" . $row['District'] . "</td>";
					echo "<td>" . $row['Sub_Item'] . "</td>";
					if($row['Status'] == 0)
						echo "<td>Unavailable</td>";
					else
						echo "<td>Available</td>";
					echo "<td class='w3-container w3-hover-green'>";
						echo "<a href='updateO.php?id=" . $row['Supplier_Contact'] . "'>Update Here</a>";
					echo "</td>";
                    echo "<td class='w3-container w3-hover-red'>";
						echo "<a href='deleteO.php?id=" . $row['Supplier_Contact'] . "'>Remove</a>";
					echo "</td>";
				echo "</tr>";
                $i++;
			}                         
		echo "</table>";
        
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'>
        <a href='createO.php'>Add New Supplier Details</a>
        </div>";

		mysqli_free_result($result);
	} else{
		echo "<p><em>No records were found.</em></p>";
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'><a href='createO.php'>Add New Supplier Details</a></div>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

<br><hr style="border: 5px solid teal;
  border-radius: 10px;"><br>
<div class="w3-teal w3-hover-shadow w3-center"><h2><b>Ambulances</b></h2></div>
<?php

require_once "config.php";

$sql = "SELECT * FROM ambulance";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
        
		echo "<table class='w3-table w3-striped w3-bordered w3-border'>";
			echo "<thead class='w3-teal'>";
					echo "<th >#</th>";
					echo "<th >Supplier's Details</th>";
					echo "<th >District</th>";
					echo "<th >Sub_Item</th>";
					echo "<th >Status</th>";
					echo "<th >Update-Info.(Iff sure)</th>";
                    echo "<th >Remove-Info(Iff any problem)</th>";
			echo "</thead>";
            $i = 1;
			while($row = mysqli_fetch_array($result)){
                
				echo "<tr>";
                    echo "<td>" . $i . "</td>";
					echo "<td>Name: " . $row['Supplier_Name'];
                    echo "<br>Mobile Number: " . $row['Supplier_Contact'];
                    echo "</td>";
					echo "<td>" . $row['District'] . "</td>";
					echo "<td>" . $row['Sub_Item'] . "</td>";
					if($row['Status'] == 0)
						echo "<td>Unavailable</td>";
					else
						echo "<td>Available</td>";
					echo "<td class='w3-container w3-hover-green'>";
						echo "<a href='updateA.php?id=" . $row['Supplier_Contact'] . "'>Update Here</a>";
					echo "</td>";
                    echo "<td class='w3-container w3-hover-red'>";
						echo "<a href='deleteA.php?id=" . $row['Supplier_Contact'] . "'>Remove</a>";
					echo "</td>";
				echo "</tr>";
                $i++;
			}                         
		echo "</table>";
        
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'>
        <a href='createA.php'>Add New Supplier Details</a>
        </div>";

		mysqli_free_result($result);
	} else{
		echo "<p><em>No records were found.</em></p>";
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'><a href='createA.php'>Add New Supplier Details</a></div>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

<br><hr style="border: 5px solid teal;
  border-radius: 10px;"><br>
<div class="w3-teal w3-hover-shadow w3-center"><h2><b>Medicine Suppliers</b></h2></div>
<?php

require_once "config.php";

$sql = "SELECT * FROM medicine_supply";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
        
		echo "<table class='w3-table w3-striped w3-bordered w3-border'>";
			echo "<thead class='w3-teal'>";
					echo "<th >#</th>";
					echo "<th >Supplier's Details</th>";
					echo "<th >District</th>";
					echo "<th >Sub_Item</th>";
					echo "<th >Status</th>";
					echo "<th >Update-Info.(Iff sure)</th>";
                    echo "<th >Remove-Info(Iff any problem)</th>";
			echo "</thead>";
            $i = 1;
			while($row = mysqli_fetch_array($result)){
                
				echo "<tr>";
                    echo "<td>" . $i . "</td>";
					echo "<td>Name: " . $row['Supplier_Name'];
                    echo "<br>Mobile Number: " . $row['Supplier_Contact'];
                    echo "</td>";
					echo "<td>" . $row['District'] . "</td>";
					echo "<td>" . $row['Sub_Item'] . "</td>";
					if($row['Status'] == 0)
						echo "<td>Unavailable</td>";
					else
						echo "<td>Available</td>";
					echo "<td class='w3-container w3-hover-green'>";
						echo "<a href='updateM.php?id=" . $row['Supplier_Contact'] . "'>Update Here</a>";
					echo "</td>";
                    echo "<td class='w3-container w3-hover-red'>";
						echo "<a href='deleteM.php?id=" . $row['Supplier_Contact'] . "'>Remove</a>";
					echo "</td>";
				echo "</tr>";
                $i++;
			}                         
		echo "</table>";
        
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'>
        <a href='createM.php'>Add New Supplier Details</a>
        </div>";

		mysqli_free_result($result);
	} else{
		echo "<p><em>No records were found.</em></p>";
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'><a href='createM.php'>Add New Supplier Details</a></div>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

<br><hr style="border: 5px solid teal;
  border-radius: 10px;"><br>
<div class="w3-teal w3-hover-shadow w3-center"><h2><b>Plasma Suppliers</b></h2></div>
<?php

require_once "config.php";

$sql = "SELECT * FROM plasma_supply";
if($result = mysqli_query($link, $sql)){
	if(mysqli_num_rows($result) > 0){
        
		echo "<table class='w3-table w3-striped w3-bordered w3-border'>";
			echo "<thead class='w3-teal'>";
					echo "<th >#</th>";
					echo "<th >Supplier's Details</th>";
					echo "<th >District</th>";
					echo "<th >Sub_Item</th>";
					echo "<th >Status</th>";
					echo "<th >Update-Info.(Iff sure)</th>";
                    echo "<th >Remove-Info(Iff any problem)</th>";
			echo "</thead>";
            $i = 1;
			while($row = mysqli_fetch_array($result)){
                
				echo "<tr>";
                    echo "<td>" . $i . "</td>";
					echo "<td>Name: " . $row['Supplier_Name'];
                    echo "<br>Mobile Number: " . $row['Supplier_Contact'];
                    echo "</td>";
					echo "<td>" . $row['District'] . "</td>";
					echo "<td>" . $row['Sub_Item'] . "</td>";
					if($row['Status'] == 0)
						echo "<td>Unavailable</td>";
					else
						echo "<td>Available</td>";
					echo "<td class='w3-container w3-hover-green'>";
						echo "<a href='updateP.php?id=" . $row['Supplier_Contact'] . "'>Update Here</a>";
					echo "</td>";
                    echo "<td class='w3-container w3-hover-red'>";
						echo "<a href='deleteP.php?id=" . $row['Supplier_Contact'] . "'>Remove</a>";
					echo "</td>";
				echo "</tr>";
                $i++;
			}                         
		echo "</table>";
        
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'>
        <a href='createP.php'>Add New Supplier Details</a>
        </div>";

		mysqli_free_result($result);
	} else{
		echo "<p><em>No records were found.</em></p>";
		echo "<div class='w3-container w3-hover-green' style='text-align:center;'><a href='createP.php'>Add New Supplier Details</a></div>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>

</div>

<div class="w3-third">
  <h1 class="w3-panel w3-pale-blue w3-leftbar w3-border-blue">Important Note:</h1>
  <div class="w3-panel w3-pale-green w3-leftbar w3-border-green w3-border">
  <p>This data is not official but a crowdsourced effort of volunteers as per information collected by them personally/telephonically/on the Web. Resource contact details should be public ones. Please keep adding & updating.</p>
  <p>Use of medicines/resources must be done in keeping with doctor's advice & Govt policy. Prices given need to be actually prevalent ones & depiction of the same is not a stamp of approval.</p>
  <p><b>Good Samaritans, please come forward to reduce communication gap & black marketing and save human lives.</b></p>
  </div>
  <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
    <p>Please, note that this information can save many or at least one human's life so do fill only the information you are adding is reliable one and not only heard ones.</p>
  </div>
    <img class="w3-two w3-card-2" src="poster1.png" style="width:100%; margin-bottom: 20px;">
    <img class="w3-two w3-card-2" src="poster2.jpg" style="width:100%; margin-bottom: 20px;">
    <img class="w3-two w3-card-2" src="poster3.jpg" style="width:100%; margin-bottom: 20px;">
	<img class="w3-two w3-card-2" src="poster4.jpg" style="width:100%; margin-bottom: 20px;">
	<img class="w3-two w3-card-2" src="poster5.jpg" style="width:100%; margin-bottom: 20px;">
	<img class="w3-two w3-card-2" src="poster6.jpg" style="width:100%; margin-bottom: 20px;">
 </div>
</div>
<div>
<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p style="font-size: 20px;"><em>Find me on social media.</em></p>
  <a href="" class="fa fa-facebook"></a>
  <a href="" class="fa fa-instagram"></a>
  <a href="" class="fa fa-twitter"></a>
  <a href="" class="fa fa-pinterest"></a>
  <a href="" class="fa fa-linkedin"></a>
</footer>
</div>
</body>
</html>
