<?php

session_start();
if(!isset($_SESSION['Email']))
{
  header('location: index (1).html');
}

?>
<!Doctype html>
<html>
<head>
    <style type="text/css">
        h1 {
            position:absolute;
            top:10px;
            left:600px;
            color:red;
            font-size:30px;
        }
    </style>
    <script type="text/javascript">
        function countdowntimer(){
                var timeleft = 20;
                var downloadTimer = setInterval(function(){
                timeleft--;
                document.getElementById("countdowntimer").textContent = timeleft;
                if(timeleft==0){
                //yha pr apni saari conditions daal de aur neeche wali line mein a.html ki jagah vhi page daal de jis pr ye code hai
                                window.location.href="confirm_otp_db.php";
                }
                if(timeleft <= 0)
                                clearInterval(downloadTimer);
                                },1000);
            }

    </script>
</head>
<body>
<script type="text/javascript">
                countdowntimer();
</script>
<h1 id="countdowntimer" ></h1>
<div class="parallex1 text-center text-dark ">
			<h1>Please confirm email:  <?php echo $_SESSION['Email']; ?> </h1>
		</div>
<form name="confirm_otp" action="confirm_otp_db.php" method="POST">
	<p>Enter OTP:</p>
	<input type="text" name="otp" placeholder="Enter Your OTP here">  
	<button class="button" name ="Submit" id="sb">Submit</button>            
</form>

</body>
</html>