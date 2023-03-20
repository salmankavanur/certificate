<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #F4F4F4;
    }
    .container {
      margin-top: 50px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center mb-5">Dashboard</h1>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title text-center">Analytics</h5>
            <p class="card-text text-center">View analytics of the event.</p>
            <a href="analytics.php" class="btn btn-primary btn-block">View Analytics</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title text-center">Participants</h5>
            <p class="card-text text-center">View and manage participant data.</p>
            <a href="participants.php" class="btn btn-primary btn-block">View Participants</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column justify-content-center">
            <h5 class="card-title text-center">Download Certificates</h5>
            <p class="card-text text-center">Download certificates for all participants.</p>
            <a href="index.php?download=true" class="btn btn-primary btn-block">Download Certificate</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
