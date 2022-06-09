function isValid(jsupdate_js)
{
	const us = jsupdate_js.users.value;
	const un = jsupdate_js.username.value;
	const pw = jsupdate_js.password.value;
	const cpw = jsupdate_js.cpassword.value;
	const fn = jsupdate_js.firstname.value;
	const sn = jsupdate_js.surname.value;
	const em = jsupdate_js.email.value;
	const dob = jsupdate_js.dob.value;

	if(us === "emp")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "Please select a user";
		return false;
	}
	else if(un === "")
	{
		document.getElementById("rp1").innerHTML = "Please enter a username";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(pw === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "Please enter the password";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(cpw === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "Please confirm the password";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(fn === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "Please enter the firstname";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(sn === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "Please enter the surname";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(em === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "Please enter the email";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(dob === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "Please select a date of birth";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(!document.getElementById("radio1").checked && !document.getElementById("radio2").checked)
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "Please select the type";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else if(pw.localeCompare(cpw) != 0)
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "Passwords do not match";
		document.getElementById("rp9").innerHTML = "";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
		document.getElementById("rp9").innerHTML = "";
		return true;
	}
}

function sendData(jsupdate_js)
{
	const valid = isValid(jsupdate_js);
	if (valid)
	{
		const us = jsupdate_js.users.value;
		const un = jsupdate_js.username.value;
		const pw = jsupdate_js.password.value;
		const cpw = jsupdate_js.cpassword.value;
		const fn = jsupdate_js.firstname.value;
		const sn = jsupdate_js.surname.value;
		const em = jsupdate_js.email.value;
		const dob = jsupdate_js.dob.value;
		const type = jsupdate_js.type.value;
			
		const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				const s = (this.responseText).trim();
				if(s === "Profile updated!")
				{
					alert("Profile updated!");
					location.href = "Home.php";
				}
				else
				{
					document.getElementById("rp8").innerHTML = this.responseText;
				}
			}										
		}
		xhttp.open("POST", "../Controller/RegistrationUpdateAction.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("users="+us+"&username="+un+"&password="+pw+"&cpassword="+cpw+"&firstname="+fn+"&surname="+sn+"&email="+em+"&dob="+dob+"&type="+type+"&status=open");
	}
}