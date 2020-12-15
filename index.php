<?php $title = 'Downshifters Chittagong'; ?>

<?php 

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = '';
}

switch($page){
        
    case 'hompage':
        include 'Includes/header.php';
        include 'Includes/homepage.php';
        break;
        
    case 'membership':
        include 'Includes/membership.php';
        break;
        
    default:
        include 'Includes/header.php';
        include 'Includes/homepage.php';
        break;
}

?>

<?php 

    // $password_hash = password_hash('', PASSWORD_DEFAULT);
    // $user = '';
    
    // $sql = 'INSERT INTO admin (username, password) VALUES (:user, :pass)';
    // $cmd = $db->prepare($sql);
    // $cmd->bindParam(':user', $user, PDO::PARAM_STR, 15);
    // $cmd->bindParam(':pass', $password_hash, PDO::PARAM_STR, 150);
    // $cmd->execute();

?>

<?php include 'Includes/footer.php'; ?>