function isValidUpdateProfile(jsForm){
	const name=jsForm.name.value;
	const address=jsForm.address.value;
	const email=jsForm.email.value;
	if(name!=""){
		document.getElementById("name").innerHTML=" ";
	}
	if(email!=""){
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(email.match(mailformat)){
			document.getElementById("email").innerHTML=" ";
		}
		else{
			document.getElementById("email").innerHTML=" invalid email formate";
		}
	}
	if(address!=""){
		document.getElementById("address").innerHTML=" ";
	}
	if(name===""||email==""||address===""){
		if(name===""){
			document.getElementById("name").innerHTML=" Fill name properly";
		}
		if(address===""){
			document.getElementById("address").innerHTML=" Fill address properly";
		}
		if(email===""){
			document.getElementById("email").innerHTML=" Fill email properly";
		}
		return false;
	}
	return true;
}
function sendData(jsForm) {
			const valid = isValidUpdateProfile(jsForm);
			console.log(valid);
			if (valid) {
					const name=jsForm.name.value;
					const address=jsForm.address.value;
					const email=jsForm.email.value;
				const xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					document.getElementById("res").innerHTML = this.responseText;
					//document.getElementById("process").style.display = "none";
				}
				xhttp.open("POST", "../Controller/UpdateProfileAction.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("name="+name+"&address="+address+"&email="+email);
			}
			//return false;
}