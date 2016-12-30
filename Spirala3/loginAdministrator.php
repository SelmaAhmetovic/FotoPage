<!DOCTYPE html>
<?php
	if(isset($_GET['staviUCSV'])){
	$fp = fopen('LoginPodaci.csv', 'w');
	$files=glob('users/*.xml');
	var_dump($files);
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$filer =array($xml->username,$xml->password);
			fputcsv($fp, $filer);
	}
		fclose($fp);
		//header("Location: http://localhost:50/spiralatri/LoginPodaci.csv");
		$url = 'http://' . $_SERVER['HTTP_HOST'];            // Get the server
		$url .= rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); // Get the current directory
		$url .= '/LoginPodaci.csv';            // <-- Your relative path
		header('Location: ' . $url, true, 302); 
		die();
	}
?>
<?php
session_start();
if(isset($_SESSION['username']))
	$logined=true;
else
	$logined=false;
$staviUCSV=false;
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
	<a href="galerija_vjencanje.html" id="sesta">Vjenčanje</a>
	</div>
	</li>
	<li> <a href="Kontakt.php" id="cetvrta">Kontakt</a></li>
	</ul>
</div>

	<h2>Dobro došli 
	<?php
	if($logined)
	echo $_SESSION['username'];
	?>
	</h2>
	<table>
	<tr>
	<th>Username</th>
	<th>Password</th>
	</tr>
	<?php
	$files=glob('users/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		echo '
		<tr>
		<td>'.$xml->username.'</td>
		<td>'.$xml->password.'</td>
		</tr>';
	}
	?>
	</table>
	<p><a href="LoginAdministrator.php?staviUCSV=true" style="background-color:white">CSV fajl</a></p>
	<p><a href="FPDFDownload.php" style="background-color:white">Izvještaj u PDF-u</a></p>
	<a href="changePassword.php" style="background-color:white">Promjeni password</a>
	<a href="deleteUser.php" style="background-color:white">Obriši korisnika</a>
	<a href="logout.php" style="background-color:white">Logout</a>
	</div>
  </body>
</html>