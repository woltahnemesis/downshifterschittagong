<?php $title = 'Events'; ?>
<?php include 'Includes/header.php'; ?>

<div class="events-div">
    <h2>Downshifters Chittagong's Event Page</h2>
    <div class="sub-events-div">
        <div class="event-div-left"></div>
        <div class="event-div-mid">
            
            <?php 
            $sql = 'SELECT * FROM make_event';
            $cmd = $db->prepare($sql);
            $cmd->execute();
            
            while($row = $cmd->fetch(PDO::FETCH_ASSOC)){
                $id = $row['id'];
                $img = $row['img'];
                $desc = $row['event_desc'];
                $location = $row['location'];
                $time = $row['time'];
                $organizer= $row['organizer'];
            ?>
            
            <?php 
            if($_SESSION['user']){
                echo "<div class='delete-p'><p><a href='Includes/delete_event.php?id=$id'>Delete</a></p></div>";
            }
            ?>
            <div class="event-img-div">
                <img src="Admin/Admin_Uploads/<?php echo $img; ?>" alt="">
            </div>
            <div class="event-desc">
                <p class="desc"><?php echo $desc; ?></p>
                <p><strong>Location:</strong> <?php echo $location; ?></p>
                <p><strong>Time:</strong> <?php echo $time; ?></p>
                <p><strong>Event Organizer:</strong> <?php echo $organizer; ?></p>
            </div>
            
            <?php } ?>
        </div>
        <div class="event-div-right"></div>
    </div>
</div>

<?php include 'Includes/footer.php'; ?>