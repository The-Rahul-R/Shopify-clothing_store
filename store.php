<!DOCTYPE html>
<?php
session_start();
require 'connection.php';
$conn = Connect();
?>
<html>
<title>Store</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/store.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">


<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
   <div>
       <img style="width:200px; height:200px;" src="./images/logo.png" alt="alt"/>
    </div>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#women wear" class="w3-bar-item w3-button">Women Wear</a>
    <a href="#men wear" class="w3-bar-item w3-button">Men Wear</a>
     <a href="#kids wear" class="w3-bar-item w3-button">Kids Wear</a>
    
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="index1.php"  class="w3-bar-item w3-button w3-padding">Home Page</a>
</nav>





<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<div class="w3-main" style="margin-left:250px">

  
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  
  <header class="w3-container w3-xlarge">
    <p class="w3-left">Shopify</p>
    <p class="w3-right">
        <a href="cart.php"><i class="fa fa-shopping-cart w3-margin-right"></i></a>
      <i class="fa fa-search"></i>
    </p>
  </header>

 
  <div class="w3-display-container w3-container">
    <img src="images/cowboy.jpg" alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <h1 class="w3-hide-small">COLLECTION 2021</h1>
      <p><a href="#women wear" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey">
    <p>  </p>
  </div>

  
  
  <?php


$sql = "SELECT * FROM PRODUCTS ORDER BY ID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{

  while($row = mysqli_fetch_assoc($result)){
  
   

?>
<div class="w3-conatiner" id="women wear">

<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
<div class="w3-panel w3-card w3-pale-blue" align="center";>
<img src="<?php echo $row["images_path"]; ?>" class="" max-width:40%>
<h5 class="w3-small"><?php echo $row["name"]; ?></h5>
<h5 class="w3-small"><?php echo $row["desc"]; ?></h5>
<h5 class="w3-small">&#8377; <?php echo $row["price"]; ?>/-</h5>

<h5 class="w3-small">Quantity: <input type="number" min="1" max="25" name="quantity" class="w3-small" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
<input type="hidden" name="hidden_ID" value="<?php echo $row["id"]; ?>">
<input type="hidden" name="hidden_image" value="<?php echo $row["images_path"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="w3-button w3-green" value="Add to Cart"><br><br>
</div>
</form>
      
     
</div>

<?php
  }
}

?>
<?php


$sql = "SELECT * FROM MENWEAR ORDER BY ID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{

  while($row = mysqli_fetch_assoc($result)){
  
   ?>
<div class="w3-conatiner" id="men wear">

<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
<div class="w3-panel w3-card w3-pale-blue" align="center";>
<img src="<?php echo $row["images_path"]; ?>" class="" max-width:40%>
<h5 class="w3-small"><?php echo $row["name"]; ?></h5>
<h5 class="w3-small"><?php echo $row["desc"]; ?></h5>
<h5 class="w3-small">&#8377; <?php echo $row["price"]; ?>/-</h5>

<h5 class="w3-small">Quantity: <input type="number" min="1" max="25" name="quantity" class="w3-small" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
<input type="hidden" name="hidden_ID" value="<?php echo $row["id"]; ?>">
<input type="hidden" name="hidden_image" value="<?php echo $row["images_path"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="w3-button w3-green" value="Add to Cart"><br><br>
</div>
</form>
      
     
</div>

<?php
  }
}

?>
<?php
$sql = "SELECT * FROM KIDSWEAR ORDER BY ID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{

  while($row = mysqli_fetch_assoc($result)){
  
 ?>
<div class="w3-conatiner" id="kids wear">

<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
<div class="w3-panel w3-card w3-pale-blue" align="center";>
<img src="<?php echo $row["images_path"]; ?>" class="" max-width:40%>
<h5 class="w3-small"><?php echo $row["name"]; ?></h5>
<h5 class="w3-small"><?php echo $row["desc"]; ?></h5>
<h5 class="w3-small">&#8377; <?php echo $row["price"]; ?>/-</h5>

<h5 class="w3-small">Quantity: <input type="number" min="1" max="25" name="quantity" class="w3-small" value="1" style="width: 60px;"> </h5>
<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
<input type="hidden" name="hidden_ID" value="<?php echo $row["id"]; ?>">
<input type="hidden" name="hidden_image" value="<?php echo $row["images_path"]; ?>">
<input type="submit" name="add" style="margin-top:5px;" class="w3-button w3-green" value="Add to Cart"><br><br>
</div>
</form>
      
     
</div>

<?php
  }
}

?>
  

  
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px;" id="footer"><p class="w3-center">Email: Shopify@gmail.com</p>
    <p class="w3-center">Ph No: 234 432 567</p>
   </div>