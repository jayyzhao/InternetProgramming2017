<?php
  session_start();
  echo "<html>";
  include('header.php');

  if($_POST['addBooking'] == 1){
    
  }
?>



  <body>

    <!-- Fixed navbar -->
    <?php
      include('navbar.php');
    ?>

    <div class="container">
      <?php if(!isset($_SESSION['flights'])){
        echo "You Have No Bookings!";
      } ?>

      <!-- Main component for a primary marketing message or call to action -->

    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
