<?php
//page ta reload dile at first session start hobe..session er er moddhe admin id ache kina check korbe
//id thakle only deshboard a jabe...login page a asbena

session_start();

$_SESSION['error']['confirm_password'] = NULL;
if(isset($_SESSION['admin_id'])){
    if($_SESSION['admin_id']!=NULL){
        header('Location: admin/deshboard.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdNRmQUAAAAAAalHfYEgs4dCn-wTb8JXvTT8eVZ',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if($res["success"]){
			if(isset($_POST['register'])){
    require_once 'class/login.php';
    $login=new Login();
    $userReg = $login->admin_registration($_POST);
}
			
        }else{
            $msg = 'Please go back and make sure you check the security CAPTCHA box';
        }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="registration/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registration/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registration/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registration/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registration/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="registration/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registration/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registration/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="registration/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="registration/css/util.css">
	<link rel="stylesheet" type="text/css" href="registration/css/main.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
<?php 
						  if(isset($userReg)){
							  echo $userReg;
						  }
						?>
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-15">
						Register
					</span>

                    
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="fullname">
						<span class="focus-input100" data-placeholder="Full Name"></span>
					</div>
                   <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>
					<div class="wrap-input100 validate-input"  data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input id="password" class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
                   <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input id="password2" class="input100" type="password" data-validate-linked="password" name="confirm_password">
						<span class="focus-input100" data-placeholder="Confirm password"></span>
					</div>
                     <?php 
                             if(isset($_SESSION['error']['confirm_password']))
                             {
                                echo '<font color="red">'.$_SESSION['error']['confirm_password'].'</font></br>';  
                             }
                             
                         ?>
                   
                   <div class="g-recaptcha" data-sitekey="6LdNRmQUAAAAAENVR4Pan8I_nV5bOUcG8vMWWca2"></div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name= "register" type="submit" class="login100-form-btn">
								Register
							</button>
						</div>
					</div>

					<div class="text-center p-t-20">
						<span class="txt1">
							Back to login?
						</span>

						<a class="txt2" href="index.php">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="registration/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="registration/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="registration/vendor/bootstrap/js/popper.js"></script>
	<script src="registration/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="registration/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="registration/vendor/daterangepicker/moment.min.js"></script>
	<script src="registration/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="registration/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="registration/js/main.js"></script>
<script src="registration/vendors/validator/validator.js"></script>

</body>
</html>