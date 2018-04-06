/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */

(function ($) {

    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU 
            ------------------------------------*/
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            /* MORRIS BAR CHART
			-----------------------------------------*/
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                }, {
                    y: '2007',
                    a: 75,
                    b: 65
                }, {
                    y: '2008',
                    a: 50,
                    b: 40
                }, {
                    y: '2009',
                    a: 75,
                    b: 65
                }, {
                    y: '2010',
                    a: 50,
                    b: 40
                }, {
                    y: '2011',
                    a: 75,
                    b: 65
                }, {
                    y: '2012',
                    a: 100,
                    b: 90
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Series A', 'Series B'],
				 barColors: [
    '#e96562','#414e63',
    '#A8E9DC' 
  ],
                hideHover: 'auto',
                resize: true
            });
	 


            /* MORRIS DONUT CHART
			----------------------------------------*/
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Profits",
                    value: 12
                }, {
                    label: "Users",
                    value: 30
                }, {
                    label: "Total Sales",
                    value: 20
                }],
				   colors: [
    '#A6A6A6','#414e63',
    '#e96562' 
  ],
                resize: true
            });

            /* MORRIS AREA CHART
			----------------------------------------*/

            Morris.Area({
                element: 'morris-area-chart',
                data: [{
                    period: '2010 Q1',
                    iphone: 2666,
                    ipad: null,
                    itouch: 2647
                }, {
                    period: '2010 Q2',
                    iphone: 2778,
                    ipad: 2294,
                    itouch: 2441
                }, {
                    period: '2010 Q3',
                    iphone: 4912,
                    ipad: 1969,
                    itouch: 2501
                }, {
                    period: '2010 Q4',
                    iphone: 3767,
                    ipad: 3597,
                    itouch: 5689
                }, {
                    period: '2011 Q1',
                    iphone: 6810,
                    ipad: 1914,
                    itouch: 2293
                }, {
                    period: '2011 Q2',
                    iphone: 5670,
                    ipad: 4293,
                    itouch: 1881
                }, {
                    period: '2011 Q3',
                    iphone: 4820,
                    ipad: 3795,
                    itouch: 1588
                }, {
                    period: '2011 Q4',
                    iphone: 15073,
                    ipad: 5967,
                    itouch: 5175
                }, {
                    period: '2012 Q1',
                    iphone: 10687,
                    ipad: 4460,
                    itouch: 2028
                }, {
                    period: '2012 Q2',
                    iphone: 8432,
                    ipad: 5713,
                    itouch: 1791
                }],
                xkey: 'period',
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['iPhone', 'iPad', 'iPod Touch'],
                pointSize: 2,
                hideHover: 'auto',
				  pointFillColors:['#ffffff'],
				  pointStrokeColors: ['black'],
				  lineColors:['#A6A6A6','#414e63'],
                resize: true
            });

            /* MORRIS LINE CHART
			----------------------------------------*/
            Morris.Line({
                element: 'morris-line-chart',
                data: [
					  { y: '2014', a: 50, b: 90},
					  { y: '2015', a: 165,  b: 185},
					  { y: '2016', a: 150,  b: 130},
					  { y: '2017', a: 175,  b: 160},
					  { y: '2018', a: 80,  b: 65},
					  { y: '2019', a: 90,  b: 70},
					  { y: '2020', a: 100, b: 125},
					  { y: '2021', a: 155, b: 175},
					  { y: '2022', a: 80, b: 85},
					  { y: '2023', a: 145, b: 155},
					  { y: '2024', a: 160, b: 195}
				],
            
				 
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Total Income', 'Total Outcome'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','#414e63']
	  
            });
           
        
            $('.bar-chart').cssCharts({type:"bar"});
            $('.donut-chart').cssCharts({type:"donut"}).trigger('show-donut-chart');
            $('.line-chart').cssCharts({type:"line"});

            $('.pie-thychart').cssCharts({type:"pie"});
       
	 
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(function(){
    $("#username_error_message").hide();
    $("#email_error_message").hide();
    $("#firstname_error_message").hide();
    $("#lastname_error_message").hide();
    $("#password_error_message").hide();
    $("#confirmpassword_error_message").hide();
    $("#mobile_error_message").hide();
    
    var username_error_message=false;
    var email_error_message=false;
    var firstname_error_message=false;
    var lastname_error_message=false;
    var password_error_message=false;
    var confirmpassword_error_message=false;
    var mobile_error_message=false;
    
    $("#username").focusout(function(){
        /* Username Validation */
        check_username();
    });
    $("#email").focusout(function(){
        /* Email Validation */
        check_useremail();
    });
    $("#first_name").focusout(function(){
        /* First name Validation */
        check_userfirstname();
    });
    $("#last_name").focusout(function(){
        /* Last Name Validation */
        check_userlastname();
    });
    $("#password").focusout(function(){
        /* Password Validation */
        check_userpassword();
    });
    $("#password1").focusout(function(){
        /* Confirm Password Validation */
        check_userconfirmpassword();
    });
    $("#mobile").focusout(function(){
        /* Mobile Validation */
        check_usermobile();
    });

      function check_username(){
         var username_length=$("#username").val().length;
            if(username_length<5 || username_length >20){
                $("#username_error_message").html("Should be between 5-20 characters");
                $("#username_error_message").show();
                username_error_message=true;
            } else {
                $("#username_error_message").hide();
            }
        }
        function check_userfirstname(){
         var firstname_length=$("#first_name").val().length;
            if(firstname_length<5){
                $("#firstname_error_message").html("Please enter First Name");
                $("#firstname_error_message").show();
                firstname_error_message=true;
            } else {
                $("#firstname_error_message").hide();
            }
        }
        function check_userlastname(){
         var lastname_length=$("#last_name").val().length;
             
            if(lastname_length<5){
                $("#lastname_error_message").html("Please enter Last Name");
                $("#lastname_error_message").show();
                lastname_error_message=true;
            } else {
                $("#lastname_error_message").hide();
            }
        }
        function check_userpassword(){
         var password_length=$("#password").val().length;
            if(password_length<8){
                $("#password_error_message").html("Not less than 8 characters");
                $("#password_error_message").show();
                password_error_message=true;
            } else {
                $("#password_error_message").hide();
            }
        }
        function check_userconfirmpassword(){
         var password=$("#password").val();
         var confirmpassword=$("#password1").val();
            if(password != confirmpassword){
                $("#confirmpassword_error_message").html("Password and Confirm Password Should be same");
                $("#confirmpassword_error_message").show();
                confirmpassword_error_message=true;
            } else {
                $("#confirmpassword_error_message").hide();
            }
        }
    function check_useremail(){
        var val_email=$("#email").val();
        var pattern = new RegExp(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/);
        if(pattern.test(val_email)){
            $("#email_error_message").hide();
        } else {
            $("#email_error_message").html("Please Enter Valid email");
            $("#email_error_message").show();
            email_error_message=true;
        }
    }
    function check_usermobile(){
         var usermobile_length=$("#mobile").val().length;
            if(usermobile_length!=10){
                $("#mobile_error_message").html("Should be 10 Digits");
                $("#mobile_error_message").show();
                mobile_error_message=true;
            } else {
                $("#mobile_error_message").hide();
            }
        }

      $("#registration_form").submit(function(){
        username_error_message=false;
        email_error_message=false;
        firstname_error_message=false;
        lastname_error_message=false;
        password_error_message=false;
        confirmpassword_error_message=false; 
         
        check_username();
        check_useremail();
        check_userpassword();
        check_userconfirmpassword();
        check_userfirstname();
        check_userlastname();
        check_usermobile();
                
        if(username_error_message==false && email_error_message==false && firstname_error_message==false && lastname_error_message==false && password_error_message==false && confirmpassword_error_message==false && mobile_error_message==false){
            return true;
            
        } else {
            return false;
        }
    });
});


$(document).ready(function(){
    $("#registration_form").trigger('reset');
});



    $(document).ready(function () {

		$(".dropdown-button").dropdown();
		$("#sideNav").click(function(){
			if($(this).hasClass('closed')){
				$('.navbar-side').animate({left: '0px'});
				$(this).removeClass('closed');
				$('#page-wrapper').animate({'margin-left' : '260px'});
				
			}
			else{
			    $(this).addClass('closed');
				$('.navbar-side').animate({left: '-260px'});
				$('#page-wrapper').animate({'margin-left' : '0px'}); 
			}
		});
		
        mainApp.initFunction(); 

        
    });

	$(".dropdown-button").dropdown();
	
}(jQuery));

