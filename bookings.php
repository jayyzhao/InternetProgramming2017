<?php
  session_start();
  echo "<html>";
  include('header.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_SESSION['flightBooking'])){

      // print_r($_SESSION['flightBooking']);
    }
    else{
      for($i=1; $i <= $_POST['totalFlights']; $i++){
        //check flgith Row A
        $flightSeatArray = $_POST["flight_" . $i . "_row_a"];
        if(isset($flightSeatArray)){
          for($j=0; $j < sizeOf($flightSeatArray); $j++){
            //echo "SEAT FOUND";
            //print_r($flightSeatArray[$j]);
            $k = $i -1;
            $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray[$j];
          }


        }
      }
    }
  }
?>



  <body>

    <!-- Fixed navbar -->
    <?php
      include('navbar.php');
    ?>

    <div class="container">
      <?php
      if(!isset($_SESSION['flightBooking'])){
        echo "You Have No Bookings!";
      }
      else{
        echo '<div class="col-md-12">
          <h1>Your Bookings</h2><br/><br/>
        </div>';
        $i = 1;
        foreach($_SESSION['flightBooking'] as $flights=>$seats){
          $flightDetails = explode("," , $flights);

          $selectedTicket = 0;
          $child = 0;
          $wheelchair = 0;
          $specialDiet = 0;
          for($j = 0; $j < sizeOf($seats); $j++){
            if($seats[$j] == "selectTicket"){
              $selectedTicket++;
            }
            else if($seats[$j] == "child"){
              $child++;
            }
            else if($seats[$j] == "wheelchair"){
              $wheelchair++;
            }
            else if($seats[$j] == "specialDiet"){
              $specialDiet++;
            }
          }
          echo '<div class="well">
                  <h3>Flight #' . $i . ' - From: ' . $flightDetails[0] . ' To: ' . $flightDetails[1] . ' Price: $' . $flightDetails[2] . '</h3><br/>
                  Selected Ticket:' . $selectedTicket . '<br/>
                  Child:' . $child . '<br/>
                  Wheelchair:' . $wheelchair . '<br/>
                  Special Diet:' . $specialDiet . '<br/>
                </div>';
          $i++;
          $selectedTicket = 0;
          $child = 0;
          $wheelchair = 0;
          $specialDiet = 0;
        }

      }
      ?>

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
