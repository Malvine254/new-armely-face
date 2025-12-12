<?php
function getUrl(...$urls) {
    $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = explode("/", rtrim(parse_url($currentUrl, PHP_URL_PATH), "/"));
    $lastSegment = end($parts);

    // Check if the last segment matches any of the provided URLs
    return in_array($lastSegment, $urls) ? "active" : "";
}

function getHeader($pageName, $name) {
  $activeIndex   = getUrl("index");
  $activeActions = getUrl("actions");
  $activeCareer  = getUrl("career");
  $activeAdmins  = getUrl("admins");
  $activeReports = getUrl("reports");
  $activeTables  = getUrl("tables");
  $activeUsers   = getUrl("users");
    return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{$pageName}</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="../images/logo/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" />
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body class="admin-body">
<nav class="navbar navbar-expand-lg admin-topbar py-3">
  <div class="container-fluid">
    <div class="d-flex align-items-center gap-2">
      <button class="btn btn-link text-white d-lg-none px-2" type="button" data-sidebar-toggle aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand d-flex align-items-center gap-2 text-white" href="index">
        <img width="140" height="auto" src="../images/logo/logo.svg" alt="Armely logo">
      </a>
    </div>
    <div class="d-flex align-items-center gap-3">
      <span class="text-white-50 small">Welcome, {$name}</span>
      <div class="dropdown">
        <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center gap-2 text-white" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
          <img src="https://www.svgrepo.com/show/422421/account-avatar-multimedia.svg" class="rounded-circle" height="32" alt="User avatar" loading="lazy" />
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li><a class="dropdown-item" href="#">My profile</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<aside id="sidebarMenu" class="admin-sidebar">
  <div class="sidebar-brand">
    <img src="../images/logo/logo.svg" alt="Armely logo" />
  </div>
  <ul class="admin-nav">
    <li><a href="index" class="nav-link {$activeIndex}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
    <li><a href="actions" class="nav-link {$activeActions}"><i class="fas fa-edit"></i><span>Update User Page</span></a></li>
    <li><a href="career" class="nav-link {$activeCareer}"><i class="fas fa-briefcase"></i><span>Manage Career</span></a></li>
    <li><a href="admins" class="nav-link {$activeAdmins}"><i class="fas fa-user-shield"></i><span>Manage Admins</span></a></li>
    <li><a href="reports" class="nav-link {$activeReports}"><i class="fas fa-chart-line"></i><span>Generate Reports</span></a></li>
    <li><a href="tables" class="nav-link {$activeTables}"><i class="fas fa-table"></i><span>Manage User Page</span></a></li>
    <li><a href="users" class="nav-link {$activeUsers}"><i class="fas fa-cog"></i><span>Account Settings</span></a></li>
  </ul>
  <div class="sidebar-user mt-3">
    <strong>{$name}</strong>
    <small>Administrator</small>
    <div class="mt-2">
      <a class="text-light small" href="logout"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>
  </div>
</aside>
HTML;
}

function getFooter() {
return <<<HTML
<!-- Bootstrap JS and jQuery (loaded once) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>

<!-- Chart.js (for dashboard and reports) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- MDB -->
<script src="js/mdb.umd.min.js"></script>
<script src="js/main1.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.querySelector('[data-sidebar-toggle]');
  const sidebar = document.getElementById('sidebarMenu');
  if (toggle && sidebar) {
    toggle.addEventListener('click', function () {
      sidebar.classList.toggle('is-open');
    });
  }
});
</script>

</body>
</html>
HTML;
}

?>
