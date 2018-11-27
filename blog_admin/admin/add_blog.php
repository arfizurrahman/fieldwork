
<?php
session_start();
// 
//sorasori deshbord page er url dile admin id null thakbe ..karon se login koreni..tai index page orthat login page e cole asbe
if ($_SESSION['admin_id'] == NULL) {
    header('Location:../index.php');
}

//
if (isset($_GET['logout'])) {
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
}
//
//

$message = '';
//message niche print 
if (isset($_POST['button'])) {
    require_once '../class/blog.php';
    $blog = new Blog();
    //$obj_student->Student_info($_POST);
    //message show korar jonno
    $message = $blog->save_blog_info($_POST);
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
                  <h5 class="breadcrumbs-title">Add Post</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                    
                    <li class="active">Add Post</li>
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
            <p class="caption"><?php 
						  if(isset($message)){
							  echo $message;
						  }
						?></p>
            <!--jqueryvalidation-->
            <div id="jqueryvalidation" class="section">
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Enter post information</h4>
                    <div class="row">
                      <form class="formValidate" id="formValidate" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <label for="unblog_titleame">Title *</label>
                            <input id="blog_title" name="blog_title" type="text" data-error=".errorTxt1">
                            <div class="errorTxt1"></div>
                          </div>
                          <div class="input-field col s12">
                            <label for="author_name">Author *</label>
                            <input id="author_name" type="text" name="author_name" data-error=".errorTxt2">
                            <div class="errorTxt2"></div>
                          </div>
						  <div class="input-field col s12">
                            <textarea id="blog_description" name="blog_description" class="materialize-textarea validate" data-error=".errorTxt7"></textarea>
                            <label for="blog_description">Description *</label>
                            <div class="errorTxt7"></div>
                          </div>
                          <div class="form-group">
                            <label for="blog_image">Image *</label>
                            <div class="col-sm-10">
                                <input type="file" name="blog_image" accept="image/*" multiple/>
                            </div>
                            <div class="errorTxt3"></div>
                          </div>
						  <!--<div class="form-group">
                            <label class="col-sm-2 control-label">Blog Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="" accept="image/*" multiple/>
                            </div>
                        </div>-->
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
                            <button class="btn waves-effect waves-light right submit" type="submit" name="button">Save
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