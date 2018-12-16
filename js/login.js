$(function(){
$("#login").validate({
    rules: {
      username: "required",
      password: "required",
    },
    // Specify validation error messages
    messages: {
    	username: "Please enter your username",
    	password: "Please provide a password",
    },

    submitHandler: function(form) {
    	$("#log_msg").html('');
    	$("#submit_btn").hide();
    	$("#log_loader").show();
    	$.post("processlogin.php", $("#login").serialize(), function(response){
    	    if(response==1){
    	//        $(".imgcaptcha").attr("src","captcha.php?_="+((new Date()).getTime()));
    				//$("#msg").show().html('Registration success').removeClass('alert-danger').addClass('alert-success');
    	//         clear_form();
    	    	 window.location.href = "home.php";
    	    }else if(response==2){
    		    	$("#log_msg").show().html('Invalid Login.Please try again.');
    		    	$("#log_loader").hide();
    	    	    $("#submit_btn").show();
    	    	    clear_form();
    		}else if(response==3){
    		    	$("#log_msg").show().html('UnAuthenticated User.Please try again.');
    		    	$("#log_loader").hide();
    	    	    $("#submit_btn").show();
    	    	    clear_form();
    		}else if(response==4){
    		    	$("#log_msg").show().html('Invalid Captcha Please try again.');
    		    	$("#log_loader").hide();
    	    	    $("#submit_btn").show();
    	    	    clear_form();
    	   }else{
    	    	$("#log_msg").show().html('Username or Password invalid');
    	    	$("#log_loader").hide();
        	    $("#submit_btn").show();
        	    clear_form();
    	   }
        	//$(".imgcaptcha").attr("src","captcha.php?_="+((new Date()).getTime()));
    	setTimeout(function() {
    		$("#log_msg").hide();
    	}, 4000);
       
    	});
    	return false;
    // form.submit();
    }
  });
});
function clear_form(){
	$("#username").val('');
	$("#password").val('');

}