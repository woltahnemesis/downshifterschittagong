<?php $title = 'News'; ?>
<?php include 'Includes/header.php'; ?>

        <div class="news-div">
            <div class="news-div-left">
                
            </div>
            <div class="news-div-mid">
                <div class="page-title">
                    <h1>Downshifters Chittagong News</h1>
                    <hr>
                </div>
                
                <?php 
                $sql = 'SELECT * FROM news ORDER BY id DESC';
                $cmd = $db->prepare($sql);
                $cmd->execute();
                
                while($row = $cmd->fetch(PDO::FETCH_ASSOC)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $date = $row['published'];
                    $author = $row['author'];
                    $image = $row['image'];
                    $desc1 = $row['desc1'];
                    $desc2 = $row['desc2'];

                ?>
                
                <div class="title-div">
                    <h2><?php echo $title; ?></h2>
                    
                    <?php 
                    if(!empty($_SESSION['user'])){
                        echo "<p class='option-btn'>...</p>";
                        echo "<div class='dropdown-div'>";
                        echo "<ul><li><a href='Includes/delete_news.php?id=$id'>Delete</a></li></ul>";
                        echo "</div>";
                    }
                    ?>
    
                </div>
                <div class="publisher">
                    <div class="publisher-pic">
                        <img src="Images/junayaid.jpg" alt="">
                    </div>
                    <div class="publisher-info">
                        <p><?php echo $author; ?></p>
                        <p>Published: <i><?php echo $date; ?></i></p>
                    </div>
                    <div class="float-fix"></div>
                </div>
                <div class="news-desc">
                    <div class="news-pic-div">
                        <img src="Admin/Admin_Uploads/<?php echo $image; ?>" alt="">
                    </div>
                    <p><?php echo $desc1; ?></p>
                    <p><?php echo $desc2; ?></p>
                </div>
                
                <?php } ?>
            </div>
            <div class="news-div-right">
                <div class="sub-left">
                    <div class="short-desc">
                        <p>Follow us! <a href="https://www.facebook.com/DownshiftersCtg/?ref=bookmarks">Facebook</a> . <a href="https://www.instagram.com/downshifters.chittagong/">Instagram</a></p>
                    </div>
                    <p><small>&copy Downshifters Chittagong | All Rights Reserved.</small></p>
                </div>
            </div>
        </div>

<!--
        </div>
    </body>
</html>-->
