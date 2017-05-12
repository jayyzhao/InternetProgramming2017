<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">IP - Online Travel Agency</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <?php
          $request_uri =  $_SERVER['REQUEST_URI'];

          if($request_uri == "/~jozhao/index.php"){
            echo '<li class="active"><a href="index.php">Home</a></li>';
          }
          else if($request_uri == "/~jozhao/"){
            echo '<li class="active"><a href="index.php">Home</a></li>';
          }
          else {
            echo '<li><a href="index.php">Home</a></li>';
          }

          if($request_uri == "/~jozhao/bookings.php"){
            echo '<li class="active"><a href="bookings.php">Your Bookings</a></li>';
          }
          else{
            echo '<li><a href="bookings.php">Your Bookings</a></li>';
          }

          if($request_uri == "/~jozhao/flights.php"){
            echo '<li class="actiive"><a href="flights.php">Search Flights</a></li>';
          }
          else{
            echo '<li><a href="flights.php">Search Flights</a></li>';
          }

          if($request_uri == "/~jozhao/contact.php"){
            echo '<li class="actiive"><a href="contact.php">Contact Us</a></li>';
          }
          else{
            echo '<li><a href="contact.php">Contact Us</a></li>';
          }

          if($request_uri == "/~jozhao/aboutus.php"){
            echo '<li class="actiive"><a href="flights.php">About Us</a></li>';
          }
          else{
            echo '<li><a href="flights.php">About Us</a></li>';
          }

        ?>

      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
