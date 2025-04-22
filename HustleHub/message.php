<?php include 'views/header.php' ?>
<?php
$receiver_id = isset($_GET['receiver_id']) ? $_GET['receiver_id'] : '';
?>
<div class ="message">
    <form action="models/send_message.php" method="POST">
        <input type="hidden" name="receiver_id" value="<?= htmlspecialchars($receiver_id) ?>">
        <textarea name="message" placeholder="Type your message here..." required></textarea>
        <input type="submit" value="Send">
    </form>
</div>

<?php include 'views/footer.php' ?>