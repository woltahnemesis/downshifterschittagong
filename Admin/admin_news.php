<?php include '../Includes/db.php'; ?>
<?php $title = 'News'; ?>
<?php include 'Admin_Includes/admin_header.php'; ?>

<div class="news-div">
    <div class="sub-news-div">
        <h2>News</h2>
        <div class="form-div">
            <form action="Admin_Includes/upload_news.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" maxlength="70" required />
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" maxlength="50" required />
                </div>
                
                <?php $img_accept = 'image/jpeg, image/jpg, image/png, image/gif'; ?>
                
                <div class="form-group">
                    <label for="img">Image</label>
                    <input type="file" name="img" id="img" accept="<?php echo $img_accept; ?>" required />
                </div>
                <div class="form-group">
                    <label for="desc1">Description 1</label>
                    <textarea name="desc1" id="desc1"></textarea>
                </div>
                <div class="form-group">
                    <label for="desc2">Description 2</label>
                    <textarea name="desc2" id="desc2"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'Admin_Includes/admin_footer.php'; ?>