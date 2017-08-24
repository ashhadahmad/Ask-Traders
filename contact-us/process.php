<?php
	
	if($_SERVER['REQUEST_METHOD'] == "POST"):

		$input_name = $_POST['name'];
		$input_company = $_POST['company'];
		$input_email = $_POST['email'];
		$input_phone = $_POST['phone'];
		$input_message = $_POST['message'];
 		
 		$conn = mysqli_connect("localhost","root","1476","contact") or die("Could not connect");

 		$sql = "INSERT INTO information ". "(Name, Company, Email, Phone, Message)"." VALUES ".
 		"(\"".$input_name."\", \"".$input_company."\", \"".$input_email."\", \"".$input_phone."\", \"".$input_message."\")";

 		if($conn->query($sql) === true){
 			echo "Data Inserted";

			$subject = "My subject";
			$txt = "Hello world!";
			$headers = "From: webmaster@localhost.com" . "\r\n" ."CC: himanshu.dtu.se@gmail.com";

			mail($input_email,$subject,$txt,$headers);

 			echo "Email Sent";
			header("Location: index.html");
			die();
 		}else {
 			echo "Error: " . $sql . "<br>" . $conn->error;
 		}

 		$conn->close();

 	endif;


?>