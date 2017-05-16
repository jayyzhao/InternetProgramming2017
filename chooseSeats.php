<?php
session_start();
echo "<html>";
include('header.php');
include('config/database.php');
include('navbar.php');

$_SESSION['currentFlights'] = $_POST['options'];
?>
<script>

function getSum(total, num) {
    return total + num;
}

function checkSeats(numberOfFlights){

  var numberSeatsTotalFlights = [];
  var rowAChecked = false;
  var rowBChecked = false;
  var rowCChecked = false;
  var rowDChecked = false;
  var rowEChecked = false;

  for(i=1; i <= numberOfFlights; i++){
    numberSeatsTotalFlights[i] = 0;
    //Check Row A
    var rowA = document.getElementsByName("flight_" + i + "_row_a[]");
    var rowB = document.getElementsByName("flight_" + i + "_row_b[]");
    var rowC = document.getElementsByName("flight_" + i + "_row_c[]");
    var rowD = document.getElementsByName("flight_" + i + "_row_d[]");
    var rowE = document.getElementsByName("flight_" + i + "_row_e[]");

    for(var j=0, n=rowA.length;j<n;j++) {
      if(rowA[j].checked){
          rowAChecked = true;
      }
    }
    if(rowAChecked){
      numberSeatsTotalFlights[i]++
    }

    for(var j=0, n=rowB.length;j<n;j++) {
      if(rowB[j].checked){
          rowBChecked = true;
      }
    }
    if(rowBChecked){
      numberSeatsTotalFlights[i]++
    }

    for(var j=0, n=rowC.length;j<n;j++) {
      if(rowC[j].checked){
          rowCChecked = true;
      }
    }
    if(rowCChecked){
      numberSeatsTotalFlights[i]++
    }

    for(var j=0, n=rowD.length;j<n;j++) {
      if(rowD[j].checked){
          rowDChecked = true;
      }
    }
    if(rowDChecked){
      numberSeatsTotalFlights[i]++
    }

    for(var j=0, n=rowE.length;j<n;j++) {
      if(rowE[j].checked){
          rowEChecked = true;
      }
    }
    if(rowEChecked){
      numberSeatsTotalFlights[i]++
    }

    rowAChecked = false;
    rowBChecked = false;
    rowCChecked = false;
    rowDChecked = false;
    rowEChecked = false;

  }

    for(i=1; i <= numberOfFlights; i++){
      document.getElementById('numberOfSeats_' + i).innerHTML = numberSeatsTotalFlights[i];
      document.getElementById('totalNumberOfSeats').innerHTML = numberSeatsTotalFlights.reduce(getSum);
    }


  console.log(numberSeatsTotalFlights);


}

function addToBooking(){
  var totalFlights = document.getElementById('totalFlights').value;

  var totalSeatsCheck = false;

  for(i=1; i<=totalFlights; i++){

    if(document.getElementById('numberOfSeats_' + i).innerHTML > 0 && i == 1){
      totalSeatsCheck = true;
    }
    else if(document.getElementById('numberOfSeats_' + i).innerHTML > 0 && totalSeatsCheck == false){
      totalSeatsCheck = false;
    }
    else if(document.getElementById('numberOfSeats_' + i).innerHTML > 0 && totalSeatsCheck == true){
      totalSeatsCheck = true;
    }
    else{
      totalSeatsCheck = false;
    }

  }


  if(totalSeatsCheck){
    var form=document.getElementById('searchFlights');
    form.action='bookings.php';
    form.submit();
    form.action='payment.php';
  }
  else{
    alert("Please Select a Seat for Each Flight");
  }

}
</script>

 <div class="page-content col-md-10">
   <div class="header">Personal Details</div>
    <div class="content">Please complete your details</div>
   <div class="col-md-12">
    <form class="form-inline" id="searchFlights" action="payment.php" method="POST">
   <?php
      $i = 1;
      foreach ($_POST['options'] as $flights){
        $flightDetails = explode(",", $flights);
        echo '<div class="col-md-12">
                <h3>Flight #' . $i . ' - From: ' . $flightDetails[0] . ' To: ' . $flightDetails[1] . ' Price: $' . $flightDetails[2] . '</h3><br/><br/>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <th style="text-align:center">Row A</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_a[]" value="selectTicket" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_a[]" value="child" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_a[]" value="wheelchair" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_a[]" value="specialDiet" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row B</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_b[]" value="selectTicket" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_b[]" value="child" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_b[]" value="wheelchair" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_b[]" value="specialDiet" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row C</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_c[]" value="selectTicket" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_c[]" value="child" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_c[]" value="wheelchair" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_c[]" value="specialDiet" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row D</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_d[]" value="selectTicket" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_d[]" value="child" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_d[]" value="wheelchair" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_d[]" value="specialDiet" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row E</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_e[]" value="selectTicket" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_e[]" value="child" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_e[]" value="wheelchair" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="flight_' . $i . '_row_e[]" value="specialDiet" onchange="checkSeats('. sizeOf($_POST['options']) .')"></label> Special Diet</div></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="col-md-12">
                    Number of Seats for this flight: <span id="numberOfSeats_' . $i . '" class="numberOfSeats">0</span>
                  </div>
                </div>


              </div>';

        $i++;

      }
      echo '<input type="hidden" id="totalFlights" name="totalFlights" value="'. sizeOf($_POST['options'])   . '"/>';
      echo '<input type="hidden" id="bookingid" name="bookingid" value="'. rand()   . '"/>';
   ?><br/>
   <div class="totalSeats">
     Total Number of Seat: <span id="totalNumberOfSeats" class="numberOfSeats">0</span>
   </div>
   <button type="button" onclick="return addToBooking();" class="btn btn-primary pull-right">Add to Booking</button>
 </form>
 </div>
   <div class="col-md-2">
   </div>
 </div>
