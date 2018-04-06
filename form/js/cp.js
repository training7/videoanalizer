
$(document).ready(function(){

	$.validator.addMethod('strongPassword', function(value, element){
    return this.optional(element)
    || value.length >=6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
  },'Your password must be 6 character and bla bla')
  $("#changepass").validate({
    rules:{
        password3:{
       required:true,
       strongPassword:true
      },
      password4:{
        required:true,
        equalTo:"#password3"
      },

    }
  });




});