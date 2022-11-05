<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <title>assignment</title>
  </head>
  
<body>
<?php
	include "include/header.php";
?>

<nav font="arial">

<form method="post"  action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<ul><li> url for new file : 
<input type="text" name="new_input_file"></input></li>
<li> url for old file : 
<input type="text" name="old_input_file"></input></li>

<li><input type="submit" name="fetch-data" placeholder="submit" /></li>
</ul>
</form>

<button onclick="tableToCSV()">Export</button>
</nav>


<?php
if($new == true && $new_input_file != ""){
	include "include/new.php";
}
if($new == false && $new_input_file != "" && $old_input_file != ""){
	include "include/old.php";
}
?>

<!--JQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script src="js/script.js"></script>
</body>
</html>