<?php
$connect = mysqli_connect("localhost","root","","logregdatabase");
if($connect){
    echo "You are connected with the server!! \n ";
}
else{
    echo "not connected";
}

if(isset($_POST["register"])){

    $Username = $_POST["username"];
    $Password = $_POST["password"];

    $s = "select username from regdata where username = '$Username'";
    $res = mysqli_query($connect,$s);
    $num = mysqli_num_rows($res);

    if($num ==1){
        echo "\n Username Already Exists!";
    }
    else{
        $sql = "insert into regdata values('$Username','$Password')";
        $re = mysqli_query($connect,$sql);
        echo "\n Registration Successful";
    }
}

if(isset($_POST["Login"])){

    $Username = $_POST["l-username"];
    $Password = $_POST["l-password"];

    $sql = "select * from regdata where username ='$Username' and password='$Password'";
    $query = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($query);

    if($num == 1){
        echo "<br>"." You Have Logged In.";
    }

    else{
        echo "\n Pls Check Your Credinals.";
    }


}
?>
