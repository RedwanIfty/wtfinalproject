function isValid(booking_js)
{
	const us = booking_js.users.value;
	const fair = booking_js.fairports.value;
	const tair = booking_js.tairports.value;
	const date = booking_js.date.value;

	if(fair === "emp")
	{
		document.getElementById("rp1").innerHTML = "Please select a user";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		return false;
	}
	else if(tair === "emp")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "Please select your point of departure";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		return false;
	}
	else if(date === "")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "Please select your destination";
		document.getElementById("rp4").innerHTML = "";
		return false;
	}
	else if(us === "emp")
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "Please enter a date";
		return false;
	}
	else if(fair.localeCompare(tair) == 0)
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "Airports cannot be the same";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		document.getElementById("rp2").innerHTML = "";
		document.getElementById("rp3").innerHTML = "";
		document.getElementById("rp4").innerHTML = "";
		return true;
	}
}