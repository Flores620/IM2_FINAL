<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'employer'){ ?>
<div class="posts">
    <form class="create_post_form" action="./models/create_post.php" method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <textarea class="create_post_area" name="create_post_content" id="create_post_content"></textarea>        
        <input type="number" name="salary" placeholder="Enter salary" required>
        <input type="submit" value="POST">
    </form>
</div>
<?php } ?>
<?php

  require './models/dbconnection.php';
  
  $con=create_connection();
  
  if($con->connect_error){
      die("Connection Failed" .$con->connect_error);
  }
  
  $sql_posts= "SELECT `user`.`firstname`,"
            ."`user`.`lastname`,"
            ."`post`.`text_content`,"
            ."`post`.`title`,"
            ."`post`.`salary`,"
            ."`post`.`date`,"
            ."`post`.`time`,"
            ."`post`.`uid`,"   
            ."`post`.`pid`"
            ." FROM `post`"
            ." INNER JOIN `user`"
            ." ON `user`.`uid`=`post`.`uid`"
            ." ORDER BY `post`.`pid` DESC;";
  
 
  
  $result_posts=$con->query($sql_posts);
  
  while($row=$result_posts->fetch_assoc()){
      echo $row['firstname'];
      echo $row['lastname'];
      echo $row['title'];
      echo $row['text_content'];
      echo $row['salary'];
      echo $row['date'];
      echo $row['time'];
      if (isset($_SESSION['role']) && $_SESSION['role'] === 'freelancer') {
        echo "<a href='application.php?pid=" . $row['pid'] . "' class='btn-reply'>Apply</a>";
      } elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'employer' && $_SESSION['uid'] == $row['uid']) {
        echo "<a href='applied.php?pid=" . $row['pid'] . "' class='btn-view'>View Applied</a>";
      }
      echo "<br>";

  }
