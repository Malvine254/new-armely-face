<?php require 'php/check_session.php'; require 'php/uploads.php'; include "php/header_footer.php";?>
<?php include "php/tables.php";include "php/users.php"; ?>

<?php echo getHeader("Actions",$name); ?>



<!-- Tabs content -->
<center>
  <div class="tab-content content-area shadow p-5 mt-5 " id="ex-with-icons-content">
    <!-- Tabs navs -->
<div class="content-area container">
  <ul class="nav nav-tabs mb-3 mt-3" id="ex-with-icons" role="tablist">
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link active" id="ex-with-icons-tab-1" href="#ex-with-icons-tabs-1" role="tab"
      aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i>Job Applications</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-2" href="#ex-with-icons-tabs-2" role="tab"
      aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-chart-line fa-fw me-2"></i>Jobs Posted</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab"
      aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-book fa-fw me-2"></i>Shortlisted Candidates</a>
  </li>
  <li class="nav-item" role="presentation">
    <a data-mdb-tab-init class="nav-link" id="ex-with-icons-tab-4" href="#ex-with-icons-tabs-4" role="tab"
      aria-controls="ex-with-icons-tabs-4" aria-selected="false"><i class="fas fa-list fa-fw me-2"></i>All employees</a>
  </li>
  
</ul>
<!-- Tabs navs -->
    
</div>

 <div class="tab-content " id="ex-with-icons-content ">
  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
    <div class="mb-3">
      <form class="form-inline my-2 my-lg-0">
        <div class="input-group col" style="width: 350px;">
            <input class="form-control py-2 border-right-0 border col-md-12 bg-transparent" type="search" placeholder="Search..." id="searchInput" style="outline: none;">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" type="button" style="outline: none;">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>

        <div class="input-group col" style="width: 350px;">
            <select class="form-control py-2 border-right-0 border col-md-12 bg-transparent" type="search" placeholder="Search..." id="filterSearch" style="outline: none;">
              <option>Filter By Location</option>
            <?php displayLocations(); ?>
            </select>
            <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" type="button" style="outline: none;">
                    <i class="fa-solid fa-filter"></i>
                </button>
            </span>
        </div>
    </form>
  </div>
    <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1" style="height: 60vh; overflow: scroll;">
    <table  class="table table-bordered" >
      <div >
        <tr>
        <th>#</th>
        <th>Job Title</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Date</th>
        <th>Phone</th>
        <th>Cv</th>
        <th>Actions</th>
      </tr >
     <?php displayAllCareerOpoortunities(); ?>
       
      </div>
    </table>
  </div>

  <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2" style="height: 60vh; overflow: scroll;">
    <table class="table table-bordered">
        <div  class="table-responsive">
          <tr>
          <th>#</th>
          <th>Job Title</th>
          <th>Job Description</th>
          <th>Job Deadline</th>
          <th>Job Type</th>
          <th>Job Location</th>
          <th>Actions</th>
        </tr>
          <?php displayJobPosted(); ?>
        </div>
        
      </table>
  </div>
  <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3"  style="height: 60vh; overflow: scroll;">
  <table class="table table-bordered myTable">
    <div  class="table-responsive">
      <tr>
        <th>#</th>
        <th>Job Title</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Date</th>
        <th>Phone</th>
        <th>Cv</th>
        <th>Actions</th>
      </tr > 
      <?php displayShortlistedCandidates(); ?>
  
    </div>
    
  </table>
</div>

<div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4"  style="height: 60vh; overflow: scroll;">
    <table class="table table-bordered myTable">
      <div  class="table-responsive">
        <tr>
          <th>#</th>
          <th>Full Name</th>
          <th>Email Address</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Gender</th>
          <th>Actions</th>
        </tr > 
     
      
      </div>
      
    </table>
</div>

  </div>

 
    
    
</div>
</center>


<!-- End your project here-->
<?php echo getFooter(); ?>
<script type="text/javascript">
   $(document).ready(function(){
    $("#searchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $(".myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
     
    });

    var filter = $("#filterSearch");
    filter.change(()=>{
       $(".myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(filter.val().toLowerCase()) > -1)
      });
    })

    
  });

</script>




  
    