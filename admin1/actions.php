<?php require 'php/check_session.php'; include "php/uploads.php"; include "php/header_footer.php";include "php/users.php"; include "php/tables.php"; ?>


<?php 
$blogData  = editBlogArticle(); 
if ($blogData !== null) {
    $blog_title = $blogData['title'];
    $blog_body = $blogData['body'];
} else {
    echo "";
} 
?>

<?php echo getHeader("Actions",$name); ?>

<!-- Tabs content -->
 <!-- Main Content Area -->
 <center>

  <div class=" content-area col-md-9  content-area shadow  mt-5" id="ex-with-icons-content">
    <div class="mb-3">
  <ul class="nav nav-tabs mb-3 mt-3" id="ex-with-icons" role="tablist">
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link active" id="ex-with-icons-tab-1" href="#ex-with-icons-tabs-1" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i>New Blog</a>
  </li>
  <li class="nav-item" role="presentation" id="clickYouteVideoTab">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-chart-line fa-fw me-2"></i> New Youtube Video</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab"
      aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-book fa-fw me-2"></i>New Job</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-4" href="#ex-with-icons-tabs-4" role="tab"
      aria-controls="ex-with-icons-tabs-4" aria-selected="false"><i class="fas fa-list fa-fw me-2"></i>New Event</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-5" href="#ex-with-icons-tabs-5" role="tab"
      aria-controls="ex-with-icons-tabs-5" aria-selected="false"><i class="fas fa-cogs fa-fw me-2"></i>New Team</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-6" href="#ex-with-icons-tabs-6" role="tab"
      aria-controls="ex-with-icons-tabs-6" aria-selected="false"><i class="fas fa-users fa-fw me-2"></i>New Customer Stories</a>
  </li>
   <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-7" href="#ex-with-icons-tabs-7" role="tab"
      aria-controls="ex-with-icons-tabs-7" aria-selected="false"><i class="fas fa-users fa-fw me-2"></i>New Social Impact</a>
  </li>

</ul>

  <div class="tab-content " id="ex-with-icons-content ">
  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
    <form enctype="multipart/form-data" id="addBlogForm" class="row g-3 col-md-11 mt-2 p-4" method="post">
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input name="blog_title" type="text" class="form-control" id="blog_title" required  value="<?php $blogData  = editBlogArticle(); if ($blogData !== null) {echo $blogData['title'];} else {echo "";} ?>" />
          <label for="blog_title" class="form-label" >Blog Title</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input accept=".jpg,.jpeg,.png" name="blog_image" type="file" class="form-control" id="blog_image" required />
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
          <textarea name="blog_body" id="blogBody"  type="text" class="form-control" id="validationDefault03" required ><?php $blogData  = editBlogArticle(); if ($blogData !== null) {echo $blogData['body'];} else {echo "";} ?></textarea>
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

          <textarea rows="6" id="iframeContents" placeholder="video iframe contents here...."  type="text" class="form-control" required ><?php $blogData  = editVideos(); if ($blogData !== null) {echo $blogData['url'];} else {echo "";} ?></textarea>

        </div>
      </div>
      <div class="col-12">
        <button  class="btn btn-primary" id="AddNewVideoButton" type="submit" data-mdb-ripple-init>Add New Video</button>
      </div>
      </form>
      </div>

      <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
        <form id="careerForm" class="row g-3 col-md-11 mt-4  p-4">
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input name="career_title" type="text" class="form-control" id="career_title" required value="<?php $blogData  = editCareer(); if ($blogData !== null) {echo $blogData['job_title'];} else {echo "";} ?>" />
          <label for="career_title" class="form-label">Job Title</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-outline" data-mdb-input-init>
          <input  placeholder="date" name="career_image" type="date" value="<?php $blogData  = editCareer(); if ($blogData !== null) {echo $blogData['deadline'];} else {echo "Job description here...";} ?>" class="form-control" id="career_image" required />
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
          <textarea id="careerBody" name="career_body" type="text" class="form-control"  required ><?php $blogData  = editCareer(); if ($blogData !== null) {echo $blogData['job_description'];} else {echo "Job description here...";} ?></textarea>
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
      <!-- Beginning of post new event -->
      <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
         <form method="post" id="eventsForm" class="row g-3 col-md-11 mt-4  p-4">
          <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input name="event_title" type="text" class="form-control" id="event_title" required />
              <label for="event_title" class="form-label">Event Title</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input placeholder="date" name="event_date" type="date" class="form-control" id="career_image" required />
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input placeholder="Event Url" name="event_url" type="text" class="form-control" id="event_date" required />
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea rows="6" name="event_body" id="eventBody1" placeholder="Event Body..."  type="text" class="form-control"  required ></textarea>
           
            </div>
          </div>
          <div class="col-12">
            <button name="submit_event_btn" class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
          </div>
        </form>
      </div>

       <div class="tab-pane fade" id="ex-with-icons-tabs-5" role="tabpanel" aria-labelledby="ex-with-icons-tab-5">
         <form method="post" enctype="multipart|form-data" id="teamForm" class="row g-3 col-md-11 mt-4 shadow p-4">

          <div class="col-md-4">
          <div class="form-outline" data-mdb-input-init>
            <input name="team_name" type="text" class="form-control" id="team_name" required />
            <label for="team_name" class="form-label">Team Name</label>
          </div>
        </div>
         <div class="col-md-4">
          <div class="form-outline" data-mdb-input-init>
            <input name="team_title" type="text" class="form-control" id="team_title" required />
            <label for="team_title" class="form-label">Team Title</label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-outline" data-mdb-input-init>
            <input accept=".jpg,.jpeg,.png" name="team_image" type="file" class="form-control" id="team_image" required />
          </div>
        </div>
         <div class="col-md-3">
          <div class="form-outline" data-mdb-input-init>
            <input name="linkedin" type="text" class="form-control" id="linkedin" required />
            <label for="linkedin" class="form-label">Linkedin Account Link</label>
          </div>
        </div>
         <div class="col-md-3">
          <div class="form-outline" data-mdb-input-init>
            <input name="facebook" type="text" class="form-control" id="facebook" required />
            <label for="facebook" class="form-label">Facebook Account Link</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-outline" data-mdb-input-init>
            <input name="instagram" type="text" class="form-control" id="instagram" required />
            <label for="instagram" class="form-label">Instagram Account Link</label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-outline" data-mdb-input-init>
            <input name="x" type="text" class="form-control" id="x" required />
            <label for="x" class="form-label">X Account Link</label>
          </div>
        </div>
      <div class="col-md-12">
        <div class="form-outline" data-mdb-input-init>
          <textarea rows="6" name="team_body" id="team_body"  type="text" class="form-control"  required placeholder="Briefly about you" ></textarea>
        </div>
      </div>
          <div class="col-12">
            <button class="btn btn-primary " type="submit" data-mdb-ripple-init>Submit form</button>
          </div>
        </form>
        </div>


       <div class="tab-pane fade" id="ex-with-icons-tabs-6" role="tabpanel" aria-labelledby="ex-with-icons-tab-6">
       
         <form id="customerStoriesForm" method="post" enctype="multipart/form-data" class="row g-3 col-md-11 mt-4  p-4">
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
       
         <form id="socialImpactForm" method="post" enctype="multipart/form-data" class="row g-3 col-md-11 mt-4  p-4">
          <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input id="clientName" name="name" type="text" class="form-control" id="validationDefault07" required />
              <label for="validationDefault07" class="form-label">Title</label>
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <input accept=".jpg, .png, .jpeg, .webp" id="clientPosition" name="position[]" multiple type="file" class="form-control" id="validationDefault01" required />
              <label for="validationDefault01" class="form-label">Anchor Image</label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-outline" data-mdb-input-init>
              <select name="category" class="form-control py-2 border-right-0 border col-md-12 bg-transparent" type="search" placeholder="Search..." id="example-search-input" style="outline: none;">
              <option value="future">Future Visit</option> 
              <option value="new">New Visit</option>
              </select>
               <label for="validationDefault01" class="form-label">Category</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-outline" data-mdb-input-init>
              <textarea name="body_content" id="newSocialImpactBody"  type="text" class="form-control" id="validationDefault03" required >

              </textarea>
              <script>
                   CKEDITOR.replace('newSocialImpactBody', {
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
<script>
  $(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get("type");

    const tabMap = {
      blog: '#ex-with-icons-tab-1',
      video: '#ex-with-icons-tab-2',
      career: '#ex-with-icons-tab-3',
      event: '#ex-with-icons-tab-4',
      team: '#ex-with-icons-tab-5',
      customer: '#ex-with-icons-tab-6',
      impact: '#ex-with-icons-tab-7'
    };

    const tabId = tabMap[type];

    if (tabId && $(tabId).length) {
      $(tabId).tab('show');  // jQuery Bootstrap-compatible tab activation
    } else {
      console.warn("Tab element not found or type is invalid:", type);
    }
  });
</script>









  
    