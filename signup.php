<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        include 'partials/_dbconnect.php';
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];


        $existSql = "SELECT * FROM `users` WHERE username= '$username'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            $showError = "Username already exists";
        }
        else {
            if (($password == $cpassword)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`username`, `email`, `password`, `dt`) VALUES ('$username','$email', '$hash', current_timestamp());";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert = true;
                }
            }
            else {
                $showError = "Password do not match";
            }
        }

    }
}

?>