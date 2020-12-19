<?php
	if(isset($_POST['username'])){
    
    $name=$_POST['username'];
}

	
	if(isset($_POST['adress'])){
    
    $adresa=$_POST['adress'];
}

	if(isset($_POST['phone'])){
    
    $phone=$_POST['phone'];
}
	
	if(isset($_POST['orderi'])){
    
    $poruc=$_POST['orderi'];
}

	if(isset($_POST['prilog'])){
    
    $prilog=$_POST['prilog'];
}

    if(isset($_POST['text'])){
    
    $napomena=$_POST['text'];
}


	session_start();
	
	if(isset($_SESSION['views']))
		$_SESSION['views'] = $_SESSION['views'] + 1;
	else
		$_SESSION['views'] = 1;

	class Osoba{

	public $ime;
	
	public function postaviIme($ime)
	{
	
	$this->ime=$ime;
	
	}
	
	public function prikaziIme()
	{
	
	return $this->ime;
	
	}
	
	}
	
	$ja=new Osoba();
	$ja->postaviIme("Pero Pauk");
	$ja->postaviIme("Lazar Velimirovic");
		
	
?>
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
				define("Kontakt", "<strong>Vasa porudzbina je prihvacena!</strong><br><br>");
    
				function poZdrav(){
				echo Kontakt;
				}
				poZdrav();
				
				echo "<b> Ime: </b>" , $name , "<br>";
				echo "<b> Adresa: </b>" , $adresa , "<br>";
                echo "<b> Telefon: </b>" , $phone , "<br>";
				echo "<b> Narucili ste: </b>" , $poruc , "<br>";
				echo "<b> Od priloga: </b>" , $prilog , "<br>";
                echo "<b> Napomena: </b>" , $napomena , "<br> ";
				
            
				echo "<h2><font color=\"green\"> Hvala na vasoj porudzbini.<br>Vidimo se uskoro! </font></h2></br>";
				
				echo "<b>Vreme porudzbine:  </b>" , date('H:i, jS F'), "<br><br>";
				
				echo "Vas redni broj porudzbine= " .$_SESSION['views'] ,"<br>";
				
				switch($_SESSION['views']) {
				case ($_SESSION['views']<=49): echo ""; 
					break;
				case 50: echo "Cesitam. Dobili ste 10% popusta na sledecu porudzbinu!<br>"; 
					break;
				case 100: echo "Cesitam. Dobili ste 15% popusta na sledecu porudzbinu!<br>";
					break;
				}	
				
				echo "Rezervaciju prihvatio: " , $ja->prikaziIme(), "<br><br>";
				echo "Povratak na <a href=dostava.html><font color=\"white\">narudzbina</font></a> stranicu <br>";
				echo "Povratak na <a href=index.html><font color=\"white\">pocetnu</font></a> stranicu <br>";
			
				$serverName="localhost";
				$userName="root";
				$password="";
				$dbname="kujna";
				
				//kreiranje konekcije
				
				$conn=new mysqli($serverName,$userName,$password,$dbname);
				
				//provera konekcije
				if($conn->connect_error){
					die("Konekcija nije uspela\n" .$conn->connect_error);
				} else {
					echo "<br><strong>Konekcija Baze je uspela!</strong>";
				}
			
			?>
		</div>
	</body>
</html>

