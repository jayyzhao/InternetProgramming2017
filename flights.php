<?php
  // ini_set('display_errors', 'On');
  // error_reporting(E_ALL);
  session_start();
  echo "<html>";
  include('header.php');
  include('config/database.php');

  $departuresSql = "SELECT DISTINCT from_city FROM poti.flights";
  $departureResults = $conn->query($departuresSql);
  if($departureResults->num_rows > 0){
    while($departuresRow = $departureResults->fetch_assoc()){
      $departures[] = $departuresRow['from_city'];
    }
  }

  $destinationSql = "SELECT DISTINCT to_city FROM poti.flights";
  $destinationResults = $conn->query($destinationSql);
  if($destinationResults->num_rows > 0){
    while($destinationRows = $destinationResults->fetch_assoc()){
      $destination[] = $destinationRows['to_city'];
    }
  }
  $conn->close();
?>
<script>
  // function departureChange(str){
  //
  //   var selectedDesitination = document.getElementById("destination");
  //   var selectedDesitinationValue = selectedDesitination.options[selectedDesitination.selectedIndex].value;
  //     if (window.XMLHttpRequest) {
  //           // code for IE7+, Firefox, Chrome, Opera, Safari
  //           xmlhttp = new XMLHttpRequest();
  //           console.log(selectedDesitinationValue);
  //
  //       } else {
  //           // code for IE6, IE5
  //           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  //       }
  //       xmlhttp.onreadystatechange = function() {
  //         if (this.readyState == 4 && this.status == 200) {
  //           // document.getElementById("txtHint").innerHTML = this.responseText;
  //           if(this.responseText != "No Change Required"){
  //             var newDestinationArray = this.responseText.split(',');
  //             console.log(newDestinationArray);
  //             var destinationDropdown = document.getElementById("destination");
  //             var departDropdown = document.getElementById("departFrom");
  //             $('#destination').empty()
  //
  //             var option = document.createElement('option');
  //             option.text = "Any Destination";
  //             option.value = "Any Destination";
  //             option.id = "Any Destination"
  //             destinationDropdown.add(option, 0);
  //
  //             for(var cities in newDestinationArray){
  //               var option = document.createElement('option');
  //               option.text = newDestinationArray[cities];
  //               option.value = newDestinationArray[cities];
  //               option.id = newDestinationArray[cities];
  //               destinationDropdown.appendChild(option, 0);
  //             }
  //             if(str == "Any Departure"){
  //               destinationDropdown.selectedIndex = destinationDropdown.options.namedItem(selectedDesitinationValue).index;
  //             }
  //           }
  //         }
  //       }
  //       xmlhttp.open("GET","searchFlights.php?departDropdown=1&departure="+str+"&destination="+selectedDesitinationValue,true);
  //
  //       xmlhttp.send();
  // }
  //
  // function destinationChange(str){
  //
  //   var selectedDeparture = document.getElementById("departFrom");
  //   var selectedDepartureValue = selectedDeparture.options[selectedDeparture.selectedIndex].value;
  //
  //     if (window.XMLHttpRequest) {
  //           // code for IE7+, Firefox, Chrome, Opera, Safari
  //           xmlhttp = new XMLHttpRequest();
  //
  //       } else {
  //           // code for IE6, IE5
  //           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  //       }
  //       xmlhttp.onreadystatechange = function() {
  //         if (this.readyState == 4 && this.status == 200) {
  //           // document.getElementById("txtHint").innerHTML = this.responseText;
  //           if(this.responseText != "No Change Required"){
  //             var newDepartureArray = this.responseText.split(',');
  //             console.log(newDepartureArray);
  //             var departureDropdown = document.getElementById("departFrom");
  //             $('#departFrom').empty()
  //
  //             var option = document.createElement('option');
  //             option.text = "Any Departure";
  //             option.value = "Any Departure";
  //             option.id = "Any Departure"
  //             departureDropdown.add(option, 0);
  //
  //             for(var cities in newDepartureArray){
  //               var option = document.createElement('option');
  //               option.text = newDepartureArray[cities];
  //               option.value = newDepartureArray[cities];
  //               option.id = newDepartureArray[cities];
  //               departureDropdown.appendChild(option, 0);
  //             }
  //
  //             if(str == "Any Destination"){
  //               departureDropdown.selectedIndex = departureDropdown.options.namedItem(selectedDepartureValue).index;
  //             }
  //
  //           }
  //         }
  //       }
  //       xmlhttp.open("GET","searchFlights.php?destinationDropdown=1&destination="+str+"&departure="+selectedDepartureValue,true);
  //
  //       xmlhttp.send();
  //
  // }


</script>

  <body>

    <!-- Fixed navbar -->
    <?php
      include('navbar.php');
    ?>

    <div class="container">
      <div class="col-md-12">
        <h1>Search for a flight</h2><br/><br/>
      </div>

      <div class="col-md-2">
      </div>

    <form class="form-inline" action="searchFlights.php" method="POST">
      <input type="hidden" name="formSubmit" value="1"/>
      <div class="col-md-8">
        <div class="col-md-6">
          <div class="form-group">
            <label for="departFrom">Depart From:</label>
             <span id="txtHint"></span>
            <select class="form-control" name="departFrom" id="departFrom">
              <option id="selectDeparture" value="selectDeparture" selected>Please Select a Departure City</option>
              <?php  foreach ($departures as $dep) { echo "<option id=" . $dep . ">" . $dep . "</option>";}?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="destination">Destination</label>
            <select class="form-control" name="destination" id="destination">
              <option id="selectDestination" value="selectDestination" selected>Please Select a Destination City</option>
              <?php  foreach ($destination as $dest) { echo "<option id=" . $dest . ">" . $dest . "</option>";}?>
            </select>
          </div>
        </div>
      </div><br/>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary pull-right">Search</button>
      </div>

      </form>




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
