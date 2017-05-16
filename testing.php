<html><head><script>
function checkCheckBoxes() {
  checkboxes = document.getElementsByName('options[]');
  var checked = false;
  for(var i=0, n=checkboxes.length;i<n;i++) {
    if(checkboxes[i].checked){
      checked = true;
    }
  }

  if(checked){
    document.getElementById('flightsForm').submit();
  }
  else{
    alert("Please Select a Flight!")
  }
}
</script>


    <title>2017 - Internet Programming - Online Travel Agency</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this Online Travel Agency -->
    <link href="css/style.css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
 </head><body><nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">IP - Online Travel Agency</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li><li><a href="bookings.php">Your Bookings</a></li><li><a href="flights.php">Search Flights</a></li><li><a href="contact.php">Contact Us</a></li><li><a href="aboutus.php">About Us</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<div class="page-content col-md-10">
      <div class="col-md-12">
        <div class="header">Available Flights</div>
        <div class="content">Here is the available flights that match your search</div>


        <div class="col-md-2">
        </div>

        <div class="col-md-12">
          <form id="flightsForm" class="form-inline" action="chooseSeats.php" method="POST">
          <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="text-align:center">From City</th>
              <th style="text-align:center">To City</th>
              <th style="text-align:center">Price</th>
              <th style="text-align:center">Select Flight</th>
            </tr>
          </thead>
          <tbody>
          <tr><td style="text-align:center">Canberra</td><td style="text-align:center">Melbourne</td><td style="text-align:center"> $140.00</td><td style="text-align:center"><div class=""><label><input type="checkbox" id="flightCheckBoxes" name="options[]" value="Canberra,Melbourne,140.00"></label></div></td></tr>
                  </tbody><tbody>
                </tbody></table>
              </div>
                <div class="col-md-8 col-xs-offset-8">
                  <a href="flights.php" class="btn btn-primary">New Search</a>
                  <button type="button" onclick="return checkCheckBoxes();" class="btn btn-primary">Choose Seats</button>
                </div>
              </form>
            </div>
            <div class="col-md-2">
            </div>
          </div>
        </div></body></html>