function isValidRegistration(jsForm){
	const name=jsForm.name.value;
	const address=jsForm.address.value;
	const email=jsForm.email.value;
	const gender=jsForm.gender.value;
	const jdate=jsForm.joinningdate.value;
	const post=jsForm.post.value;
	const uid=jsForm.uid.value;
	const uname=jsForm.uname.value;
	const password=jsForm.password.value;
	const cpassword=jsForm.cpassword.value;
	if(email!=""){
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(email.match(mailformat)){
			document.getElementById("email").innerHTML=" ";
		}
		else{
			document.getElementById("email").innerHTML=" invalid email formate";
		}
	}
	if(name!=""){
		document.getElementById("name").innerHTML=" ";
	}

	if(address!=""){
		document.getElementById("address").innerHTML=" ";
	}

	if(email!=""){
		document.getElementById("email").innerHTML=" ";
	}


	if(jdate!=""){
		document.getElementById("jdate").innerHTML=" ";
	}

	if(post!=""){
		document.getElementById("post1").innerHTML=" ";
	}

	if(uname!=""){
		document.getElementById("uname").innerHTML=" ";
	}

	if(password!=""){
		if(password.length<8){
			document.getElementById("pass").innerHTML="Password must be atleast 8 characters";

		}
		else
		{
			document.getElementById("pass").innerHTML="";
		}
	}
	if(cpassword!=""){
		if(cpassword!=password){
			document.getElementById("cpass").innerHTML="Password do not match";

		}
		else
		{
			document.getElementById("cpass").innerHTML="";
		}
	}


	if(name===""||address===""||email===""||gender===""||
		jdate===""||post===""||uid===""||uname===""||password===""
		||cpassword===""){
		if(name===""){
			document.getElementById("name").innerHTML=" Fill name properly";
		}
		if(address===""){
			document.getElementById("address").innerHTML=" Fill address properly";
		}
		if(email===""){
			document.getElementById("email").innerHTML=" Fill email properly";
		}
		if(gender===""){
			document.getElementById("gender").innerHTML=" Fill gender properly";
		}
		if(jdate===""){
			document.getElementById("jdate").innerHTML=" Fill joinning date properly";
		}
		if(post===""){
			document.getElementById("post1").innerHTML=" Fill post properly";
		}
		if(uname===""){
			document.getElementById("uname").innerHTML=" Fill username properly";
		}
		if(password===""){
			document.getElementById("pass").innerHTML=" Fill password properly";
		}
		if(cpassword===""){
			document.getElementById("cpass").innerHTML=" Fill confirm password ";
		}
		return false;
	}
	return true;
}
function sendData(jsForm) {
			const valid = isValidRegistration(jsForm);
			console.log(valid);
			if (valid) {
					const name=jsForm.name.value;
					const address=jsForm.address.value;
					const email=jsForm.email.value;
					const gender=jsForm.gender.value;
					const jdate=jsForm.joinningdate.value;
					const post=jsForm.post.value;
					const uid=jsForm.uid.value;
					const uname=jsForm.uname.value;
					const password=jsForm.password.value;
					const cpassword=jsForm.cpassword.value;
				const xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					document.getElementById("res").innerHTML = this.responseText;
					document.getElementById("process").style.display = "none";
				}
				xhttp.open("POST", "../Controller/RegistrationAction.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("name="+name+"&address="+address+"&email="+email+"&gender="+gender+"&joinningdate="+jdate+"&post="+post+"&uid="+uid+"&uname="+uname+"&password="+password+"&cpassword="+cpassword);
			}
			//return false;
}