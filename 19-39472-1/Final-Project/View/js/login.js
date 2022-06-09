function isValid(jsForm) {
			/*const jsForm = document.forms["jsForm"];*/
			const uname = jsForm.uname.value;
			const password = jsForm.password.value;
			if(uname!=""){
				document.getElementById("uname").innerHTML="";
			}
			if(password!=""){
				document.getElementById("pass").innerHTML=" ";
			}
			if (password== "" || uname === "") {
				if(uname===""){
				document.getElementById("uname").innerHTML="Fill user name";
			}
			if(password===""){
				document.getElementById("pass").innerHTML="Fill password";
			}
				return false;
		}

			return true;
	}