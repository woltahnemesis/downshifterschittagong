<?php include 'db.php'; ?>
<?php ob_start(); ?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>

<?php 

$sql = 'DELETE FROM news WHERE id = :id';
$cmd = $db->prepare($sql);
$cmd->bindParam(':id', $id, PDO::PARAM_INT);
$cmd->execute();

header('Location: ../news.php');

?>