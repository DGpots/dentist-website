<?php

include "./conn.php";

if(isset($_POST['appointment'])){
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $date  = trim($_POST['date']);

    $stmt = $conn->prepare("INSERT INTO `appt`(`name`, `email`, `phone`, `date`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $email, $phone, $date);
    $res = $stmt->execute();
    $stmt->close();

    if($res)
    {
        $msg = "your appointment booked!";
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='./index.php';
            </script>");
    }
    else{
        $msg = "Failed to book your appointment";
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('$msg');
            window.location.href='./index.php';
            </script>");
    }
}

?>
