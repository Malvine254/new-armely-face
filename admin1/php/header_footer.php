<?php
function getUrl(...$urls) {
    $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode("/", rtrim(parse_url($currentUrl, PHP_URL_PATH), "/"));
    $lastSegment = end($parts);

    // Check if the last segment matches any of the provided URLs
    return in_array($lastSegment, $urls) ? "active" : "";
}

function getHeader($pageName,$name) {

    return '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>'.$pageName.'</title>
    <!-- logo icon -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="../images/logo/logo1.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
   
    <script src="ckeditor/ckeditor.js"></script>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
        <img width="130px" height="auto" src="../images/logo/logo.svg"/>
      </a>
      <!-- Left links -->
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="index">Dashboard</a>
        </li>
        
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="link-secondary me-3" href="#">Welcome, '.$name.'
        <strong class="text-dark"></strong>

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
            <a class="dropdown-item" href="logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<!-- Sidebar -->
<div id="sidebarMenu" class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary vh-100" style="width: 250px;">
  <!-- Sidebar Links -->
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="index" class="nav-link '. getUrl("index").'" aria-current="page">
        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="actions" class="nav-link text-info '. getUrl("actions").'">
        <i class="fas fa-edit me-2"></i> Update User Page
      </a>
    </li>
    <li>
      <a href="career" class="nav-link">
        <i class="fas fa-briefcase me-2"></i> Manage Career
      </a>
    </li>
    <li>
      <a href="admins" class="nav-link">
        <i class="fas fa-user-shield me-2"></i> Manage Admins
      </a>
    </li>
    <li>
      <a href="reports" class="nav-link">
        <i class="fas fa-chart-line me-2"></i> Generate Reports
      </a>
    </li>
    <li>
      <a href="tables" class="nav-link">
        <i class="fas fa-table me-2"></i> Manage User Page
      </a>
    </li>
    <li>
      <a href="users" class="nav-link">
        <i class="fas fa-cog me-2"></i> Account Settings
      </a>
    </li>
  </ul>

  <hr>

  <!-- Sidebar Bottom User Info -->
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser"
      data-mdb-dropdown-init data-mdb-toggle="dropdown" aria-expanded="false">
      <img src="https://www.svgrepo.com/show/422421/account-avatar-multimedia.svg" alt="User Avatar" width="32"
        height="32" class="rounded-circle me-2">
      <strong>Admin</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
      <li><a class="dropdown-item" href="#">My Profile</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</div>
<!-- End Sidebar -->

<!-- Sidebar -->
  <div id="sidebarMenu" class="d-flex flex-column flex-shrink-0 p-3">
    <!-- Sidebar Logo -->
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 text-dark text-decoration-none">
      <img width="130px" height="auto" src="../images/logo/logo.svg" alt="Logo">
    </a>

    <hr>

    <!-- Sidebar Links -->
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index" class="nav-link class="nav-link '. getUrl("index").'" ">
          <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="actions" class="nav-link '. getUrl("actions").'" >
          <i class="fas fa-edit me-2"></i> Update User Page
        </a>
      </li>
      <li>
        <a href="career" class="nav-link '. getUrl("career").'">
          <i class="fas fa-briefcase me-2"></i> Manage Career
        </a>
      </li>
      <li>
        <a href="admins" class="nav-link">
          <i class="fas fa-user-shield me-2"></i> Manage Admins
        </a>
      </li>
      <li>
        <a href="reports" class="nav-link">
          <i class="fas fa-chart-line me-2"></i> Generate Reports
        </a>
      </li>
      <li>
        <a href="tables" class="nav-link '. getUrl("tables").'">
          <i class="fas fa-table me-2"></i> Manage User Page
        </a>
      </li>
      <li>
        <a href="users" class="nav-link '. getUrl("users").'">
          <i class="fas fa-cog me-2"></i> Account Settings
        </a>
      </li>
    </ul>

    <hr>

    <!-- Sidebar Bottom User Info -->
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser"
        data-mdb-dropdown-init data-mdb-toggle="dropdown" aria-expanded="false">
        <img src="https://www.svgrepo.com/show/422421/account-avatar-multimedia.svg" alt="User Avatar" width="32"
          height="32" class="rounded-circle me-2">
        <strong>Admin</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
        <li><a class="dropdown-item" href="#">My Profile</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
  <!-- End Sidebar -->


';
}

function getFooter() {
return <<<HTML
<!-- Bootstrap JS and jQuery -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>

<!-- MDB -->
<script src="js/mdb.umd.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
HTML;
}

?>
