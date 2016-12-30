<!DOCTYPE html>
<?php
$error=false;
session_start();
if(!file_exists('users/'.$_SESSION['username'].'.xml')){
	header('Location: login.php');
	die;
}
if(isset($_POST['change'])){
	$username=$_POST['username'];
	if(file_exists('users/' . $username . '.xml')){
			unlink('users/' . $username . '.xml');
			header('Location:LoginAdministrator.php');
			die;
	}
	$error=true;
}
?>
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
	<a href="galerija_vjencanje.php" id="sesta">Vjenčanje</a>
	</div>
	</li>
	<li> <a href="Kontakt.php" id="cetvrta">Kontakt</a></li>
	</ul>
</div>
	<form method="post" action="">
	<?php
	if($error){
		echo '<p>Greska u korisnikovom unosu</p>';
	}
	?>
		<p>Username<input type="text" name="username"/></p>
		<p><input type="submit" name="change" </p>
	</form>
	<a href="LoginAdministrator.php">Vrati se na početnu stranicu</a>
	<a href="logout.php">Logout</a>
	</div>
</body>
</html>