<?php
    $dbserver   = 'localhost';
    $dbusername = 'root';
    $dbpassword = 'root';
    $dbname     = 'ForumDatabase';
    
    // create connection
    $conn = new mysqli($dbserver,$dbusername,$dbpassword,$dbname);
    
    // check connection 

    if($conn->connect_error){
        die("connection failed ". $conn->mysql_error());
        
    }
     echo "connection successfull";

     if(isset($_POST['submit'])){

         $subject = $_POST['subject'];
         $message = $_POST['message'];

         echo $subject;
         
         
         $forumquery ="insert into forum (Subject,Message) values (?,?)";

         echo $message;

         $statement = $conn->prepare($forumquery);

         $statement->bind_param('ss',$subject,$message);

         $statement->execute();

         $creationWasSuccessful = $statement->affected_rows == 1 ? true : false;
         if($creationWasSuccessful){
             header ("Location: home1.php");
         }


     }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css.map">
        
        <script src="js/jquery-2.1.3.js"></script>
    
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <p>hey wazzup</p>
    </body>
</html>
