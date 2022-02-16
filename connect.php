<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $username = $_POST['username'];
    $sexe = $_POST['sexe'];
    //database connection
    $conn = new mysqli("localhost","root","","register");
    if ($conn->connect_error){
        die('connect error:'.$conn->connect_errno());
    }
    else {
        $stmt= $conn->prepare("Select email From registration Where email=? Limit 1");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        if($rnum==0){
            $stmt = $conn->prepare("insert into registration (firstname
        ,lastname,email,password,number,username,sexe) values(?,?,?,?,?,?,?);");
        $stmt->bind_param("ssssiss",$firstname,$lastname,$email,$password,$number,$username,$sexe);
        $stmt->execute();
        echo "new record";
        }
        else {
            echo "someone already registered with this email";
            //header('location:register1.html');
        }
        $stmt->close();
        $conn->close(); 
    }
?>