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
              <h5 class="card-title">Articles Leader</h5>

              <!-- Line Chart -->
              <canvas  id="lineChart" style="max-height: 329px; min-height: 329px; width: auto; "></canvas>
            <canvas id="lineChart"></canvas>

                <script>
                document.addEventListener("DOMContentLoaded", () => {
                  fetch('php/line_graph.php')
                    .then(response => response.json())
                    .then(chartData => {
                      const ctx = document.querySelector('#lineChart').getContext('2d');

                      new Chart(ctx, {
                        type: 'line',
                        data: {
                          labels: chartData.labels,
                          datasets: [{
                            label: 'Total Blog Clicks Per Month',
                            data: chartData.data,
                            fill: false,
                            borderColor: 'rgb(47, 85, 151)',
                            tension: 0.3,
                            pointRadius: 5,
                            pointBackgroundColor: 'rgb(47, 85, 151)'
                          }]
                        },
                        options: {
                          responsive: true,
                          plugins: {
                            legend: { display: true },
                            tooltip: {
                              callbacks: {
                                title: function(context) {
                                  return context[0].label;
                                },
                                label: function(context) {
                                  const index = context.dataIndex;
                                  const titles = chartData.titles[index]; // Array of titles
                                  return [
                                    `Total Clicks: ${context.raw}`,
                                    'Articles:',
                                    ...titles.map(t => `• ${t}`)
                                  ];
                                }
                              }
                            }
                          },
                          scales: {
                            x: {
                              title: {
                                display: true,
                                text: 'Month'
                              }
                            },
                            y: {
                              beginAtZero: true,
                              title: {
                                display: true,
                                text: 'Clicks'
                              }
                            }
                          }
                        }
                      });
                    })
                    .catch(error => {
                      console.error("Error loading blog data:", error);
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
              <canvas id="pieChart"></canvas>

                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    fetch('php/piechart.php')
                      .then(response => response.json())
                      .then(chartData => {
                        new Chart(document.querySelector('#pieChart'), {
                          type: 'pie',
                          data: {
                            labels: chartData.labels,
                            datasets: [{
                              label: 'Number of Blog Articles per Author',
                              data: chartData.data,
                              backgroundColor: chartData.labels.map((_, i) => {
                                // Generate distinct colors using HSL
                                return `hsl(${(i * 60) % 360}, 70%, 60%)`;
                              }),
                              hoverOffset: 6
                            }]
                          },
                          options: {
                            responsive: true,
                            plugins: {
                              legend: {
                                position: 'top'
                              },
                              tooltip: {
                                callbacks: {
                                  label: function(context) {
                                    return `${context.label}: ${context.raw} articles`;
                                  }
                                }
                              }
                            }
                          }
                        });
                      })
                      .catch(error => {
                        console.error("Error loading pie chart data:", error);
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


  
    