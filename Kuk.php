<?php
	if(isset($_POST['username'])){
    
    $name=$_POST['username'];
}

	
	if(isset($_POST['email'])){
    
    $email=$_POST['email'];
}

	if(isset($_POST['phone'])){
    
    $phone=$_POST['phone'];
}
	
	if(isset($_POST['date'])){
    
    $date=$_POST['date'];
}

	if(isset($_POST['numberOfGuests'])){
    
    $numberOfGuests=$_POST['numberOfGuests'];
}

    if(isset($_POST['vreme'])){
    
    $vreme=$_POST['vreme'];
}

	if(isset($_POST['agree'])){
    
    $agree=$_POST['agree'];
}

	$cookie_name = "korisnik";
	$cookie_value = $name;

	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
	
	
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
		<div id="konfirmacija">
			<?php
				define("Kontakt", "<strong>Vasa rezervacija je potvrdjena!</strong><br><br>");
    
				function poZdrav(){
				echo Kontakt;
				}
				poZdrav();
				
				if(!isset($_COOKIE[$cookie_name])) {
				echo "Cookie pod nazivom: " . $cookie_name . " je postavljen";
				} else {
				echo "Kolacic: " . $cookie_name . " je postavljen<br>";
				echo "Vrednost je: " . $_COOKIE[$cookie_name], "<br>";
				}
				
				echo "<b> Ime: </b>" , $name , "<br>";
				echo "<b> E-mail: </b>" , $email , "<br>";
                echo "<b> Telefon: </b>" , $phone , "<br>";
				echo "<b> Datum: </b>" , $date , "<br>";
				echo "<b> Broj gostiju: </b>" , $numberOfGuests , "<br>";
                echo "<b> Vreme: </b>" , $vreme , "<br> ";
				echo "<b> Uslovi koriscenja: </b>" , $agree , "<br>";
				
            
				echo "<h2><font color=\"green\"> Hvala na vasoj rezervaciji </font></h2></br>" , "<h2><font color=\"red\"> Rucak pocinje od 16:00h </br>
                Vecera od 20:00h.</font></h2>";
				
				echo "<b>Vreme rezervacije:  </b>" , date('H:i, jS F'), "<br><br>";
				
				echo "Vas redni broj rezervacije= " .$_SESSION['views'] ,"<br>";
				
				switch($_SESSION['views']) {
				case ($_SESSION['views']<=49): echo ""; 
					break;
				case 50: echo "Cesitam. Dobili ste 10% popusta na sledecu rezervaciju!<br>"; 
					break;
				case 100: echo "Cesitam. Dobili ste 15% popusta na sledeci rezervaciju!<br>";
					break;
				}	
				
				echo "Rezervaciju prihvatio: " , $ja->prikaziIme(), "<br>";
				echo "Povratak na <a href=rez.html>rezervacije</a> stranicu <br>";
				echo "Povratak na <a href=index.html>pocetnu</a> stranicu <br>";
			?>
		</div>
	</body>
</html>

