function isValidFlightBooking(jsForm){
	const flightno=jsForm.flightno.value;
	const pname=jsForm.pname.value;
	const address=jsForm.address.value;
	const flightname=jsForm.flightname.value;
	const sfrom=jsForm.sfrom.value;
	const destination=jsForm.destination.value;
	const dtimedate=jsForm.dtimedate.value;

	if(flightno!=""){
		document.getElementById("flightno").innerHTML="";
	}
	if(pname!=""){
		document.getElementById("pname").innerHTML=" ";
	}
	if(address!=""){
		document.getElementById("address").innerHTML=" ";
	}
	if(flightname!=""){
		document.getElementById("flightname").innerHTML=" ";
	}
	if(sfrom!=""){
		document.getElementById("sfrom").innerHTML=" ";
	}
	if(destination!=""){
		document.getElementById("destination").innerHTML=" ";
	}
	if(dtimedate!=""){
		document.getElementById("dtimedate").innerHTML=" ";
	}
	if(flightno===""|| pname==="" || address===""|| flightname===""||sfrom===" "||destination===" "||dtimedate==="" ){
		if(flightno===""){
			document.getElementById("flightno").innerHTML="Fill flight no";
		}
		if(pname===""){
			document.getElementById("pname").innerHTML="Fill passenger name";
		}
		if(address===""){
			document.getElementById("address").innerHTML="Fill address properly";
		}
		if(flightname===""){
			document.getElementById("flightname").innerHTML="Fill flight name properly";
		}	
		if(sfrom===""){
			document.getElementById("sfrom").innerHTML="Select starting place";
		}
		if(destination===""){
			document.getElementById("destination").innerHTML="Select destination";
		}
		if(dtimedate===""){
			document.getElementById("dtimedate").innerHTML="Fill time and date properly";
		}
		return false;
	}
	return true;
}
function sendData(jsForm) {
			const valid = isValidFlightBooking(jsForm);
			console.log(valid);
			if (valid) {
					const flightno=jsForm.flightno.value;
					const pname=jsForm.pname.value;
					const address=jsForm.address.value;
					const flightname=jsForm.flightname.value;
					const sfrom=jsForm.sfrom.value;
					const destination=jsForm.destination.value;
					const dtimedate=jsForm.dtimedate.value;


				const xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					document.getElementById("res").innerHTML = this.responseText;
					//document.getElementById("process").style.display = "none";
				}
				xhttp.open("POST", "../Controller/manageticketbookingAction.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("flightno="+flightno+"&pname="+pname+"&address="+address+"&flightname="+flightname+"&sfrom="+sfrom+"&destination="+destination+"&dtimedate="+dtimedate);
			}
			//return false;
}