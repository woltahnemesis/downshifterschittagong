<?php $title = 'Contact Us'; ?>
<?php include 'Includes/header.php'; ?>

<div class="contact-div">
    <div class="sub-contact-div">
        <div class="contact-form">
            <form method="post" action="Includes/sendmail.php">
                <input type="text" name="name" placeholder="Full Name" maxlength="50" required />
                <input type="email" name="email" placeholder="Your email" required />
                <input type="text" name="subject" placeholder="Subject" />
                <textarea name="message" placeholder="Your message" required></textarea>
                <input type="submit" name="submit" id="submit">
            </form>
        </div>
        <div class="contact-desc">
            <h2>Contact Us</h2>
            <p>Feel free to tell us what you need and want. We are willing to talk with you. We'll respond to you as soon as possible. Only verified email will be able to send a message to downshiftersc@gmail.com successfully.</p>
        </div>
    </div>
</div>

<?php include 'Includes/footer.php'; ?>