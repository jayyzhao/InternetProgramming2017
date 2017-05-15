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
    //Redirect to sunshine.php if bookingid not set.
    if(!isset($_SESSION["bookingid"])){
        header("Location: index.php");
        die();
    }
    $_SESSION["firstname"] = $_POST["firstname"];
    $_SESSION["lastname"] = $_POST["lastname"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["address1"] = $_POST["address1"];
    $_SESSION["address2"] = $_POST["address2"];
    $_SESSION["suburb"] = $_POST["suburb"];
    $_SESSION["postcode"] = $_POST["postcode"];
    $_SESSION["state"] = $_POST["state"];
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
        <div class="content">Please provide your payment details</div>
        <div class="paymentDetails col-md-8?">
            <form class="payment-details" id="personal-details" name="personal-details"
                action="review.php"
                method="POST"
                >
                <div class="form-group">
                    <div class="datafield nameOnCard col-md-3">
                        <label>Name on Card</label>
                        <input class="form-control" id="nameOnCard" name="nameOnCard" placeholder="Name on Card" required pattern="([A-Za-z ])+">
                    </div>

                    <div class="datafield cardNumber col-md-3">
                        <label>Card Number</label>
                        <input class="form-control" id="cardNumber" name="cardNumber" placeholder="Card Number" required pattern="^\d{16}$">
                    </div>

                    <div class="datafield expiryDate col-md-3" id="expiryDate">
                        <label>Expiry Date</label>
                        <select class="form-control" id="expiryMonth" name="expiryDate" placeholder="Month" required>
                            <option value=''>Month</option>
                            <option value='01'>January</option>
                            <option value='02'>February</option>
                            <option value='03'>March</option>
                            <option value='04'>April</option>
                            <option value='05'>May</option>
                            <option value='06'>June</option>
                            <option value='07'>July</option>
                            <option value='08'>August</option>
                            <option value='09'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                        <select class="form-control" id="expiryYear" name="expiryDate" placeholder="Year" required>
                            <option value=''>Year</option>
                            <option value='2017'>2017</option>
                            <option value='2018'>2018</option>
                            <option value='2019'>2019</option>
                            <option value='2020'>2020</option>
                            <option value='2021'>2021</option>
                        </select>
                        <div class="tooltip" id="errorExpiryDate">Expiry date cannot be in the past</div>
                    </div>

                    <div class="datafield cvc col-md-3">
                        <label>CVC</label>
                        <input class="form-control" id="cvc" name="cvc" placeholder="CVC" type="password" required pattern="^\d{3}$" maxlength="3">
                    </div>
                </div>
                <input type="submit" name="submit" value="Review Booking">
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/cardvalidation.js" type="text/javascript">
        
    </script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>p