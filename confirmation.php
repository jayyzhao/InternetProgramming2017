<?php
  session_start();
  echo "<html>";
  include('header.php');
?>
    <body>

    <!-- Fixed navbar -->
    <?php
      include('navbar.php')
    ?>

    <?php
    //Redirect to sunshine.php if BOOKINGID not set.
    if(!isset($_SESSION["bookingid"])){
        header("Location: index.php");
        die();
        }

    ?>
    <div class="page-content col-md-10">
        <!--Confirmation-->
        <div class="header">Booking Confirmed</div>
        <div class="content">Your booking is confirmed. An email has been sent to <?php echo $_SESSION["email"] ?>.</div>
        </div>
        
    </div>
    <?php
        // remove all session variables
        session_unset(); 
        // destroy the session 
        session_destroy(); 
    ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>