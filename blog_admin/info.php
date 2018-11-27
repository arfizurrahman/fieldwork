<?php
$host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_blog';
        $connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        //echo '<pre>';
        // print_r($connection);
        //exit();
        if (!$connection) {
            die('Connection Fail' . mysqli_error($connection));
        }
		
		$query = "SELECT blog_title,author_name,blog_description FROM tbl_blog";
		$query_result = mysqli_query($connection, $query);
		while($row= mysqli_fetch_assoc($query_result)){
               $json_array["product"][] = $row;
                          
	    }
		echo json_encode($json_array); 