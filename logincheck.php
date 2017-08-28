<?php  
    if(isset($_POST["submit"]))  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else  
        {  
            $db = mysqli_connect("localhost","admin","admin") or die('Unable to connect. Check your connection parameters.');  
            $query = "CREATE DATABASE IF NOT EXISTS finding";
            mysqli_query($db, $query) or die(mysql_error($db));  
            $db_selected = mysqli_select_db($db, "finding") or die(mysql_error($db));  
            $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";  
            $result = mysqli_query($db, $sql);  
            $num = mysqli_num_rows($result);  
            if($num)  
            {  
                $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中  
                echo $row[0];  
                header("Location: logined/logined_index.php");
            }  
            else  
            {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
            }  
        }  
    }  
    else  
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?>  