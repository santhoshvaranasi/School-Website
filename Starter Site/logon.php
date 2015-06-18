<html>
<head>
    <title>Login Failure</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css.map">
        
        <script src="js/jquery-2.1.3.js"></script>
    
        <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php 
    
    session_start();

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

    
    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username;

        $query = "SELECT `username` FROM `users` WHERE username = ? AND password = SHA(?) LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->bind_param('ss', $username, $password);

        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows == 1)
        {
            $statement->bind_result($_SESSION['userid'], $_SESSION['username']);
            $statement->fetch();
            header ("Location: samplebsf.html");
        }
        else
        {
             echo "<div class=>Login Unsuccessfull</h1>";
        }
    }
    
    

?>
    </body>
</html>


