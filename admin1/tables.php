<?php require 'php/check_session.php'; require 'php/uploads.php'?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
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
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
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
          <a class="nav-link" href="actions">Update User Page</a>
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
          <a class="nav-link text-info" href="tables">Manage User Page</a>
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
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i>Manage Blogs</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-chart-line fa-fw me-2"></i>Manage Services</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab"
      aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-book fa-fw me-2"></i>Manage Career</a>
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
  <div class="tab-content shadow p-5 mt-5" id="ex-with-icons-content">
    <div class="mb-3">
      <form class="form-inline my-2 my-lg-0">
        <div class="input-group col" style="width: 350px;">
            <input class="form-control py-2 border-right-0 border col-md-12 bg-transparent" type="search" placeholder="Search..." id="example-search-input" style="outline: none;">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" type="button" style="outline: none;">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>

        <div class="input-group col" style="width: 350px;">
            <select class="form-control py-2 border-right-0 border col-md-12 bg-transparent" type="search" placeholder="Search..." id="example-search-input" style="outline: none;">
              <option>Filter By</option>
              <option>Ascending</option>
              <option>Descending</option>
            </select>
            <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" type="button" style="outline: none;">
                    <i class="fa-solid fa-filter"></i>
                </button>
            </span>
        </div>
    </form>
  </div>
  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
    <table  class="table table-bordered">
      <div  class="table-responsive">
        <tr>
        <th>#</th>
        <th>Blog Title</th>
        <th>Blog Image</th>
        <th>Blog Date</th>
        <th>Blog Body</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Effects of climate change</td>
        <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
        <td> 22 Nov</td>
        <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor <a href="">Read More</a></td>
        <td>
          <a href=""> <i class="fa fa-trash"></i></a>
          <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
        </td> 
      </tr>
        <tr>
        <td>2</td>
        <td>Effects of climate change</td>
        <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
        <td> 22 Nov</td>
        <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor <a href="">Read More</a></td>
        <td>
          <a href=""> <i class="fa fa-trash"></i></a>
          <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
        </td> 
          <tr>
        <td>3</td>
        <td>Effects of climate change</td>
        <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
        <td> 22 Nov</td>
        <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor <a href="">Read More</a></td>
        <td>
          <a href=""> <i class="fa fa-trash"></i></a>
          <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
        </td> 
      </tr>
      </tr>
      </div>
    </table>
  </div>

  <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
    <table class="table table-bordered">
        <div  class="table-responsive">
          <tr>
          <th>#</th>
          <th>Service Title</th>
          <th>Service Image</th>
          <th>Service Date</th>
          <th>Service Body</th>
          <th>Actions</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Effects of climate change</td>
          <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
          <td> 22 Nov</td>
          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor <a href="">Read More</a></td>
          <td>
            <a href=""> <i class="fa fa-trash"></i></a>
            <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
          </td> 
        </tr>
          <tr>
          <td>2</td>
          <td>Effects of climate change</td>
          <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
          <td> 22 Nov</td>
          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor <a href="">Read More</a></td>
          <td>
            <a href=""> <i class="fa fa-trash"></i></a>
            <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
          </td> 
            <tr>
          <td>3</td>
          <td>Effects of climate change</td>
          <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
          <td> 22 Nov</td>
          <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor <a href="">Read More</a></td>
          <td>
            <a href=""> <i class="fa fa-trash"></i></a>
            <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
          </td> 
        </tr>
        </tr>
        </div>
        
      </table>
  </div>

<div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
  <table class="table table-bordered">
    <div  class="table-responsive">
      <tr>
      <th>#</th>
      <th>Career Title</th>
      <th>Career Image</th>
      <th>Career Date</th>
      <th>Career Body</th>
      <th>Actions</th>
    </tr>
    <tr>
      <td>1</td>
      <td>Effects of climate change</td>
      <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
      <td> 22 Nov</td>
      <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor <a href="">Read More</a></td>
      <td>
        <a href=""> <i class="fa fa-trash"></i></a>
        <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
      </td> 
    </tr>
      <tr>
      <td>2</td>
      <td>Effects of climate change</td>
      <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
      <td> 22 Nov</td>
      <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor <a href="">Read More</a></td>
      <td>
        <a href=""> <i class="fa fa-trash"></i></a>
        <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
      </td> 
        <tr>
      <td>3</td>
      <td>Effects of climate change</td>
      <td><img width="70" height="70" class="img-fluid" src="../images/services/service1.jpg"></td>
      <td> 22 Nov</td>
      <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor <a href="">Read More</a></td>
      <td>
        <a href=""> <i class="fa fa-trash"></i></a>
        <a class="pl-2" href=""> <i  class="fa-regular fa-pen-to-square"></i></a>
      </td> 
    </tr>
    </tr>
    </div>
    
  </table>
</div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
         <form class="row g-3 col-md-11 mt-4 shadow p-4">
          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea id="footerBody"  type="text" class="form-control" id="validationDefault03" required ></textarea>
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
         <form class="row g-3 col-md-11 mt-4 shadow p-4">

          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea id="editCustomerBody"  type="text" class="form-control" id="validationDefault03" required ></textarea>
              <script>
                   CKEDITOR.replace('editCustomerBody', {
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
      <div class="tab-pane fade" id="ex-with-icons-tabs-7" role="tabpanel" aria-labelledby="ex-with-icons-tab-7">
         <form class="row g-3 col-md-11 mt-4 shadow p-4">

          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea id="editIndexPage"  type="text" class="form-control" id="validationDefault03" required ></textarea>
              <script>
                   CKEDITOR.replace('editIndexPage', {
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
<!-- MDB -->
<script type="text/javascript" src="js/mdb.umd.min.js"></script>

</body>
</html>


  
    