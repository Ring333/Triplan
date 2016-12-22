<?php

class Application_Model_UserMapper
{

    protected $servername = "45.78.32.225";
    protected $username = "root";
    protected $password = "Wf940701";
    protected $dbname = "triplan";

    protected $log = "/var/tmp/triplan.log";


    public function signup_save()
    {
        $email = $_POST['email'];
        $hashed_password = hash('sha512', $_POST['password']);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (email, password, firstname, lastname)
        VALUES ( '$email', '$hashed_password', '$firstname', '$lastname')";

        if ($conn->query($sql) === TRUE) {
            header("HTTP/1.1 200 OK");
            error_log("Info: signup sucess!\n", 3, $this->log);
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            error_log("Error: insert fails\n" . $sql . $conn->error. "\n", 3, $this->log);
        }

        $conn->close();
    }


    public function signin_check(){

        $email = $_POST["email"];
        $password = $_POST['password'];
        $hashed_password = hash('sha512', $_POST['password']);

        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashed_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // success
            $row=$result->fetch_assoc();
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $user_id = $row['user_id'];
            echo $firstname . " " . $lastname;

            header("HTTP/1.1 200 OK");
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user_id;

            error_log("Info:". $firstname. $lastname. "\n", 3, $this->log);
            error_log("Info: login sucess!\n", 3, $this->log);
        } else {
            // fail
            header("HTTP/1.1 404 Not Found");
            error_log("Error: not match found". $email. $password . "\n", 3, $this->log);
        }

        $conn->close();
    }

}

