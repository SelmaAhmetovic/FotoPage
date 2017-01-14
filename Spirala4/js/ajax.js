function load(url, link) {
var xhr;
if(typeof XMLHttpRequest !== 'undefined') xhr = new XMLHttpRequest();
else
{
var versions = ["Microsoft.XMLHTTP",
				"MSXML2.XmlHttp",
				"MSXML2.XmlHttp.3.0",
				"MSXML2.XmlHttp.4.0",
				"MSXML2.XmlHttp.5.0",
]

for(var i=0; len= versions.length; i<len;i++)
{
	try{
	xhr = new ActiveXObject(versions[i]);
	break;
	}
	catch(e){}
}
xhr.onreadystatechange = someCallback;
function someCallback()
{
if(xhr.readyState <4)
{
return;
}
if(xhr.status !=200)
{
return;
}

console.log(xhr.responseText);
}
xhr.open('GET',url,true);
xhr.send('');
}
function dodajJavaScript(jsFilePath) {
	var js = document.createElement("script");
	js.type = "text/javascript";
	js.src = jsFilePath;
	document.body.appendChild(js);	
}

