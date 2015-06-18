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

     
     if(empty($_POST['email'])){
         echo "error no email address";
     }

     if(empty($_POST['firstname'])){
         echo "<br> <br> error no first name";
     }

     if(empty($_POST['lastname'])){
         echo "error no LN";
     }

     if(empty($_POST['passwd'])){
         echo "error no PWD";
     }  
         
       
     if(isset($_POST['submit'])){

        $username = $_POST['email'];

        $existquery = mysqli_query($conn, "select * from `users` where username='$username' LIMIT 1");
        
        $row_cnt = mysqli_num_rows($existquery);

        echo $row_cnt;

        if($row_cnt >= 1){
            echo "exists";
        }    

        
        else{        
        
        $FirstName = $_POST['firstname'];
        $LastName  = $_POST['lastname'];
        $password  = $_POST['passwd'];
                  
        $sqlquery = "insert into users (Username,FirstName, LastName, Password) VALUES (?,?,?,SHA(?))";        

        $statement = $conn->prepare($sqlquery);
        
        $statement->bind_param('ssss', $username, $FirstName, $LastName, $password);        
             
        $statement->execute();        

        $creationWasSuccessful = $statement->affected_rows == 1 ? true : false;
         if($creationWasSuccessful){
             echo "successfull";
         }
       }// end of creation new record.
      
       
          $sqlquery->close();   
     }// end of isset of submit.
        
     
     $conn->close();
?>

