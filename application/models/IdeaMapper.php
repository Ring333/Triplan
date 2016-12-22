<?php

class Application_Model_IdeaMapper
{
	protected $servername = "45.78.32.225";
    protected $username = "root";
    protected $password = "Wf940701";
    protected $dbname = "triplan";
	public function idea_save()
	{
		$sdate=$_POST['sdate'];
		$edate=$_POST['edate'];
		$source=$_POST['source'];
		$dest=$_POST['dest'];
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO ideas (source, dest, sdate, edate)
        VALUES ( '$source', '$dest', '$sdate', '$edate')";
        if ($conn->query($sql) === TRUE)
        {
        	echo "true succeed";
        }
        else
        {
        	echo "uh -oh";
        }





	}

}

