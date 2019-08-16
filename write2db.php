<!DOCTYPE html>
<html>
<body>
<?php 
//ukljucivanje klase Calclulator iz eksternog fajla
require_once("class/calculator.class.php");
//ukljucivanje fajla za konfiguraciju baze podataka
require_once("config.php");
//pozivanje konstruktora kalkulatora i primanje podataka iz poslanog zahtjeva
$calc=new Calculator(intval($_GET['factor1']),intval($_GET['factor2']));

//povezivanje na bazu
$con=mysqli_connect($host, $username,$password, $dbname);
//provjera konekcije
if (!$con){
	die('Could not connect:'.mysqli_error($con));
}
//upit na bazu
$sql="INSERT INTO `osnovna`( `factor1`, `factor2`, `operation`, `result`, `operation_date`) VALUES (".$calc->get_f1().",".$calc->get_f2().",'*',".$calc->multiply().",CURRENT_TIMESTAMP())";
//slanje upita i provjera statusa 
if($con->query($sql)===FALSE)
	echo "Problem sa upitom! ".$sql."<br>".$con->error;
//zatvaranje konekcije
$con->close();
?>
</body>
</html>