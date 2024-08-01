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
if (isset($_POST["UPassword"])) {
    $email = $_POST["email"];
    $oldPassword = $_POST["old_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];
    
    // Include the database connection
    require_once "database.php";
    
    // Query to fetch the user by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Check if the entered old password matches the hashed password in the database
        if (password_verify($oldPassword, $user["password"])) {
            // Check if the new password matches the confirm password
            if ($newPassword === $confirmPassword) {
                // Hash the new password
                $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                
                // Update the user's password using prepared statements
                $updateSql = "UPDATE users SET password = ? WHERE email = ?";
                $stmt = $conn->prepare($updateSql);
                $stmt->bind_param("ss", $hashedNewPassword, $email);
                
                if ($stmt->execute()) {
                    echo "<div id='success' class='alert alert-success'>Password updated successfully.</div>";
                    // Use JavaScript to delay the redirection
                    echo "<script>
                        setTimeout(function(){
                            window.location.href = 'login.php';
                        }, 1500); // 2 seconds
                    </script>";
                } else {
                    echo "<div class='alert alert-danger'>Error updating password: " . $stmt->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>New password and confirm password do not match</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Old password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email not found</div>";
    }
}
?>


<!-- The rest of your HTML form is unchanged -->

        
      <form action="resetpass.php" method="post">
        
      <div class="my-4 mx-4">For Updating Password
    </div>

        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Old Password:" name="old_password" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="New Password:" name="new_password" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Confirm Password:" name="confirm_password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Update Password" name="UPassword" class="btn btn-primary">
        </div>
      </form>
  
    </div>
</body>
</html>
