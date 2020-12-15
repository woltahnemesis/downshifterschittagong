<?php include '../Includes/db.php'; ?>
<?php $title = 'Events'; ?>
<?php include 'Admin_Includes/admin_header.php'; ?>

<div class="admin-events">
    <div class="sub-admin-events">
        <h2>Event</h2>
        <form method="post" action="Admin_Includes/make_event.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img">Image</label>
                <div class="divider">
                    <input type="file" name="img" id="img" accept="image/*" required />
                </div>
            </div>
            <div class="form-group">
                <label for="desc">Event Description</label>
                <div class="divider">
                    <textarea name="desc" id="desc" required ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="place">Location</label>
                <div class="divider">
                    <input type="text" name="place" id="place" maxlength="100" required >
                </div>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <div class="divider">
                    <input type="text" name="time" id="time" placeholder="ex. Jan 26, 2021" maxlength="40" required >
                </div>
            </div>
            <div class="form-group">
                <label for="organizer">Event Organizer</label>
                <div class="divider">
                    <input type="text" name="organizer" id="organizer" maxlength="100" required >
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit">
            </div>
        </form>
    </div>
</div>

<?php include 'Admin_Includes/admin_footer.php'; ?>
