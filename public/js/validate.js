// *************************************************** //
// VERIFICATIONS DES DONNEES COTE CLIENT VIA LES FORMs //
// *************************************************** //
document.getElementById("submit").addEventListener('click', function(event){
	let form = document.querySelector("form").name;

	if ((form == "subscribe") || (form == "login")) {
		const name = '_name';
		const mail = '_email';
		const city = '_city';
		const pass = '_pass';
		const error = '_error';

		if (document.getElementById(form+name).value.length <= 2) {
			event.preventDefault();
			document.getElementById(form+name+error).textContent = 'Votre identifiant est trop court';
			document.getElementById(form+name+error).style.color = 'yellow';
		} else {
			let accept = new RegExp("[^a-zA-Z0-9]");
			if (accept.test(document.getElementById(form+name).value) == true) {
				event.preventDefault();
				document.getElementById(form+name+error).textContent = 'Caractères spcéciaux interdit';
				document.getElementById(form+name+error).style.color = 'yellow';
			} else {
				document.getElementById(form+name+error).textContent = '';
			}
		}			
		if (document.getElementById(form+pass).value.length <= 5) {
			event.preventDefault();
			document.getElementById(form+pass+error).textContent = '6 caractères min.';
			document.getElementById(form+pass+error).style.color = 'yellow';
		} else {
			document.getElementById(form+pass+error).textContent = '';
		}

		if (form == "subscribe") {
			if (document.getElementById(form+mail).value.length <= 10) {
				event.preventDefault();
				document.getElementById(form+mail+error).textContent = 'Votre email n\'est pas correct';
				document.getElementById(form+mail+error).style.color = 'yellow';
			} else {
				let accept = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if (accept.test(document.getElementById(form+mail).value)) {
					document.getElementById(form+mail+error).textContent ='';
				} else {
					event.preventDefault();
					document.getElementById(form+mail+error).textContent = 'Vérifier le format de l\'email';
					document.getElementById(form+mail+error).style.color = 'yellow';
				}
			}
			if (document.getElementById(form+city).value.length <= 2) {
				event.preventDefault();
				document.getElementById(form+city+error).textContent = '3 caractères min.';
				document.getElementById(form+city+error).style.color = 'yellow';
			} else {
				let accept = new RegExp("[^a-zA-Z]");
				if (accept.test(document.getElementById(form+city).value) == true) {
					event.preventDefault();
					document.getElementById(form+city+error).textContent = 'Caractères spcéciaux interdit';
					document.getElementById(form+city+error).style.color = 'yellow';
				} else {
            		document.getElementById(form+city+error).textContent = '';	
         		}
			}
		}
	} else if (form == "update_city") {
		if (document.getElementById("update_city").value.length <= 2) {
			event.preventDefault();
			document.getElementById("update_city_error").textContent = '3 caractères min.';
			document.getElementById("update_city_error").style.color = 'yellow';
		} else {
			let accept = new RegExp("[^a-zA-Z]");
			if (accept.test(document.getElementById("update_city").value) == true) {
				event.preventDefault();
				document.getElementById("update_city_error").textContent = 'Caractères spcéciaux interdit';
				document.getElementById("update_city_error").style.color = 'yellow';
			} else {
            	document.getElementById("update_city_error").textContent = '';
			}		
		}
	} else if (form == "update_pass") {
		const update = 'update';
		const old = 'old';
		const passRep = '_passRep';
		const pass = '_pass';
		const error = '_error';

		if (document.getElementById(old+pass).value.length <= 5) {
			event.preventDefault();
			document.getElementById(old+pass+error).textContent = '6 caractères min.';
			document.getElementById(old+pass+error).style.color = 'yellow';
		} else {
			document.getElementById(old+pass+error).textContent = '';
		}
		if (document.getElementById(update+pass).value.length <= 5) {
			event.preventDefault();
			document.getElementById(update+pass+error).textContent = '6 caractères min.';
			document.getElementById(update+pass+error).style.color = 'yellow';
		} else {
			document.getElementById(update+pass+error).textContent = '';
		}
		if (document.getElementById(update+passRep).value.length <= 5) {
			event.preventDefault();
			document.getElementById(update+passRep+error).textContent = '6 caractères min.';
			document.getElementById(update+passRep+error).style.color = 'yellow';
		} else {
			if (document.getElementById(update+passRep).value != document.getElementById(update+pass).value) {
				event.preventDefault();
				document.getElementById(update+passRep+error).textContent = 'Les mots de passe sont différents !';
				document.getElementById(update+passRep+error).style.color = 'yellow';
			} else {
				document.getElementById(update+passRep+error).textContent = '';
				document.getElementById(update+pass+error).textContent = '';
			}
		}
	}
});