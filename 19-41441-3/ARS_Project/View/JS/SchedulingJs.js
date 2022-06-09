function isValid(scheduling_js)
{
	const flights = scheduling_js.flights.value;
	const flightno = scheduling_js.flightno.value;
	const fair = scheduling_js.fairports.value;
	const tair = scheduling_js.tairports.value;
	const date = scheduling_js.date.value;
	const departure = scheduling_js.departure.value;
	const arrival = scheduling_js.arrival.value;

	if(flights === "emp")
	{
		document.getElementById("rp1").innerHTML = "Flight name needs to be mentioned";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		return false;
	}
	else if(flightno === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "Flight number is necessary";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		return false;
	}
	else if(fair === "emp")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "Please enter departing airport";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		return false;
	}
	else if(tair === "emp")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "Please enter arriving aiport";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		return false;
	}
	else if(date === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "Please enter departure date";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "";
		return false;
	}
	else if(departure === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "Please enter departure time";
		document.getElementById("rp7").innerHTML = "";
		return false;
	}
	else if(arrival === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "Please enter arrival time";
		return false;
	}
	else if(fair.localeCompare(tair) == 0)
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		document.getElementById("rp5").innerHTML = "";
		document.getElementById("rp6").innerHTML = "";
		document.getElementById("rp7").innerHTML = "Please choose different airports";
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
		return true;
	}
}

function sendData(scheduling_js)
{
	const valid = isValid(scheduling_js);
	if (valid)
	{
		const flights = scheduling_js.flights.value;
		const flightno = scheduling_js.flightno.value;
		const fair = scheduling_js.fairports.value;
		const tair = scheduling_js.tairports.value;
		const date = scheduling_js.date.value;
		const departure = scheduling_js.departure.value;
		const arrival = scheduling_js.arrival.value;
			
		const xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				const s = (this.responseText).trim();
				if(s === "Flight Added!")
				{
					alert("Flight Added!");
					location.href = "Registration.php";
				}
				else
				{
					document.getElementById("rp7").innerHTML = this.responseText;
				}
			}										
		}
		xhttp.open("POST", "../Controller/SchedulingAction.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("flights="+flights+"&flightno="+flightno+"&fairports="+fair+"&tairports="+tair+"&date="+date+"&departure="+departure+"&arrival="+arrival);
	}
}