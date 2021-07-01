<?php 
    include("../../conn.php");

    function delete_user(){
        $conn = connect_me();
        $userinfo_del = "DELETE FROM users WHERE id = ".$_REQUEST["userid"];
        $personalinfo_del = "DELETE FROM personalinfo WHERE userid = ".$_REQUEST["userid"];
        
        mysqli_query($conn, $userinfo_del);
        mysqli_query($conn, $personalinfo_del);
        mysqli_close($conn);
    }

    delete_user();
?>