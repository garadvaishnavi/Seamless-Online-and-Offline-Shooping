function formValidation(){
  var fname = document.feedback.firstname;
  var email = document.feedback.email;
  var contact = document.feedback.contact;
  var comment = document.feedback.comment;

  if(allLetter(fname)){
        if(ValidateEmail(email)){
           if(ValidateContact(contact)){
           	  if(ValidateComment(comment)){
           	  return true;
           }
        }
  }
}
  return false;
}

function allLetter(fname)
{ 
var letters = /^[A-Za-z]+$/;
if(fname.value.replace(/\s+/g, '').match(letters))
{
return true;
}
else
{
alert('Name must have alphabet characters only');
fname.focus();
return false;
}
}
function ValidateEmail(email)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
email.focus();
return false;
}
}
function ValidateContact(contact)
{
	var numbers = /^\d{10}$/;
if(contact.value.match(numbers))
{
return true;
}
else
{
alert('Contact number must have 10 numeric characters');
contact.focus();
return false;
}
}
function ValidateComment(comment)
{ 
var letters = /^[0-9a-zA-Z]+$/;
if(comment.value.match(letters))
{
return true;
}
else
{
alert('feedback must have alphanumeric characters only');
comment.focus();
return false;
}
}
