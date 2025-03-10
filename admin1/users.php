<?php require 'php/check_session.php'; require 'php/uploads.php';include "php/header_footer.php";include "php/users.php";?>

<?php echo getHeader("Actions",$name); ?>


<!-- Tabs content -->
<div class="tab-content content-area" id="ex-with-icons-content">
  <!-- Tabs navs -->
<div class="container ">
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
                        <h5 class="author-card-name text-lg"><?php if (isset($_SESSION['email'])) {
                            echo $name;
                        } ?></h5><span class="author-card-position"><?php if (isset($_SESSION['email'])) {
                            echo $joined_date;
                        } ?></span>
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
                 
                </nav>
            </div>
        </div>
        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
            <form class="row" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input name="update_name" required class="form-control" type="text" id="account-fn" value="<?php if (isset($_SESSION['email'])) {
                            echo $name;
                        } ?>" required="">
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">E-mail Address</label>
                        <input class="form-control" type="email" id="account-email" value="<?php if (isset($_SESSION['email'])) {
                            echo $email;
                        } ?>" disabled="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Phone Number <?php if (isset($_SESSION['email']) && $phone !="") {
                            
                        }else{
                          echo "<i class='fa fa-warning text-danger'></i><span class='text-danger'>Update Phone Number</span>";
                        } 
                      ?></label>
                        <input autocomplete="off" required name="update_phone" class="form-control" type="phone" id="account-phone" value="<?php if (isset($_SESSION['email'])) {
                            echo $phone;
                        } ?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <input autocomplete="off" minlength="6" required name="update_new_password" class="form-control" type="password" id="account-pass">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirm Password</label>
                        <input autocomplete="off" minlength="6" required name="update_confirm_password" class="form-control" type="password" id="account-confirm-pass">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="custom-control  d-block">
                          <button class="btn btn-style-1 btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Add Admin</button>
                        </div>
                        <button name="update_user_btn" class="btn btn-style-1 btn-primary" type="submit">Update Profile</button>
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

 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">New Admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal Body with Form -->
        <div class="modal-body">
          <form id="modalForm" method="post">
            <div class="mb-3">
              <label for="inputName" class="form-label">Full Name</label>
              <input required type="text" name="full_name" class="form-control" id="inputName" placeholder="Enter your name">
            </div>
            <div class="mb-3">
              <label  for="inputEmail" class="form-label">Email address</label>
              <input required name="email_address"  type="email" class="form-control" id="inputEmail" placeholder="name@example.com">
            </div>
            <!-- Modal Footer with Action Buttons -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="send_invitation_link" >Send Invitation Link</button>
            </div>
           
          </form>
        </div>
        
      </div>
    </div>
  </div>


<!-- Tabs content -->

<?php echo getFooter(); ?>


  
    