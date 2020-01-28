<?php
include "config.php";

class Database {
    public $host = DB_HOST;
    public $dbname = DB_NAME;
    public $user = DB_USER;
    public $pass = DB_PASS;

    public $link;
    public $error;

    public function __construct() {
        $this->connection();
    }

    private function connection() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection fail.." . $this->link->connect_error;
            return false;
        }
    }

    //Select query // Read all data
    public function select($query) {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        }else {
            return false;
        }
    }

    //Insert data
    public function insertData($query){
        $insertRow = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insertRow) {
            header("Location: index.php?msg=".urlencode("Data inserted successfully.."));
            exit();
        } else {
            die("Error: (".$this->link->errno.")" . $this->link->error);
        }
    }
    //Update data
    public function updateData($query){
        $updateRow = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($updateRow) {
            header("Location: index.php?msg=".urlencode("Data Updated successfully.."));
            exit();
        } else {
            die("Error: (".$this->link->errno.")" . $this->link->error);
        }
    }


    //Delete data
    public function delete($query){
        $deleteRow = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($deleteRow) {
            header("Location: index.php?msg=".urlencode("Data Deleted successfully.."));
            exit();
        } else {
            die("Error: (".$this->link->errno.")" . $this->link->error);
        }
    }


}