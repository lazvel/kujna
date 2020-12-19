
<!DOCTYPE html>
<html>
	<head>
		<title>Konfirmacija</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/form.css">
	</head>
	<body background="images/pozadina.jpg">
		<div id="konfirmacija2">
			<?php
				define("Kontakt", "<strong>Vasi utisci su poslati!</strong><br><br>");
    
				function poZdrav(){
				echo Kontakt;
				}
				poZdrav();
				
				
				
                echo "<b> Vas utisak: </b>" , $napomena , "<br> ";
				
				
				
				
				echo "<h2><font color=\"green\"> Hvala na ostavljenom utisku.</font></h2></br>";
				
				echo "<b>Vreme ostavljanja utiska:  </b>" , date('H:i, jS F'), "<br><br>";
				
				
				
				
				echo "Povratak na <a href=utisci.html><font color=\"white\">utisci</font></a> stranicu <br>";
				echo "Povratak na <a href=index.html><font color=\"white\">pocetnu</font></a> stranicu <br>";
			?>
			<?php
	

    if(isset($_POST['text'])){
    
    $napomena=$_POST['text'];
}

$target_dir = "snippets/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}

}
?>
		</div>
	</body>
</html>

