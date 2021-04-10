function formValidation()
{
var ufullname = document.signup.fullname;
var uphone = document.signup.phone;
var uemail = document.signup.email;
var upsw = document.signup.psw;
var upsw_repeat= document.signup.psw_repeat;
if(Letter(ufullname))
{
	if(phonenumber(uphone))
	{ 
		if(ValidateEmail(uemail))
		{
			if(pass(upsw))
		    {
			    if(reppass(upsw_repeat))
		        {
			
		        }
		    }
		}
	}
}
return false;

} 
function Letter(ufullname)
{ 	
	var letters = /^[a-zA-Z-'. ]+$/;
	if(ufullname.value.match(letters))
	{
	    return true;
	}
	else
	{
		alert('Name must have Alphabet characters only');
		ufullname.focus();
	}
}

function phonenumber(uphone)
{
  var phoneno = /^\d{10}$/;
    if(uphone.value.match(phoneno))
    {
        return true;
    }
    else
    {
        alert("Phone number exceeds 10 digits!");
        return false;
    }
}
function ValidateEmail(uemail)
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(uemail.value.match(mailformat))
	{
		return true;
	}
	else
	{
		alert("Entered an invalid email address!/Required to be filled");
		uemail.focus();
		return false;
	}
}
function pass(upsw)
{
	var pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	if(upsw.value.match(pass))
	{
		return true;
	}
	else
	{
		alert("Password must contain at least 6 characters, including UPPER/lowercase and numbers.");
		upsw.focus();
		return false;
	}
} 
function reppass(upsw_repeat) 
{
    if (upsw!= upsw_repeat) 
        {
            alert("Passwords do not match.");
            return false;
        }
    else 
    {
    	alert("Congratulations!!! Signup procedure is completed!!!")   
    } 
}