
<?php

class Blog {

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

    public function save_blog_info($data) {
        $title = $data['blog_title'];
		$author = $data['author_name'];
		$description = $data['blog_description'];
		$publication_status = $data['publication_status'];
        
		if ($_SESSION['admin_id'] != NULL){
			$user_id = $_SESSION['admin_id'];
		}
		if($title=="" OR $author=="" OR $description=="" OR $publication_status==""){
			$message = "<div class='alert alert-danger'>Field can not be empty!</div>";
		    return $message;
		}
		
		$image_url = $this->save_image_info();
        $query = "INSERT INTO tbl_blog (blog_title,author_name,blog_description,blog_image,publication_status, user_id) VALUES ('$title','$author','$description','$image_url','$publication_status', '$user_id')";

        if (mysqli_query($this->connection, $query)) {
            $message = 'Blog info saved successflly';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function Select_all_blog_info() {
		$user_id = $_SESSION['admin_id'];
        $query = "SELECT * FROM tbl_blog WHERE user_id = $user_id ORDER BY blog_id DESC";
        //$query = "SELECT blog_id,blog_title,author_name,blog_description FROM tbl_blog";
        
		if (mysqli_query($this->connection, $query)) {
            $query_result = mysqli_query($this->connection, $query);
//           //uporer var ta prnt korle just info dibe...koi row ,koita column
//            //mysqli_fecth_assoc() diye aigula fetch korte hobe
//            //joto gulo row totobar loop colbe
            //while($row= mysqli_fetch_assoc($query_result)){
              // $json_array["product"][] = $row;
               //echo json_encode($json_array);            }
            //exit();
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function Select_blog_info_by_id($blog_id) {
        $query = "SELECT * FROM tbl_blog WHERE blog_id='$blog_id'";
        if (mysqli_query($this->connection, $query)) {
            $query_result = mysqli_query($this->connection, $query);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function Update_blog_info($data) {
        if ($_FILES['blog_image']['name']) {
            $image_url=$this->save_image_info();
            //INSERT INTO tbl_student (student_name,contact_number,email,address) VALUES ('asdf','9837364','asd@gmail.com','asgdfagsjjdsgh');
            $query = "UPDATE tbl_blog SET blog_title='$data[blog_title]',author_name='$data[author_name]',blog_description='$data[blog_description]',blog_image='$image_url',publication_status='$data[publication_status]' WHERE blog_id='$data[blog_id]'";
            if (mysqli_query($this->connection, $query)) {
                session_start();
                $_SESSION['message'] = 'Blog info updated successfully';
                header('Location:../admin/manage_blog.php');
            } else {
                die('Query problem' . mysqli_error($this->connection));
            }
        } else {
            $query = "UPDATE tbl_blog SET blog_title='$data[blog_title]',author_name='$data[author_name]',blog_description='$data[blog_description]',publication_status='$data[publication_status]' WHERE blog_id='$data[blog_id]'";
            if (mysqli_query($this->connection, $query)) {
                session_start();
                $_SESSION['message'] = 'Blog info updated successfully';
                header('Location:../admin/manage_blog.php');
            } else {
                die('Query problem' . mysqli_error($this->connection));
            }
        }
    }

    public function Delete_blog_info($id) {

        //INSERT INTO tbl_student (student_name,contact_number,email,address) VALUES ('asdf','9837364','asd@gmail.com','asgdfagsjjdsgh');
        $query = "DELETE FROM tbl_blog WHERE blog_id='$id'";
        if (mysqli_query($this->connection, $query)) {
            $message = 'Blog info deleted successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

//    public function save_image_info($data){
//         echo '<pre>';
//         print_r($_FILES);
//    }
//    
    
    
    
    public function save_image_info() {
//        echo '<pre>';
//        print_r($_FILES);
        $image_name = $_FILES['blog_image']['name'];
        if($image_name == ""){
            die ('No image selected');
        }
        $image_temp_name = $_FILES['blog_image']['tmp_name'];
        //image url diye image ta kothai jabe....location and img name ta concatinate kora hoise 
        $image_url = '../asset/blog image/' . $image_name;

        //type check
        $image_type = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_size = $_FILES['blog_image']['size'];
        $check = getimagesize($image_temp_name);

        //getimagesize()function ta image pele kichu value return korbe...image na hoye onno file hole kichui return korbena
        if ($check) {
            if (file_exists($image_url)) {
                //image ta akbar thakle ita check korar jonno
                die('The image already exists.Please try another image file');
            } else {
                if ($image_type != 'jpg' && $image_type != 'JPG' && $image_type != 'png' && $image_type != 'PNG') {
                    die('Image type not valid.Please use jpg or png file');
                } else {
                    if ($image_size > 500000000) {
                        die('Image size is too lage');
                    } else {
                        //$_FILES['image']['tmp_name'] er moddhe imge er current directoty ta ache
                        //file upload er jonno...... move_uploaded_file($dirctory....file ta kothai ache,$destination....kothai jabe) 
                        move_uploaded_file($_FILES['blog_image']['tmp_name'], $image_url);
                        return $image_url;
                        //image url ta upore sve blog info() te .....
//                        $query = "INSERT INTO tbl_image (image) VALUES ('$image_url')";
//                        mysqli_query($this->connection, $query);
//                        echo "image uploaded successfully";
                    }
                }
            }
        } else {
            die('Uploaded file is not an image.Please upload a valid image file!');
        }
    }

//    public function selectAllImageInfo() {
//        $query="SELECT * FROM tbl_image"; 
//        if (mysqli_query($this->connection, $query)) {
//            $query_result = mysqli_query($this->connection, $query);
//            return $query_result;
//        } else {
//            die('Query Prblem'.mysqli_errno($this->connection));  
//        }
//    }
}
