<?php
  session_start();
  echo "<html>";
  include('header.php');
?>

<body>

  <!-- Fixed navbar -->
  <?php
    include('navbar.php');


    if(isset($_POST['submit'])){
    $to = "InternetProgrammingAssignment@student.uts.edu.au"; // this is your Email address
    //var_dump($_POST);
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $subject = "Contact Us - " . $_POST['subject'];
    $subject2 = "Copy of your form submission - " . $_POST['subject'];
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    //mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender

    echo "Mail Sent. Thank you " . $firstname . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }

  ?>

  <div class="page-content col-md-10">
    <div class="header" style="text-align: center;">Contact Us</div>
 		<div class="content" style="text-align: center;">Have a question? Send us an enquiry and we'll answer.</div>
    <div class="well col-md-6">
	 		<form class="contact-us" id="contact-us" name="contact-us"
	 		action=""
	 		method="POST"
	 		>
		 		<div class="form-group">
			 		<div class="datafield firstName col-md-3">
			 			<label>First Name</label>
			 			<input class="form-control" id="firstname" name="firstname" placeholder="First Name" required pattern="([A-Z]|[a-z])+">
			 			<span class="tooltip">Please enter your name</span>
			 		</div>
			 		<div class="datafield lastName col-md-3">
			 			<label>Last Name</label>
			 			<input class="form-control" id="lastname" name="lastname" placeholder="Last Name" required pattern="([A-Z]|[a-z])+">
			 		</div>
			 		<div class="datafield email col-md-6">
			 			<label>Email Address</label>
			 			<input class="form-control" id="email" name="email" type="email" placeholder="Email" required>
			 		</div>
          <div class="datafield lastName col-md-12">
			 			<label>Subject</label>
			 			<input class="form-control" id="subject" name="subject" placeholder="Subject" required>
			 		</div>
          <div class="datafield message col-md-12">
			 			<label>Message</label>
			 			<textarea class="form-control" rows="10" id="message" name="message" type="message" placeholder="Enter your Message" required></textarea>
			 		</div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="Send Email">Send Email</button>
	 		</form>
  </div>
</body>
