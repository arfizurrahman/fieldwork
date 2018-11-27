<?php


class login {
    
    //for connecting with database
    protected $connection;
    public function __construct() {
       $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_blog';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        
        if (!$this->connection) {
             die('Connection Fail' . mysqli_error($this->connection));
        }
    }
    
    public function admin_login_check($data){
		
        //echo '<pre>';
        //print_r($data)
		$email = $data['email'];
		$password = $data['password'];
		if($email=="" OR $password==""){
			$message = "<div class='alert alert-danger'>Field can not be empty!</div>";
			return $message;
		}
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$message = "<div class='alert alert-danger'>Invalid email address!</div>";
			return $message;
		}
        
        $password= md5($data['password']);
        $query= "SELECT *FROM tbl_user WHERE email='$email' AND password='$password'";
        $result= mysqli_query($this->connection, $query);
//        echo '<pre>';
          //echo $result;
//        output- some resourses... to extract data from resourses....
        $admin_info= mysqli_fetch_assoc($result);
//        echo '<pre>';

        if($admin_info){
            session_start();
            $_SESSION['admin_id']=$admin_info['id'];
            $_SESSION['admin_name']=$admin_info['fullname'];
//            header('Location: deshboard.php');
             header('Location: admin/dashboard.php');
            
        }
        else{
           $message='Invalid eamil id or password';
           return $message;
            
        }
    }
    
    public function admin_registration($data){
		
		$fullname = $data['fullname'];
		$email = $data['email'];
		$username = $data['username'];
        $password = $data['password'];
		$confirm_password = $data['confirm_password'];
		
		if($fullname == "" OR $email=="" OR $username == "" OR $password=="" OR $confirm_password==""){
			$message = "<div class='alert alert-danger'>Field can not be empty!</div>";
			return $message;
		}
		if(strlen($fullname) < 4){
			$message = "<div class='alert alert-danger'>Name is too short!</div>";
			return $message;
		}
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$message = "<div class='alert alert-danger'>Invalid email address!</div>";
			return $message;
		}
     
		
		if(strlen($username) < 4){
			$message = "<div class='alert alert-danger'>Username is too short!</div>";
			return $message;
		}elseif (preg_match('/[^a-z0-9_-]+/i',$username)) {
			$message = "<div class='alert alert-danger'>Invalid user name!</div>";
			return $message;
		}
		if (strlen($password) < 6) {
			$message = "<div class='alert alert-danger'>Password is too short!</div>";
			return $message;
		}
		if ($password !== $confirm_password) {
			$_SESSION['error']['confirm_password'] = "Passwords didn't match!";
            return;
		}
		
        $check_email = $this->isEmailExists($email);
		if($check_email == true){
			$message = "<div class='alert alert-danger'>Email already exists!</div>";
			return $message;
		}
		$password= md5($data['password']);
       $query = "INSERT INTO tbl_user (fullname,email,username,password) VALUES ('$fullname','$email','$username','$password')";

        // mysqli_query($link, $db_name) mool function to execute the query
        //ai function ta jodi agument gula use kore data nite pare taile trye na hoile flase(else)
        //message ta function jkhane call hoise oikhane jabe
        if (mysqli_query($this->connection, $query)) {
            $message = "<div class='alert alert-success'>Registraction Successful!</div>";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
	public function isEmailExists($email){

         $query = "SELECT email FROM tbl_user WHERE email = '$email'";
         $result= mysqli_query($this->connection, $query);
        $admin_info= mysqli_fetch_assoc($result);
         if($admin_info) {
         	return true;
         }
         else{
         	return false;
         }

	}
     public function admin_logout(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        header("Location: ../index.php");
    }
    
    
}
