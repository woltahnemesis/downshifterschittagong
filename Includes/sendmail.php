<?php include 'db.php'; ?>
<?php ob_start(); ?>

<?php 
if(!$db){
    echo 'Not connected!';
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo 'Email not valid';
    }
    
    $ok = true;    
    
    if(empty($name)){
        $ok = false;
    } else if (empty($email)){
        $ok = false;
    } else if (empty($message)){
        $ok = false; 
    }
    
    $header = "From: ".$email;
    
    if($ok){
        if(!mail('downshiftersc@gmail.com', $subject, $message, $header)){
            echo 'Email not valid';
        } else {
            header('Location: ../contact.php');
        }
    }
}
?>