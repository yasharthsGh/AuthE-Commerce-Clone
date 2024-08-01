<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php
// Check if the form is submitted
// Start the session (if you want to use it)
// session_start();

// Check if the form is submitted
if (isset($_POST["delete"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Include the database connection
    require_once "database.php";
    
    // Query to fetch the user by email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($user) {
        // Check if the entered password matches the hashed password in the database
        if (password_verify($password, $user["password"])) {
            // If the password matches, delete the user's record
            $deleteSql = "DELETE FROM users WHERE email = '$email'";
            if (mysqli_query($conn, $deleteSql)) {
                echo "<div id='success' class='alert alert-success'>Account successfully deleted.</div>";
                // Use JavaScript to delay the redirection
                echo "<script>
                    setTimeout(function(){
                        window.location.href = 'registration.php';
                    }, 2000); // 2 seconds
                </script>";
            } else {
                echo "<div class='alert alert-danger'>Error deleting account: " . mysqli_error($conn) . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}
?>

<!-- The rest of your HTML form is unchanged -->

        
      <form action="accdelet.php" method="post">
        
      <div class="my-4 mx-4">For Deleting Acccount
    </div>

        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Delete Account" name="delete" class="btn btn-primary">
        </div>
      </form>
  
    </div>
</body>
</html>
