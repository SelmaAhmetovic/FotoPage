<?php
$servername = "localhost";
$username = "admin";
$password = "admin123";
$dbname = "spirala4";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if($conn)
{
	echo("connected successfully to spirala4 database");
}
else {
    die("Connection failed: " . mysqli_connect_error());
}
//sada dodajemo u bazu nove registrovane
//prvo prodjemo kroz sve fajlove putem foreach petlje i dodajmo svaki ukoliko vec ne postoji u bazi
$files=glob('registration/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$korisnicko_ime=$xml->username;
		$ime=$xml->first_name;
		$prezime=$xml->last_name;
		$email=$xml->email;
		$birthday=$xml->birthday;
		$password=$xml->password;
		//provjeravamo da li ima istih, ukoliko nema isti takav ubaci se u bazu
$imaLiIsti = "SELECT * FROM registracija where username='$korisnicko_ime'";
$result = $conn->query($imaLiIsti);
//ukoliko ima isti takav nece se odraditi ovaj dio koda 
if ($result->num_rows < 1){
$sql2 = "INSERT INTO registracija (username, ime,prezime,email,datum_rodjenja,password)
VALUES ('$korisnicko_ime','$ime','$prezime','$email','$birthday','$password' )";

if (mysqli_query($conn, $sql2)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
}
}
// sad dodaj login
$files=glob('users/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$korisnik=$xml->username;
		$sifra=$xml->password;
	$imaLiIstikorisnik = "SELECT * FROM login where username='$korisnik'";
$result = $conn->query($imaLiIstikorisnik);
if ($result->num_rows < 1){
$sql = "INSERT INTO login (username, password)
VALUES ('$korisnik','$sifra')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
//sad dodaj poruke
$files=glob('ContactMessages/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$korisnik1=$xml->username;
		$poruka1=$xml->message;
	$imaLiIstaPoruka = "SELECT * FROM poruka_adminu where username='$korisnik1' and poruka='$poruka1'";
$result = $conn->query($imaLiIstaPoruka);
if ($result->num_rows < 1){
$sql = "INSERT INTO poruka (username, poruka)
VALUES ('$korisnik1','$poruka1')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
}
header('Location:LoginAdministrator.php');
?>