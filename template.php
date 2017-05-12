<html>
    <title>Payment Details</title>
    <head>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this Online Travel Agency -->
    <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    <!-- Fixed navbar -->
    <?php
      include('navbar.php')
    ?>

    <?php
    //Redirect to sunshine.php if orderid not set.
    if(!isset($_SESSION["ORDERID"])){
        header("Location: index.php");
        die();
        }

    //Gather data from product php
    $ORDERID=$_SESSION["ORDERID"];
    $CUSTOMER_NAME=$_POST['Customer'];
    $EMAIL=$_POST['Email'];

    //Provide Database connection
    $dbhost = 'localhost:3306'; //hostname:port number
    $dbuser = 'root'; //username
    $dbpass = ''; //password
    $conn = mysql_connect($dbhost, $dbuser, $dbpass); //returns true or false
    if(! $conn )////display error message if connection fails
    {die('Could not connect: ' . mysql_error());
    }
    ?>


    <div class="page-content col-md-10">

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>