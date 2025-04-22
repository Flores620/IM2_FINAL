<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'freelancer'){ ?>
<div class="application">
    <form class="application_form" action="./models/send_application.php" method="POST">
       <input type="hidden" name="pid" value="<?php echo $pid; ?>">
       <label for="fname">First Name</label>
       <input type="text" name="fname" placeholder="First Name" required>
       <label for="lname">Last Name</label>
       <input type="text" name="lname" placeholder="last Name" required>
       <label for="cnumber">Contact Number</label>
       <input type="text" name="cnumber" placeholder="Enter your contact number" required>
       <textarea class="cover_letter" name="cover_letter" id="cover_letter"></textarea>
       <input type="submit" value="POST">
    </form>
</div>
<?php } ?>


