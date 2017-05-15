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

        $to = $_SESSION['email']; // this is the sender's Email address
        $from = 'bookings@utsinternetprogramming2017.com';
        $first_name = $_SESSION['firstname'];
        $last_name = $_SESSION['lastname'];
        $subject = "Thank you for booking with Us!";
        $message = "Thank you for booking with us." . "\n\n";
        $message .= "Address: \n\n";
        $message .= $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "\n";
        $message .= "".$_SESSION["address1"].", ".$_SESSION["address2"].", ".$_SESSION["suburb"].", ".$_SESSION["state"]." ".$_SESSION["postcode"].""."\n\n";
        $message .= "Your flights details are below:" . "\n\n";

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
          $message .= 'Flight #' . $i . ' - From: ' . $flightDetails[0] . ' To: ' . $flightDetails[1] . "\n";
          if($selectedTicket > 0){
            $message .= 'Selected Ticket:' . $selectedTicket . "\n";
          }
          if($child > 0){
            $message .= 'Child:' . $child . "\n";
          }
          if($wheelchair){
            $message .= "Wheelchair:" . $wheelchair . "\n";
          }
          if($specialDiet){
            $message .= 'Special Diet:' . $specialDiet . "\n";
          }

          $message .= 'Total Price: $' . ($selectedTicket + $wheelchair+$child+$specialDiet) * $flightDetails[2] . '.00' . "\n\n";

          $i++;
          $selectedTicket = 0;
          $child = 0;
          $wheelchair = 0;
          $specialDiet = 0;
        }

        $headers = "From:" . $from;
        //mail($to,$subject,$message,$headers);
        mail($to,$subject,$message,$headers);

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
        // // destroy the session
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
