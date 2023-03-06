<?php

if(isset($_POST["submit"])){

//grabbing user data
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];
$pwdRepeat = $_POST["pwdRepeat"];
$email = $_POST["email"];

//instantiate SignupContr class
include "../classes/signup.classes.php";
include "../classes/signup-contr.classes.php";

$signup = new SignupContr($uid,$pwd,$pwdRepeat,$email);

}
    