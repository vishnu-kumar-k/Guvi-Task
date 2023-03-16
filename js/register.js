// includes('../php');
$(document).ready(function() {
	$('#submit').submit(function(e) {
		e.preventDefault();
        var Name =$('#username').val();
		var email=$('#email').val();
        var number=$('#Phone_number').val();
        var date=$('#date').val();
		var Password = $('#password').val();
		
        
		$.ajax({
			url: 'http://localhost:3000/php/register.php',
			type: 'POST',
			data: {
				username: Name,
				password: Password,
                number:number,
                date:date,
                useremail:email
			},
			success:  function(response) {
                var result=JSON.parse(response)
                if(result.status)
                {
				$('#result').html("Registration successful");
                console.log(JSON.parse(response).status);
                 winlocalStorage.setItem('name',Name)
                window.location.replace("profile.html")
                }
                else{
                    $('#result').html("Something went wrong")
                }
                // alert("success")
			},
			error: function()
			{
				console.log("Error")
			}

		});
    

	});
});
