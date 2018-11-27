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

$message = '';

require_once '../class/blog.php';
$blog = new Blog();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $blog->Delete_blog_info($id);
}


if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
$query_result = $blog->Select_all_blog_info();
?>
<?php include '../includes/header.php' ?>
<!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <?php include '../includes/leftsidebar.php' ?>
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">Manage Blog</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">Manage blog</li>
                  </ol>
                </div>
                
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            <!--Basic Scenario-->
              <div class="row">
			  <h3 class="text-center text-success"><?php echo $message; ?></h3>
                <div class="col s12">
                  <p>List of blogs</p>
                </div>
                <div class="col s12">
                  <div id="jsGrid-basic" class="jsgrid" style="position: relative; height: 70%; width: 100%;">
				  <div class="jsgrid-grid-header jsgrid-header-scrollbar">
				    <table class="jsgrid-table">
				  <tr class="jsgrid-header-row">
				  <th class="jsgrid-header-sortable" style="width: 150px;">Blog ID</th>
				  <th class="jsgrid-header-sortable" style="width: 50px;">Title</th>
				  <th class="jsgrid-header-sortable" style="width: 200px;">Author</th>
				  <th class="jsgrid-header-sortable" style="width: 100px;">Description</th>
				  <th class="jsgrid-header-sortable" style="width: 100px;">Publication Status</th>
				  <th class="jsgrid-header-sortable" style="width: 100px;">Action</th>
				  
				  </tr>
				  <?php while ($blog_info = mysqli_fetch_assoc($query_result)) { 
				      $a = $blog_info["blog_description"];
					  $b = $blog_info["blog_title"];
					  $a = substr($a,0,70);
					  $b = substr($b,0,50);
				  ?>
				  
				  <tr class="jsgrid-row">
				  <td style="width: 20px;"><?php echo $blog_info["blog_id"]; ?></td>
				  <td style="width: 300px;"><?php echo $b ?></td>
				  <td style="width: 50px;"><?php echo $blog_info["author_name"]; ?></td>
				  <td  style="width: 100px;"><?php echo $a ?></td>
				  <td class="jsgrid-align-center" style="width: 100px;"><?php
                                                if ($blog_info["publication_status"] == 1) {
                                                    echo 'Published';
                                                } else {
                                                    echo 'Unpublished';
                                                }
                                                ?></td>
				<td><a href="edit_blog.php?id=<?php echo $blog_info["blog_id"]; ?>" class="btn btn-success" title="Edit">
					<input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit">
				</a>
				<a href="?delete=<?php echo $blog_info["blog_id"]; ?>" class="btn btn-danger" title="Delete" onclick="return checkDelete();">
					
					<input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></td>
				</a>
				  
				  
				  </tr>
				  <?php } ?>
				  </table>
				  </div>
				  </div>
                </div>
              </div>
              <div class="divider"></div>
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