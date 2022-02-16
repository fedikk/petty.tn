<?php
$email= $_POST['email'];
$password= $_POST['password'];
$conn = new mysqli("localhost","root","","register");

if ($conn->connect_error){
    die("failed to onnect:".$conn->connect_error);
} else {
    $stmt= $conn->prepare("Select * From registration Where email= ? ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if ($stmt_result -> num_rows > 0) {
        $data = $stmt_result -> fetch_assoc();
        if ($data['password'] === $password) {
            header('location:home.html');
        } else {
            header('location:register.html');
        }
    }
    else {
        header('location:register.html');  
        
    }
}

?>