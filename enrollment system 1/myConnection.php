<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 28/03/2019
 * Time: 10:27 PM
 */
include_once ("config.php");
class myConnection
{

    private $myCon;
    function connect(){
        $myConfig = new myConfiguration();
        $host = $myConfig->host;
        $username = $myConfig->username;
        $password = $myConfig->password;
        $database = $myConfig->database;
        $this->myCon = new mysqli($host, $username, $password, $database);
        if($this->myCon->error)
            die($this->myCon->error);


        return $this->myCon;
    }

    function close(){

        $this->myCon->close();
    }

    function getResultSet(){
        $resultSets = array();
        $dbConnection = $this->myCon;

        do {
            /* store first result set */
            $resultSet = array();
            if ($result = $dbConnection->store_result()) {
                if($dbConnection->error)
                    die($dbConnection->error);

                while ($row = $result->fetch_assoc ()) {
                    array_push($resultSet, $row);
                }
                $result->free();
            }
            array_push($resultSets, $resultSet);
        } while ($dbConnection->next_result());

        return $resultSets;
    }
}