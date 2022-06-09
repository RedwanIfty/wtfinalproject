function isValidForget(jsForm){
	const uname=jsForm.uname.value;
	const npassword=jsForm.npassword.value;
	const rpassword=jsForm.rpassword.value;
	if(uname!=""){
		document.getElementById("uname").innerHTML="";
	}
	if(npassword!=""){
		if(npassword.length<8){
			document.getElementById("npass").innerHTML="Password atleast have 8 characters";
		}
		else
		{
			document.getElementById("npass").innerHTML="";
		}
	}
	if(rpassword!=""){
		if(rpassword!=npassword){
			document.getElementById("rpass").innerHTML="Password do not match";
		}
		else{
			document.getElementById("rpass").innerHTML="";
		}
	}
	if(uname===""||npassword===""||rpassword===""){
		if(uname===""){
			document.getElementById("uname").innerHTML="Fill user name";
		}
		if(npassword===""){
			document.getElementById("npass").innerHTML="Fill new Password";
		}
		if(rpassword===""){
			document.getElementById("rpass").innerHTML="Re-enter Password";
		}
		
		return false;
	}
	return true;
}
function sendData(jsForm) {
			const valid = isValidForget(jsForm);
			console.log(valid);
			if (valid) {
					const uname=jsForm.uname.value;
					const npassword=jsForm.npassword.value;
					const rpassword=jsForm.rpassword.value;

				const xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					document.getElementById("res").innerHTML = this.responseText;
					document.getElementById("process").style.display = "none";
				}
				xhttp.open("POST", "../Controller/ForgetAction.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("uname="+uname+"&npassword="+npassword+"&rpassword="+rpassword);
			}
			//return false;
}