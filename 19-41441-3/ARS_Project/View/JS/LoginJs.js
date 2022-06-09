function isValid(js_login)
{
	const un = js_login.username.value;
	const pw = js_login.password.value;

	if(un === "")
	{
		document.getElementById("lp1").innerHTML = "Please enter a username";
		document.getElementById("lp2").innerHTML = "";
		return false;
	}
	else if(pw === "")
	{
		document.getElementById("lp1").innerHTML = "";
		document.getElementById("lp2").innerHTML = "Please enter the password";
		return false;
	}
	else
	{
		document.getElementById("lp1").innerHTML = "";
		document.getElementById("lp2").innerHTML = "";
		return true;
	}
}