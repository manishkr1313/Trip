<?php
$insert = false;

if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";

  // Database connect
  $con = mysqli_connect($server, $username, $password, "trip");

  if(!$con){
    die("connection failed: " . mysqli_connect_error());
  }

  // Get data
  $name = $_POST['name'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $age = $_POST['age'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $other = $_POST['other'] ?? '';

  // Insert query
  $sql = "INSERT INTO trip (name, age, gender, email, phone, other, dt) 
          VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

  if(mysqli_query($con, $sql)){
    $insert = true;
  } else{
    echo "ERROR: " . mysqli_error($con);
  }

  mysqli_close($con);
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: url('bg.webp') no-repeat center center/cover;
      height: 100vh;
    }

    .form-box {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      border-radius: 15px;
      padding: 30px;
      color: white;
      box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 form-box text-center">

        <h3 style="color: black;">Welcome to IIT Kharagpur US Trip Form</h3>
        <p style="color: black;">Enter your details and submit this form</p>

        <!-- Success Message -->
        <?php
        if($insert == true){
          echo "<p style='color:lightgreen;'>Form submitted successfully ✅</p>";
        }
        ?>

        <form method="post">

          <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>

          <div class="mb-3">
            <input type="number" name="age" class="form-control" placeholder="Enter your age" required>
          </div>

          <div class="mb-3">
            <input type="text" name="gender" class="form-control" placeholder="Enter your gender">
          </div>

          <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
          </div>

          <div class="mb-3">
            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone">
          </div>

          <div class="mb-3">
            <textarea name="other" class="form-control" rows="3" placeholder="Enter any other"></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100">Submit</button>

          <button type="reset" class="btn btn-secondary w-100 mt-2">Reset</button>

        </form>

      </div>
    </div>
  </div>

</body>
</html>