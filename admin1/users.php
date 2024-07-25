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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
          <a class="nav-link" href="tables">Manage User Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-info" href="users">Account Settings</a>
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
  <ul class="nav nav-tabs mt-3" id="ex-with-icons" role="tablist">
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link active" id="ex-with-icons-tab-1" href="#ex-with-icons-tabs-1" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-user fa-fw me-2"></i>Your Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-cogs fa-fw me-2"></i>Account Settings</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab"
      aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-book fa-fw me-2"></i>Account History</a>
  </li>
  
</ul>
</div>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex-with-icons-content">
  <div class="tab-pane fade show active mt-3" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
    <div class="container shadow p-4 mt-5 col-md-10">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"><a class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward points to spend"><i class="fa fa-award text-md"></i>&nbsp;290 points</a></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg">Daniel Adams</h5><span class="author-card-position">Joined February 06, 2017</span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item" href="#">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-shopping-bag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Orders List</div>
                            </div><span class="badge badge-secondary">6</span>
                        </div>
                    </a><a class="list-group-item active" href="#"><i class="fe-icon-user text-muted"></i>Profile Settings</a><a class="list-group-item" href="#"><i class="fe-icon-map-pin text-muted"></i>Addresses</a>
                    <a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-wishlist-profile-page" target="__blank">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">My Wishlist</div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    </a>
                    <a class="list-group-item" href="https://www.bootdey.com/snippets/view/bs4-account-tickets" target="__blank">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-tag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">My Tickets</div>
                            </div><span class="badge badge-secondary">4</span>
                        </div>
                    </a>
                </nav>
            </div>
        </div>
        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
            <form class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" value="Daniel" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" value="Adams" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <input class="form-control" type="email" id="account-email" value="daniel.adams@example.com" disabled="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number</label>
                        <input class="form-control" type="text" id="account-phone" value="+7 (805) 348 95 72" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <input class="form-control" type="password" id="account-pass">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirm Password</label>
                        <input class="form-control" type="password" id="account-confirm-pass">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox d-block">
                            <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                            <label class="custom-control-label" for="subscribe_me">Subscribe me to Newsletter</label>
                        </div>
                        <button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
  </div>
  <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
   <div class="container shadow mt-5 col-md-10">
  <div class="row justify-content-center">
      <div class=" mx-auto">
          <div class="my-4">
              <div class="list-group mb-5 mt-3 p-4">
                  <div class="list-group-item">
                      <div class="row align-items-center">
                          <div class="col">
                              <strong class="mb-2">Enable Activity Logs</strong>
                              <p class="text-muted mb-0">Donec id elit non mi porta gravida at eget metus.</p>
                          </div>
                          <div class="col-auto">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="activityLog" checked="">
                                  <span class="custom-control-label"></span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="list-group-item">
                      <div class="row align-items-center">
                          <div class="col">
                              <strong class="mb-2">2FA Authentication</strong>
                              <span class="badge badge-pill badge-success">Enabled</span>
                              <p class="text-muted mb-0">Maecenas sed diam eget risus varius blandit.</p>
                          </div>
                          <div class="col-auto">
                              <button class="btn btn-primary btn-sm">Disable</button>
                          </div>
                      </div>
                  </div>
                  <div class="list-group-item">
                      <div class="row align-items-center">
                          <div class="col">
                              <strong class="mb-2">Activate Pin Code</strong>
                              <p class="text-muted mb-0">Donec id elit non mi porta gravida at eget metus.</p>
                          </div>
                          <div class="col-auto">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="pinCode">
                                  <span class="custom-control-label"></span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>
  </div>
  </div>
  </div>
  <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
      <div class="row justify-content-center ">
      <div class=" mx-auto">
          <div class="my-4 container shadow pb-5 mt-5 col-md-10">
              <table class="table border bg-white">
                  <thead>
                      <tr>
                          <th>Device</th>
                          <th>Location</th>
                          <th>IP</th>
                          <th>Time</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <th scope="col"><i class="fe fe-globe fe-12 text-muted mr-2"></i>Chrome - Windows 10</th>
                          <td>Paris, France</td>
                          <td>192.168.1.10</td>
                          <td>Apr 24, 2019</td>
                          <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                      </tr>
                      <tr>
                          <th scope="col"><i class="fe fe-smartphone fe-12 text-muted mr-2"></i>App - Mac OS</th>
                          <td>Newyork, USA</td>
                          <td>10.0.0.10</td>
                          <td>Apr 24, 2019</td>
                          <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                      </tr>
                      <tr>
                          <th scope="col"><i class="fe fe-globe fe-12 text-muted mr-2"></i>Chrome - iOS</th>
                          <td>London, UK</td>
                          <td>255.255.255.0</td>
                          <td>Apr 24, 2019</td>
                          <td><a hreff="#" class="text-muted"><i class="fe fe-x"></i></a></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  </div>
  </div>
</div>




<!-- Tabs content -->

      <!-- End your project here-->
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>


  
    