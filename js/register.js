// includes('../php');
$(document).ready(function() {
	$('#submit').submit(function(e) {
		e.preventDefault();
        var Name =$('#username').val();
		var email=$('#email').val();
        var number=$('#Phone_number').val();
        var date=$('#date').val();
		var Password = $('#password').val();
		
        console.log("Received")
		$.ajax({
			url: "http://localhost:3000/php/register.php",
			type: "POST",
			data: {
				username: Name,
				password: Password,
                number:number,
                date:date,
                useremail:email
			},
			success:  function(response) {
                var result=JSON.parse(response);
				console.log(result)
                if(result.status)
                {
				$('#result').html("Registration successful");
                console.log(JSON.parse(response).status);
                 window.localStorage.setItem('email',email)
                window.location.replace("profile.html")
                }
                else{
                    $('#result').html(result.msg)
                }
			},
			error: function()
			{
				console.log("Error")
			},

		});
    

	});
});
