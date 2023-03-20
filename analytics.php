<!DOCTYPE html>
<html>
<head>
  <title>Analytics</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <style>
    body {
      font-family: 'Anek Malayalam', sans-serif;
    }
    .card-body {
      padding: 1.25rem;
    }
    .card-title {
      margin-bottom: 1rem;
    }
    .chart-container {
      margin-top: 1rem;
      max-width: 700px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5">Analytics</h1>
    <div class="row mt-5">
      <div class="col-md-6 bg-primary text-white">
        <h4 class="card-title text-center">Certificates Downloaded</h4>
        <?php
          $certificates = glob('certificates/*.pdf');
          $participants = array_map('str_getcsv', file('participants.csv'));
          $downloads = array();
          foreach ($certificates as $certificate) {
            $parts = explode('-', basename($certificate));
            $name = trim($parts[0]);
            $phone = trim($parts[1]);
            if (!array_key_exists($name . '-' . $phone, $downloads)) {
              $downloads[$name . '-' . $phone] = true;
            }
          }
          $download_count = count($downloads);
          echo "<h3 class='text-center'>" . $download_count . " out of " . count($participants) . " participants downloaded</h3>";
        ?>
      </div>

      <div class="col-md-6 bg-danger text-white">
        <h4 class="card-title text-center">Remaining Participants</h4>
        <?php
          $remaining = count($participants) - $download_count;
          echo "<h3 class='text-center'>" . $remaining . " participants remaining</h3>";
        ?>
      </div>
    </div>
    <div class="chart-container mx-auto">
      <h4 class="card-title text-center mt-5">Download Progress Chart</h4>
      <canvas id="myChart"></canvas>
      <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["Downloaded", "Remaining"],
            datasets: [{
              label: '# of Downloads',
              data: [<?php echo $download_count; ?>, <?php echo $remaining; ?>],
              backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)'
              ],
              borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255,99,132,1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero:true
                }
              }]
            }
          }
        });
      </script>
    </div>
  </div>
</body>
</html>
