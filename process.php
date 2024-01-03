<a href="index.php">Add Data</a>
<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $date = $_POST["date"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    
    $nameValidation = "SELECT * FROM form WHERE Name = '$name'";
    $nameResult = $conn->query($nameValidation);
    if ($nameResult->num_rows > 0) {
    	echo "Name already exist";
    	exit();
    }
    
    
    $dateFormat = 'Y-m-d';
    $dateObj = DateTime::createFromFormat($dateFormat, $date);
    if ($dateObj == false) {
    	echo "Invalid format of date";
    }
    echo $dateObj->format('Y-m-d');
    echo "<br>";

    $check = "SELECT * FROM form WHERE Email='$email'";
    $result= $conn->query($check);
    if ($result->num_rows > 0) {
    	 echo "&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "Error: This email already exists in the database. Data insertion failed.";
    } else {
        $sql = "INSERT INTO form (Name, Email, Message, Date, Gender, Country) 
                VALUES ('$name', '$email', '$message', '$date', '$gender', '$country')";

        if ($conn->query($sql) === TRUE) {
            echo "Inserted successfully";
        } else {
            echo "Error: " . $conn->error;
        }
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
		<th>Country</th>
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
			echo "<td>" . $row["Country"] . "</td>";
			echo "<td><a href='delete.php?id={$row["id"]}'>Delete</a></td>";
			echo "<td><a href='update.php?id={$row["id"]}'>Update</a></td>";
			echo "</tr>";
		}
	}
?>


