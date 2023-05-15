<?php
define('ABSPATH', true);
require_once('_config.php');


$messageHeading = "Sorry";
$userMessage = "No action specified";

if (isset($_POST['action'])) {
  $action = $_POST['action'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $previous_attendance = $_POST['previous-attendance'];
  $appointment_type = $_POST['appointment-type'];
  $status = "Pending";

  if ($action == 'submit') {
    $sql = "INSERT INTO appointment_request (name, gender, phone, dob, address, email, previous_attendance, appointment_type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssssssss', $name, $gender, $phone, $dob, $address, $email, $previous_attendance, $appointment_type, $status);
    $result = $stmt->execute();

    if ($result) {
      $messageHeading = "Thank You!";
      $userMessage = 'Appointment submitted successfully';
    } else {
      $userMessage = 'Appointment submission failed';
    }
  } else {
    $userMessage = 'Invalid action';
  }

}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Form Submission - Thank You</title>
  <style>
    /* CSS for the thank you page */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .thank-you-container {
      width: 400px;
      margin: 0 auto;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 10px;
      text-align: center;
    }

    h1 {
      color: #333;
    }

    p {
      color: #333;
      margin-top: 20px;
    }

    .back-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
    }

    .back-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="thank-you-container">
    <h1><?php echo $messageHeading; ?></h1>
    <p>
      <?php echo $userMessage; ?>
    </p>
    <a class="back-btn" href="index.html">Go Back</a>
  </div>
</body>

</html> 