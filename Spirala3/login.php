<?php
	$error =false;
	if(isset($_POST['submitLogin'])){
		$username =preg_replace('/[^A-Za-z]/','',$_POST['username']);
		$password = md5($_POST['password']);
		$passError='';
		$nameError='';
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
	
	
	if($passError=='' && $nameError=='')
	{
			
				if(file_exists('users/' . $username . '.xml')){
				$xml=new SimpleXMLElement('users/' . $username . '.xml',0,true);
				if($password==$xml->password){
					session_start();
					$_SESSION['username']=$username;
					header('Location:index.php');
					die;
				}
			}
	}
	else
	{
		echo '<p>$passError</p>';
		echo '<p>$nameError</p>';
	}
	$error=true;
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
	<a href="galerija_vjencanje.html" id="sesta">Vjenčanje</a>
	</div>
	</li>
	<li> <a href="Kontakt.php" id="cetvrta">Kontakt</a></li>
	</ul>
</div>
	<h1>Login</h1>
	<form class="login_form" action="#" method="post" name="login_form">
	<p>Username <input type="text" name="username" size="20"  onkeyup="validationUsername()" required></p>
	<p>Password <input type="password" name="password" size="20" onkeyup="validationPassword()" required/></p>
	<?php
		if($error==true){
			echo '<p>Greška!</p>';
			}
	?>
	<p><input type="submit" name="submitLogin"/>  </p>
	</form>
	<a href="registration.php">Registriraj se</a>
	</div>
</body>
</html>