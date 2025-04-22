<?php
    session_start();
?>
<html>
    <head>
        <tiile></tiile>
        <link href="./res/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="logo">
            <a href="<?php echo isset($_SESSION['uid']) ? 'home.php' : 'index.php'; ?>">HustleHub</a>
        </div>
        <div class="navbar">

            <?php if (isset($_SESSION['uid'])) {?>
                    <a href="home.php">Home</a>
                    <a href="profile.php">Profile</a>

                <?php if ($_SESSION['role'] === 'employer') { ?>
                         <a href ="find_client.php">Find Clients</a>
                <?php } ?>
                    <a href="recieved_message.php">Message</a>
                    <a href="./models/logout_user.php">Logout</a>
            <?php } else { ?>
                    <a href="login.php">Login</a>
                    <a href="registerrole.php">Sign Up</a>
                <?php } ?>
        </div>
            
    </body>
</html>