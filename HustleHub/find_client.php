<?php include 'views/header.php'; ?>
<?php
require 'models/dbconnection.php';

$con = create_connection();

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$sql = "SELECT uid, firstname, lastname, email FROM user WHERE role = 'freelancer'";
$result = $con->query($sql);

?>


<h2>Available Freelancers</h2>

<div class="freelancer-list">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='freelancer-card'>";
            echo "<h3>" . $row['firstname'] . " " . $row['lastname'] . "</h3>";
            echo "<p>Email: " . $row['email'] . "</p>";

            // Message button
            echo "<form action='message.php' method='GET'>";
            echo "<input type='hidden' name='receiver_id' value='" . $row['uid'] . "'>";
            echo "<input type='submit' value='Message'>";
            echo "</form>";

            echo "</div><hr>";
        }
    } else {
        echo "<p>No freelancers found.</p>";
    }
    ?>
</div>

<?php include './views/footer.php'; ?>
