<?php
    
    function getIndividualDetails($id,$table,$clause)
    {
        global $conn;
        $sql="select * from `$table` where `$clause` = '$id' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();        
        return $row;
    }

    /*Common function with where out where get all data from query */
    function getAllData($table)
    {
        global $conn;
        $sql="select * from `$table` ";
        $result = $conn->query($sql);         
        return $result;
    }

     /*Common function with where and check active status for get all records*/
    function getAllDataCheckActive($table,$status)
    {
        global $conn;
        $sql="select * from `$table` WHERE `status` = '$status' ORDER BY id DESC  ";
        $result = $conn->query($sql);         
        return $result;
    }

    function getAllDataCheckWithOurOrder($table,$status)
    {
        global $conn;
        $sql="select * from `$table` WHERE `status` = '$status' ";
        $result = $conn->query($sql);         
        return $result;
    }

    /*Common function with where clause */
    function getAllDataWhere($table,$clause,$id)
    {
        global $conn;
        $sql="select * from `$table` WHERE `$clause` = '$id' ";
        $result = $conn->query($sql);        
        return $result;
    }

    /* Common function for get data using limit */
     function getAllDataWithLimit($table,$limit)
    {
        global $conn;
        $sql="select * from `$table` ORDER BY id DESC LIMIT 0,4 ";
        $result = $conn->query($sql);            
        return $result;
    }

    /* Common function for get count for rows */
     function getRowsCount($table,$userId)
    {
        global $conn;
        $sql="select * from `$table` WHERE `user_id` = '$userId' ";
        $result = $conn->query($sql);
        $noRows = $result->num_rows;        
        return $noRows;
    }

    /* encrypt and decrypt password */
     function encryptPassword($pwd)
    {
        $key = "123";
        $admin_pwd = bin2hex(openssl_encrypt($pwd,'AES-128-CBC', $key));    
        return $admin_pwd;
    }

    function decryptPassword($admin_password)
    {
        $key = "123";
        $admin_pwd = openssl_decrypt(hex2bin($admin_password),'AES-128-CBC',$key);  
        return $admin_pwd;
    }

    function getImageUnlink($val,$table,$clause,$id,$target_dir){
        global $conn;
        $getBanner = "SELECT $val FROM $table WHERE $clause='$id' ";
        $getRes = $conn->query($getBanner);
        $row = $getRes->fetch_assoc();
        $img = $row['banner'];
        $path = $target_dir.$img.'';
        chown($path, 666);
        if (unlink($path)) {
            return 1;
        } else {
            return 0;
        }
    }
    
?>
