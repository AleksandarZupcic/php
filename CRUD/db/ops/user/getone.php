<?php 
    include("../../conn.php");

    function get_one_user(){
        $conn = connect_me();
        $getuser_sql = "SELECT * FROM users AS u INNER JOIN personalinfo AS per ON u.id = per.id WHERE u.id = ".$_REQUEST['userid'];
        $res = mysqli_query($conn, $getuser_sql);
        if($res){
            mysqli_close($conn);
            header("Content-type: application/json");
            echo json_encode(mysqli_fetch_assoc($res));
        } else {
            mysqli_close($conn);
        }
    }

    get_one_user();