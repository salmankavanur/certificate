<!DOCTYPE html>
<html>
<head>
	<title>Habiba - eCertificate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add this line to add a meta image -->
    <meta property="og:image" content="https://daiya.co.in/habiba/meta-image.png"/>
    <meta property="og:url" content="https://daiya.co.in/habiba/">
    <meta property="og:type" content="website">
    
    <!-- Add this line to add a meta image -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card" style="margin-top:15% ">
				<div class="card-header bg-success">
					<h3 class="text-center text-white">Habiba eCertificate</h3>	
				</div>
				<div class="card-body">
	<form method="post" action="generate_certificate.php">
	    <div class="form-group">
		<label for="name">Name:</label>
		<input type="text" name="name" required class="form-control">
		<br>
		<label for="phone">Phone Number:</label>
		<input type="tel" name="phone" required class="form-control">
		<br>
		<button type="submit" class="btn btn-primary">Download Certificate</button>
	</form>
</body>
</html>
