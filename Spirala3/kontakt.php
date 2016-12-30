<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="Stil.css">
	<meta name="viewport" content="width=device-width">
	<title>Selma Ahmetovic photography</title>
</head>


<body>
<audio controls>
  <source src="music.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<div class="container">
<div id="naslov">
	<h1>Selma Ahmetovic photography</h1>
</div>

<div id="meni">
	<ul class="lista">
		<li> <a href="Pocetna.html">Početna</a></li>
		<li> <a href="O_nama.html">O nama</a></li>
		<li> <a href="Usluge.html">Usluge</a></li>
		<li class="dropdown"> 		
		<a href="javascript:void(0)" class="dropbtn" onclick=myFunction" >Galerija </a>
	<div id="myDropdown" class="dropdown-content">
	<a href="galerija_photoshooting.html">Photoshooting</a>
	<a href="galerija_vjencanje.html">Vjencanje</a>
	</div>
	</li>
	<li> <a href="Kontakt.html" class="selektovan" >Kontakt</a></li>
	</ul>
</div>
 
<div class="info">
	<h2> Kontakt informacije: </h2>
	<h3> E-mail: selmaahmetovic26@gmail.com</h3>
	<h3> Kontakt telefon: 062/216-245</h3>
</div>
<br>
<div class="ocjenjivanje_rada">
	<h3> Pošaljite pitanje:</h3>
	<form action="index.php" method="post"  onsubmit="return Validacija()" name="vForm"    style="color: white;">
		Ime i prezime:<br>
		<input type="text" name="imeiprezime" class="textInput" placeholder="Ime i prezime">
		<div id="imeiprezime_error" class="val_error"></div>
		<br><br>
		E-mail:<br>
		<input type="text" name="email" class="textInput" placeholder="Email">
		<div id="email_error" class="val_error"></div>
		<br><br>
		Pitanje, komentar, kritika, pohvala:<br>
		<textarea name="poruka" rows="7" cols="25"></textarea>
		<div id="komentar_error" class="val_error"></div>
		<br><br>	
		<input type="submit" value="Pošalji"><br>
	</form>
</div>

</div>

<script src="galerija_dropdown"></script>
</body>

</html>
<script src="galerija.js"></script>
<script src="galerija_dropdown.js"></script>
<script src="ajax.js"></script>
<script type="text/javascript">
	var imeiprezime = document.forms["vForm"]["imeiprezime"];
	var email = document.forms["vForm"]["email"];
	var komentar =document.forms["vForm"]["poruka"];
	
	var imeiprezime_error = document.getElementById("imeiprezime_error");
	var email_error = document.getElementById("email_error");
	var komentar_error=document.getElementById("komentar_error");
	
	imeiprezime.addEventListener("blur", imeiPrezimeValidacija, true);
	email.addEventListener("blur", emailValidacija, true);
	komentar.addEventListener("blur",komentarValidacija,true);
	function Validacija(){
		if(imeiprezime.value == ""){
			imeiprezime_error.textContent = "Unesite ime i prezime";
			imeiprezime.focus();
			return false;
		}
		
		if(email.value == ""){
			email_error.textContent = "Unesite vas email";
			email.focus();
			return false;
		}
		if(komentar.value=="")
		{
			komentar_error.textContent = "Unesite poruku";
			komentar.focus();
			return false;
		}
	}
	function imeiPrezimeValidacija(){
		if (imeiprezime.value != "") {
			imeiprezime_error.innerHTML = "";
			return true;
		}
	}
	function emailValidacija(){
		if (email.value != "") {
			email_error.innerHTML = "";
			return true;
		}
	}
	function komentarValidacija()
	{
		if(komentar.value!=""){
		komentar_error.innerHTML="";
		return true;
		}
	}
</script>

