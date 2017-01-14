/*window.onload()
{
	storageLogin();
}
*/
function storageLogin() {

    var name = localStorage.getItem("username");
	var username1= document.getElementById("username");
    if (name !== null) username1.value=name;
	var pass = localStorage.getItem("password1");
	var passw= document.getElementById("password1");
    if (name !== null) passw.value=pass;

}

function smjestiUStorageLogin()
{
	var username= document.getElementById("username");
	username.style.color="blue";
	localStorage.setItem("username", username.value);
	var password1= document.getElementById("password1");
	localStorage.setItem("password1", password1.value);
}
function validationUsername()
{
	var username =  document.getElementById("username");
	var reg = /^[a-zA-Z0-9]+$/;
	var dugme =  document.getElementById("submitLogin");
	if(username.value.match(reg))
	{
	username.style.color = "black";
	//dugme.disabled=false;
	username.setCustomValidity('');
	}
	else
	{
		username.style.color= "red";
		//dugme.disabled=true;
		username.setCustomValidity('Username ne smije sadržavati specijalne znakove');
	}

}
function validationPassword()
{
	var password1= document.getElementById("password1");
	var reg = /[0-9]/;
	var dugme =  document.getElementById("submitLogin");
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

