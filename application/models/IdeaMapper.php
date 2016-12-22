<?php

class Application_Model_IdeaMapper
{
	protected $servername = "45.78.32.225";
    protected $username = "root";
    protected $password = "Wf940701";
    protected $dbname = "triplan";
	public function idea_save()
	{
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
		if (isset($_POST['day01']))$day01=$_POST['day01'];else $day01="";
		if (isset($_POST['day02']))$day02=$_POST['day02'];else $day02="";
		if (isset($_POST['day03']))$day03=$_POST['day03'];else $day03="";
		if (isset($_POST['day04']))$day04=$_POST['day04'];else $day04="";
		if (isset($_POST['day05']))$day05=$_POST['day05'];else $day05="";
		if (isset($_POST['day06']))$day06=$_POST['day06'];else $day06="";
		if (isset($_POST['day07']))$day07=$_POST['day07'];else $day07="";
		if (isset($_POST['day08']))$day08=$_POST['day08'];else $day08="";
		if (isset($_POST['day09']))$day09=$_POST['day09'];else $day09="";
		if (isset($_POST['day10']))$day10=$_POST['day10'];else $day10="";
		if (isset($_POST['day11']))$day11=$_POST['day11'];else $day11="";
		if (isset($_POST['day12']))$day12=$_POST['day12'];else $day12="";
		if (isset($_POST['day13']))$day13=$_POST['day13'];else $day13="";
		if (isset($_POST['day14']))$day14=$_POST['day14'];else $day14="";
		if (isset($_POST['day15']))$day15=$_POST['day15'];else $day15="";
		if (isset($_POST['day16']))$day16=$_POST['day16'];else $day16="";
		if (isset($_POST['day17']))$day17=$_POST['day17'];else $day17="";
		if (isset($_POST['day18']))$day18=$_POST['day18'];else $day18="";
		if (isset($_POST['day19']))$day19=$_POST['day19'];else $day19="";
		if (isset($_POST['day20']))$day20=$_POST['day20'];else $day20="";
		if (isset($_POST['id']))
		{
			$sql="UPDATE ideas set day01=$day01, day02=$day02, day03=$day03, day04=$day04, day05=$day05, day06=$day06, day07=$day07, day08=$day08, day09=$day09, day10=$day10, day11=$day11, day12=$day12, day13=$day13, day14=$day14, day15=$day15, day16=$day16, day17=$day17, day18=$day18, day19=$day19, day20=$day20";
			$conn->query($sql);
		}
		else
		{
		$title=$_POST['title'];
		$sdate=$_POST['sdate'];
		$edate=$_POST['edate'];
		$source=$_POST['source'];
		$dest=$_POST['dest'];
		$owner=$_POST['owner'];
		
		
        $sql = "INSERT INTO ideas (title,source, dest, sdate, edate,owner,day01, day02, day03, day04, day05, day06, day07, day08, day09, day10, day11, day12, day13, day14, day15, day16, day17, day18, day19, day20)
        VALUES ('$title', '$source', '$dest', '$sdate', '$edate','$owner','$day01', '$day02', '$day03', '$day04', '$day05', '$day06', '$day07', '$day08', '$day09', '$day10', '$day11', '$day12', '$day13', '$day14', '$day15', '$day16', '$day17', '$day18', '$day19', '$day20')";
        if ($conn->query($sql) === TRUE)
        {
        	$id = mysqli_insert_id($conn);

        	echo $id;
        }
        else
        {
        	echo "uh -oh";
        }
    }

	}
	public function idea_show($user_id)
	{

		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql="SELECT * FROM ideas where owner='$user_id'";
        $result=$conn->query($sql);
        if (!$result) {error_log("no result at all\n".$sql."\n",3,"/var/tmp/err.log");}
        else
        {
        while($row = $result->fetch_assoc())
        {
        	echo "<p><var class=\'hiddenid\'>".$row['id'].'</var><var>'.$row['title'].'</var><a>edit</a><a>delete</a></p>';
        }
    	}
        echo ";";
        $sql2="SELECT * FROM ideas where owner<>'$user_id'";
        $result2=$conn->query($sql2);
        if (!$result2) {error_log("no result at all\n".$sql."\n",3,"/var/tmp/err.log");}
        else
        {
        while($row2 = $result2->fetch_assoc())
        {
        	echo "<p><var class=\'hiddenid\'>".$row2['id'].'</var><var>'.$row2['title'].'</var><a>edit</a><a>delete</a></p>';
        }
    	}

    	
	}

	public function idea_find($id)
	{
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql="SELECT * FROM ideas where id='$id'";
        $result=$conn->query($sql);
        if (!$result) {error_log("no result at all\n".$sql."\n",3,"/var/tmp/err.log");}
        else 
        {
        	$row = $result->fetch_assoc();
        	echo $row['source']+';';
        	echo $row['dest']+';';
        	echo $row['sdate']+';';
        	echo $row['edate']+';';
        	echo $row['title']+';';
        	echo $row['owner']+';';
        	echo $row['day01']+';';
        	echo $row['day02']+';';
        	echo $row['day03']+';';
        	echo $row['day04']+';';
        	echo $row['day05']+';';
        	echo $row['day06']+';';
        	echo $row['day07']+';';
        	echo $row['day08']+';';
        	echo $row['day09']+';';
        	echo $row['day10']+';';
        	echo $row['day11']+';';
        	echo $row['day12']+';';
        	echo $row['day13']+';';
        	echo $row['day14']+';';
        	echo $row['day15']+';';
        	echo $row['day16']+';';
        	echo $row['day17']+';';
        	echo $row['day18']+';';
        	echo $row['day19']+';';
        	
        }
	}

}

