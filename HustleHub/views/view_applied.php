<?php

  require './models/dbconnection.php';
  
  $con=create_connection();
  
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  
  $sql_posts= "SELECT `user`.`firstname`,"
            ."`user`.`lastname`,"
            ."`application`.`uid`,"
            ."`application`.`pid`,"
            ."`application`.`cover_letter`,"
            ."`application`.`date_applied`,"
            ."`application`.`time_applied`,"
            ."`application`.`status`,"
            ."`application`.`appid`"
            ." FROM `application`"
            ." INNER JOIN `user`"
            ." ON `user`.`uid`=`application`.`uid`"
            ." INNER JOIN `post`"
            ." ON `post`.`pid`=`application`.`pid`"
            ." ORDER BY `application`.`appid` DESC;";
  
 
  
  $result_posts=$con->query($sql_posts);
  
  while($row=$result_posts->fetch_assoc()){
      echo $row['firstname'];
      echo $row['lastname'];
      echo $row['cover_letter'];
      echo $row['date_applied'];
      echo $row['time_applied'];
      echo $row['status'];
      echo "<br>";

      echo '<form action="models/update_applicationstatus.php" method="POST">
                <input type="hidden" name="appid" value="' . $row['appid'] . '">
                <input type="hidden" name="status" value="accepted">
                <input type="submit" value="Accept" class="btn-approve">
            </form>';
      echo '<form action="models/update_applicationstatus.php" method="POST">
                <input type="hidden" name="appid" value="' . $row['appid'] . '">
                <input type="hidden" name="status" value="rejected">
                <input type="submit" value="Reject" class="btn-reject">
            </form>';
  }
?>
