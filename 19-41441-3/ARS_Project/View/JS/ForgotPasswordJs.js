function isValid(fp_js)
{
	const us = fp_js.username.value;

	if(us === "")
	{
		document.getElementById("rp1").innerHTML = "Username cannot be empty";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		return true;
	}
}