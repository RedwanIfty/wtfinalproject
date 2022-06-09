<?php
 session_start();
    $error="";
    $flag=false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    	$Ticket_no=validation($_POST['Ticket_no']);
        $date=validation($_POST['date']);
        if (empty($Ticket_no)) {
            $error1="*Select Ticket Number";
            setcookie ("error1",$error1,time()+ 5,"/");
            header("Location:../View/cancel_booking.php");

        }if (empty($date)) {
            $error2="*Select Date";
            setcookie ("error2",$error2,time()+ 5,"/");
            header("Location:../View/cancel_booking.php");
        }else{ $flag=true;
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="project";
            $conn= new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
            } 
            $sql = "DELETE FROM ticket_info WHERE Ticket_No = ? and Journey_Date = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$Ticket_No,$Journey_Date );
            $Ticket_No="$Ticket_no";
            $Journey_Date ="$date";
            $res = $stmt->execute();
            if ($res) {
                $_SESSION['success']="Reservition Ticket Cancel";
                header("Location:../View/output/cancel_booking_out.php");
                $flag=true;
                echo "Data delete successful";
            }
            else {
                $_SESSION['failed']="Reservition Ticket Cancel";
                header("Location:../View/output/cancel_booking_out.php");
            }
            $conn->close();
        }
    }function validation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }   


 ?>