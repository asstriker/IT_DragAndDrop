<?php
//EMPTY() RETURNS FALSE IF VARIABLE IS NOT EMPTY
//C:\xampp\htdocs\it\demo_files\new_input.csv
//C:\xampp\htdocs\it\demo_files\old_input.csv

$new_input_file = $old_input_file = $fh = $fh2 = "";
$rows = $cols = 0;
$new = true;
if( ($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST["fetch-data"]) ){
	if( (empty($_POST["new_input_file"])) && (empty($_POST["old_input_file"])) ){
		echo "<script> alert('to load a empty new session provide a tiles file in new input file url or to load a session provide both a new and a old input file names'); </script>";
	}else if( !empty($_POST["new_input_file"]) && empty($_POST["old_input_file"]) ){
		$new_input_file = htmlspecialchars($_POST["new_input_file"]);
		
		//Store value of n , m and t from csv file
		$fh = fopen($new_input_file,'r');
		list($emp,$n,$m,$t) = fgetcsv($fh,1000);
		$rows = $n;
		$cols = $m;

		$new = true;
	}else if( !empty($_POST["new_input_file"]) && !empty($_POST["old_input_file"]) ){
		$new_input_file = htmlspecialchars($_POST["new_input_file"]);
		$old_input_file = htmlspecialchars($_POST["old_input_file"]);
		
		//Store value of n , m and t from csv file
		$fh = fopen($new_input_file,'r');
		list($emp,$n,$m,$t) = fgetcsv($fh,1000);
		$rows = $n;
		$cols = $m;

		$fh2 = fopen($old_input_file,'r');
		
		$new = false;
	}
}
?>