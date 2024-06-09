<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .centered-div {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Optional: Set minimum height for full viewport centering */
            background-color: #f0f0f0; /* Optional: Add background color for visualization */
        }
        .alert-success{
            margin: 50px;
            padding: 20px;
        }
        .alert-danger{
            margin: 50px;
            padding: 20px;
        }
    </style>
</head>

<?php
require_once "user.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (User::signin($username, $password)) {
    header("Location: index.php");  // Redirect to home page on successful login
    exit();
  } else {
    // Login failed, display error message
    ?>
    <div class="alert alert-danger" role="alert">
        Signup Failed<a href="signup.php" class="alert-link">Signup</a>. Click here to Try Again.
    </div>
<?php
    
  }
}else{
  ?>
  
  
  <body>
  
      <div class="centered-div">
          
      <form method="post">
      <h1>Signin</h1>
    <div class="mb-3">
      <label for="Username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
      <label for="Password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">signin</button>
  </form>
      </div>
  
  </body>
  
  
  </html>
  
  <?php
  }
  ?>