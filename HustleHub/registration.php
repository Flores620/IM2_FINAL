<?php
include 'views/header.php';
?>
<?php
$role = isset($_GET['role']) ? $_GET['role'] : '';

if ($role === 'freelancer') {
    echo "<h2>Freelancer Registration Form</h2>";
} elseif ($role === 'employer') {
    echo "<h2>Employer Registration Form</h2>";
}
?>
<form id="loginform" action="models/register_user.php" method="POST">
    <input type="hidden" name="role" value="<?php echo htmlspecialchars($role); ?>">
    <label for="email">Email</label>
    <?php
        if(isset($_GET['email_error'])){
            if(($_GET['email_error'])){
                echo "<span class='error_msg'> Invalid Email </span>";
            }
        }
    ?>
    <input type="text" name="email" id="email" placeholder ="email" required>
    <label for="fname">First Name</label>
    <input type="text" name="fname" id="fname" placeholder ="First Name" required>
    <label for="lname">Last Name</label>
    <input type="text" name="lname" id="lname" placeholder ="Last Name" required>
    <label for="cnumber">Contact Number</label>
    <input type="text" name="cnumber" placeholder="Enter your contact number" required>
    <div id="cbgender">
        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>        
    </div>
    <label for="bdate">Birthdate</label>
    <input type="date" name="bdate" id="bdate" required>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" placeholder="password" required>
    <label for="conpass">Confirm Password</label>
    <input type="password" name="conpass" id="conpass" placeholder="confirm password" required>
    <div id="signedin">
        <input type ="checkbox" name="signedin" id="signedin" value="0">
        <label for="eula">Keep me signed In </label>
    </div>
    <input type="submit" value ="Register">
</form>


<?php
include 'views/footer.php';
?>