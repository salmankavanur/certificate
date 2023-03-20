<!DOCTYPE html>
<html>
<head>
  <title>List of Participants</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Anek+Malayalam&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5">List of Participants</h1>
    <h6 class="text-center mb-4" style="font-family: 'Anek Malayalam', sans-serif;">
   ഹബീബ കോഴ്സ് വിജയകരമായി  പൂർത്തിയാക്കി സർട്ടിഫിക്കറ്റിന് അർഹത നേടിയവർ
    </h6>
    <div class="form-group">
      <input type="text" class="form-control" id="search" placeholder="Search by name or phone number">
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Sl.No.</th>
            <th>Name</th>
            <th>Phone Number</th>
          </tr>
        </thead>
        <tbody id="table-body">
          <?php
          $participants = array_map('str_getcsv', file('participants.csv'));
          $count = 1;
          foreach ($participants as $participant) {
            echo "<tr>";
            echo "<td>" . $count . "</td>";
            echo "<td>" . $participant[0] . "</td>";
            echo "<td>" . $participant[1] . "</td>";
            echo "</tr>";
            $count++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#search').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#table-body tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>
</html>
