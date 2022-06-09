function isValid(jsrestrict_js)
{
	const us = jsrestrict_js.users.value;

	if(us === "emp")
	{
		document.getElementById("rp1").innerHTML = "Please select a user";
		document.getElementById("rp2").innerHTML = "";
		return false;
	}
	else if(!document.getElementById("radio1").checked && !document.getElementById("radio2").checked)
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "Please select the status";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		return true;
	}
}

function sendData(jsrestrict_js)
{
	const valid = isValid(jsrestrict_js);
	if (valid)
	{
		const us = jsrestrict_js.users.value;
		const status = jsrestrict_js.status.value;
			
		const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				alert("Status updated!");
				location.href = "RestrictAccess.php";
			}										
		}
		xhttp.open("POST", "../View/RestrictAccess.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("users="+us+"&status="+status);
	}
}