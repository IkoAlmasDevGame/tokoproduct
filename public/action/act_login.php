<?php 
session_start();
include "../../database/Migrations/koneksi.php";
if(isset($_POST["login"])){
    $email = trim($_POST["userEmail"]);
    $pass = trim($_POST["password"]);
    md5($pass, false);

    if($email == "" || $pass == ""){
        header("location:../view/index.php?pesan=kosong");
        exit;
    }

    $query = "SELECT * FROM pegawai WHERE userEmail='$email' and password='$pass'";
    $sql = mysqli_query($con, $query);

    if(mysqli_num_rows($sql) > 0){
        session_start();
        $_SESSION["status"] = "login";
        if($row = mysqli_fetch_assoc($sql)){
            $_SESSION["kd_pegawai"] = $row["kd_pegawai"];
            $_SESSION["namapegawai"] = $row["namapegawai"];
        }
        header("location:../view/market/index.php");
        exit;
    }else{
        header("location:../view/index.php?pesan=gagal");
        exit;
    }
}
?>