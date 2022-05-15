
$().ready(function(){
	
	

$("#signup-form").validate({
// in 'rules' user have to specify all the constraints for fields
rules : {
fname : {
required : true,
minlength : 2, //for length of fname
pattern :/^[A-Za-z]+$/
   },  
lname : {
required : true,
minlength : 2 ,//for length of lname 
pattern : /^[A-Za-z]+$/

	},  
userName : {
required : true,
minlength : 2, //for length of username
pattern:/^[A-Za-z0-9 _]*[A-Za-z0-9 _]*$/
},
password : {
required : true,
pattern:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/ 
/// "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character"
},
interest: {
required : true,
minlength: 1
},
email : {
required : true,
email : true
},
 // in 'messages' user have to specify message as per rules
},messages : {
  email : {
  required : "Please enter a email"

  },
interest:{
  required:"Please choose one of the options"
},
fname :{
required : "Please enter a First name ",
minlength: "Your First name must consist of at least 2 characters",
pattern:"First Name must contain only alphabets"
	},
lname :{
required : "Please enter a Last name ",
minlength: "Your Last name must consist of at least 2 characters",
pattern:"last Name must contain only alphabets"


			},

userName :{
required : "Please enter a username",
minlength: "Your username must consist of at least 2 characters",
pattern:    "Username must contain only alphabets ,numbers and underscore"
},
password : {
required : "Please enter a password",
pattern: "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character"
},

}
});
});

/*-----Password vaildtion------ */
$(function(){

	  $(".pr-password").passwordRequirements();

	});

  $(".pr-password").passwordRequirements({
    numCharacters: 10,
	  useLowercase: true,
	  useUppercase: true,
	  useNumbers: true,
	  useSpecial: true,
	  style: "light",
      fadeTime: 600

	});