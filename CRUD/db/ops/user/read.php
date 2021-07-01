<?php 
    include("../../conn.php");

    function make_table($inbody){
        $tb = "<table class = 'table'>";
            $tb .=  "<thead>";
                $tb .= "<tr>";
                    $tb .= "<th scope = 'col'>Name</th>";
                    $tb .=  "<th scope = 'col'>D.O.B.</th>";
                    $tb .=  "<th scope = 'col'>Email</th>";
                    $tb .=  "<th scope = 'col'>Username</th>";
                    $tb .=  "<th scope = 'col'>Joined</th>";
                $tb .= "</tr>";
            $tb .= "</thead>";
            $tb .= "<tbody>";
                $tb .= $inbody;
            $tb .= "</tbody>";
        $tb .= "</table>";
        return $tb;
    }

    function edt_del_buttons($id){
        $edtdel = '<td>';
            $edtdel .= '<button class = "btn btn-primary rounded-circle edtdel" onclick = "fillForm('.$id.');">';
                $edtdel .= '<i class="fa fa-address-book fa-xs" aria-hidden="true"></i>';
            $edtdel .= '</button>';
            $edtdel .= '<button class = "btn btn-danger rounded-circle edtupd" onclick = "deleteUser('.$id.');"">';
                $edtdel .= '<i class="fa fa-trash fa-xs" aria-hidden="true"></i>';
            $edtdel .= '</button>';
        $edtdel .= '</td>';
        return $edtdel;
    }

    function sort_me($sortby){
        if($sortby === null){
            return "";
        } else {
            switch($sortby){
                case "ddlfirstname":
                    return " ORDER BY firstname ASC";
                case "ddllastname":
                    return " ORDER BY lastname ASC";
                case "ddldob":
                    return " ORDER BY dateofbirth ASC";
                case "ddldatejoined":
                    return " ORDER BY datejoined ASC";
            }
        }
    }

    function get_users(){
        $conn = connect_me();
        $getusers_sql = "SELECT * FROM users AS u INNER JOIN personalinfo AS per ON u.id = per.id";
        $getusers_sql .= sort_me(@$_GET["sortby"]);

        $result = mysqli_query($conn, $getusers_sql);
        $rowdata = "";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $rowdata .= "<tr>";
                    $rowdata .= "<td>".$row["firstname"]." ".$row["lastname"]."</td>";
                    $rowdata .= "<td>".date("d. m. Y", strtotime($row["dateofbirth"]))."</td>";
                    $rowdata .= "<td>".$row["email"]."</td>";
                    $rowdata .= "<td>".$row["username"]."</td>";
                    $rowdata .= "<td>".date("d. m. Y", strtotime($row["datejoined"]))."<br/>".date("h:i:sa", strtotime($row["datejoined"]))."</td>";
                    $rowdata .= edt_del_buttons($row["userid"]);
                $rowdata .= "</tr>";
            }
        } else {
            $rowdata .= "<tr><td>No rows found!</tr></td>";
        }

        echo make_table($rowdata);
        mysqli_close($conn);
    }

    get_users();
?>