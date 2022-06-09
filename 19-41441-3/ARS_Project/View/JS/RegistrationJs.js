function isValid(js_reg)
{
	const un = js_reg.username.value;
	const pw = js_reg.password.value;
	const cpw = js_reg.cpassword.value;
	const fn = js_reg.firstname.value;
	const sn = js_reg.surname.value;
	const em = js_reg.email.value;
	const dob = js_reg.dob.value;

	if(un === "")
	{
		document.getElementById("rp1").innerHTML = "Please enter a username";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		document.getElementById("rp8").innerHTML = "";
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
		return true;
	}
}

function sendData(js_reg)
{
	const valid = isValid(js_reg);
	if (valid)
	{
		const un = js_reg.username.value;
		const pw = js_reg.password.value;
		const cpw = js_reg.cpassword.value;
		const fn = js_reg.firstname.value;
		const sn = js_reg.surname.value;
		const em = js_reg.email.value;
		const dob = js_reg.dob.value;
		const type = js_reg.type.value;
			
		const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				const s = (this.responseText).trim();
				if(s === "Registration Successful!")
				{
					alert("Registration Successful!");
					location.href = "Registration.php";
				}
				else
				{
					document.getElementById("rp8").innerHTML = this.responseText;
				}
			}										
		}
		xhttp.open("POST", "../Controller/RegistrationAction.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("username="+un+"&password="+pw+"&cpassword="+cpw+"&firstname="+fn+"&surname="+sn+"&email="+em+"&dob="+dob+"&type="+type+"&status=open");
	}
}