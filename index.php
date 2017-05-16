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
      if(!isset($_SESSION["bookingid"])){
        $_SESSION["bookingid"] = rand(1,9999);
      }
    ?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Online Travel Agency</h1>
        <h2>Internet Programming Autumn 2017</h2>
        <p>This is website is created for Internet Programming Assignment 1 - Autumn 2017.</p>
        <p>Please choose Book in the menu navigation to book a flight.</p>
      </div>

    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"></script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
