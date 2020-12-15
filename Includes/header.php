<?php include 'Includes/db.php'; ?>

<?php 

if($title == 'Downshifters Chittagong') {
    $href = 'CSS/banner.css';
} else {
    $href = 'CSS/nav-header.css';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo $href; ?>">
        <link rel="stylesheet" href="CSS/intro.css">
        <link rel="stylesheet" href="CSS/member.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/anniversary.css">
        <link rel="stylesheet" href="CSS/contact.css">
        <link rel="stylesheet" href="CSS/news.css">
        <link rel="stylesheet" href="CSS/aboutus.css">
        <link rel="stylesheet" href="CSS/home-event.css">
        <script src="JavaScript/news.js" async defer></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div class="container">
            <div class="navigation-box">
                <img src="Images/banner-pic.jpg">
                <div class="box-opacity"></div>
                <div class="banner">
                    <div class="nav-bar">   
                        <p class="logo-p">Downshifters <br/> Chittagong</p>
                        <nav>
                            <ul>
                                <li><a href="index.php">Home </a></li>
                                <li><a href="news.php">News</a></li>
                                <li><a href="aboutus.php">About Us</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="event.php">Events</a></li>
                                <li><a href="Admin/Admin_Includes/admin_login.php">Admin</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="qoute-div">
                        <p><strong>Drive hard, stay safe then see how you perform. </strong></p>
                    </div>
                </div>
            </div>