<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Admin_CSS/admin_header.css">
        <link rel="stylesheet" href="Admin_CSS/admin_members.css">
        <link rel="stylesheet" href="Admin_CSS/admin_membership.css">
        <link rel="stylesheet" href="Admin_CSS/admin.css">
        <link rel="stylesheet" href="Admin_CSS/admin_news.css">
        <link rel="stylesheet" href="Admin_CSS/event.css">
        <script src="Admin_JavaScript/confirmation.js" async defer></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div class="admin-container">
            <header>
                <div class="nav-bar">   
                    <p class="logo-p">Downshifters <br/> Chittagong</p>
                    <nav>
                        <ul>
                            <li><a href="../index.php">Home </a></li>
                            <li><a href="admin.php">Admin </a></li>
                            <li><a href="admin_members.php">Members</a></li>
                            <li><a href="admin_news.php">News</a></li>
                            <li><a href="admin_event.php">Events</a></li>
                            <?php 
                            if(empty($_SESSION['user'])){
                                header('Location: Admin_Includes/admin_login.php');
                            } else {
                                echo "<li><a href='Admin_Includes/logout.php'>Logout</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </header>