<?php
include 'views/header.php';
?>

<form id="loginform" action="models/login_user.php" method="POST">
    <?php
    if(isset($_GET['regsuccess'])){
        if($_GET['regsuccess']==1){
            echo "<div class='error_message'>Registration Successful</div>";
        }
    }
    ?>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder ="email" required>
    <label for="pass">Password</label>
    <input type="password" name="pass" id="pass" placeholder="password" required>
    <div id="signedin">
        <input type ="checkbox" name="signedin" id="signedin" value="0">
        <label for="signed">Keep me signed in </label>
    </div>
    <input type="submit" value ="login">
</form>


<?php
include 'views/footer.php';
?>