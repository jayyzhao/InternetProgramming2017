<?php
// ini_set('display_errors', 'On');
// error_reporting(E_ALL);
session_start();
include('config/database.php');

// if(!isset($_REQUEST['departDropdown'])){
//   $_REQUEST['departDropdown'] = 0;
// }
//
// if(!isset($_REQUEST['destinationDropdown'])){
//   $_REQUEST['destinationDropdown'] = 0;
// }
//
// if (isset($_REQUEST['departure']) && isset($_REQUEST['destination'])){
//
//   $departureCity = $_REQUEST['departure'];
//   $destinationCity = $_REQUEST['destination'];
//
//   if($_REQUEST['departDropdown'] == 1) {
//
//
//     if ($departureCity != "Any Departure" && $destinationCity == "Any Destination"){
//
//
//       // $newDestinationSQL = "SELECT DISTINCT to_city FROM poti.flights WHERE from_city = " . $departureCity;
//       // $newDestinationResults = $conn->query($newDestinationSQL);
//       // print_r($newDestinationResults);
//
//       $newDestinationSQL = "SELECT DISTINCT to_city FROM poti.flights WHERE from_city ='" . $departureCity . "'";
//       $newDestinationResults = $conn->query($newDestinationSQL);
//       if($newDestinationResults->num_rows > 0){
//         while($newDestinationRow = $newDestinationResults->fetch_assoc()){
//           $newDestinations[] = $newDestinationRow['to_city'];
//         }
//       }
//       echo implode(",", $newDestinations);
//     }
//     else if ($departureCity == "Any Departure" &&  $destinationCity == "Any Destination"){
//       $newDestinationSQL = "SELECT DISTINCT to_city FROM poti.flights";
//       $newDestinationResults = $conn->query($newDestinationSQL);
//       if($newDestinationResults->num_rows > 0){
//         while($newDestinationRow = $newDestinationResults->fetch_assoc()){
//           $newDestinations[] = $newDestinationRow['to_city'];
//         }
//       }
//       echo implode(",", $newDestinations);
//     }
//     else if($departureCity == "Any Departure"){
//       $newDestinationSQL = "SELECT DISTINCT to_city FROM poti.flights";
//       $newDestinationResults = $conn->query($newDestinationSQL);
//       if($newDestinationResults->num_rows > 0){
//         while($newDestinationRow = $newDestinationResults->fetch_assoc()){
//           $newDestinations[] = $newDestinationRow['to_city'];
//         }
//       }
//       echo implode(",", $newDestinations);
//     }
//     else {
//       echo "No Change Required";
//     }
//
//   }
//
//   if($_REQUEST['destinationDropdown'] == 1) {
//     if ($destinationCity != "Any Destination" && $departureCity == "Any Departure"){
//       $newDepartureSQL = "SELECT DISTINCT from_city FROM poti.flights WHERE to_city ='" . $destinationCity . "'";
//       $newDepartureResults = $conn->query($newDepartureSQL);
//       if($newDepartureResults->num_rows > 0){
//         while($newDepartureRow = $newDepartureResults->fetch_assoc()){
//           $newDepartures[] = $newDepartureRow['from_city'];
//         }
//       }
//       echo implode(",", $newDepartures);
//     }
//     else if ($departureCity == "Any Departure" &&  $destinationCity == "Any Destination"){
//       $newDepartureSQL = "SELECT DISTINCT from_city FROM poti.flights";
//       $newDepartureResults = $conn->query($newDepartureSQL);
//       if($newDepartureResults->num_rows > 0){
//         while($newDepartureRow = $newDepartureResults->fetch_assoc()){
//           $newDepartures[] = $newDepartureRow['from_city'];
//         }
//       }
//       echo implode(",", $newDepartures);
//     }
//     elseif ($destinationCity == "Any Destination"){
//       $newDepartureSQL = "SELECT DISTINCT from_city FROM poti.flights";
//       $newDepartureResults = $conn->query($newDepartureSQL);
//       if($newDepartureResults->num_rows > 0){
//         while($newDepartureRow = $newDepartureResults->fetch_assoc()){
//           $newDepartures[] = $newDepartureRow['from_city'];
//         }
//       }
//       echo implode(",", $newDepartures);
//     }
//     else {
//       echo "No Change Required";
//     }
//
//   }
//
// }

if(isset($_POST['formSubmit'])){
  if($_POST['formSubmit'] == 1){

    echo "<html>";
    include('header.php');
    include('navbar.php');

    echo "<body>";
    echo '<div class="container">
      <div class="col-md-12">
        <h1>Avaliable Flights</h1><br/><br/>

        <div class="col-md-2">
        </div>

        <div class="col-md-8">
          <form class="form-inline" action="chooseSeats.php" method="POST">
          <div class="table-responsive">';

      if($_POST['departFrom'] == "selectDeparture" && $_POST['destination'] == "selectDestination"){
          echo "please choose at least one departure or one destination";

      }
      elseif($_POST['departFrom'] != "selectDeparture" && $_POST['destination'] == "selectDestination") {
        $searchFlightsSQL = "SELECT * FROM poti.flights WHERE from_city ='" . $_POST['departFrom'] . "'";
      }
      elseif($_POST['departFrom'] == "selectDeparture" && $_POST['destination'] != "selectDestination"){
        $searchFlightsSQL = "SELECT * FROM poti.flights WHERE to_city ='" .$_POST['destination'] ."'";
      }
      else{
        $searchFlightsSQL = "SELECT * FROM poti.flights WHERE from_city ='" . $_POST['departFrom'] . "' AND to_city ='" .$_POST['destination'] ."'";
      }

      $searchFlightsResults = $conn->query($searchFlightsSQL);
      if($searchFlightsResults->num_rows > 0){
        echo '
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="text-align:center">From City</th>
              <th  style="text-align:center">To City</th>
              <th  style="text-align:center">Price</th>
              <th  style="text-align:center">Select Flight</th>
            </tr>
          </thead>
          <tbody>
          ';
        $i = 0;
        while($searchFlightsRows = $searchFlightsResults->fetch_assoc()){
          echo '<tr>';
            echo '<td style="text-align:center">' . $searchFlightsRows['from_city'] . '</td>';
            echo '<td style="text-align:center">' . $searchFlightsRows['to_city'] . '</td>';
            echo '<td style="text-align:center"> $' . $searchFlightsRows['price'] . '</td>';
            echo '<td style="text-align:center">';
            echo '<div class="checkbox">';
            echo '<label><input type="checkbox" name="options[]" value="' . $searchFlightsRows['from_city'] . ',' . $searchFlightsRows['to_city'] . ',' . $searchFlightsRows['price'] . '"></label>';
            echo '</div>';
            echo '</td>';
          echo '</tr>';
        }

        echo '
                  <tbody>
                </table>
              </div>
                <div class="col-md-7 col-xs-offset-8">
                  <button type="" class="btn btn-primary">New Search</button>
                  <button type="submit" class="btn btn-primary">Choose Seats</button>
                </div>
              </form>
            </div>
            <div class="col-md-2">
            </div>
          </div>
        </div>';
      }



  }
}

?>
