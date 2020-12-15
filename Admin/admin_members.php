<?php include '../Includes/db.php'; ?>
<?php include 'Admin_Functions/admin_functions.php';?>
<?php $title = 'Members'; ?>
<?php include 'Admin_Includes/admin_header.php'; ?>

<div class="members-div">
    
    <?php 
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = '';
    }
    ?>
    
    <?php 
    switch($page){
        case 'update':
            include 'Admin_Includes/update_member.php';
            break;
        default:
            include 'Admin_Includes/members_page.php';
            break;
    }
    ?>
    
</div>

<?php include 'Admin_Includes/admin_footer.php'; ?>
