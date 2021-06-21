// username: "ribiczijah@gmail.com",
// password: "SuperPassword!@#"

	function login() {

	var username = $("#username").val();
	var password = $("#password").val();

	$.ajax({
	    type: 'POST',
	    url: 'https://scu-kursevi.herokuapp.com/api/auth/login',
	    dataType: 'json',
	    contentType: "application/json",
	    data: JSON.stringify({
		  username: username,
		  password: password
	    })
	}).then(function (data) {
		window.localStorage.setItem("TOKEN", data.accessToken);
		window.localStorage.setItem("TOKEN_TYPE", data.tokenType);
	}).done(function() {

	});

}