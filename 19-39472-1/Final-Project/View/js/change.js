function isValidChange(jsForm){
	const uname=jsForm.uname.value;
	const currpassword=jsForm.currpassword.value;
	const npassword=jsForm.npassword.value;
	const rpassword=jsForm.rpassword.value;
	if(uname!=""){
		document.getElementById("uname").innerHTML="";
	}
	if(currpassword!=""){
		document.getElementById("currpass").innerHTML="";	
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
	if(uname===""||currpassword===""||npassword===""||rpassword===""){
		if(uname===""){
			document.getElementById("uname").innerHTML="Fill user name";
		}
		if(currpassword===""){
			document.getElementById("currpass").innerHTML="Fill current pass";
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
			const valid = isValidChange(jsForm);
			console.log(valid);
			if (valid) {
					const uname=jsForm.uname.value;
					const currpassword=jsForm.currpassword.value;
					const npassword=jsForm.npassword.value;
					const rpassword=jsForm.rpassword.value;

				const xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					document.getElementById("res").innerHTML = this.responseText;
					document.getElementById("process").style.display = "none";
				}
				xhttp.open("POST", "../Controller/ForgetAction.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("uname="+uname+"$currpassword="+currpassword+"&npassword="+npassword+"&rpassword="+rpassword);
			}
			//return false;
}