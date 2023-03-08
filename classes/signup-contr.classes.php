<?php

class SignupContr extends Signup{

    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid,$pwd,$pwdRepeat,$email){
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }//construct
    
    public function signupUser(){
        if ($this->emptyInput() == false){
            header("location:../index.php?error=emptyInput"); 
            exit(); 
        }

        if ($this->invalidUid() == false){
            header("location:../index.php?error=invalidUid"); 
            exit(); 
        }
        
        if ($this->validEmail() == false){
            header("location:../index.php?error=invalidEmail"); 
            exit(); 
        }
        
        if ($this->pwdMatch() == false){
            header("location:../index.php?error=pwdDoesNotMatch"); 
            exit(); 
        }
        
        if ($this->alreadyExist() == true){
            header("location:../index.php?error=alreadyExist"); 
            exit(); 
        }

        $this->setUser($this->uid, $this->pwd, $this->email);          
    }//signup user

    private function emptyInput(){
        $result;
        if(empty($this->uid)||empty($this->pwd)||empty($this->pwdRepeat)||empty($this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }//empty input

    private function invalidUid(){
        $result;
        if(preg_match("/^[a-zA-Z0-9]*$/",$this->uid)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }//invalid user id 

    private function validEmail(){
        $result;
        if(filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result=true;
        }else{
            $result=false;
        }
        return $result;
    }//valid email

    private function pwdMatch(){
        $result;
        if($this->pwd !== $this->pwdRepeat){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }//password match

    private function alreadyExist(){
        $result;
        if($this->checkUser($this->uid, $this->email)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }//alreadyExist
}