<?php $title = 'About Us'; ?>
<?php include 'Includes/header.php'; ?>

<div class="leadership-div">
    <div class="sub-leadership-div">
        
        <?php 
        $sql = 'SELECT * FROM leadership ORDER BY id ASC';
        $cmd = $db->prepare($sql);
        $cmd->execute();
        while($row = $cmd->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $fName = $row['fName'];
            $lName = $row['lName'];
            $position = $row['position'];
            $image = $row['image'];
        ?>
        
        <div class="leadership-profile">
            <div class="leadership-img" id="<?php echo 'img-div'.$id; ?>">
                <img src="Images/Leadership/<?php echo $image; ?>" id="<?php echo 'img'.$id; ?>" alt="">
            </div>
            <div class="short-desc">
                <p><strong><?php echo $fName.' '.$lName; ?></strong></p>
                <p><?php echo $position; ?></p>
            </div>
        </div>
        
        <?php } ?>
        
        <div class="float-fix"></div>
    </div>
</div>

<?php include 'Includes/footer.php'; ?>