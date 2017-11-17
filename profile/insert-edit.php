<?php
include "../connect.php";
$rootFolder = "/csshop/";
session_start();



if(!isset($_SESSION["username"]) || $_SESSION["username"] ==""){
    echo ('<script> alert("Not found any profile, Please login first."); window.location="signin/signin.php";</script>');
    return ;
}

if($_POST["password"] != $_POST["con-pass"]){
    echo ("<script> alert('Password not match!'); window.location='edit-pro.php';</script>");
    exit();
    }

    $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
    $objDB = mysql_select_db("csshop");
    $strSQL = "UPDATE customer SET ";

    if(trim($_POST['name']) != ""){
$strSQL .="pname = '".$_POST["name"]."' ";
    }
    //$strSQL .=",username = '".$_POST["username"]."' ";
    if(trim($_POST['email']) != ""){
$strSQL .=" ,email = '".$_POST["email"]."' ";
    }
    if(trim($_POST['password']) != ""){
    $strSQL .=",password = '".md5($_POST["password"])."' ";
}
    if(trim($_POST['address']) != ""){
    $strSQL .=",address = '".$_POST["address"]."' ";
}
    if(trim($_POST['province']) != ""){
    $strSQL .=",province = '".$_POST["province"]."' ";
}
    if(trim($_POST['postalCode']) != ""){
    $strSQL .=",postalcode = '".$_POST["postalCode"]."' ";
}

    $strSQL .="WHERE username = '".$_SESSION["username"]."' ";
    $objQuery = mysql_query($strSQL);
        echo ("<script> alert('submit seccessfully!'); window.location='profile.php';</script>");

?>