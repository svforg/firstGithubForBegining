// function prepareEventHandlers() {

// 	var formContact = document.getElementById("formContact");

// 	var fields = [];
// 	var spanError = document.getElementById("errorFrontend");
// 	fields[fields.length] = document.getElementById("email");	
// 	fields[fields.length] = document.getElementById("pass");

// 	formContact.addEventListener('submit', checkFields);

// 	function checkFields(event) {
// 		event.preventDefault();			
		
// 		for (i = 0; i < fields.length; i++) {
// 			if (!fields[i].value) {
// 				console.log(fields[i]);
// 		 	 	fields[i].classList.add("errorField");			
// 				return false;
// 			}
// 			document.getElementById("errorFrontend").innerHTML ="";
// 			return true;	
// 		}			
		
				
// 	};
// }

// window.onload = function () {
// 	prepareEventHandlers();
// }

window.onload = function () {
	var inpEmail = document.querySelector('input[name=email]');
	var inpPass = document.querySelector('input[name=pass]');


	document.querySelector('#send').onclick = function() {
		var params = 'email=' + inpEmail.value + '&' + 'pass=' + inpPass.value
		ajaxPost(params);
	};
} 
function ajaxPost(params){	
	var request = new XMLHttpRequest();

	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {			
			if (request.responseText == 1) {
				document.location = 'index.php';
				
			} else {
				document.querySelector('#result').innerHTML = request.responseText;
				alert(request.responseText);
			}
		}
	}

	request.open('POST', 'ajaxresponse.php');
	request.setRequestHeader('ContentType', 'application/x-www-formurlencoded');
	request.send(params);


}