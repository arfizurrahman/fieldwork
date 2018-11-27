<?php
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header('Location:../index.php');
}
if (isset($_GET['logout'])) {
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
}

//get id from blog description in index.php
$blog_id = $_GET['id'];
require_once '../class/showBlog.php';
$showBlog = new ShowBlog();
//$showBlog->allPublishedBlogInfo();
$query_result = $showBlog->selectBlogInfoById($blog_id);
$blog_info = mysqli_fetch_assoc($query_result);
?>

<?php include '../includes/header.php' ?>
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <?php include '../includes/leftsidebar.php' ?>
		<!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Blog Details</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li class="active">Blog Details</li>
                  </ol>
                </div>
                
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            <div class="section">
              <div id="blog-post-full">
                
                
                <!-- large size post-->
                <div class="card large">
                  <div class="card-image">
                    <img src="../admin/<?php echo $blog_info['blog_image']; ?>" alt="sample">
				  
                    <span class="card-title"><?php echo $blog_info['blog_title']; ?></span>
                    
                  </div>
                  <div class="card-content">
                    <p><?php echo $blog_info['blog_description']; ?></p>
                  </div>
                  <div class="card-action">
                    <div class="chip">
                      <img src="../images/avatar/avatar-7.png" alt="Contact Person" class="cyan"> <a href="#!"><?php echo $blog_info['author_name']; ?></a>
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
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <?php include '../includes/footer.php' ?>