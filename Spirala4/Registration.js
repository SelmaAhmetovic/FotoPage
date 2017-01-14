
/*window.onload()
{
	storageRegistracija();
}
*/
function storageRegistracija() {
	var ime= document.getElementById("first-name1");
	var prezime= document.getElementById("last-name1");
	var email= document.getElementById("email1");
	var datum= document.getElementById("birthday");
    var name = localStorage.getItem("first-name1");
    if (name !== null) ime.value=name;
	var last_name = localStorage.getItem("last-name1");
    if (name !== null) prezime.value=last_name;
	var mail = localStorage.getItem("email1");
    if (name !== null) email.value=mail;
	var datumr = localStorage.getItem("birthday1");
    if (name !== null)	datum.value=datumr;
	var name = localStorage.getItem("username1");
	var username1= document.getElementById("username1");
    if (name !== null) username1.value=name;
	var pass = localStorage.getItem("password2");
	var passw= document.getElementById("password2");
    if (name !== null) passw.value=pass;
	var pass = localStorage.getItem("password3");
	var passw= document.getElementById("password3");
    if (name !== null) passw.value=pass;
}
function smjestiUStorageRegistration()
{
	var ime= document.getElementById("first-name1");
	localStorage.setItem("first-name1", ime.value);
	var prezime= document.getElementById("last-name1");
	localStorage.setItem("last-name1", prezime.value);
	var email= document.getElementById("email1");
	localStorage.setItem("email1", email.value);
	var poruka= document.getElementById("birthday");
	localStorage.setItem("birthday1", poruka.value);
	var username= document.getElementById("username1");
	localStorage.setItem("username1", username.value);
	var password1= document.getElementById("password2");
	localStorage.setItem("password2", password1.value);
	var password1= document.getElementById("password3");
	localStorage.setItem("password3", password1.value);
}
function validationUsername1()
{
	var username1 =  document.getElementById("username1");
	var reg = /^[a-zA-Z0-9]+$/;
	var dugme =  document.getElementById("submitRegistration");
	if(username1.value.match(reg))
	{
	username1.style.color = "black";
	//dugme.disabled=false;
	username1.setCustomValidity('');
	}
	else
	{
		username1.style.color= "red";
		//dugme.disabled=true;
		username1.setCustomValidity('Username ne smije sadržavati specijalne znakove');
	}

}
function validationPassword1()
{
	var password1= document.getElementById("password2");
	var reg = /[0-9]/;
	var dugme =  document.getElementById("submitRegistration");
	if(password1.value.length<7)
	{
		password1.setCustomValidity('Password mora imati više od 6 karaktera');
	}
	else if(password1.value.length>20)
	{
		password1.setCustomValidity('Password mora imati manje od 20 karaktera');
	}
	else if(!password1.value.match(reg))
	{
		//password1.style.background= "black";
		//dugme.disabled=false;
		password1.setCustomValidity('Password mora imati makar jedan broj');
	}
	else
	{
		password1.setCustomValidity('');
	}
}
function validationPassword2()
{
	var password1= document.getElementById("password2");
	var password2= document.getElementById("password3");
	var dugme =  document.getElementById("submitRegistration");
	if(password1.value!=password2.value)
	{
		password2.setCustomValidity('Password se ne poklapa');
	}
	else
	{
		password2.setCustomValidity('');
	}
}
function validationName1()
{
	var ime =  document.getElementById("first-name1");
	var reg = /^[a-zA-Z]+$/; 
	var dugme =  document.getElementById("submitRegistration");
	if(ime.value.match(reg))
	{
	ime.style.color = "black";
	//dugme.disabled=false;
	ime.setCustomValidity("");
	}
	else
	{
		ime.style.color= "red";
		//dugme.disabled=true;
		ime.setCustomValidity('Unesite ispravno ime');
	}

}
function validationLastName1()
{
	var prezime= document.getElementById("last-name1");
	var reg = /^[a-zA-Z]+$/;
	var dugme =  document.getElementById("submitRegistration");
	if(prezime.value.match(reg))
	{
		prezime.style.color= "black";
		//dugme.disabled=false;
		prezime.setCustomValidity('');
	}
	else
	{
		prezime.style.color= "red";
		//dugme.disabled=true;
		prezime.setCustomValidity('Unesite ispravno prezime');
	}
}


function validationEmail1()
{
	var dugme =  document.getElementById("submitRegistration");
	var email = document.getElementById("email1");
	var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email.value.match(reg))
	{
		email.style.color= "black";
	//	dugme.disabled=false;
		email.setCustomValidity('');
	}
	else
	{
		email.style.color= "red";
		//dugme.disabled=true;
		email.setCustomValidity('E-mail u formatu naziv@provajder.domena');
	}
}
function validationBrirthday()
{
		
}