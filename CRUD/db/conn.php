<?php 
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DB", "w3crud");

    function connect_me(){
        $conn = mysqli_connect(HOST, USER, PASS) OR DIE("Could not connect..");
        if($conn){
            $dbExist = "SHOW DATABASES LIKE '".DB."'";
            $rows = mysqli_num_rows(mysqli_query($conn, $dbExist));
            if($rows > 0){
                mysqli_close($conn);
                $conn = mysqli_connect(HOST, USER, PASS, DB) OR DIE("Could not connect..");
            } else {
                $sql = "CREATE DATABASE ".DB;
                if(!mysqli_query($conn, $sql)){
                    echo "<p>Error! - ".mysqli_error($conn);
                }
            }
        }
        return $conn;
    }
?>