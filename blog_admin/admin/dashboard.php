
<?php
session_start();
// 
//sorasori deshbord page er url dile admin id null thakbe ../assetkaron se login koreni../assettai index page orthat login page e cole asbe
if ($_SESSION['admin_id'] == NULL) {
    header('Location:../index.php');
}


//for calling fuction, u have to require the php file
require_once '../class/showBlog.php';
$showBlog = new ShowBlog();
//$showBlog->allPublishedBlogInfo();
$query_result = $showBlog->allPublishedBlogInfo();

//
if (isset($_GET['logout'])) {
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
}

?>
<?php include '../includes/header.php' ?>
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <div class="wrapper">
        <?php include '../includes/leftsidebar.php' ?>
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
                  <h5 class="breadcrumbs-title">Blog Posts</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li class="active">Blog Posts</li>
                  </ol>
                </div>
                
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            <div class="section">
              <!-- start item list -->
              <div id="item-posts" class="row">
                <div class="item-sizer"></div>
				<?php while ($blog_info = mysqli_fetch_assoc($query_result)) { ?>
                <div class="item">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <a href="#">
                        <img src="../admin/<?php echo $blog_info['blog_image']; ?>" alt="item-img">
                      </a>
                      <h4 class="card-title text-shadow m-0"><?php echo $blog_info['blog_title']; ?></h4>
                    </div>
                    <ul class="card-action-buttons">
                      <li>
                        <a class="btn-floating waves-effect waves-light teal accent-4">
                          <i class="material-icons">share</i>
                        </a>
                      </li>
                      <li>
                        <a class="btn-floating waves-effect waves-light red accent-2">
                          <i class="material-icons">info_outline</i>
                        </a>
                      </li>
                    </ul>
                    <div class="card-content">
                      <a href="#!"></a>
                      
                      <p class="item-post-content"><?php echo mb_substr($blog_info['blog_description'], 0, 100); ?>...</p>
					  <p><a href="blog_details.php?id=<?php echo $blog_info['blog_id']; ?> && title=<?php echo $blog_info['blog_title']; ?>" >View details &raquo;</a></p>
                    
                      <div class="row">
					  
                        <div class="chip right">
                           <a href="#!"><?php echo $blog_info['author_name']; ?></a>
                        </div>
                      </div>
					  </div>
                    
                  </div>
                </div>
				<?php } ?>
               </div>
              <!--/ end item list -->
            </div>
            <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
              <a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow">
                <i class="material-icons">add</i>
              </a>
              <ul>
                <li>
                  <a href="css-helpers.html" class="btn-floating blue">
                    <i class="material-icons">help_outline</i>
                  </a>
                </li>
                <li>
                  <a href="cards-extended.html" class="btn-floating green">
                    <i class="material-icons">widgets</i>
                  </a>
                </li>
                <li>
                  <a href="app-calendar.html" class="btn-floating amber">
                    <i class="material-icons">today</i>
                  </a>
                </li>
                <li>
                  <a href="app-email.html" class="btn-floating red">
                    <i class="material-icons">mail_outline</i>
                  </a>
                </li>
              </ul>
            </div>
            <!-- Floating Action Button -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
	<!--page-item.js - Page Specific JS codes-->
    
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <?php include '../includes/footer.php' ?>
