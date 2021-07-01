<?php 
    include("../../conn.php");

    function update_user($userid, $fname, $lname, $dob, $email, $user, $pass){
        $conn = connect_me();

        $userinfo_upd = "UPDATE users SET email='$email', username='$user', pword='$pass' WHERE id = ".$userid;

        if(mysqli_query($conn, $userinfo_upd)){
            echo "blablabla";
        }

        $personalinfo_upd = "UPDATE personalinfo SET firstname='$fname',lastname='$lname',dateofbirth='$dob' WHERE id = ".$userid;

        if(mysqli_query($conn, $personalinfo_upd)){
            echo "<p>User successfully updated!</p>";
        } else {
            echo "<p> Error! => ".mysqli_error($conn)."</p>";
        }

        mysqli_close($conn);
    }

    update_user(
        $_POST["userid"],
        $_POST["firstname"], 
        $_POST["lastname"], 
        $_POST["dob"],
        $_POST["email"], 
        $_POST["username"], 
        $_POST["password"]
    );
?>