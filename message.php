<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Find PG</title>

</head>

<body>
	<form name="frm" action="" method="post">
		<table border="1" align="center">
			<tr>
				<td>Enter Mail</td>
				<td><input type="text" id="mail" name="email" placeholder="Email Address"/>	</td>
			</tr>
			<tr>
				<td>Message</td>
				<td>
					<textarea name="txtmessage" placeholder="message"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
        </table>
	</form>

<?php
	if(isset($_REQUEST['submit'])){
		
	include('include/SMTPClass.php');
	include('include/PHPMailer.class.php');
	include('include/SMTP.class.php');
				
		
		if($_REQUEST['email']!='')
			{
				$body = "<html>
							<body>
								<p>Hello,</p>
								<p>Your message :</p>
								<p>".$_REQUEST["txtmessage"]."</p>
								<p>Thank You ...</p>
							</body>
						</html>";
				//print_r($body);die();
		
				$mail = new PHPMailer();
				$mail->IsSMTP(); // telling the class to use SMTP
				 
				$mail->Host = 'smtp.gmail.com'; // SMTP server
				$mail->Port = 465;
				
							
				$mail->Username   = 'phpredstorm@gmail.com'; 
				$mail->Password   = '#@#098765#@#';
//				$mail->Auth = true;
				$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and   test
				$mail->mail = $mail;
				$mail->From = 'phpredstorm@gmail.com';
				$mail->FromName = 'Forgot Password'; 
				$mail->Subject = 'Forgotten Password ';
				$mail->AddAddress($_REQUEST['email']);
				$mail->MsgHTML($body);
				
				if($mail->send())
				{					
				
					echo "<script>alert('Your Message has been sent to your registered Email-id.')</script>"; 
				}
				else
				{
					echo "<script>alert('Error in sending email, Please try again.')</script>";
				}
			}
			else
			{
				echo "<script>alert('Please Enter Email.')</script>";
			}
	}
	
?>
</body>
</html>