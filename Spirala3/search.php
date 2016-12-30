<?php
$output='';
	if(isset($_POST['submitSearch'])){
		$pretraga = htmlEntities($_POST['search'], ENT_QUOTES);
		$files=glob('registration/*.xml');
	foreach($files as $file){
		$xml=new SimpleXMLElement($file,0,true);
		$fname=$xml->first_name;
		$lname=$xml->last_name;
		if($pretraga=='')
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false)
		{
			$output.='<div>'.$fname.' '.$lname.'<div>';
		}
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
<body>
<script src="validationLogin.js"></script>
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
  <script type="text/javascript">
	function searchq(){
		var searchTxt = $("input[name='search']").val();
	$.post("pretrazi.php",{searchVal: searchTxt},function(output){
		$("#output").html(output);
	}
	);
	}
	</script>
	<script type="text/javascript">
	function prikaziSve(){
		var searchTxt = $("input[name='search']").val();
	$.post("pretrazi1.php",{searchVal: searchTxt},function(output){
		$("#output").html(output);
	}
	);
	}
	</script>
    <form action="search.php" method="post" >
	<input type="text" name="search" onkeyup="searchq();" ;">
	<input type="button" name="submitSearch" value="&gt;&gt;" onclick="prikaziSve();">
		</form>
		<div id="output">
		</div>
	</div>
  </body>
</html>