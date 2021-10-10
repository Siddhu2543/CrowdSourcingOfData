<!DOCTYPE html>
<html lang="en">
<head>

<?php
// Include config file 
// Define variables and initialize with empty values
$supplier_name = $district = $status = "";
$supplier_contact = $status = 0;
$supplier_name_err = $supplier_contact_err = $district_err = $status_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "config.php";

    $input_name = trim($_POST["Supplier_Name"]);
    if(empty($input_name)){
        $supplier_name_err = "Please enter a Supplier name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $supplier_name_err = "Please enter a valid name.";
    } else{
        $supplier_name = $input_name;
    }
    
    $input_contact = trim($_POST["Supplier_Contact"]) + 0;
    $supplier_contact = $input_contact;

    $input_district = trim($_POST["District"]);
    if(empty($input_district)){
        $district_err = "Please enter a District.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $district_err = "Please enter a District name.";
    } else{
        $district = $input_district;
    }
    
    $input_status = 0 + (int)$_POST["Status"];
    if($input_status !== 0 && $input_status !== 1)
        $status_err = "Enter value 0 or 1 for not available and available";
    else
        $status = $input_status;
    
    $input_sub_item = trim($_POST["Sub_Item"]);
    $sub_item = $input_sub_item;

    // Check input errors before inserting in database
    if(empty($supplier_name_err) && empty($supplier_contact_err) && empty($status_err) && empty($district_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO ambulance(Supplier_Name, Supplier_Contact, District, Sub_Item, Status) VALUES (?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sissi", $param_name, $param_contact, $param_district, $param_sub_item, $param_status);
            
            // Set parameters
            $param_name = $supplier_name;
            $param_contact = $supplier_contact;
            $param_district = $district;
            $param_status = $status;
            $param_sub_item = $sub_item;

            if(mysqli_stmt_execute($stmt)){
                //Records created successfully. Redirect to landing page
                header("location: index1.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    }    
    // Close connection
    mysqli_close($link);
}
?>

<title>Add Entry</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
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

<div class="w3-container w3-teal w3-margin-bottom">
<h1><b>CROWDSOURCING OF DATA</b><b class="w3-right">#IndiaFightsCorona</b></h1>
</div>

<div class="w3-row-padding ">

<div class="w3-twothird"><img src="IFCPoster.jpg" style="width:100%">

<div class="w3-teal w3-xlarge w3-padding-16 w3-margin-top w3-center">
    <h2>Give Ambulance' Details Correctly</h2>
</div>

<form class="w3-container" METHOD ="POST" ACTION ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<table class='w3-table w3-striped w3-bordered w3-border'>
<div class="w3-section">
        <div <?php echo (!empty($supplier_name_err)); ?>">
        <tr><th><label><b>Supplier Name:</b></label></th></tr>
        <tr><td><input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Organisation or Supplier Name" name="Supplier_Name" required></td></tr></div>
        <span><?php echo $supplier_name_err;?></span>
        <div <?php echo (!empty($supplier_contact_err)); ?>">
        <tr><th><label><b>Supplier Contact Number:</b></label></th></tr>
        <tr><td><input class="w3-input w3-border" type="text" placeholder="Enter Organisation or Supplier Number" name="Supplier_Contact" required></td></tr></div>
        <span><?php echo $supplier_contact_err;?></span>
        <div <?php echo (!empty($district_err)); ?>">
        <tr><th><label><b>District:</b></label></th></tr>
        <tr><td><input class="w3-input w3-border" type="text" placeholder="Enter Organisation or Supplier District" name="District" required></td></tr></div>
        <span><?php echo $district_err;?></span>
        <div>
        <tr><th><label><b>Sub Items:</b></label></th></tr>
        <tr><td><input class="w3-input w3-border" type="text" placeholder="Enter which are the sub-items will be given..." name="Sub_Item"></td></tr></div>
        <div <?php echo (!empty($status_err)); ?>">
        <tr><th><label><b>Current Status:</b></label></th></tr>
        <tr><td><input class="w3-input w3-border" type="text" placeholder="0->Not Available  1->Available" name="Status" required></td></tr></div>
        <span><?php echo $status_err;?></span>
        <tr><td><input type="submit" class="w3-button w3-block w3-teal w3-section w3-padding" value="Add Entry">
        <a href="index1.php"  class="w3-button w3-block w3-red w3-section w3-padding">Cancel</a>
    </td></tr>
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