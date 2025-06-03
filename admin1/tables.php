<?php require 'php/check_session.php'; include "php/uploads.php"; include "php/header_footer.php";include "php/users.php"; include "php/tables.php"; ?>

<?php echo getHeader("Actions",$name); ?>
<!-- Tabs navs -->
<div class="content-area">
<div class="container ">
  <ul class="nav nav-tabs mb-3 mt-3" id="ex-with-icons" role="tablist">
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link active" id="ex-with-icons-tab-1" href="#ex-with-icons-tabs-1" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i>Manage Blogs</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-chart-line fa-fw me-2"></i>Manage Videos</a>
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
</div>
</div>
<!-- Tabs navs -->

<!-- Tabs content -->
<center>
  <div class="tab-content  content-area shadow col-md-9 mt-5" id="ex-with-icons-content">
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
            <select class="form-control py-2 border-right-0 border  bg-transparent" type="search" placeholder="Search..." id="example-search-input" style="outline: none;">
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
  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1"  style="overflow-y: scroll; height: 60vh !important;">
    <table  class="table table-bordered">
      <div  class="" >
        <tr>
        <th>#</th>
        <th>Blog Title</th>
        <th>Blog Image</th>
        <th>Blog Date</th>
        <th>Actions</th>
      </tr>
      <tbody >
        <?php displayBlogsTable(); ?> 
      </tbody>
     
      </div>
    </table>
  </div>

  <div  style="overflow-y: scroll; height: 60vh !important;" class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
    <table class="table table-bordered">
        <div  class="table-responsive">
          <tr>
          <th>#</th>
          <th>Video Iframe</th>
          <th>Actions</th>
        </tr>
       
        </div>
        <?php displayYoutubeVideosTable(); ?>
      </table>
  </div>

<div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
  <table class="table table-bordered">
    <div  class="table-responsive">
      <tr>
      <th>#</th>
      <th>Job Title</th>
      <th>Job Deadline</th>
      <th>Job Type</th>
      <th>Job Location</th>
      <th>Actions</th>
    </tr>
    <?php displayAllCareerListing(); ?>
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
         <form class="row g-3 mt-4 shadow p-4">

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



<!-- End your project here-->
<?php echo getFooter(); ?>

  
    