<?php require 'php/check_session.php'; include "php/uploads.php"; include "php/header_footer.php";include "php/users.php"; ?>

<?php echo getHeader("Actions",$name); ?>

<!-- Tabs content -->
 <!-- Main Content Area -->
  <div class="content-area">
    <!-- Tabs navs -->
<div class="container">
  <ul class="nav nav-tabs mb-3 mt-3" id="ex-with-icons" role="tablist">
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link active" id="ex-with-icons-tab-1" href="#ex-with-icons-tabs-1" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i> Add New Blog</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-chart-line fa-fw me-2"></i> Add Youtube Video</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab"
      aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-book fa-fw me-2"></i>New Job</a>
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

</ul>
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
        <button name="submitBlogBtn" id="submitBlogBtn" class="btn btn-primary " type="submit" data-mdb-ripple-init>Add Blog</button>
      </div>
      </form>
      </div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
        <form id="youtubeVideoForm" class="row g-3 col-md-11 mt-4 shadow p-4">
      
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>

          <textarea rows="6" id="iframeContents" placeholder="video iframe contents here...."  type="text" class="form-control" required ></textarea>

        </div>
      </div>
      <div class="col-12">
        <button  class="btn btn-primary" id="AddNewVideoButton" type="submit" data-mdb-ripple-init>Add New Video</button>
      </div>
      </form>
      </div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
        <form id="careerForm" class="row g-3 col-md-11 mt-4 shadow p-4">
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input name="career_title" type="text" class="form-control" id="career_title" required />
          <label for="career_title" class="form-label">Job Title</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input placeholder="date" name="career_image" type="date" class="form-control" id="career_image" required />
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
          <textarea id="careerBody" name="career_body" type="text" class="form-control"  required >Job description here...</textarea>
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

      

    </div>
</center>
<!-- Tabs content -->
</div>

<!-- End your project here-->
  </div>


<?php echo getFooter(); ?>



  
    