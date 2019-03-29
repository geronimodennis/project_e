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
        return "INSERT INTO userinformation ( firstName, lastName, middleName, email) VALUES 
                (?, ?, ?, ?);";
    }

    private function getUpdateStatement(){
        return "UPDATE userinformation SET firstName=?,lastName=?, middleName=?, email=? WHERE userid=?;";
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

    private function saveInsert(){
        $myConn = new myConnection();
        $con = $myConn->connect();
        $sql = $this->getInsertStatement();

        if(!$stmt = $con->prepare($sql)){
            die($stmt->error);
        }
        $stmt->bind_param("ssss",
            $this->firstName,
            $this->lastName,
            $this->middleName,
            $this->email);

        $stmt->execute();
        $this->userId = $stmt->insert_id;

        if($stmt->error){
            die($stmt->error);
        }
        $stmt->close();
        $con->close();

    }

    private function saveUpdate(){
        $myConn = new myConnection();
        $con = $myConn->connect();

        $sql = $this->getUpdateStatement();
        if(!$stmt = $con->prepare($sql)){
            die($stmt->error);
        }

        $stmt->bind_param("ssssi",
            $this->firstName,
            $this->lastName,
            $this->middleName,
            $this->email,
            $this->userId);

        $stmt->execute();

        if($stmt->error){
            die($stmt->error);
        }
        $stmt->close();
        $con->close();
    }

    function save(){

        if(empty($this->userId)){
            $this->saveInsert();
        }else{
            $this->saveUpdate();
        }

        return $this;
    }
}

class userCredentialEntity {
    public $id;
    public $userName;
    public $password;
    public $userId;

    private function getInsertStatement(){
        return "INSERT INTO logincredentials (username, password, userId) VALUES (?,?,?);";
    }

    private function getUpdateStatement(){
        return "UPDATE logincredentials SET username=?,password=? WHERE id=?;";
    }

    private function saveInsert(){
        $myConn = new myConnection();
        $con = $myConn->connect();
        $sql = $this->getInsertStatement();
        if(!$stmt = $con->prepare($sql)){
            die($stmt->error);
        }
        $stmt->bind_param("ssi",
            $this->userName,
            $this->password,
            $this->userId);
        $stmt->execute();
        $this->id = $stmt->insert_id;

        if($stmt->error){
            die($stmt->error);
        }
        $stmt->close();
        $con->close();
    }

    private function saveUpdate(){
        $myConn = new myConnection();
        $con = $myConn->connect();

        $sql = $this->getUpdateStatement();
        if(!$stmt = $con->prepare($sql)){
            die($stmt->error);
        }

        $stmt->bind_param("ssi",
            $this->userName,
            $this->password,
            $this->id);

        $stmt->execute();

        if($stmt->error){
            die($stmt->error);
        }
        $stmt->close();
        $con->close();
    }


    function save(){
        if(empty($this->id)){
            $this->saveInsert();
        }else{
            $this->saveUpdate();
        }
        return $this;
    }
}

class ManageUser
{

}