<?php include '../../Includes/db.php'; ?>
<?php ob_start(); ?>

<?php 

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $date = date('y-m-d');
    $author = $_POST['author'];
    
    $img = $_FILES['img'];
    //Properties
    $name = $img['name'];
    $size = $img['size'];
    $tmp_name = $img['tmp_name'];
    $type = mime_content_type($tmp_name);
    
    $type = explode('/', $type);
    $accept = array('jpeg', 'jpg', 'png', 'gif', 'JPEG');
    
    $desc1 = $_POST['desc1'];
    $desc2 = $_POST['desc2'];
    
    if(strlen($title) > 70){
        echo 'Title longer than 70 characters is not allowed!';
        exit();
    }

    if($size < 1024000 && in_array($type[1], $accept)){
        $uniqname = uniqid(str_shuffle($name), true);
        $uniqname = str_replace(' ', '', $uniqname);
        $uniqname = $uniqname.'.'.$type[1];
        move_uploaded_file($tmp_name, "../Admin_Uploads/$uniqname");
    
        $sql = 'INSERT INTO news (title, published, author, image, desc1, desc2) ';
        $sql .= 'VALUES (:title, :date, :author, :image, :desc1, :desc2)';
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':title', $title, PDO::PARAM_STR, 70);
        $cmd->bindParam(':date', $date, PDO::PARAM_STR);
        $cmd->bindParam(':author', $author, PDO::PARAM_STR, 50);
        $cmd->bindParam(':image', $uniqname, PDO::PARAM_STR, 150);
        $cmd->bindParam(':desc1', $desc1, PDO::PARAM_STR);
        $cmd->bindParam(':desc2', $desc2, PDO::PARAM_STR);
        $cmd->execute();

        header('Location: ../admin_news.php');
        
    } else {
        echo 'Size is bigger than 1.024 megabytes! <br /> Please choose another picture.';
    }
}

?>