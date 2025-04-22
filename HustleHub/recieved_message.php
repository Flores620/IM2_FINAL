<?php include 'views/header.php'  ?>
<?php

  require 'models/dbconnection.php';
  
  $con=create_connection();
  
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  $current_uid = $_SESSION['uid'];
  
  $sql_posts= "SELECT `user`.`firstname`,"
            ."`user`.`lastname`,"
            ."`message`.`message`,"
            ."`message`.`date_sent`,"
            ."`message`.`time_sent`,"
            ."`message`.`sender_id`,"   
            ."`message`.`mid`"
            ." FROM `message`"
            ." INNER JOIN `user`"
            ." ON `user`.`uid`=`message`.`sender_id`"
            ."WHERE message.receiver_id = $current_uid OR message.sender_id = $current_uid"
            ." ORDER BY `message`.`mid` DESC;";
  
 
  
  $result_posts=$con->query($sql_posts);
  
  while($row=$result_posts->fetch_assoc()){
      echo $row['firstname'];
      echo $row['lastname'];
      echo $row['message'];
      echo $row['date_sent'];
      echo $row['time_sent'];
      echo "<a href='message.php?receiver_id=" . $row['sender_id'] . "' class='btn-reply'>Reply</a>";
      echo "<br>";

  }
  ?>
  <?php include 'views/footer.php' ?>