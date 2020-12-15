<?php include '../../Includes/db.php'; ?>
<?php ob_start(); ?>

<?php 

if(isset($_POST['submit'])){
    
    $img = $_FILES['img'];

    $name = $img['name'];
    $size = $img['size'];
    $tmp_name = $img['tmp_name'];
    $type = mime_content_type($tmp_name);

    $type = explode('/', $type);
    $accept = array('jpeg','JPEG', 'JPG', 'jpg', 'gif', 'png');
    
    $desc = $_POST['desc'];
    $place = $_POST['place'];
    $time = $_POST['time'];
    $organizer = $_POST['organizer'];

    if(in_array($type[1], $accept) && $size < 2000000){
        $uniqname = uniqid(str_shuffle($name), true);
        $uniqname = str_replace(' ', '', $uniqname);
        $uniqname = $uniqname.'.'.$type[1];
        
        
        if(strlen($place) > 100){
            echo "Location's input are more than 100 chracters!";
            exit();
        } else if(strlen($time) > 40){
            echo "Time's input are more than 40 characters!";
            exit();
        } else if(strlen($organizer) > 100){
            echo "Oraganizer's name are more than 100 characters!";
            exit();
        }
        
        $sql = 'INSERT INTO make_event (img, event_desc, location, time, organizer) ';
        $sql .= 'VALUES(:img, :event_desc, :location, :time, :organizer) ';
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':img', $uniqname, PDO::PARAM_STR, 100);
        $cmd->bindParam(':event_desc', $desc, PDO::PARAM_STR);
        $cmd->bindParam(':location', $place, PDO::PARAM_STR, 100);
        $cmd->bindParam(':time', $time, PDO::PARAM_STR, 40);
        $cmd->bindParam(':organizer', $organizer, PDO::PARAM_STR, 100);
        $cmd->execute();
        
        move_uploaded_file($tmp_name, "../Admin_Uploads/$uniqname");
        header('Location: ../admin_event.php');
    } else {
        echo 'Image size should be below 2 megabytes!<br />';
        echo 'System only accepts jpg, jpeg, gif, and png.';
    }   
}

?>