<?php 
    include("conn.php");
    define("TBNAME", "personalinfo");
    
    function personalinfo_cre(){
        $conn = connect_me();
        $row_check = mysqli_num_rows(mysqli_query($conn, "SHOW TABLES LIKE '".TBNAME."'"));
        if($row_check > 0){
            echo "<p>Table '".TBNAME."' exists already.</p>";
            mysqli_close($conn);
            return;
        }

        $col_id = "id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY";
        $col_fname = "firstname VARCHAR(50) NOT NULL";
        $col_lname = "lastname VARCHAR(50) NOT NULL";
        $col_dob = "dateofbirth DATETIME NOT NULL";
        $col_userid = "userid INT UNSIGNED UNIQUE NOT NULL";
        
        $create_tb = "CREATE TABLE ".TBNAME."($col_id, $col_fname, $col_lname, $col_dob, $col_userid)";
        if(mysqli_query($conn, $create_tb)){
            echo "<p>Table '".TBNAME."' created successfully!</p>";
        } else {
            echo "<p>Error! => ".mysqli_error($conn)."</p>";
        }

        mysqli_close($conn);
    }

    personalinfo_cre();
?>