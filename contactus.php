<?php
    $name = $_POST['name'];
    $email= $_POST['email'];
    $subject = $_POST['subject'];
    $country = $_POST['country'];
    //database connection
    $conn = new mysqli("localhost","root","","register");
    if ($conn->connect_error){
        die('connect error:'.$conn->connect_errno());
    }
    else {
        $stmt= $conn->prepare("Select email From messages Where email=? Limit 1");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        if($rnum==0){
            $stmt = $conn->prepare("insert into messages (name
        ,email,subject,country) values(?,?,?,?);");
        $stmt->bind_param("ssss",$name,$email,$subject,$country);
        $stmt->execute();
        header('location:home.html');
        }
        else {
            echo "someone already registered with this email";
            //header('location:register1.html');
        }
        $stmt->close();
        $conn->close(); 
    }
?>