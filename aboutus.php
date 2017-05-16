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

    <div class="page-content col-md-10">

       
    
      <!-- Main component for a primary marketing message or call to action -->
      <div class="well" style="text-align: center; line-height: 2;">
        <div class="header">About this Website</div>
        <div class="content">
          This website is the submission for UTS's Internet Programming course, Autumn 2017<br/>
          This is website is created by<br>
          11214386 - JONATHAN ZHAO<br/>
          12663795 - HOANG MAI TU
        </div>

        
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
