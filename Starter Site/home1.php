<?php
    require_once ("Includes/simplecms-config.php");
    require_once ("Includes/connectDB.php");
    include ("header.php");
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Home</title>
        
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css.map">
        <link rel="stylesheet" href="css/navbar.css">
        
        <script src="js/jquery-2.1.3.js"></script>
    
        <script src="js/bootstrap.min.js"></script>

    </head> 
    <body style="padding-top: 70px">
        <div class="tab-content">
       <div id="Aboutus" class="container  tab-pane fade" style="margin-top: 20px;">
        <div class="panel panel-primary col-md-10 col-md-offset-1">
            <div class="panel-body">
                 <p> hi how are you doing</p>
            </div>
        </div>
       </div><!-- about us-->
   
   <?php
            echo '<div id="forum" class="container tab-pane fade in active">';
            $selectall = "SELECT * FROM forum ORDER BY Date DESC";
            
            $result = mysqli_query($databaseConnection,$selectall);  

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){ 
                    $subject = $row['Subject'];
                    $Message = $row['Message'];
                    $date = $row['Date'];
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-md-10 col-md-offset-1 col-sm-10 col-md-offset-2">';
                    echo '<div class="panel panel-primary">';
                    echo '<div class="panel-heading">';
                    echo "<label class='panel-title'>$subject</label>";
                    echo "<label class='panel-title pull-right' style='margin-bottom:5px;'>$date</label>";
                    echo '</div>';//panel-title
                    echo "<div class='panel-body'>$Message";                    
                    echo '</div>';//panel-body
                    echo '</div>';//panel-primary
                    echo '</div>';//col-md-6
                    echo '</div>';//row
                    echo '</div>';//container
               }    
            }
            else{
                echo "0 results";
            }
          echo '</div>'; // forum
  ?>
  <div id="contactform" class="container tab-pane fade">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Contact us</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
      
  
 
  
 
     </div>   <!-- tab-content -->   
    </body>
</html>
