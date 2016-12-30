<?php
session_start();
if(!file_exists('users/' . $_SESSION['username'] . '.xml')){
	header("Location: login.php");
	
}
if(isset($_SESSION['username']))
	$logined=true;
else
	$logined=false;
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
	<h1>Korisnikova stranica</h1>
	
	<h2> Dobro došli , <?php $_SESSION['username'];?></h2>
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
	<h2>Dobro došli 
	<?php
	if($logined){
	echo $_SESSION['username'];
if($_SESSION['username']=="admin")
{
	echo'<a href="LoginAdministrator.php">Ovdje se nalazi login detalji vaših korisnika</a>';
}
	}
	?>
	</h2>
	<a style="color:white;"href="search.php" >Pretraži</a>
	<a href="registration.php" >Registriraj se</a>
	<a href="logout.php" >Logout</a>
</div>
</body>
</html>