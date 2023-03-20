<?php
require('fpdf/fpdf.php');

// Read list of participants
$participants = array_map('str_getcsv', file('participants.csv'));

// Collect student information from form and convert to lowercase
$name = strtolower($_POST['name']);
$phone = strtolower($_POST['phone']);

// Check if submitted information matches a participant
$is_participant = false;
foreach ($participants as $participant) {
  if (strtolower($participant[0]) === $name && strtolower($participant[1]) === $phone) {
    $is_participant = true;
    break;
  }
}

// Generate certificate if user is a participant
if ($is_participant) {
  // Create PDF certificate using FPDF library
  class PDF extends FPDF {
    function __construct($orientation='L', $unit='mm', $size='Letter') {
      parent::__construct($orientation,$unit,$size);
    }
  }
  $pdf = new PDF('L', 'mm', array(279.4, 196.85)); // 10.94 x 7.29 inches

  $pdf->AddPage();

  // Add background image
  $pdf->Image('certificate_template.png', 0, 0, 279.4, 196.85);

  // Add student name to certificate and convert to uppercase
  $pdf->SetFont('Arial', 'B', 28);
  $name_uppercase = strtoupper($participant[0]);
  $name_width = $pdf->GetStringWidth($name_uppercase);
  $pdf->SetXY(279.4 - 90 - $name_width + 25, 88); // 5mm down, 5mm left
  $pdf->Cell(0, 0, $name_uppercase, 0, 1, 'C');

  // Save PDF certificate to server
  $filename = $participant[0] . '_' . time() . '.pdf'; // add timestamp to avoid overwriting
  $filepath = 'certificates/' . $filename;
  $pdf->Output('F', $filepath);

  // Output the PDF document to user
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="' . $filename . '"');
  readfile($filepath);
} else {
  // Display error message if user is not a participant
  echo "Sorry, you are not a participant.";
}
?>
