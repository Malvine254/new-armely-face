<?php require 'php/check_session.php'; include "php/uploads.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Admin Dashboard</title>
    <!-- logo icon -->
    <link rel="icon" href="../images/logo/logo1.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <script src="ckeditor3/ckeditor.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title></title>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
<!-- more coming -->
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img width='130px' height='auto' src='../images/logo/logo.svg'/>
      </a>
      <!-- Left links -->
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="index">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-info" href="actions">Update User Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="career">Manage Career</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admins">Manage Admins</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reports">Generate Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables">Manage User Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users">Account Settings</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="link-secondary me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      <!-- Notifications -->
      <div class="dropdown">
        <a
          data-mdb-dropdown-init
          class="link-secondary me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          aria-expanded="false"
        >
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink"
        >
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          data-mdb-dropdown-init
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          aria-expanded="false"
        >
          <img
            src="https://www.svgrepo.com/show/422421/account-avatar-multimedia.svg"
            class="rounded-circle"
            height="25"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<!-- Tabs navs -->
<div class="container">
  <ul class="nav nav-tabs mb-3 mt-3" id="ex-with-icons" role="tablist">
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link active" id="ex-with-icons-tab-1" href="#ex-with-icons-tabs-1" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i> Add New Blog</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-chart-line fa-fw me-2"></i> Add New Service</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab"
      aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-book fa-fw me-2"></i>Edit Career</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-4" href="#ex-with-icons-tabs-4" role="tab"
      aria-controls="ex-with-icons-tabs-4" aria-selected="false"><i class="fas fa-list fa-fw me-2"></i>Edit Footer</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-5" href="#ex-with-icons-tabs-5" role="tab"
      aria-controls="ex-with-icons-tabs-5" aria-selected="false"><i class="fas fa-cogs fa-fw me-2"></i>Edit About Page</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-6" href="#ex-with-icons-tabs-6" role="tab"
      aria-controls="ex-with-icons-tabs-6" aria-selected="false"><i class="fas fa-users fa-fw me-2"></i>Edit Customer Stories</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-7" href="#ex-with-icons-tabs-7" role="tab"
      aria-controls="ex-with-icons-tabs-7" aria-selected="false"><i class="fas fa-home fa-fw me-2"></i>Edit Home Page</a>
  </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<center>
  <div class="tab-content " id="ex-with-icons-content ">
  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
    <form enctype="multipart/form-data" id="addBlogForm" class="row g-3 col-md-11 mt-2 shadow p-4" method="post">
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input name="blog_title" type="text" class="form-control" id="blog_title" required />
          <label for="blog_title" class="form-label">Blog Title</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input accept=".jpg,.jpeg,.png" name="blog_image" type="file" class="form-control" id="blog_image" required />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
          <textarea name="blog_body" id="blogBody"  type="text" class="form-control" id="validationDefault03" required ></textarea>
          <script>
          // Initialize CKEditor with configuration
          CKEDITOR.replace('blogBody', {
              height: '300px',
             
          });
        </script>
        </div>
      </div>
      <div class="col-12">
        <button name="submitBlogBtn" id="submitBlogBtn" class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
      </div>
      </form>
      </div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
        <form class="row g-3 col-md-11 mt-4 shadow p-4">
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input type="text" class="form-control" id="validationDefault01" required />
          <label for="validationDefault01" class="form-label">Service Title</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input type="file" class="form-control" id="validationDefault02" required />
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
          <textarea id="serviceBody"  type="text" class="form-control" id="validationDefault03" required ></textarea>

          <script>
               CKEDITOR.replace('serviceBody', {
                  filebrowserUploadUrl: '../php/upload.php',
                  filebrowserUploadMethod: 'form',
                    height: '300px'

              });
          </script>
        </div>
      </div>
      <div class="col-12">
        <button  class="btn btn-primary " type="submit" data-mdb-ripple-init>Add new Blog</button>
      </div>
      </form>
      </div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
        <form id="careerForm" class="row g-3 col-md-11 mt-4 shadow p-4">
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input name="career_title" type="text" class="form-control" id="career_title" required />
          <label for="career_title" class="form-label">Career Title</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input name="career_image" type="file" class="form-control" id="career_image" required />
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
          <textarea id="careerBody" name="career_body" type="text" class="form-control"  required ></textarea>
          <script>
               CKEDITOR.replace('careerBody', {
                  filebrowserUploadUrl: '../php/upload.php',
                  filebrowserUploadMethod: 'form',
                    height: '300px'

              });
          </script>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
      </div>
      </form>
      </div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
         <form id="footerForm" class="row g-3 col-md-11 mt-4 shadow p-4">
          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea id="footerBody"  type="text" class="form-control" id="validationDefault03" required >
                
              </textarea>
              <script>
                   CKEDITOR.replace('footerBody', {
                      filebrowserUploadUrl: '../php/upload.php',
                      filebrowserUploadMethod: 'form',
                        height: '300px'

                  });
              </script>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
          </div>
        </form>
      </div>

       <div class="tab-pane fade" id="ex-with-icons-tabs-5" role="tabpanel" aria-labelledby="ex-with-icons-tab-5">
         <form class="row g-3 col-md-11 mt-4 shadow p-4">

          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea id="editAboutBody"  type="text" class="form-control" id="validationDefault03" required ></textarea>
              <script>
                   CKEDITOR.replace('editAboutBody', {
                      filebrowserUploadUrl: '../php/upload.php',
                      filebrowserUploadMethod: 'form',
                        height: '300px'

                  });
              </script>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
          </div>
        </form>
        </div>

       <div class="tab-pane fade" id="ex-with-icons-tabs-6" role="tabpanel" aria-labelledby="ex-with-icons-tab-6">
       
         <form id="customerStoriesForm" method="post" enctype="multipart/form-data" class="row g-3 col-md-11 mt-4 shadow p-4">
          <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input id="clientName" name="name" type="text" class="form-control" id="validationDefault07" required />
              <label for="validationDefault07" class="form-label">Name</label>
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input id="clientPosition" name="position" type="text" class="form-control" id="validationDefault01" required />
              <label for="validationDefault01" class="form-label">Position</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input id="profile"  accept=".jpg,.jpeg,.png" name="profile" type="file" class="form-control" id="validationDefault02" required />
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea name="body_content" id="editCustomerBody"  type="text" class="form-control" id="validationDefault03" required >

              </textarea>
              <script>
                   CKEDITOR.replace('editCustomerBody', {
                      filebrowserUploadUrl: '../php/upload.php',
                      filebrowserUploadMethod: 'form',
                        height: '300px',
                         contentsCss: [
                          'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css',
                          '../css/style.css'
                      ]

                  });
              </script>
            </div>
          </div>
          <div class="col-12">
            <button name="submitCustomerStories" class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
          </div>
        </form>
      </div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-7" role="tabpanel" aria-labelledby="ex-with-icons-tab-7">
         <form class="row g-3 col-md-11 mt-4 shadow p-4">

          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea id="editIndexPage"  type="text" class="form-control" id="validationDefault03" required ></textarea>
             
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
          </div>
        </form>
      </div>

    </div>
</center>
<!-- Tabs content -->
</div>

<!-- End your project here-->
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- MDB -->
<script type="text/javascript" src="js/mdb.umd.min.js"></script>
<script src="js/main.js"></script>


</body>
</html>


  
    