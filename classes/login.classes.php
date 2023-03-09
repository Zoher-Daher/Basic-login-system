<?php

class Login extends Dbh {

    protected function getUser($uid, $pwd){
        $stmt = $this->connect()->prepare("SELECT pwd FROM users WHERE uid=?");

        if(!$stmt->execute(array($uid))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt = null;
            header("location:../index.php?error=notFound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $checkpwd = password_verify($pwd, $pwdHashed[0]["pwd"]);

        if($checkpwd == false){
            $stmt = null;
            header("location:../index.php?error=wrongPWD");
            exit();
        }elseif($checkpwd == true){
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE uid=? and pwd=?");

            if(!$stmt->execute(array($uid,$pwdHashed[0]["pwd"]))){
                $stmt = null;
                header("location:../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount()==0){
                $stmt = null;
                header("location:../index.php?error=notFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["uid"] = $user[0]["uid"];
            $_SESSION["email"] = $user[0]["email"];
            $stmt = null;
        }

        $stmt = null;
    }//get user


}//Login class