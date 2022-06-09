function isValid(fp2_js)
{
	const us = fp2_js.email.value;

	if(us === "")
	{
		document.getElementById("rp1").innerHTML = "Email cannot be empty";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		return true;
	}
}