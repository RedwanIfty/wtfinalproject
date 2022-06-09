function isValid(booking2_js)
{
	const flights = booking2_js.flightnos.value;


	if(flights === "emp")
	{
		document.getElementById("rp1").innerHTML = "Please choose a flight";
		document.getElementById("rp2").innerHTML = "";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		return true;
	}
}

function sendData(booking2_js)
{
	const valid = isValid(booking2_js);
	if (valid)
	{
		const flights = booking2_js.flightnos.value;
		const us = booking2_js.users.value;
			
		const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				const s = (this.responseText).trim();
				if(s === "Booking Successful!")
				{
					alert("Booking Successful!");
					location.href = "Home.php";
				}
				else
				{
					document.getElementById("rp2").innerHTML = this.responseText;
				}
			}										
		}
		xhttp.open("POST", "../Controller/BookingAction.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("users="+us+"&flightnos="+flights);
	}
}