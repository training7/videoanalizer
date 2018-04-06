
$(document).ready(function(){  
     
  $("#signinform").validate({
    rules:{
      password:{
       required:true,
       minlength:5
      }
    }
  });

  $.validator.addMethod('strongPassword', function(value, element){
    return this.optional(element)
    || value.length >=6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
  },'Your password must be 6 character and bla bla')
  
  $("#signupform").validate({
    rules:{
      
      firstname:{
        required:true,
        nowhitespace:true,
        lettersonly:true
      },
      lastname:{
        required:true,
        nowhitespace:true,
        lettersonly:true
      },
      address:{
        required:true
      },
      city:{
        required:true,
        nowhitespace:true,
        lettersonly:true
      },
      newemail:{
        required:true,
         nowhitespace:true,
       email:true
      },
      password1:{
       required:true,
       strongPassword:true
      },
      password2:{
        required:true,
        equalTo:"#password1"
      },
      num:{
       required:true,
        minlength:10,
        maxlength:10 
      },
        
    }
  });
	$(".tab").click(function(){
  var x = $(this).attr('id');
  if(x=='signup'){
  	$('#signin').removeClass('select');
  	$('#signup').addClass('select');
  	$('#signupbox').slideDown();
  	$('#signinbox').slideUp();
  }
  else{
  	$('#signup').removeClass('select');
  	$('#signin').addClass('select');
  	$('#signinbox').slideDown();
  	$('#signupbox').slideUp();

  }
	});

  
});


 
