
$().ready(function(){
	
	

    $("#update-form").validate({
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
    pass : {
    required : true,
    pattern:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/ 
            /// "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character"
            },
    npass : {
    required : true,
    pattern:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/ 
    /// "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character"
    },
    cnpass : {
        required : true,
        equalTo: "#npass"
        },

     // in 'messages' user have to specify message as per rules
    },messages : {
      
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
    pass : {
    required : "Please enter a current password",
    pattern: "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character"
    },
    
    npass : {
    required : "Please enter a new password",
    pattern: "Password must contain Minimum ten characters, at least one uppercase letter, one lowercase letter, one number and one special character"
    },
    cnpass : {
        required : "Please confrim the password",
        equalTo: "Passwords Do Not Match!"
    
    },
}
    });
    });
    
   