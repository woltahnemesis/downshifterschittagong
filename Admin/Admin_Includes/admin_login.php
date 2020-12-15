<?php session_start(); ?>
<?php 
if(!empty($_SESSION['user'])){
    header('Location: ../admin.php');
} else {
   $_SESSION['user'] = ''; 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Admin_CSS/login.css">
        <title>Login</title>
    </head>
    <body>
        <div class="admin-login-div">
            <div class="login-box">
                <h2>Login</h2>
                <form method="post" action="login_validation.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" minlength="8" maxlength="15" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" minlength="8" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit">
                    </div>
                </form>
            </div>
            
            <p><a href="../../index.php">Go back</a></p>
        </div>
    </body>
</html>