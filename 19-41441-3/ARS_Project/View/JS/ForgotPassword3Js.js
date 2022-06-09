function isValid(fp3_js)
{
	const newp = fp3_js.npassword.value;
	const oldp = fp3_js.cpassword.value;

	if(newp === "")
	{
		document.getElementById("rp1").innerHTML = "Enter your new password";
		document.getElementById("rp2").innerHTML = "";
		return false;
	}
	else if(oldp === "")
	{
		document.getElementById("rp1").innerHTML = "Confirm your password";
		document.getElementById("rp2").innerHTML = "";
		return false;
	}
	else if(newp.localeCompare(oldp) != 0)
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "Passwords don't match";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		return true;
	}
}