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

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="well">
        <h1>Online Travel Agency</h1>
        <h2>Internet Programming Autumn 2017</h2>
        <p>This is website is created by:</p>
        <p>11214386 - JONATHAN ZHAO</p>
        <p>12663795 - ALICE MAI TU</p>
      </div>

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
