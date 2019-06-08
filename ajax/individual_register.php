<?php
	include("../include/function.php");
	include("../include/config.php");
	if(isset($_REQUEST['go_techhunt']))
	{
		
		$name=trim($_REQUEST['name']);
		$email=trim($_REQUEST['email']);
		$mobile=trim($_REQUEST['mobile']);
		$institute=trim($_REQUEST['institute']);
		$tsize=trim($_REQUEST['tsize']);
		$bkash=trim($_REQUEST['bkash']);
		$bkash_trx=trim($_REQUEST['bkash_trx']);
		$image_name=trim($_REQUEST['image_name']);
		$id_card_name=trim($_REQUEST['id_card_name']);
		$status='inactive';
		$join_time=get_time();
		$event_id=trim($_REQUEST['event_id']);
		try
		{
			$stmt = $conn->prepare("Insert into individual_details(join_date, bkash_no, bkash_trx, event_id, name, tsize, institute, email, mobile, image, id_card, status) VALUES('$join_time','$bkash','$bkash_trx','$event_id','$name','$tsize','$institute','$email','$mobile','$image_name','$id_card_name','$status')");
			$stmt->execute();
			
			
			$to=$email;
			$subject='TechHunt '.Date("Y").' Registration';
			$msg="Hi ".$name.",<br><br>Greetings from TechHunt<br><img src='https://techhuntbd.org/images/system/techhunt_logo_title.png' height='200' width='500'><br><br>Your Registraion process is completed. Please wait for the final confirmation. When it will be done we will sent you the confirmation email and your status in our website will be shown as Accepted.<br><br><br> ";
			$msg=$msg."We are so much glad that you are participating in this year TechHunt ".Date("Y").".<br>Stay connected at: https://www.techhuntbd.org";
			sent_mail($to,$subject,$msg);
			
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

?>