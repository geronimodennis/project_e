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

    private function getSelectStatement($whereCondition){
        return "SELECT * from userinformation $whereCondition";
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


    private function bindResultRow($row){
        $this->userId = $row['userid'];
        $this->firstName = $row['firstName'];
        $this->lastName = $row['lastName'];
        $this->middleName = $row['middleName'];
        $this->email = $row['email'];
    }


    function load(){
        $myConn = new myConnection();
        $con = $myConn->connect();
        $sql = $this->getSelectStatement("WHERE userid=?");

        if(!$stmt = $con->prepare($sql)){
            if(!$stmt = $con->prepare($sql)){
                die($stmt->error);
            }
        }

        $stmt->bind_param("i",
            $this->userId);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($row = $result->fetch_assoc()){
                $this->bindResultRow($row);
            }

        }else{
            die($stmt->error);
        }

        $stmt->close();
        $con->close();
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

    private function getSelectStatement($whereCondition){
        return "SELECT * from logincredentials $whereCondition";
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

    private function bindResultRow($row){
        $this->id = $row['id'];
        $this->userName = $row['username'];
        $this->password = $row['password'];
        $this->userId = $row['userId'];
    }


    private function loadByWhereCondition($whereCondition, $filterValue){
        $myConn = new myConnection();
        $con = $myConn->connect();
        $sql = $this->getSelectStatement($whereCondition);

        if(!$stmt = $con->prepare($sql)){
            if(!$stmt = $con->prepare($sql)){
                die($stmt->error);
            }
        }

        $stmt->bind_param("i",
            $filterValue);

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($row = $result->fetch_assoc()){
                $this->bindResultRow($row);
            }

        }else{
            die($stmt->error);
        }

        $stmt->close();
        $con->close();
    }

    function load(){
        if(!empty($this->id)){
            $this->loadByWhereCondition("WHERE id=?", $this->id);
            return $this;
        }else if(!empty($this->userId)){
            $this->loadByWhereCondition("WHERE userid=?", $this->userId);
            return $this;
        }

        return $this;
    }
}

class ManageUser
{

}