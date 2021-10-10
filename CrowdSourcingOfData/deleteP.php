<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM plasma_supply WHERE Supplier_Contact = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_contact);
        
        // Set parameters
        $param_contact = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: index1.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: index.php");
        exit();
    }else{
        $id = $_GET["id"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete a Record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</head>
<body>
<div class="w3-container w3-teal w3-margin-bottom">
<h1><b>CROWDSOURCING OF DATA</b><b class="w3-right">#IndiaFightsCorona</b></h1>
</div>

<div class="w3-row-padding ">

<div class="w3-twothird"><img src="IFCPoster.jpg" style="width:100%">

<div class="w3-teal w3-xlarge w3-padding-16 w3-margin-top w3-center">
    <h2>Remove a Plasma Supplier details</h2>
</div>

	<form class="w3-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<table class='w3-table w3-striped w3-bordered w3-border'>
    <div class="w3-section">
    <div>
        <tr><th><label><b>Are you sure you want to delete this record?</b></label></th></tr>
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <tr><td><input type="submit" class="w3-button w3-block w3-teal w3-section w3-padding" value="Yes">
        <a href="index1.php"  class="w3-button w3-block w3-red w3-section w3-padding">No</a></div>
    </div>
    </table>
    </form>
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