<?php
//get diye asa id catch
$blog_id = $_GET['id'];
//echo $student_id;
require_once '../class/blog.php';
$blog = new Blog();
//$student->select_student_info_by_id($student_id);
$query_result = $blog->Select_blog_info_by_id($blog_id);
$selected_blog_info = mysqli_fetch_assoc($query_result);
//$query_result var a just info ache...koita row ,koita column
////mysqli_fecth_assoc() diye aigula fetch kore value gula niye asa hoi
//aita k print korabo field er vtor 

if (isset($_POST['button'])) {
    $blog->Update_blog_info($_POST);
}
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header('Location:../index.php');
}

//
if (isset($_GET['logout'])) {
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
}
?>

<?php include '../includes/header.php' ?>
       <script>
            function checkDelete() {
                var check = confirm('Are you want to delete this');
                if (check) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
		
		
		
		 <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <?php include '../includes/leftsidebar.php' ?>
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Edit Post</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                    
                    <li class="active">Edit Post</li>
                  </ol>
                </div>
                
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            <!--
              jQuery Validation Plugin
          -->
            <!--jqueryvalidation-->
            <div id="jqueryvalidation" class="section">
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Edit post information</h4>
                    <div class="row">
                      <form class="formValidate" id="formValidate" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <label for="unblog_titleame">Title *</label>
                            <input id="blog_title" name="blog_title" value="<?php echo $selected_blog_info['blog_title']; ?> " type="text" data-error=".errorTxt1">
                            <div class="errorTxt1"></div>
							 <input type="hidden" name="blog_id" class="form-control" value="<?php echo $selected_blog_info['blog_id']; ?>">
                          </div>
                          <div class="input-field col s12">
                            <label for="author_name">Author *</label>
                            <input id="author_name" type="text" value="<?php echo $selected_blog_info['author_name']; ?>" name="author_name" data-error=".errorTxt2">
                            <div class="errorTxt2"></div>
                          </div>
						  <div class="input-field col s12">
                            <textarea id="blog_description" name="blog_description" class="materialize-textarea validate" data-error=".errorTxt7"><?php echo $selected_blog_info['blog_description']; ?></textarea>
                            <label for="blog_description">Description *</label>
                            <div class="errorTxt7"></div>
                          </div>
                          <div class="form-group">
                            <label for="blog_image">Image *</label>
                            <div class="col-sm-10">
                                <input type="file" name="blog_image" accept="image/*" multiple/>
								<img src="<?php echo $selected_blog_info['blog_image']; ?>" alt="" height="100" width="100"/>
                            </div>
                            <div class="errorTxt3"></div>
                          </div>
						  <!--<div class="form-group">
                            <label class="col-sm-2 control-label">Blog Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="" accept="image/*" multiple/>
                            </div>
                        </div>-->
						<br><br>
                          <div class="col s12">
                            <label for="publication_status">Publication Status *</label>
                            <select class="error browser-default" id="publication_status" name="publication_status" data-error=".errorTxt6">
                              <option>--Select Publication Status--</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                            </select>
                            <div class="input-field">
                              <div class="errorTxt6"></div>
                            </div>
                          </div>
                          
                          
                          <div class="input-field col s12">
                            <button class="btn waves-effect waves-light right submit" type="submit" name="button">Update
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
	<?php include '../includes/footer.php' ?>