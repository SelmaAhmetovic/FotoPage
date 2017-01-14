<?php
if(isset($_POST['login'])){
$username =preg_replace('/[^A-Za-z]/','',$_POST['username1']);
$email=htmlEntities($_POST['email1'], ENT_QUOTES);
$password = htmlEntities($_POST['password2'], ENT_QUOTES);
$c_password = htmlEntities($_POST['password3'], ENT_QUOTES);
$first_name= htmlEntities($_POST['first-name1'], ENT_QUOTES);
$last_name= htmlEntities($_POST['last-name1'], ENT_QUOTES);
$birthday= htmlEntities($_POST['birthday'], ENT_QUOTES);
//testiranje gresaka
$greskaPostoji=false;
$bezGreske=true;
if(file_exists('users/' . $username . '.xml')){
	$greskaPostoji=true;
	$bezGreske=false;
}
$passError='';
$nameError='';
$passEqual='';
$nameError='';
$firstNameError='';
$emailError='';
$lastNameError='';
$passError='';
	if (!preg_match("/^[a-zA-Z0-9]+$/",$first_name)) {
				$firstNameError = 'Samo slova i brojevi u imenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$last_name)) {
				$lastNameError = 'Samo slova i brojevi u prezimenu-u'; 
			}
	if (!preg_match("/^[a-zA-Z0-9]+$/",$username)) {
				$nameError = "Samo slova i brojevi u username-u"; 
			}		
			
	if(strlen($password)<7)
		{
		$passError='Password mora imati više od 6 karaktera';
		}
	else if(!preg_match("/[0-9]/",$password)) 
		{
		$passError='Password mora imati makar jedan broj';
		}
	if(!$password==$c_password) {$passEqual='Sifre se ne podudaraju';}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
		$emailError = 'E-mail treba biti u formatu ime@provajder.domena';
		} 
if($bezGreske && $nameError=='' && $firstNameError=='' && $lastNameError=='' && $passEqual=='' && $passError=='' && $emailError==''){
	
	$dbh= new PDO("mysql:dbname=spirala4;host=localhost;charset=utf8", "admin", "admin123");
	//registration folder
	/*$xml= new SimpleXMLElement('<user></user>');
	$xml->addChild('first_name',$first_name);
	$xml->addChild('last_name', $last_name);
	$xml->addChild('email',$email);
	$xml->addChild('birthday', $birthday);
	$xml->addChild('username',$username);
	$xml->addChild('password', md5($password));
	$xml->asXML('registration/'.$username.'.xml');
	*/
	//u bazu registrovane
	$stmt1 = $dbh->prepare("INSERT INTO registracija (username, ime, prezime, email, datum_rodjenja,password) VALUES (:username, :ime, :prezime, :email, :datum_rodjenja, :password)");
	$stmt1->bindParam(':username', $user);
	$stmt1->bindParam(':ime', $ime1);
	$stmt1->bindParam(':prezime', $prez1);
	$stmt1->bindParam(':email', $email1);
	$stmt1->bindParam(':datum_rodjenja', $rodj);
	$stmt1->bindParam(':password', $pass);
	
	// insert one row
	$user = $username;
	$ime1=$first_name;
	$prez1=$last_name;
	$email1=$email;
	$rodj=$birthday;
	$pass=$password;
	
	$stmt1->execute();
	
	//users folder
	/*$xml1= new SimpleXMLElement('<user></user>');
	$xml1->addChild('username',$username);
	$xml1->addChild('password',md5($password));
	$xml1->asXML('users/'.$username.'.xml');
	*/
	//u bazu korisnike  
	$stmt = $dbh->prepare("INSERT INTO login (username, password) VALUES (:name, :value)");
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':value', $value);

	// insert one row
	$name = $username;
	$value = $password;
	$stmt->execute();
	header('Location:login.php');
	die;
}



}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stil.css">
	<meta name="viewport" content="width=device-width">
	<title>Selma Ahmetović photography</title>
</head>
<script src="validationLogin.js"></script>
<body>
<script src="Registration.js"></script>
<audio controls>
  <source src="music.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<div class="container">

<div id="naslov">
	<h1>Selma Ahmetović photography</h1>
</div>
<div class = "meni-button">
			<button class = "meni_btn" onclick = "dropDownMeni('meni')">MENI <span id = "strelica">&#9662;</span></button>
		</div>
<script src = "dropdown_meni.js"></script>
<div id="meni">
	<ul class="lista">
		<li> <a href="Pocetna.php" id="prva" class="selektovan" >Početna</a></li>
		<li> <a href="O_nama.php" id="druga">O nama</a></li>
		<li> <a href="Usluge.php" id="treca">Usluge</a></li>
		<li class="dropdown"> 		
		<a  class="dropbtn" onclick=myFunction" >Galerija </a>
	<div id="myDropdown" class="dropdown-content">
	<a href="galerija_photoshooting.php" id="peta">Photoshooting</a>
	<a href="galerija_vjencanje.html" id="sesta">Vjencanje</a>
	</div>
	</li>
	<li> <a href="Kontakt.php" id="cetvrta">Kontakt</a></li>
	</ul>
</div>
</div>
<div class="registration_form">
<form action="#" method="post" name="registration_form">
  		<table>
		<tr> <td>
		
		    	<label>Ime:</label> </td> <td>
		    	<input type="text" name="first-name1" id="first-name1" onkeyup="validationName1()" required>
		  
			</td> 
			</tr>
			<tr> <td>
		    
		    	<label>Prezime:</label> </td> <td>
		    	<input type="text" name="last-name1" id="last-name1" onkeyup="validationLastName1()"required>
		   
			</td> </tr>
			<tr> <td>
		    
		    	<label>Email:</label> </td> <td>
		    	<input type="text" name="email1" id="email1" onkeyup="validationEmail1()" required>
		   </td> </tr>
		    <tr> <td>
		    	<label>Datum rođenja:</label> </td> <td>
		    	<input type="date" name="birthday" id="birthday" onkeyup="validationBrirthday()" required>
		    </td> </tr>
			<tr> <td>
		    	<label>Username:</label> </td> <td>
		    	<input type="text" name="username1" id="username1" onkeyup="validationUsername1()" required>
			</td> </tr>
			<tr> <td>
		    	<label>Password:</label> </td> <td>
		    	<input type="password" name="password2" id="password2" onkeyup="validationPassword1()" required>
		    </td> </tr>
			<tr> <td>
		    	<label>Potvrdi Password:</label> </td> <td>
		    	<input type="password" name="password3" id="password3" onkeyup="validationPassword2()" required>
		    </tr> </td>
		    <tr> <td>
		    	<button class="submit" type="submit" name='login' id="login" onmouseenter="smjestiUStorageRegistration()">Register</button>
		    </td> </tr>
			</table>
			<a class="loginlink" href="login.php" id="loglink">Već ste registrovani? Kik ovdje da se logujete</a>
		    
		
	

	</form>
	</div>
</body>
</html>






