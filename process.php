<?php
include 'connection.php';
$url = "http://localhost:81/crud/";
echo "<button onclick='window.location.href=\"$url\"'>Add data</button>";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	$date = $_POST["date"];
	$gender = $_POST["gender"];
	$sql = "INSERT INTO form (Name, Email, Message,Date,Gender) VALUES ('$name', '$email', '$message', '$date', '$gender')";	
	$result = $conn->query($sql);
	if ($result === True){
		echo "Inserted successfully";
	}else{
		echo "Data insertion failed" . $sql;
	}
}	
$retrieve = "SELECT * FROM form";
$result = $conn->query($retrieve);
if ($result->num_rows > 0){
	echo "<table border='1'>";
	echo "<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Message</th>
		<th>Date</th>
		<th>Gender</th>
		<th>DELETE</th>
		<th>UPDATE</th>
		</tr>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["Name"] . "</td>";
			echo "<td>" . $row["Email"] . "</td>";
			echo "<td>" . $row["Message"] . "</td>";
			echo "<td>" . $row["Date"] . "</td>";
			echo "<td>" . $row["Gender"] . "</td>";
			echo "<td><a href='delete.php?id={$row["id"]}'>Delete</a></td>";
			echo "<td><a href='update.php?id={$row["id"]}'>Update</a></td>";
			echo "</tr>";
		}
	}
?>

