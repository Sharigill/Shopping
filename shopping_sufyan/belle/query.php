<?php 
// session_unset();
session_start();
include("connection.php");

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $login= mysqli_query($mysqli,"SELECT * FROM `register` WHERE emaill='$email' AND pass='$pass' ");
    $row=mysqli_fetch_array($login);
    if($row){
        $_SESSION['userid']= $row[0];
      $_SESSION['username']=$row[1];
      $_SESSION['useremail']=$row[3];
      echo"<script>alert('login successfully')
      location.assign('cart.php')</script>";

    }
    else{
        echo"<script>alert('invalid email or password')</script>";
    }
}


if(isset($_POST['addtocart'])){
    if(isset($_SESSION['cart'])){
        $count=count($_SESSION['cart']);
        $_SESSION['cart'][$count]= array('mid'=>$_POST['mid'],'pid'=>$_POST['proid'],'pname'=>$_POST['proname'],'pprice'=>$_POST['proprice'],'pqty'=>$_POST['proqty'],'pimage'=>$_POST['proimage']);
        echo "<script>alert('cart added successfully')
        location.assign('home7-shoes.php')</script>";
    }
    else{
        $_SESSION['cart'][0]= array('mid'=>$_POST['mid'],'pid'=>$_POST['proid'],'pname'=>$_POST['proname'],'pprice'=>$_POST['proprice'],'pqty'=>$_POST['proqty'],'pimage'=>$_POST['proimage']);
        echo "<script>alert('cart added successfully')
        location.assign('home7-shoes.php')</script>";
    }
}


?>