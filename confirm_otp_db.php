<?php
echo'<script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
    (function(){
        emailjs.init("user_xRd7Oaa2e6MG9NLMGyfkP");
    })();
    </script>';
$conn = mysqli_connect('localhost','root');
//session_start();
if(!$conn)
{
	echo "error connecting to database";
}
mysqli_select_db($conn,'Email_verify');

include "Insert_into_db.php"; 
if(isset($_POST['Submit']))
{
	$email = $_SESSION['Email'];
	//echo("<script type='text/javascript'> alert('".$_SESSION['Email']."'+'".$email."'); window.location.href = 'index (1).html';</script>");
	$otp2 = $_POST['otp'];
	if(empty($otp2))
	{
		$query = "DELETE FROM User_email_verify WHERE User_Email='$email';";
		mysqli_query($conn,$query);

		mysqli_select_db($conn,'Phone_repair');
		$qury = "DELETE FROM Customers_info WHERE User_Email='$email';";
		mysqli_query($conn,$qury);
		echo("<script type='text/javascript'> alert('Fill details again'); window.location.href = 'index (1).html';</script>");
	}
	$qry1 = "SELECT * FROM User_email_verify WHERE User_Email='$email'" ;
	$result=mysqli_query($conn,$qry1);
	$fotp = mysqli_fetch_row($result);
	if($otp2==$fotp['1']){
		$qury = "DELETE FROM User_email_verify WHERE User_Email='$email';";
		mysqli_query($conn,$qury);

		$Name = $_SESSION['Name'];
		$Phone_Name = $_SESSION['Phone_Name'];
		$Phone_Problem = $_SESSION['Phone_Problem'];
		$User_Address = $_SESSION['User_Address'];
		$spare_phone_require = $_SESSION['spare_phone_require'];
		$Repair_date = $_SESSION['Repair_date'];
		$Contact_no = $_SESSION['Contact_no'];

		echo("<script type='text/javascript'> var em = '".$email."'; </script>");
		echo("<script type='text/javascript'> var fn = '".$Name."'; </script>");
		echo("<script type='text/javascript'> var a = 'Phone name: ".$Phone_Name."\nPhone_Problem: ".$Phone_Problem."\nUser Address: ".$User_Address."\nSpare Phone Requirement: ".$spare_phone_require."\nUser Address: ".$User_Address."\nRepair Date: ".$Repair_date."\nContact no: ".$Contact_no."\n'; </script>");

        echo('<script type="text/javascript">
					emailjs.send("gmail", "information_template", {"to_email":em ,"from_name":"Mobmistri Team","to_name":fn,"message_html":a});
					</script>');
			
		echo("<script type='text/javascript'> alert('Details Submitted'); window.location.href = 'index (1).html';</script>");
	}
	else{
		echo '<script type="text/javascript"> alert("Wrong OTP entered! Can not register!"); window.location.href = "confirm_OTP.php";</script>';
	}
}
else{
	$email = $_SESSION['Email'];
	//echo("<script type='text/javascript'> alert('".$_SESSION['Email']."'+'".$email."'); window.location.href = 'index (1).html';</script>");
	$query = "DELETE FROM User_email_verify WHERE User_Email='$email';";
	mysqli_query($conn,$query);

	mysqli_select_db($conn,'Phone_repair');
	$qury = "DELETE FROM Customers_info WHERE User_Email='$email';";
	mysqli_query($conn,$qury);

	echo("<script type='text/javascript'> alert('Fill details again'); window.location.href = 'index (1).html';</script>");
}
?>