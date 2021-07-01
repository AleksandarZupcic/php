<?php 
    include("../../conn.php");

    function create_user($fname, $lname, $dob, $datejoined, $email, $user, $pass){
        $conn = connect_me();
        $pass = md5($pass);

        $userinfo_ins = "INSERT INTO users (email, username, pword, datejoined) VALUES (
            '$email',
            '$user',
            '$pass',
            '$datejoined'
        )";

        if(mysqli_query($conn, $userinfo_ins)){
            $user_id = mysqli_insert_id($conn);
        } else {
            echo "<p> Error! => ".mysqli_error($conn)."</p>";
            mysqli_close($conn);
            return;
        }

        $personalinfo_ins = "INSERT INTO personalinfo (firstname, lastname, dateofbirth, userid) VALUES (
            '$fname',
            '$lname',
            '$dob',
            $user_id
        )";
        if(mysqli_query($conn, $personalinfo_ins)){
            echo "<p>User successfully inserted!</p>";
        } else {
            echo "<p> Error! => ".mysqli_error($conn)."</p>";
        }

        mysqli_close($conn);
    }
    
    create_user(
        $_POST["firstname"], 
        $_POST["lastname"], 
        $_POST["dob"], 
        date("Y-m-d H:i:s"), 
        $_POST["email"], 
        $_POST["username"], 
        $_POST["password"]
    );
?>