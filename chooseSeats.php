<?php
session_start();
echo "<html>";
include('header.php');
include('config/database.php');
include('navbar.php');
?>

 <div class="container">
   <div class="col-md-12">
     <h1>Choose Your Seats</h2><br/><br/>
   </div>

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
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row B</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row C</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row D</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Special Diet</div></td>
                      </tr>
                      <tr>
                        <th style="text-align:center">Row E</th>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Select Ticket</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Child</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Wheelchair</div></td>
                        <td><div class="checkbox"><label><input type="checkbox" name="options[]" value=""></label> Special Diet</div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>



              </div>';

        $i++;

      }
   ?>


   <div class="col-md-2">
   </div>
 </div>
