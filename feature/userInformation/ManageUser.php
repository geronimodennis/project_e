<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 28/03/2019
 * Time: 9:56 PM
 */

include_once "myConnection.php";
class UserEntity{
    public $userId;
    public $email;
    public $firstName;
    public $lastName;
    public $middleName;

    private function getInsertStatement(){
        return "INSERT INTO userinformation ( `firstName`, `lastName`, `middleName`, `email`) VALUES 
                ('$this->firstName', '$this->lastName', '$this->middleName', '$this->email');
                select LAST_INSERT_ID() as userid;";
    }

    function getCompleteName(){
        $completeName = "";
        if(!empty($this->lastName)){
            $completeName = $this->lastName . ",";
        }
        if(!empty($this->firstName)){
            $completeName .= $this->firstName . " ";
        }

        if(!empty($this->middleName)){
            $completeName .= $this->middleName;
        }

        return $completeName;
    }

    function save(){
        $myConn = new myConnection();
        $con = $myConn->connect();
        $sql = "";
        if(empty($this->userId)){
            $sql = $this->getInsertStatement();
            $con->multi_query($sql);
            $resultSets = $myConn->getResultSet();

            $this->userId = $resultSets[1][0]['userid'];
        }else{
        }

        $con->close();
        return $this;
    }
}

class userCredentialEntity {
    public $id;
    public $userName;
    public $password;
    public $userId;

    private function getInsertStatement(){
        return "INSERT INTO logincredentials (username, password, userId) VALUES 
        ('$this->userName','$this->password',$this->userId);
        select LAST_INSERT_ID() as id;";
    }

    function save(){
        $myConn = new myConnection();
        $con = $myConn->connect();
        if(empty($this->id)){
            $sql = $this->getInsertStatement();
            $con->multi_query($sql);
            $resultSets = $myConn->getResultSet();

            $this->id = $resultSets[1][0]['id'];
        }else{

        }

        $con->close();
        return $this;
    }
}

class ManageUser
{

}