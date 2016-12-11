<?php

class Application_Model_UserMapper
{

    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "triplan";

    protected $log = "/var/tmp/triplan.log";

    public function signup()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (email, password, firstname, lastname)
        VALUES ( '$email', '$password', '$firstname', '$lastname')";

        if ($conn->query($sql) === TRUE) {
          error_log("Info: insert sucess!\n", 3, $this->log);
        } else {
          error_log("Error: insert fails\n" . $sql . $conn->error. "\n", 3, $this->log);
        }

        $conn->close();
    }

}

