<?php include '../../Includes/db.php'; ?>
<?php ob_start(); ?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<?php
$sql = 'DELETE FROM membership WHERE id = :id';
$cmd = $db->prepare($sql);
$cmd->bindParam(':id', $id, PDO::PARAM_INT);
$cmd->execute();

header('Location: ../admin_members.php');

?>