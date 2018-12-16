<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Scada - Login </title>
	<script src="js/jquery-2.1.4.min.js"></script>
    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  </head>

  <body class="login">
    <div>


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		<span class="login-error" style="color: red;"> </span>
            <form name="login" method="post" id="login" autocomplete="off">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" id="username" name="username"  data-validation="required" data-validation-error-msg="Please enter username" autofocus tabindex="1"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" data-validation="required" data-validation-error-msg="Please enter password" tabindex="2" />
              </div>
              <div>
               
<input class="btn btn-default submit" type="submit" value="SUBMIT" id="submit_btn">
<img style="display: none; text-align:center; height: 26px" id="loader" src="images/loader.gif" /></div>
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>

         </div>
    </div>
<script>
$(document).ready(function () {
	$.validate({
		onSuccess:function(){
			$("#submit_btn").hide();
			$("#loader").show();
			$.post("processlogin.php?"+$("#login").serialize(), { }, function(response){
			    if(response==1){
			//        $(".imgcaptcha").attr("src","captcha.php?_="+((new Date()).getTime()));
			//         clear_form();
			    	 window.location.href = "dashboard.php";
			    }else{
				    if(response==2){
				    	$(".login-error").html('Invalid Login.Please try again.');
				    	$(".login-error").show();
				    	/* setTimeout(function() {
							$(".login-error").hide();
						}, 2000); */
				    }
				    if(response==3){
				    	$(".login-error").html('UnAuthenticated User.Please try again.');
				    	$(".login-error").show();
				    	/* setTimeout(function() {
							$(".login-error").hide();
						}, 2000); */
				    }
				    if(response==4){
				    	$(".login-error").html('Invalid Captcha Image.Please try again.');
				    	$(".login-error").show();
				    	/* setTimeout(function() {
							$(".login-error").hide();
						}, 2000); */
				    }
				    $("#loader").hide();
				    $("#submit_btn").show();
				    clear_form();
//		    	$(".imgcaptcha").attr("src","captcha.php?_="+((new Date()).getTime()));
			    }
			});
			return false;
		}
	});
	function clear_form()
	{
	   $("#username").val('');
	   $("#password").val('');
	//	$("#captcha").val('');
	}
});
</script>
  </body>
</html>
