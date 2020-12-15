<?php include '../../Includes/db.php'; ?>
<?php session_start(); ?>
<?php 
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $sql = 'SELECT * FROM admin WHERE username = :user ';
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':user', $user, PDO::PARAM_STR);
    $cmd->execute();
    
    $count = $cmd->rowCount();
    
    if($count != 1){
        header('Location: admin_login.php');
    } else {
        
        $records = $cmd->fetchAll();
        
        foreach($records as $values){
            $user = $values['username'];
            $hashed_pass = $values['password'];
        }
        
        $match_pass = password_verify($pass, $hashed_pass);
        
        if($match_pass == 1){
            $_SESSION['user'] = substr($hashed_pass, 8, 10);
            header('Location: ../admin.php');
        } else {
            echo "Passwords don't match!";
            echo "<script>
            //Using setTimeout to execute a function after 5 seconds.
            setTimeout(function () {
               //Redirect with JavaScript
               window.location.href= 'admin_login.php';
            }, 2000);
            </script>";
        }
        
    }
    
}
?>