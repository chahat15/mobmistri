<?php
    echo'<script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
    (function(){
        emailjs.init("user_xRd7Oaa2e6MG9NLMGyfkP");
    })();
    </script>';

    session_start();
    $conn = mysqli_connect('localhost','root');
    if ($conn) {
     # code...
        echo "connection succesful";
    }
    else{
        echo "no connection";
    }
    
    mysqli_select_db($conn,'Email_verify');

    $Phone_name = $_POST['Phone_name'];
    $Phone_problem = $_POST['Phone_problem'];
    $Name = $_POST['Name'];
    $Contact_no = $_POST['Contact_no'];
    $User_email = $_POST['User_email'];
    $User_Address = $_POST['User_Address'];
    $Repair_date = $_POST['Repair_date'];
    $spare_phone_require = $_POST['spare_phone_require'];

    if(empty($Phone_name) || empty($Phone_problem) || empty($Name) || empty($Contact_no) || empty($User_email) || empty($User_Address) || empty($Repair_date) || empty($spare_phone_require))
    {
        //header("LOCATION : Login_digi.php");
    }
    else
    {

        echo("<script type='text/javascript'> var em = '".$User_email."'; </script>");
        echo("<script type='text/javascript'> var fn = '".$Name."'; </script>");
        
        $otp1=rand(111111,999999);
        echo("<script type='text/javascript'> var a = '".$otp1."'; </script>");
        echo('<script type="text/javascript">
					emailjs.send("gmail", "template_rIiUvkMl", {"to_email":em ,"from_name":"Mobmistri Team","to_name":fn,"message_html":a});
                    </script>');
        
        $qry = "INSERT INTO User_email_verify VALUES ('$User_email','$otp1')";
        mysqli_query($conn,$qry);
        $_SESSION['Email']= $User_email;
        $_SESSION['Name']= $Name;
        $_SESSION['Phone_Name']= $Phone_name;
        $_SESSION['Phone_Problem']= $Phone_problem;
        $_SESSION['User_Address']= $User_Address;
        $_SESSION['spare_phone_require']= $spare_phone_require;
        $_SESSION['Repair_date']= $Repair_date;
        $_SESSION['Contact_no']= $Contact_no;
        echo '<script type="text/javascript"> alert("Please check your email and confirm the OTP."); window.location.href = "confirm_OTP.php";</script>';	
        mysqli_select_db($conn,'Phone_repair');
        
        $sql = "INSERT INTO Customers_info(Phone_name,Phone_problem,User_name,User_Contact_no,User_email,User_Address,Repair_date,spare_phone_require) VALUES('$Phone_name','$Phone_problem','$Name','$Contact_no','$User_email','$User_Address','$Repair_date','$spare_phone_require');";
        mysqli_query($conn,$sql);
        echo '<script type="text/javascript"> alert("Subbmittes"); window.location.href = "index (1).html";</script>';

    }
?>