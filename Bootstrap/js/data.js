var constants = {
	COOKIESET: "CookieSet",
	LENGHTPROBLEM:  "LenghtProblem",
	NOTUNIQUE: "NotUnique",
	NOTEXIST: "WrongData",
	LENGHTERROR: "Data must be at least 4 signs and up to 500",
	UNIQUEERROR: "There is already a user with that password or username",
	EXISTERROR: "There is no user with this password or username",
	FILLALLFIELDS: "Not all required fields are filled" 
}

var data = (function() {

	function userLogin(user) {
		$.ajax({
			url: "/Home/run",
			type: 'POST',
			data: JSON.stringify(user),
			contentType: "application/json",
			success: function(msg) {
				//console.log(JSON.stringify(user));
				if (msg.localeCompare(constants.LENGHTPROBLEM) == 0)  {
					var $allInputs = $("input");
					var lenght = $allInputs.length;
					for (var i = 0; i < lenght; i += 1) {
						var element = $($allInputs[i]);
						if (element.val().length < 4 || element.val().length > 500 ) {
							element.css("border", "2px solid red");
						}
					}
					$("section").prepend('<div class="error" style="color: red">' + constants.LENGHTERROR + "</div>");
				}
				else if (msg.localeCompare(constants.NOTEXIST) == 0) {
					$("section").prepend('<div class="error" style="color: red">' + constants.EXISTERROR + "</div>");
				}
				else {
					location.reload();
				}
			}	
		});
	}

	function userRegister(user) {
		$.ajax({
			url: "/Registration/makeRegistration",
			type: 'POST',
			data: JSON.stringify(user),
			contentType: "application/json",
			success: function(msg) {
				if (msg.localeCompare(constants.LENGHTPROBLEM) == 0)  {
					var $allInputs = $("input");
					var lenght = $allInputs.length;
					for (var i = 0; i < lenght; i += 1) {
						var element = $($allInputs[i]);
						if (element.val().length < 4 || element.val().length > 500 ) {
							element.css("border", "2px solid red");
						}
					}
					$("section").append('<div class="error" style="color: red">' + constants.LENGHTERROR + "</div>")
				}
				else if (msg.localeCompare(constants.NOTUNIQUE) == 0) {
					$("section").prepend('<div class="error" style="color: red">' + constants.UNIQUEERROR + "</div>")
				}
				else {
					window.location.replace("/Home")
				}
			}
		});
	}

	return { 
		users: {
			logIn: userLogin,
			register: userRegister
		}

	};

}());