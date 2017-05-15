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
        <!--Customer Details-->
        <div class="header">Customer Details</div>
        <div class="content">
            <div class="customerName"><?php echo $_SESSION["firstname"] ?> <?php echo $_SESSION["lastname"] ?><br/></div>
            <div class="customerEmail"><?php echo $_SESSION["email"] ?></div>
            <div class="customerAddress"><?php echo "".$_SESSION["address1"].", ".$_SESSION["address2"].", ".$_SESSION["suburb"].", ".$_SESSION["state"]." ".$_SESSION["postcode"].""; ?></div>
        </div>

        <!--Payment Details-->
        <div class="header">Payment Details</div>
        <div class="content">Credit Card details supplied</div>

        <!--Payment Details-->
        <div class="header">Booking Details</div>
        <div class="content">
            <p>Details of your flights are below. Click "Confirm Payment" to complete booking.</p>
            <?
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
                      <h3>Flight #' . $i . ' - From: ' . $flightDetails[0] . ' To: ' . $flightDetails[1] . '</h3><br/>';

              if($selectedTicket > 0){
                echo 'Selected Ticket:' . $selectedTicket . '<br/>';
              }
              if($child > 0){
                echo 'Child:' . $child . '<br/>';
              }
              if($wheelchair){
                echo 'Wheelchair:' . $wheelchair . '<br/>';
              }
              if($specialDiet){
                echo 'Special Diet:' . $specialDiet . '<br/>';
              }
              echo '<h2>Total Price: $' . ($selectedTicket + $wheelchair+$child+$specialDiet) * $flightDetails[2] . '.00';
              echo '      </div>';
              $i++;
              $selectedTicket = 0;
              $child = 0;
              $wheelchair = 0;
              $specialDiet = 0;
            }
          ?>

            <form class="payment-details" id="personal-details" name="personal-details"
                action="confirmation.php"
                method="POST"
                >
            <div class="bookingid">
            </div>
            <input type="submit" name="submit" value="Confirm Payment">
        </form>

    </div>

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
