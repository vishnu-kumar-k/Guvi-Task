$(document).ready(function()
{
    var t=window.localStorage.getItem('email')
    $('#logout').click(function()
    {
        window.localStorage.removeItem("email");
        window.location.replace("login.html")
    });
    $.ajax({
        url: "http://localhost:3000/php/profile.php",
        type: "POST",
        data: {
          email: t
        },
        success: function (response) {
            console.log(response)
            var p = JSON.parse(response);
            $('#name').html(p.name)
            $('#number').html(p.number)
            $('#email').html(p.email)
            $('#dob').html(p.dob)
        },
        error:function()
        {
            console.log("Error")
        }
});
})