<?php

class ShowBlog {
    
    protected $connection;
    public function __construct() {
       //host name,user name,password, particular database er naam
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_blog';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        //echo '<pre>';
        // print_r($connection);
        //exit();
        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }

    
    public function allPublishedBlogInfo(){
		
        $query="SELECT *FROM tbl_blog WHERE publication_status=1 ORDER BY blog_id DESC";
        if(mysqli_query($this->connection, $query)){
            $query_result= mysqli_query($this->connection, $query);
            return $query_result;
        }else{
            die('Query Problrm'.mysqli_error($this->connection));
        } 
    }
    //ai function k index.php te call
    
    public function selectBlogInfoById($blog_id){
		$user_id = $_SESSION['admin_id'];
         $query="SELECT *FROM tbl_blog WHERE blog_id=$blog_id AND user_id = $user_id" ;
        if(mysqli_query($this->connection, $query)){
            $query_result= mysqli_query($this->connection, $query);
            return $query_result;
        }else{
            die('Query Problrm'.mysqli_error($this->connection));
        } 
    }
    
}
