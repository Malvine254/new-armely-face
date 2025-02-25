<?php require 'php/check_session.php'; require 'php/uploads.php';include "php/header_footer.php";include "php/users.php";?>

<?php echo getHeader("Actions",$name); ?>

<!-- Tabs content -->
<center>
<div class="tab-content content-area" id="ex-with-icons-content ">
  <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
    <section   class="section container p-4 mt-2 content-area">
      <div style="margin-left: " class="row">
        <div class="col-lg-7 col-md-7">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Blog Articles Clicks</h5>

              <!-- Line Chart -->
              <canvas  id="lineChart" style="max-height: 329px; min-height: 329px; width: auto; "></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                      datasets: [{
                        label: 'Line Chart',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>

        

        <div class="col-lg-5 col-md-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Projects Status  </h5>

              <!-- Pie Chart -->
              <canvas id="pieChart" style="max-height: 329px; min-height: 329px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: [
                        'Completed',
                        'Pending',
                        'Deployed'
                      ],
                      datasets: [{
                        label: 'My First Dataset',
                        data: [300, 50, 100],
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

        

      </div>
    </section>
  </div>
  <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
    Tab 2 content
  </div>
  <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
    Tab 3 content
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


  
    