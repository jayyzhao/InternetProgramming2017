<?php
  session_start();
  echo "<html>";
  include('header.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_SESSION['flightBooking']) && $_SESSION['lastBookingID'] == $_POST['bookingid']){
      echo "Please do not Resubmit the form";
    }
    elseif(isset($_SESSION['flightBooking'])){
      $_SESSION['lastBookingID'] = $_POST['bookingid'];
      // print_r($_SESSION['flightBooking']);
      // echo "new";
      //
      for($i=1; $i <= $_POST['totalFlights']; $i++){
      // //   //check flgith Row A

        if(isset($_POST["flight_" . $i . "_row_a"])){
          $flightSeatArray = $_POST["flight_" . $i . "_row_a"];
          for($j=0; $j < sizeOf($flightSeatArray); $j++){
            $k = $i -1;
            $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray[$j];
          }
        }
        if(isset($_POST["flight_" . $i . "_row_b"])){
          $flightSeatArray_B = $_POST["flight_" . $i . "_row_b"];
          for($j=0; $j < sizeOf($flightSeatArray_B); $j++){
            //echo "SEAT FOUND";
            //print_r($flightSeatArray[$j]);
            $k = $i -1;
            $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_B[$j];
          }
        }

        if(isset($_POST["flight_" . $i . "_row_c"])){
			      $flightSeatArray_C = $_POST["flight_" . $i . "_row_c"];
            for($j=0; $j < sizeOf($flightSeatArray_C); $j++){
              //echo "SEAT FOUND";
              //print_r($flightSeatArray[$j]);
              $k = $i -1;
              $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_C[$j];
            }
          }
          if(isset($_POST["flight_" . $i . "_row_d"])){
			        $flightSeatArray_D = $_POST["flight_" . $i . "_row_d"];
              for($j=0; $j < sizeOf($flightSeatArray_D); $j++){
                //echo "SEAT FOUND";
                //print_r($flightSeatArray[$j]);
                $k = $i -1;
                $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_D[$j];
              }
          }
          if(isset($_POST["flight_" . $i . "_row_e"])){
		        $flightSeatArray_E = $_POST["flight_" . $i . "_row_e"];
            for($j=0; $j < sizeOf($flightSeatArray_E); $j++){
            //echo "SEAT FOUND";
            //print_r($flightSeatArray[$j]);
              $k = $i -1;
              $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_E[$j];
            }
          }


      }
    }
    else{
      $_SESSION['lastBookingID'] = $_POST['bookingid'];
      for($i=1; $i <= $_POST['totalFlights']; $i++){
        //check flgith Row A]

        if(isset($_POST["flight_" . $i . "_row_a"])){
          $flightSeatArray_A = $_POST["flight_" . $i . "_row_a"];
          for($j=0; $j < sizeOf($flightSeatArray_A); $j++){
            //echo "SEAT FOUND";
            //print_r($flightSeatArray[$j]);
            $k = $i -1;
            $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_A[$j];
          }
        }

        if(isset($_POST["flight_" . $i . "_row_b"])){
          $flightSeatArray_B = $_POST["flight_" . $i . "_row_b"];
          for($j=0; $j < sizeOf($flightSeatArray_B); $j++){
            //echo "SEAT FOUND";
            //print_r($flightSeatArray[$j]);
            $k = $i -1;
            $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_B[$j];
          }
        }

        if(isset($_POST["flight_" . $i . "_row_c"])){
			      $flightSeatArray_C = $_POST["flight_" . $i . "_row_c"];
            for($j=0; $j < sizeOf($flightSeatArray_C); $j++){
              //echo "SEAT FOUND";
              //print_r($flightSeatArray[$j]);
              $k = $i -1;
              $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_C[$j];
            }
          }
          if(isset($_POST["flight_" . $i . "_row_d"])){
			        $flightSeatArray_D = $_POST["flight_" . $i . "_row_d"];
              for($j=0; $j < sizeOf($flightSeatArray_D); $j++){
                //echo "SEAT FOUND";
                //print_r($flightSeatArray[$j]);
                $k = $i -1;
                $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_D[$j];
              }
          }
          if(isset($_POST["flight_" . $i . "_row_e"])){
		        $flightSeatArray_E = $_POST["flight_" . $i . "_row_e"];
            for($j=0; $j < sizeOf($flightSeatArray_E); $j++){
            //echo "SEAT FOUND";
            //print_r($flightSeatArray[$j]);
              $k = $i -1;
              $_SESSION['flightBooking'][$_SESSION['currentFlights'][$k]][] = $flightSeatArray_E[$j];
            }
          }


      }
    }
  }
?>
<script>
function clearFlights(){

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         window.location = 'bookings.php';
      }
  };
  xhttp.open("GET", "clearFlights.php", true);
  xhttp.send();

}
function proceedToPay(){
  var form=document.getElementById('searchFlights');
  form.submit();
}
function bookMoreFlights(){
  window.location = 'flights.php';
}
</script>


  <body>

    <!-- Fixed navbar -->
    <?php
      include('navbar.php');
    ?>

    <div class="container">
      <?php
      if(!isset($_SESSION['flightBooking'])){
        echo "You Have No Bookings!";
        echo '<form class="form-inline" id="searchFlights" action="personaldetails.php" method="POST">';
        echo '<input type="hidden" id="bookingid" name="bookingid" value="'. rand()   . '"/>';
        echo '<button type="button" onclick="return bookMoreFlights();" class="btn btn-primary pull-right">Book a Flight</button>';
        echo '</form>';
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

        echo '<form class="form-inline" id="searchFlights" action="personaldetails.php" method="POST">';
        echo '<input type="hidden" id="bookingid" name="bookingid" value="'. rand()   . '"/>';
        echo '<button type="button" onclick="return clearFlights();" class="btn btn-primary pull-right">Clear All Booked Flights</button>';
        echo '<button type="button" onclick="return proceedToPay();" class="btn btn-primary pull-right">Proceed to Checkout</button>';
        echo '<button type="button" onclick="return bookMoreFlights();" class="btn btn-primary pull-right">Book More Flights</button>';
        echo '</form>';

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
