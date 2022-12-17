<?php
	// making variables that will be posted into the database
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$subject = $_POST['subject'];
	
	
	// Database connection
	$conn = new mysqli('localhost','root','','contactform');
	
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contacts(fname, lname, feedback) values(?, ?, ?)");
		$stmt->bind_param("sss", $fname, $lname, $subject);
		$execval = $stmt->execute();


		$stmt->close();
		$conn->close();
	}
	

 
 
// setting user and password variables
$user = 'root';
$password = '';
 
// Database name
$database = 'contactform';
 
// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
	// SQL query to select data from database
$sql = " SELECT * FROM contacts";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>See what other people have said!</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
<link rel="stylesheet" href="main_style.css"
</head>
 
<body>
	<div class="topnav" id="myTopnav">
	  <a href="index2.html" >Homepage</a>

	  <a href="Astronomy.html"> Astronomy</a>

	  <a href="Sports.html">Sports</a>

	  <a href="Fashion.html">Fashion</a>

	  <a href="Animals.html">Animals</a>

	  <a href="Scenery.html">Scenery</a>

	  <a href="Cityscapes.html">Cityscapes</a>

	  <a href="AI Made.html">AI Made</a>

	  <a href="About.html">About</a>
	  
	  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	  </a>
	</div>
    <section>
        <h1>See what other people have said!</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Feedback</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['ID'];?></td>
                <td><?php echo $rows['fname'];?></td>
                <td><?php echo $rows['lname'];?></td>
                <td><?php echo $rows['feedback'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>

