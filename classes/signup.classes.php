<?php

class Signup extends Dbh {

    protected function setUser($uid, $pwd, $email){
        $stmt = $this->connect()->prepare("INSERT INTO users (uid, pwd, email) VALUES (?, ?, ?)");

        $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $pwdHashed, $email))){
            $stmt = null;
            header("location:../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }//set user

    protected function checkUser($uid, $email){
      $stmt = $this->connect()->prepare("SELECT * FROM users WHERE uid = ? OR email = ?");
        
      if(!$stmt->execute(array($uid, $email))){
         $stmt = null;
         header("location:../index.php?error=stmtfailed"); 
         exit();  
      }

      $checkResult;
      if($stmt->rowCount()>0){
        $checkResult = true;
      }else{
        $checkResult = false;
      }

      return $checkResult;
    }//check user

}//Signup class