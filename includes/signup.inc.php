<?php

if(isset($_POST["submit"])){

//grabbing user data
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];
$pwdRepeat = $_POST["pwdRepeat"];
$email = $_POST["email"];

//instantiate SignupContr class
include "../classes/dbh.classes.php";
include "../classes/signup.classes.php";
include "../classes/signup-contr.classes.php";

$signup = new SignupContr($uid,$pwd,$pwdRepeat,$email);

//running error handlers and user signup
$signup->signupUser();

//going back to front page
header("location:../index.php?error=none");

}//if
    