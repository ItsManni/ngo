function SetPassword()
{

    var password = $("#password").val();
    if(password == ''){
        WeboAlert("Please enter password");
        return false;
    }

    var password = $("#confirmpassword").val();
    if(password == ''){
        WeboAlert("Please enter confirm password");
        return false;
    }

	
}
