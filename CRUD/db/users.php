<?php 
    include("conn.php");
    define("TBNAME", "users");
    
    function users_cre(){
        $conn = connect_me();
        $row_check = mysqli_num_rows(mysqli_query($conn, "SHOW TABLES LIKE '".TBNAME."'"));
        if($row_check > 0){
            echo "<p>Table '".TBNAME."' exists already.</p>";
            mysqli_close($conn);
            return;
        }

        $col_id = "id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY";
        $col_email = "email TEXT UNIQUE NOT NULL";
        $col_username = "username VARCHAR(20) UNIQUE NOT NULL";
        $col_pword = "pword VARCHAR(50) UNIQUE NOT NULL";
        $col_datejoined = "datejoined TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        
        $create_tb = "CREATE TABLE ".TBNAME."($col_id, $col_email, $col_username, $col_pword, $col_datejoined)";
        if(mysqli_query($conn, $create_tb)){
            echo "<p>Table '".TBNAME."' created successfully!</p>";
        } else {
            echo "<p>Error! => ".mysqli_error($conn)."</p>";
        }

        mysqli_close($conn);
    }

    users_cre();
?>